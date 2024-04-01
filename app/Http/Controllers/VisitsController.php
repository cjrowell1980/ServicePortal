<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use App\Http\Requests\StoreVisitsRequest;
use App\Http\Requests\UpdateVisitsRequest;
use Illuminate\View\View;

class VisitsController extends Controller
{

    /**
     * Initiate a new controller Instance
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-visit|edit-visit|delete-visit', ['only' => ['index','show']]);
        $this->middleware('permission:create-visit', ['only' => ['create','store']]);
        $this->middleware('permission:edit-visit', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-visit', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // nope
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisitsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Visits $visit): View
    {
        return view('visit.show', [
            'visit' => $visit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visits $visits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitsRequest $request, Visits $visits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visits $visits)
    {
        //
    }
}
