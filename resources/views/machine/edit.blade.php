@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Edit Machine</div>
            <div class="float-end">
                <a href="{{route('machine.show', $machine->id)}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('machine.update', $machine->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="customer" class="col-md-4 col-form-label text-md-end text-start">Customer:</label>
                    <div class="col-md-6">
                        <select name="customer" id="customer" class="selectpicker form-control" data-live-search="true">
                            <option value="">Select Customer</option>
                            @forelse ($customers as $customer)
                                <option value="{{$customer->id}}" {{($machine->getCustomer->id == $customer->id) ? 'selected' : ''}}>[{{$customer->syrinx}}] {{$customer->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('customer'))
                            <span class="text-danger">{{$errors->first('customer')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="stock" class="col-md-4 col-form-label text-md-end text-start">Stock No#:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ $machine->stock }}">
                        @if ($errors->has('stock'))
                            <span class="text-danger">{{ $errors->first('stock') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="asset" class="col-md-4 col-form-label text-md-end text-start">Asset No#:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('asset') is-invalid @enderror" id="asset" name="asset" value="{{ $machine->asset }}">
                        @if ($errors->has('asset'))
                            <span class="text-danger">{{ $errors->first('asset') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="make" class="col-md-4 col-form-label text-md-end text-start">Make:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('make') is-invalid @enderror" id="make" name="make" value="{{ $machine->make }}">
                        @if ($errors->has('make'))
                            <span class="text-danger">{{ $errors->first('make') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="model" class="col-md-4 col-form-label text-md-end text-start">Model:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ $machine->model }}">
                        @if ($errors->has('model'))
                            <span class="text-danger">{{ $errors->first('model') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="serial" class="col-md-4 col-form-label text-md-end text-start">Serial No#:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('serial') is-invalid @enderror" id="serial" name="serial" value="{{$machine->serial}}">
                        @if ($errors->has('serial'))
                            <span class="text-danger">{{ $errors->first('serial') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="yom" class="col-md-4 col-form-label text-md-end text-start">Year of Manufacturer:</label>
                    <div class="col-md-6">
                        <input type="number" min="1900" max="{{now()->year +1}}" class="form-control @error('yom') is-invalid @enderror" id="yom" name="yom" value="{{ $machine->yom }}">
                        @if ($errors->has('yom'))
                            <span class="text-danger">{{ $errors->first('yom') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="warranty" class="col-md-4 col-form-label text-md-end text-start">Warranty Start:</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control @error('warranty') is-invalid @enderror" id="warranty" name="warranty" value="{{ $machine->warranty }}">
                        @if ($errors->has('warranty'))
                            <span class="text-danger">{{ $errors->first('warranty') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="warranty_term" class="col-md-4 col-form-label text-md-end text-start">Warranty Period (Months):</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control @error('warranty_term') is-invalid @enderror" id="warranty_period" name="warranty_period" value="{{ $machine->warranty_period }}">
                        @if ($errors->has('warranty_term'))
                            <span class="text-danger">{{ $errors->first('warranty_term') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <input type="submit" value="Update Machine" class="col-md-3 offset-md-5 btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('endscript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.selectpicker').selectpicker();
        })
    </script>
@endsection
