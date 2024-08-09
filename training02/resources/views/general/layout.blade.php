<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid vh-100 bg-dark">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark border-body border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand me-5" href="{{route('homepage')}}">SIM</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse align-items-center" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('mhs_index') ? 'active' : '' }}" aria-current="page" href="{{route('mhs_index')}}">Master Mahasiswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('jurusan_index') ? 'active' : '' }}" href="{{route('jurusan_index')}}">Master Jurusan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('matkul_index') ? 'active' : '' }}" href="{{route('matkul_index')}}">Master Matkul</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('pengambilan_index') ? 'active' : '' }}" href="{{route('pengambilan_index')}}">Transasksi Pengambilan</a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('frs_index') ? 'active' : '' }}" href="{{route('frs_index')}}">FRS</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row h-75">
            @yield('container-fluid')
        </div>
    </div>

    <div class="modal" id="modal-insert" tabindex="-1">
        <div class="modal-dialog">
            @yield('modal-insert')
        </div>
    </div>

    <div class="modal" id="modal-delete" tabindex="-1">
        <div class="modal-dialog">
            <form id="delete-form" action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Warning!</h5>
                        <button type="button" class="btn-close btn-close-delete" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda sungguh ingin menghapus item ini ?</p>
                    </div>
                    <input type="hidden" name="delete-index" id="delete-index" value="-1">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-close-delete" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
@yield('custom-js')