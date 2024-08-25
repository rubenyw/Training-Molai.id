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
                            <img src="{{ asset('img/nasi.png') }}" class="img-fluid rounded-start" style="width: 10rem; height: 10rem;" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h4 class="card-title">Nasi</h4>
                            <p class="card-text">Rp 1.000</p>
                            <p class="card-text mt-5"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
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
        <button class="btn btn-danger">Habis</button>
        <button class="btn btn-success">Ada</button>
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
                url: "/getMenu",
                method: "GET",
                success: function(data) {
                    console.log(data);
                    
                    $("#row-menu").html("");
                    data.forEach(element => {
                        
                        let $newCard = $(`
                            <div class="col-4">
                                <div class="card mb-3 mx-auto g-col-4" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('upload/menu/${element.menu_picture}') }}" class="img-fluid rounded-start" style="width: 10rem; height: 10rem;" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                            <h4 class="card-title">${element.menu_name}</h4>
                                            <p class="card-text">${formatRupiah(element.menu_price)}</p>
                                            <p class="card-text mt-4" idx="${element.menu_id}">
                                                ${element.menu_available == 1 ? 
                                                `<button class="btn btn-danger">Habis</button>` : 
                                                '<button class="btn btn-success">Ada</button>'
                                                }
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);

                        $("#row-menu").append($newCard);
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

            let formData = new FormData();

            formData.append('menu_name', $("#menu_name").val());
            formData.append('menu_price', convertToAngka($("#menu_price").val()));
            formData.append('menu_picture', $("#menu_picture")[0].files[0]);
            formData.append('_token', token);
            console.log(formData);
            
            $(this).attr("disabled", true);

            $.ajax({
                url: "/insertMenu",
                method: "POST",
                contentType: false,
                processData: false,
                data: formData,
                success: function(e) {
                    toastr.success("Data berhasil di insert", "Success");
                    $("#modal-insert").modal("hide");
                    $("#btn-submit").attr("disabled", false);
                    RefreshData();
                },
                error: function(e) {
                    toastr.error("Gagal");
                },
            })
        })
    </script>
@endsection