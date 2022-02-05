@extends('layouts.login')
@section('title', 'login')

@push('addon-style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="FrontEnd/styles/signin.css" rel="stylesheet">
@endpush

@section('content')
<main class="form-signin">
    <div class="wrapper text-center">
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <img class="mb-4 logo-sign-in" src="FrontEnd/images/logo.png" alt="" width="200" height="80">
            {{-- <h1 class="h3 mb-3 fw-normal">Login</h1> --}}

            <div class="form-floating">
                <input type="email" id="floatingInput" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                <label for="floatingInput">{{ __('Email Address') }}</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" id="floatingPassword"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                <label for="floatingPassword">{{ __('Password') }}</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-sign-in" type="submit"> {{ __('Login') }}</button>
            <div class="text-center mt-3">
                <a href="{{ route('register')}}" class="text-muted">
                    Belum mempunyai akun? Daftar disini
                </a>
            </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link text-muted" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <p class="mt-5 mb-3 text-muted">&copy; 2021 Made in Batam</p>
        </form>
    </div>
</main>
@endsection
