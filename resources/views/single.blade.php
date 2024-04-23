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
                                <span class="subheading">${{$post-> base}}</span>
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

						@php
							$user_id = Auth::user()-> id;
						@endphp
						@if ($post->user_ID==$user_id and $post->ads!='Active')
						<p><a href="{{ url('req_ads',$post->id) }}" class="btn btn-primary py-3 px-4">Request for ads</a></p>
						@endif
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
		@if ($post->token!=0)
        <div class="row">
        <div class="col-md-4">
            <div class="row justify-content-center align-items-left">
                <div class="col-md-12">
                    <h2>Buy Share</h2>
                    <form action="{{ route('share',$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_center">
                            <label>Percentage</label> 
                            <input type="text" name="percent">
                        </div>
                        <div class="div_center">
                            <input type="submit" class="btn btn-primary" value="Buy">
                        </div>
                    </form>
                    @if ((int)$post->token==100) 
                        <h2>or</h2>
                            <p><a style="margin-top: 30px; margin-left: 30px;" href="{{ url('buy',$post-> id) }}" class="btn btn-primary py-3 px-3.5">Buy Property</a></p>
                    @endif
                </div>
            </div>
        </div>
    @endif
    </section>
	
    </section>
    <section style="background-color: #f8f9fa; padding: 30px;">
        <div class="container">
            <h2 class="text-center mb-4">All Comments</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                @foreach($comments as $comment)
				@if ($comment->post_id==$post->id)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $comment->name }}</h5>
            <p class="card-text">{{ $comment->content }}</p>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('like_or_dislike', ['id' => $comment->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="action" value="like">
                        <button type="submit" class="btn btn-success"><i class="far fa-thumbs-up"></i></button>
                    </form>
                    <span>{{ $comment->likes }} likes</span>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('like_or_dislike', ['id' => $comment->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="action" value="dislike">
                        <button type="submit" class="btn btn-danger"><i class="far fa-thumbs-down"></i></button>
                    </form>
                    <span>{{ $comment->dislikes }} dislikes</span>
                </div>
            </div>
        </div>
    </div>
	@endif
@endforeach
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #f8f9fa; padding: 30px;">
        <div class="container">
            <h2 class="text-center mb-4">Comments</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('comment_add',$post->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="5" placeholder="Comment something here"></textarea>
                        </div>
                        <input type="hidden" name="post_id" value="#">
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('include.footer')
@endsection
