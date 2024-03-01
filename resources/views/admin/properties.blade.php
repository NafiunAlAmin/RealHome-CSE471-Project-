<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Admin</title>
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
<div class="page-wrapper mdc-toolbar-fixed-adjust">
      <main class="content-wrapper">
        <div class="page-content">
                <h1 class="title_deg">All Post</h1>

                <div class="container">
                <div class="row">
                    <div class="col-md-10">

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

                    <div class="col-md-2">
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