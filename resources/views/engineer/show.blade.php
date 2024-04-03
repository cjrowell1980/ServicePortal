@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Edit Engineer</div>
            <div class="float-end">
                <form action="{{route('engineer.destroy', $engineer->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('engineer.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                    @can('edit-engineer')
                        <a href="{{route('engineer.edit', $engineer->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                    @endcan
                    @can('delete-engineer')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this engineer?')"><i class="bi bi-trash"></i> Delete</button>
                    @endcan
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="short" class="col-md-4 col-form-label text-md-end text-start"><strong>Short Name:</strong></label>
                <div class="col-md-6 show-view">
                    {{$engineer->short}}
                </div>
            </div>
            <div class="row">
                <label for="long" class="col-md-4 col-form-label text-md-end text-start"><strong>Full Name:</strong></label>
                <div class="col-md-6 show-view">
                    {{$engineer->long}}
                </div>
            </div>
            <div class="row">
                <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>eMail:</strong></label>
                <div class="col-md-6 show-view">
                    <div class="float-start">{{$engineer->email}}</div>
                    <div class="float-end"><a href="mailto:{{$engineer->email}}" class="btn btn-sm btn-info"><i class="bi bi-envelope-at"></i> Send eMail</a></div>
                </div>
            </div>
            <div class="row">
                <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Contact Number:</strong></label>
                <div class="col-md-6 show-view">
                    {{$engineer->number}}
                </div>
            </div>
        </div>
    </div>
@endsection
