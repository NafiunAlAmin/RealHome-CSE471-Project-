@extends('layout')
@section('title','Properties')
@section('body')
    @include('include.header')
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('home/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="overlay-2"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
            <h1 class="mb-3 bread">Properties</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Properties <i class="ion-ios-arrow-forward"></i></span></p>
            <p><a href="{{route('add_post')}}" class="btn btn-primary py-3 px-4">Add Properties</a></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section goto-here">
    	<div class="container">
        <div class="row">
			@foreach($post as $post)
				<div class="col-md-4">
					<div class="property-wrap ftco-animate">
						<div class="img d-flex align-items-center justify-content-center" style="background-image: url(nearbyimage/{{$post->image}});">
						</div>
						<div class="text">
							<h3 class="mb-0"><a href="{{ url('singleplace',$post-> id) }}">{{$post-> name}}</a></h3>
							<span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>{{$post-> address}}</span>
						</div>
					</div>
				</div>
			@endforeach
        </div>

    </section>
    @include('include.footer')
@endsection