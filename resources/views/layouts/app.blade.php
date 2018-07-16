<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body class="has-navbar-fixed-top">
        @include('_includes.nav.main')

    {{-- <div id="app"> --}}
        <div class="container">
            @include('manage.notification.errors')
            {{--@include('manage.notification.success')--}}
            @yield('content')
        </div>
    {{-- </div> --}}
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
        toastr.options = {
                "debug": false,
                "positionClass": "toast-top-center",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 1000,
                "timeOut": 1000,
                "extendedTimeOut": 1000
            }
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
        toastr.options = {
                "debug": false,
                "positionClass": "toast-top-center",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 2000,
                "timeOut": 1000,
                "extendedTimeOut": 1000
            }
            toastr.info("{{ Session::get('info') }}")
            @endif

            @if(Session::has('error'))
        toastr.options = {
                "debug": false,
                "positionClass": "toast-top-center",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 2000,
                "timeOut": 1000,
                "extendedTimeOut": 1000
            }
            toastr.error("{{ Session::get('error') }}")
            @endif
    </script>
    @yield('scripts')
</body>
</html>
