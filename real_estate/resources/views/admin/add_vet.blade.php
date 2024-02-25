<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .post_title
        {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        .div_center
        {
            text-align: center;
            padding: 30px;
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
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        
      @if(session()->has('message'))
        <div class = "alert alert-success">
            <button type = "button" class="close" data-dismiss="alert" aria-hideen = "true">x</button>
            {{session()->get('message')}}
        </div>
      @endif
        <h1 class= "add_vet">
            Add Vet
        </h1>
        <div>
            <form action="{{url('add_vet_info')}}" method="POST" enctype= "multipart/form-data">
                @csrf
                <div class="div_center">
                    <label> Add Vet Name</label> 
                        <input type="text" name = "name">
                    
                </div>

                <div class="div_center">
                    <label>Vet Contact Information</label> 
                        <input type="text" name = "contact">
                    
                </div>
                <div class="div_center">
                    <label>Locality</label> 
                        <input type="text" name = "locality">
                    
                </div>

                <div class="div_center">
                    <label>Vet Address</label>
                        
                        <textarea name="address">

                        </textarea>
                    
                </div>
                <div class="div_center">
                    <label>
                        Add Image</label>
                        <input type="file" name = "image">
                    
                </div>
                <div class="div_center">
                    
                        <input type="submit" name = "btn btn-primary">
                    
                </div>
            </form>
        </div>

      </div>

      
  </body>
</html>