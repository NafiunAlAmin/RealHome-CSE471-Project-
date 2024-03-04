@extends('layout')
@section('title','Login')
@section('body')
    <div class="hero-wrap" style="background-image: url('home/images/bg_2.jpg');" data-stellar-background-ratio="20">
        @include('include.header')
        <div class="overlay"></div>
        <div class="overlay-2"></div>
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
                <div class="center-container">
                    <form class='ms-auto me-auto mb-3' style="width: 500px" action="{{route('loginUser')}}" method='POST'>
                        @csrf
                        <div class="mb-3">
                            <label  class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
        </div>    
    </div>
    @include('include.footer')
@endsection