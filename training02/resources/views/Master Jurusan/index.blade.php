@extends('general.layout')
@section('container-fluid')
    <div class="container pt-2">
        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-striped">
                    <thead>
                        <td>#</td>
                        <td>UID</td>
                        <td>Jurusan</td>
                        <td class="text-center">Action</td>
                    </thead>
                    <tbody>
                        @foreach (Session::get("jurusan") as $key => $item)
                            <tr class="align-middle">
                                <td> {{$loop->iteration}} </td>
                                <td>{{$item["uid"]}}</td>
                                <td>{{$item["jurusan_nama"]}}</td>
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
                <button class="btn btn-primary" id="modal-btn">Add Jurusan</button>
            </div>
        </div>
    </div>
@endsection

@section('modal-insert')
<form id="form-insert" action="/master/jurusan/insert" method="post">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Insert Jurusan</h5>
            <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="" class="form-label">Nama Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control">
                </div>
            </div>
        </div>
        <input type="hidden" name="edit-index" id="edit-index" value="-1">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-close-modal" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-submit">Submit Data</button>
        </div>
    </div>
</form>
@endsection
@section('custom-js')
    <script>
        $("#delete-form").attr("action", "/master/jurusan/delete");

        $(document).on("click", "#modal-btn", function(){
            $("#modal-insert").show()
        })

        $(document).on("click", ".btn-delete", function(){
            let idx = $(this).parent("td").attr("index");

            $("#modal-delete").show();
            $("#delete-index").val(idx);
        })

        $(document).on("click", ".btn-close-modal", function(){
            $("#modal-insert").hide();
            $('#form-insert')[0].reset();
            $('#form-insert').attr("action", "/master/jurusan/insert");
            $('#form-insert .modal-title').text("Insert Jurusan");
            $(".is-invalid").removeClass("is-invalid");
            $("#edit-index").val(-1);
        })

        $(document).on("click", ".btn-close-delete", function(){
            $("#modal-delete").hide();
            $("#delete-index").val(-1);
        })

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
        })

        $(document).on("click", ".btn-edit", function(){
            $("#modal-insert").show();
            $("#form-insert").attr("action", "/master/jurusan/edit");
            $("#form-insert").find(".modal-title").text("Edit Jurusan");

            // edit index
            var editIdx = parseInt($(this).parent("td").attr("index"));
            $("#edit-index").val(editIdx);

            let jurusan = @json(Session::get("jurusan"))[editIdx];
            $("#jurusan").val(jurusan.jurusan_nama);
        });
    </script>
@endsection