<?php

namespace App\Repositories;

use App\Models\Settlement;

/**
 * Class SettlementRepository
 * @package App\Repositories
 */
class SettlementRepository
{
    /**
     * Get all settlements.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Settlement[]
     */
    public function getAll()
    {
        return Settlement::with('state')->get();
    }

    /**
     * Paginate all states.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Settlement[]
     */
    public function paginateAll($paginate = 10)
    {
        return Settlement::with('state')->paginate($paginate);
    }

    /**
     * Get a state by its ID.
     *
     * @param int $id
     * @return Settlement
     */
    public function getById($id)
    {
        return Settlement::findOrFail($id);
    }

    /**
     * Create a new state.
     *
     * @param array $attributes
     * @return Settlement
     */
    public function create(array $attributes)
    {
        return Settlement::create($attributes);
    }

    /**
     * Update a state.
     *
     * @param int $id
     * @param array $attributes
     * @return Settlement
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
