@extends('Customer.customer_layout')
@section('body')
<div class="row align-items-center h-100">
    <div class="col-12">
        <div class="h5 text-center">Hello, {{$customer["customer_name"]}}</div>
    </div>
</div>
@endsection
@section('custom-js')
<script>
    Swal.fire({
        toast: true,
        position: "top-end",
        icon: "success",
        title: "Sign In Successfuly!",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true
    });

</script>
@endsection