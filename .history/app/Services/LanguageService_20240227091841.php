<?php
namespace App\Services;

use App\Repositories\LanguageRepository;

class LanguageService{

    public function __construct(LanguageRepository $language_repo){
        $this->anguage_repo = $anguage_repo;
    }

    public function getAll(){
        return $this->anguage_repo->getAll();
    }
}
