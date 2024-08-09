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
            ['name' => 'Ruben', 'age' => 30, 'email' => 'ruben@example.com'],
            ['name' => 'Yason', 'age' => 25, 'email' => 'yason@example.com'],
            ['name' => 'Winarta', 'age' => 28, 'email' => 'winarta@example.com'],
            ['name' => 'Alice', 'age' => 32, 'email' => 'alice@example.com'],
            ['name' => 'Bob', 'age' => 29, 'email' => 'bob@example.com'],
            ['name' => 'Charlie', 'age' => 35, 'email' => 'charlie@example.com'],
            ['name' => 'Diana', 'age' => 27, 'email' => 'diana@example.com'],
            ['name' => 'Eve', 'age' => 31, 'email' => 'eve@example.com'],
        ];

    @endphp
    <div class="container-fluid pt-5">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h1>{{$item["name"]}}</h1>
                        </div>
                        <div class="card-body">
                            <p>Age : {{$item["age"]}}</p>
                            <p>Email : {{$item["email"]}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
           <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Nama</td>
                            <td>Email</td>
                            <td class="text-end">Nomor</td>
                            <td>Jabatan</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody id="table-body-pic">
                        
                    </tbody>
                </table>
           </div>
        </div>
        <div class="row mt-5" id="form-input">
            <div class="col-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" id="input_nama">
            </div>
            <div class="col-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" id="input_email">
            </div>
            <div class="col-2">
                <label class="form-label">No</label>
                <input type="text" class="form-control" id="input_no">
            </div>
            <div class="col-2">
                <label class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="input_jabatan">
            </div>
            <div class="col-2">
                <br>
                <button class="btn btn-success" id="btn-add-pic">ADD PIC +</button>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-2">
                <button class="btn btn-primary" onclick="window.location.href='{{route('mahasiswa_indexpage')}}'">
                    To Mahasiswa Page
                </button>
            </div>
        </div>
        
        @for($i = 0; $i < 100; $i++)
            <br>
        @endfor
    </div>
    
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    // variabel data
    var data = [];
    var editIndex = -1;

    $(function(){
        $(document).on("click", "#btn-add-pic", function(){
            // is valid?
            let isValid = true;

            $(".is-invalid").removeClass("is-invalid");
            $("#form-input input").each(function(){
                if($(this).val() == ""){
                    isValid = false;
                    $(this).addClass("is-invalid");
                }
            })

            if(!isValid){
                alert("Ada Input Kosong!");
                return;
            }

            let temp = {
                nama : $("#input_nama").val(),
                email : $("#input_email").val(),
                no : $("#input_no").val(),
                jabatan : $("#input_jabatan").val(),
            };

            if(editIndex == -1){
                data.push(temp);
                alert("berhasil tambah data");
            }else{
                data[editIndex] = temp;
                editIndex = -1;
                $("#btn-add-pic").text("ADD PIC +");
                alert("Berhadil edit Data!");
            }

            $("#form-input input").val('');
            refreshData();
        })

        $(document).on("click", ".btn-delete-pic", function() {
            let index = parseInt( $(this).parent("td").attr("index"));
            data.splice(index, 1);
            refreshData();
        })

        $(document).on("click", ".btn-edit-pic", function() {
            editIndex = parseInt($(this).parent("td").attr("index"));
            $("#btn-add-pic").text("EDIT PIC");
            $("#input_nama").val(data[editIndex].nama);
            $("#input_email").val(data[editIndex].email);
            $("#input_no").val(data[editIndex].no);
            $("#input_jabatan").val(data[editIndex].jabatan);
        })

        function refreshData() {
            $("#table-body-pic").html("");
            data.forEach((temp, index) => {
                let newRow = $(`
                    <tr>
                        <td>${temp.nama}</td>
                        <td>${temp.email}</td>
                        <td class="text-end">${temp.no}</td>
                        <td>${temp.jabatan}</td>
                        <td class="text-center" index="${index}">
                            <button class="btn btn-warning btn-edit-pic">Edit</button>
                            <button class="btn btn-danger btn-delete-pic">Delete</button>    
                        </td>
                    </tr>
                `);
                $("#table-body-pic").append(newRow);
            });
        }
    })
</script>