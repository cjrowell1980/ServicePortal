@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Create New Visit Status</div>
            <div class="float-end">
                <a href="{{route('visitstatus.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('visitstatus.store')}}" method="POST">
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
                    <label for="colour" class="col-md-4 col-form-label text-md-end text-start">Colour:</label>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input" value="primary">
                            <span class="badge rounded-pill bg-primary w-25">Primary</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input" value="secondary">
                            <span class="badge rounded-pill bg-secondary w-25">Secondary</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input" value="success">
                            <span class="badge rounded-pill bg-success w-25">Success</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input" value="info">
                            <span class="badge rounded-pill bg-info w-25">Info</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input" value="warning">
                            <span class="badge rounded-pill bg-warning w-25">Warning</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input" value="danger">
                            <span class="badge rounded-pill bg-danger w-25">Danger</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input" value="light">
                            <span class="badge rounded-pill bg-light w-25">Light</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input" value="dark">
                            <span class="badge rounded-pill bg-dark w-25">Dark</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" class="col-md-3 offset-md-5 btn btn-primary">Add New Visit Status</button>
                </div>
            </form>
        </div>
    </div>
@endsection
