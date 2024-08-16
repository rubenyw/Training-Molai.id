@extends('layout')

@section('body')
    <div class="container-fluid py-5">
        <div class="row justify-content-end">
            <div class="col-1">
                <button type="button" class="btn btn-success" id="btn-add-table">Add Table</button>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Capacity</td>
                    </tr>
                </thead>
                <tbody id="table-table">
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modal-insert">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Table</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Table Name</label>
                            <input type="text" name="table_name" id="table_name" class="form-control">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Table Capacity</label>
                            <input type="text" name="table_capacity" id="table_capacity" class="form-control number-only">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btn-submit">Save changes</button>
                </div>
            </div>
        </div>
  </div>
@endsection

@section('custom-js')
    <script>
        let token = "{{ csrf_token() }}";

        RefreshData();

        function RefreshInput() {
            $("#modal-insert input").each(function(){
                $(this).val('');
                $(this).removeClass("is-invalid");
                $("#modal-insert").modal("hide");
            })
        }

        function RefreshData(){
            $.ajax({
                url: "/getTable",
                method: "GET",
                success: function(e){
                    console.log(e);
                    
                },
                error: function(e){
                    console.log(e);
                    
                    toastr.error("Error", "Error");
                }
            })
        }

        $(document).on("click", "#btn-add-table", function() {
            $("#modal-insert input").val("");
            $("#modal-insert").modal("show");
        })

        $(document).on("keydown", "input[type='text']", function(event){
            if(event.key == "Enter"){
                $("#btn-submit").click();
            }
        })

        $(document).on("click", "#btn-submit", function(){
            $(".is-invalid").removeClass("is-invalid");

            let isValid = true;
            $("#modal-insert .form-control").each(function(){
                if($(this).val() == "" || $(this).val() == null){
                    isValid = false;
                    $(this).addClass("is-invalid");
                }
            })

            if(!isValid){
                toastr.error("Silahkan cek kembali inputan anda", "Gagal Insert");
            };

            $.ajax({
                url: "/insertTable",
                method: "post",
                data: {
                    table_name: $("#table_name").val(),
                    table_capacity: $("#table_capacity").val(),
                    _token: token
                },
                success: function(e) {
                    toastr.success("Data berhasil di insert", "Success");
                    RefreshInput();
                },
                error: function(e) {
                    
                },
            })
        })
    </script>
@endsection