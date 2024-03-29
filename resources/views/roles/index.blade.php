@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Manage Roles</div>
            <div class="float-end">
                @can('create-roles')
                    <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Add New Role</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="fit-center">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="fit-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        @if ($role->name != 'Super Admin')
                            <tr>
                                <th scope="row" class="fit-center">{{$loop->iteration}}</th>
                                <td>{{$role->name}}</td>
                                <td class="fit-center">
                                    <a href="{{route('roles.show', $role->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <td colspan="3">
                            <span class="text-danger"><strong>No Roles Found</strong></span>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
