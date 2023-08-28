<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
@include('admin.css')
<style>
.div_center{
    text-align: center;
    padding-top: 40px;
}
.font_size{
    font-size: 40px;
    padding-bottom: 40px;
}
.text_color{
    color: black;
    padding-bottom: 20px;
}

label{
   display: inline-block;
   width: 200px; 
}

.div_design{
    padding-bottom: 15px;
}

</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
          @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}

          </div>
          @endif

        <div class="div_center">
            <h1 class="font_size">Update Product</h1>
            <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

            <div class="div_design">
            <label>Product Code : </label>
        <input type="text" class="text_color" name="code" placeholder="Write Code Here" required="" value="{{$product->code}}">
            </div>

            <div class="div_design">
            <label>Product Name : </label>
        <input type="text" class="text_color" name="name" placeholder="Write Name Here" required="" value="{{$product->name}}">
            </div>

            <div class="div_design">
            <label>Product Price : </label>
        <input type="number" class="text_color" name="price" placeholder="Write Price Here" required=""value="{{$product->price}}">
            </div>

            <div class="div_design">
            <label>Product Discounted Price : </label>
        <input type="number" class="text_color" name="discount_price" placeholder="Write Dsicounted Price Here"value="{{$product->discount_price}}">
            </div>

            <div class="div_design">
            <label>Current Product Image : </label>
       <img height="100" width="100" src="/product/{{$product->image}}">
            </div>

            <div class="div_design">
            <label>Change Product Image : </label>
        <input type="file" name="image" required=""value="{{$product->image}}">
            </div>

            <div class="div_design">
    <label>Product Category: </label>
    <select class="text_color" name="category" required="">
        <option value="" selected="">Add a category here</option> 
        @foreach($categories as $category)
            <option value="{{$category->catagory_name}}">{{$category->catagory_name}}</option>  
        @endforeach
    </select>
</div>



            <div class="div_design">
            
        <input type="submit" value="Update product" class="btn btn-primary">
            </div>
            </form>
        </div>

          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
