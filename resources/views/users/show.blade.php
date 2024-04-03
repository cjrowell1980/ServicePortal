@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        User Information
                    </div>
                    <div class="float-end">
                        <form action="{{route('users.destroy', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                            @can('edit-user')
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan
                            @can('delete-user')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="avatar" class="col-md-4 col-form-label text-md-end text-start"><strong>Avatar:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <img src="/avatars/{{$user->avatar}}" alt="" style="height: 50px">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Email Address:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phone" class="col-md-4 col-form-label text-md-end text-start"><strong>Phone Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $user->phone }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="roles" class="col-md-4 col-form-label text-md-end text-start"><strong>Roles:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @forelse ($user->getRoleNames() as $role)
                                <span class="badge bg-primary">{{ $role }}</span>
                            @empty
                            @endforelse
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
