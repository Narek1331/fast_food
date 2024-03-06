<?php

namespace App\Repositories;

use App\Models\Size;

class SizeRepository{

    /**
     * Get all sizes.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of sizes
     */
    public function getAll()
    {
        return Size::get();
    }

    /**
     * Paginate all sizes.
     *
     * @param int $paginate The number of items per page for pagination
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The paginated list of sizes
     */
    public function paginateAll(int $paginate = 5){
        return Size::paginate($paginate);
    }

    /**
     * Store a new size.
     *
     * @param string $name The name of the size
     * @return \App\Models\Size The created size
     */
    public function store(string $name){
        return Size::create(['name'=>$name]);
    }

    /**
     * Update a size by its ID.
     *
     * @param int $size_id The ID of the size to update
     * @param string $name The new name for the size
     * @return \App\Models\Size The updated size
     */
    public function update(int $size_id,string $name){
        $size = Size::find($size_id);
        $size->name = $name;
        $size->save();
        return $size;
    }

    /**
     * Find a size by its ID or fail if not found.
     *
     * @param int $size_id The ID of the size
     * @return \App\Models\Size The found size
     */
    public function findOrFailById(int $size_id){
        return Size::findOrFail($size_id);
    }

    /**
     * Find a size by its ID.
     *
     * @param int $size_id The ID of the size
     * @return \App\Models\Size|null The found size or null if not found
     */
    public function find(int $size_id){
        return Size::find($size_id);
    }

    /**
     * Delete a size by its ID.
     *
     * @param int $size_id The ID of the size to delete
     * @return bool True if the size is successfully deleted, false otherwise
     */
    public function destroy(int $size_id){
        return $this->find($size_id)->delete();
    }

}
