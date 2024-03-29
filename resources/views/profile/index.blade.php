@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">My Profile</div>
                    <div class="float-end"></div>
                </div>
                <div class="card-body">
                    <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end text-start">Avatar:</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control @error('avatar') is.invalid @enderror" id="avatar" name="avatar" value="{{old('avatar')}}">
                                @error('avatar')
                                    <span class="text-danger">{{$errors->first('avatar')}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 col-md-12 text-center">
                            <img src="/avatars/{{Auth::user()->avatar}}" style="width:80px;width-top:10px">
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is.invalid @enderror" id="name" name="name" value="{{Auth::user()->name}}">
                                @error('name')
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-end text-start">Phone Number:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('phone') is.invalid @enderror" id="phone" name="phone" value="{{Auth::user()->phone}}">
                                @error('phone')
                                    <span class="text-danger">{{$errors->first('phone')}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('email') is.invalid @enderror" id="email" name="email" value="{{Auth::user()->email}}">
                                @error('email')
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('password') is.invalid @enderror" id="password" name="password" value="">
                                @error('password')
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="confirm_password" class="col-md-4 col-form-label text-md-end text-start">Confirm Password:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('confirm_password') is.invalid @enderror" id="confirm_password" name="confirm_password" value="">
                                @error('confirm_password')
                                    <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" value="Update" class="btn btn-primary col-md-3 offset-md-5">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
