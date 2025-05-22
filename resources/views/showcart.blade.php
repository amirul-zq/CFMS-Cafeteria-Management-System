<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>


                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>


                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>

                            <li class="scroll-to-section">
                                @auth
                                    <a href="{{url('/showcart', Auth::user()->id)}}">

                                        Cart[{{$count}}]
                                    </a>
                                @endauth
                                @guest
                                    Cart[0]
                                @endguest
                            </li>


                            <li class="scroll-to-section">
                                @if (Route::has('login'))
                                                <nav class="flex items-center justify-end gap-4">
                                                    @auth
                                                                <x-app-layout>

                                                                </x-app-layout>
                                                        </li>
                                                        <li class="scroll-to-section">
                                                    @else
                                                        <a href="{{ route('login') }}">
                                                            Log in
                                                        </a>

                                                    </li>
                                                    <li class="scroll-to-section">
                                                        @if (Route::has('register'))
                                                            <a href="{{ route('register') }}">
                                                                Register
                                                            </a>
                                                        @endif
                                                @endauth
                                    </nav>
                                @endif
                    </li>
                    </ul>

                    <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->



    <div id="top" class="table-container table-responsive"
        style="overflow-x: auto; margin-left: 400px; margin-top: 40px; width: 600px;">

        <table class="table table-bordered table-dark text-center">
            <tr align="center">
                <th scope="col">Food Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>

            </tr>

            <form action="{{url('/orderConfirm')}}" method="POST">
                @csrf
                <table class="table table-bordered table-dark text-center">
                    <tr align="center">
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($data as $data)
                        <tr align="center">
                            <td>
                                <input type="text" name="foodName[]" value="{{$data->title}}" hidden>
                                {{$data->title}}
                            </td>
                            <td>
                                <input type="text" name="price[]" value="{{$data->price}}" hidden>
                                {{$data->price}}
                            </td>
                            <td>
                                <input type="text" name="quantity[]" value="{{$data->quantity}}" hidden>
                                {{$data->quantity}}
                            </td>
                            <td></td>
                        </tr>
                    @endforeach

                    @foreach ($data2 as $item)
                        <tr class="text-center">
                            <td colspan="3"></td>
                            <td>
                                <a href="{{ url('/remove', $item->id) }}" class="btn btn-warning btn-sm"
                                    style="position: relative; top: -10px;">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <!-- Order Now button (shows extra fields) -->
                <div align="center" style="padding: 10px;">
                    <button type="button" class="btn btn-primary" id="order">Order Now</button>
                </div>

                <!-- Hidden fields for user input -->
                <div class="form-floating mb-3" id="appear" style="padding: 10px; display: none;">
                    <div style="padding: 10px" class="form-floating">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter your name">
                    </div>
                    <div style="padding: 10px" class="form-floating">
                        <label for="phone">Phone Number</label>
                        <input class="form-control" id="phone" type="number" name="phone"
                            placeholder="Enter your contact">
                    </div>
                    <div style="padding: 10px" class="form-floating">
                        <label for="address">Address</label>
                        <input class="form-control" id="address" type="text" name="address"
                            placeholder="Enter your address">
                    </div>
                    <div style="padding: 10px">
                        <button type="submit" class="btn btn-success">Confirm Order</button>
                        <button type="button" class="btn btn-danger" id="cancel">Cancel Order</button>
                    </div>
                </div>
            </form>




    </div>


    <script type="text/javascript">

        $("#order").click(
            function () {
                $("#appear").show();
            }
        );

        $("#cancel").click(
            function () {
                $("#appear").hide();
            }
        );

    </script>

    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
        $(function () {
            var selectedClass = "";
            $("p").click(function () {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function () {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>

</html>
