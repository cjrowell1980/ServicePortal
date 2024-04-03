@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Create New Visit</div>
            <div class="float-end">
                <a href="{{route('jobs.show', $job->id)}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="body">
            <form action="{{route('visit.store')}}" method="POST">
                @csrf
                <input type="hidden" name="job" id="job" value="{{$job->id}}">
                <div class="my-3 row">
                    <label for="status" class="col-md-4 col-form-label text-md-end text-start">Status:</label>
                    <div class="col-md-6">
                        <select name="status" id="status" class="form-control">
                            @forelse ($visitstatuses as $status)
                                <option value="{{$status->id}}"{{($status->id == config('settings.default_visit_open_status')) ? " selected" : ""}}>{{$status->name}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="notes" class="col-md-4 col-form-label text-md-end text-start">Notes:</label>
                    <div class="col-md-6">
                        <textarea name="notes" id="notes" rows="3" class="form-control">{{old('notes')}}</textarea>
                        @if ($errors->has('notes'))
                            <span class="text-danger">{{$errors->first('notes')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="engineer" class="col-md-4 col-form-label text-md-end text-start">Engineer:</label>
                    <div class="col-md-6">
                        <select name="engineer" id="engineer" class="form-control">
                            <option value="">Select Engineer...</option>
                            @forelse ($engineers as $engineer)
                                <option value="{{$engineer->id}}"{{(old('engineer') == $engineer->id) ? " selected" : ""}}>[{{$engineer->short}}] {{$engineer->long}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" class="col-md-3 offset-md-5 btn btn-primary">Add New Visit Status</button>
                </div>
            </form>
        </div>
    </div>
@endsection
