<?php

if(isset($_SESSION['block_order']) && isset($_SESSION['hide_block_order'])){

    $data_pos=explode(",",$_SESSION['block_order']);
    $hide_block=explode(",",$_SESSION['hide_block_order']);

    $name=$_SESSION['name'];
    $curr_position=$_SESSION['curr_position'];
    $objective=$_SESSION['career_objective'];
    
    $gender=$_SESSION['gender'];
    $website=$_SESSION['website'];
    $email=$_SESSION['email'];
    $mobile=$_SESSION['mobile'];
    $address=$_SESSION['address'];
    $linkedin=$_SESSION['linkedin'];
    $github=$_SESSION['github'];
    
    $image=$_SESSION['image'];

    $skill_title=$_SESSION['skill_title'];
    $skill=explode("),(",$_SESSION['skill']);
    $skill_len=sizeof($skill);
    
    $progress_tag=explode("),(",$_SESSION['progress_tag']);
    $progress_tag_len=sizeof($progress_tag);
    
    $dot_value=explode("),(",$_SESSION['dot_value']);
    $dot_value_len=sizeof($dot_value);



    $exp_title=$_SESSION['work_exp_title'];
    $exp_pos=explode("),(",$_SESSION['work_exp_pos']);
    $exp_comp=explode("),(",$_SESSION['work_exp_comp']);
    $exp_date=explode("),(",$_SESSION['work_exp_date']);
    $exp_address=explode("),(",$_SESSION['work_exp_address']);
    $exp_desc=explode("),(",$_SESSION['work_exp_desc']);
    $exp_len=sizeof($exp_pos);


    $edu_title=$_SESSION['education_title'];
    $edu_course=explode("),(",$_SESSION['colg_crs_name']);
    $edu_college=explode("),(",$_SESSION['colg_name']);
    $edu_date=explode("),(",$_SESSION['colg_crs_date']);
    $edu_address=explode("),(",$_SESSION['colg_crs_address']);
    $edu_desc=explode("),(",$_SESSION['colg_crs_subject']);
    $edu_len=sizeof($edu_course);
    
    $activity_title=$_SESSION['activity_title'];
    $activity_org_name=explode("),(",$_SESSION['activity_org_name']);
    $activity_name=explode("),(",$_SESSION['activity_pos_name']);
    $activity_date=explode("),(",$_SESSION['activity_date']);
    $activity_desc=explode("),(",$_SESSION['activity_desc']);
    $activity_len=sizeof($activity_name);

    $cert_title=$_SESSION['certificate_title'];
    $cert_name=explode("),(",$_SESSION['cert_name']);
    $cert_date=explode("),(",$_SESSION['cert_date']);
    $cert_len=sizeof($cert_name);


    $award_title=$_SESSION['award_title'];
    $award_name=explode("),(",$_SESSION['award_name']);
    $award_date=explode("),(",$_SESSION['award_date']);
    $award_len=sizeof($award_name);


    $interest_title=$_SESSION['interest_title'];
    $interest=explode("),(",$_SESSION['interest']);
    $interest_len=sizeof($interest);
    
    $language_title=$_SESSION['language_title'];
    $language=explode("),(",$_SESSION['language']);
    $language_len=sizeof($language);
    

    $reference_title=$_SESSION['reference_title'];
    $reference=explode("),(",$_SESSION['reference']);
    $reference_len=sizeof($reference);
}


?>