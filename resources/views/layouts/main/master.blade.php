<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- ***** Core CSS ***** -->
    @include('layouts.main.style')
    <!-- ***** Additional CSS ***** -->
    @yield('customStyle')
</head>

<body>
@include('layouts.main.preloader')

<!-- ***** NavBar ***** -->
@include('layouts.main.navbar')

<!-- ***** Banner ***** -->
@include('layouts.main.banner')

<!-- ***** Content ***** -->
@yield('content')

<!-- ***** Footer ***** -->
@include('layouts.main.footer')

<!-- ***** Alert ***** -->
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>
<!-- Scripts -->
@include('layouts.main.script')

</html>
