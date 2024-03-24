@extends('layout')
@section('title','Sign up')
@section('body')
    <div class='container'>
        <div class="mt-5">
            @if($errors-> any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
            @enderror
            @if(session()->has('success'))
            <div class="alert alert-danger">{{session('success')}}</div>
            @enderror
        </div>
        <form class='ms-auto me-auto mt-3' style="width: 500px" action="{{route('registrationUser')}}" method='POST'>
            @csrf
            <div class="mb-3">
                <label  class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="mb-3">
                <label  class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="mb-3">
                <label  class="form-label">Number</label>
                <input type="text" class="form-control" name="number">
            </div>

            <div class="mb-3">
                <label  class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
    </div>
@endsection