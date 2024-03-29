@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Customer
                </div>
                <div class="float-end">
                    <a href="{{ route('customers.index') }}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('customers.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="syrinx" class="col-md-4 col-form-label text-md-end text-start">Syrinx Acc#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('syrinx') is-invalid @enderror" id="syrinx" name="syrinx" value="{{ old('syrinx') }}">
                            @if ($errors->has('syrinx'))
                                <span class="text-danger">{{ $errors->first('syrinx') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Customer">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
