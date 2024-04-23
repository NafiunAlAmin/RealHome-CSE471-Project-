@extends('layout')
@section('title', 'Properties')
@section('body')
    @include('include.header')
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('home/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                    <h1 class="mb-3 bread">Advertisements</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('welcome') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Properties <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>




    <section class="ftco-section goto-here">
        <div class="container">
            <div class="row">
                @foreach($ads as $ad)
                    @if($ad->status == 'accepted')
                        <div class="col-md-4">
                            <div class="property-wrap ftco-animate">
                                <div class="img d-flex align-items-center justify-content-center" style="background-image: url('imager/{{ $ad->image }}');">
                                    <a href="properties-single.html" class="icon d-flex align-items-center justify-content-center btn-custom">
                                        <span class="ion-ios-link"></span>
                                    </a>
                                    <div class="list-agent d-flex align-items-center">
                                        <a href="#" class="agent-info d-flex align-items-center">
                                            <div class="img-2 rounded-circle" style="background-image: url('home/images/person_1.jpg');"></div>
                                            <h3 class="mb-0 ml-2">Avatar Aang</h3>
                                        </a>
                                        <div class="tooltip-wrap d-flex">
                                            <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                                <span class="ion-ios-heart"><i class="sr-only">Bookmark</i></span>
                                            </a>
                                            <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Compare">
                                                <span class="ion-ios-eye"><i class="sr-only">Compare</i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <h3 class="mb-0"><a href="#">{{ $ad->name }}</a></h3>
                                    <span class=""><i class=""></i>{{ $ad->description }}</span>
                                    <ul class="property_list">
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>




   


    <!-- Comments Section -->
    </section>
    <section style="background-color: #f8f9fa; padding: 30px;">
        <div class="container">
            <h2 class="text-center mb-4">All Comments</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                @foreach($comments as $comment)
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
                    <form action="{{ route('comment_add') }}" method="post">
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
    <!-- End of Comments Section -->





    @include('include.footer')
@endsection






