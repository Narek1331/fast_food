<?php

namespace App\Services;

use App\Repositories\RoleRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RoleService
 * @package App\Services
 */
class RoleService
{
    /**
     * @var RoleRepository
     */
    protected $role_repository;

    /**
     * RoleService constructor.
     * @param RoleRepository $role_repository The role repository instance.
     */
    public function __construct(RoleRepository $role_repository)
    {
        $this->role_repository = $role_repository;
    }

    /**
     * Get all roles.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->role_repository->getAll();
    }
}
