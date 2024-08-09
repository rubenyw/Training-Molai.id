<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @php
        $data = [
            [
                "Nama" => "Eric",
                "IPK" => floatval(2.1),
                "Nilai" => [
                    "UTS" => 30,
                    "UAS" => 50,
                ]
            ],
            [
                "Nama" => "Fellya",
                "IPK" => floatval(2.1),
                "Nilai" => [
                    "UTS" => 30,
                    "UAS" => 50,
                ]
            ]    
        ];
    @endphp

    @foreach ($data as $item)
        <h1>Nama :  {{$item["Nama"]}} </h1>
        <p>IPK :  {{$item["IPK"]}} </p>
        <p>Nilai UTS :  {{$item["Nilai"]["UTS"]}} </p>
    @endforeach

    <button class="btn btn-primary" onclick="window.location.href='{{route('homepage')}}'">
        To Home Page
    </button>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>