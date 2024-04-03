<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Http\Requests\StoreJobsRequest;
use App\Http\Requests\UpdateJobsRequest;
use App\Models\Customers;
use App\Models\JobStatus;
use App\Models\JobType;
use App\Models\Machine;
use App\Models\Visits;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobsController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-job|edit-job|delete-job', ['only' => ['index','show']]);
        $this->middleware('permission:create-job', ['only' => ['create','store', 'get_machines']]);
        $this->middleware('permission:edit-job', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-job', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('jobs.index', [
            'jobs'  => Jobs::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(count(Customers::all()) == 0) {
            return redirect()->route('customers.create')->withWarning('No customers defined');
        }
        if(count(JobType::all()) == 0) {
            return redirect()->route('jobtype.create')->withWarning('No Job Types Defined!');
        }
        if(count(JobStatus::all()) == 0) {
            return redirect()-> route('jobstatus.create')->withWarning('No Job Statuses Defined!');
        }
        $machine = Machine::find($request->id);
        return view('jobs.create', [
            'machine'       => $machine,
            'customers'     => Customers::orderBy('syrinx', 'ASC')->get(),
            'jobtypes'      => JobType::orderBy('order', 'ASC')->get(),
            'jobstatuses'   => JobStatus::orderBy('order', 'ASC')->get(),
        ]);
    }

    /**
     * update form after customer update
     */
    public function get_machines(Request $request)
    {
        $machines = Machine::where('customer', $request->cid)->get();
        return response()->json([
            'machines'  => $machines,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobsRequest $request): RedirectResponse
    {
        $input = $request->all();
        $job = Jobs::create($input);
        return redirect()->route('visit.create', 'job='.$job->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobs $job): View
    {
        return view('jobs.show', [
            'job'   => $job,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobs $job): View
    {
        return view('jobs.edit', [
            'job'           => $job,
            'jobtypes'      => JobType::orderBy('order', 'ASC')->get(),
            'jobstatuses'   => JobStatus::orderBy('order', 'ASC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobsRequest $request, Jobs $job): RedirectResponse
    {
        $input = $request->all();
        $job->update($input);
        return redirect()->route('jobs.show', $job->id)
            ->withSuccess('Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobs $jobs)
    {
        //
    }
}
