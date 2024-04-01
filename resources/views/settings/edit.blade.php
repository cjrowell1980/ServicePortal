@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Edit Settings</div>
            <div class="float-end">
                <a href="{{route('settings.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('settings.update', $setting->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3 row">
                    @switch($setting->type)
                        @case('boolean') <!-- switch box / boolean -->
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                            @break

                        @case('modelinteger')
                                <label for="payload" class="col-md-4 col-form-label-text-md-end-text-start">{{$setting->display}}:</label>
                                <div class="col-md-6">
                                    <select name="payload" id="payload" class="form-control">
                                        @forelse ($model as $row)
                                            <option value="{{$row->id}}"{{($row->id == $setting->payload) ? " selected" : ""}}>{{$row->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                @break

                        @default <!-- text box / string -->
                            <label for="payload" class="col-md-4 col-form-label-text-md-end-text-start">{{$setting->display}}:</label>
                            <div class="col-md-6">
                                <input type="text" name="payload" id="payload" class="form-control" value="{{$setting->payload}}">
                                @if ($errors->has('payload'))
                                    <span class="text-danger">{{$errors->first('payload')}}</span>
                                @endif
                            </div>
                        @endswitch
                </div>

                <div class="mb-3 row">
                    <button class="col-md-3 offset-md-5 btn btn-sm btn-primary"><i class="bi bi-floppy"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
