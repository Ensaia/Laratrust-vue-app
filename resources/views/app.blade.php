<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon/auth.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.all.min.css') }}">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-200 min-h-screen font-base">
        <div id="app"></div>
        @vite('resources/js/app.js')
        <script type="text/javascript" src="{{ asset('js/fontawesome.all.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
