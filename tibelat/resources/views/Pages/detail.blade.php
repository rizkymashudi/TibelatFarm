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
                            <h1>Ikan Cupang</h1>
                            <p>Beta</p>
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="FrontEnd/images/cupang2.jpg" class="xzoom" id="xzoom-default" xoriginal="FrontEnd/images/cupang2.jpg" width="660" height="350">
                                </div>
                                <div class="xzoom-thumbs">
                                    <a href="FrontEnd/images/cupang2.jpg">
                                        <img src="FrontEnd/images/cupang2.jpg" class="xzoom-gallery" width="128" xpreview="FrontEnd/images/cupang2.jpg">
                                    </a>
                                    <a href="FrontEnd/images/cupang2.jpg">
                                        <img src="FrontEnd/images/cupang2.jpg" class="xzoom-gallery" width="128" xpreview="FrontEnd/images/cupang2.jpg">
                                    </a>
                                    <a href="FrontEnd/images/cupang2.jpg">
                                        <img src="FrontEnd/images/cupang2.jpg" class="xzoom-gallery" width="128" xpreview="FrontEnd/images/cupang2.jpg">
                                    </a>
                                    <a href="FrontEnd/images/cupang2.jpg">
                                        <img src="FrontEnd/images/cupang2.jpg" class="xzoom-gallery" width="128" xpreview="FrontEnd/images/cupang2.jpg">
                                    </a>
                                    <a href="FrontEnd/images/cupang2.jpg">
                                        <img src="FrontEnd/images/cupang2.jpg" class="xzoom-gallery" width="128" xpreview="FrontEnd/images/cupang2.jpg">
                                    </a>
                                </div>
                            </div>
                            <h2>Tentang Ikan cupang</h2>
                            <p>Cupang, ikan laga, atau ikan adu siam adalah ikan air tawar yang habitat asalnya adalah beberapa negara di Asia Tenggara, antara lain Indonesia, Thailand, Malaysia, Brunei Darussalam, Singapura, Vietnam, dan Indonesia. Ikan cupang adalah salah satu ikan yang kuat bertahan hidup dalam waktu lama sehingga apabila ikan tersebut ditempatkan di wadah dengan volume air sedikit dan tanpa adanya alat sirkulasi udara (aerator), ikan ini masih dapat bertahan hidup.</p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <img src="FrontEnd/images/ic_event.png" alt="" class="featured-image">
                                    <div class="description">
                                        <h3>Feature event</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="FrontEnd/images/ic_foods.png" alt="" class="featured-image">
                                    <div class="description">
                                        <h3>Feature event</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="FrontEnd/images/ic_language.png" alt="" class="featured-image">
                                    <div class="description">
                                        <h3>Feature event</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Akun</h2>
                            <div class="customers my-2">
                                <img src="FrontEnd/images/customer1.jpg" class="customer-img rounded-circle mr-1">
                            </div>
                            <hr>
                            <h2>Informasi produk</h2>
                            <table class="product-informations">
                                <tr>
                                    <th width="50%">Harga</th>
                                    <td width="50%" class="text-right">
                                        RP. 10.000
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Harga</th>
                                    <td width="50%" class="text-right">
                                        RP. 10.000
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Harga</th>
                                    <td width="50%" class="text-right">
                                        RP. 10.000
                                    </td>
                                </tr>
                            </table>
                            @if(Auth::check())
                                <a href="#" class="btn btn-add-cart mt-4">
                                    <i class="fas fa-shopping-cart"></i>
                                    Tambahkan ke keranjang
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-add-cart mt-4 text-muted">
                                    <i class="fas fa-shopping-cart"></i>
                                    Tambahkan ke keranjang
                                </a>
                            @endif
                        </div>
                        <div class="join-container">
                            <a href="checkout.html" class="btn btn-block btn-buy mt-3 py-2">
                                Beli Sekarang
                            </a>
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