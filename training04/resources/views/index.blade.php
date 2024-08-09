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
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Gambar Barang</td>
                            <td>Kode Barang</td>
                            <td>Nama Barang</td>
                            <td>Stock Barang</td>
                            <td>Harga Barang</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                           <tr class="align-middle">
                                <td>
                                    <img src="{{ asset('upload/gambar_barang/' . $item['barang_picture']) }}" alt="Gambar Barang" class="img-fluid" width="100">
                                </td>
                                <td>
                                    {{$item["barang_code"]}}
                                </td>
                                <td>
                                    {{$item["barang_name"]}}
                                </td>
                                <td>
                                    {{$item["barang_stock"]}}
                                </td>
                                <td>
                                    {{$item["barang_price"]}}
                                </td>
                           </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <form action="/baranginsert" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5 align-items-center">
                <div class="col-2">
                    <label for="" class="form-label">Kode Barang</label>
                </div>
                <div class="col-2">
                    <label for="" class="form-label">Nama Barang</label>
                </div>
                <div class="col-2">
                    <label for="" class="form-label">Stok Barang</label>
                </div>
                <div class="col-2">
                    <label for="" class="form-label">Harga Barang</label>
                </div>
                <div class="col-2">
                    <label for="" class="form-label">Gambar Barang</label>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-2">
                    <input type="text" name="barang_code" id="barang_code" class="form-control">
                </div>
                <div class="col-2">
                    <input type="text" name="barang_name" id="barang_name" class="form-control">
                </div>
                <div class="col-2">
                    <input type="text" name="barang_stock" id="barang_stock" class="form-control">
                </div>
                <div class="col-2">
                    <input type="text" name="barang_price" id="barang_price" class="form-control">
                </div>
                <div class="col-2">
                    <input type="file" name="barang_picture" id="barang_picture" class="form-control">
                </div>
                <div class="col-2">
                    <button class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>