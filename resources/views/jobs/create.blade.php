@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Create New Job</div>
            <div class="float-end">
                <a href="{{url()->previous()}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">

            @if ($message = Session::get('errors'))
            <div class="alert alert-warning text-center alert-dismissible" role="alert">
                <button class="btn-close" data-bs-dismiss="alert"></button>
                <h4 class="alert-heading">Warning!</h4>
                <p class="mb-0">{{ $message }}</p>
            </div>
        @endif

            <form action="{{route('jobs.store')}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="customer" class="col-md-4 col-form-label text-md-end text-start">Customer:</label>
                    <div class="col-md-6">
                        <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{$machine->getCustomer->name}}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="machine" class="col-md-4 col-form-label text-md-end text-start">Machine:</label>
                    <div class="col-md-6">
                        <input type="text" name="machine_name" id="machine_name" class="form-control" value="[{{$machine->stock . '] ' . $machine->make . ' ' . $machine->model}}" disabled>
                        <input type="hidden" name="machine" id="hidden" value="{{$machine->id}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="job_ref" class="col-md-4 col-form-label text-md-end text-start">Job Number:</label>
                    <div class="col-md-6">
                        <input type="string" name="job_ref" id="job_ref" class="form-control @error('job_ref') is-invalid @enderror" value="{{old('job_ref')}}">
                        @if ($errors->has('job_ref'))
                            <span class="text-danger">{{$errors->first('job_ref')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="type" class="col-md-4 col-form-label text-md-end text-start">Job Type:</label>
                    <div class="col-md-6">
                        <select name="type" id="type" class="form-control">
                            <option value="">Select job type...</option>
                            @forelse ($jobtypes as $jobtype)
                                <option value="{{$jobtype->id}}" {{(old('jobtype') == $jobtype->id) ? "selected" : ""}}>{{$jobtype->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('type'))
                            <span class="text-danger">{{$errors->first('type')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-md-4 col-form-label text-md-end text-start">Job Status:</label>
                    <div class="col-md-6">
                        <select name="status" id="status" class="form-control">
                            @forelse ($jobstatuses as $jobstatus)
                                <option value="{{$jobstatus->id}}" {{((old('jobstatus') == $jobstatus->id) || (config('settings.default_job_open') == $jobstatus->id)) ? "selected" : ""}}>{{$jobstatus->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('status'))
                            <span class="text-danger">{{$errors->first('type')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="reported" class="col-md-4 col-form-label text-md-end text-start">Reported Fault:</label>
                    <div class="col-md-6">
                        <textarea name="reported" id="reported" rows="3" class="form-control">{{old('reported')}}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Job">
                </div>
            </form>
        </div>
    </div>
@endsection
