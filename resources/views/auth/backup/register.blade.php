@extends('layout.app')
@section('content')
<h2 style="color: #fff;">Đăng Kí</h2>
<form action="{{route('register')}}" method="POST">
    @csrf
    <div class="mb-3 container">
        <div class="mb-3">
            <label for="" class="form-label" style="color: #fff;">Name</label>
            <input type="text" name="name" class="form-control">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label" style="color: #fff;">Email</label>
            <input type="email" name="email" class="form-control">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label" style="color: #fff;">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label" style="color: #fff;">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection