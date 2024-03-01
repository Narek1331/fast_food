<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\IngredientService;
use App\Services\LanguageService;
use App\Http\Requests\Admin\StoreOrUpdateIngredientRequest;

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
    public function __construct(
        IngredientService $ingredient_serv,
        LanguageService $language_serv,

        )
    {
        $this->ingredient_serv = $ingredient_serv;
        $this->language_serv = $language_serv;
    }

    /**
     * Display a listing of the ingredients.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $languages = $this->language_serv->getAll();
        $ingredients = $this->ingredient_serv->paginateAll(5);
        return view('admin.product.ingredient.index', [
            'languages' => $languages,
            'ingredients' => $ingredients
        ]);
    }

    /**
     * Show the form for creating a new ingredient.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $languages = $this->language_serv->getAll();

        return view('admin.product.ingredient.create',['languages'=> $languages]);
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
        $this->ingredient_serv->store($request->validated());

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
        $languages = $this->language_serv->getAll();
        $ingredient = $this->ingredient_serv->findWithAllLanguages($id);
        return view('admin.product.ingredient.edit', [
            'ingredient' => $ingredient,
            'languages' => $languages
        ]);
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
        $this->ingredient_serv->update($id, $request->validated());
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
