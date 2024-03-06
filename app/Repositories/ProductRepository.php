<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository{


    /**
     * Get all products with translations for the current locale.
     *
     * @param bool $status The status of products to fetch (optional)
     * @return \Illuminate\Database\Eloquent\Collection The collection of products with translations
     */
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

    /**
     * Get all products with translations and pagination for the current locale.
     *
     * @param bool $status The status of products to fetch (optional)
     * @return \Illuminate\Pagination\LengthAwarePaginator The paginated list of products with translations
     */
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

    /**
     * Store a new product.
     *
     * @param array $datas The data to create the product
     * @return void
     */
    public function store($datas){}

    /**
     * Get a product by its ID with translations, sizes, and ingredients.
     *
     * @param int $product_id The ID of the product
     * @return \App\Models\Product|null The found product with translations, sizes, and ingredients or null if not found
     */
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

    /**
     * Delete a product by its ID.
     *
     * @param int $product_id The ID of the product to delete
     * @return void
     */
    public function destroy(int $product_id){
        $product = $this->getById($product_id);
        $product->delete();
    }

    /**
     * Get all products with translations, sizes, and ingredients.
     *
     * @param bool $status The status of products to fetch (optional)
     * @return \Illuminate\Database\Eloquent\Collection The collection of products with translations, sizes, and ingredients
     */
    public function paginateAll($params = [], $status = true)
    {
        $locale = app()->getLocale();
        $localeMappings = config('app.languages');

        $l = $localeMappings[$locale];
        $products = Product::whereHas('translate', function ($query) use ($l) {
                $query->where('language_id', $l);
            })
            ->with(['sizes' => function($q){
                return $q->select('product_id','price','name','old_price','size_id');
            }])
            ->with(['ingredients' => function($q) use ($l){
                return $q->whereHas('translate', function ($query) use ($l) {
                        $query->where('language_id', $l);
                    });
            }]);

        if(isset($params['category_id'])){
            $products = $products->where('category_id',$params['category_id']);
        }
        if(isset($params['q'])){
            $products->whereHas('translate', function ($query) use ($l, $params) {
                $query->where('name', $params['q'])
                ->orWhere('name', 'like', '%' . $params['q'] . '%')
                ->orWhere('name', 'like', '%' . $params['q'])
                ->orWhere('name', 'like', $params['q'] . '%');
            });
        }

        return $products->get();
    }
}
