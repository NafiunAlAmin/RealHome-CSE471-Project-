<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        .post_title
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        .div_center
        {
            text-align: center;
            padding: 40px;
        }
        label
        {
            display: inline block;
            width: 200px;
        }
    </style>
</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <!--@include('admin.sidebar')-->
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hideen="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <h1 class="post_title">Add Post</h1>
        <div>
            <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                    <label>Property Name</label>
                    <input type="text" name="title">
                </div>
                <div class="div_center">
                    <label>Property Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="div_center">
                    <label>Area</label>
                    <input type="text" name="area">
                </div>
                <div class="div_center">
                    <label>Size (Sq.ft)</label>
                    <input type="text" name="size">
                </div>
                <div class="div_center">
                    <label>Number of Bedrooms</label>
                    <input type="text" name="bedroom">
                </div>
                <div class="div_center">
                    <label>Number of Bathrooms</label>
                    <input type="text" name="bathroom">
                </div>
                <div class="div_center">
                    <label>Add Image</label>
                    <input type="file" name="image">
                </div>
                <div class="div_center">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
