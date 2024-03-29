@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Job Statuses</div>
            <div class="float-end">
                @can('create-jobstatus')
                    <a href="{{route('jobstatus.create')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Add New Job Status</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="fit-center">#</th>
                        <th scope="col" class="fit-center">Display Order</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="fit-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobstatuses as $jobstatus)
                        <tr>
                            <td scope="row" class="fit-center">{{$loop->iteration}}</td>
                            <td class="fit-center">{{$jobstatus->order}}</td>
                            <td><span class="badge rounded-pill bg-{{$jobstatus->colour}} w-25">{{$jobstatus->name}}</span></td>
                            <td class="fit-center">
                                <a href="{{route('jobstatus.show', $jobstatus->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4" class="text-center">
                            <span class="text-danger">
                                <strong>No Job Statuses Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
