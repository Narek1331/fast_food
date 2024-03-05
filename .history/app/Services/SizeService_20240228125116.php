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

    public function getSorted(){
        $sizes = $this->getAll();
        $sorted_data = [];

        foreach($sizes as $size){
            $sorted_data[$size->name] = $size->id;
        }

        return $sorted_data;
    }
}
