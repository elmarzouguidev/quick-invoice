<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" />
    <title inertia>{{ config('app.name', 'QuickInvoice') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <meta name="google" content="notranslate" />
    <meta content="app_creator" name="Elmarzougui Abdelghafour" />
    <meta content="app_name" name="Quick Invoice" />
    <meta content="app_version" name="1.1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

    @vite('resources/js/app.js') 

    @inertiaHead
    
</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->


    <div id="layout-wrapper">

        @inertia

    </div>


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


</body>

</html>
