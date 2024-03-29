<?php

namespace App\Http\Controllers;

use App\Models\JobStatus;
use App\Http\Requests\StoreJobStatusRequest;
use App\Http\Requests\UpdateJobStatusRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JobStatusController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-jobstatus|edit-jobstatus|delete-jobstatus', ['only' => ['index','show']]);
        $this->middleware('permission:create-jobstatus', ['only' => ['create','store']]);
        $this->middleware('permission:edit-jobstatus', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-jobstatus', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('jobstatus.index', [
            'jobstatuses'   => JobStatus::orderBy('order', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jobstatus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobStatusRequest $request): RedirectResponse
    {
        $jobstatus = JobStatus::create($request->all());
        return redirect()->route('jobstatus.show', $jobstatus->id)
            ->withSuccess('Job Status has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobStatus $jobstatus): View
    {
        return view('jobstatus.show', [
            'jobstatus' => $jobstatus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobStatus $jobstatus): View
    {
        return view('jobstatus.edit', [
            'jobstatus' => $jobstatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobStatusRequest $request, JobStatus $jobstatus): RedirectResponse
    {
        $jobstatus->update($request->all());
        return redirect()->route('jobstatus.show', $jobstatus->id)
            ->withSuccess('Job Status has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobStatus $jobstatus): RedirectResponse
    {
        $jobstatus->delete();
        return redirect()->route('jobstatus.index')
            ->withSuccess('Job Status has been successfully deleted');
    }
}
