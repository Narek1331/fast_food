<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\IngredientService;

class IngredientController extends Controller
{
    /**
     * IngredientService instance.
     *
     * @var IngredientService
     */
    protected $ingredient_serv;

    /**
     * Constructor to initialize IngredientController.
     *
     * @param IngredientService $ingredient_serv The IngredientService instance.
     *
     * @return void
     */
    public function __construct(IngredientService $ingredient_serv)
    {
        $this->ingredient_serv = $ingredient_serv;
    }

    /**
     * Display a listing of the ingredients.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ingredients = $this->ingredient_serv->paginateAll(5);
        return view('admin.product.ingredient.index', ['ingredients' => $ingredients]);
    }

    /**
     * Show the form for creating a new ingredient.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product.ingredient.create');
    }

    /**
     * Store a newly created ingredient in storage.
     *
     * @param StoreOrUpdateIngredientRequest $request The form request instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreOrUpdateIngredientRequest $request)
    {
        $this->ingredient_serv->store($request->name);

        return redirect()->route('admin.product.ingredient');
    }

    /**
     * Show the form for editing the specified ingredient.
     *
     * @param int $id The ID of the ingredient to be edited.
     *
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $ingredient = $this->ingredient_serv->findOrFailById($id);
        return view('admin.product.ingredient.edit', ['ingredient' => $ingredient]);
    }

    /**
     * Update the specified ingredient in storage.
     *
     * @param int                      $id      The ID of the ingredient to be updated.
     * @param StoreOrUpdateIngredientRequest $request The form request instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $id, StoreOrUpdateIngredientRequest $request)
    {
        $this->ingredient_serv->findOrFailById($id);
        $this->ingredient_serv->update($id, $request->name);
        return redirect()->route('admin.product.ingredient');
    }

    /**
     * Remove the specified ingredient from storage.
     *
     * @param int $id The ID of the ingredient to be deleted.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->ingredient_serv->findOrFailById($id);
        $this->ingredient_serv->destroy($id);
        return redirect()->route('admin.product.ingredient');
    }
}
