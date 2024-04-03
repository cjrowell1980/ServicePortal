@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Customer Information
            </div>
            <div class="float-end">
                <form action="{{route('customers.destroy', $customer->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('customers.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                    @can('edit-customer')
                        <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                    @endcan
                    @can('delete-customer')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')"><i class="bi bi-trash"></i> Delete</button>
                    @endcan
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="syrinx" class="col-md-4 col-form-label text-md-end text-start"><strong>Syrinx Acc:</strong></label>
                <div class="col-md-6 show-view">
                    {{$customer->syrinx}}
                </div>
            </div>
            <div class="row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Customer Name:</strong></label>
                <div class="col-md-6 show-view">
                    {{$customer->name}}
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <div class="float-start">Machine</div>
            <div class="float-end">
                <a href="{{route('machine.create', 'cust_id='.$customer->id)}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Add New Machine</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="fit-center">#</th>
                        <th scope="col" class="fit">Stock No#</th>
                        <th scope="col">Make & Model</th>
                        <th scope="col">Serial No#</th>
                        <th scope="col" class="fit-center">Warranty Status</th>
                        <th scope="col" class="fit-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customer->getMachines as $machine)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$machine->stock}}</td>
                            <td>{{$machine->make . ' ' . $machine->model}}</td>
                            <td>{{$machine->serial}}</td>
                            <td class="fit-center">
                                @if(\Carbon\Carbon::create($machine->warranty)->addMonths($machine->warranty_period)->isPast())
                                    <span class="badge rounded-pill bg-danger">Expired - {{\Carbon\Carbon::create($machine->warranty)->addMonths($machine->warranty_period)->format('j M Y')}}</span>
                                @else
                                    <span class="badge rounded-pill bg-success">Active - {{\Carbon\Carbon::create($machine->warranty)->addMonths($machine->warranty_period)->format('j M Y')}}</span>
                                @endif
                            </td>
                            <td class="fit-center">
                                <a href="{{route('machine.show', $machine->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="6" class="text-center">
                            <strong class="text-danger">No Machine Found!</strong>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
