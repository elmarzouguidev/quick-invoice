<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" />
    <title>{{ $title ?? 'Quick Invoice' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <meta name="google" content="notranslate" />
    <meta content="app_creator" name="Elmarzougui Abdelghafour" />
    <meta content="app_name" name="Quick Invoice" />
    <meta content="app_version" name="1.1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    @viteReactRefresh
    @vite('resources/js/app.jsx')

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->



    <div id="layout-wrapper">


        <x-layouts.parts.header />

        <x-layouts.parts.sidebar />

        <div class="main-content" id="app">

            <div class="page-content">

                @yield('content')

            </div>


            <x-layouts.parts.footer />

        </div>


    </div>

</body>

</html>
