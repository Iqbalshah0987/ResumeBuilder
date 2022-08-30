<style>
    .font-size-14 {
        font-size: 0.875rem;
    }

    .color {
        color: #fc6262;
        text-transform: uppercase;
    }

    .color-dark {
        color: #4d0000;
    }

    div.about {
        width: 80%;
    }

    div.about p {
        text-align: center;
    }

    .person {
        border-radius: 10px;
        padding-top: 1.5rem;
        padding-bottom: 1rem;
        border: 1px solid #fc6262;
        position: relative;
    }

    .person h4 {
        position: absolute;
        top: -15px;
        background: #ffffff;
        padding-left: 3rem;
        padding-right: 3rem;
    }

    .social-links {
        background: #fc6262;
        -webkit-print-color-adjust: exact;
        padding: 1rem 0;
        padding-bottom: 1.5rem;
        clip-path: polygon(100% 0, 100% 80%, 48% 100%, 0 80%, 0 0);
        border-radius: 10px;
        border-bottom-left-radius: 30%;
        border-bottom-right-radius: 30%;
    }

    .social-links i {
        color: #4d0000;
    }

    .social-links span {
        color: #fff;
    }

    .skills span {
        background: #fc6262;
        color: #ffffff;
        -webkit-print-color-adjust: exact;
        border-radius: 5px;
        font-size: 14px;
        padding: 4px 10px;
        margin: 2px 3px;
        line-height: 24px;
        display: inline-block;
    }

    .language-span span {
        background: #f0f1f2;
        color: black;
        -webkit-print-color-adjust: exact;
        border-radius: 5px;
        font-size: 14px;
        padding: 4px 10px;
        margin: 2px 3px;
        line-height: 24px;
        display: inline-block;
    }

    .social-links span[placeholder]:empty::before, .skills span[placeholder]:empty::before {
        color: #fff;
    }
    .language-span span[placeholder]:empty::before {
        color: #000;
    }
</style>

<div class="main-block">
    <!-- person -->
    <div class="person text-center mb-4">
        <h4 id="personale-suggestion" class="name color name-heading" contenteditable="true" placeholder="FULL NAME"><?php echo isset($name)?$name:''; ?></h4>
        <div id="personal-suggestion" class="d-flex justify-content-center">
            <p class="curr-position color-dark mb-0" contenteditable="true" placeholder="Current Job Position"><?php echo isset($curr_position)?$curr_position:''; ?></p>
        </div>
        <div id="objective-suggestion" class="about font-size-14 mx-auto">
            <p class="career-objective mb-0" contenteditable="true" placeholder="Fill in your Career’s Objective &#13; + Shorterm (in the next 2 years). &#13; Ex: Complete Diploma of Marketing at XYZ university, and be fluently about photoshop skill in the next 6 months &#13; + Longterm (In the next 3-5 years). &#13; Ex: To be an CMO for ACB company, running at least 5 big sucessful campaigns for company"><?php echo isset($objective)?$objective:''; ?></p>
        </div>
    </div>

    <!-- social links -->
    <div id="personal-social-suggestion" class="social-links mb-4">
        <div class="row g-1 font-size-14">
            <div class="col-6">
                <div class="ms-5">
                    <i class="bi bi-envelope-fill"></i>&nbsp;&nbsp;
                    <span class="email" contenteditable="true" placeholder="contact@gmail.com"><?php echo isset($email)?$email:''; ?></span>
                </div>
            </div>
            <div class="col-6">
                <div class="ms-5">
                    <i class="bi bi-telephone-fill"></i>&nbsp;&nbsp;
                    <span class="mobile" contenteditable="true" placeholder="123 456 7890"><?php echo isset($mobile)?$mobile:''; ?></span>
                </div>
            </div>
            <div class="col-6">
                <div class="ms-5">
                    <i class="bi bi-geo-alt-fill"></i>&nbsp;&nbsp;
                    <span class="address" contenteditable="true" placeholder="Home Address"><?php echo isset($address)?$address:''; ?></span>
                </div>
            </div>
            <div class="col-6">
                <div class="ms-5">
                    <i class="bi bi-linkedin"></i>&nbsp;&nbsp;
                    <span class="linkedin" contenteditable="true" placeholder="linkedin.com/username"><?php echo isset($linkedin)?$linkedin:''; ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row gx-5">
        <div class="col-6 main-all-blocks">

            <?php
                foreach($data_pos as $data_position){

                if($data_position==1){

                    $fa_checked=false;
                    foreach($hide_block as $fa_check){
                        if($fa_check==1){
                            $fa_checked=true;
                            break;
                        }
                    }
            ?>
            <!-- Education -->
            <div id="educations-suggestion" data-position="1" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-4">
                <div class="div-outer-block">
                    <h5 class="color"><i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp;<span class="education-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($edu_title) && $edu_title!='')?$edu_title:'EDUCATION'; ?></span></h5>
                    <?php
                        if(isset($edu_len) && $edu_len>1){
                            for($i=0; $i<($edu_len-1); $i++){
                    ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h5 class="colg-crs-name mb-0" contenteditable="true" placeholder="Course Name"><?php echo $edu_course[$i]; ?></h5>
                            <h6 class="colg-name my-0" contenteditable="true" placeholder="College Name"><?php echo $edu_college[$i]; ?></h6>
                            <div class="d-flex justify-content-between align-items-center font-size-14">
                                <span class="colg-crs-date" contenteditable="true" placeholder="06/2019 - 06/2022"><?php echo $edu_date[$i]; ?></span>
                                <span class="colg-crs-address" contenteditable="true" placeholder="College City/Address"><?php echo $edu_address[$i]; ?></span>
                            </div>
                            <div class="colg-crs-subject font-size-14" contenteditable="true" placeholder="Write the main subject or profile in your school"><?php echo $edu_desc[$i]; ?></div>
                        </div>
                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h5 class="colg-crs-name mb-0" contenteditable="true" placeholder="Course Name"></h5>
                            <h6 class="colg-name my-0" contenteditable="true" placeholder="College Name"></h6>
                            <div class="d-flex justify-content-between align-items-center font-size-14">
                                <span class="colg-crs-date" contenteditable="true" placeholder="06/2019 - 06/2022"></span>
                                <span class="colg-crs-address" contenteditable="true" placeholder="College City/Address"></span>
                            </div>
                            <div class="colg-crs-subject font-size-14" contenteditable="true" placeholder="Write the main subject or profile in your school"></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <?php
                }else if($data_position==2){
                
                $fa_checked=false;
                foreach($hide_block as $fa_check){
                    if($fa_check==2){
                        $fa_checked=true;
                        break;
                    }
                }
            ?>
            <!-- skills -->
            <div id="skills-suggestion" data-position="2" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-4">
                <div class="div-outer-block">
                    <h5 class="color"><i class="fa-solid fa-trophy"></i>&nbsp;&nbsp;<span class="skill-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($skill_title) && $skill_title!='')?$skill_title:'SKILLS AND COMPETENCIES'; ?></span></h5>
                    <div id="skills-span-block-inner" class="div-inner-block skills">
                        <?php
                            if(isset($skill_len) && $skill_len>1){
                                for($i=0; $i<($skill_len-1); $i++){
                        ?>
                        <span class="skill" contenteditable="true" placeholder="Skills"><?php echo $skill[$i]; ?></span>
                        <?php } }else{ ?>
                        <span class="skill" contenteditable="true" placeholder="Skills"></span>
                        <?php } ?>
                    </div>
                    <div></div>

                </div>
            </div>

            <?php
                }else if($data_position==3){
                
                $fa_checked=false;
                foreach($hide_block as $fa_check){
                    if($fa_check==3){
                        $fa_checked=true;
                        break;
                    }
                }
            ?>
            <!-- certifications -->
            <div id="certification-suggestion" data-position="3" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-4">
                <div class="div-outer-block">
                    <h5 class="color"><i class="fa-solid fa-certificate"></i>&nbsp;&nbsp;<span class="certificate-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($cert_title) && $cert_title!='')?$cert_title:'TRANINGS AND CERTIFICATES'; ?></span></h5>
                    <?php
                        if(isset($cert_len) && $cert_len>1){
                            for($i=0; $i<($cert_len-1); $i++){
                    ?>
                    <div class="div-inner-block mb-3">
                        <div class="d-flex justify-content-between font-size-14">
                            <span class="cert-name" contenteditable="true"  placeholder="Certification Name"><?php echo $cert_name[$i]; ?></span>
                            <span class="cert-date" contenteditable="true" placeholder="03/07/2022"><?php echo $cert_date[$i]; ?></span>
                        </div>
                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block mb-3">
                        <div class="d-flex justify-content-between font-size-14">
                            <span class="cert-name" contenteditable="true"  placeholder="Certification Name"></span>
                            <span class="cert-date" contenteditable="true" placeholder="03/07/2022"></span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <?php
                }else if($data_position==4){
                
                $fa_checked=false;
                foreach($hide_block as $fa_check){
                    if($fa_check==4){
                        $fa_checked=true;
                        break;
                    }
                }
            ?>
            <!-- awards -->
            <div id="award-suggestion" data-position="4" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-4">
                <div class="div-outer-block">
                    <h5 class="color"><i class="fa-solid fa-crown"></i>&nbsp;&nbsp;<span class="award-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($award_title) && $award_title!='')?$award_title:'ACHIEVEMENTS'; ?></span></h5>
                    <?php
                        if(isset($award_len) && $award_len>1){
                            for($i=0; $i<($award_len-1); $i++){        
                    ?>
                    <div class="div-inner-block mb-3">
                        <div class="d-flex justify-content-between font-size-14">
                            <span class="award-name" contenteditable="true" placeholder="Award Name"><?php echo $award_name[$i]; ?></span>
                            <span class="award-date" contenteditable="true" placeholder="2022"><?php echo $award_date[$i]; ?></span>
                        </div>
                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block mb-3">
                        <div class="d-flex justify-content-between font-size-14">
                            <span class="award-name" contenteditable="true" placeholder="Award Name"></span>
                            <span class="award-date" contenteditable="true" placeholder="2022"></span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <?php
                }else if($data_position==5){
                
                $fa_checked=false;
                foreach($hide_block as $fa_check){
                    if($fa_check==5){
                        $fa_checked=true;
                        break;
                    }
                }
            ?>
            <!-- Language -->
            <div id="language-suggestion" data-position="5" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-4">
                <div class="div-outer-block">
                    <h5 class="color"><i class="fa-solid fa-language"></i>&nbsp;&nbsp;<span class="language-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($language_title) && $language_title!='')?$language_title:'LANGUAGE'; ?></span></h5>
                    <div id="language-span-block-inner" class="div-inner-block language-span mb-4">
                        <?php
                            if(isset($language_len) && $language_len>1){
                                for($i=0; $i<($language_len-1); $i++){
                        ?>
                        <span class="language" contenteditable="true" placeholder="Language"><?php echo $language[$i]; ?></span>
                        <?php } }else{ ?>
                        <span class="language" contenteditable="true" placeholder="Language"></span>
                        <?php } ?>
                    </div>
                    <div></div>

                </div>
            </div>
            <?php } } ?>

        </div>

        <div class="col-6 main-all-blocks">

            <?php
                foreach($data_pos as $data_position){
                if($data_position==6){
                
                    $fa_checked=false;
                    foreach($hide_block as $fa_check){
                        if($fa_check==6){
                            $fa_checked=true;
                            break;
                        }
                    }
            ?>
            <!-- work experience -->
            <div id="work-experience-suggestion" data-position="6" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-4">
                <div class="div-outer-block">
                    <h5 class="color"><i class="fa-solid fa-briefcase"></i>&nbsp;&nbsp;<span class="work-exp-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($exp_title) && $exp_title!='')?$exp_title:'WORK EXPERIENCE'; ?></span></h5>
                    <?php
                        if(isset($exp_len) && $exp_len>1){
                            for($i=0; $i<($exp_len-1); $i++){
                    ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h5 class="work-exp-pos mb-0" contenteditable="true" placeholder="Job Position"><?php echo $exp_pos[$i]; ?></h5>
                            <h6 class="work-exp-comp my-0" contenteditable="true" placeholder="Company Name"><?php echo $exp_comp[$i]; ?></h6>
                            <div class="d-flex justify-content-between align-items-center font-size-14">
                                <span class="work-exp-date" contenteditable="true" placeholder="04/2022 - 06/2022"><?php echo $exp_date[$i]; ?></span>
                                <span class="work-exp-address" contenteditable="true" placeholder="Company City/Address"><?php echo $exp_address[$i]; ?></span>
                            </div>
                            <div class="work-exp-desc font-size-14" contenteditable="true" placeholder="Describe Your Job"><?php echo $exp_desc[$i]; ?></div>
                        </div>

                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h5 class="work-exp-pos mb-0" contenteditable="true" placeholder="Job Position"></h5>
                            <h6 class="work-exp-comp my-0" contenteditable="true" placeholder="Company Name"></h6>
                            <div class="d-flex justify-content-between align-items-center font-size-14">
                                <span class="work-exp-date" contenteditable="true" placeholder="04/2022 - 06/2022"></span>
                                <span class="work-exp-address" contenteditable="true" placeholder="Company City/Address"></span>
                            </div>
                            <div class="work-exp-desc font-size-14" contenteditable="true" placeholder="Describe Your Job"></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <?php
                }else if($data_position==7){
                
                $fa_checked=false;
                foreach($hide_block as $fa_check){
                    if($fa_check==7){
                        $fa_checked=true;
                        break;
                    }
                }
            ?>
            <!-- Interest -->
            <div id="interest-suggestion" data-position="7" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-4">
                <div class="div-outer-block">
                    <h5 class="color"><i class="fa-solid fa-heart"></i>&nbsp;&nbsp;<span class="interest-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($interest_title) && $interest_title!='')?$interest_title:'INTEREST'; ?></span></h5>
                    <div id="interest-span-block-inner" class="div-inner-block mb-3 language-span font-size-14">
                        <?php
                            if(isset($interest_len) && $interest_len>1){
                                for($i=0; $i<($interest_len-1); $i++){
                        ?>
                        <span class="interest" contenteditable="true" placeholder="Interest"><?php echo $interest[$i]; ?></span>
                        <?php } }else{ ?>
                        <span class="interest" contenteditable="true" placeholder="Interest"></span>
                        <?php } ?>
                    </div>
                    <div></div>
                </div>
            </div>

            <?php
                }else if($data_position==8){
                
                $fa_checked=false;
                foreach($hide_block as $fa_check){
                    if($fa_check==8){
                        $fa_checked=true;
                        break;
                    }
                }
            ?>
            <!-- Activities -->
            <div id="activities-suggestion" data-position="8" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-4">
                <div class="div-outer-block">
                    <h5 class="color"><i class="fa-solid fa-user-pen"></i>&nbsp;&nbsp;<span class="activity-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($activity_title) && $activity_title!='')?$activity_title:'ACTIVITIES'; ?></span></h5>
                    <?php
                        if(isset($activity_len) && $activity_len>1){
                            for($i=0; $i<($activity_len-1); $i++){
                    ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h5 class="activity-org-name mb-0" contenteditable="true" placeholder="Organization Name"><?php echo $activity_org_name[$i]; ?></h5>
                            <div class="d-flex justify-content-between align-items-center font-size-14">
                                <span class="activity-pos-name" contenteditable="true" placeholder="title"><?php echo $activity_name[$i]; ?></span>
                                <span class="activity-date" contenteditable="true" placeholder="04/2022 - 06/2022"><?php echo $activity_date[$i]; ?></span>
                            </div>
                            <div class="activity-desc font-size-14" contenteditable="true" placeholder="Describe the Activity"><?php echo $activity_desc[$i]; ?></div>
                        </div>

                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h5 class="activity-org-name mb-0" contenteditable="true" placeholder="Organization Name"></h5>
                            <div class="d-flex justify-content-between align-items-center font-size-14">
                                <span class="activity-pos-name" contenteditable="true" placeholder="title"></span>
                                <span class="activity-date" contenteditable="true" placeholder="04/2022 - 06/2022"></span>
                            </div>
                            <div class="activity-desc font-size-14" contenteditable="true" placeholder="Describe the Activity"></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
            <?php
                }else if($data_position==9){
                
                $fa_checked=false;
                foreach($hide_block as $fa_check){
                    if($fa_check==9){
                        $fa_checked=true;
                        break;
                    }
                }
            ?>
            <!-- reference -->
            <div id="reference-suggestion" data-position="9" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-4">
                <div class="div-outer-block">
                    <h5 class="color"><i class="fa-solid fa-user-tie"></i>&nbsp;&nbsp;<span class="reference-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($reference_title) && $reference_title!='')?$reference_title:'REFERENCE'; ?></span></h5>
                    <?php
                        if(isset($reference_len) && $reference_len>1){
                            for($i=0; $i<($reference_len-1); $i++){
                    ?>
                    <div class="div-inner-block mb-3">
                        <span class="font-size-14 reference" contenteditable="true" placeholder="Reference's content"><?php echo $reference[$i]; ?></span>
                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block mb-3">
                        <span class="font-size-14 reference" contenteditable="true" placeholder="Reference's content"></span>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } } ?>

        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // on page load
        var textWidth = $(".name-heading").outerWidth(true) / 2;
        // alert(textWidth);
        $(".name-heading").css("left", "calc(50% - " + textWidth + "px)");

        // on key press when user change name
        $(".name-heading").keypress(function() {
            var textWidth = $(".name-heading").outerWidth(true) / 2;
            // alert(textWidth);
            $(".name-heading").css("left", "calc(50% - " + textWidth + "px)");

        });

    });
</script>