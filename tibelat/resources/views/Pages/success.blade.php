@extends('layouts.success')
@section('title', 'checkout success')

@section('content')
    <!-- MAIN SECTION -->
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img class="image__success" src="{{ url('FrontEnd/images/ic_mail.png') }}" alt="">
            <h1 class="head__greetings" >Yay! pembelian berhasil</h1>
            <p class="paragraf">
                Terimakasih sudah berbelanja hasil ternak kami. <br> ditunggu orderan selanjutnya :)
            </p>
            <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px5 return__home">Homepage</a>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ url('FrontEnd/scripts/checkout.js') }}"></script>
@endpush