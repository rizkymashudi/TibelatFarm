@extends('layouts.success')
@section('title', 'checkout success')

@section('content')
    <!-- MAIN SECTION -->
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url('FrontEnd/images/ic_mail.png') }}" alt="">
            <h1>Yay! pembelian berhasil</h1>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br> Tempora rerum sunt, repellat officia amet repudiandae eveniet perspiciatis numquam voluptatum minus dolores perferendis natus sapiente dicta soluta illum similique ut. Velit.
            </p>
            <a href="index.html" class="btn btn-home-page mt-3 px5">Homepage</a>
        </div>
    </div>
@endsection