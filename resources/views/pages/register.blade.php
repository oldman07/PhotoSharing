@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>{{__('profile.Register')}}</h1>

        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">{{__('profile.Username')}}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>

            </div>
            <div class="form-group">

                <label for="exampleInputEmail1">{{__('profile.Email address')}}</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                <span class="text-danger">@error('email'){{ $message }} @enderror</span>


            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{__('profile.Password')}}</label>
                <input type="password" class="form-control" name="password">
                <span class="text-danger">@error('password'){{ $message }} @enderror</span>

            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">{{__('profile.Confirm Password')}}</label>
                <input type="password" class="form-control" name="confirm_password">
                <span class="text-danger">@error('confirm_password'){{ $message }} @enderror</span>

            </div>

            <button type="submit" class="btn btn-primary">{{__('profile.Submit')}}</button>
        </form>
    </div>

@endsection
