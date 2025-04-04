<!DOCTYPE html>
<html>
<head>
    <title>GorLib - Perpustakaan BPK Perwakilan Provinsi Gorontalo</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- plugin css -->
    <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"/>
    <!-- end plugin css -->

    @stack('plugin-styles')

    <!-- common css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <!-- end common css -->

    @stack('style')
</head>
<body data-base-url="{{url('/')}}">

<script src="{{ asset('assets/js/spinner.js') }}"></script>

@if(Route::has('login'))
    @auth
        <div class="main-wrapper" id="app">
            @include('layout.sidebar')
            <div class="page-wrapper">
                @include('layout.header')
                <div class="page-content">
                    @yield('content')
                </div>
                @include('layout.footer')
            </div>
        </div>
    @else
        <div class="main-container" id="app">
            <div class="page-wrapper">
                @include('layout.header-halaman-utama')
                <div class="page-content">
                    @yield('content')
                </div>
                @include('layout.footer')
            </div>
        </div>
    @endauth
@endif



<!-- base js -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/const.js') }}"></script>
<script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<!-- end base js -->

<!-- plugin js -->
@stack('plugin-scripts')
<!-- end plugin js -->

<!-- common js -->
<script src="{{ asset('assets/js/template.js') }}"></script>
<!-- end common js -->

@stack('custom-scripts')
</body>
</html>
