@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Role Information
                    </div>
                    <div class="float-end">
                        <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('roles.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                            @can('edit-role')
                                <a href="{{route('roles.edit', $role->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan
                            @can('delete-role')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this role? \n\n {{$role->name}}')"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height:35px">
                            {{$role->name}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="roles" class="col-md-4 col-form-label text-md-end text-start"><strong>Permissions:</strong></label>
                        <div class="col-md-6" style="line-height:35px">
                            @if ($role->name == 'Super Admin')
                                <span class="badge bg-primary">All</span>
                            @else
                                @forelse ($rolePermissions as $permission)
                                    <span class="badge bg-primary">{{$permission->name}}</span>
                                @empty
                                @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
