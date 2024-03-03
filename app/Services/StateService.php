<?php

namespace App\Services;
use App\Repositories\StateRepository;

class StateService
{
    public function __construct(
        StateRepository $state_repo
    ){
        $this->state_repo = $state_repo;
    }

    public function getAll(){
        return $this->state_repo->getAll();
    }
}