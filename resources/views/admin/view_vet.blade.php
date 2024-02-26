<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type = "text/css">
        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 40px;
            color: white;

        }
        .table_deg
        {
            border : 1px solid white;
            width: 100%;
            text-align: center;
            margin-left: 100px;
        }
        .img_deg
        {
            height: 100px;
            width: 150px;
            padding: 10px;

        }

    </style>
  </head>
  <body>
    @include('admin.header')
        
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
      
        <h1 class="title_deg">All Post</h1>
        <table class="table_deg">
            <tr>
                <th>Vet Name</th>
                <th>Contact</th>
                <th>Locality</th>
                <th>Address</th>
                <th>Post status</th>
                <th>Image</th>
                <th>Delete</th>

            </tr>
@foreach($post as $post)
            <tr>
                <td>{{$post->name}}</td>
                <td>{{$post->contact}}</td>
                <td>{{$post->locality}}</td>
                <td>{{$post->address}}</td>
                <td>{{$post->image}}</td>
                <td>{{$post->Post_status}}</td>
                <td>
                    <img class= "img_deg"src="vet_image/{{$post->image}}">
                </td>
                <td>
                  <a href="{{url('delete_vet',$post->id)}}" class = "btn btn-danger">Delete</a>
                </td>

            </tr>
@endforeach
        </table>

      </div>

      
  </body>
</html>