<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RoleRepository
 * @package App\Repositories
 */
class RoleRepository
{
    /**
     * Get all roles.
     *
     * @return Collection|Role[]
     */
    public function getAll()
    {
        return Role::get();
    }

     /**
     * Get role by role name.
     *
     * @return Role
     */
    public function getByName(string $role_name)
    {
        return Role::where('name',$role_name)->first();
    }
}
