<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('general_css')
</head>
<body class="container-fluid">
    @yield('body')
</body>
</html>
@include('general_js')
<script>
    function formatRupiah(angka, prefix) {
        angka = angka.toString();
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
    }

    function convertToAngka(rupiah) {
        return parseInt(rupiah.replace(/,.*|[^0-9]/g, ""), 10);
    }
    $(document).on("input", ".number-only", function() {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));

        if ($(this).val()[0] === '0') {
            $(this).val($(this).val().substring(1));
        }
    });

    $(document).on("keyup", ".nominal", function() {
        $(this).val(formatRupiah(convertToAngka($(this).val()),"Rp."));
    });
</script>
@yield('custom-js')