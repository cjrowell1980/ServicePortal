@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Engineers</div>
            <div class="float-end">
                @can('create-engineer')
                    <a href="{{route('engineer.create')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Add New Engineers</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="fit-center">#</th>
                        <th scope="col" class="fit-center">Short Name</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Contact No#</th>
                        <th scope="col" class="fit-center">eMail</th>
                        <th scope="col" class="fit-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($engineers as $engineer)
                        <tr>
                            <td scope="row" class="fit-center">{{$loop->iteration}}</td>
                            <td class="fit-center">{{$engineer->short}}</td>
                            <td>{{$engineer->long}}</td>
                            <td>{{$engineer->number}}</td>
                            <td class="fit-center">
                                <a href="mailto:{{$engineer->email}}" class="btn btn-sm btn-info"><i class="bi bi-envelope-at"></i> Send eMail</a>
                            </td>
                            <td class="fit-center">
                                <a href="{{route('engineer.show', $engineer->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="6" class="text-center">
                            <span class="text-danger">
                                <strong>No Engineers Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
