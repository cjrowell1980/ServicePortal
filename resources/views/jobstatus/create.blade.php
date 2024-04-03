@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Create New Job Status</div>
            <div class="float-end">
                <a href="{{route('jobstatus.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('jobstatus.store')}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="order" class="col-md-4 col-form-label text-md-end text-start">Display Order:</label>
                    <div class="col-md-6">
                        <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{old('order')}}">
                        @if ($errors->has('order'))
                            <span class="text-danger">{{$errors->first('order')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name:</label>
                    <div class="col-md-6">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="colour" class="col-md-4 col-form-label text-md-end text-start">Colour:</label>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input @error('colour') is-invalid @enderror" value="primary"{{(old('colour') == 'primary') ? ' checked' : ''}}>
                            <span class="badge rounded-pill bg-primary w-25">Primary</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input @error('colour') is-invalid @enderror" value="secondary"{{(old('colour') == 'secondary') ? ' checked' : ''}}>
                            <span class="badge rounded-pill bg-secondary w-25">Secondary</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input @error('colour') is-invalid @enderror" value="success"{{(old('colour') == 'success') ? ' checked' : ''}}>
                            <span class="badge rounded-pill bg-success w-25">Success</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input @error('colour') is-invalid @enderror" value="info"{{(old('colour') == 'info') ? ' checked' : ''}}>
                            <span class="badge rounded-pill bg-info w-25">Info</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input @error('colour') is-invalid @enderror" value="warning"{{(old('colour') == 'warning') ? ' checked' : ''}}>
                            <span class="badge rounded-pill bg-warning w-25">Warning</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input @error('colour') is-invalid @enderror" value="danger"{{(old('colour') == 'danger') ? ' checked' : ''}}>
                            <span class="badge rounded-pill bg-danger w-25">Danger</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input @error('colour') is-invalid @enderror" value="light"{{(old('colour') == 'light') ? ' checked' : ''}}>
                            <span class="badge rounded-pill bg-light w-25">Light</span>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="colour" id="colour" class="form-check-input @error('colour') is-invalid @enderror" value="dark"{{(old('colour') == 'dark') ? ' checked' : ''}}>
                            <span class="badge rounded-pill bg-dark w-25">Dark</span>
                        </div>
                        @if ($errors->has('colour'))
                            <span class="text-danger">{{$errors->first('colour')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" class="col-md-3 offset-md-5 btn btn-primary">Add New Job Status</button>
                </div>
            </form>
        </div>
    </div>
@endsection
