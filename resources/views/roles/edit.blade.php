@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">Add New Role</div>
                    <div class="float-end"><a href="{{route('roles.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a></div>
                </div>
                <div class="card-body">
                    <form action="{{route('roles.update', $role->id)}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$role->name}}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="permissions" class="col-md-4 col-form-label text-md-end text-start">Permissions</label>
                            <div class="col-md-6">
                                @forelse ($permissions as $permission)
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="permissions[]" id="permissions" class="form-check-input" value="{{$permission->id}}" {{in_array($permission->id, $rolePermissions ?? []) ? 'checked' : ''}}>
                                        <label for="permissions" class="form-check-label">{{$permission->name}}</label>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" value="Update Role" class="col-md-3 offset-md-5 btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
