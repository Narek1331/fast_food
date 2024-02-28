<?php

namespace App\Repositories;
use App\Models\Language;

class LanguageRepository{

    public function getAll()
    {
        return Language::get();
    }

}
