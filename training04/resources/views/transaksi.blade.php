@extends('layout')
@section('body')
    <div class="row">
        <input type="text" name="transaksi_date" id="transaksi_date">
    </div>
@endsection

@section('custom-js')
<script>
    var barang = @json($barang);
    var transaksi = [];
    $("#transaksi_tanggal, #dtransaksi_tanggal").val(getCurrentDate());

    $(document).on("submit", "", function() {
        
    })

    $(document).on("click", "#btn-tambah", function(){
        var index = $('#barang').val();
        var data = barang[index];
        var ada = -1;

        transaksi.forEach((item, index) => {
            if(item.arang.barang_id == data.barang_id){
                transaksi[index].jumlah += parseInt($('#jumlah').val());
                transaksi[index].subtotal = $('#jumlah').val() * data.barang_harga;
                ada = 1;
            }
        })

        var temp = {
            barang: data,
            jumlah: $("#jumlah").val()
        };
        transaksi.push(temp);
    })

    function refreshData() {
        var total = 0;
        $("#tb-transaksi").html("");

        transaksi.forEach(element => {
            $(`#tb-transaksi`).append(`
                <tr>
                    <td>
                        ${item.barang.barang_code}
                    </td>
                    <td>
                        ${item.barang_name}
                    </td>
                    <td>
                        ${item.total}
                    </td>
                    <td>
                        ${item.barang.barang_price}
                    </td>
                    <td>
                        ${number_format}
                    </td>
                </tr>
            `);
        });
    }
</script>
@endsection