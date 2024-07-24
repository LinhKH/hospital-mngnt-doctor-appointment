<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Favicon -->
    @if ($appSetting && $appSetting->favicon)
    <link rel="icon" href="{{ asset($appSetting->favicon) }}" sizes="16x16" type="image/png">
    @else
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16" type="image/png">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('admin/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('admin/js/config.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/css/flatpickr.min.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />

</head>
<body>
    <div id="app">
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">

                @include('layouts.inc.doctor.sidebar')

                <div class="layout-page">

                    @include('layouts.inc.doctor.navbar')

                    <div class="content-wrapper">

                        <div class="container-xxl flex-grow-1 container-p-y">
                            @yield('content')
                        </div>

                        @include('layouts.inc.doctor.footer')

                        <div class="content-backdrop fade"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- build:js admin/vendor/js/core.js -->
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/vendor/libs/jquery/jquery.js') }}"></script> --}}
    <script src="{{ asset('admin/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/js/flatpickr.js') }}"></script>
    <script>
        $(document).ready(function () {

            $("input[type=date]").flatpickr({
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
            });

            $("input[id=time]").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });

        });
    </script>

    <script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".summernote").summernote({
                height: 160,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        $(document).ready( function () {
            $('#myDataTable').DataTable({
                ordering: false,
            });
        });
    </script>

    <script src="{{ asset('admin/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin/js/main.js') }}"></script>

    <!-- Page JS -->
    {{-- <script src="{{ asset('admin/js/ui-toasts.js') }}"></script> --}}
    <script src="{{ asset('admin/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    @if (session('status'))
        <script>
            alertify.set('notifier','position', 'top-right');
            alertify.success('{{ session("status") }}');
        </script>
    @endif

    @yield('scripts')

</body>
</html>
