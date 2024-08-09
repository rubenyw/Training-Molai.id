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
                @foreach (Session::get("transaksi") as $item)
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
                        <p class="fw-normal mb-1">{{$item["barang_name"]}}</p>
                        <p class="text-muted mb-0">{{$item["barang_id"]}}</p>
                    </td>
                    <td>
                        @if ($item["status"] == 1)
                        <span class="badge badge-primary rounded-pill d-inline">PENDING</span>
                        @elseif($item["status"] == 2)
                        <span class="badge badge-warning rounded-pill d-inline">PROCESS</span>
                        @elseif($item["status"] == 3)
                        <span class="badge badge-success rounded-pill d-inline">DONE</span>
                        @elseif($item["status"] == 4)
                        <span class="badge badge-danger rounded-pill d-inline">CANCEL</span>
                        @endif
                    </td>
                    <td>Senior</td>
                    <td class="text-center" id="{{$item["barang_id"]}}">
                        @if ($item["status"] == 1)
                        <button type="button" class="btn btn-warning btn-sm btn-rounded btn-edit">
                            Process
                        </button>
                        <button type="button" class="btn btn-danger btn-sm btn-rounded btn-del">
                            Cancel
                        </button>

                        @elseif($item["status"] == 2)
                        <button type="button" class="btn btn-success btn-sm btn-rounded btn-edit">
                            Done
                        </button>
                        @else
                        No Action
                        @endif
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
    <div class="col-12 mb-3">
        <label for="" class="form-label">Tanggal Transaksi</label>
        <input type="date" name="transaksi_date" id="transaksi_date" class="form-control">
    </div>
    <div class="col-12 mb-3">
        <label for="" class="form-label">Customer</label>
        <select name="customer_id" id="customer_id" class="form-select">
            <option value="" hidden></option>
            @foreach (Session::get("customer") as $item)
            <option value="{{$item["customer_id"]}}">{{$item["customer_name"]}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 mb-3">
        <label for="" class="form-label">Barang</label>
        <select name="barang_id" id="barang_id" class="form-select">
            <option value="" hidden></option>
            @foreach (Session::get("barang") as $item)
            <option value="{{$item["barang_id"]}}">{{$item["barang_name"]}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label for="" class="form-label">Jumlah Barang</label>
        <input type="number" name="barang_stock" id="barang_stock" class="form-control">
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
        $("#form-insert").attr("action", "/admin/transaksi/insert");
        $("#edit_id").val("-1");
        $("#btn-submit").text("Submit Data");
    }
</script>
@endsection
