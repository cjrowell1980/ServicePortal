@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">{{$machine->stock}} - {{$machine->make}} {{$machine->model}}{{($machine->asset == "") ? "" : " - " . $machine->asset}}</div>
            <div class="float-end">
                <form action="{{route('machine.destroy', $machine->id)}}">
                    <a href="{{route('machine.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                    @can('edit-machine')
                        <a href="{{route('machine.edit', $machine->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                    @endcan
                    @can('delete-machine')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this machine? \n\n {{$machine->stock}}')"><i class="bi bi-trash"></i> Delete</button>
                    @endcan
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <label for="customer" class="col-md-4 col-form-label text-md-end text-start"><strong>Customer:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ $machine->getCustomer->name }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="serial" class="col-md-4 col-form-label text-md-end text-start"><strong>Serial No#:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ strtoupper($machine->serial) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="yom" class="col-md-4 col-form-label text-md-end text-start"><strong>Year of Manufacturer:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ $machine->yom }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="warranty" class="col-md-4 col-form-label text-md-end text-start"><strong>Warranty Status:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    @if (empty($machine->warranty) || empty($machine->warranty_period))
                        <span class="badge rounded-pill bg-info">Not Set</span>
                    @else
                        @if (\Carbon\Carbon::parse($warranty)->isPast())
                            <span class="badge rounded-pill bg-danger">Expired {{$warranty->format('j M Y')}}</span>
                        @else
                        <span class="badge rounded-pill bg-success">Active {{$warranty->format('j M Y')}}</span>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <div class="float-start">Jobs</div>
            <div class="float-end">
                @can('create-job')
                    <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Add New Job</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="fit-center">#</th>
                        <th scope="col" class="fit-center">Job No#</th>
                        <th scope="col">Fault</th>
                        <th scope="col" class="fit-center">Days</th>
                        <th scope="col" class="fit-center">Status</th>
                        <th scope="col" class="fit-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                        <tr>
                            <td class="fit-center" scope="row">{{$loop->iteration}}</td>
                            <td class="fit-center">{{$job->job_ref}}</td>
                            <td>{{$job->reported}}</td>
                            <td class="fit-center">{{now()->diffInDays($job->created_at)}}</td>
                            <td class="fit-center">
                                <span class="badge rounded-pill bg-{{$job->getStatus->colour}}">{{$job->getStatus->name}}</span>
                            </td>
                            <td class="fit-center">
                                <a href="{{route('jobs.show')}}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="6" class="text-center">
                            <span class="text-danger">
                                <strong>No jobs Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
