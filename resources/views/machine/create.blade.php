@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">New Machine</div>
            <div class="float-end">
                <a href="{{route('machine.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('machine.store')}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="customer" class="col-md-4 col-form-label text-md-end text-start">Customer:</label>
                    <div class="col-md-6">
                        <select name="customer" id="customer" class="
                        form-control" data-live-search="true" {{($cust_id != null) ? 'readonly' : ''}}>
                            <option value="">Select Customer</option>
                            @forelse ($customers as $customer)
                                <option value="{{$customer->id}}" {{($cust_id == $customer->id) ? 'selected' : ''}}>[{{strtoupper($customer->syrinx)}}] {{ucwords($customer->name)}}</option>
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
                        <input type="text" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{old('stock')}}">
                        @if ($errors->has('stock'))
                            <span class="text-danger">{{$errors->first('stock')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="asset" class="col-md-4 col-form-label text-md-end text-start">Asset No#:</label>
                    <div class="col-md-6">
                        <input type="text" name="asset" id="asset" class="form-control @error('asset') is-invalid @enderror" value="{{old('asset')}}">
                        @if ($errors->has('asset'))
                            <span class="text-danger">{{$errors->first('asset')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="make" class="col-md-4 col-form-label text-md-end text-start">Make:</label>
                    <div class="col-md-6">
                        <input type="text" name="make" id="make" class="form-control @error('make') is-invalid @enderror" value="{{old('make')}}">
                        @if ($errors->has('make'))
                            <span class="text-danger">{{$errors->first('make')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="model" class="col-md-4 col-form-label text-md-end text-start">Model:</label>
                    <div class="col-md-6">
                        <input type="text" name="model" id="model" class="form-control @error('model') is-invalid @enderror" value="{{old('model')}}">
                        @if ($errors->has('model'))
                            <span class="text-danger">{{$errors->first('model')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="serial" class="col-md-4 col-form-label text-md-end text-start">Serial No#:</label>
                    <div class="col-md-6">
                        <input type="text" name="serial" id="serial" class="form-control @error('serial') is-invalid @enderror" value="{{old('serial')}}">
                        @if ($errors->has('serial'))
                            <span class="text-danger">{{$errors->first('serial')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="yom" class="col-md-4 col-form-label text-md-end text-start">Year of Manufacturer:</label>
                    <div class="col-md-6">
                        <input type="number" min="1900" max="{{now()->year +1}}" name="yom" id="yom" class="form-control @error('yom') is-invalid @enderror" value="{{old('yom')}}">
                        @if ($errors->has('yom'))
                            <span class="text-danger">{{$errors->first('yom')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="warranty" class="col-md-4 col-form-label text-md-end text-start">Warranty Start Date:</label>
                    <div class="col-md-6">
                        <input type="date" name="warranty" id="warranty" class="form-control @error('warranty') is-invalid @enderror" value="{{old('warranty')}}">
                        @if ($errors->has('warranty'))
                            <span class="text-danger">{{$errors->first('warranty')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="warranty_period" class="col-md-4 col-form-label text-md-end text-start">Warranty Period (Months):</label>
                    <div class="col-md-6">
                        <input type="number" name="warranty_period" id="warranty_period" class="form-control @error('warranty_period') is-invalid @enderror" value="{{old('warranty_period')}}">
                        @if ($errors->has('warranty_period'))
                            <span class="text-danger">{{$errors->first('warranty_period')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <input type="submit" value="Add New Machine" class="col-md-3 offset-md-5 btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('endscript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.selectpicker').selectpicker();
        })
    </script>
@endsection
