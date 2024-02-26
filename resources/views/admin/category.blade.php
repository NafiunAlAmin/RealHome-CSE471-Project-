<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css');
    @import "../node_modules/bootstrap/scss/bootstrap";
    <style type='text/css'>

        .div_center
        {
            text-align: center;
            padding-top:40px;
        }
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .center
        {
          margin: auto;
          width: 50%;
          color: black;
          text-align: center;
          margin-top: 30 px;
          background: white;
        }
        .center2
        {
          border-width: 3px;
          border-style: solid;
          border-color: black;
        }
        


    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar');
      <!-- partial -->
      @include('admin.header');
        <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper"> 
            @if(session()->has('message'))
            <div class="alert alert-light" role="alert">
              <button type="button" class='close' data-dismiss='alert' aria-hidden="true">X</button>
              {{session()->get('message')}}
            </div>
            @endif
            <div class="div_center">
                <h2 class='h2_font'>Add Product</h2>
                <form action="{{url('add_catagory')}}" method="post">

                    @csrf

                      <input type='text' name='catagory' placeholder='Write category name'>

                      <input type='submit' name='submit' class='btn btn-primary' value='Add Category'>      

                </form>
            </div>
            <table class="center">
              <tr class="center2">
                <td><strong>Catagory</strong></td>
                <td><strong>Action</strong></td>
              </tr>
              @foreach($data as $data)
              <tr class="center2">
                <td>{{$data->Catagory_name}}</td>
                <td>
                  <a class="btn btn-danger" href ="{{url('delete_catagory',$data->id)}}">Remove </a>
                </td>
              </tr>
              @endforeach
            </table>
        </div>
      </div> 
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');
    <!-- End custom js for this page -->
  </body>
</html>