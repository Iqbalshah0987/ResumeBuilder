<link rel="stylesheet" href="./assets/vendor/quill/dist/quill.snow.css">
<?php
include "pin/header.php";
include "pin/navbarAll.php";
?>
<title>Company Profile | Jobaaj</title>
<?php
if(!isset($_SESSION['j_id'])){
  header('Location:index');
  die();
}
if($_SESSION['j_user']=='user'){
  header('Location:j-dashboard');
  die();
}
if(isset($_GET['delete_profile']))
{ 
  $run = mysqli_query($db,"update job_user set tagline = '' where id = '$_SESSION[j_id]'");
  $person=mysqli_fetch_array(mysqli_query($db,"select * from job_user where id=$_SESSION[j_id]"));
  $run = mysqli_query($db,"update job_companies_new set logo = '' where id = '$person[comp_id]'");
  if($run) { echo "<script>location.href='company-profile';</script>"; } 
}
$uid=$_SESSION['j_id'];

$person=mysqli_fetch_array(mysqli_query($db,"select * from job_user where id=$uid"));
$com_user=mysqli_fetch_array(mysqli_query($db,"select * from job_companies_new where id=$person[comp_id]"));
$page="company-profile";
?>

<!-- ========== MAIN CONTENT ========== -->
  <?php if(isset($_GET['sent'])){ ?>
    <div class="position-fixed toast hide alert alert-dismissible fade show mb-3" id="sentToast" style="top: 85px; right: 20px; z-index: 1000; color: #155724; background-color: #d4edda; border-color: #c3e6cb;">
    Your application is submitted successfuly to the owner.
    <button type="button" class="btn-close" id="sent_close" data-bs-dismiss="alert"></button>
  </div>
  <?php }if(isset($_GET['error'])){ ?>
    <div class="position-fixed toast hide alert alert-dismissible fade show mb-3" id="errordanger" style="top: 85px; right: 20px; z-index: 1000; color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;">
    Oops! some error occured. Please try again.
    <button type="button" class="btn-close" id="error_close" data-bs-dismiss="alert"></button>
  </div>
  <?php } ?>
  <div class="position-fixed toast hide alert alert-dismissible fade show mb-3" id="liveToast" style="top: 85px; right: 20px; z-index: 1000; color: #155724; background-color: #d4edda; border-color: #c3e6cb; display:none;">
    Your details are updated successfuly.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <div class="position-fixed toast hide alert alert-dismissible fade show mb-3" id="liveToastdanger" style="top: 85px; right: 20px; z-index: 1000; color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; display:none;">
    Oops! some error occured. Please try again.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <main id="content" role="main" class="bg-light mt-10">
    <!-- Breadcrumb -->
    <div class="navbar-dark bg-dark" style="background-image: url(./assets/svg/components/wave-pattern-light.svg);">
      <div class="container content-space-1 content-space-b-lg-3">
        <div class="row align-items-center">
          <div class="col">
            <div class="d-none d-lg-block">
              <h1 class="h2 text-white">Company Profile</h1>
            </div>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light mb-0">
                <li class="breadcrumb-item">You can update your profile here</li>
                <li class="breadcrumb-item " aria-current="page">Company Profile</li>
              </ol>
            </nav>
            <!-- End Breadcrumb -->
          </div>
          <!-- End Col -->

          <div class="col-auto">
            <div class="d-none d-lg-block">
              <!-- <a class="btn btn-soft-light btn-sm" href="#">Log out</a> -->
              <a class="btn btn-soft-light btn-sm" href="public-com-profile?comp_id=<?php echo $com_user['id']; ?>" target="_blank">Public View</a>

            </div>

            <!-- Responsive Toggle Button -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-default">
                <i class="bi-list"></i>
              </span>
              <span class="navbar-toggler-toggled">
                <i class="bi-x"></i>
              </span>
            </button>
            <!-- End Responsive Toggle Button -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Content -->
    <div class="container content-space-1 content-space-t-lg-0 content-space-b-lg-2 mt-lg-n10">
      <div class="row">
        <?php

        include "comp-sidebar.php";
        ?>
        <!-- End Col -->

        <div class="col-lg-9">
          <div class="d-grid gap-3 gap-lg-5">
            <!-- Card -->
            <div class="card">
              <div class="card-header border-bottom"style="padding:2rem 2rem 0.8rem;">
                <div class="d-flex align-item-center flex-grow-1">
                  <i class="bi bi-building me-3 fs-2" style="color:#377dff; margin-top:-4px;"></i><h4 class="card-header-title">Basic information</h4>
                  <span class="text-success msgProfile mt-2 fs-4" style="display:none">Company Logo Updated Successfully</span>
                </div>
              </div>

              <!-- Body -->
              <div class="card-body">
                <form id="comp_details" enctype="multipart/form-data">
                  <!-- Form -->
                  <div class="row mb-4">
                    <label class="col-sm-3 col-form-label form-label">Company Logo</label>

                    <div class="col-sm-9">
                      <!-- Media -->
                      <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                          <img id="avatarImg" class="avatar-img" src="<?php  echo ($com_user['logo']!='')? "content/logo/$com_user[logo]": 'assets/img/building.png'; ?>" alt="Company Profile">
                        </label>

                        <div class="d-grid d-sm-flex gap-2 ms-4">
                          <div class="form-attachment-btn btn btn-primary btn-sm">Upload photo
                            <input type="file" name="avatar" class="js-file-attach form-attachment-btn-label" id="avatarUploader">
                      			<input  value="<?php echo $com_user['logo'];?>" name="pro_exist" type="hidden">
                          </div>
                          <!-- End Avatar -->

                          <button type="button" <?php echo($com_user['logo']==''||$com_user['logo']=='NULL')?"style='display:none'":""; ?> id="delete_btn" onclick="location.href='?delete_profile=1'" class="js-file-attach-reset-img btn btn-white btn-sm">Delete</button>
                        </div>
                      </div>
                      <!-- End Media -->
                    </div>           
                    <!-- End Form -->
                  </div>           
                  <?php if($person['comp_admin']=='0'){ ?>
                    <div>
                      <h6 class="text-danger text-center">You don't have permission to view or edit the company details. Please <a style="color: #377dff;" type="button" data-bs-toggle="modal" data-bs-target="#getpermission" >click here</a> for getting the access. </h6>
                    </div>
                  <?php } ?>
                  <div style="display: <?php echo ($person['comp_admin']=='0')?"none":""; ?> ;">
                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="companytNameLabel" class="col-sm-3 col-form-label form-label">Company Name *</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                        <input type="text" class="form-control" name="companyNameLabel" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> value="<?php echo $com_user['name']; ?>" id="companyNameLabel" placeholder="Jobaaj" aria-label="Jobaaj" required>
                      </div>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email *</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="email" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> value="<?php echo $com_user['email']; ?>" id="emailLabel" placeholder="service@example.com" aria-label="service@example.com" required>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="js-add-field row mb-4"
                       data-hs-add-field-options='{
                          "template": "#addPhoneFieldTemplate",
                          "container": "#addPhoneFieldContainer",
                          "defaultCreated": 0
                        }'>
                    <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone *</label>

                    <div class="col-sm-9">
                      <div class="input-group">
                        <input type="text" class="js-input-mask form-control" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> name="phone" value="<?php echo $com_user['phone']; ?>" id="phoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" required>

                        <!-- Select -->
                        
                        <!-- End Select -->
                      </div>

                      <!-- Container For Input Field -->
                      
                    </div>
                  </div>
                  <!-- End Form -->


                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="employeesizeLabel" class="col-sm-3 col-form-label form-label">Employee Size *</label>
                    <div class="col-sm-9">
                      <!-- Select -->
                      <div class="tom-select-custom">
                          <select class="selectpicker" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> name="employeesizeSelect" id="employeesizeSelect" required>
                            <option disabled selected>select Job Type</option>
                            <?php
                              $emp_size=mysqli_query($db,"select * from job_emp_size");
                              while($row=mysqli_fetch_array($emp_size)){
                            ?>
                                <option <?php echo ($row['id']==$com_user['emp_size'])?"selected":""; ?> value="<?php echo $row['id']; ?>"><?php echo $row['options']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <!-- End Select -->
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="industryLabel" class="col-sm-3 col-form-label form-label">Industry *</label>
                    <div class="col-sm-9">
                      <!-- Select -->
                      <div class="tom-select-custom">
                          <select class="selectpicker" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> data-size="8" name="industrySelect" id="industrySelect" required>
                            <option disabled selected>Select Industry</option>
                            <?php
                              $industry=mysqli_query($db,"select * from industry_list");
                              while($row=mysqli_fetch_array($industry)){   
                            ?>
                            <option <?php echo ($row['id']==$com_user['cat'])?"selected":""; ?> value="<?php echo $row['id']; ?>"><?php echo $row['industry']; ?></option>

                            <?php } ?>

                            
                            
                          </select>
                        </div>
                        <!-- End Select -->
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="contactpersonName" class="col-sm-3 col-form-label form-label">Contact Person Name *</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                        <input type="text" class="form-control" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> name="contactpersonName" id="contactpersonName" value="<?php echo $com_user['contact']; ?>" placeholder="Deniel" aria-label="Deniel" required>
                      </div>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="websiteName" class="col-sm-3 col-form-label form-label">Website *</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                        <input type="text" class="form-control" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> name="websiteName" id="websiteName" value="<?php echo $com_user['website']; ?>" placeholder="www.example.com" aria-label="www.example.com" required>
                      </div>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label class="col-sm-3 col-form-label form-label">Company Description *</label>

                    <div class="col-sm-9">
                      <!-- Quill -->
                      <?php if($person['comp_admin']=='0'){ ?>
                        <textarea name="" id="" disabled cols="60" rows="10" style="width: 100%;padding:5px;"><?php echo $com_user['description']; ?></textarea>
                      <?php }else{ ?>
                        <div class="quill-custom">
                          <div class="js-quill" id="quill_editor" style="height: 15rem;"
                               data-hs-quill-options='{
                               "placeholder": "Type your message...",
                                "modules": {
                                  "toolbar": [
                                    ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                                  ]
                                }
                               }'>
                               <?php
                                if($com_user['description']==''){
  
                               ?>
                               Creative mind at Htmlstream 
                               <?php 
                                }else{
                                  echo $com_user['description']; 
                                }
                               ?>
                          </div>
                        </div>
                      <?php } ?>
                      <!-- End Quill -->
                    </div>
                              
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="addressLabel" class="col-sm-3 col-form-label form-label">Address *</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> name="address"  id="addressLabel" placeholder="Your address" aria-label="Your address" cols="30" rows="5" required><?php echo $com_user['address']; ?></textarea>
                    </div>
                  </div>
                  <!-- End Form -->

                </form>
              </div>
              <!-- End Body -->
              <?php if($person['comp_admin']=='1'){ ?>
                <!-- Footer -->
                <div class="card-footer pt-0">
                  <div class="d-flex justify-content-end gap-3">
                    <a class="btn btn-white" href="javascript:;">Cancel</a>
                    <a type="button" class="btn btn-primary" href="javascript:;" id="save_changes" form="comp_details" >Save changes</a>
                  </div>
                </div>
                <!-- End Footer -->
              <?php } ?>
            </div>
              </div>
            <!-- End Card -->
            
            <div style="display: <?php echo ($person['comp_admin']=='0')?"none":""; ?> ;">
            <!-- Card -->
            <div class="card">
              <div class="card-header border-bottom" style="padding-top: 1.5rem; padding-bottom: 1rem;">
                <div class="d-flex align-items-center flex-grow-1">
                  <i class="bi bi-mortarboard me-3 fs-2" style="color: #377dff;"></i><h3 class="card-header-title">Social Links</h3>
                </div>
                <!-- <p class="card-text ps-4 ms-3">Please List Your Most Recent Education First</p> -->
              </div>

              <!-- Body -->
              <div class="card-body">
                <?php
                  if(isset($_POST['addSocial'])) {
                    $updateSocial=mysqli_query($db,"update job_user set linkedin='$_POST[linkedlink]', github='$_POST[gitlink]', facebook='$_POST[fblink]', instagram='$_POST[instalink]' where id='$uid' ");
                    if($updateSocial){
                ?>
                  <div class="alert alert-success alert-dismissible fade show">
                    <strong>Success!</strong> Social Links has been updated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>
                <?php }else{ ?>
                  <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Success!</strong> Social Links has not been updated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>
                <?php } } ?>

                <form method="POST">
                  <?php
                    $social=mysqli_fetch_array(mysqli_query($db,"select * from job_companies_new where id='$person[comp_id]'"));
                  ?>
                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="facebook" class="col-sm-3 col-form-label form-label">Facebook</label>
                    <div class="col-sm-9">
                      <input type="url" class="form-control" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> name="fblink" id="facebook" value="<?php echo $social['facebook']; ?>" placeholder="https://www.facebook.com" aria-label="https://www.facebook.com">
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="instagram" class="col-sm-3 col-form-label form-label">Instagram</label>
                    <div class="col-sm-9">
                      <input type="url" class="form-control" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> name="instalink" id="instagram" value="<?php echo $social['instagram']; ?>" placeholder="https://www.instagram.com" aria-label="https://www.instagram.com">
                    </div>
                  </div>
                  <!-- End Form -->
                  
                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="linkedin" class="col-sm-3 col-form-label form-label">LinkedIn</label>
                    <div class="col-sm-9">
                      <input type="url" class="form-control" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> name="linkedlink" id="linkedin" value="<?php echo $social['linkedin']; ?>" placeholder="https://linkedin.com" aria-label="https://linkedin.com">
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="github" class="col-sm-3 col-form-label form-label">Twitter</label>
                    <div class="col-sm-9">
                      <input type="url" class="form-control" <?php echo ($person['comp_admin']=='0')?"disabled":""; ?> name="gitlink" id="github" value="<?php echo $social['github']; ?>" placeholder="https://www.twitter.com" aria-label="https://www.twitter.com">
                    </div>
                  </div>
                  <!-- End Form -->
                  
                  <?php if($person['comp_admin']=='1'){ ?> 
                    <!-- Footer -->
                      <div class="d-flex justify-content-end gap-3">
                        <a class="btn btn-white" href="javascript:;">Cancel</a>
                        <button type="submit" name="addSocial" class="btn btn-primary">Update</button>
                        <!-- <button type="submit"  class="button ripple-effect" style="margin-left:30rem;">Save</button> -->
                      </div>
                    <!-- End Footer -->
                  <?php } ?>
                </form>
              </div>
              <!-- End Body -->

            </div>
            <!-- End Card -->

          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->
  </main> 

  <!-- Apply now Popup -->
<div class="modal fade" id="getpermission" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-close">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- End Header -->

      <!-- Body -->
      <div class="modal-body">
        <h2 class="text-center text-secondary">Application Form</h2>
          <form action="fun/dash-functions" method="post">
            <!-- Form -->
            <div class="mb-3" id="curr_salary" data-hs-validation-validate-class>
              <label class="form-label" for="fullname">Full Name</label>
              <input type="text" class="form-control form-control-lg" name="fullname" id="fullname" placeholder="Full Name">
              <!-- <span class="invalid-feedback">Password does not match the confirm password.</span> -->
            </div>
            <!-- End Form -->
            <!-- Form -->
            <div class="mb-3" data-hs-validation-validate-class>
              <label class="form-label" for="email">Email</label>
              <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Email Id" required>
              <!-- <span class="invalid-feedback">Password does not match the confirm password.</span> -->
            </div>
            <!-- End Form --> 
            <!-- Form -->
            <div class="mb-3" data-hs-validation-validate-class>
              <label class="form-label" for="message">Message for recruiter</label>
              <textarea class="js-count-characters form-control" name="message" id="message" placeholder="Message" rows="4"></textarea>
            </div>
            <input type="hidden" name="comp_id" id="comp_id" value="<?php echo $person['comp_id']; ?>">
            <!-- End Form -->
            <input type="submit" class="btn btn-primary" style="width: 100%; margin-right:5px;" name="send-req" value="Send Request"/>
          </form>
      </div>
      <!-- End Body -->

      <!-- Footer -->
      <!-- <div class="modal-footer d-block text-center py-sm-5">
        <small class="text-cap mb-4">Trusted by the world's best teams</small>

        <div class="w-85 mx-auto">
          <div class="row justify-content-between">
            <div class="col">
              <img class="img-fluid" src="../assets/svg/brands/gitlab-gray.svg" alt="Logo">
            </div> -->
            <!-- End Col -->

            <!-- <div class="col">
              <img class="img-fluid" src="../assets/svg/brands/fitbit-gray.svg" alt="Logo">
            </div> -->
            <!-- End Col -->

            <!-- <div class="col">
              <img class="img-fluid" src="../assets/svg/brands/flow-xo-gray.svg" alt="Logo">
            </div> -->
            <!-- End Col -->

            <!-- <div class="col">
              <img class="img-fluid" src="../assets/svg/brands/layar-gray.svg" alt="Logo">
            </div> -->
            <!-- End Col -->
          <!-- </div> -->
        <!-- </div> -->
        <!-- End Row -->
      <!-- </div> -->
      <!-- End Footer -->
    </div>
  </div>
</div>
<!-- End Modal -->

<script>

  var quill = new Quill('#quill_editor');
  quill.enable(false);
  $(document).ready(function(){
    $('#company_nav').addClass('active');
  })

</script>
  <script>
    $("#avatarUploader").change(function(){
      var fileInput = document.getElementById('avatarUploader');
      var filePath = fileInput.value;
        // Allowing file type
      var allowedExtensions =/(\.jpg|\.jpeg|\.png|\.gif)$/i;
          
      if (!allowedExtensions.exec(filePath)) {
          showMsg('Invalid file type');
          // alert('Invalid file type');
          fileInput.value = '';
          return false;
      }

      // let myform = document.getElementById("profileImg");
      // let fd = new FormData(myform);
      var file_data = $("#avatarUploader").prop("files")[0]; // Getting the properties of file from file field
      var form_data = new FormData(); // Creating object of FormData class
      form_data.append("avatar", file_data)
      $.ajax({
        url: "fun/dash-functions",
        data: form_data,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (response) {
          // alert(response);
          $("#avatarImg").removeAttr("src").attr('src','assets/loading.png');
          
          // $("#sidebar_profile").removeAttr("src").attr('src','assets/loading.png');
          // $("#mobile_profile").removeAttr("src").attr('src','assets/loading.png');
          // $("#full_profile").removeAttr("src").attr('src','assets/loading.png');
          $("#avatarUploader").val('');
          setTimeout(() => {
            $("#avatarImg").removeAttr("src").attr('src',response);
            $("#sidebar_profile").removeAttr("src").attr('src',response);
            $("#mobile_profile").removeAttr("src").attr('src',response);
            $("#full_profile").removeAttr("src").attr('src',response);
            $('.msgProfile').show();
            setTimeout(() => {
              $('.msgProfile').hide();
            }, 3000);
            // alert('Profile Images Updated Successfully');

            // $("#avatarImg").attr('src',response);
            // $("#sidebar_profile").attr('src',response);
            // $("#mobile_profile").attr('src',response);
            // $("#full_profile").attr('src',response);
          }, 2000);
          
          $('#delete_btn').show();
        }
      });
    });



    $('#profileForm').on('submit', function(e){
      e.preventDefault();
      $.ajax({
        url: "fun/dash-functions",
        data: $('#profileForm').serialize(),
        type: 'POST',
        success: function (response) {
          alert(response);
        }
      });
    })
  </script>
  <script>
    // $(function() {
    //   setTimeout(function() {
    //     $("#liveToast").fadeOut(1500);
    //     $("#liveToastdanger").fadeOut(1500);
    //   }, 5000);
    // });
    $("#save_changes").on("click", function(){
      var comp_name = $("#companyNameLabel").val();
      var email = $("#emailLabel").val();
      var phone = $("#phoneLabel").val();
      var emp_size = $("#employeesizeSelect").val();
      var industry = $("#industrySelect").val();
      var person_name = $("#contactpersonName").val();
      var website = $("#websiteName").val();
      var address = $("#addressLabel").val();

      // console.log(form_data);

      // alert(comp_name+" "+email+" "+phone+" "+emp_size+" "+industry+" "+person_name+" "+website+" "+address);

      $.ajax({
        url: 'fun/dash-functions',
        type: "POST",
        data: {comp_name:comp_name,email:email,phone:phone,emp_size:emp_size,industry:industry,person_name:person_name,website:website,address:address},
        success: function(res){
          // alert(res);
          if(res==1){
            $("#liveToast").show();
            $("#liveToast").delay(2000).fadeOut(1500);
          }else{
            $("#liveToastdanger").show();
            $("#liveToastdanger").delay(2000).fadeOut(1500);
          }
        }
      });
    });
  </script>

  <!-- <script src="./assets/vendor/quill/dist/quill.min.js"></script> -->
  
  <!-- JS Plugins Init. -->


<?php
include "pin/footer.php";
include "pin/footer-link.php";
?>

<script>
    (function() {

      // INITIALIZATION OF QUILLJS EDITOR
      // =======================================================
      HSCore.components.HSQuill.init('.js-quill')

      
      // INITIALIZATION OF SELECT
      // =======================================================
      HSCore.components.HSTomSelect.init('.js-select', {
        render: {
          'option': function(data, escape) {
            return data.optionTemplate || `<div>${data.text}</div>>`
          },
          'item': function(data, escape) {
            return data.optionTemplate || `<div>${data.text}</div>>`
          }
        }
      })
    })()
  </script>