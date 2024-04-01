@extends('layouts.app')

@section('content')
    <div class="card mt-3">
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
                    @forelse ($general as $setting)
                        <tr>
                            <td scope="row">{{$setting->display}}</td>
                            <td>{{$setting->payload}}</td>
                            <td class="fit-center">
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
    <div class="card mt-3">
        <div class="card-header">Default Settings</div>
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
                    @forelse ($default as $setting)
                        <tr>
                            <td scope="row">{{$setting->display}}</td>
                            <td>
                                @switch($setting->model)
                                @case('JobStatus')
                                    <span class="badge rounded-pill bg-{{App\Models\JobStatus::find($setting->payload)->colour}} w-50">{{App\Models\JobStatus::find($setting->payload)->name}}</span>
                                    @break

                                @case('VisitStatus')
                                    <span class="badge rounded-pill bg-{{App\Models\VisitStatus::find($setting->payload)->colour}} w-50">{{App\Models\VisitStatus::find($setting->payload)->name}}</span>
                                    @break

                                @default
                                        {{$setting->payload}}
                                @endswitch</td>
                            <td class="fit-center">
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
    <div class="card mt-3">
        <div class="card-header">Author Details</div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Information</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($author as $setting)
                        <tr>
                            <td scope="row">{{$setting->display}}</td>
                            <td>{{$setting->payload}}</td>
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
