@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">General Settings</div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Setting</th>
                        <th scope="col">Value</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($settings as $setting)
                        <tr>
                            <td scope="row">{{$setting->display}}</td>
                            <td>{{$setting->payload}}</td>
                            <td>
                                @can('edit-settings')
                                    @if (!$setting->locked)
                                        <a href="{{route('settings.edit', $setting->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                    @endif
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <td colspan="3">
                            <span class="text-danger">
                                <strong>No Settings Found</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
