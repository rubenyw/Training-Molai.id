<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('Library.cdn_style')
</head>
<body class="h-100">
    @include('Admin.admin_navbar')
    <div class="container-fluid w-100 h-100">
        @yield('body')
    </div>
    <div class="fixed-action-btn" data-mdb-button-init data-mdb-ripple-init>
        {{-- <button type="button" class="btn btn-floating text-white btn-lg" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal" style="background-color: #f44336;">
            <i class="fas fa-pencil-alt"></i>
        </button> --}}
        <a class="btn btn-floating text-white btn-lg" data-mdb-button-init data-mdb-ripple-init style="background-color: #f44336;">
            <i class="fas fa-pencil-alt"></i>
        </a>
      
        <ul class="list-unstyled">
            <li>
                <button class="btn text-white btn-floating btn-lg" id="floating-button" data-mdb-button-init data-mdb-ripple-init style="background-color: #f44336;">
                    {{-- <i class="fas fa-star"></i> --}}
                    <i class="fas fa-plus"></i>
                </button>
            </li>
            <li>
                <a class="btn text-white btn-floating btn-lg" data-mdb-button-init data-mdb-ripple-init style="background-color: #fdd835;">
                    <i class="fas fa-user"></i>
                </a>
            </li>
            <li>
                <a class="btn text-white btn-floating btn-lg" data-mdb-button-init data-mdb-ripple-init style="background-color: #4caf50;">
                    <i class="fas fa-envelope"></i>
                </a>
            </li>
            <li>
                <a class="btn text-white btn-floating btn-lg" data-mdb-button-init data-mdb-ripple-init style="background-color: #2196f3;">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </li>
        </ul>
    </div>

  <!-- Modal Insert -->
    <div class="modal fade" id="modal-insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" id="form-insert" method="post" class="" novalidate>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close btn-modal-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @yield('modal-insert-body')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-modal-close" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit" data-mdb-ripple-init>Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    {{-- Modal Delete --}}
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" id="form-delete" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                    <button type="button" class="btn-close btn-modal-del-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this item ?</p>
                </div>
                <input type="hidden" name="id" id="id" value="0">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-modal-del-close" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" data-mdb-ripple-init>Delete</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>
@include('Library.cdn_script')
<script>
    $(document).on("click", ".btn-modal-close", function(){
        $("#modal-insert").modal("hide");
    });

    $(document).on("click", ".btn-modal-del-close", function(){
        $("#modal-delete").modal("hide");
    });

    // $(document).on("submit", "#form-insert", function(event){
    //     let isValid = true;
    //     $(".is-invalid").removeClass("is-invalid");

    //     $(this).find("input, select").each(function(){
    //         if($(this).val() == "" || $(this).attr("type") == "number" && $(this).val() <= 0){
    //             isValid = false;
    //             $(this).addClass("is-invalid");
    //         }
    //     })

    //     if(!isValid){
    //         event.preventDefault();
    //     }
    // })

    function FormIsValid(form) {
        let isValid = true;

        $(".is-invalid").removeClass("is-invalid");
        $(`#${form}`).find("input, select").each(function(){
            if($(this).val() == "" || ($(this).attr("type") == "number" && $(this).val() <= 0)){
                $(this).addClass("is-invalid");
                isValid = false;
            }
        })

        return isValid;
    }
</script>
@yield('custom-js')