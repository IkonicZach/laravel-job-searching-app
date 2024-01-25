<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- favicon -->
    <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/choices.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/tobii.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom  Css -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" type="text/css" id="theme-opt">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css" id="operaUserStyle"></style>
    <style></style>

    <!-- JAVASCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/tobii.min.js') }}"></script>
    <script src="{{ asset('js/choices.min.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <!-- Custom -->
    <script src="{{ asset('js/plugins.init.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://kit.fontawesome.com/da36adc817.js"></script>
    <style type="text/css">
        .typewrite>.wrap {
            border-right: 0.08em solid transparent
        }
    </style>
    @livewireStyles
    @livewireScripts
</head>

<body>
    @yield('content')
    <x-flash />
    <livewire:scripts />
</body>
