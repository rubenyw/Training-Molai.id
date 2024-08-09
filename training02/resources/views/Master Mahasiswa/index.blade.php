@extends('general.layout')
@section('container-fluid')
    <div class="container pt-2">
        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-striped">
                    <thead>
                        <td>#</td>
                        <td>UID</td>
                        <td>NRP</td>
                        <td>Nama</td>
                        <td>Jurusan</td>
                        <td class="text-center">Action</td>
                    </thead>
                    <tbody>
                        @foreach (Session::get("mahasiswa") as $key => $item)
                            <tr class="align-middle">
                                <td> {{$loop->iteration}} </td>
                                <td>{{$item["uid"]}}</td>
                                <td>{{$item["mahasiswa_nrp"]}}</td>
                                <td>{{$item["mahasiswa_nama"]}}</td>
                                <td>{{$item["mahasiswa_jurusan"]}}</td>
                                <td class="text-center" index='{{$key}}'>
                                    <button class="btn btn-warning btn-edit">Edit</button>
                                    <button class="btn btn-danger btn-delete">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <button class="btn btn-primary" id="modal-btn">Add Mahasiswa</button>
            </div>
        </div>
    </div>
@endsection
@section('modal-insert')
<form action="/master/mahasiswa/insert" method="post" id="form-insert">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Insert Mahasiswa</h5>
            <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="" class="form-label">NRP</label>
                    <input type="text" name="mahasiswa_nrp" id="mahasiswa_nrp" class="form-control">
                </div>
                <div class="col-12 mb-3">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" name="mahasiswa_nama" id="mahasiswa_nama" class="form-control">
                </div>
                <div class="col-12 mb-3">
                    <label for="" class="form-label">Jurusan</label>
                    <select name="mahasiswa_jurusan" id="mahasiswa_jurusan" class="form-select">
                        @foreach (Session::get("jurusan") as $item)
                            <option value="{{$item["uid"]}}">{{$item["jurusan_nama"]}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <input type="hidden" name="edit-index" id="edit-index" value="-1">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-close-modal" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</form>
@endsection
@section('custom-js')
    <script>
        $("#delete-form").attr("action", "/master/mahasiswa/delete");

        $(document).on("click", "#modal-btn", function(){
            $("#modal-insert").show()
        })

        $(document).on("click", ".btn-delete", function(){
            let idx = $(this).parent("td").attr("index");

            $("#modal-delete").show();
            $("#delete-index").val(idx);
        });

        $(document).on("click", ".btn-close-modal", function(){
            $("#modal-insert").hide();
            $('#form-insert')[0].reset();
            $('#form-insert').attr("action", "/master/mahasiswa/insert");
            $('#form-insert .modal-title').text("Insert Mahasiswa");
            $(".is-invalid").removeClass("is-invalid");
            $("#edit-index").val(-1);
        });

        $(document).on("click", ".btn-close-delete", function(){
            $("#modal-delete").hide();
            $("#delete-index").val(-1);
        });

        $(document).on("submit", "#form-insert", function(event){
            let isValid = true;

            $(".is-invalid").removeClass("is-invalid");
            $("#form-insert input, #form-insert select").each(function(){
                if($(this).val() == ""){
                    $(this).addClass("is-invalid");
                    isValid = false;
                }
            })

            if(!isValid){
                event.preventDefault();
            }
        });

        $(document).on("click", ".btn-edit", function(){
            $("#modal-insert").show();
            $("#form-insert").attr("action", "/master/mahasiswa/edit");
            $("#form-insert").find(".modal-title").text("Edit Mahasiswa");

            // edit index
            var editIdx = parseInt($(this).parent("td").attr("index"));
            $("#edit-index").val(editIdx);

            let mahasiswa = @json(Session::get("mahasiswa"))[editIdx];
            $("#mahasiswa_nrp").val(mahasiswa.mahasiswa_nrp);
            $("#mahasiswa_nama").val(mahasiswa.mahasiswa_nama);
            $("#mahasiswa_jurusan").val(mahasiswa.jurusan_uid);
        });
    </script>
@endsection