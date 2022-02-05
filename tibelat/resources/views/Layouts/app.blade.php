<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('prepend-style')
    @include('Includes.style')
    @stack('addon-style')
    
    @include('sweetalert::alert')
</head>
<body>
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