@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Update Engineer
                </div>
                <div class="float-end">
                    <a href="{{ route('engineer.index') }}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('engineer.update', $engineer->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <label for="long" class="col-md-4 col-form-label text-md-end text-start">Full Name:</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('long') is-invalid @enderror" id="long" name="long" value="{{$engineer->long}}">
                            @if ($errors->has('long'))
                                <span class="text-danger">{{ $errors->first('long') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="short" class="col-md-4 col-form-label text-md-end text-start">Short Name:</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('short') is-invalid @enderror" id="short" name="short" value="{{$engineer->short}}">
                            @if ($errors->has('short'))
                                <span class="text-danger">{{ $errors->first('short') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">eMail Address:</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$engineer->email}}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="number" class="col-md-4 col-form-label text-md-end text-start">Contact Number:</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{$engineer->number}}">
                            @if ($errors->has('number'))
                                <span class="text-danger">{{ $errors->first('number') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Customer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
