<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use App\Http\Requests\StoreJobTypeRequest;
use App\Http\Requests\UpdateJobTypeRequest;
use App\Models\JobStatus;
use Illuminate\Http\Client\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JobTypeController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-jobtype|edit-jobtype|delete-jobtype', ['only' => ['index','show']]);
        $this->middleware('permission:create-jobtype', ['only' => ['create','store']]);
        $this->middleware('permission:edit-jobtype', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-jobtype', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('jobtype.index', [
            'jobtypes'  => JobType::orderBy('order', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jobtype.create', [
            'jobtype'   => JobType::all(),
            'jobstatus' => JobStatus::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobTypeRequest $request): RedirectResponse
    {
        $jobtype = JobType::create($request->all());
        return redirect()->route('jobtype.index')
            ->withSuccess('Job Type has been successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobType $jobtype): View
    {
        return view('jobtype.show', [
            'jobtype'   => $jobtype,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobType $jobtype): View
    {
        return view('jobtype.edit', [
            'jobtype'   => $jobtype,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobTypeRequest $request, JobType $jobtype): RedirectResponse
    {
        $jobtype->update($request->all());
        return redirect()->route('jobtype.show', $jobtype->id)
            ->withSuccess('Job Type has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobType $jobtype): RedirectResponse
    {
        $jobtype->delete();
        return redirect()->route('jobtype.index')
            ->withSuccess('Job Type has been successfully deleted.');
    }
}
