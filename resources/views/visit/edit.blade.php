@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Edit Visit - {{$visit->getJob->job_ref}} - {{$visit->getJob->getMachine->getCustomer->name}} - {{$visit->getJob->getMachine->make}} {{$visit->getJob->getMachine->model}}</div>
            <div class="float-end">
                <a href="{{route('jobs.show', $visit->job)}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('visit.update', $visit->id)}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="job" id="job" value="{{$visit->job}}">
                <div class="mb-3 row">
                    <label for="engineer" class="col-md-4 col-form-label text-md-end text-start">Engineer:</label>
                    <div class="col-md-6">
                        <select name="engineer" id="engineer" class="form-control">
                            <option value="">Select Engineer</option>
                            @forelse ($engineers as $engineer)
                                <option value="{{$engineer->id}}"{{($visit->engineer == $engineer->id) ? ' selected' : ''}}>[{{$engineer->short}}] - {{$engineer->long}}</option>
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('engineer'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-md-4 col-form-label text-md-end text-start">Status:</label>
                    <div class="col-md-6">
                        <select name="status" id="status" class="form-control">
                            @forelse ($statuses as $status)
                                <option value="{{$status->id}}"{{($visit->status == $status->id) ? ' selected' : ''}}>{{$status->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('statuse'))
                            <span class="text-danger">{{$errors->first('status')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="notes" class="col-md-4 col-form-label text-md-end text-start">Notes:</label>
                    <div class="col-md-6">
                        <textarea name="notes" id="notes" rows="3" class="form-control">{!!$visit->notes!!}</textarea>
                        @if ($errors->has('notes'))
                            <span class="text-danger">{{$errors->first('notes')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="report" class="col-md-4 col-form-label text-md-end text-start">Visit Report:</label>
                    <div class="col-md-6">
                        <textarea name="report" id="report" rows="3" class="form-control">{!!$visit->report!!}</textarea>
                        @if ($errors->has('report'))
                            <span class="text-danger">{{$errors->first('report')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="flags" class="col-md-4 col-form-label text-md-end text-start py-0">Flags:</label>
                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="js" id="js" value="1"{{($visit->js) ? ' checked' : ''}}>
                            <label for="js" class="form-check-label">Job Sheet Recieved</label>
                        </div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="ph" id="ph" value="1"{{($visit->ph) ? ' checked' : ''}}>
                            <label for="ph" class="form-check-label">Photos Recieved</label>
                        </div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="pi" id="pi" value="1"{{($visit->pi) ? ' checked' : ''}}>
                            <label for="pi" class="form-check-label">Payable Invoice Recieved</label>
                        </div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="ci" id="ci" value="1"{{($visit->ci) ? ' checked' : ''}}>
                            <label for="ci" class="form-check-label">Chargeable Invoice/Claim Sent</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <input type="submit" value="Update Visit" class="col-md-3 offset-md-5 btn btn-primary">
                </div>
                <div class="mb-3 row">
                    <label for="report" class="col-md-4 col-form-label text-md-end text-start py-0"></label>
                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="visit" id="visit" value="1">
                            <label for="visit" class="form-check-label">Re-visit Required (auto create new visit)</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
