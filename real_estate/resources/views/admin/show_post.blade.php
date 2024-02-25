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
            padding: 30px;
            color: white;

        }
        .table_deg
        {
            border : 1px solid white;
            width: 80%;
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
                <th>Post Title</th>
                <th>Description</th>
                <th>Post by</th>
                <th>Post Status</th>
                <th>Usertype</th>
                <th>Image</th>
                <th>Delete</th>

            </tr>
@foreach($post as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->Post_status}}</td>
                <td>{{$post->user_type}}</td>
                <td>
                    <img class= "img_deg"src="postimage/{{$post->image}}">
                </td>
                <td>
                  <a href="{{url('delete_post',$post->id)}}" class = "btn btn-danger">Delete</a>
                </td>

            </tr>
@endforeach
        </table>

      </div>

      
  </body>
</html>