@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Customer List</div>
            <div class="float-end">
                <!-- searchbar -->
                @can('create-customer')
                    <a href="{{route('customers.create')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Add New Customer</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th scope="col" class="fit-center">#</th>
                    <th scope="col" class="fit-center">Syrinx Acc#</th>
                    <th scope="col">Name</th>
                    <th scope="col" class="fit-center">Action</th>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td class="text-center">{{$customer->syrinx}}</td>
                            <td>{{$customer->name}}</td>
                            <td class="fit-center">
                                <a href="{{route('customers.show', $customer->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4" class="text-center">
                            <span class="text-danger">
                                <strong>No Customers Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
            {{$customers->links()}}
        </div>
    </div>
@endsection
