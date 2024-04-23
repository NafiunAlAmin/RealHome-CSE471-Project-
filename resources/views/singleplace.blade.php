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
            <h1 class="mb-3 bread">{{$post-> name}}</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{$post-> name}}<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-property-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="property-details">
      				<div class="img rounded" style="background-image: url(home/images/work-1.jpg);"></div>
      				<div class="text">
      					<h2>{{$post-> name}}</h2>
      					<span class="subheading">{{$post-> address}}</span>
      					<span class="subheading">{{$post-> region}}</span>
                        <a href="{{url('specificpost',$post-> address)}}">Find Houses in {{$post-> address}}</a>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md-12 pills">
				<div class="bd-example bd-example-tabs">
					<div class="d-flex">
						<ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
						</li>
						</ul>
					</div>
					<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						<p>{{$post-> description}}</p>
					</div>
				</div>
    </section>
    @include('include.footer')
@endsection