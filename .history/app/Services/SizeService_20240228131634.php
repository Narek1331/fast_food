<?php
namespace App\Services;

use App\Repositories\SizeRepository;

class SizeService{

    public function __construct(SizeRepository $size_repo){
        $this->size_repo = $size_repo;
    }

    public function getAll(){
        return $this->size_repo->getAll();
    }

    public function paginateAll(int $paginate = 5){
        return $this->size_repo->paginateAll($paginate);
    }

    public function store(string $name){
        return $this->size_repo->store($name);
    }

    public function update(int $size_id,string $name){
        return $this->size_repo->update(,$size_id,$name);
    }

    public function findOrFailById(int $size_id){
        return $this->size_repo->findOrFailById($size_id);
    }

    public function destroy(int $size_id){
        return $this->size_repo->destroy($size_id);
    }

    public function getSorted(){
        $sizes = $this->getAll();
        $sorted_data = [];

        foreach($sizes as $size){
            $sorted_data[$size->name] = $size->id;
        }

        return $sorted_data;
    }
}
