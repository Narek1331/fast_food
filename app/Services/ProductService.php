<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use App\Models\Product;
use App\Services\SizeService;
use App\Services\FileUploadService;

class ProductService{

    /**
     * @var ProductRepository $product_repo
     */
    protected $product_repo;

    /**
     * @var SizeService $size_repo
     */
    protected $size_repo;

    /**
     * ProductService constructor.
     * @param ProductRepository $product_repo
     * @param SizeService $size_repo
     * @param FileUploadService $file_upload_serv
     */
    public function __construct(
        ProductRepository $product_repo,
        SizeService $size_repo,
        FileUploadService $file_upload_serv
    ){
        $this->product_repo = $product_repo;
        $this->size_repo = $size_repo;
        $this->file_upload_serv = $file_upload_serv;
    }

    /**
     * Get all products.
     *
     * @return mixed
     */
    public function getAll(){
        return $this->product_repo->getAll();
    }
    
    /**
     * Get all products with all languages.
     *
     * @return mixed
     */
    public function getWithAllLanguages(){
        return $this->product_repo->getWithAllLanguages();
    }

    /**
     * Store a new product.
     *
     * @param array $datas Array of product data
     *                    Example:
     *                    [
     *                        'price' => 10.99,
     *                        'category' => 1,
     *                        'am' => ['name' => 'Product Name', 'description' => 'Product Description'],
     *                        'ru' => ['name' => 'Nom du produit', 'description' => 'Description du produit'],
     *                        'en' => ['name' => 'Nom du produit', 'description' => 'Description du produit'],
     *                        'sizes' => [
     *                            'L' => 9.99,
     *                            'X' => 12.99,
     *                            'XL' => 15.99
     *                        ],
     *                        'ingredients' => [1, 2, 3]
     *                    ]
     * @return void
     */
    public function store($datas){
        $product = new Product();

        if(isset($datas['price'])){
            $product->price = $datas['price'];
        }

        if(isset($datas['category'])){
            $product->category_id = $datas['category'];
        }

        if(isset($datas['image'])){
            $path = $this->file_upload_serv->uploadImage($datas['image'],'images/product');
            dd($path);
        }
        
        $product->save();

        // Storing product data for each language
        $localeMappings = config('app.languages');
        
        foreach($localeMappings as $langName => $langId){
            $data = $datas[$langName];
            $product->languages()->attach([
                [
                    'name' => $data['name'], 
                    'description' => $data['description'], 
                    'language_id'=>$langId
                ]
            ]);
        }

        // Attaching ingredients if provided
        if(isset($datas['ingredients'])){
            $product->ingredients()->attach($datas['ingredients']);
        }

        // Attaching sizes if provided
        if(isset($datas['sizes'])){
            $sizes = $this->size_repo->getSorted();

            foreach($datas['sizes'] as $sizeName => $sizePrice){
                $sizeId = $sizes[$sizeName];
                $product->sizes()->attach([
                    [
                        'size_id' => $sizeId,
                        'price' => $sizePrice 
                    ]
                ]);
            }
        }
    }
}
