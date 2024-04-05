<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use App\Models\Customers;
use App\Models\Jobs;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MachineController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-machine|edit-machine|delete-machine', ['only' => ['index','show']]);
        $this->middleware('permission:create-machine', ['only' => ['create','store']]);
        $this->middleware('permission:edit-machine', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-machine', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('machine.index', [
            'machine'  => Machine::latest('id')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('machine.create', [
            'customers' => Customers::all(),
            'cust_id'   => $request->cust_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMachineRequest $request): RedirectResponse
    {
        $input = $request->all();
        $input['stock'] = strtoupper($request->stock);
        $input['asset'] = strtoupper($request->asset);
        $input['make'] = ucwords($request->make);
        $input['model'] = ucwords($request->model);
        $input['serial'] = strtoupper($request->serial);
        $machine = Machine::create($input);
        return redirect()->route('jobs.create', 'id=' . $machine->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Machine $machine): View
    {
        return view('machine.show', [
            'jobs'      => Jobs::where('machine', $machine->id)->get(),
            'machine'   => $machine,
            'warranty'  => Carbon::create($machine->warranty)->addMonths($machine->warranty_period),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine): View
    {
        return view('machine.edit', [
            'customers' => Customers::all(),
            'machine'   => $machine,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMachineRequest $request, Machine $machine): RedirectResponse
    {
        $input = $request->all();
        $input['stock'] = strtoupper($request->stock);
        $input['asset'] = strtoupper($request->asset);
        $input['make'] = ucwords($request->make);
        $input['model'] = ucwords($request->model);
        $input['serial'] = strtoupper($request->serial);
        $machine->update($input);
        return redirect()->route('machine.show', $machine->id)
            ->withSuccess('Machine has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machine): RedirectResponse
    {
        $machine->delete();
        return redirect()->route('machine.index')
            ->withSuccess('Machine has been successfully deleted');
    }
}
