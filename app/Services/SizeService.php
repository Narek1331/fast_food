<?php
namespace App\Services;

use App\Repositories\SizeRepository;

class SizeService{

    /**
     * @var SizeRepository $size_repo The size repository instance
     */
    protected $size_repo;

    /**
     * SizeService constructor.
     * 
     * @param SizeRepository $size_repo The size repository instance
     */
    public function __construct(SizeRepository $size_repo){
        $this->size_repo = $size_repo;
    }

    /**
     * Get all sizes.
     * 
     * @return mixed The collection of sizes
     */
    public function getAll(){
        return $this->size_repo->getAll();
    }

    /**
     * Paginate all sizes.
     * 
     * @param int $paginate The number of items per page
     * @return mixed The paginated collection of sizes
     */
    public function paginateAll(int $paginate = 5){
        return $this->size_repo->paginateAll($paginate);
    }

    /**
     * Store a new size.
     * 
     * @param string $name The name of the size
     * @return mixed The newly created size
     */
    public function store(string $name){
        return $this->size_repo->store($name);
    }

    /**
     * Update a size.
     * 
     * @param int $size_id The ID of the size to update
     * @param string $name The new name of the size
     * @return mixed The updated size
     */
    public function update(int $size_id, string $name){
        return $this->size_repo->update($size_id, $name);
    }

    /**
     * Find a size by its ID.
     * 
     * @param int $size_id The ID of the size to find
     * @return mixed The found size
     */
    public function findOrFailById(int $size_id){
        return $this->size_repo->findOrFailById($size_id);
    }

    /**
     * Delete a size.
     * 
     * @param int $size_id The ID of the size to delete
     * @return bool True if the size is successfully deleted, false otherwise
     */
    public function destroy(int $size_id){
        return $this->size_repo->destroy($size_id);
    }

    /**
     * Get sorted size data.
     * 
     * @return array The sorted size data
     */
    public function getSorted(){
        $sizes = $this->getAll();
        $sorted_data = [];

        foreach($sizes as $size){
            $sorted_data[$size->name] = $size->id;
        }

        return $sorted_data;
    }
}
