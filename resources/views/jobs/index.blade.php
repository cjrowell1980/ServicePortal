@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Job List</div>
            <div class="float-end">
                {{-- <a href="{{route('jobs.create')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Add New Job</a> --}}
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="fit-center">#</td>
                        <th scope="col" class="fit-center">Type</td>
                        <th scope="col" class="fit-center">Job</td>
                        <th scope="col" class="fit-center">Job Status</td>
                        <th scope="col">Details</td>
                        {{--  --}}
                        <th scope="col" class="fit-center">Days</td>
                        <th scope="col" class="fit-center">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                        <tr>
                            <td scope="row" class="fit-center">{{$loop->iteration}}</td>
                            <td class="fit-center">{{$job->getType->name}}</td>
                            <td class="fit-center">{{$job->job_ref}}</td>
                            <td class="fit-center">
                                <span class="badge rounded-pill bg-{{$job->getStatus->colour}} w-100">{{$job->getStatus->name}}</span>
                            </td>
                            <td>
                                {{$job->getMachine->getCustomer->name . " - " . $job->getMachine->make}} {{$job->getMachine->model}}
                            </td>
                            <td class="fit-center">{{now()->diffInDays($job->created_at)}}</td>
                            <td class="fit-center">
                                <a href="{{route('jobs.show', $job->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="7" class="text-center">
                            <span class="text-danger">
                                <strong>No Jobs Founs</strong>
                            </span>
                        </td>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
