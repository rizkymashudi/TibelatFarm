@extends('Layouts.app')
@section('title', 'Etalase')

@section('content')
    <!-- HEADER -->
    <header class="text-center" id="home">
        <h1>
            Etalase
        </h1>
        <p class="mt-3">
            Ikan sehat dan segar
        </p>
    </header>

    <!-- MAIN SECTION -->
    <main>
        <section class="section-bestseller-content" id="bestsellerContent">
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-12">
                        <div class="product-filter text-center">
                            
                            <button class="btn btn-filter btn-sm mt-2 active">All</button>
                            <button class="btn btn-filter btn-sm mt-2">Cupang</button>
                            <button class="btn btn-filter btn-sm mt-2">Mas</button>
                            <button class="btn btn-filter btn-sm mt-2">Karang</button>
                            <button class="btn btn-filter btn-sm mt-2">Salmon</button>
                            
                        </div>
                    </div>
                </div>
                <div class="section-bestseller-fish row justify-content-center mt-5">
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
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-fish text-center d-flex flex-column" style="background-image: linear-gradient(rgba(8, 8, 8, 0.678), rgba(0, 0, 0, 0)), url('./FrontEnd/images/salmon.jpg');">
                            <div class="fish-name">IKAN SALMON</div>
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
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-fish text-center d-flex flex-column" style="background-image: linear-gradient(rgba(8, 8, 8, 0.678), rgba(0, 0, 0, 0)), url('./FrontEnd/images/salmon.jpg');">
                            <div class="fish-name">IKAN SALMON</div>
                            <div class="fish-button mt-auto">
                                <a href="{{ route('detail') }}" class="btn btn-fish-details px-4">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
