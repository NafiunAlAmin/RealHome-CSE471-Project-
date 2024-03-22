<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nearby</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/node_modules/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="admin/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="admin/images/favicon.png" />
    <title>Document</title>
    <head>
    <style type="text/css">
        .page-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Changed height to minimum height */
            background-color: #f8f9fa; /* Added background color */
        }

        .form-section {
            width: 60%; /* Adjusted width */
            background-color: #ffffff; /* Added background color */
            padding: 20px; /* Added padding */
            border-radius: 8px; /* Added border radius */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Added box shadow */
        }

        .div_center {
            margin-bottom: 20px; /* Increased margin bottom */
            text-align: center;
        }

        .div_center label {
            display: block;
        }

        .div_center input[type="text"],
        .div_center textarea,
        .div_center input[type="file"],
        .div_center select {
            width: 100%;
            padding: 8px; /* Added padding */
            border: 1px solid #ced4da; /* Added border */
            border-radius: 4px; /* Added border radius */
            box-sizing: border-box; /* Added box sizing */
        }

        .btn {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 4px; /* Added border radius */
            transition: background-color 0.3s; /* Added transition */
        }

        .btn:hover {
            background-color: #0056b3;
        }
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: black;
        }
        .table_deg {
            border: 1px solid black;
            width: 80%;
            text-align: center;
            margin-left: auto;
            margin-right: auto; /* Center align table */
            background-color: #ffffff; /* Added background color */
            border-collapse: collapse; /* Added border collapse */
        }
        .table_deg th, .table_deg td {
            border: 1px solid #ced4da; /* Added border */
            padding: 8px; /* Added padding */
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
    <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper1">
            <div class="page-content">
                <form action="{{ route('postnearby') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <label>Title</label> 
                        <input type="text" name="title">
                    </div>
                    <div class="div_center">
                        <label>Address</label> 
                        <input type="text" name="address">
                    </div>
                    <div class="div_center">
                        <label>Type</label> 
                        <input type="text" name="type">
                    </div>
                    <div class="div_center">
                        <label>description</label> 
                        <input type="text" name="description">
                    </div>
                    <div class="div_center">
                        <label>Add Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="div_center">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            <!-- </div>
        </div>
    </div>
    <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
            <div class="page-content"> -->
                    <h1 class="title_deg">All Post</h1>

                    <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <form action="{{url('admin_search_post')}}" method="get">
                                @csrf

                                <div>
                                    <input class="btn btn-danger" type="submit" value="Show ALL">
                                </div>

                                <div style = "padding-top: 10px;">
                                    <input class="btn btn-danger" type='submit' name='unverified' value="Show All Unverified"></button>
                                </div>

                                <div style = "padding-top: 10px;">
                                    <input class="btn btn-danger" type='submit' name='verified' value="Show All Verified"></button>
                                </div>
                        </div>
                        
                        <div class="col-md-10">

                            <table class="table_deg">
                                <tr>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                </tr>
                                @foreach($post as $singlePost)
                                <tr>
                                    <td>{{ $singlePost->name }}</td>
                                    <td>{{ $singlePost->address }}</td>
                                    <td>{{ $singlePost->type }}</td>
                                    <td>{{ $singlePost->description }}</td>
                                    <td>
                                        <img class="img_deg" src="nearbyimage/{{ $singlePost->image }}">
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('admin.footer')
<!-- body wrapper -->
  <!-- plugins:js -->
  <script src="admin/node_modules/material-components-web/dist/material-components-web.min.js"></script>
  <script src="admin/node_modules/jquery/dist/jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="admin/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="admin/node_modules/progressbar.js/dist/progressbar.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="admin/js/misc.js"></script>
  <script src="admin/js/material.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="admin/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
</html>