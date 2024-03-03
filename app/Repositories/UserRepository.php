<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository {

    /**
     * Store a newly created user in the database.
     *
     * @param  int  $role_id The role ID of the user.
     * @param  string  $name The name of the user.
     * @param  string  $email The email of the user.
     * @param  string  $password The password of the user.
     * @param  mixed|null  $phone_number The phone number of the user (optional).
     * @return \App\Models\User The created user instance.
     */
    public function store(int $role_id, string $name, string $email, string $password, $phone_number = null)
    {
        return User::create([
            'role_id' => $role_id,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone_number' => $phone_number,
        ]);
    }

    public function findById(int $id){
        return User::find($id);
    }

    public function findByEmail(string $email){
        return User::where('email',$email)->first();
    }

}
