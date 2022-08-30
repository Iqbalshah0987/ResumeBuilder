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
            <div class="card shadow border-0 wow fadeInDown">
                <div class="card-header">
                    <h4><i class="bi bi-person-circle" style="color:#2bc5d4;"></i>&nbsp;&nbsp;Howdy,</h4>
                </div>
                <!-- card-body start -->
                <div class="card-body py-5 px-sm-5 px-4">

                    <!-- form start -->
                    <form action="" role="form" id="login-form" method="post" autocomplete="off">

                        <!-- Media -->
                        <div class="d-flex align-items-center gap-5 mb-4">
                            <!-- Avatar -->
                            <label class="form-label" for="logoUploader">
                                <img id="logoImg" onerror="this.onerror=null;this.src='img/logo/sek.png';" src="" alt="Image Description" style="width:73px; height:73px; border-radius:10px;">
                            </label>
                            
                            <div class="d-flex gap-3 ms-4">
                                <div class="btn btn-primary btn-sm form-attachment-btn">Upload Photo
                                    <input type="file" name="avatar" class="form-control form-attachment-btn-label" id="logoUploader" title="" placeholder="Upload Photo">
                                    <input value="old image name" name="prev_exist" type="hidden">
                                </div>
                                <!-- End Avatar title='< ?php echo($user["tagline"]==""||$user["tagline"]=="NULL")?"style='display:none'":""; ?>' -->
                                <button type="button" id="delete_btn" class="btn btn-outline-danger rounded-3">Delete</button>
                            </div>
                        </div>
                        <!-- End Media -->

                        <!-- form name field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="fullname" class="form-label">Name *</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="" aria-label="" title="" required>
                            </div>
                        </div>

                        <!-- form email field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="email" class="form-label">E-mail *</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email" placeholder="" aria-label="" title="" required>
                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                <span class="text-danger" id="email-alert"></span>
                            </div>
                        </div>

                        <!-- form mobile field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="mobile" class="form-label">Mobile *</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="" aria-label="" title="" required>
                            </div>
                        </div>
                        
                        <!-- form address field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="address" class="form-label">Address *</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="address" id="address" cols="30" rows="3" class="form-control" placeholder="" aria-label="" title="" required></textarea>
                            </div>
                        </div>

                        <!-- form city field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="city" class="form-label">City *</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="city" class="form-control" id="city" placeholder="" aria-label="" title="" required>
                            </div>
                        </div>
                        
                        <!-- form status field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="state" class="form-label">State *</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="state" class="form-control" id="state" placeholder="" aria-label="" title="" required>
                            </div>
                        </div>

                        <!-- form country field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="country" class="form-label">Country *</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="country" value="India" class="form-control" id="country" placeholder="" aria-label="" title="" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center">
                            <!-- <a href="forgot-password.php" class="text-primary">Forgot Password ?</a> -->
                            <button type="button" id="login-button" class="btn btn-lg btn-primary">&nbsp;&nbsp;Update&nbsp;&nbsp;</button>
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
                    url: "fun/user-login.php",
                    type: "POST",
                    data: {
                        lemail: email,
                        lpassword: password
                    },
                    success: function(data) {

                        if (data == 3) {
                            $("#email").val("");
                            $("#email").css("border-color", "");
                            $("#email-alert").html("");

                            $("#password").val("");
                            $("#password").css("border-color", "");

                            errorMsg("This E-mail or Password is not Registered.")
                        } else if (data == 2) {
                            $("#email").css("border-color", "red");
                            $("#password").css("border-color", "red");

                            errorMsg("E-mail or password is Incorrect.");
                        } else if (data == 1) {
                            location.href = "index.php";
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