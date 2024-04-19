@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Machine List
            </div>
            <div class="float-end">
                @can('create-machine')
                    <a href="{{route('machine.create')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Add New Machine</a>
                @endcan
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
                        <th scope="col" class="fit-center">Open Jobs</th>
                        <th scope="col" class="fit-center">Warranty Status</th>
                        <th scope="col" class="fit-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($machines as $machine)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td class="fit">{{$machine->stock}}</td>
                            <td>{{$machine->make .' '. $machine->model}}</td>
                            <td>{{$machine->serial}}</td>
                            <td class="fit-center">tbc</td>
                            <td class="fit-center">
                                @if (empty($machine->warranty) || empty($machine->warranty_period))
                                    <span class="badge rounded-pill bg-info w-100">Not Set</span>
                                @else

                                    @if (\Carbon\Carbon::parse(\Carbon\Carbon::create($machine->warranty)->addMonths($machine->warranty_period))->isPast())
                                        <span class="badge rounded-pill bg-danger w-100">Expired {{\Carbon\Carbon::create($machine->warranty)->addMonths($machine->warranty_period)->format('j M Y')}}</span>
                                    @else
                                    <span class="badge rounded-pill bg-success w-100">Active {{\Carbon\Carbon::create($machine->warranty)->addMonths($machine->warranty_period)->format('j M Y')}}</span>
                                    @endif
                                @endif
                            </td>
                            <td class="fit-center">
                                <a href="{{route('machine.show', $machine->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="7" class="text-center">
                            <span class="text-danger">
                                <strong>No Machines Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
            {{$machines->links()}}
        </div>
    </div>

@endsection
