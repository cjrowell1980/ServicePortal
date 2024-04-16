@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Portal Settings</strong>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="fit-center">#</th>
                        <th scope="col" class="fit">Group</th>
                        <th scope="col">Setting</th>
                        <th scope="col">Value</th>
                        <th scope="col" class="fit-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($settings as $setting)
                        <tr>
                            <td scope="row" class="fit-center">{{$loop->iteration}}</td>
                            <td class="fit">{{ucwords($setting->group)}}</td>
                            <td>{{$setting->display}}</td>
                            <td>

                                @switch($setting->type)
                                    @case('boolean')
                                        @if ($setting->payload)
                                            <span class="btn btn-sm rounded-pill btn-success" style="width:100px"><i class="bi bi-check-circle"></i> Enabled</span>
                                        @else
                                            <span class="btn btn-sm rounded-pill btn-danger" style="width:100px"><i class="bi bi-check-circle"></i> Disabled</span>
                                        @endif
                                        @break

                                    @case('email')
                                        {{$setting->payload}} <a href="mailto:{{$setting->payload}}" class="btn btn-sm rounded-pill btn-info"><i class="bi bi-envelope-at"></i> send email</a>
                                        @break
                                
                                    @default
                                        {{$setting->payload}}
                                @endswitch

                            </td>
                            <td class="fit-center">
                                @if (!$setting->locked)
                                    <a href="{{route('settings.edit', $setting->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
            {{$settings->links()}}
        </div>
    </div>
@endsection
