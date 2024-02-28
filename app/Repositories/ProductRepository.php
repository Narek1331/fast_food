<?php

namespace App\Repositories;
use App\Models\Product;

class ProductRepository{


    public function getAll($status = true)
    {
        $locale = app()->getLocale();
        $localeMappings = config('app.languages');

        $l = $localeMappings[$locale];
        return Product::whereHas('translate', function ($query) use ($l) {
                $query->where('language_id', $l);
            })
            ->with('sizes')
            ->with('ingredients')
            ->get();
    }

    public function getWithAllLanguages($status = true)
    {
        $locale = app()->getLocale();
        $localeMappings = config('app.languages');

        $l = $localeMappings[$locale];
        return Product::with(['languages' => function ($query) {
                return $query->select('languageables.name', 'languages.name as code');
            }])
            ->with('sizes')
            ->with('ingredients')
            ->paginate(5);
    }

    public function store($datas){
        

    }
}
