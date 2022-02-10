<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    @stack('prepend-style')
    @include('Includes.style')
    @stack('addon-style')
    
    
</head>
<body>
    @include('sweetalert::alert')
    <!-- NAVBAR -->
    @include('Includes.navbar')

    {{-- CONTENT --}}
    @yield('content')

    <!-- FOOTER -->
    @include('Includes.footer')

    {{-- SCRIPT --}}
    @stack('prepend-script')
    @include('Includes.script')
    @stack('addon-script')
    
</body>
</html>