<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <base href="/public">
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
            width: 200px;
            height: 600px;
        }
      .detail
      {

        font-size: 1.8em;
        font-weight: normal;
      }
      .title
      {
        font-size: 2.2em;
        font-weight: bold;
      }
      .product_image_area
      {
        margin-bottom: 2px;
      }
    </style>
    
</head>

<body>
    <!--::header part start::-->
    @include('home.header')
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="breadcrumb_part single_product_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img">
              <img src="/adoptpic/{{$data->image}}" alt="#" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="text">
              <h3 class='title'>{{$data->title}}</h3>
              <h3 class='detail'>Age: {{$data->age}}</h3>
              <h3 class='detail'>Breed: {{$data->breed}}</h3>
              <h3 class='detail'>Personality: {{$data->personality}}</h3>
              <h3 class='detail'>Owner Number: {{$data->number}}</h3>
              <p>
                  {{$data-> description}}
              </p>
              <div class="add_to_cart">
                  <a href="#" class="btn_3 align-center">add to cart</a>
              </div>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>

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