<?php

namespace App\Http\Controllers;

use App\Models\VisitStatus;
use App\Http\Requests\StoreVisitStatusRequest;
use App\Http\Requests\UpdateVisitStatusRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VisitStatusController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-visitstatus|edit-visitstatus|delete-visitstatus', ['only' => ['index','show']]);
        $this->middleware('permission:create-visitstatus', ['only' => ['create','store']]);
        $this->middleware('permission:edit-visitstatus', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-visitstatus', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('visitstatus.index', [
            'statuses'  => VisitStatus::orderBy('order', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('visitstatus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisitStatusRequest $request): RedirectResponse
    {
        $input = $request->all();
        VisitStatus::create($input);
        return redirect()->route('visitstatus.index')
            ->withSuccess('New Visit status created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisitStatus $visitstatus): View
    {
        return view('visitstatus.show', [
            'visitstatus'    => $visitstatus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisitStatus $visitstatus): View
    {
        return view('visitstatus.edit', [
            'visitstatus'   => $visitstatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitStatusRequest $request, VisitStatus $visitstatus): RedirectResponse
    {
        $input = $request->all();
        $visitstatus->update($input);
        return redirect()->route('visitstatus.index')
            ->withSuccess('Visit Status has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisitStatus $visitstatus): RedirectResponse
    {
        $visitstatus->delete();
        return redirect()->route('visitstatus.index')
            ->withSuccess('Visit Status has been successfully deleted');
    }
}
