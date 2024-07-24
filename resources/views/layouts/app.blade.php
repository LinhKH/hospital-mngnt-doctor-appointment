<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{$appSetting->website_name ?? "Doctor Appointment System"}}</title>

    @if ($appSetting && $appSetting->favicon)
    <link rel="icon" href="{{ asset($appSetting->favicon) }}" sizes="16x16" type="image/png">
    @else
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16" type="image/png">
    @endif

    <link rel="stylesheet" href="{{ asset('admin/vendor/fonts/boxicons.css') }}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        @include('layouts.inc.frontend.navbar')

        <div>
            @yield('content')
        </div>

        @include('layouts.inc.frontend.footer')

    </div>

    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2-box').select2();
        });
    </script>

    @yield('scripts')

</body>
</html>
