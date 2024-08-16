<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

        <title>Laravel</title>

        @include('General.general_css')
    </head>
    <body class="container-fluid">
        <div class="container-fluid">
            @include('Component.navbar')
            @yield('body')    
        </div>
    </body>
</html>
@include('General.general_js')
@yield('custom-js')
