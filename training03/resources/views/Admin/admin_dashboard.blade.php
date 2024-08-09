@extends('Admin.admin_layout')
@section('body')
<div class="row align-items-center h-100">
    <div class="col-12">
        <div class="h5 text-center">Hello</div>
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
        timer: 2000,
        timerProgressBar: true
    });

</script>
@endsection