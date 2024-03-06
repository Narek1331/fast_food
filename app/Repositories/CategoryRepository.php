<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {

    /**
     * Get all categories with their translations.
     *
     * @param bool $status The status of categories (default: true)
     * @return \Illuminate\Contracts\Pagination\Paginator The paginated collection of categories with translations
     */
    public function getAllWithLanguages($status = true) {
        return Category::where('status', $status)
            ->with(['languages' => function ($query) {
                return $query->select('languageables.name', 'languages.name as code');
            }])
            ->paginate(5);
    }

    /**
     * Get all categories that have translations in the current locale.
     *
     * @param bool $status The status of categories (default: true)
     * @return \Illuminate\Database\Eloquent\Collection The collection of categories
     */
    public function getAll($status = true) {
        $locale = app()->getLocale();
        $localeMappings = config('app.languages');
        $l = $localeMappings[$locale];
        
        return Category::whereHas('translate', function ($query) use ($l) {
                $query->where('language_id', $l);
            })
            ->get();
    }

    /**
     * Store a new category.
     *
     * @param array $datas The category data
     * @return \App\Models\Category The created category
     */
    public function store($datas) {
        return Category::create(['status' => true]);
    }

    /**
     * Find a category by ID with its translations.
     *
     * @param int $id The category ID
     * @return \App\Models\Category|null The found category or null if not found
     */
    public function findById($id) {
        return Category::with(['languages' => function ($query) {
            return $query->select('languageables.name', 'languages.name as code');
        }])->find($id);
    }

    /**
     * Destroy a category by ID.
     *
     * @param int $id The category ID
     * @return bool True if successfully deleted, false otherwise
     */
    public function destroy($id) {
        $category = $this->findById($id);
        $category->languages()->detach();
        return $category->delete();
    }

    /**
     * Update a category.
     *
     * @param int $id The category ID
     * @param array $datas The category data
     * @return \App\Models\Category The updated category
     */
    public function update($id, $datas) {
        $category = $this->findById($id);
        $category->languages()->detach();
        $localeMappings = config('app.languages');

        foreach($datas as $num => $data) {
            $category->languages()->attach([['name' => $data, 'language_id'=>$localeMappings[$num]]]);
        }
        return $category;
    }

}
