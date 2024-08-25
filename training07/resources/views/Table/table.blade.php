@extends('welcome')
@section('body')
    <div class="container-fluid py-5">
        <div class="row mb-3">
            <div class="row justify-content-between">
                <div class="col-2">
                    <div class="h3">Happy Resto Table</div>
                </div>
                <div class="col-2 text-center">
                    <button class="btn btn-success" id="btn-form">Add Table</button>
                </div>
            </div>
        </div>
        <div class="row" id="row-meja">
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
                <div class="card mx-auto" style="width: 18rem;">
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

    {{-- Modal Order --}}
    <div class="modal fade" tabindex="-1" id="modal-order">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order for Table </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="row" id="order-menu">
                                <div class="col-4">
                                    <div class="card bg-dark" style="width: 9rem;">
                                        <img src="{{ asset('upload/menu/66bf7f52e61cf.webp') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                          <p class="card-text">Nasi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="row mb-3 justify-content-between">
                                <div class="col-5">
                                    <label for="" class="form-label">Nama Cashier</label>
                                    <input type="text" name="cashier_name" id="cashier_name" class="form-control">
                                </div>
                                <div class="col-5">
                                    <label for="" class="form-label">Nama Customer</label>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Nama</td>
                                            <td>Qty</td>
                                            <td>Harga</td>
                                            <td>Subtotal</td>
                                        </tr>
                                    </thead>
                                    <tbody class="  " style="height: 300px; overflow-y: scroll" id="table-order">
                                        <tr>
                                            <td class="col-1">1</td>
                                            <td class="col-2">Ruben</td>
                                            <td class="col-2">
                                                <input type="text" name="" id="" class="form-control number-only" onchange="ChangeQtyOrder(this, index)" value="1">
                                            </td>
                                            <td class="col-3">
                                                1000000
                                            </td>
                                            <td class="col-4">
                                                10000
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-3">Grand Total</div>
                                <div class="col-4 text-end" id="order-grand-total">Rp 50.000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="">Bill</button>
                    <button type="button" class="btn btn-success" id="btn-input-order">Order Food</button>
                </div>
            </div>
        </div>
  </div>
 
@endsection

@section('custom-js')
    <script>
        let token = "{{ csrf_token() }}"
        let tableData = [];
        let menuData = [];
        let orderData = [];
        let mejaOrder = -1;

        $(function(){
            RefreshDataMenu();
            RefreshDataTable();
        });


        function RefreshInput() {
            $("#modal-insert input").each(function(){
                $(this).val('');
                $(this).removeClass("is-invalid");
            })
        };

        function ShowOrderModal(index){
            $("#modal-order").modal("show");
            $("#modal-order .modal-title").text(`Order for Table ${tableData[index].meja_name}`)
            mejaOrder = index;
        }

        function OrderMenu(index){
            let menuItem = menuData[index];
            let existingIndex = orderData.findIndex(order => order.menu_id === menuItem.menu_id);
            
            if(existingIndex == -1){
                orderData.push({
                    ...menuData[index],
                    meja_id: tableData[mejaOrder].meja_id,
                    order_qty: 1,
                    order_subtotal: menuData[index].menu_price,
                });
            }else{
                orderData.splice(existingIndex, 1);
            }
            console.log(orderData);
            
            RefreshOrderMenu();
            RefreshGrandTotal();
        }

        function ViewTable(index) {
            let mejaId = tableData[index].meja_id;
            let order = [];

            $.ajax({
                url: `${mejaId}`,
                method: "get",
                success: function(e){
                    order = e;
                },
                error: function(e){

                }
            })
        }

        function ChangeQtyOrder(element, index) {
            let subtotal = element.value * orderData[index].menu_price;
            
            orderData[index].order_qty = element.value;
            orderData[index].order_subtotal = subtotal;

            $(element).closest("tr").find(".subtotal").text(formatRupiah(subtotal, "Rp "));

            RefreshGrandTotal();
        }

        function RefreshOrderMenu() {
            $("#table-order").html('');
            orderData.forEach((element, index) => {
                let $newRow = $(`
                    <tr>
                        <td class="col-1">
                            <img src="{{asset('upload/menu/${element.menu_picture}')}}" alt="" style="width: 30px; height: 30px">
                        </td>
                        <td class="col-2">${element.menu_name}</td>
                        <td class="col-2">
                            <input type="number" min="1" class="form-control number-only"  onkeyup="ChangeQtyOrder(this, ${index})" onchange="ChangeQtyOrder(this, ${index})" value="${element.order_qty}">
                        </td>
                        <td class="col-3">
                            ${formatRupiah(element.menu_price, "Rp ")}
                        </td>
                        <td class="col-4 subtotal">
                            ${formatRupiah(element.menu_price * element.order_qty, "Rp ")}
                        </td>
                    </tr>
                `)
                $("#table-order").append($newRow);
            });
        }

        function CountGrandTotal(params) {
            let grandTotal = 0;
            orderData.forEach(element => {
                grandTotal += element.menu_price * element.order_qty;
            });

            return grandTotal;
        }

        function RefreshGrandTotal() {
            let grandTotal = CountGrandTotal();
            $("#order-grand-total").text(formatRupiah(grandTotal, "Rp "));
        }

        function RefreshDataTable() {
            $.ajax({
                url: "/getTable",
                method: "GET",
                success: function(data) {
                    console.log(data);
                    tableData = data;
                    $("#row-meja").html("");
                    data.forEach((element, index) => {
                        console.log(element);
                        
                        let $newCard = $(`
                            <div class="col-4 mb-3 text-center">
                                <div class="card mx-auto py-0" style="width: 18rem; height: 9rem;">
                                    <div class="card-body">
                                    <h5 class="card-title">${element.meja_name}</h5>
                                    <h5>${element.meja_capacity} Orang</h5>
                                        <div class="row h-50 align-items-end">
                                            ${element.meja_available == 1? 
                                            `<div class="col-12">
                                                <button type-"button" class="btn btn-success" onclick="ShowOrderModal(${index})">Pesan</button>
                                            </div>` 
                                            :
                                            `
                                            <div class="col-12">
                                                <button type-"button" class="btn btn-primary btn-pesan">View</button>
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

        function RefreshDataMenu() {
            $.ajax({
                url: "/getMenu",
                method: "GET",
                success: function(data) {
                    $("#order-menu").html('');
                    menuData = data;
                    data.forEach((element, index) => {
                        let $newCard = $(`
                            <div class="col-4 mb-3">
                                <div class="card card-menu" style="width: 9rem;" onclick="OrderMenu(${index})">
                                    <img src="{{ asset('upload/menu/${element.menu_picture}') }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">${element.menu_name}</p>
                                        <p class="card-text">${formatRupiah(element.menu_price, "Rp ")}</p>
                                    </div>
                                </div>
                            </div>
                        `);
                        
                        $("#order-menu").append($newCard);
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Get detailed error response
                    toastr.error("Gagal");
                    return xhr;
                },
            });
        } 

        $(document).on("hidden.bs.modal", "#modal-insert", function(){
            RefreshInput();
        })

        $(document).on("hidden.bs.modal", "#modal-order", function(){
            orderData = [];
            mejaOrder = -1;
            RefreshOrderMenu();
            RefreshGrandTotal();

            $(this).find("input").val('');
        })

        $(document).on("click", "#btn-form", function(){
            $("#modal-insert").modal("show");
        });

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
                    RefreshDataTable();
                },
                error: function(e) {
                    toastr.error("Gagal");
                },
            })
        })

        $(document).on("click", "#btn-input-order", function(){
            let isEmpty = true;
            $(".is-invalid").removeClass("is-invalid");
            $("#modal-order input").each(function(){
                if($(this).val() == ''){
                    $(this).addClass('is-invalid');
                    isEmpty = false;
                }
            });

            if(!isEmpty){
                toastr.error("Ada field kosong!", "Gagal Insert");
                return;
            }

            if(orderData.length < 1){
                toastr.error("Tidak ada pesanan!", "Gagal Insert");
                return;
            }

            $.ajax({
                url: "/insertOrder",
                method: "POST",
                data: {
                    order_date: new Date().toISOString().slice(0, 10),
                    order_cashier: $("#cashier_name").val(),
                    order_customer: $("#customer_name").val(),
                    meja_id: $("").val(),
                    order_total: CountGrandTotal(),
                    meja_id: tableData[mejaOrder].meja_id,
                    detail_order: orderData,
                    _token: token
                },
                success: function(e) {
                    toastr.success("Data berhasil di insert", "Success");
                    $("#modal-order").modal("hide");
                    RefreshDataTable();
                },
                error: function(e) {
                    toastr.error("Gagal");
                },
            })
        })
    </script>
@endsection