<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use App\Http\Requests\StoreVisitsRequest;
use App\Http\Requests\UpdateVisitsRequest;
use App\Models\Engineers;
use App\Models\Jobs;
use App\Models\VisitStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function create(Request $request): View
    {
        return view('visit.create', [
            'job'           => Jobs::find($request->job),
            'visitstatuses' => VisitStatus::orderBy('order', 'ASC')->get(),
            'engineers'     => Engineers::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisitsRequest $request): RedirectResponse
    {
        $input = $request->all();
        $visit = Visits::create($input);
        return redirect()->route('jobs.show', $visit->job);
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
    public function edit(Visits $visit): View
    {
        return view('visit.edit', [
            'visit'     => $visit,
            'engineers' => Engineers::all(),
            'statuses'  => VisitStatus::orderBy('order', 'ASC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitsRequest $request, Visits $visit): RedirectResponse
    {
        $input = $request->all();
        $input['js'] = $request->js ? 1 : 0 ?? 0;
        $input['ph'] = $request->ph ? 1 : 0 ?? 0;
        $input['ci'] = $request->ci ? 1 : 0 ?? 0;
        $input['pi'] = $request->pi ? 1 : 0 ?? 0;
        $visit->update($input);
        if ($request->visit == '1') {
            return redirect()->route('visit.create', "job=".$visit->job);
        } else {
            return redirect()->route('jobs.show', $visit->job);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visits $visits)
    {
        //
    }
}
