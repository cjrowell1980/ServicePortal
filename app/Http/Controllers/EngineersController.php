<?php

namespace App\Http\Controllers;

use App\Models\Engineers;
use App\Http\Requests\StoreEngineersRequest;
use App\Http\Requests\UpdateEngineersRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EngineersController extends Controller
{
    /**
     * Instantiate a new CustomerController instance.
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:create-customer|edit-customer|delete-customer', ['only' => ['index','show']]);
    //     $this->middleware('permission:create-customer', ['only' => ['create','store']]);
    //     $this->middleware('permission:edit-customer', ['only' => ['edit','update']]);
    //     $this->middleware('permission:delete-customer', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('engineer.index', [
            'engineers' => Engineers::latest('id')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('engineer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEngineersRequest $request): RedirectResponse
    {
        $input = $request->all();
        Engineers::create($input);
        return redirect()->route('engineer.index')
            ->withSuccess('Engineer has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Engineers $engineer): View
    {
        return view('engineer.show', [
            'engineer'  => $engineer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Engineers $engineer): View
    {
        return view('engineer.edit', [
            'engineer'  => $engineer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEngineersRequest $request, Engineers $engineer): RedirectResponse
    {
        $input = $request->all();
        $engineer->update($input);
        return redirect()->route('engineer.index')
            ->withSuccess('Engineer has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Engineers $engineer): RedirectResponse
    {
        $engineer->delete();
        return redirect()->route('engineer.index')
            ->withSuccess('Engineer has been successfully deleted');
    }
}
