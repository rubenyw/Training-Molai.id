<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('Library.cdn_style')
</head>
<body>
    <div class="container-fluid bg-dark text-white">
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex align-items-center justify-content-center h-100">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"class="img-fluid" alt="Phone image">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <form action="/login" method="post" id="login-form">
                            @csrf
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="input_username" name="input_username" class="form-control form-control-lg" />
                                <label class="form-label" for="input_username">Username</label>
                                <div class="invalid-feedback">Harus diisi!</div>
                            </div>
            
                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="input_password" name="input_password" class="form-control form-control-lg" />
                                <label class="form-label" for="input_password">Password</label>
                            </div>
            
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <form action="">
            
    </form>
    </div>
</body>
</html>
@include('Library.cdn_script')
<script>
    let customer = @json(Session::get("customer"));
    console.log(customer);
    
    $(document).on("submit", "#login-form", function(event){
        let isEmpty = false;
        $(".is-invalid").removeClass("is-invalid");
        if($("#input_username").val() == ""){
            isEmpty = true;
        }

        if(isEmpty){
            $("#input_username").addClass("is-invalid");
            event.preventDefault();
            return;
        }
        
        
        let customer = $("#input_username").val();
        let isExist = isCustomerExist(customer);
        let isValid = (customer == "admin" || isExist)
        console.log(isCustomerExist(customer));
        console.log(isExist);
        
        if(!isValid){
            event.preventDefault();
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Customer doesn't exist!",
            });
        }
    })

        function isCustomerExist(customer_name) {
            for (let i = 0; i < customer.length; i++) {
                const element = customer[i];
                if(element.customer_name == customer_name){
                    return true;
                }
            }
            
            return false;
        }
</script>