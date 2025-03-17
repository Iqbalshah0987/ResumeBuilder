<?php
$page="";
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
                <h3 class="text-center mt-4 mb-3">Forgot Password !</h3>
                <!-- card-body start -->
                <div class="card-body py-4 px-sm-5 px-4">
                    <!-- form start -->
                    <form action="" role="form" id="forgot-password-form" method="post" autocomplete="off">
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
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" id="forgot-button" class="btn btn-lg btn-primary">Forgot</button>
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

      // for check email valid or not
      $("#email").focusout(function(){

         var email=$("#email").val();

         if(email!=""){
            var regex_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(regex_email.test(email)){

               $("#email").css("border-color", "");
               $("#email-alert").html("");
            }else{

               $("#email").focus().css("border-color", "red");
               $("#email-alert").html("Please Fill the valid E-mail");
            }
         }else{
            $("#email").css("border-color", "");
            $("#email-alert").html("");
         }

      });


      // for take input fields value for insert in database
      $("#forgot-button").on("click", function() {

         var email = $("#email").val();

         // check for empty
         if (email != "") {
            successMsg("All fields are filled.");
            

         } else {
            // define in footer-links
            errorMsg("Please fill the email address.");
            // alert("Please Fill All the fields.");
         }

      });

   });
</script>


