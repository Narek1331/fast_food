<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SettlementService;
use App\Services\StateService;
use App\Http\Requests\Admin\StoreOrUpdateSettlementRequest;

class SettlementController extends Controller
{

    /**
     * SettlementController constructor.
     *
     * @param SettlementService $settlementService The settlement service instance
     */
    public function __construct(
        StateService $stateService,
        SettlementService $settlementService,
        )
    {
        $this->settlementService = $settlementService;
        $this->stateService = $stateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View The view for listing settlements
     */
    public function index()
    {
        $settlements = $this->settlementService->paginateAll();
        $states = $this->stateService->getAll();
        return view('admin.settlement.index', compact('settlements','states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View The view for creating a new settlement
     */
    public function create()
    {
        $states = $this->stateService->getAll();
        return view('admin.settlement.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request The HTTP request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreOrUpdateSettlementRequest $request)
    {
        $this->settlementService->create($request->validated());
        return redirect()->route('admin.settlement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id The settlement ID
     * @return \Illuminate\View\View The view for displaying a settlement
     */
    public function show($id)
    {
        try {
            $settlement = $this->settlementService->getById($id);
            return view('admin.settlement.show', compact('settlement'));
        } catch (\Exception $e) {
            return redirect()->route('admin.settlement')->with('error', 'Settlement not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id The settlement ID
     * @return \Illuminate\View\View The view for editing a settlement
     */
    public function edit($id)
    {
        try {
            $states = $this->stateService->getAll();
            $settlement = $this->settlementService->getById($id);
            return view('admin.settlement.edit', compact('settlement','states'));
        } catch (\Exception $e) {
            return redirect()->route('admin.settlement')->with('error', 'Settlement not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request The HTTP request
     * @param  int  $id The settlement ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreOrUpdateSettlementRequest $request, $id)
    {
        try {
            $this->settlementService->update($id, $request->validated());
            return redirect()->route('admin.settlement');
        } catch (\Exception $e) {
            return redirect()->route('admin.settlement')->with('error', 'Settlement not found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id The settlement ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->settlementService->delete($id);
            return redirect()->route('admin.settlement');
        } catch (\Exception $e) {
            return redirect()->route('admin.settlement')->with('error', 'Settlement not found.');
        }
    }
}
