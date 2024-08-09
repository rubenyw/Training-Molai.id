@extends('Admin.admin_layout')
@section('body')
<div class="row">
    <div class="col-12">
        <table class="table align-middle mb-0 bg-dark">
            <thead class="bg-dark">
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Stok</th>
                    <th>Position</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Session::get("barang") as $item)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle"
                                />
                            <div class="ms-3">
                            <p class="fw-bold mb-1">{{$item["barang_name"]}}</p>
                            <p class="text-muted mb-0">{{$item["barang_id"]}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Software engineer</p>
                        <p class="text-muted mb-0">IT department</p>
                    </td>
                    <td>               
                        @if ($item["barang_stock"] == 0)
                        <span class="badge badge-danger rounded-pill d-inline">{{$item["barang_stock"]}}</span>
                        @elseif($item["barang_stock"] <= 20)
                        <span class="badge badge-warning rounded-pill d-inline">{{$item["barang_stock"]}}</span>
                        @else
                        <span class="badge badge-success rounded-pill d-inline">{{$item["barang_stock"]}}</span>
                        @endif
                    </td>
                    <td>Senior</td>
                    <td class="text-center" id="{{$item["barang_id"]}}">
                        <button type="button" class="btn btn-warning btn-sm btn-rounded btn-edit">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm btn-rounded btn-del">
                            Delete
                        </button>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
@endsection

@section('modal-insert-body')
<div class="row">
    <div class="col-12">
        <div class="input-group form-outline" data-mdb-input-init>
            <input type="text" id="barang_name" class="form-control" name="barang_name" />
            <label class="form-label" for="barang_name">Barang Name</label>
            <div class="invalid-feedback">Harus diisi!</div>
        </div>
    </div>
    <input type="hidden" name="edit_id" id="edit_id">
</div>
@endsection

@section('custom-js')
<script>
    let barangs = @json(Session::get("barang"));

    $(function(){
        init();
    });

    $(document).on("click", "#floating-button", function(){
        $("#modal-insert").modal("show");
    });

    $(document).on("click", ".btn-del", function(){
        let id = $(this).parent("td").attr("id");
        showModalDelete(id);
    });

    $(document).on("click", ".btn-edit", function(){
        let id = $(this).parent("td").attr("id");
        showModalEdit(id);
    });

    $(document).on("hidden.bs.modal", "#modal-insert", function(){
        init();
    });

    $(document).on("submit", "#form-insert", function(event){
        let isValid = FormIsValid("form-insert");
        console.log(isValid);
        
        if(!isValid){
            event.preventDefault();
            return;
        }

        isValid = true;
        barangs.forEach(element => {
            if(element.barang_name == $("#barang_name").val()){
                isValid = false;
            }
        });

        if(!isValid){
            event.preventDefault();
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Barang Already Registered!",
                showConfirmButton: true,
            });
            return;
        }

    })

    function showModalDelete(id) {
        $("#modal-delete").modal("show");
        $("#modal-delete #id").val(id);
    }

    function showModalEdit(id) {
        $("#form-insert").attr("action", "/admin/barang/edit");
        $("#modal-insert .modal-title").text("Edit Barang");
        $("#btn-submit").text("Save Changes");
        $("#modal-insert").modal("show");
        $("#edit_id").val(id); // Corrected line

        let barang = barangs.find(item => item.barang_id == id);
        $("#barang_name").val(barang.barang_name); 
    }

    function init() {
        resetModalInsert();
        $("#form-delete").attr("action", "/admin/barang/delete");
    }

    function resetModalInsert() {
        $("#form-insert")[0].reset();
        $(".is-invalid").removeClass("is-invalid");
        $("#modal-insert .modal-title").text("Insert Barang");
        $("#form-insert").attr("action", "/admin/barang/insert");
        $("#edit_id").val("-1");
        $("#btn-submit").text("Submit Data");
    }
</script>
@endsection