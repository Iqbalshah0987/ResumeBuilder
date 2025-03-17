<?php
include "config.php";

if(isset($_POST['block_order'])){
    $_SESSION['block_order'] = $_POST['block_order'];
    $_SESSION['hide_block_order'] = $_POST['hide_block_order'];

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['curr_position'] = $_POST['curr_position'];
    $_SESSION['career_objective'] = $_POST['career_objective'];

    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['website'] = $_POST['website'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['mobile'] = $_POST['mobile'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['linkedin'] = $_POST['linkedin'];
    $_SESSION['github'] = $_POST['github'];
    
    $_SESSION['image'] = $_POST['image'];

    $_SESSION['skill_title'] = $_POST['skill_title'];
    $_SESSION['skill'] = $_POST['skill'];

    $_SESSION['progress_tag'] = $_POST['progress_tag'];
    $_SESSION['dot_value'] = $_POST['dot_value'];

    $_SESSION['work_exp_title'] = $_POST['work_exp_title'];
    $_SESSION['work_exp_pos'] = $_POST['work_exp_pos'];
    $_SESSION['work_exp_comp'] = $_POST['work_exp_comp'];
    $_SESSION['work_exp_date'] = $_POST['work_exp_date'];
    $_SESSION['work_exp_address'] = $_POST['work_exp_address'];
    $_SESSION['work_exp_desc'] = $_POST['work_exp_desc'];

    $_SESSION['education_title'] = $_POST['education_title'];
    $_SESSION['colg_crs_name'] = $_POST['colg_crs_name'];
    $_SESSION['colg_name'] = $_POST['colg_name'];
    $_SESSION['colg_crs_date'] = $_POST['colg_crs_date'];
    $_SESSION['colg_crs_address'] = $_POST['colg_crs_address'];
    $_SESSION['colg_crs_subject'] = $_POST['colg_crs_subject'];

    $_SESSION['language_title'] = $_POST['language_title'];
    $_SESSION['language'] = $_POST['language'];

    $_SESSION['certificate_title'] = $_POST['certificate_title'];
    $_SESSION['cert_name'] = $_POST['cert_name'];
    $_SESSION['cert_date'] = $_POST['cert_date'];

    $_SESSION['interest_title'] = $_POST['interest_title'];
    $_SESSION['interest'] = $_POST['interest'];

    $_SESSION['award_title'] = $_POST['award_title'];
    $_SESSION['award_name'] = $_POST['award_name'];
    $_SESSION['award_date'] = $_POST['award_date'];

    $_SESSION['activity_title'] = $_POST['activity_title'];
    $_SESSION['activity_org_name'] = $_POST['activity_org_name'];
    $_SESSION['activity_pos_name'] = $_POST['activity_pos_name'];
    $_SESSION['activity_date'] = $_POST['activity_date'];
    $_SESSION['activity_desc'] = $_POST['activity_desc'];

    $_SESSION['reference_title'] = $_POST['reference_title'];
    $_SESSION['reference'] = $_POST['reference'];
}




if(isset($_POST['clear_variables'])){

    unset(
        $_SESSION['block_order'],
        $_SESSION['hide_block_order'],

        $_SESSION['name'],
        $_SESSION['curr_position'],
        $_SESSION['career_objective'],

        $_SESSION['gender'],
        $_SESSION['website'],
        $_SESSION['email'],
        $_SESSION['mobile'],
        $_SESSION['address'],
        $_SESSION['linkedin'],
        $_SESSION['github'],

        $_SESSION['image'],

        $_SESSION['skill_title'],
        $_SESSION['skill'],

        $_SESSION['progress_tag'],
        $_SESSION['dot_value'],

        $_SESSION['work_exp_title'],
        $_SESSION['work_exp_pos'],
        $_SESSION['work_exp_comp'],
        $_SESSION['work_exp_date'],
        $_SESSION['work_exp_address'],
        $_SESSION['work_exp_desc'],

        $_SESSION['education_title'],
        $_SESSION['colg_crs_name'],
        $_SESSION['colg_name'],
        $_SESSION['colg_crs_date'],
        $_SESSION['colg_crs_address'],
        $_SESSION['colg_crs_subject'],

        $_SESSION['language_title'],
        $_SESSION['language'],

        $_SESSION['certificate_title'],
        $_SESSION['cert_name'],
        $_SESSION['cert_date'],

        $_SESSION['interest_title'],
        $_SESSION['interest'],

        $_SESSION['award_title'],
        $_SESSION['award_name'],
        $_SESSION['award_date'],

        $_SESSION['activity_title'],
        $_SESSION['activity_org_name'],
        $_SESSION['activity_pos_name'],
        $_SESSION['activity_date'],
        $_SESSION['activity_desc'],

        $_SESSION['reference_title'],
        $_SESSION['reference']
    );

    echo 1;

}


?>