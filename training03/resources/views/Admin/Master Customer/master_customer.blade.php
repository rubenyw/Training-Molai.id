@extends('Admin.admin_layout')
@section('body')
<div class="row">
    <div class="col-12">
        <table class="table align-middle mb-0 bg-dark">
            <thead class="bg-dark">
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Position</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Session::get("customer") as $item)
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
                            <p class="fw-bold mb-1">{{$item["customer_name"]}}</p>
                            <p class="text-muted mb-0">{{$item["customer_id"]}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Software engineer</p>
                        <p class="text-muted mb-0">IT department</p>
                    </td>
                    <td>
                        <span class="badge badge-success rounded-pill d-inline">Active</span>
                    </td>
                    <td>Senior</td>
                    <td class="text-center" id="{{$item["customer_id"]}}">
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
        <div class="form-outline" data-mdb-input-init>
            <input type="text" id="customer_name" class="form-control" name="customer_name" />
            <label class="form-label" for="customer_name">Customer Name</label>
            <div class="invalid-feedback">Harus diisi!</div>
        </div>
    </div>
    <input type="hidden" name="edit_id" id="edit_id">
</div>
@endsection

@section('custom-js')
<script>
    let customers = @json(Session::get("customer"));

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
        $("#form-delete").attr("action", "/admin/customer/delete");
    };

    function resetModalInsert() {
        $("#form-insert")[0].reset();
        $(".is-invalid").removeClass("is-invalid");
        $("#modal-insert .modal-title").text("Insert Customer");
        $("#form-insert").attr("action", "/admin/customer/insert");
        $("#edit_id").val("-1");
        $("#btn-submit").text("Submit Data");
    }
</script>
@endsection
