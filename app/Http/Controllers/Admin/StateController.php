<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StateService;

class StateController extends Controller
{
    protected $stateService;

    /**
     * StateController constructor.
     *
     * @param StateService $stateService The state service instance
     */
    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View The view for listing states
     */
    public function index()
    {
        $states = $this->stateService->getAll();
        return view('admin.state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View The view for creating a new state
     */
    public function create()
    {
        return view('admin.state.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request The HTTP request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->stateService->create($request->all());
        return redirect()->route('admin.state');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id The state ID
     * @return \Illuminate\View\View The view for displaying a state
     */
    public function show($id)
    {
        try {
            $state = $this->stateService->getById($id);
            return view('admin.state.show', compact('state'));
        } catch (\Exception $e) {
            return redirect()->route('admin.state')->with('error', 'State not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id The state ID
     * @return \Illuminate\View\View The view for editing a state
     */
    public function edit($id)
    {
        try {
            $state = $this->stateService->getById($id);
            return view('admin.state.edit', compact('state'));
        } catch (\Exception $e) {
            return redirect()->route('admin.state')->with('error', 'State not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request The HTTP request
     * @param  int  $id The state ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $this->stateService->update($id, $request->all());
            return redirect()->route('admin.state');
        } catch (\Exception $e) {
            return redirect()->route('admin.state')->with('error', 'State not found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id The state ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->stateService->delete($id);
            return redirect()->route('admin.state');
        } catch (\Exception $e) {
            return redirect()->route('admin.state')->with('error', 'State not found.');
        }
    }
}
