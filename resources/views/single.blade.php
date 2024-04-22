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
            <h1 class="mb-3 bread">Properties Details</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Properties Details<i class="ion-ios-arrow-forward"></i></span></p>
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
      					<h2>{{$post->name}}</h2>
						
      					<div class="row justify">
                            <div class="col-md-1" style="margin-left: 0px; margin-top: 10px">
                                <span class="subheading">${{$post-> price}}</span>
                            </div>
                            <div class="col-md-6">
                                @if($prediction==null)
                                    <p><a style="margin-left: 0px;" href="{{ url('predict_price',$post->id) }}" class="btn btn-primary py-3 px-3.5">Estimate Price</a></p>
                                @elseif($prediction=="Sorry, we don't have enough data to make a prediction")
                                    <p><a style="margin-left: 0px;" href="{{ url('predict_price',$post->id) }}" class="btn btn-primary py-3 px-3.5">{{$prediction}}</a></p>
                                @else
                                    <p><a style="margin-left: 0px;" href="{{ url('predict_price',$post->id) }}" class="btn btn-primary py-3 px-3.5">Estimate: ${{$prediction}}</a></p>
                                @endif
                            </div>
                        </div>

      					<span class="subheading">{{$post-> address}}</span>
      					<span class="subheading">{{$post-> region}}</span>
						
						<a class="" href="{{ url('history',$post->username) }}">Posted by {{$post->username}}</a>
						<p>Average Rating: {{$post->rating}} Stars ({{$post->number_of_ratings}} Ratings)</p>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md-8 pills">
				<div class="bd-example bd-example-tabs">
					<div class="d-flex">
						<ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-nearby-tab" role="tab" aria-controls="pills-manufacturer" aria-expanded="true" href="{{url('nearby_facilities',$post->id)}}">Nearby Facilities</a>
						</li>
						</ul>
					</div>

					<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						<div class="row">
							<div class="col-md-4">
								<ul class="features">
									<li class="check"><span class="ion-ios-checkmark-circle"></span>Floor Area: {{$post->area}} SQ FT</li>
									<li class="check"><span class="ion-ios-checkmark-circle"></span>Bed Rooms: {{$post->bedroom}}</li>
									<li class="check"><span class="ion-ios-checkmark-circle"></span>Bath Rooms: {{$post->bathroom}}</li>
									<li class="check"><span class="ion-ios-checkmark-circle"></span>Garage: {{$post->garage}}</li>
								</ul>
							</div>
							<div class="col-md-4">
								<ul class="features">
									<li class="check"><span class="ion-ios-checkmark-circle"></span>Year Build:: 2019</li>
									<li class="check"><span class="ion-ios-checkmark-circle"></span>Water and Gas</li>
									<li class="check"><span class="ion-ios-checkmark-circle"></span>Stories: {{$post->stories}}</li>
									<li class="check"><span class="ion-ios-checkmark-circle"></span>Roofing: New</li>
								</ul>
							</div>
						</div>
						<form method="POST" action="{{ route('store_rating', ['post' => $post->id]) }}">
						    @csrf
						    <div class="form-group">
						        <label for="rating">Rate this property:</label>
						        <select class="form-control" id="rating" name="rating">
						            <option value="1">1 star</option>
						            <option value="2">2 stars</option>
						            <option value="3">3 stars</option>
						            <option value="4">4 stars</option>
						            <option value="5">5 stars</option>
						        </select>
						    </div>
						    <button type="submit" class="btn btn-primary">Submit Rating</button>
						</form>
					</div>
					<div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						<p>{{$post->description}}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row justify-content-center align-items-center">
				<div class="col-md-12">
					<div class="qr-code">
						<p>{{ QrCode::size(255)->generate("http://127.0.0.1:8000/single/" . $post->id) }}</p>
					</div>
				</div>
				<div class="col-md-12">
					<p><a style="margin-top: 30px; margin-left: 60px;" href="{{ url('generate-pdf',$post->id) }}" class="btn btn-primary py-3 px-3.5">Generate Poster</a></p>
				</div>
			</div>
		</div>
		<p><a style="margin-top: 30px; margin-left: 30px;" href="{{ url('buy',$post-> id) }}" class="btn btn-primary py-3 px-3.5">Add Properties</a></p>

		<div class="slidecontainer">
			<input type="range" min="1" max="100" value="50" class="slider" id="myRange">
			<p>Value: <span id="demo"></span></p>
			</div>

			<script>
			var slider = document.getElementById("myRange");
			var output = document.getElementById("demo");
			output.innerHTML = slider.value;

			slider.oninput = function() {
			output.innerHTML = this.value;
			}
	</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </section>
    @include('include.footer')
@endsection
