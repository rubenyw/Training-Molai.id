<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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