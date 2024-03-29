@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Edit Job Type</div>
            <div class="float-end">
                <form action="{{route('jobtype.destroy', $jobtype->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('jobtype.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                    @can('edit-jobtype')
                        <a href="{{route('jobtype.edit', $jobtype->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                    @endcan
                    @can('delete-jobtype')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this job type? \n\n {{$jobtype->name}}')"><i class="bi bi-trash"></i> Delete</button>
                    @endcan
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Display Order:</strong></label>
                <div class="col-md-6 show-view">
                    {{$jobtype->order}}
                </div>
            </div>
            <div class="row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                <div class="col-md-6 show-view">
                    {{$jobtype->name}}
                </div>
            </div>
        </div>
    </div>
@endsection
