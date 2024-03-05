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

    public function getAll(){
        return $this->category_repo->getAll();
    }

    public function getAllWithLanguages(){
        return $this->category_repo->getAllWithLanguages();
    }

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

    public function findById($id){
        return $this->category_repo->findById($id);
    }

    public function destroy($id){
        return $this->category_repo->destroy($id);
    }

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
