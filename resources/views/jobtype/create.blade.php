@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">New Job Type</div>
            <div class="float-end">
                <a href="{{route('jobtype.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('jobtype.store')}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="order" class="col-md-4 col-form-label text-md-end text-start">Display Order:</label>
                    <div class="col-md-6">
                        <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{old('order')}}">
                        @if ($errors->has('order'))
                            <span class="text-danger">{{$errors->first('order')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name:</label>
                    <div class="col-md-6">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" class="col-md-3 offset-md-5 btn btn-primary">Add New Job Type</button>
                </div>
            </form>
        </div>
    </div>
@endsection
