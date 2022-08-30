<?php
$page = "contact";
require "pin/header-links.php";
require "pin/header.php";
?>


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
            <h1 class="mb-5">Contact For Any Query</h1>
        </div>
        <div class="row gy-5 gx-4 mb-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card shadow border-0 py-4">
                    <div class="card-body py-4 px-sm-5 px-4">
                        <div class="mb-5">
                            <h5 class="text-center mb-3">Get In Touch</h5>
                            <p class="text-center mb-4">You can solve your problem by talking to our team.</p>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">Office</h5>
                                <p class="mb-0">Agra, Uttar Pradesh, India</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">Mobile</h5>
                                <p class="mb-0">+91 639 859 5433</p>
                                <p class="mb-0">+91 879 195 2222</p>
                                <p class="mb-0">+91 766 841 5334</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">Email</h5>
                                <p class="mb-0">contact@apnadesign.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <!-- card -->
                <div class="card shadow border-0 py-4">
                    <h3 class="text-center mt-3 mb-0">Contact Us</h3>
                    <!-- card-body -->
                    <div class="card-body py-4 px-sm-5 px-4">
                        <form action="" role="form" id="contact-form" method="post" autocomplete="off">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" require>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" require>
                                        <label for="email">Your Email</label>
                                        <span class="text-danger" id="email-alert"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" require>
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" require style="height: 100px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary" id="send-message-button">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 wow fadeInUp" data-wow-delay="0.5s">
                <!-- card -->
                <div class="card shadow border-0">
                    <!-- card-body -->
                    <div class="card-body">
                        <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14193.137293899428!2d78.0309535!3d27.21022175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1653810311598!5m2!1sen!2sin" frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->



<?php
require "pin/footer.php";
require "pin/footer-links.php";
?>

<script>
    $(document).ready(function() {

        // for check email valid or not
        $("#email").focusout(function() {

            var email = $("#email").val();

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

        });

        // for take input fields value for insert in database
        $("#send-message-button").on("click", function() {
            var name = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var message = $("#message").val();

            //   alert(name+" "+email+" "+subject+" "+message);

            // check for empty
            if (name != "" && email != "" && subject != "" && message != "") {
                successMsg("All fields are filled.");


            } else {
                // define in footer-links
                errorMsg("Please fill all fields for send Message.");
                // alert("Please Fill All the fields.");
            }

        });

    });
</script>