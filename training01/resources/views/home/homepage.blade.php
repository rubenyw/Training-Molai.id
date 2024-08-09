<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Welcome, {{$array[0]}} </h1>
    @php
        echo "<pre>";
        var_dump($array);
        echo "<br>";
        print_r($array);
        echo "</pre>";
        $data = 0;    
    @endphp

    <p>Data : {{$data}}</p>

    @foreach ($array as $item)
        <h1>{{$item}} </h1>
    @endforeach

    <button class="btn btn-primary" onclick="window.location.href='{{ route('mainpage') }}'">
        To Main Page
    </button>

    <button class="btn btn-success" onclick="window.location.href='{{route('cobapage')}}'">
        Coba Coba
    </button>
    
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>