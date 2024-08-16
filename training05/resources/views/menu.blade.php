@extends('layout')

@section('body')
    <div class="container-fluid py-5">
        <div class="row justify-content-end">
            <div class="col-1">
                <button type="button" class="btn btn-success" id="btn-add-menu">Add Menu</button>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nama</td>
                        <td>Price</td>
                        <td>Picture</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menu as $item)
                        <tr>
                            <td>{{$item['menu_name']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modal-insert">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Menu Name</label>
                            <input type="text" name="menu_name" id="menu_name" class="form-control">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Menu Price</label>
                            <input type="text" name="menu_price" id="menu_price" class="form-control number-only nominal">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Menu Picture</label>
                            <input type="file" name="menu_picture" id="menu_picture" class="form-control">
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
        function RefreshInput() {
            $("#modal-insert input").each(function(){
                $(this).val('');
                $(this).removeClass("is-invalid");
            })
        }

        $(document).on("click", "#btn-add-menu", function() {
            $("#modal-insert input").val("");
            $("#modal-insert").modal("show");
        });

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
                url: "/insertMenu",
                method: "post",
                data: {
                    menu_name: $("#menu_name").val(),
                    menu_price: $("#menu_price").val(),
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