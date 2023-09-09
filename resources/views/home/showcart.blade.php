<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/header.png" type="">

    <title>E-lectronix Shop</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css">

    <!-- Font Awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet">

    <!-- Responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding-top: 20px;
        }

        .center {
            margin: auto;
            width: 80%;
            text-align: center;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .th_deg {
            font-size: 18px;
        }

        .img_deg {
            max-width: 100%;
            height: auto;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .total-price {
            font-size: 24px;
            margin-top: 20px;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
    <!-- end slider section -->

    @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}

          </div>
          @endif
          
    <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Product Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>
            <?php $totalprice = 0; ?>
            @foreach($cart as $cart)
                <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>TK {{$cart->price}}</td>
                    <td><img class="img_deg" src="/product/{{$cart->image}}" alt="{{$cart->product_title}}"></td>
                    <td><a href="{{url('remove_cart',$cart->id)}}" class="btn btn-danger"
                           onclick="return confirm('Are you sure to remove this?')">Remove product</a></td>
                </tr>
                <?php $totalprice = $totalprice + $cart->price ?>
            @endforeach
        </table>
        <div class="total-price">
            <h1>Total price: TK {{$totalprice}}</h1>
            

            
        </div>

        <div>
            <h1 style="font-size: 25px; padding: bottom 15px;">Proceed to Order</h1>
            <a href="{{url('cash_order')}}"class="btn btn-danger">Cash On Delivery</a>
        </div>
    </div>
    <!-- footer start -->
    <div class="footer">
        <p>&copy; 2023 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a></p>
    </div>
    <!-- footer end -->
    <!-- jQuery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- Popper.js -->
    <script src="home/js/popper.min.js"></script>
    <!-- Bootstrap.js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- Custom.js -->
    <script src="home/js/custom.js"></script>
</body>
</html>
