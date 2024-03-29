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
            <form action="{{route('jobs.store')}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="customer" class="col-md-4 col-form-label text-md-end text-start">Customer:</label>
                    <div class="col-md-6">
                        <select name="customer" id="customer" class="form-control">
                            <option value="">Select customer...</option>
                            @forelse ($customers as $customer)
                                <option value="{{$customer->id}}" {{(old('customer') == $customer->id) ? "selected" : ""}}>{{$customer->syrinx . '-' .$customer->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('type'))
                            <span class="text-danger">{{$errors->first('type')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="machine" class="col-md-4 col-form-label text-md-end text-start">Machine:</label>
                    <div class="col-md-6">
                        <select name="machine" id="machine" class="form-control">
                        </select>
                        @if ($errors->has('machine'))
                            <span class="text-danger">{{$errors->first('machine')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="job_ref" class="col-md-4 col-form-label text-md-end text-start">Job Number:</label>
                    <div class="col-md-6">
                        <input type="number" name="job_ref" id="job_ref" class="form-control @error('job_ref') is-invalid @enderror" value="{{old('job_ref')}}">
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
                        <select name="type" id="type" class="form-control">
                            <option value="">Select job status...</option>
                            @forelse ($jobstatuses as $jobstatus)
                                <option value="{{$jobstatus->id}}" {{(old('jobstatus') == $jobstatus->id) ? "selected" : ""}}>{{$jobstatus->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('type'))
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
            </form>
        </div>
    </div>
@endsection

@section('endscript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            // customer selection
            $("#customer").change(function(){
                var cid = $("#customer").val();
                $.ajax({
                    url: '{{route('jobs.get_machines')}}',
                    method: 'post',
                    data: 'cid='+cid,
                    success: function(res) {
                        console.log(res);
                        let all_options = "<option value=''>Select Machine...</option>";
                        let all_machines = res.machines;
                        $.each(all_machines, function(index, value) {
                            all_options += "<option value='"+value.id+"'>"+value.stock+" - "+value.make+" "+value.model+" - ["+value.serial+"]</option>"
                        });
                        $("#machine").html(all_options);
                    }
                });
            })
        });
    </script>
@endsection

