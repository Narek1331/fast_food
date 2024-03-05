<?php

namespace App\Repositories;

use App\Models\State;

class StateRepository {

    public function getAll(){
        return State::with('settlements')->get();
    }
}
