<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/developer.css') }}" rel="stylesheet">
    <link rel='stylesheet' href="{{ asset('css/app.css') }}" />
    <link rel='stylesheet' href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel='stylesheet' href="{{ asset('css/admin/AdminLTE.css') }}" />
    <link rel='stylesheet' href="{{ asset('css/admin/datatables.css') }}" />
    <link rel='stylesheet' href="{{ asset('css/admin/style.css') }}" />
    <link rel='stylesheet' href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel='stylesheet' href="{{ asset('css/ionicons.min.css') }}" />
    <link rel='stylesheet' href="{{ asset('css/admin/skins/_all-skin.min.css') }}" />

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app">
        @if (Auth::guest())

        @else
            @include('layouts.header')
            @include('layouts.sidebar')
        @endif

        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/Sortable.min.js') }}"></script>
    <script src="{{ asset('js/jQuery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/dt.js') }}"></script>
    <script src="{{ asset('js/dtb.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/sells.js') }}"></script>
    <script src="{{ asset('js/zdeveloper.js') }}"></script>
</body>
</html>
