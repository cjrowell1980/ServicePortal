<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Http\Requests\StoreJobsRequest;
use App\Http\Requests\UpdateJobsRequest;
use App\Models\Customers;
use App\Models\JobStatus;
use App\Models\JobType;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    public function create()
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
        return view('jobs.create', [
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
    public function store(StoreJobsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobs $jobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobs $jobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobsRequest $request, Jobs $jobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobs $jobs)
    {
        //
    }
}
