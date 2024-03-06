<?php

namespace App\Repositories;

use App\Models\Language;

class LanguageRepository{

    /**
     * Get all languages.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of languages
     */
    public function getAll()
    {
        return Language::get();
    }

}
