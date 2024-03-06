<?php
namespace App\Services;

use App\Repositories\LanguageRepository;

class LanguageService{

    public function __construct(LanguageRepository $language_repo){
        $this->language_repo = $language_repo;
    }

    /**
     * Get all languages.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of languages
     */
    public function getAll(){
        return $this->language_repo->getAll();
    }
}
