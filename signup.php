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
            <h3 class="text-center mt-4 mb-0">Create New Account !</h3>
            <!-- card-body start -->
            <div class="card-body py-4 px-sm-5 px-4">
               <!-- form start -->
               <form action="" role="form" id="signup-form" method="post" autocomplete="off">

                  <div class="d-flex justify-content-end align-items-center mb-3">
                     <a data-bs-toggle="modal" href="#loginSignupModalToggle" role="button" class="text-primary">Login with Your Account !</a>
                  </div>

                  <!-- form Full Name field -->
                  <div class="row mb-4">
                     <div class="col-sm-3">
                        <label for="name" class="form-label">Full Name *</label>
                     </div>
                     <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" id="name" autocomplete="off" placeholder="Full Name" aria-label="Full Name"   title="Please fill out this field." required>
                        <span class="text-danger" id="name-alert"></span>
                     </div>
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

                  <!-- form email field -->
                  <div class="row mb-4">
                     <div class="col-sm-3">
                        <label for="mobile" class="form-label">Mobile *</label>
                     </div>
                     <div class="col-sm-9">
                        <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="XXXX-XXX-XXX" aria-label="XXXX-XXX-XXX" autocomplete="off"   title="Please fill out this field." required>
                        <span class="text-danger" id="mobile-alert"></span>
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
                        <span class="text-danger" id="password-alert"></span>
                        <span id="password-strength"></span>
                     </div>
                  </div>

                  <!-- form password field -->
                  <div class="row mb-4">
                     <div class="col-sm-3">
                        <label for="cpassword" class="form-label">Confirm Password *</label>
                     </div>
                     <div class="col-sm-9">
                        <div id="cpassword-div">
                           <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="8+ Character Required" aria-label="8+ Character Required" autocomplete="off"   title="Please fill out this field." required>
                           <span id="addon-cpassword"><i class="bi bi-eye-slash fs-6"   title="Show Password" id="eye-button2"></i></span>
                        </div>
                        <span class="text-danger" id="cpassword-alert"></span>
                     </div>
                  </div>

                  <div class="d-flex justify-content-end">
                     <button type="button" id="signup-button" class="btn btn-lg btn-primary">Sign UP</button>
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


<script>
   $(document).ready(function() {

      // for check password strength
      $("#password").keyup(function() {

         var password = $("#password").val();

         if (password != "") {
            if (password.length < 8) {

               $("#password-alert").html("");
               $("#password-strength").html("Weak Password");
               $("#password-strength").addClass("text-danger").removeClass("text-warning").removeClass("text-success");
               $("#password").css("border-color", "");

            } else if (password.match(/[a-z]+/) && password.match(/[A-Z]+/) && password.match(/[0-9]+/) && password.match(/[\`\~\!\@\#\$\%\^\&\*\(\)\-\_\+\=\,\<\.\>\?\/\[\{\]\}\;\:\'\"]+/)) {

               $("#password-alert").html("");
               $("#password-strength").html("Very Strong Password");
               $("#password-strength").addClass("text-success").removeClass("text-warning").removeClass("text-danger");
               $("#password").css("border-color", "");

            } else if (password.match(/[a-z]+/) && password.match(/[A-Z]+/) && password.match(/[0-9]+/)) {

               $("#password-alert").html("");
               $("#password-strength").html("Strong Password");
               $("#password-strength").addClass("text-success").removeClass("text-warning").removeClass("text-danger");
               $("#password").css("border-color", "");

            } else if (password.match(/[\`\~\!\@\#\$\%\^\&\*\(\)\-\_\+\=\,\<\.\>\?\/\[\{\]\}\;\:\'\"]+/) && password.match(/[A-Z]+/) && password.match(/[0-9]+/)) {

               $("#password-alert").html("");
               $("#password-strength").html("Strong Password");
               $("#password-strength").addClass("text-success").removeClass("text-warning").removeClass("text-danger");
               $("#password").css("border-color", "");

            } else if (password.match(/[a-z]+/) && password.match(/[\`\~\!\@\#\$\%\^\&\*\(\)\-\_\+\=\,\<\.\>\?\/\[\{\]\}\;\:\'\"]+/) && password.match(/[0-9]+/)) {

               $("#password-alert").html("");
               $("#password-strength").html("Strong Password");
               $("#password-strength").addClass("text-success").removeClass("text-warning").removeClass("text-danger");
               $("#password").css("border-color", "");

            } else if (password.match(/[a-z]+/) && password.match(/[A-Z]+/) && password.match(/[\`\~\!\@\#\$\%\^\&\*\(\)\-\_\+\=\,\<\.\>\?\/\[\{\]\}\;\:\'\"]+/)) {

               $("#password-alert").html("");
               $("#password-strength").html("Strong Password");
               $("#password-strength").addClass("text-success").removeClass("text-warning").removeClass("text-danger");
               $("#password").css("border-color", "");

            } else if (password.match(/[a-z]+/) || password.match(/[A-Z]+/) || password.match(/[0-9]+/)) {

               $("#password-alert").html("");
               $("#password-strength").html("Medium Password");
               $("#password-strength").addClass("text-warning").removeClass("text-success").removeClass("text-danger");
               $("#password").css("border-color", "");

            }
         }else{
            $("#password-strength").html("");
            $("#password").css("border-color", "");
            $("#password-alert").html("");
            $("#cpassword").css("border-color", "");
            $("#cpassword-alert").html("");
         }

      });

      // for take input fields value for insert in database
      $("#signup-button").on("click", function() {

         var name = $("#name").val();
         var email = $("#email").val();
         var mobile = $("#mobile").val();
         var password = $("#password").val();
         var cpassword = $("#cpassword").val();


         // check for empty
         if (name != "" && email != "" && mobile != "" && password != "" && cpassword != "") {

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

            // for check mobile number valid or not
            if (mobile != "") {
               var regex_mob = /^[0-9]+$/;
               var mob_len = mobile.length;

               if (regex_mob.test(mobile) && mob_len == 10) {
                  $("#mobile").css("border-color", "");
                  $("#mobile-alert").html("");
               } else {
                  $("#mobile").focus().css("border-color", "red");
                  $("#mobile-alert").html("Please Fill the valid Mobile Number");
               }
            } else {
               $("#mobile").css("border-color", "");
               $("#mobile-alert").html("");
            }

            // for confirm password
            if (password!="" && cpassword!="") {
               if (password === cpassword) {

                  $("#password").css("border-color", "");
                  $("#password-alert").html("");
                  $("#cpassword").css("border-color", "");
                  $("#cpassword-alert").html("");
               } else {

                  $("#password").css("border-color", "red");
                  $("#password-strength").html("");
                  $("#password-alert").html("Please Enter same password (Password or Confirm Password)");
                  $("#password").val("");
                  $("#cpassword").css("border-color", "red");
                  $("#cpassword-alert").html("Please Enter same password (Password or Confirm Password)");
                  $("#cpassword").val("");
               }
            } else {
               $("#password").css("border-color", "");
               $("#password-alert").html("");
               $("#cpassword").css("border-color", "");
               $("#cpassword-alert").html("");
            }

            $.ajax({
               url: "fun/user-login.php",
               type: "POST",
               data: {
                  sname: name,
                  semail: email,
                  smobile: mobile,
                  spassword: password
               },
               success: function(data) {
                  if(data==1){
                     $("#name").val("");
                     $("#email").val("");
                     $("#mobile").val("");
                     $("#password").val("");
                     $("#cpassword").val("");

                     $("#password-strength").html("");

                     $("#email").css("border-color", "");
                     $("#email-alert").html("");

                     $("#mobile").css("border-color", "");
                     $("#mobile-alert").html("");

                     $("#password").css("border-color", "");
                     $("#password-alert").html("");
                     $("#cpassword").css("border-color", "");
                     $("#cpassword-alert").html("");

                     errorMsg("This E-mail Already Registered.");
                  }else if(data==2){
                     location.href="login.php";
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