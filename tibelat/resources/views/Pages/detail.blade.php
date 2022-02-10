@extends('Layouts.app')
@section('title', 'Detail')

@section('content')
    <!-- MAIN SECTION -->
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Etalase
                                </li>
                                <li class="breadcrumb-item active">
                                    Detail Ikan
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $item->items_name }}</h1>
                            <p>{{ $item->slug }}</p>
                            @if ($item->galleries->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image) }}" width="660" height="350">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ($item->galleries as $gallery)
                                    <a href="{{ Storage::url($gallery->image) }}">
                                        <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery" width="128" xpreview="{{ Storage::url($gallery->image) }}">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <h2>Tentang {{ $item->items_name }}</h2>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Akun</h2>
                            <div class="customers my-2">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ url('FrontEnd/images/user.png') }}" class="customer-img rounded-circle mr-1">
                                    </div>
                                    @auth
                                    <div class="col-4">
                                        <p>{{ Auth::user()->name }}</p>
                                    </div>
                                    @endauth

                                    @guest
                                    <div class="col-lg m-1">
                                        <p>login atau daftar terlebih dahulu</p>
                                    </div>
                                    @endguest
                                </div>
                            
                            </div>
                            <hr>
                            <h2>Informasi produk</h2>
                            <table class="product-informations">
                                <tr>
                                    <th width="50%">Stok</th>
                                    <td width="50%" class="text-right">
                                        {{ $item->stocks }} ekor
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Harga</th>
                                    <td width="50%" class="text-right">
                                        Rp. {{ $item->price }} / ekor
                                    </td>
                                </tr>
                            </table>
                            @if(Auth::check())
                            <form action="{{ route('cart-process', $item->id) }}" method="POST" class="text-center">
                                @csrf
                                <button class="btn btn-add-cart mt-4" type="submit">
                                    <i class="fas fa-shopping-cart"></i>
                                    Tambahkan ke keranjang
                                </button>
                            </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-add-cart mt-4 text-muted">
                                    <i class="fas fa-shopping-cart"></i>
                                    Tambahkan ke keranjang
                                </a>
                            @endif
                        </div>
                        <div class="join-container">
                            @auth
                            <form action="{{ route('buy-now', $item->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-block btn-buy mt-3 py-2">
                                    Beli Sekarang
                                </button>
                            </form>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-block btn-buy mt-3 py-2">
                                    Beli Sekarang
                                </a>
                            @endguest
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('FrontEnd/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
    <script src="{{ url('FrontEnd/libraries/xzoom/xzoom.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            })
            console('asd')
        })
    </script>
@endpush