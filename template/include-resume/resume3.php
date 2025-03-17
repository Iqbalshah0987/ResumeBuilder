
<style>
    .font-size-14{
        font-size: 14px;
    }
    .color{
        color:#0599fc;
    }
    .pointer{
        cursor: pointer;
    }
    .person-image{
        width: 110px;
        height: 110px;
        border-radius: 50%;
        border: 3px solid #0599fc;
    }
    .border-div{
        border: 1px solid #0599fc;
        margin: 1.5rem 0 2rem;
    }
    .dot-color{
        width:18px; 
        height:18px; 
        background-color:#0599fc; 
        border-radius:5px;
        margin-right:1rem;
    }
    .dot-blank{
        width:18px; 
        height:18px; 
        background-color:#818182; 
        border-radius:5px;
        margin-right:1rem;
    }
    .interest-span span {
        background: #0599fc;
        color:#fff;
        -webkit-print-color-adjust: exact;
        border-radius: 5px;
        font-size: 14px;
        padding: 4px 10px;
        margin: 2px 3px;
        line-height: 24px;
        display: inline-block;
    }

    .interest-span span[placeholder]:empty::before {
        color: #fff;
    }

    .image-upload label{
        cursor: pointer;
    }
    .image-upload > input {
        visibility:hidden;
        width:0;
        height:0
    }
</style>

<div class="main-block">
    <!-- header part -->
    <div class="row">
        <div class="col-5 text-start">
            <h4 id="personale-suggestion" class="mb-0 name" contenteditable="true" placeholder="FULL NAME"><?php echo isset($name)?$name:''; ?></h4>
            <p id="personal-suggestion" class="text-primary mb-0 curr-position" contenteditable="true" placeholder="Current Job Position"><?php echo isset($curr_position)?$curr_position:''; ?></p>
            <p id="objective-suggestion" class="mb-0 font-size-14 career-objective" contenteditable="true" placeholder="Fill in your Career’s Objective &#13; + Shorterm (in the next 2 years). &#13; Ex: Complete Diploma of Marketing at XYZ university, and be fluently about photoshop skill in the next 6 months &#13; + Longterm (In the next 3-5 years). &#13; Ex: To be an CMO for ACB company, running at least 5 big sucessful campaigns for company"><?php echo isset($objective)?$objective:''; ?></p>
        </div>
        <!-- upload image -->
        <div class="col-2 text-center">
            <form id="upload-image">
                <div class="image-upload">
                    <label for="file-input">
                        <img src="../img/logo/<?php echo isset($image)?$image:'person.png'; ?>" align="center" id="preview-img" class="person-image" alt="" style="pointer-events: none"/>
                    </label>
                    <input type="file" accept="image/*" name="file-input" id="file-input" onchange="previewImage();">
                    <input type="hidden" name="old-image-file" id="old-image-file">
                </div>
            </form>
        </div>

        <div class="col-5 text-end">
            <p class="font-size-14 text-end my-0 mb-1"><span class="email" contenteditable="true" placeholder="contact@gmail.com"><?php echo isset($email)?$email:''; ?></span>&nbsp;&nbsp;<i class="bi bi-envelope-fill color"></i></p>
            <p class="font-size-14 text-end my-0 mb-1"><span class="mobile" contenteditable="true" placeholder="123 456 7890"><?php echo isset($mobile)?$mobile:''; ?></span>&nbsp;&nbsp;<i class="bi bi-telephone-fill color"></i></p>
            <p class="font-size-14 text-end my-0 mb-1"><span class="address" contenteditable="true" placeholder="Home Address"><?php echo isset($address)?$address:''; ?></span>&nbsp;&nbsp;<i class="bi bi-geo-alt-fill color"></i></p>
            <p class="font-size-14 text-end my-0 mb-1"><span class="linkedin" contenteditable="true" placeholder="linkedin.com/username"><?php echo isset($linkedin)?$linkedin:''; ?></span>&nbsp;&nbsp;<i class="bi bi-linkedin color"></i></p>
            <p class="font-size-14 text-end my-0 mb-1"><span class="github" contenteditable="true" placeholder="github.com/username"><?php echo isset($github)?$github:''; ?></span>&nbsp;&nbsp;<i class="bi bi-github color"></i></p>
        </div>
    </div>

    <!-- border -->
    <div class="border-div"></div>
    <!-- end border -->

    <!-- body part -->
    <div class="row gx-5 mb-4">
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
                    <h5 class="education-title mb-1" contenteditable="true" placeholder="TITLE"><?php echo (isset($edu_title) && $edu_title!='')?$edu_title:'EDUCATION'; ?></h5>
                    <?php
                        if(isset($edu_len) && $edu_len>1){
                            for($i=0; $i<($edu_len-1); $i++){
                    ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h6 class="colg-crs-name mb-0" contenteditable="true" placeholder="Course Name"><?php echo $edu_course[$i]; ?></h6>
                            <h6 class="colg-name my-0 font-size-14" contenteditable="true" placeholder="College Name"><?php echo $edu_college[$i]; ?></h6>
                            <div class="d-flex justify-content-between align-items-center font-size-14 color">
                                <span class="colg-crs-date" contenteditable="true" placeholder="06/2019 - 06/2022"><?php echo $edu_date[$i]; ?></span>
                                <span class="colg-crs-address" contenteditable="true" placeholder="College City/Address"><?php echo $edu_address[$i]; ?></span>
                            </div>
                            <div class="colg-crs-subject font-size-14" contenteditable="true" placeholder="Write the main subject or profile in your school"><?php echo $edu_desc[$i]; ?></div>
                        </div>
                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h6 class="colg-crs-name mb-0" contenteditable="true" placeholder="Course Name"></h6>
                            <h6 class="colg-name my-0 font-size-14" contenteditable="true" placeholder="College Name"></h6>
                            <div class="d-flex justify-content-between align-items-center font-size-14 color">
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
                    <h5 class="mb-1 skill-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($skill_title) && $skill_title!='')?$skill_title:'SKILLS'; ?></h5>

                    <?php
                        if(isset($skill_len) && $skill_len>1){
                        for($i=0; $i<($skill_len-1); $i++){
                    ?>
                    <div class="div-inner-block skills">
                        <div class="d-flex justify-content-between align-items-center font-size-14">
                            <span class="skill" contenteditable="true" placeholder="Skills"><?php echo $skill[$i]; ?></span>
                            <div class="pointer apply-star" data-bs-toggle="modal" data-bs-target="#starsModal">
                                <progress class="progress-tag" value="<?php echo isset($progress_tag[$i])?$progress_tag[$i]:25; ?>" max="100"></progress>
                            </div>
                        </div>
                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block skills">
                        <div class="d-flex justify-content-between align-items-center font-size-14">
                            <span class="skill" contenteditable="true" placeholder="Skills"></span>
                            <div class="pointer apply-star" data-bs-toggle="modal" data-bs-target="#starsModal">
                                <progress class="progress-tag" value="55" max="100"></progress>
                            </div>
                        </div>   
                    </div>                    
                    <?php } ?>
                    

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
                    <h5 class="mb-1 certificate-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($cert_title) && $cert_title!='')?$cert_title:'CERTIFICATES'; ?></h5>
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
                    <h5 class="mb-1 award-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($award_title) && $award_title!='')?$award_title:'HONOURS & AWARDS'; ?></h5>
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
            <!-- language -->
            <div id="language-suggestion" data-position="5" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-4">
                <div class="div-outer-block">
                    <h5 class="mb-1 language-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($language_title) && $language_title!='')?$language_title:'LANGUAGE'; ?></h5>

                    <?php
                        if(isset($language_len) && $language_len>1){
                        for($i=0; $i<($language_len-1); $i++){
                    ?>
                    <div class="div-inner-block language-span">
                        <div class="d-flex justify-content-between align-items-center font-size-14 mb-1">
                            <span class="language" contenteditable="true" placeholder="Language"><?php echo $language[$i]; ?></span>
                            <div class="d-flex justify-content-between align-items-center pointer apply-star" data-bs-toggle="modal" data-bs-target="#starsModal">
                                <?php 
                                    $num=(isset($dot_value[$i]) && $dot_value[$i]!='')?$dot_value[$i]:-1;
                                    for($j=0; $j<5; $j++){
                                        if($j<=$num-1){
                                ?>
                                <div class="dot-color"></div>
                                <?php }else{ ?>
                                <div class="dot-blank"></div>
                                <?php } } ?>
                                <input type="hidden" name="dot_value" class="dot-value" value="<?php echo isset($dot_value[$i])?$dot_value[$i]:-1; ?>">
                            </div>
                        </div>
                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block language-span">
                        <div class="d-flex justify-content-between align-items-center font-size-14 mb-1">
                            <span class="language" contenteditable="true" placeholder="Language"></span>
                            <div class="d-flex justify-content-between align-items-center pointer apply-star" data-bs-toggle="modal" data-bs-target="#starsModal">
                                <div class="dot-color"></div>
                                <div class="dot-color"></div>
                                <div class="dot-color"></div>
                                <div class="dot-blank"></div>
                                <div class="dot-blank"></div>
                                <input type="hidden" name="dot_value" class="dot-value" value="3">
                            </div>
                        </div>
                    </div>
                    <?php } ?>

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
                    <h5 class="mb-1 work-exp-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($exp_title) && $exp_title!='')?$exp_title:'WORK EXPERIENCE'; ?></h5>
                    <?php
                        if(isset($exp_len) && $exp_len>1){
                            for($i=0; $i<($exp_len-1); $i++){
                    ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h6 class="work-exp-pos mb-0" contenteditable="true" placeholder="Job Position"><?php echo $exp_pos[$i]; ?></h6>
                            <h6 class="work-exp-comp my-0 font-size-14" contenteditable="true" placeholder="Company Name"><?php echo $exp_comp[$i]; ?></h6>
                            <div class="d-flex justify-content-between align-items-center font-size-14 color">
                                <span class="work-exp-date" contenteditable="true" placeholder="04/2022 - 06/2022"><?php echo $exp_date[$i]; ?></span>
                                <span class="work-exp-address" contenteditable="true" placeholder="Company City/Address"><?php echo $exp_address[$i]; ?></span>
                            </div>
                            <div class="work-exp-desc font-size-14" contenteditable="true" placeholder="Describe Your Job"><?php echo $exp_desc[$i]; ?></div>
                        </div>

                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h6 class="work-exp-pos mb-0" contenteditable="true" placeholder="Job Position"></h6>
                            <h6 class="work-exp-comp my-0 font-size-14" contenteditable="true" placeholder="Company Name"></h6>
                            <div class="d-flex justify-content-between align-items-center font-size-14 color">
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
                    <h5 class="mb-1 interest-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($interest_title) && $interest_title!='')?$interest_title:'INTEREST'; ?></span></h5>
                    <div id="interest-span-block-inner" class="div-inner-block mb-3 interest-span font-size-14">
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
                    <h5 class="mb-1 activity-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($activity_title) && $activity_title!='')?$activity_title:'ACTIVITIES'; ?></h5>
                    <?php
                        if(isset($activity_len) && $activity_len>1){
                            for($i=0; $i<($activity_len-1); $i++){
                    ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h6 class="activity-org-name mb-0" contenteditable="true" placeholder="Organization Name"><?php echo $activity_org_name[$i]; ?></h6>
                            <div class="d-flex justify-content-between align-items-center font-size-14 color">
                                <span class="activity-pos-name" contenteditable="true" placeholder="Actitivity Title"><?php echo $activity_name[$i]; ?></span>
                                <span class="activity-date" contenteditable="true" placeholder="04/2022 - 06/2022"><?php echo $activity_date[$i]; ?></span>
                            </div>
                            <div class="activity-desc font-size-14" contenteditable="true" placeholder="Describe the Activity"><?php echo $activity_desc[$i]; ?></div>
                        </div>

                    </div>
                    <?php } }else{ ?>
                    <div class="div-inner-block mb-3">
                        <div>
                            <h6 class="activity-org-name mb-0" contenteditable="true" placeholder="Organization Name"></h6>
                            <div class="d-flex justify-content-between align-items-center font-size-14 color">
                                <span class="activity-pos-name" contenteditable="true" placeholder="Actitivity Title"></span>
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
                    <h5 class="mb-1 reference-title" contenteditable="true" placeholder="TITLE"><?php echo (isset($reference_title) && $reference_title!='')?$reference_title:'REFERENCE'; ?></h5>
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
