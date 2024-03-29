@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">List Job Types</div>
            <div class="float-end">
                <a href="{{route('jobtype.create')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Add New Job Type</a>
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
                    @forelse ($jobtypes as $jobtype)
                        <tr>
                            <td scope="row" class="fit-center">{{$loop->iteration}}</td>
                            <td class="fit-center">{{$jobtype->order}}</td>
                            <td>{{$jobtype->name}}</td>
                            <td class="fit-center">
                                <a href="{{route('jobtype.show', $jobtype->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4" class="text-center">
                            <strong class="text-danger">No Job Types Found!</strong>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
