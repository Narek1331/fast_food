<?php
namespace App\Services;

use App\Repositories\LanguageRepository;

class LanguageService{

    public function __construct(LanguageRepository $language_repo){
        $this->language_repo = $language_repo;
    }

    public function getAll(){
        return $this->language_repo->getAll();
    }
}
