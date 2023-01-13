<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('pageTitle')</title>
    @livewireStyles

        <!-- Fonts -->
        <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    @yield('content')
    <!-- Libs JS -->
    <!-- Tabler Core -->
        <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
        <script src="{{ asset('dist/js/demo.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            window.addEventListener('alert', event => {
                    toastr[event.detail.type](event.detail.message,
                        event.detail.title ?? ''), toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                    }
                });
        </script>
    @livewireScripts
</body>

</html>
