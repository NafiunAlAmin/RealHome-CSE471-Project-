<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css');
    <style type='text/css'>
        .main-panel
        {
            background-color: #36454f;
        }
        .content-wrapper
        {
            background-color: #36454f;
        }
        .div_center
        {
            text-align: center;
            padding-top: 40 px;
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

        .center
        {
          margin: auto;
          width: 70%;
          height: 15%;
          color: black;
          text-align: center;
          margin-top: 30px;
          border-collapse: collapse;
          font-size: 1.2em;
          font-weight: normal;
          min-width: 400px;
        }
        .center1
        {
            background-color: #009879;
            color: #ffffff;

        }
        .center2
        {
          padding: 12px;
          border-bottom: 1px solid #dddddd;
          background-color: #f3f3f3;
        }

        .img_size
        {
            width: 150px;
            height: 150px;
        }
        
    </style>
  </head>
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
                <div class='div_center'>
                    <h1>Add animal for adoption :</h1>
                    <form action="{{url('/add_adoption')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <Label> Type :</label>
                            <select name='type' require=''>
                                <option>Type of animal</option>
                                <option>Cat</option>
                                <option>Dog</option>
                            </select>
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
                            <input type='number' name='age' placeholder='Age' required="">
                        </div>

                        <div class="div_design">
                            <Label> Gender :</label>
                            <select name='gender' require=''>
                                <option>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
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
                <table class="center">
                    <tr class="center1">
                        <td>Title</td>
                        <td>Type</td>
                        <td>Breed</td>
                        <td>Color</td>
                        <td>Age</td>
                        <td>Gender</td>
                        <td>Personality</td>
                        <td>Picture</td>
                        <td>Remove</td>
                    </tr>
                    @foreach($data as $data)
                    <tr class="center2">
                        <td>{{$data->title}}</td>
                        <td>{{$data->type}}</td>
                        <td>{{$data->breed}}</td>
                        <td>{{$data->color}}</td>
                        <td>{{$data->age}}</td>
                        <td>{{$data->gender}}</td>
                        <td>{{$data->personality}}</td>
                        <td>
                            <img src="/adoptpic/{{$data->image}}" class='img_size'></td>
                        <td>
                            <a class="btn btn-danger" href ="{{url('delete_adoption',$data->id)}}">Remove</a>
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