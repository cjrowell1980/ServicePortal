@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Edit Job - </div>
            <div class="float-end">
                <a href="{{route('jobs.show', $job->id)}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('jobs.update', $job->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="job_ref" class="col-md-4 col-form-label text-md-end text-start">Job Number:</label>
                    <div class="col-md-6">
                        <input type="text" name="job_ref" id="job_ref" class="form-control" value="{{$job->job_ref}}">
                        @if ($errors->has('job_ref'))
                            <span class="text-danger">{{$errors->first('job_ref')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="order" class="col-md-4 col-form-label text-md-end text-start">Customer:</label>
                    <div class="col-md-6">
                        <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{$job->getMachine->getCustomer->name}}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="order" class="col-md-4 col-form-label text-md-end text-start">Machine:</label>
                    <div class="col-md-6">
                        <input type="text" name="machine_name" id="machine_name" class="form-control" value="[{{$job->getMachine->stock}}] - {{$job->getMachine->make}} {{$job->getMachine->model}}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="type" class="col-md-4 col-form-label text-md-end text-start">Job Type:</label>
                    <div class="col-md-6">
                        <select name="type" id="type" class="form-control">
                            @forelse ($jobtypes as $jobtype)
                                <option value="{{$jobtype->id}}" {{($jobtype->id == $job->type) ? " selected" : ""}}>{{$jobtype->name}}</option>
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
                                <option value="{{$jobstatus->id}}" {{($jobstatus->id == $job->status) ? " selected" : ""}}>{{$jobstatus->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('status'))
                            <span class="text-danger">{{$errors->first('status')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="reported" class="col-md-4 col-form-label text-md-end text-start">Reported Fault:</label>
                    <div class="col-md-6">
                        <textarea name="reported" id="reported" rows="3" class="form-control">{!! $job->reported !!}</textarea>
                        @if ($errors->has('reported'))
                            <span class="text-danger">{{$errors->first('reported')}}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row">
                    <button type="submit" class="col-md-3 offset-md-5 btn btn-primary">Update Job</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('endscript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.js"></script>
    <script>
        $(document).ready(function(){
            $('.selectpicker select').selectpicker();
        })
    </script>
@endsection
