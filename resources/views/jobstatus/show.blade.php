@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">View Job Status</div>
            <div class="float-end">
                <form action="{{route('jobstatus.destroy', $jobstatus->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('jobstatus.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                    @can('edit-jobstatus')
                        <a href="{{route('jobstatus.edit', $jobstatus->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                    @endcan
                    @can('delete-jobstatus')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this job status')"><i class="bi bi-trash"></i> Delete</button>
                    @endcan
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Display Order:</strong></label>
                <div class="col-md-6 show-view">
                    {{$jobstatus->order}}
                </div>
            </div>
            <div class="row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                <div class="col-md-6 show-view">
                    {{$jobstatus->name}}
                </div>
            </div>
            <div class="row">
                <label for="colour" class="col-md-4 col-form-label text-md-end text-start"><strong>Colour:</strong></label>
                <div class="col-md-6 show-view">
                    <span class="badge rounded-pill bg-{{$jobstatus->colour}} w-25">{{$jobstatus->colour}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
