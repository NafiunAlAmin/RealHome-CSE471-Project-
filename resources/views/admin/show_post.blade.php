<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    <style type="text/css">
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        .table_deg {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 100px;
        }
        .img_deg {
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
                <th>Verify</th>
                <th>Reject</th>
            </tr>
            @foreach($post as $singlePost)
            <tr>
                <td>{{ $singlePost->title }}</td>
                <td>{{ $singlePost->description }}</td>
                <td>{{ $singlePost->name }}</td>
                <td>{{ $singlePost->Post_status }}</td>
                <td>{{ $singlePost->user_type }}</td>
                <td>
                    <img class="img_deg" src="postimage/{{ $singlePost->image }}">
                </td>
                <td>
                    <a href="{{ url('delete_post', $singlePost->id) }}" class="btn btn-danger">Delete</a>
                </td>
                <td>
                    <a href="{{ route('verify_post', $singlePost->id) }}" class="btn btn-outline-secondary">Verify</a>
                </td>
                <td>
                    <a href="{{ route('reject_post', $singlePost->id) }}" class="btn btn-primary">Reject</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>
