@extends('layouts.login')
@section('title', 'register')

@push('addon-style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="FrontEnd/styles/registration.css" rel="stylesheet">
@endpush

@section('content')
<div class="wrapper">
    <h2>{{ __('Register') }}</h2>
    <form action="{{ route('register') }}" method="POST">
      @csrf
        <div class="row">
            
                <div class="input-box">
                    <input class="form-control" type="text" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter your name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
        </div>
        
        <div class="row">
            <div class="input-box col-md-6">
                <input class="form-control" type="email" placeholder="Enter your email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-box col-md-6">
                <input type="text" name="phone" placeholder="Enter your phone">
            </div>
        </div>

        <div class="input-box mb-5">
            <textarea class="form-control" name="address" placeholder="Enter your Address" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      
      <div class="input-box">
        <input class="form-control" type="password" placeholder="Create password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="input-box">
        <input class="form-control"  type="password" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">
      </div>
    
      <div class="input-box button">
        <input type="Submit" value="Daftar sekarang">
      </div>
      <div class="text">
        <h3>Sudah punya akun? <a href="{{ route('login')}}">Login sekarang</a></h3>
      </div>
    </form>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
