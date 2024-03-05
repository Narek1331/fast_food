<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SizeService;
use App\Http\Requests\Admin\StoreOrUpdateSizeRequest;

class SizeController extends Controller
{
    /**
     * SizeService instance.
     *
     * @var SizeService
     */
    protected $size_serv;

    /**
     * Constructor to initialize SizeController.
     *
     * @param SizeService $size_serv The SizeService instance.
     *
     * @return void
     */
    public function __construct(SizeService $size_serv)
    {
        $this->size_serv = $size_serv;
    }

    /**
     * Display a listing of the sizes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sizes = $this->size_serv->paginateAll(5);
        return view('admin.product.size.index', ['sizes' => $sizes]);
    }

    /**
     * Show the form for creating a new size.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product.size.create');
    }

    /**
     * Store a newly created size in storage.
     *
     * @param StoreOrUpdateSizeRequest $request The form request instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreOrUpdateSizeRequest $request)
    {
        $this->size_serv->store($request->name);

        return redirect()->route('admin.product.size');
    }

    /**
     * Show the form for editing the specified size.
     *
     * @param int $id The ID of the size to be edited.
     *
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $size = $this->size_serv->findOrFailById($id);
        return view('admin.product.size.edit', ['size' => $size]);
    }

    /**
     * Update the specified size in storage.
     *
     * @param int                      $id      The ID of the size to be updated.
     * @param StoreOrUpdateSizeRequest $request The form request instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $id, StoreOrUpdateSizeRequest $request)
    {
        $this->size_serv->findOrFailById($id);
        $this->size_serv->update($id, $request->name);
        return redirect()->route('admin.product.size');
    }

    /**
     * Remove the specified size from storage.
     *
     * @param int $id The ID of the size to be deleted.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->size_serv->findOrFailById($id);
        $this->size_serv->destroy($id);
        return redirect()->route('admin.product.size');
    }
}
