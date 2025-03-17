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
                <h3 class="text-center mt-4 mb-3">Reset Password !</h3>
                <!-- card-body start -->
                <div class="card-body py-4 px-sm-5 px-4">
                    <!-- form start -->
                    <form action="" role="form" id="forgot-password-form" method="post" autocomplete="off">

                        <!-- form password field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="cpassword" class="form-label">Current Password *</label>
                            </div>
                            <div class="col-sm-9">
                                <div id="cpassword-div">
                                    <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="8+ Character Required" aria-label="8+ Character Required" autocomplete="off" data-bs-toggle="tooltip" data-bs-placement="right" title="Please fill out this field." required>
                                    <span id="addon-cpassword"><i class="bi bi-eye-slash fs-6" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Password" id="eye-button2"></i></span>
                                </div>
                                <span class="text-danger" id="cpassword-alert"></span>
                            </div>
                        </div>

                        <!-- form password field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="npassword" class="form-label">New Password *</label>
                            </div>
                            <div class="col-sm-9">
                                <div id="npassword-div">
                                    <input type="password" name="npassword" class="form-control" id="npassword" placeholder="8+ Character Required" aria-label="8+ Character Required" autocomplete="off" data-bs-toggle="tooltip" data-bs-placement="right" title="Please fill out this field." required>
                                    <span id="addon-npassword"><i class="bi bi-eye-slash fs-6" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Password" id="eye-button3"></i></span>
                                </div>
                                <span class="text-danger" id="npassword-alert"></span>
                                <span id="password-strength"></span>
                            </div>
                        </div>

                        <!-- form password field -->
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="cnpassword" class="form-label">Confirm New Password *</label>
                            </div>
                            <div class="col-sm-9">
                                <div id="cnpassword-div">
                                    <input type="password" name="cnpassword" class="form-control" id="cnpassword" placeholder="8+ Character Required" aria-label="8+ Character Required" autocomplete="off" data-bs-toggle="tooltip" data-bs-placement="right" title="Please fill out this field." required>
                                    <span id="addon-cnpassword"><i class="bi bi-eye-slash fs-6" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Password" id="eye-button4"></i></span>
                                </div>
                                <span class="text-danger" id="cnpassword-alert"></span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" id="reset-button" class="btn btn-lg btn-primary">Reset</button>
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

        // for check password strength
        $("#npassword").keyup(function() {

            var password = $("#npassword").val();

            if (password != "") {
                if (password.length < 8) {

                    $("#npassword-alert").html("");
                    $("#password-strength").html("Weak Password");
                    $("#password-strength").addClass("text-danger").removeClass("text-warning text-success");
                    $("#npassword").css("border-color", "");

                } else if (password.match(/[a-z]+/) && password.match(/[A-Z]+/) && password.match(/[0-9]+/) && password.match(/[\`\~\!\@\#\$\%\^\&\*\(\)\-\_\+\=\,\<\.\>\?\/\[\{\]\}\;\:\'\"]+/)) {

                    $("#npassword-alert").html("");
                    $("#password-strength").html("Very Strong Password");
                    $("#password-strength").addClass("text-success").removeClass("text-warning text-danger");
                    $("#npassword").css("border-color", "");

                } else if (password.match(/[a-z]+/) && password.match(/[A-Z]+/) && password.match(/[0-9]+/)) {

                    $("#npassword-alert").html("");
                    $("#password-strength").html("Strong Password");
                    $("#password-strength").addClass("text-success").removeClass("text-warning text-danger");
                    $("#npassword").css("border-color", "");

                } else if (password.match(/[\`\~\!\@\#\$\%\^\&\*\(\)\-\_\+\=\,\<\.\>\?\/\[\{\]\}\;\:\'\"]+/) && password.match(/[A-Z]+/) && password.match(/[0-9]+/)) {

                    $("#npassword-alert").html("");
                    $("#password-strength").html("Strong Password");
                    $("#password-strength").addClass("text-success").removeClass("text-warning text-danger");
                    $("#npassword").css("border-color", "");

                } else if (password.match(/[a-z]+/) && password.match(/[\`\~\!\@\#\$\%\^\&\*\(\)\-\_\+\=\,\<\.\>\?\/\[\{\]\}\;\:\'\"]+/) && password.match(/[0-9]+/)) {

                    $("#npassword-alert").html("");
                    $("#password-strength").html("Strong Password");
                    $("#password-strength").addClass("text-success").removeClass("text-warning text-danger");
                    $("#npassword").css("border-color", "");

                } else if (password.match(/[a-z]+/) && password.match(/[A-Z]+/) && password.match(/[\`\~\!\@\#\$\%\^\&\*\(\)\-\_\+\=\,\<\.\>\?\/\[\{\]\}\;\:\'\"]+/)) {

                    $("#npassword-alert").html("");
                    $("#password-strength").html("Strong Password");
                    $("#password-strength").addClass("text-success").removeClass("text-warning text-danger");
                    $("#npassword").css("border-color", "");

                } else if (password.match(/[a-z]+/) || password.match(/[A-Z]+/) || password.match(/[0-9]+/)) {

                    $("#npassword-alert").html("");
                    $("#password-strength").html("Medium Password");
                    $("#password-strength").addClass("text-warning").removeClass("text-success text-danger");
                    $("#npassword").css("border-color", "");

                }
            }

        });


        // for take input fields value for insert in database
        $("#reset-button").on("click", function() {

            var cpassword = $("#cpassword").val();
            var npassword = $("#npassword").val();
            var cnpassword = $("#cnpassword").val();

            // check for empty
            if (cpassword != "" && npassword != "" && cnpassword != "") {

                if (cpassword != npassword) {
                    if (npassword === cnpassword) {

                        $.ajax({
                            url: "fun/user-login.php",
                            type: "POST",
                            data: {
                                rcpassword: cpassword,
                                rnpassword: npassword
                            },
                            success: function(data) {
                                if (data == 1) {
                                    $("#cpassword").css("border-color", "");
                                    $("#cpassword").val("");
                                    $("#cpassword-alert").html("");

                                    $("#npassword").css("border-color", "");
                                    $("#npassword").val("");
                                    $("#npassword-alert").html("");
                                    $("#password-strength").html("");

                                    $("#cnpassword").css("border-color", "");
                                    $("#cnpassword").val("");
                                    $("#cnpassword-alert").html("");

                                    successMsg("Password is Updated Successfully");
                                } else if (data == 2) {
                                    $("#cpassword").css("border-color", "red");
                                    $("#cpassword-alert").html("Your Current Password is not correct");

                                    $("#npassword").css("border-color", "");
                                    $("#npassword-alert").html("");
                                    $("#password-strength").html("");

                                    $("#cnpassword").css("border-color", "");
                                    $("#cnpassword-alert").html("");
                                }

                            }
                        })

                    } else {
                        $("#cpassword").css("border-color","");
                        $("#cpassword-alert").html("");

                        $("#npassword").css("border-color", "red");
                        $("#password-strength").html("");
                        $("#npassword-alert").html("Please Enter same password (New Password or Confirm New Password)");
                        $("#npassword").val("");

                        $("#cnpassword").css("border-color", "red");
                        $("#cnpassword-alert").html("Please Enter same password (New Password or Confirm New Password)");
                        $("#cnpassword").val("");
                    }
                } else {
                    $("#cpassword").css("border-color", "red");
                    $("#cpassword-alert").html("");

                    $("#npassword").css("border-color", "red");
                    $("#npassword-alert").html("");
                    $("#password-strength").html("");

                    $("#cnpassword").css("border-color", "");
                    $("#cnpassword-alert").html("");
                    errorMsg("Please Enter Current Password or New Password are different");
                }

            } else {
                // define in footer-links
                errorMsg("Please fill all fields.");
                // alert("Please Fill All the fields.");
            }

        });

    });
</script>