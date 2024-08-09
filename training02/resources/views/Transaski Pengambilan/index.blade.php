@extends('general.layout')
@section('container-fluid')
    <div class="container pt-2">
        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-striped">
                    <thead>
                        <td>#</td>
                        <td>UID</td>
                        <td>Nama Mahasiswa</td>
                        <td>Nama Matkul</td>
                        <td>Jurusan</td>
                        <td class="text-center">Action</td>
                    </thead>
                    <tbody>
                        @foreach (Session::get("pengambilan") as $key => $item)
                            <tr class="align-middle">
                                <td> {{$loop->iteration}} </td>
                                <td>{{$item["uid"]}}</td>
                                <td>{{$item["mahasiswa_nama"]}}</td>
                                <td>{{$item["jurusan_nama"]}}</td>
                                <td>{{$item["matkul_nama"]}}</td>
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
                <button class="btn btn-primary" id="modal-btn">Add Pengambilan</button>
            </div>
        </div>
    </div>
@endsection

@section('modal-insert')
<form action="/transaksi/pengambilan/insert" method="post" id="form-insert">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Pengambilan Matkul</h5>
            <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="" class="form-label">Nama Mahasiswa</label>
                    <select name="mahasiswa_uid" id="mahasiswa_id" class="form-select">
                        <option value="" selected hidden></option>
                        @foreach (Session::get("mahasiswa") as $item)
                            <option value="{{$item["uid"]}}">{{$item["mahasiswa_nama"]}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="" class="form-label">Jurusan</label>
                    <select type="text" class="form-select" name="jurusan_uid" id="jurusan_uid" disabled>
                        <option value=""></option>
                        @foreach (Session::get("jurusan") as $item)
                            <option value="{{$item["uid"]}}">{{$item["jurusan_nama"]}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="" class="form-label">Nama Matkul</label>
                    <select name="matkul_uid" id="matkul_uid" class="form-select">
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-close-modal" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</form>
@endsection
@section('custom-js')
    <script>
        $("#delete-form").attr("action", "/transaksi/pengambilan/delete");

        $(document).on("click", "#modal-btn", function(){
            $("#modal-insert").show();
        });

        $(document).on("click", ".btn-delete", function(){
            let idx = $(this).parent("td").attr("index");

            $("#modal-delete").show();
            $("#delete-index").val(idx);
        })

        $(document).on("click", ".btn-close-modal", function(){
            $("#modal-insert").hide();
            $('#form-insert')[0].reset();
            $('#form-insert').attr("action", "/transaksi/pengambilan/insert");
            $('#form-insert .modal-title').text("Insert Pengmabilan");
            $(".is-invalid").removeClass("is-invalid");
            $("#edit-index").val(-1);
        })

        $(document).on("change", "#mahasiswa_id", function(){
            let mhsData = @json(Session::get("mahasiswa"));
            let jrsData = @json(Session::get("jurusan"));
            let mklData = @json(Session::get("matkul"));
            
            let mahasiswa = mhsData.find(item=> item.uid == $(this).val());
            let jurusan = jrsData.find(item => item.uid == mahasiswa.jurusan_uid);
            let matkul = mklData.filter(item => item.jurusan_uid == jurusan.uid);

            console.log(mahasiswa);
            console.log(matkul);
            console.log(jurusan);

            $("#jurusan_uid").val(jurusan.uid);
            $("#matkul_uid").html("");

            matkul.forEach((item) => {
                $("#matkul_uid").append(`
                    <option value="${item.uid}">${item.matkul_nama}</option>
                `)
            })
        })
    </script>
@endsection