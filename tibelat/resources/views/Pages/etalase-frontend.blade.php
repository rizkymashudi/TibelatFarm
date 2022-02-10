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
                            @if (count($data) > 0)
                                <button class="btn btn-filter btn-sm mt-2 active">All</button>
                                <button class="btn btn-filter btn-sm mt-2">Cupang</button>
                                <button class="btn btn-filter btn-sm mt-2">Mas</button>
                                <button class="btn btn-filter btn-sm mt-2">Karang</button>
                                <button class="btn btn-filter btn-sm mt-2">Salmon</button>   
                            @else
                                <button class="btn btn-filter btn-sm mt-2 active">All</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="section-bestseller-fish row justify-content-center mt-5">
                    @forelse ($data as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-fish shadow text-center d-flex flex-column" style="background-image: linear-gradient(rgba(8, 8, 8, 0.678), rgba(0, 0, 0, 0)), url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}');">
                                <div class="fish-name">{{ $item->items_name }}</div>
                                <div class="fish-button mt-auto">
                                    <a href="{{ route('detail', $item->slug) }}" class="btn btn-fish-details px-4">View details</a>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="container-xxl" style="height: 100%; width:100%">
                        <div class="card shadow rounded" style="height: 100%">
                            <div class="card-body text-center">
                             <h1>Data Kosong</h1>
                            </div>
                          </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
