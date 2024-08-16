@extends('welcome')
@section('body')
    <div class="container-fluid py-5">
        <div class="row mb-3">
            <div class="row justify-content-between">
                <div class="col-2">
                    <div class="h3">Happy Resto Menu</div>
                </div>
                <div class="col-2 text-center">
                    <button class="btn btn-success" id="btn-form">Add Menu</button>
                </div>
            </div>
        </div>
        <div class="row gap-0 align-items-center" id="row-menu">
            <div class="col-4">
                <div class="card mb-3 mx-auto g-col-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
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
                            <input type="text" name="meja_name" id="meja_name" class="form-control">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Table Capacity</label>
                            <input type="text" name="meja_capacity" id="meja_capacity" class="form-control number-only">
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

        RefreshData();

        function RefreshInput() {
            $("#modal-insert input").each(function(){
                $(this).val('');
                $(this).removeClass("is-invalid");
            })
        };

        function RefreshData() {
            $.ajax({
                url: "/getTable",
                method: "GET",
                success: function(data) {
                    console.log(data);
                    
                    $("#row-meja").html("");
                    data.forEach(element => {
                        console.log(element);
                        
                        let $newCard = $(`
                            <div class="col-4 mb-3 text-center">
                                <div class="card mx-auto" style="width: 18rem; height: 9rem;">
                                    <div class="card-body">
                                    <h5 class="card-title">${element.meja_name}</h5>
                                        <div class="row h-75 align-items-end">
                                            ${element.meja_available == 1? 
                                            '<div class="col-12"><button type-"button" class="btn btn-primary">Pesan</button></div' :
                                            `
                                            <div class="col-6">
                                                <button type-"button" class="btn btn-primary">Pesan</button>
                                            </div>
                                            <div class="col-6">
                                                <button type-"button" class="btn btn-primary">Pesan</button>
                                            </div>
                                            `    
                                            }
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);

                        $("#row-meja").append($newCard);
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Get detailed error response
                    toastr.error("Gagal");
                },
            });
        }

        $(document).on("hidden.bs.modal", "#modal-insert", function(){
            RefreshInput();
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
                method: "POST",
                data: {
                    meja_name: $("#meja_name").val(),
                    meja_capacity: $("#meja_capacity").val(),
                    _token: token
                },
                success: function(e) {
                    toastr.success("Data berhasil di insert", "Success");
                    $("#modal-insert").modal("hide");
                    RefreshData();
                },
                error: function(e) {
                    toastr.error("Gagal");
                },
            })
        })
    </script>
@endsection