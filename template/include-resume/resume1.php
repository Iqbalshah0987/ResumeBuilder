<style>
  .main-block {
    font-family: sans-serif;
  }

  .font-size-14 {
    font-size: 0.875rem;
  }

  .color {
    color: #1b6ae8;
    text-transform: uppercase;
  }

  .social-links i {
    color: #1b6ae8;
  }

  .skills span {
    background: #1b6ae8;
    color: #ffffff;
    border-radius: 5px;
    font-size: 14px;
    padding: 4px 10px;
    margin: 2px 3px;
    line-height: 24px;
    display: inline-block;
    transition: 0.3s;
  }

  .interest-span span {
    background: #f0f1f2;
    color: #000;
    border-radius: 5px;
    font-size: 14px;
    padding: 4px 10px;
    margin: 2px 3px;
    line-height: 24px;
    display: inline-block;
    transition: 0.3s;
  }

  .skill[placeholder]:empty::before {
    color: #ffffff;
  }

  .interest[placeholder]:empty::before, .language[placeholder]:empty::before {
    color: #000;
  }
</style>

<div class="main-block">
  
  <!-- personal details -->
  <div class="text-start mb-4 mt-0">
    <h4 id="personal-suggestion" class="color name mb-0" contenteditable="true" placeholder="Full Name"><?php echo isset($name)?$name:''; ?></h4>
    <p id="personal-suggestion" contenteditable="true" class="curr-position mb-1" placeholder="Current Job Position"><?php echo isset($curr_position)?$curr_position:''; ?></p>
    <p id="objective-suggestion" contenteditable="true" class="career-objective font-size-14 my-0" placeholder="Fill in your Career’s Objective &#13; + Shorterm (in the next 2 years). &#13; Ex: Complete Diploma of Marketing at XYZ university, and be fluently about photoshop skill in the next 6 months &#13; + Longterm (In the next 3-5 years). &#13; Ex: To be an CMO for ACB company, running at least 5 big sucessful campaigns for company"><?php echo isset($objective)?$objective:''; ?></p>
  </div>

  <!-- Social links -->
  <div id="personal-social-suggestion" class="font-size-14 mb-4 border border-3 border-dark border-start-0 border-end-0 py-2 social-links">
    <div class="d-flex align-items-center justify-content-around mb-2">
      <div class="d-inline">
        <i class="bi bi-envelope-fill"></i>&nbsp;&nbsp;
        <span contenteditable="true" class="email" placeholder="contact@gmail.com"><?php echo isset($email)?$email:''; ?></span>
      </div>
      <div class="d-inline">
        <i class="bi bi-telephone-fill"></i>&nbsp;&nbsp;
        <span contenteditable="true" class="mobile" placeholder="123 456 7890"><?php echo isset($mobile)?$mobile:''; ?></span>
      </div>
      <div class="d-inline">
        <i class="bi bi-geo-alt-fill"></i>&nbsp;&nbsp;
        <span contenteditable="true" class="address" placeholder="Home Address"><?php echo isset($address)?$address:''; ?></span>
      </div>
      
    </div>

    <div class="d-flex align-items-center justify-content-around">
      <div class="d-inline">
        <i class="bi bi-globe"></i>&nbsp;&nbsp;
        <span contenteditable="true" class="website" placeholder="www.example.com"><?php echo isset($website)?$website:''; ?></span>
      </div>
      <div class="d-inline">
        <i class="bi bi-github"></i>&nbsp;&nbsp;
        <span contenteditable="true" class="github" placeholder="github.com/username"><?php echo isset($github)?$github:''; ?></span>
      </div>
      <div class="d-inline">
        <i class="bi bi-linkedin"></i>&nbsp;&nbsp;
        <span contenteditable="true" class="linkedin" placeholder="linkedin.com/username"><?php echo isset($linkedin)?$linkedin:''; ?></span>
      </div>
    </div>

  </div>

  <div class="main-all-blocks">
    <!-- for first block -->
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
    <!-- skills -->
    <div id="skills-suggestion" data-position="1" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> skills mb-3">
      <div class="div-outer-block">
        <h5 contenteditable="true" class="color mb-1 skill-title" placeholder="TITLE"><?php echo (isset($skill_title) && $skill_title!='')?$skill_title:'SKILLS'; ?></h5>
        <div id="skills-span-block-inner" class="div-inner-block mb-3">
          <?php
            if(isset($skill_len) && $skill_len>1){
              for($i=0; $i<($skill_len-1); $i++){
          
          ?>
          <span contenteditable="true" class="skill font-size-14" placeholder="Skills"><?php echo $skill[$i]; ?></span>
          <?php } }else{ ?>
          <span contenteditable="true" class="skill font-size-14" placeholder="Skills"></span>
          <?php } ?>
        </div>
        <div></div>

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
    <!-- work experience -->
    <div id="work-experience-suggestion" data-position="2" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> experience mb-3">
      <div class="div-outer-block">
        <h5 contenteditable="true" class="color mb-1 work-exp-title" placeholder="TITLE"><?php echo (isset($exp_title) && $exp_title!='')?$exp_title:'WORK EXPERIENCE'; ?></h5>
        <?php
          if(isset($exp_len) && $exp_len>1){
            for($i=0; $i<($exp_len-1); $i++){

        ?>
        <div class="div-inner-block mb-3">
          <div>
            <h5 contenteditable="true" class="work-exp-pos mb-0" placeholder="Job Position"><?php echo $exp_pos[$i]; ?></h5>
            <h6 contenteditable="true" class="work-exp-comp my-0" placeholder="Company Name"><?php echo $exp_comp[$i]; ?></h6>
            <div class="d-flex justify-content-between align-items-center font-size-14 mb-1">
              <span contenteditable="true" class="work-exp-date" placeholder="04/2022 - 06/2022"><?php echo $exp_date[$i]; ?></span>
              <span contenteditable="true" class="work-exp-address" placeholder="Company City/Address"><?php echo $exp_address[$i]; ?></span>
            </div>
            <div contenteditable="true" class="work-exp-desc font-size-14" placeholder="Describe Your Job"><?php echo $exp_desc[$i]; ?></div>
          </div>
        </div>
        <?php } }else{ ?>
        <div class="div-inner-block mb-3">
          <div>
            <h5 contenteditable="true" class="work-exp-pos mb-0" placeholder="Job Position"></h5>
            <h6 contenteditable="true" class="work-exp-comp my-0" placeholder="Company Name"></h6>
            <div class="d-flex justify-content-between align-items-center font-size-14 mb-1">
              <span contenteditable="true" class="work-exp-date" placeholder="04/2022 - 06/2022"></span>
              <span contenteditable="true" class="work-exp-address" placeholder="Company City/Address"></span>
            </div>
            <div contenteditable="true" class="work-exp-desc font-size-14" placeholder="Describe Your Job"></div>
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
    <!-- Education -->
    <div id="educations-suggestion" data-position="3" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> education mb-3">
      <div class="div-outer-block">
        <h5 contenteditable="true" class="color mb-1 education-title" placeholder="TITLE"><?php echo (isset($edu_title) && $edu_title!='')?$edu_title:'EDUCATION'; ?></h5>

        <?php
          if(isset($edu_len) && $edu_len>1){
            for($i=0; $i<($edu_len-1); $i++){
        ?>

        <div class="div-inner-block mb-3">
          <div>
            <h5 contenteditable="true" class="colg-crs-name mb-0" placeholder="Course Name"><?php echo $edu_course[$i]; ?></h5>
            <h6 contenteditable="true" class="colg-name my-0" placeholder="College Name"><?php echo $edu_college[$i]; ?></h6>
            <div class="d-flex justify-content-between align-items-center font-size-14 mb-1">
              <span contenteditable="true" class="colg-crs-date" placeholder="06/2019 - 06/2022"><?php echo $edu_date[$i]; ?></span>
              <span contenteditable="true" class="colg-crs-address" placeholder="College City/Address"><?php echo $edu_address[$i]; ?></span>
            </div>
            <div contenteditable="true" class="colg-crs-subject font-size-14" placeholder="Write the main subject or profile in your school"><?php echo $edu_desc[$i]; ?></div>
          </div>
        </div>
        <?php } }else{ ?>
        <div class="div-inner-block mb-3">
          <div>
            <h5 contenteditable="true" class="colg-crs-name mb-0" placeholder="Course Name"></h5>
            <h6 contenteditable="true" class="colg-name my-0" placeholder="College Name"></h6>
            <div class="d-flex justify-content-between align-items-center font-size-14 mb-1">
              <span contenteditable="true" class="colg-crs-date" placeholder="06/2019 - 06/2022"></span>
              <span contenteditable="true" class="colg-crs-address" placeholder="College City/Address"></span>
            </div>
            <div contenteditable="true" class="colg-crs-subject font-size-14" placeholder="Write the main subject or profile in your school"></div>
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
    <!-- Activities -->
    <div id="activities-suggestion" data-position="4" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-3">
      <div class="div-outer-block">
        <h5 contenteditable="true" class="color mb-1 activity-title" placeholder="TITLE"><?php echo (isset($activity_title) && $activity_title!='')?$activity_title:'ACTIVITIES'; ?></h5>

        <?php
          if(isset($activity_len) && $activity_len>1){
            for($i=0; $i<($activity_len-1); $i++){
        ?>

        <div class="div-inner-block mb-3">
          <div>
            <h6 contenteditable="true" class="mb-0 activity-org-name" placeholder="Organization Name"><?php echo $activity_org_name[$i]; ?></h6>
            <div class="d-flex justify-content-between font-size-14">
              <span contenteditable="true" class="activity-pos-name" placeholder="title / Role"><?php echo $activity_name[$i]; ?></span>
              <span contenteditable="true" class="activity-date" placeholder="06/2019 - 06/2022"><?php echo $activity_date[$i]; ?></span>
            </div>
            <div contenteditable="true" class="font-size-14 activity-desc" placeholder="Describe the activity"><?php echo $activity_desc[$i]; ?></div>
          </div>

        </div>
        <?php } }else{ ?>
        <div class="div-inner-block mb-3">
          <div>
            <h6 contenteditable="true" class="mb-0 activity-org-name" placeholder="Organization Name"></h6>
            <div class="d-flex justify-content-between font-size-14">
              <span contenteditable="true" class="activity-pos-name" placeholder="title / Role"></span>
              <span contenteditable="true" class="activity-date" placeholder="06/2019 - 06/2022"></span>
            </div>
            <div contenteditable="true" class="font-size-14 activity-desc" placeholder="Describe the activity"></div>
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
    <!-- certifications -->
    <div id="certification-suggestion" data-position="5" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-3">
      <div class="div-outer-block">
        <h5 contenteditable="true" class="color mb-1 certificate-title" placeholder="TITLE"><?php echo (isset($cert_title) && $cert_title!='')?$cert_title:'CERTIFICATIONS'; ?></h5>
        <?php
          if(isset($cert_len) && $cert_len>1){
            for($i=0; $i<($cert_len-1); $i++){
        ?>
        <div class="div-inner-block mb-3">
          <div class="d-flex justify-content-between">
            <span contenteditable="true" class="font-size-14 cert-name" placeholder="Certification Name"><?php echo $cert_name[$i]; ?></span>
            <span contenteditable="true" class="font-size-14 cert-date" placeholder="2022"><?php echo $cert_date[$i]; ?></span>
          </div>

        </div>
        <?php } }else{ ?>
        <div class="div-inner-block mb-3">
          <div class="d-flex justify-content-between">
            <span contenteditable="true" class="font-size-14 cert-name" placeholder="Certification Name"></span>
            <span contenteditable="true" class="font-size-14 cert-date" placeholder="2022"></span>
          </div>
        </div>
        <?php } ?>

      </div>
    </div>
    <?php
        }else if($data_position==6){

          $fa_checked=false;
          foreach($hide_block as $fa_check){
              if($fa_check==6){
                  $fa_checked=true;
                  break;
              }
          }
    ?>
    <!-- hovour and awards -->
    <div id="award-suggestion" data-position="6" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-3">
      <div class="div-outer-block">
        <h5 contenteditable="true" class="color mb-1 award-title" placeholder="TITLE"><?php echo (isset($award_title) && $award_title!='')?$award_title:'HONOUR & AWARDS'; ?></h5>
        <?php
          if(isset($award_len) && $award_len>1){
            for($i=0; $i<($award_len-1); $i++){        
        ?>
        <div class="div-inner-block mb-3">
          <div class="d-flex justify-content-between">
            <span contenteditable="true" class="font-size-14 award-name" placeholder="Award Name"><?php echo $award_name[$i]; ?></span>
            <span contenteditable="true" class="font-size-14 award-date" placeholder="2022"><?php echo $award_date[$i]; ?></span>
          </div>
        </div>
        <?php } }else{ ?>
        <div class="div-inner-block mb-3">
          <div class="d-flex justify-content-between">
            <span contenteditable="true" class="font-size-14 award-name" placeholder="Award Name"></span>
            <span contenteditable="true" class="font-size-14 award-date" placeholder="2022"></span>
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
    <!-- interest -->
    <div id="interest-suggestion" data-position="7" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> interest-span mb-3">
      <div class="div-outer-block">
        <h5 contenteditable="true" class="color mb-1 interest-title" placeholder="TITLE"><?php echo (isset($interest_title) && $interest_title!='')?$interest_title:'INTEREST'; ?></h5>

        <div id="interest-span-block-inner" class="div-inner-block mb-3">
          <?php
            if(isset($interest_len) && $interest_len>1){
              for($i=0; $i<($interest_len-1); $i++){
          ?>
          <span contenteditable="true" class="interest font-size-14" placeholder="Interest"><?php echo $interest[$i]; ?></span>
          <?php } }else{ ?>
          <span contenteditable="true" class="interest font-size-14" placeholder="Interest"></span>
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
    <!-- language -->
    <div id="language-suggestion" data-position="8" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> interest-span mb-3">
      <div class="div-outer-block">
        <h5 contenteditable="true" class="color mb-1 language-title" placeholder="TITLE"><?php echo (isset($language_title) && $language_title!='')?$language_title:'LANGUAGE'; ?></h5>

        <div id="language-span-block-inner" class="div-inner-block mb-3">
          <?php
            if(isset($language_len) && $language_len>1){
              for($i=0; $i<($language_len-1); $i++){
          ?>
          <span contenteditable="true" class="language font-size-14" placeholder="Language"><?php echo $language[$i]; ?></span>
          <?php } }else{ ?>
          <span contenteditable="true" class="language font-size-14" placeholder="Language"></span>
          <?php } ?>
        </div>
        <div></div>
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
    <div id="reference-suggestion" data-position="9" class="res-block <?php echo ($fa_checked==false)?'active-res-block':'d-none'; ?> mb-3">
      <div class="div-outer-block">
        <h5 contenteditable="true" class="color mb-1 reference-title" placeholder="TITLE"><?php echo (isset($reference_title) && $reference_title!='')?$reference_title:'REFERENCE'; ?></h5>
        <?php
          if(isset($reference_len) && $reference_len>1){
            for($i=0; $i<($reference_len-1); $i++){
        ?>
        <div class="div-inner-block mb-3">
          <span contenteditable="true" class="font-size-14 reference" placeholder="Reference's content"><?php echo $reference[$i]; ?></span>
        </div>
        <?php } }else{ ?>
        <div class="div-inner-block mb-3">
          <span contenteditable="true" class="font-size-14 reference" placeholder="Reference's content"></span>
        </div>
        <?php } ?>

      </div>
    </div>
    <?php } } ?>
  </div>

</div>