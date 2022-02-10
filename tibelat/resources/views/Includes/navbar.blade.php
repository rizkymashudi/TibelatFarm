
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ url('FrontEnd/images/logo.png') }}" alt="logo">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="{{ route('home') }}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#bestseller" class="nav-link">Best seller</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#testimonialContent" class="nav-link">Testimonial</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{ route('etalase-katalog') }}" class="nav-link">Etalase</a>
                </li>
        
                <li class="nav-item mx-md-2">
                    @if(Auth::check())
                        <a href="{{ route('cart') }}" class="nav-link cart">
                            <i class="fas fa-shopping-cart"></i>
                            @if(App\Models\TransactionsModel::where('transaction_status', '=', 'IN_CART')->count() > 0)
                                <span class="badge badge-danger">{{ App\Models\TransactionsModel::where('transaction_status', '=', 'IN_CART')->count() }}</span>
                            @endif
                            {{-- <span class="badge bg-danger ms-2 text-white">8</span> --}}
                        </a>
                    @else
                        <a href="#" id="cart" class="nav-link cart text-muted "><i class="fas fa-shopping-cart"></i></a>
                    @endif
                </li>
            </ul>

            @if (Auth::check())
                <!-- MOBILE BUTTON -->
                <form class="form-inline d-sm-block d-md-none" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0 px-4">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            @else
                <!-- MOBILE BUTTON -->
                <form class="form-inline d-sm-block d-md-none" action="{{ route('login') }}">
                    <button class="btn btn-login my-2 my-sm-0 px-4">
                        Login
                    </button>
                </form>
            @endif
            

            @if (Auth::check())
                <!-- DESKTOP BUTTON -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" id="btnLogout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            @else
                <!-- DESKTOP BUTTON -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ route('login') }}">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                        Login
                    </button>
                </form>
            @endif
            
        </div>
    </nav>
</div>


    <script src="{{ url('FrontEnd/libraries/swal/sweetalert2.all.min.js')}}"></script>
    <script>
        const cart = document.getElementbyId('button')
        console.log(cart)
        cart.addEventListener('click', function() {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
            })
        })
    </script>

