<?php

namespace App\Repositories;
use App\Models\Category;

class CategoryRepository{

    public function getAllWithLanguages($status = true)
    {
        return Category::where('status', $status)
            ->with(['languages' => function ($query) {
                return $query->select('languageables.name', 'languages.name as code');
            }])
            ->paginate(5);
    }

    public function getAll($status = true)
    {
        $locale = app()->getLocale();
        $localeMappings = config('app.languages');
        $l = $localeMappings[$locale];
        return Category::whereHas('translate', function ($query) use ($l) {
                $query->where('language_id', $l);
            })
            ->get();
    }

    public function store($datas){
        return Category::create(['status' => true]);
    }

    public function findById($id){
        return Category::with(['languages' => function ($query) {
            return $query->select('languageables.name', 'languages.name as code');
        }])->find($id);
    }

    public function destroy($id){
        $category = $this->findById($id);
        $category->languages()->detach();
        return $category->delete();
    }

    public function update($id, $datas){
        $category = $this->findById($id);
        $category->languages()->detach();
        $localeMappings = config('app.languages');

        foreach($datas as $num => $data){
            $category->languages()->attach([['name' => $data, 'language_id'=>$localeMappings[$num]]]);
        }
        return $category;
    }




}
