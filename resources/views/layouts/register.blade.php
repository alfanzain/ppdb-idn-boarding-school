<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Student IDN Boarding School Registration</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('import-styles')
    @stack('styles')

    @livewireStyles
</head>

<body class="hold-transition register-page">

    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- AdminLTE App -->
    {{-- <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script> --}}
    @stack('import-scripts')

    @livewireScripts

    <script>
        window.addEventListener('swalSuccess', function(e) {
            Swal.fire({
                icon: 'success',
                title: 'Alhamdulillah',
                text: e.detail.message,
                confirmButtonText: 'Login',
            }).then(function() {
                window.location = "/login";
            })
        });

        window.addEventListener('swalError', function(e) {
            Swal.fire({
                icon: 'error',
                title: 'Qadarullah',
                text: e.detail.message,
            })
        });
    </script>

    @stack('scripts')
</body>

</html>
