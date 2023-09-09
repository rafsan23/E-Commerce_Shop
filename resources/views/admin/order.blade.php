<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Admin</title>
    <!-- plugins:css -->
@include('admin.css')
<style>
    .title_deg {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 40px;
    }

    .table_deg {
        border: 2px solid white;
        border-collapse: collapse;
        width: 100%;
        margin: auto;
        text-align: center;
    }

    .th_deg {
        background-color: skyblue;
    }

    .table_deg th,
    .table_deg td {
        border: 1px solid #ddd; 
        padding: 8px;
        text-align: center;
    }

    .img {
        width: 100px;
        height: 100px;
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

        <h1 class="title_deg">All Orders</h1>
       
        <table class="table_deg">


        <tr class="th_deg">

        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Product Title</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Payment Status</th>
        <th>Delivery Status</th>
        <th>Image</th>
        <th>Delivered</th>

    

        </tr>
@foreach($order as $order)
        <tr >
        <td>{{$order->name}}</td>
        <td>{{$order->email}}</td>
        <td>{{$order->address}}</td>
        <td>{{$order->phone}}</td>
        <td>{{$order->product_title}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->price}}</td>
        <td>{{$order->payment_status}}</td>
        <td>{{$order->delivery_status}}</td>
        <td>
          <img class="img" src="/product/{{$order->image}}">
        </td>
        <td>
          @if($order->delivery_status=='processing')

          <a href="{{url('delivered',$order->id)}}" class="btn btn-primary">Delivered</a>
          @else
          <p style="color: green;">Delivered</p>
          @endif
        </td>


        </tr>

        @endforeach

        
        </table>

          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
