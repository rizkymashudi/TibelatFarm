@extends('Layouts.app')

@section('title')
    Tibelat Farm
@endsection

@section('content')
    <!-- HEADER -->
    <header class="text-center" id="home">
        <h1>
            Solusi Ikan hias dan
            <br> 
            ikan konsumsi
        </h1>
        <p class="mt-3">
            Ikan cantik dan segar berkualitas <br> 
            untuk kebutuhan konsumsi anda atau sekedar penghias rumah
        </p>
        
        @auth
            <a href="{{ route('etalase-katalog') }}" class="btn btn-get-started px-4 mt-4">Pilih ikanmu sekarang!</a>
        @endauth

        @guest
            <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4">Pilih ikanmu sekarang!</a>
        @endguest
        

    </header>

    <!-- MAIN SECTION -->
    <main>
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-3 col-md-2 stats-detail">
                    <h2>20++</h2>
                    <p>Penjualan</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>5</h2>
                    <p>Jenis ikan</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>20++</h2>
                    <p>Berlangganan</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>10%</h2>
                    <p>Lebih Murah</p>
                </div>
            </section>
        </div>

        <section class="section-bestseller" id="bestseller">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-bestseller-heading">
                        <h2>Ikan best seller!</h2>
                        <p>Berikut jenis ikan <br> yang menjadi favorit pelanggan kami </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-bestseller-content" id="bestsellerContent">
            <div class="container">
                <div class="section-bestseller-fish row justify-content-center">
                    @forelse ($data as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-fish text-center d-flex flex-column" style="background-image: linear-gradient(rgba(8, 8, 8, 0.678), rgba(0, 0, 0, 0)), url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}');">
                                <div class="fish-name">{{ $item->items_name }}</div>
                                <div class="fish-button mt-auto">
                                    <a href="{{ route('detail', $item->slug) }}" class="btn btn-fish-details px-4">View details</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-fish text-center d-flex flex-column" style="background-image: linear-gradient(rgba(8, 8, 8, 0.678), rgba(0, 0, 0, 0)), url('./FrontEnd/images/cupang.jpg');">
                                <div class="fish-name">IKAN CUPANG</div>
                                <div class="fish-button mt-auto">
                                    <a href="{{ route('detail') }}" class="btn btn-fish-details px-4">View details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-fish text-center d-flex flex-column" style="background-image: linear-gradient(rgba(8, 8, 8, 0.678), rgba(0, 0, 0, 0)), url('./FrontEnd/images/mas.jpg');">
                                <div class="fish-name">IKAN MAS</div>
                                <div class="fish-button mt-auto">
                                    <a href="{{ route('detail') }}" class="btn btn-fish-details px-4">View details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-fish text-center d-flex flex-column" style="background-image: linear-gradient(rgba(8, 8, 8, 0.678), rgba(0, 0, 0, 0)),url('./FrontEnd/images/karang.jpg');">
                                <div class="fish-name">IKAN KARANG</div>
                                <div class="fish-button mt-auto">
                                    <a href="{{ route('detail') }}" class="btn btn-fish-details px-4">View details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-fish text-center d-flex flex-column" style="background-image: linear-gradient(rgba(8, 8, 8, 0.678), rgba(0, 0, 0, 0)), url('./FrontEnd/images/salmon.jpg');">
                                <div class="fish-name">IKAN SALMON</div>
                                <div class="fish-button mt-auto">
                                    <a href="{{ route('detail') }}" class="btn btn-fish-details px-4">View details</a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="section-testimonial-heading pt-5" id="testimonialHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Mereka puas</h2>
                        <p>dengan ikan segar yang mereka dapatkan</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-testimonial-content" id="testimonialContent">
            <div class="container">
                <div class="section-bestseller-fish row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="FrontEnd/images/customer1.jpg" alt="User" class="userImg mb-4 rounded-circle">
                                <h3 class="mb-4">Siti</h3>
                                <p class="testimonial">
                                    "Lorem ipsum dolor sit amet consectetur adipisicing elit."
                                </p>
                            </div>
                            <hr>
                            <p class="which-fish mt-2">
                                Ikan Cupang 
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="FrontEnd/images/customer2.jpg" alt="User" class="userImg mb-4 rounded-circle">
                                <h3 class="mb-4">Nur</h3>
                                <p class="testimonial">
                                    "Lorem ipsum dolor sit amet consectetur adipisicing elit."
                                </p>
                            </div>
                            <hr>
                            <p class="which-fish mt-2">
                                Ikan Salmon 
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="FrontEnd/images/user.png" alt="User" class="userImg mb-4 rounded-circle">
                                <h3 class="mb-4">Ari</h3>
                                <p class="testimonial">
                                    "Lorem ipsum dolor sit amet consectetur adipisicing elit."
                                </p>
                            </div>
                            <hr>
                            <p class="which-fish mt-2">
                                Ikan Mas 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx1">Butuh bantuan</a>
                        @auth
                            <a href="{{ route('etalase-katalog') }}" class="btn btn-choose-fish px-4 mt-4 mx1">Mulai pilih ikanmu!</a>
                        @endauth
                        @guest
                            <a href="{{ route('register') }}" class="btn btn-choose-fish px-4 mt-4 mx1">Mulai pilih ikanmu!</a>
                        @endguest
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection