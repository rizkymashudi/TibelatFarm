<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="{{ url('FrontEnd/libraries/bootstrap/css/bootstrap.css')}}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('FrontEnd/styles/main.css') }}">
</head>
<body>
    <!-- NAVBAR -->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <a href="#home" class="navbar-brand">
                <img src="{{ url('FrontEnd/images/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a href="#home" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="#bestseller" class="nav-link">Best seller</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="#testimonialContent" class="nav-link">Testimonial</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="katalog.html" class="nav-link">Etalase</a>
                    </li>
            
                    <li class="nav-item mx-md-2">
                        <a href="checkout.html" class="nav-link cart"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                </ul>

                <!-- MOBILE BUTTON -->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0 px-4">
                        Login
                    </button>
                </form>

                <!-- DESKTOP BUTTON -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                        Login
                    </button>
                </form>
            </div>
        </nav>
    </div>

    @yield('content')

    <!-- FOOTER -->
    <footer class="section-footer mt-5 mb-4 border-top">
        <div class="container pt-5 pb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <ui class="list-unstyled">
                                <img src="FrontEnd/images/logo.png" alt="logo" class="logo-footer">
                            </ui>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>Tentang kami</h5>
                            <ui class="list-unstyled">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                            </ui>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>Sosial media</h5>
                            <ui class="list-unstyled">
                                <li><a href="#"></a>Facebook</li>
                                <li><a href="#"></a>Tiktok</li>
                                <li><a href="#"></a>Instagram</li>
                                <li><a href="#"></a>Youtube</li>
                            </ui>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>Lokasi</h5>
                            <ui class="list-unstyled">
                                <li><a href="#"></a>Batam</li>
                                <li><a href="#"></a>Indonesia</li>
                                <li><a href="#"></a>0888-XXXX-XXXX</li>
                                <li><a href="#"></a>CustomerService@Tibelatfarm.com</li>
                            </ui>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid border-dark">
            <div class="row border-top justify-content-center align-items-center pt-4 pb-4">
                <div class="col-auto text-gray-500 font-weight-light">
                    2021 Copyright Tibelat farm. All rights reserved. Made in Batam
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ url('FrontEnd/libraries/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('FrontEnd/libraries/bootstrap/js/bootstrap.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ url('FrontEnd/libraries/retina/retina.min.js') }}"></script>
</body>
</html>