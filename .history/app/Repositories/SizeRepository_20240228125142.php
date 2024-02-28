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

}
