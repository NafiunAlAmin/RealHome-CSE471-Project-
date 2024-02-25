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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .div_center
        {
            text-align: center;
            padding-top: 60 px;
            margin-top: 40px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }
        .div_design
        {
            padding-bottom: 15px;
        }
        

        select {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    
</head>

<body>
    <!--::header part start::-->
    @include('home.header')
    <!-- Header part end-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Add Adoption</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class='close' data-dismiss='alert' aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                @endif
                <div class='div_center'>
                    <form action="{{url('/add_adoption2')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        

                        <div class="div_design">
                            <Label> Type of Animal :</label>
                            <input type='text' name='type' placeholder='Type' required="">
                        </div>

                        <div class="div_design">
                            <Label> Title :</label>
                            <input type='text' name='title' placeholder='Title' required="">
                        </div>

                        <div class="div_design">
                            <Label> Breed :</label>
                            <input type='text' name='breed' placeholder='Breed' required="">
                        </div>

                        <div class="div_design">
                            <Label> Color :</label>
                            <input type='text' name='color' placeholder='Color' required="">
                        </div>

                        <div class="div_design">
                            <Label> Personality :</label>
                            <input type='text' name='personality' placeholder='Personality' required="">
                        </div>

                        <div class="div_design">
                            <Label> Age :</label>
                            <input type='text' name='age' placeholder='Age' required="">
                        </div>

                        <div class="div_design">
                            <Label> Description :</label>
                            <input type='text' name='description' placeholder='Description' required="">
                        </div>

                        <div class="div_design">
                            <Label> Gender :</label>
                            <input type='text' name='gender' placeholder='Gender' required="">
                        </div>

                        <div class="div_design">
                            <Label> Image :</label>
                            <input type='file' name='image' placeholder='Image' required="">
                        </div>
                        <div class="div_design">
                            <input type='submit' name='submit' placeholder='Submit'>
                        </div>
                    </form>
                </div>
            </d/v>
        </div>
    </section>
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Your Adoption</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product_list section_padding">
        <div class="container">
            <div class="col-md-20">
                <div class="product_list">
                    <div class="row">
                        @foreach($data as $data)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <img src="/adoptpic/{{$data->image}}" alt="#" class="img-fluid">
                                <h3> <a href="{{url('description',$data->id)}}">{{$data->title}}</a> </h3>
                                <p>Posted by {{$data->user}}</p>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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