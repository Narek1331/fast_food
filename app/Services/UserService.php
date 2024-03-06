<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

class UserService {

    /** @var \App\Repositories\UserRepository */
    protected $user_repo;

    /**
     * Create a new instance of UserService.
     *
     * @param  \App\Repositories\UserRepository  $user_repo The user repository instance.
     */
    public function __construct(
        UserRepository $user_repo,
        RoleRepository $role_repo
        ) {
        $this->user_repo = $user_repo;
        $this->role_repo = $role_repo;
    }

    /**
     * Store a newly created user in the database.
     *
     * @param  array  $datas The data for creating the user.
     * @return \App\Models\User The created user instance.
     */
    public function store($datas) {
        return $this->user_repo->store(
            $datas['role_id'],
            $datas['name'],
            $datas['email'],
            $datas['password'],
            $datas['phone_number'] ?? null,
        );
    }

    /**
     * Store a newly created custom user in the database.
     *
     * @param  array  $datas The data for creating the user.
     * @return \App\Models\User The created user instance.
     */
    public function storeCustomUser($datas) {
        $role = $this->role_repo->getByName('customer');
        return $this->user_repo->store(
            $role->id,
            $datas['name'],
            $datas['email'],
            $datas['password'],
            $datas['phone_number'] ?? null,
        );
    }

    public function findByEmail(string $email){
        return $this->user_repo->findByEmail($email) ;
    }

    public function updatePassword(int $id, string $password){
        $user = $this->user_repo->findById($id);
        $user->password = $password;
        $user->email_verified_at = null;
        $user->save();
        return $user;

    }

    public function paginateAllCustomers(){
        $role = $this->role_repo->getByName('customer');
        return $this->user_repo->paginateAllUsersByRoleId($role->id);
    }
}
