<?php
$page = "";
require "pin/header-links.php";
require "pin/header.php";
?>


<!-- start container -->
<div class="container py-3">
    <!-- Start row -->
    <div class="row my-5">
        <!-- Start col-md-6 -->
        <div class="col-lg-7 col-md-9 mx-md-auto">

            <!-- card start -->
            <div class="card shadow border-0 py-4 wow fadeInDown">
                <h3 class="text-center mt-4 mb-0">Welcome Back !</h3>
                <!-- card-body start -->
                <div class="card-body py-4 px-sm-5 px-4">
                    <?php
                        if(isset($_SESSION['new_user_time'])){
                    ?>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                    </svg>
                        <div class="alert alert-success d-flex align-items-center justify-content-between rounded-3" role="alert">
                            <div>
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                Your Account Successfully Created.
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php 
                            if((time()-$_SESSION['new_user_time'])>10){
                                session_unset();
                                session_destroy();
                            }
                        } 
                    ?>
                    <!-- form start -->
                    <form action="" role="form" id="login-form" method="post" autocomplete="off">

                        <div class="d-flex justify-content-end align-items-center mb-3">
                            <a class="text-primary" data-bs-toggle="modal" href="#loginSignupModalToggle" role="button">Create New Account !</a>
                        </div>

                        <!-- form email field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="email" class="form-label">E-mail *</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email" placeholder="example@contact.com" aria-label="example@contact.com" autocomplete="off"   title="Please fill out this field." required>
                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                <span class="text-danger" id="email-alert"></span>
                            </div>
                        </div>

                        <!-- form password field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="password" class="form-label">Password *</label>
                            </div>
                            <div class="col-sm-9">
                                <div id="password-div">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="8+ Character Required" aria-label="8+ Character Required" autocomplete="off"   title="Please fill out this field." required>
                                    <span id="addon-password"><i class="bi bi-eye-slash fs-6"   title="Show Password" id="eye-button1"></i></span>
                                </div>
                                <!-- <span class="text-danger" id="password-alert"></span>
                                <span id="password-strength"></span> -->
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="forgot-password.php" class="text-primary">Forgot Password ?</a>
                            <button type="button" id="login-button" class="btn btn-lg btn-primary">Login</button>
                        </div>

                    </form>
                    <!-- End form -->

                </div>
                <!-- End card-body -->

            </div>
            <!-- End card -->

        </div>
        <!-- End col-md-6 -->
    </div>
    <!-- End row -->

</div>
<!-- End container -->


<?php
require "pin/footer.php";
require "pin/footer-links.php";
?>

<script type="text/javascript">
    $(document).ready(function() {

        // for take input fields value for insert in database
        $("#login-button").on("click", function() {

            var email = $("#email").val();
            var password = $("#password").val();

            // check for empty
            if (email != "" && password != "") {

                // for check email valid or not
                if (email != "") {
                    var regex_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (regex_email.test(email)) {

                        $("#email").css("border-color", "");
                        $("#email-alert").html("");
                    } else {

                        $("#email").focus().css("border-color", "red");
                        $("#email-alert").html("Please Fill the valid E-mail");
                    }
                } else {
                    $("#email").css("border-color", "");
                    $("#email-alert").html("");
                }

                $.ajax({
                    url:"fun/user-login.php",
                    type:"POST",
                    data:{lemail:email,lpassword:password},
                    success:function(data){

                        if(data==3){
                            $("#email").val("");
                            $("#email").css("border-color", "");
                            $("#email-alert").html("");

                            $("#password").val("");
                            $("#password").css("border-color", "");

                            errorMsg("This E-mail or Password is not Registered.")
                        }else if(data==2){
                            $("#email").css("border-color", "red");
                            $("#password").css("border-color", "red");

                            errorMsg("E-mail or password is Incorrect.");
                        }else{
                            if(data==1){

                                location.href="index.php";
                            }else{
                                location.href=data;
                            }
                        }
                    }

                });

            } else {
                // define in footer-links
                errorMsg("All Fields are required.");
                // alert("Please Fill All the fields.");
            }

        });

    });
</script>