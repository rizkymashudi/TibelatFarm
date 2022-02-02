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