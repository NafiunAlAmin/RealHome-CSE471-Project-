@extends('layout')
@section('title','Make your Bid')
@section('body')
    @include('include.header')
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('home/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="overlay-2"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
            <h1 class="mb-3 bread">Make your Bid</h1>
          </div>
        </div>
      </div>
    </section>
    <section>
                <div class="container">
                    <div class="row">
                        @foreach($auction as $auction)
                            <div class="div_center">
                                <div class="property-wrap ftco-animate">
                                    <div class="img d-flex align-items-center justify-content-center" style="background-image: url('imager/{{ $auction->image }}');">
                                    </div>
                                    <div class="text">
                                        <h3 class="mb-0">{{ $auction->name }}</a></h3>
                                        <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>{{ $auction->address }}</span>
                                        <p class="price mb-3"><span class="orig-price">Current Bid $ {{ $auction->base }}</span></p>
                                        <ul class="property_list">

                                            <li><span class="flaticon-bed"></span>{{ $auction->bedroom }}</li>
                                            <li><span class="flaticon-bathtub"></span>{{ $auction->bathroom }}</li>
                                            <li><span class="flaticon-floor-plan"></span>{{ $auction->area }} sqft</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <form action="{{ route('bidding', $auction->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="div_center">
                                    <label>Your bid (Starting from Current})</label>
                                    <input type="number" name="bid" placeholder={{ $auction->base }}
                                        step="1000" min={{ $auction->base }}
                                        oninput="validity.valid||(value='');">
                                </div>


                                <div class="div_center">
                                    <input type="submit" class="btn btn-primary" value="Submit">

                                    <input type="submit" class="btn btn-primary" name="cancel" value="Cancel">
                                </div>

                            </form>

                        @endforeach
                    </div>
                </div>
    </section>
    @include('include.footer')
@endsection
