<?php
namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Services\FileUploadService;

class CategoryService{

    public function __construct(
        CategoryRepository $category_repo,
        FileUploadService $file_upload_serv,
        ){
        $this->category_repo = $category_repo;
        $this->file_upload_serv = $file_upload_serv;
    }

    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of categories
     */
    public function getAll(){
        return $this->category_repo->getAll();
    }

    /**
     * Get all categories with translations.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of categories with translations
     */
    public function getAllWithLanguages(){
        return $this->category_repo->getAllWithLanguages();
    }

    /**
     * Store a new category.
     *
     * @param array $datas The data to create the category
     * @return \App\Models\Category The created category
     */
    public function store($datas){
        $category =  $this->category_repo->store($datas);
        if(isset($datas['image'])){
            $path = $this->file_upload_serv->uploadImage($datas['image'],'images/category');
            $category->img_path = $path;
        }
        $localeMappings = config('app.languages');

        foreach($datas as $num => $data){
            if($num == 'image'){
                continue;
            }
            $category->languages()->attach([['name' => $data, 'language_id'=>$localeMappings[$num]]]);
        }
        $category->save();
        return $category;
    }

    /**
     * Find a category by its ID.
     *
     * @param int $id The ID of the category
     * @return \App\Models\Category|null The found category or null if not found
     */
    public function findById($id){
        return $this->category_repo->findById($id);
    }

    /**
     * Delete a category by its ID.
     *
     * @param int $id The ID of the category to delete
     * @return bool True if the category is successfully deleted, false otherwise
     */
    public function destroy($id){
        return $this->category_repo->destroy($id);
    }

    /**
     * Update a category by its ID.
     *
     * @param int $id The ID of the category to update
     * @param array $datas The data to update the category
     * @return \App\Models\Category The updated category
     */
    public function update($id, $datas){
        $category =  $this->category_repo->findById($id);

        if(isset($datas['image'])){
            if($category->img_path){
                $path = $this->file_upload_serv->deleteImage($category->img_path);
            }
            $path = $this->file_upload_serv->uploadImage($datas['image'],'images/category');
            $category->img_path = $path;
        }

        $category->languages()->detach();
        $localeMappings = config('app.languages');

        foreach($datas as $num => $data){
            if($num == 'image'){
                continue;
            }
            $category->languages()->attach([['name' => $data, 'language_id'=>$localeMappings[$num]]]);
        }
        
        $category->save();
        return $category;
    }
}
