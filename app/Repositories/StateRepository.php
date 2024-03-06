<?php

namespace App\Repositories;

use App\Models\State;

/**
 * Class StateRepository
 * @package App\Repositories
 */
class StateRepository
{
    /**
     * Get all states.
     *
     * @return \Illuminate\Database\Eloquent\Collection|State[]
     */
    public function getAll()
    {
        return State::with('settlements')->get();
    }

    /**
     * Get a state by its ID.
     *
     * @param int $id
     * @return State
     */
    public function getById($id)
    {
        return State::findOrFail($id);
    }

    /**
     * Create a new state.
     *
     * @param array $attributes
     * @return State
     */
    public function create(array $attributes)
    {
        return State::create($attributes);
    }

    /**
     * Update a state.
     *
     * @param int $id
     * @param array $attributes
     * @return State
     */
    public function update($id, array $attributes)
    {
        $state = $this->getById($id);
        $state->update($attributes);
        return $state;
    }

    /**
     * Delete a state.
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $state = $this->getById($id);
        $state->delete();
    }
}
