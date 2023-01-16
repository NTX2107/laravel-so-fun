<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin - {{$title}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @include('layouts.admin.style')
    @yield('extraStyle')
</head>

<body>
@include('layouts.admin.header')
@include('layouts.admin.sidebar')

<main id="main" class="main">
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>{{$title}}</h1>
        <nav>
            <ol class="breadcrumb">
                @foreach(processCurrentUrl() as $uri)
                    <li class="breadcrumb-item">
                        @if($uri == processCurrentUrl()[0])
                            <a href="{{route('admin.show.dashboard')}}">{{ucfirst($uri)}}</a>
                        @else
                            {{ucfirst($uri)}}
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <!-- Content -->
    <section class="section">
        @yield('content')
    </section>
    <!-- End Content -->
</main>

@include('layouts.admin.footer')
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
@include('layouts.admin.script')
@yield('extraJS')
@include('ckfinder::setup')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>
