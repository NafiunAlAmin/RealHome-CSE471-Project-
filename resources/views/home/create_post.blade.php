<!DOCTYPE html>
<html lang="en">
   <head>
    <style type = "text/css">
        .div_deg{
          text-align: center;  
        }
        .title_d{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        label
        {
            display: inline block;
            width: 200px;
            color: white;
            font-size: 30px;
            font-weight: bold;


        }


    </style>
      @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         
         <!-- banner section start -->
         @include('home.banner')
         <!-- banner section end -->
      
      <div class="div_deg">
        <h3 class="title_d">Add Post</h3>
        <form action="{{url('poster')}}" method="POST" enctype= "multipart/form-data">
            <div>
                <label>Title</label>
                <input type="text" name = "title">
            </div>
            <div>
                <label>Description</label>
                <textarea name="description"></textarea>
            </div>
            <div>
                <label>Add Image</label>
                <input type="file" name = "image">
            </div>
            <div>
                <input type="submit" value = "Add post" class="btn btn-outline-secondary">
            </div>
        </form>
      </div>
      <!-- header section end -->
      <!-- services section start -->
      
      <!-- services section end -->
      <!-- about section start -->
      
      <!-- about section end -->
      <!-- blog section start -->
      
      <!-- blog section end -->
      <!-- client section start -->
      
      <!-- client section start -->
      <!-- choose section start -->
      
      <!-- choose section end -->
      <!-- footer section start -->
      
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text"> <a href="https://html.design"></a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>    
   </body>
</html>