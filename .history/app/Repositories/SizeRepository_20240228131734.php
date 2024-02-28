<?php

namespace App\Repositories;
use App\Models\Size;

class SizeRepository{

    public function getAll()
    {
        return Size::get();
    }

    public function paginateAll(int $paginate = 5){
        return Size::paginate($paginate);
    }

    public function store(string $name){
        return Size::create(['name'=>$name]);
    }

    public function update(int $size_id,string $name){
        $size = Size::find($size_id);
        $size->name = $name;
        $size->save();
        return $size;
    }

    public function findOrFailById(int $size_id){
        return Size::findOrFail($size_id);
    }

    public function find(int $size_id){
        return Size::find($size_id);
    }

    public function destroy(int $size_id){
        return $this->find($size_id)->delete();
    }

}
