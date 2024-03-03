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

    public function store($datas){}

    public function getById(int $product_id){
        return Product::with(['languages' => function ($query) {
                return $query->select('languageables.name', 'languageables.description', 'languages.name as code');
            }])
            ->with(['sizes' => function($q){
                return $q->select('product_id','price','name','old_price','size_id');
            }])
            ->with('ingredients')
            ->find($product_id);
    }

    public function destroy(int $product_id){
        $product = $this->getById($product_id);
        $product->delete();
    }

    public function paginateAll($status = true)
    {
        $locale = app()->getLocale();
        $localeMappings = config('app.languages');

        $l = $localeMappings[$locale];
        return Product::whereHas('translate', function ($query) use ($l) {
                $query->where('language_id', $l);
            })
            ->with(['sizes' => function($q){
                return $q->select('product_id','price','name','old_price','size_id');
            }])
            ->with(['ingredients' => function($q) use ($l){
                return $q->whereHas('translate', function ($query) use ($l) {
                        $query->where('language_id', $l);
                    });
            }])
            ->get();
    }
}
