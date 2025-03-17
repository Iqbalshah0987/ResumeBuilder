<?php

require_once "config.php";

if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
}


if(isset($_POST['name'])){

    $res_id=$_POST['res_id'];
    $block_positions=$_POST['block_positions'];
    $hide_block_positions=$_POST['hide_block_positions'];

    // personal details
    $name=(!empty($_POST['name']))?$_POST['name']:NULL;
    $curr_position=(!empty($_POST['curr_position']))?$_POST['curr_position']:NULL;
    $career_objective=(!empty($_POST['career_objective']))?$_POST['career_objective']:NULL;

    $gender=(!empty($_POST['gender']))?$_POST['gender']:NULL;
    $website=(!empty($_POST['website']))?$_POST['website']:NULL;
    $email=(!empty($_POST['email']))?$_POST['email']:NULL;
    $mobile=(!empty($_POST['mobile']))?$_POST['mobile']:NULL;
    $address=(!empty($_POST['address']))?$_POST['address']:NULL;
    $linkedin=(!empty($_POST['linkedin']))?$_POST['linkedin']:NULL;
    $github=(!empty($_POST['github']))?$_POST['github']:NULL;

    $image=(!empty($_POST['image']))?$_POST['image']:NULL;

    $skill_title=(!empty($_POST['skill_title']))?$_POST['skill_title']:NULL;
    $skill=(!empty($_POST['skill']))?$_POST['skill']:NULL;
    
    $progress_tag=(!empty($_POST['progress_tag']))?$_POST['progress_tag']:NULL;
    $dot_value=(!empty($_POST['dot_value']))?$_POST['dot_value']:NULL;

    $work_exp_title=(!empty($_POST['work_exp_title']))?$_POST['work_exp_title']:NULL;
    $work_exp_pos=(!empty($_POST['work_exp_pos']))?$_POST['work_exp_pos']:NULL;
    $work_exp_comp=(!empty($_POST['work_exp_comp']))?$_POST['work_exp_comp']:NULL;
    $work_exp_date=(!empty($_POST['work_exp_date']))?$_POST['work_exp_date']:NULL;
    $work_exp_address=(!empty($_POST['work_exp_address']))?$_POST['work_exp_address']:NULL;
    $work_exp_desc=(!empty($_POST['work_exp_desc']))?$_POST['work_exp_desc']:NULL;

    $education_title=(!empty($_POST['education_title']))?$_POST['education_title']:NULL;
    $colg_crs_name=(!empty($_POST['colg_crs_name']))?$_POST['colg_crs_name']:NULL;
    $colg_name=(!empty($_POST['colg_name']))?$_POST['colg_name']:NULL;
    $colg_crs_date=(!empty($_POST['colg_crs_date']))?$_POST['colg_crs_date']:NULL;
    $colg_crs_address=(!empty($_POST['colg_crs_address']))?$_POST['colg_crs_address']:NULL;
    $colg_crs_subject=(!empty($_POST['colg_crs_subject']))?$_POST['colg_crs_subject']:NULL;

    $language_title=(!empty($_POST['language_title']))?$_POST['language_title']:NULL;
    $language=(!empty($_POST['language']))?$_POST['language']:NULL;

    $certificate_title=(!empty($_POST['certificate_title']))?$_POST['certificate_title']:NULL;
    $cert_name=(!empty($_POST['cert_name']))?$_POST['cert_name']:NULL;
    $cert_date=(!empty($_POST['cert_date']))?$_POST['cert_date']:NULL;

    $interest_title=(!empty($_POST['interest_title']))?$_POST['interest_title']:NULL;
    $interest=(!empty($_POST['interest']))?$_POST['interest']:NULL;

    $award_title=(!empty($_POST['award_title']))?$_POST['award_title']:NULL;
    $award_name=(!empty($_POST['award_name']))?$_POST['award_name']:NULL;
    $award_date=(!empty($_POST['award_date']))?$_POST['award_date']:NULL;

    $activity_title=(!empty($_POST['activity_title']))?$_POST['activity_title']:NULL;
    $activity_org_name=(!empty($_POST['activity_org_name']))?$_POST['activity_org_name']:NULL;
    $activity_pos_name=(!empty($_POST['activity_pos_name']))?$_POST['activity_pos_name']:NULL;
    $activity_date=(!empty($_POST['activity_date']))?$_POST['activity_date']:NULL;
    $activity_desc=(!empty($_POST['activity_desc']))?$_POST['activity_desc']:NULL;

    $reference_title=(!empty($_POST['reference_title']))?$_POST['reference_title']:NULL;
    $reference=(!empty($_POST['reference']))?$_POST['reference']:NULL;

    $date=date("Y-m-d H:i:s");


    $exist=mysqli_query($db,"SELECT * FROM `user_resumes` WHERE `user_id`='$uid' and `resume_id`='$res_id'");

    if(mysqli_num_rows($exist)>0){

        $result=mysqli_fetch_assoc($exist);

        // for skills
        $q_skill=mysqli_query($db,"UPDATE `skills` SET `skill_title`='$skill_title', `skill`='$skill' ,`progress`='$progress_tag' WHERE `id`=$result[skill]");
        if(!$q_skill){
            echo 1;
        }

        // for work experience
        $q_work_exp=mysqli_query($db,"UPDATE `work_experience` SET `work_exp_title`='$work_exp_title',`position`='$work_exp_pos', `company`='$work_exp_comp', `date`='$work_exp_date', `address`='$work_exp_address', `description`='$work_exp_desc' WHERE `id`=$result[work_exp]");
        if(!$q_work_exp){
            echo 2;
        }

        // for education
        $q_edu=mysqli_query($db,"UPDATE `education` SET `education_title`='$education_title',`course_name`='$colg_crs_name', `college_name`='$colg_name', `date`='$colg_crs_date', `address`='$colg_crs_address',`description`='$colg_crs_subject' WHERE `id`=$result[education]");
        if(!$q_edu){
            echo 3;
        }
        
        // for language
        $q_language=mysqli_query($db,"UPDATE `languages` SET `language_title`='$language_title',`language`='$language', `progress`='$dot_value' WHERE `id`=$result[language]");
        if(!$q_language){
            echo 4;
        }
        
        // for certificate
        $q_certificate=mysqli_query($db,"UPDATE `certificates` SET `certificate_title`='$certificate_title',`cert_name`='$cert_name',`date`='$cert_date' WHERE `id`=$result[certificate]");
        if(!$q_certificate){
            echo 5;
        }
        
        // for interest
        $q_interest=mysqli_query($db,"UPDATE `interests` SET `interest_title`='$interest_title',`interest`='$interest' WHERE `id`=$result[interest]");
        if(!$q_interest){
            echo 6;
        }

        // for award
        $q_award=mysqli_query($db,"UPDATE `awards` SET `award_title`='$award_title',`award_name`='$award_name',`date`='$award_date' WHERE `id`=$result[award]");
        if(!$q_award){
            echo 7;
        }

        // for activity
        $q_activity=mysqli_query($db,"UPDATE `activities` SET `activity_title`='$activity_title',`org_name`='$activity_org_name', `title`='$activity_pos_name', `date`='$activity_date', `description`='$activity_desc' WHERE `id`=$result[activity]");
        if(!$q_activity){
            echo 8;
        }

        // for reference
        $q_reference=mysqli_query($db,"UPDATE `user_references` SET `reference_title`='$reference_title',`reference`='$reference' WHERE `id`=$result[interest]");
        if(!$q_reference){
            echo 9;
        }

        if($result['image']!='person.png'){
            unlink("../img/logo/".$result['image']);
        }

        // for user_resumes
        $q=mysqli_query($db,"UPDATE `user_resumes` SET `name`='$name', `curr_position`='$curr_position', `objective`='$career_objective', `gender`='$gender', `website`='$website', `email`='$email', `mobile`='$mobile', `address`='$address', `linkedin`='$linkedin', `github`='$github', `block_positions`='$block_positions', `hide_block_positions`='$hide_block_positions', `created_at`='$date', `image`='$image' WHERE `user_id`='$uid' and `resume_id`='$res_id'");
        
        if(!$q){
            echo 10;
        }else{
            echo 11;
        }


    }else{

        // for skill
        $q_skill=mysqli_query($db,"INSERT INTO `skills` (`user_id`,`res_id`,`skill_title`,`skill`,`progress`) VALUES ('$uid', '$res_id','$skill_title','$skill','$progress_tag')");
        if($q_skill){
            $q_skill_id=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `skills` WHERE `user_id`='$uid' and `res_id`='$res_id'"));
        }else{
            echo 1;
        }


        // for work experience
        $q_work_exp=mysqli_query($db,"INSERT INTO `work_experience` (`user_id`,`res_id`,`work_exp_title`,`position`,`company`,`date`,`address`,`description`) VALUES ('$uid','$res_id','$work_exp_title','$work_exp_pos','$work_exp_comp','$work_exp_date','$work_exp_address','$work_exp_desc')");
        if($q_work_exp){
            $q_work_exp_id=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `work_experience` WHERE `user_id`='$uid' and `res_id`='$res_id'"));
        }else{
            echo 2;
        }


        // for education
        $q_edu=mysqli_query($db,"INSERT INTO `education` (`user_id`,`res_id`,`education_title`,`course_name`,`college_name`,`date`,`address`,`description`) VALUES ('$uid','$res_id','$education_title','$colg_crs_name','$colg_name','$colg_crs_date','$colg_crs_address','$colg_crs_subject')");
        if($q_edu){
            $q_edu_id=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `education` WHERE `user_id`='$uid' and `res_id`='$res_id'"));
        }else{
            echo 3;
        }


        // for language
        $q_language=mysqli_query($db,"INSERT INTO `languages` (`user_id`,`res_id`,`language_title`,`language`,`progress`) VALUES ('$uid', '$res_id','$language_title','$language','$dot_value')");
        if($q_language){
            $q_language_id=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `languages` WHERE `user_id`='$uid' and `res_id`='$res_id'"));
        }else{
            echo 4;
        }


        // for certificate
        $q_certificate=mysqli_query($db,"INSERT INTO `certificates` (`user_id`,`res_id`,`certificate_title`,`cert_name`,`date`) VALUES ('$uid', '$res_id','$certificate_title','$cert_name','$cert_date')");
        if($q_certificate){
            $q_certificate_id=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `certificates` WHERE `user_id`='$uid' and `res_id`='$res_id'"));
        }else{
            echo 5;
        }


        // for interest
        $q_interest=mysqli_query($db,"INSERT INTO `interests` (`user_id`,`res_id`,`interest_title`,`interest`) VALUES ('$uid', '$res_id','$interest_title','$interest')");
        if($q_interest){
            $q_interest_id=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `interests` WHERE `user_id`='$uid' and `res_id`='$res_id'"));
        }else{
            echo 6;
        }


        // for award
        $q_award=mysqli_query($db,"INSERT INTO `awards` (`user_id`,`res_id`,`award_title`,`award_name`,`date`) VALUES ('$uid', '$res_id','$award_title','$award_name','$award_date')");
        if($q_award){
            $q_award_id=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `awards` WHERE `user_id`='$uid' and `res_id`='$res_id'"));
        }else{
            echo 7;
        }


        // for activity
        $q_activity=mysqli_query($db,"INSERT INTO `activities` (`user_id`,`res_id`,`activity_title`,`org_name`,`title`,`date`,`description`) VALUES ('$uid','$res_id','$activity_title','$activity_org_name','$activity_pos_name','$activity_date','$activity_desc')");
        if($q_activity){
            $q_activity_id=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `activities` WHERE `user_id`='$uid' and `res_id`='$res_id'"));
        }else{
            echo 8;
        }


        // for reference
        $q_reference=mysqli_query($db,"INSERT INTO `user_references` (`user_id`,`res_id`,`reference_title`,`reference`) VALUES ('$uid', '$res_id','$reference_title','$reference')");
        if($q_reference){
            $q_reference_id=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `user_references` WHERE `user_id`='$uid' and `res_id`='$res_id'"));
        }else{
            echo 9;
        }


        // for user_resumes
        $q=mysqli_query($db,"INSERT INTO `user_resumes` (`user_id`,`resume_id`,`name`,`curr_position`,`objective`,`gender`,`website`,`email`,`mobile`,`address`,`linkedin`,`github`,`skill`,`work_exp`,`education`,`activity`,`certificate`,`award`,`interest`,`language`,`reference`,`block_positions`,`hide_block_positions`,`created_at`,`image`) VALUES ('$uid','$res_id','$name','$curr_position','$career_objective','$gender','$website','$email','$mobile','$address','$linkedin','$github','$q_skill_id[id]','$q_work_exp_id[id]','$q_edu_id[id]','$q_activity_id[id]','$q_certificate_id[id]','$q_award_id[id]','$q_interest_id[id]','$q_language_id[id]','$q_reference_id[id]','$block_positions','$hide_block_positions','$date','$image')");

        if(!$q){
            echo 10;
        }else{
            echo 11;
        }

    }

}


if(isset($_GET['delete-resume'])){

    $delete_res_id=$_GET['delete-resume'];

    $delete_fetch=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `user_resumes` WHERE `user_id`='$uid' and `resume_id`='$delete_res_id'"));

    // echo "<pre>";
    // print_r($delete_fetch);
    // echo "</pre>";

    if($delete_fetch['image']!='person.png'){
        unlink("../img/logo/".$delete_fetch['image']);
    }

    $q1=mysqli_query($db,"DELETE FROM `skills` WHERE `id`=$delete_fetch[skill]") or die("skills query not run.");
    $q2=mysqli_query($db,"DELETE FROM `work_experience` WHERE `id`=$delete_fetch[work_exp]") or die("work experience query not run.");
    $q3=mysqli_query($db,"DELETE FROM `education` WHERE `id`=$delete_fetch[education]") or die("education query not run.");
    $q4=mysqli_query($db,"DELETE FROM `activities` WHERE `id`=$delete_fetch[activity]") or die("activity query not run.");
    $q5=mysqli_query($db,"DELETE FROM `certificates` WHERE `id`=$delete_fetch[certificate]") or die("certificate query not run.");
    $q6=mysqli_query($db,"DELETE FROM `awards` WHERE `id`=$delete_fetch[award]") or die("award query not run.");
    $q7=mysqli_query($db,"DELETE FROM `interests` WHERE `id`=$delete_fetch[interest]") or die("interest query not run.");
    $q8=mysqli_query($db,"DELETE FROM `languages` WHERE `id`=$delete_fetch[language]") or die("language query not run.");
    $q9=mysqli_query($db,"DELETE FROM `user_references` WHERE `id`=$delete_fetch[reference]") or die("reference query not run.");
    

    if($q1 && $q2 && $q3 && $q4 && $q5 && $q6 && $q7 && $q8 && $q9){

        $q=mysqli_query($db,"DELETE FROM `user_resumes` WHERE `user_id`='$uid' and `resume_id`='$delete_res_id'");
    }

    if($q){
        echo "<script>location.href='../template/my-resumes.php';</script>";
    }

}


if(isset($_FILES['file-input']['name'])){

    $old_image= $_REQUEST['old-image-file'];

    $filename=$_FILES['file-input']['name'];
    $filetemp=$_FILES['file-input']['tmp_name'];
    // echo $filename;
    $extension=pathinfo($filename,PATHINFO_EXTENSION);
    $new_name=rand().".".$extension;
    $path="../img/logo/".$new_name;

    // upload new image
    $success=move_uploaded_file($filetemp,$path);

    // delete old image
    if($old_image!=''){
        unlink("../img/logo/".$old_image);
    }

    if($success){
        echo $new_name;
    }else{
        echo 'error';
    }


}

?>