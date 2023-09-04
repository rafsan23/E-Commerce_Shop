<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/header.png" type="">
      <title>E-lectronix Shop</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        .center{
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;
        }
        table,th,td{
            border: 1px solid grey;
        }
        .th_deg{
            font-size: 30px;
            padding: 5px;
            background: skyblue;
        }
        .img_deg{
            height: 200px;
            width: 200px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
               <!-- end header section -->
         <!-- slider section -->
        
         <!-- end slider section -->
     
      <div class="center">
        <table>
            <tr>
                <th class="th_deg">product Title</th>
                <th class="th_deg">Product Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>

            </tr>
            <?php $totalprice=0; ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>TK {{$cart->price}}</td>
                <td><img class="img_deg" src="/product/{{$cart->image}}"></td>
                <td><a href="{{url('remove_cart',$cart->id)}}" class="btn btn-danger" onclick="return confirm('are you sure to remove this?')">Remove product</a></td>

            </tr>

            <?php $totalprice=$totalprice + $cart->price ?>
            @endforeach

           
        </table>

        <div>
            <h1> Total price :TK {{$totalprice}}</h1>
        </div>
      </div>
     
      <!-- footer start -->
    
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>