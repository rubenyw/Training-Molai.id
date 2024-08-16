@extends('welcome')
@section('body')
    <div class="container-fluid py-5">
        <div class="row mb-3">
            <div class="row justify-content-between">
                <div class="col-2">
                    <div class="h3">Happy Resto Menu</div>
                </div>
                <div class="col-2 text-center">
                    <button class="btn btn-success" id="btn-form">Add Table</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{ public_path("img/meja") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-4 mb-3 text-center">
                <div class="card mx-auto " style="width: 18rem;">
                    <img src="{{ public_path("img/meja") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Judul</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-4 mb-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{ public_path("img/meja") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ public_path("img/meja") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    {{-- Modal Insert --}}
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
        let token = "{{ csrf_token() }}"

        function RefreshInput() {
            $("#modal-insert input").each(function(){
                $(this).val('');
                $(this).removeClass("is-invalid");
            })
        };

        $(document).on("hidden.bs.modal", "#modal-insert", function(){
            RefreshInput();
        })

        $(document).on("keydown", "input[type='text']", function(event){
            if(event.key == "Enter"){
                $("#btn-submit").click();
            }
        })

        $(document).on("click", "#btn-form", function(){
            $("#modal-insert").modal("show");
        })

        $(document).on("click", "#btn-submit", function(e){
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
                    toastr.error("Gagal");
                },
            })
        })
    </script>
@endsection