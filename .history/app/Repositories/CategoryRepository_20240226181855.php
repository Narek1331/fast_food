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
            ->get();
    }

    public function getAll($status = true)
    {
        $locale = app()->getLocale();
        $localeMappings = [
            'am' => 1,
            'ru' => 2,
            'en' => 3,
        ];
        $l = $localeMappings[$locale];
        return Category::whereHas('translate', function ($query) use ($l) {
                $query->where('language_id', $l);
            })
            ->paginate(1);
    }
}
