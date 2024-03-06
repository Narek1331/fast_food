<?php

namespace App\Services;

use App\Repositories\StateRepository;

/**
 * Class StateService
 * @package App\Services
 */
class StateService
{

    /**
     * StateService constructor.
     * @param StateRepository $stateRepository
     */
    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    /**
     * Get all states.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\State[]
     */
    public function getAll()
    {
        return $this->stateRepository->getAll();
    }

    /**
     * Get a state by its ID.
     *
     * @param int $id
     * @return \App\Models\State
     */
    public function getById($id)
    {
        return $this->stateRepository->getById($id);
    }

    /**
     * Create a new state.
     *
     * @param array $attributes
     * @return \App\Models\State
     */
    public function create(array $attributes)
    {
        return $this->stateRepository->create($attributes);
    }

    /**
     * Update a state.
     *
     * @param int $id
     * @param array $attributes
     * @return \App\Models\State
     */
    public function update($id, array $attributes)
    {
        return $this->stateRepository->update($id, $attributes);
    }

    /**
     * Delete a state.
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $this->stateRepository->delete($id);
    }
}
