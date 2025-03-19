<?php
$page = "template";
require "../pin/header-links.php";
require "../pin/header.php";

$res_id = $_GET['res-id'];

if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
}

// for find resumes name
$resumes = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `resumes` WHERE `id`='$res_id'"));

// for find resume block positions //for resume layout pages
$default_block_positions = explode(',', $resumes['def_block_positions']);
$default_hide_block_positions = explode(',', $resumes['def_hide_block_positions']??'');

$data_pos = explode(',', $resumes['def_block_positions']);
$hide_block = explode(',', $resumes['def_hide_block_positions']??'');

// fetch resume data in variables 
include "supported-files/resume-fetch.php";

// get all variables in session
include "supported-files/variable-fetch.php";
?>

<!-- add css -->
<link rel="stylesheet" href="supported-files/add-style.css">


<div id="main-create-resume">
    <!-- tool buttons -->
    <div class="position-sticky top-0" id="tool-button-three" style="background:#f4f4f4; z-index:1;">
        <div class="container">
            <div class="row gx-4">
                <div class="col-9">
                    <div class="card m-0 p-0 border-0" style="box-shadow: 0px 1px 2px 0px #ccc;">
                        <div class="card-body m-0 p-0">
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <button class="layout-edit" id="edit-layout">
                                    <div class="text-center">
                                        <p class="mb-1 fs-6">Edit Layout</p>
                                        <i class="fa-solid fa-bars fs-5"></i>
                                    </div>
                                </button>
                                <button class="templates-show" id="show-templates">
                                    <div class="text-center">
                                        <p class="mb-1 fs-6">Templates</p>
                                        <i class="fa-solid fa-file-lines fs-5"></i>
                                    </div>
                                </button>
                                <button class="CV-save" id="saveResume">
                                    <div class="text-center">
                                        <p class="mb-1 fs-6">Save CV</p>
                                        <i class="fa-solid fa-floppy-disk fs-5"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

    <!-- cv-container -->
    <div style="background:#f4f4f4;" id="cv-container">
        <div class="container">
            <div class="row pb-5 gx-4">
                <div class="col-9 pb-5">
                    <div class="card shadow border-0">
                        <div class="card-body p-5">
                            <?php include "include-resume/$resumes[res_name]"; ?>

                        </div>
                    </div>
                </div>

                <div class="col-3 pb-5 justify-content-center" style="z-index:2;">
                    <div style="position:sticky; top:2rem;">
                        <div class="mb-3 d-none" id="empty-fields">
                            <div class="empty-field-content">
                                <p>Check the followig error</p>
                                <p class="mb-0" id="add-error"></p>
                                <p class="mb-0">And Save it again !</p>
                            </div>
                        </div>
                        <div class="my-3" id="add-suggestion">
                            <h4 class="text-start">Suggestion</h4>
                            <ul style="list-style-type:decimal; font-size:0.875rem;">
                                <li>Fill all the information in the Resume</li>
                                <li>Click on Save Resume Button</li>
                                <li>View and download Resume</li>
                            </ul>

                        </div>
                        <!-- <div class="shadow" style="width:fit-content;">
                            <button type="button" class="btn btn-solid" id="saveResume">Save Resume</button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- layout editor -->
    <div class="container py-5 mb-5 d-none" id="layout-editor-container">
        <div class="row g-4">
            <div class="col-5 mx-auto">

                <div class="pb-3">
                    <p class="mb-0" style="font-size:14px;">Check/Uncheck items to Show/Hide entries.</p>
                    <p class="mb-0" style="font-size:14px;">Drag items to order entries.</p>
                </div>

                <div class="d-flex align-items-center justify-content-center gap-4 py-3">
                    <div class="d-flex align-items-center" id="default-layout">
                        <i class="fa-solid fa-bars"></i>&nbsp;<span>Default layout</span>
                    </div>
                    <div class="d-flex align-items-center" id="check-all-layout">
                        <i class="fa-solid fa-circle-check"></i>&nbsp;<span>check all</span>
                    </div>
                </div>

                <?php include "include-resume/$resumes[res_layout]"; ?>

                <div class="text-center py-3">
                    <button class="btn btn-solid2" id="updata-layout">Done</button>
                    <button class="btn btn-cancel" id="layout-container-cancel">Cancel</button>
                </div>

            </div>
        </div>
    </div>

    <!-- templates -->
    <div class="container pt-4 pb-5 mb-5 d-none" id="template-container">
        <div class="w-100 text-end mb-0 pb-0">
            <button id="template-container-cancel" class="btn-cancel">Cancel</button>
        </div>
        <div class="row g-5 my-0">
            <?php
            $all_resumes = mysqli_query($db, "SELECT * FROM `resumes` ORDER BY `id` ASC");
            if (mysqli_num_rows($all_resumes) > 0) {
                while ($all_res = mysqli_fetch_assoc($all_resumes)) {
            ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card shadow border-0 resume-back">
                            <a href="javascript:;" class="resume-img"><img src="../img/temp-img/<?php echo $all_res['res_img']; ?>" class="img-fluid" alt=""></a>
                            <div class="button-overlay d-flex justify-content-center align-items-center">
                                <button class="btn btn-solid" onclick="change_Template('create-resume.php?res-id=<?php echo $all_res['id']; ?>');">Create Now</button>
                            </div>
                        </div>
                    </div>

            <?php }
            } ?>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="starsModal" tabindex="-1" aria-labelledby="starsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:#1fbc89; border-radius:7px;">
      <!-- <div class="modal-header border-0">
        <h5 class="modal-title" id="starsModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body">
        <div class="d-flex justify-content-evenly" id="stars-popup">
            <img src="../img/social-img/star-fill.svg" alt="" width="35px" data-star="1" data-bs-dismiss="modal" class="stars">
            <img src="../img/social-img/star-fill.svg" alt="" width="35px" data-star="2" data-bs-dismiss="modal" class="stars">
            <img src="../img/social-img/star-fill.svg" alt="" width="35px" data-star="3" data-bs-dismiss="modal" class="stars">
            <img src="../img/social-img/star.svg" alt="" width="35px" data-star="4" data-bs-dismiss="modal" class="stars">
            <img src="../img/social-img/star.svg" alt="" width="35px" data-star="5" data-bs-dismiss="modal" class="stars">
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<input type="hidden" name="resume_id" id="resume_id" value="<?php echo $res_id; ?>">
<input type="hidden" name="file_uploaded" id="file_uploaded" value="<?php echo $image; ?>">

<input type="hidden" name="default-block-positions" id="default-block-positions" value="<?php echo implode(',', $default_block_positions); ?>">
<input type="hidden" name="default-hide-block-positions" id="default-hide-block-positions" value="<?php echo implode(',', $default_hide_block_positions); ?>">

<input type="hidden" name="blocks_order" id="blocks_order" value="<?php echo implode(',', $data_pos); ?>">
<input type="hidden" name="hide-blocks" id="hide-blocks" value="<?php echo implode(',', $hide_block); ?>">

<!-- <input type="hidden" name="stars-apply-numbers" id="stars-apply-numbers" value=""> -->


<?php
require "../pin/footer.php";
require "../pin/footer-links.php";
?>

<!-- for add suggestion of every block -->
<script src="supported-files/suggestions.js"></script>

<!-- for inner and outer blocks tools  -->
<script src="supported-files/inner-outer-block.js"></script>

<!-- edit layout show template -->
<script src="supported-files/edit-layout-show-template.js"></script>

<!-- create resume functions -->
<script src="supported-files/create-res-functions.js"></script>


<script>
    // for remove header sticky
    $("#navbar-position-sticky").removeClass("sticky-top");
    
    // // for leave or reload page
    // $(document).on("keypress click",function(){

    //     $(window).on("beforeunload",function(){
            
    //         clear_Data_Cookie();

    //         return "Good Bye?";
    //     });
    // });


    // for stars modal
    $(document).on("click",".apply-star",function(){

        $(this).attr("id","apply-stars");

        // add count stars
        var star_count='';
        if($("#apply-stars").children().first().hasClass("progress-tag")){
            star_count = $("#apply-stars progress").val()/20;
        }else{
            star_count = $("#apply-stars .dot-value").val();
        }

        var star_popup_content='';
        for (let i=1; i<=5; i++) {
            if(i<=star_count){
                star_popup_content+='<img src="../img/social-img/star-fill.svg" alt="" width="35px" data-star="'+i+'" data-bs-dismiss="modal" class="stars">';
            }else{
                star_popup_content+='<img src="../img/social-img/star.svg" alt="" width="35px" data-star="'+i+'" data-bs-dismiss="modal" class="stars">';
            }
            
        }
        $("#stars-popup").html(star_popup_content);

    })
    $(document).on("click","#starsModal",function(){

        $(".apply-star").removeAttr("id");
    })

    $(document).on("click",".stars",function(){
        var star=$(this).attr("data-star");

        // for add stars count on click
        var star_popup_content='';
        for (let i=1; i<=5; i++) {
            if(i<=star){
                star_popup_content+='<img src="../img/social-img/star-fill.svg" alt="" width="35px" data-star="'+i+'" data-bs-dismiss="modal" class="stars">';
            }else{
                star_popup_content+='<img src="../img/social-img/star.svg" alt="" width="35px" data-star="'+i+'" data-bs-dismiss="modal" class="stars">';
            }
            
        }
        $("#stars-popup").html(star_popup_content);
        

        // add star value in progress
        if($("#apply-stars").children().first().hasClass("progress-tag")){
            $("#apply-stars progress").val(star*20);
        }else{
            var adddotdiv='';
            for (let i=1; i<=5; i++) {
                if(i<=star){
                    adddotdiv+='<div class="dot-color"></div>';
                }else{
                    adddotdiv+='<div class="dot-blank"></div>';
                }
            }
            adddotdiv+='<input type="hidden" name="dot_value" class="dot-value" value="'+star+'">';
            $("#apply-stars").html(adddotdiv);
        }
        
        $(".apply-star").removeAttr("id");

    });


    $("#saveResume").click(function() {

        var res_id = $("#resume_id").val();
        var block_positions = $("#blocks_order").val();
        var hide_block_positions = $("#hide-blocks").val();

        var image = $("#file_uploaded").val();

        // personal details
        var name = $(".name").text();
        var curr_position = $(".curr-position").text();
        var career_objective = $(".career-objective").text();
        // social details
        var gender=$(".gender").text();
        var website=$(".website").text();
        var email = $(".email").text();
        var mobile = $(".mobile").text();
        var address = $(".address").text();
        var linkedin = $(".linkedin").text();
        var github = $(".github").text();

        // skills
        var skill_title = $(".skill-title").text();
        var skill = "";
        $(".skill").each(function() {
            skill += $(this).text();
            skill += "),(";
        });
        
        var progress_tag = "";
        $(".progress-tag").each(function() {
            progress_tag += $(this).val();
            progress_tag += "),(";
        });

        var dot_value = "";
        $(".dot-value").each(function() {
            dot_value += $(this).val();
            dot_value += "),(";
        });

        // work experience details
        var work_exp_title = $(".work-exp-title").text();
        var work_exp_pos = "";
        $(".work-exp-pos").each(function() {
            work_exp_pos += $(this).text();
            work_exp_pos += "),(";
        });
        var work_exp_comp = ""
        $(".work-exp-comp").each(function() {
            work_exp_comp += $(this).text();
            work_exp_comp += "),(";
        });
        var work_exp_date = "";
        $(".work-exp-date").each(function() {
            work_exp_date += $(this).text();
            work_exp_date += "),(";
        });
        var work_exp_address = "";
        $(".work-exp-address").each(function() {
            work_exp_address += $(this).text();
            work_exp_address += "),(";
        });
        var work_exp_desc = "";
        $(".work-exp-desc").each(function() {
            work_exp_desc += $(this).text();
            work_exp_desc += "),(";
        });

        // education details
        var education_title = $(".education-title").text();
        var colg_crs_name = "";
        $(".colg-crs-name").each(function() {
            colg_crs_name += $(this).text();
            colg_crs_name += "),(";
        });
        var colg_name = "";
        $(".colg-name").each(function() {
            colg_name += $(this).text();
            colg_name += "),(";
        });
        var colg_crs_date = "";
        $(".colg-crs-date").each(function() {
            colg_crs_date += $(this).text();
            colg_crs_date += "),(";
        });
        var colg_crs_address = "";
        $(".colg-crs-address").each(function() {
            colg_crs_address += $(this).text();
            colg_crs_address += "),(";
        });
        var colg_crs_subject = "";
        $(".colg-crs-subject").each(function() {
            colg_crs_subject += $(this).text();
            colg_crs_subject += "),(";
        });

        // language
        var language_title = $(".language-title").text();
        var language = "";
        $(".language").each(function() {
            language += $(this).text();
            language += "),(";
        });

        // certificate details
        var certificate_title = $(".certificate-title").text();
        var cert_name = "";
        $(".cert-name").each(function() {
            cert_name += $(this).text();
            cert_name += "),(";
        });
        var cert_date = "";
        $(".cert-date").each(function() {
            cert_date += $(this).text();
            cert_date += "),(";
        });

        // interest
        var interest_title = $(".interest-title").text();
        var interest = "";
        $(".interest").each(function() {
            interest += $(this).text();
            interest += "),(";
        });

        // honour and award
        var award_title = $(".award-title").text();
        var award_name = "";
        $(".award-name").each(function() {
            award_name += $(this).text();
            award_name += "),(";
        });
        var award_date = "";
        $(".award-date").each(function() {
            award_date += $(this).text();
            award_date += "),(";
        });

        // activities
        var activity_title = $(".activity-title").text();
        var activity_org_name = "";
        $(".activity-org-name").each(function() {
            activity_org_name += $(this).text();
            activity_org_name += "),(";
        });
        var activity_pos_name = "";
        $(".activity-pos-name").each(function() {
            activity_pos_name += $(this).text();
            activity_pos_name += "),(";
        });
        var activity_date = "";
        $(".activity-date").each(function() {
            activity_date += $(this).text();
            activity_date += "),(";
        });
        var activity_desc = "";
        $(".activity-desc").each(function() {
            activity_desc += $(this).text();
            activity_desc += "),(";
        });

        //reference
        var reference_title = $(".reference-title").text();
        var reference = "";
        $(".reference").each(function() {
            reference += $(this).text();
            reference += "),(";
        });

        // alert(name+" "+curr_position+" "+career_objective);
        // alert(gender+" "+website+" "+email+" "+mobile+" "+address+" "+linkedin+" "+github);
        // alert(skill_title+" "+skill);
        // alert(work_exp_title+" "+work_exp_pos+" "+work_exp_comp+" "+work_exp_date+" "+work_exp_address+" "+work_exp_desc);
        // alert(education_title+" "+colg_crs_name+" "+colg_name+" "+colg_crs_date+" "+colg_crs_address+" "+colg_crs_subject);
        // alert(language_title+" "+lang);
        // alert(certificate_title+" "+cert_name+" "+cert_date);
        // alert(interest_title+" "+interest);
        // alert(award_title+" "+award_name+" "+award_date);
        // alert(activity_title+" "+activity_org_name+" "+activity_pos_name+" "+activity_date+" "+activity_desc);
        // alert(reference_title+" "+reference);
        // alert(image);

        // console.log(name+" "+curr_position+" "+career_objective+"\r\n\r\n"+email+" "+mobile+" "+address+" "+linkedin+" "+github+"\r\n\r\n"+work_exp_pos+" "+work_exp_comp+" "+work_exp_date+" "+work_exp_address+" "+work_exp_desc+"\r\n\r\n"+colg_crs_name+" "+colg_name+" "+colg_crs_date+" "+colg_crs_address+"\r\n\r\n"+cert_name_date+"\r\n\r\n"+achieve_name_date+"\r\n\r\n"+skill+"\r\n\r\n"+lang+"\r\n\r\n"+interest+"\r\n\r\n"+organization+"\r\n\r\n"+award+"\r\n\r\n");

        if(name!="" && email!="" && mobile!="" && address!=""){

            if(!$("#empty-fields").hasClass("d-none")){
                $("#empty-fields").addClass("d-none")
            }

            $.ajax({
                url:"../fun/dash-resume.php",
                type:"POST",
                data:{
                res_id:res_id,
                block_positions:block_positions,
                hide_block_positions:hide_block_positions,

                name:name,
                curr_position:curr_position,
                career_objective:career_objective, 

                gender:gender,
                website:website,
                email:email,
                mobile:mobile,
                address:address,
                linkedin:linkedin,
                github:github, 

                image:image,

                skill_title:skill_title,
                skill:skill, 
                
                progress_tag:progress_tag,
                dot_value:dot_value,

                work_exp_title:work_exp_title,
                work_exp_pos:work_exp_pos,
                work_exp_comp:work_exp_comp,
                work_exp_date:work_exp_date,
                work_exp_address:work_exp_address,
                work_exp_desc:work_exp_desc, 

                education_title:education_title,
                colg_crs_name:colg_crs_name,
                colg_name:colg_name,
                colg_crs_date:colg_crs_date,
                colg_crs_address:colg_crs_address,
                colg_crs_subject:colg_crs_subject, 

                language_title:language_title,
                language:language, 

                certificate_title:certificate_title,
                cert_name:cert_name,
                cert_date:cert_date, 

                interest_title:interest_title,
                interest:interest, 

                award_title:award_title,
                award_name:award_name,
                award_date:award_date, 

                activity_title:activity_title,
                activity_org_name:activity_org_name,
                activity_pos_name:activity_pos_name,
                activity_date:activity_date,
                activity_desc:activity_desc, 

                reference_title:reference_title,
                reference:reference},
                success:function(success_query){

                    // alert(success_query);
                    console.log(success_query);

                if(success_query==1){
                    errorMsg("skill query not run")
                }else if(success_query==2){
                    errorMsg("work experience query not run");
                }else if(success_query==3){
                    errorMsg("education query not run");
                }else if(success_query==4){
                    errorMsg("language query not run");
                }else if(success_query==5){
                    errorMsg("certificate query not run");
                }else if(success_query==6){
                    errorMsg("interest query not run");
                }else if(success_query==7){
                    errorMsg("award query not run");
                }else if(success_query==8){
                    errorMsg("activity query not run");
                }else if(success_query==9){
                    errorMsg("reference query not run");
                }else if(success_query==10){
                    errorMsg("user resume query not run");
                }else if(success_query==11){
                    location.href='my-resumes.php';
                }

                // alert(result);

                },
                error:function(result){
                    alert(result);
                }


            });

            // store_Data_Session()

        }else{
            var error='<b><ul>';
            if(name==""){
                error+='<li>"Full Name" is required</li>'
            }
            if(email==""){
                error+='<li>"Email" is required</li>'
            }
            if(mobile==""){
                error+='<li>"Phone Number" is required</li>'
            }
            if(address==""){
                error+='<li>"Address" is required</li>'
            }
            
            error+='</ul></b>';
            // alert(error);
            $("#empty-fields").removeClass("d-none");
            $("#add-error").html(error);
        }


    });

</script>