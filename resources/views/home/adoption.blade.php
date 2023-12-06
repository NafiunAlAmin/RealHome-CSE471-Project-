<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Paw Paradise</title>
    <link rel="icon" href="home/mg/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="home/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="home/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="home/css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="home/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="home/css/flaticon.css">
    <link rel="stylesheet" href="home/css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="home/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="home/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="home/css/style.css">

    <style>
        .img-fluid
        {
            width: 370px;
            height: 300px;
        }
    </style>

    
</head>

<body>
    <!--::header part start::-->
    @include('home.header')
    <!-- Header part end-->

    <!-- banner part start-->
    <!-- banner part start-->

    <!-- product list start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Available Adoption</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product_list section_padding">
        <div class="container">
            <div class="col-md-8">
                <div class="product_list">
                    <div class="row">
                        @foreach($data as $data)
                        <div class="col-lg-6 col-sm-6">
                            <div class="single_product_item">
                                <img src="/adoptpic/{{$data->image}}" alt="#" class="img-fluid">
                                <h3> <a href="{{url('description')}}">{{$data->title}}</a> </h3>
                                <p>Personality: {{$data->personality}}</p>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- product list end-->

    <!-- client review part here -->
    @include('home.reviews')
    <!-- client review part end -->

    <!-- subscribe part here -->
    <!-- subscribe part end -->

    <!--::footer_part start::-->
    @include('home.footer')
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="home/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.min.js"></script>
    <!-- magnific popup js -->
    <script src="home/js/jquery.magnific-popup.js"></script>
    <!-- carousel js -->
    <script src="home/js/owl.carousel.min.js"></script>
    <script src="home/js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="home/js/slick.min.js"></script>
    <script src="home/js/jquery.counterup.min.js"></script>
    <script src="home/js/waypoints.min.js"></script>
    <script src="home/js/contact.js"></script>
    <script src="home/js/jquery.ajaxchimp.min.js"></script>
    <script src="home/js/jquery.form.js"></script>
    <script src="home/js/jquery.validate.min.js"></script>
    <script src="home/js/mail-script.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>