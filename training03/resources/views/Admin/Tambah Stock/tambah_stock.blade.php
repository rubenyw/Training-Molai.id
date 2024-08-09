@extends('Admin.admin_layout')
@section('body')
<div class="row">
    <div class="col-12">
        <table class="table align-middle mb-0 bg-dark">
            <thead class="bg-dark">
                <tr>
                    <th>Name Barang</th>
                    <th>Title</th>
                    <th>Stock</th>
                    <th>Position</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Session::get("history_stock") as $item)
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
                            <p class="fw-bold mb-1">{{$item["barang_nama"]}}</p>
                            <p class="text-muted mb-0">{{$item["barang_id"]}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Software engineer</p>
                        <p class="text-muted mb-0">IT department</p>
                    </td>
                    <td>
                        @if ($item["stock"] >= 0)
                        <span class="badge badge-success rounded-pill d-inline">+ {{$item["stock"]}}</span>
                        @else
                        <span class="badge badge-danger rounded-pill d-inline">- {{$item["stock"]}}</span>
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
    <div class="col-12 mb-4">
        <div class="form-floating">
            <select class="form-select" name="barang_id" id="barang_id" aria-label="Floating label select example">
                <option selected hidden></option>
                @foreach (Session::get("barang") as $item)
                <option value="{{$item['barang_id']}}">{{$item["barang_name"]}}</option>
                @endforeach
            </select>
            <label for="floatingSelect">Nama Barang</label>
            <div class="invalid-feedback">Harus diisi!</div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-outline" data-mdb-input-init>
            <input type="number" value="0" id="barang_stock" class="form-control" name="barang_stock" />
            <label class="form-label" for="barang_stock">Stock Barang</label>
            <div class="invalid-feedback">Harus diisi!</div>
        </div>
    </div>
    {{-- <input type="hidden" name="edit_id" id="edit_id"> --}}
</div>
@endsection

@section('custom-js')
<script>
    let barnags = @json(Session::get("customer"));

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
        customers.forEach(element => {
            if(element.customer_name == $("#customer_name").val()){
                isValid = false;
            }
        });

        if(!isValid){
            event.preventDefault();
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Customer Already Registered!",
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
        $("#form-insert").attr("action", "/admin/customer/edit");
        $("#modal-insert .modal-title").text("Edit Customer");
        $("#btn-submit").text("Save Changes");
        $("#modal-insert").modal("show");
        $("#edit_id").val(id); // Corrected line

        let customer = customers.find(item => item.customer_id == id);
        $("#customer_name").val(customer.customer_name); 
    }

    function init() {
        resetModalInsert();
        $("#form-delete").attr("action", "/admin/tambah_stock/delete");
    }

    function resetModalInsert() {
        $("#form-insert")[0].reset();
        $(".is-invalid").removeClass("is-invalid");
        $("#modal-insert .modal-title").text("Tambah Stock");
        $("#form-insert").attr("action", "/admin/tambah_stock/insert");
        $("#edit_id").val("-1");
        $("#btn-submit").text("Submit Data");
    }
</script>
@endsection
