<?php

namespace App\Services;

use App\Repositories\SettlementRepository;

/**
 * Class SettlementService
 * @package App\Services
 */
class SettlementService
{

    /**
     * SettlementService constructor.
     * @param SettlementRepository $settlementRepository
     */
    public function __construct(SettlementRepository $settlementRepository)
    {
        $this->settlementRepository = $settlementRepository;
    }

    /**
     * Get all settlements.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Settlement[]
     */
    public function getAll()
    {
        return $this->settlementRepository->getAll();
    }

    /**
     * Paginate all settlements.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Settlement[]
     */
    public function paginateAll()
    {
        return $this->settlementRepository->paginateAll();
    }

    /**
     * Get a settlement by its ID.
     *
     * @param int $id
     * @return \App\Models\Settlement
     */
    public function getById($id)
    {
        return $this->settlementRepository->getById($id);
    }

    /**
     * Create a new settlement.
     *
     * @param array $attributes
     * @return \App\Models\Settlement
     */
    public function create(array $attributes)
    {
        return $this->settlementRepository->create($attributes);
    }

    /**
     * Update a settlement.
     *
     * @param int $id
     * @param array $attributes
     * @return \App\Models\Settlement
     */
    public function update($id, array $attributes)
    {
        return $this->settlementRepository->update($id, $attributes);
    }

    /**
     * Delete a settlement.
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $this->settlementRepository->delete($id);
    }
}
