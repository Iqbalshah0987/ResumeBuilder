<?php

$name = $curr_position = $objective = "";
$gender = $website = $email = $mobile = $address = $linkedin = $github = "";
$image = "";

$skill_title = "";
$skill = $progress_tag = [];
$skill_len = $progress_tag_len = 0;

$exp_title = "";
$exp_pos = $exp_comp = $exp_date = $exp_address = $exp_desc = [];
$exp_len = 0;

$edu_title = "";
$edu_course = $edu_college = $edu_date = $edu_address = $edu_desc = [];
$edu_len = 0;

$activity_title = "";
$activity_org_name = $activity_name = $activity_date = $activity_desc = [];
$activity_len = 0;

$cert_title = "";
$cert_name = $cert_date = [];
$cert_len = 0;

$award_title = "";
$award_name = $award_date = [];
$award_len = 0;

$interest_title = "";
$interest = [];
$interest_len = 0;

$language_title = "";
$language = $dot_value = [];
$language_len = $dot_value_len = 0;

$reference_title = "";
$reference = [];
$reference_len = 0;

$resume_fetch = mysqli_query($db, "SELECT * FROM `user_resumes` WHERE `user_id`='$uid' and `resume_id`='$res_id'");
if (mysqli_num_rows($resume_fetch) > 0) {
    $fetch_data = mysqli_fetch_assoc($resume_fetch);

    $data_pos = explode(',', $fetch_data['block_positions']);
    $hide_block = explode(',', $fetch_data['hide_block_positions']);

    $name = $fetch_data['name'];
    $curr_position = $fetch_data['curr_position'];
    $objective = $fetch_data['objective'];
    
    $gender = $fetch_data['gender'];
    $website = $fetch_data['website'];
    $email = $fetch_data['email'];
    $mobile = $fetch_data['mobile'];
    $address = $fetch_data['address'];
    $linkedin = $fetch_data['linkedin'];
    $github = $fetch_data['github'];

    $image = $fetch_data['image'];

    $skills = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `skills` WHERE `id`={$fetch_data['skill']}"));
    $skill_title = $skills['skill_title'];
    $skill = explode("),(", $skills['skill']);
    $skill_len = sizeof($skill);

    $progress_tag = explode("),(", $skills['progress']);
    $progress_tag_len = sizeof($progress_tag);
    
    $exp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `work_experience` WHERE `id`={$fetch_data['work_exp']}"));
    $exp_title = $exp['work_exp_title'];
    $exp_pos = explode("),(", $exp['position']);
    $exp_comp = explode("),(", $exp['company']);
    $exp_date = explode("),(", $exp['date']);
    $exp_address = explode("),(", $exp['address']);
    $exp_desc = explode("),(", $exp['description']);
    $exp_len = sizeof($exp_pos);
    
    $edu = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `education` WHERE `id`={$fetch_data['education']}"));
    $edu_title = $edu['education_title'];
    $edu_course = explode("),(", $edu['course_name']);
    $edu_college = explode("),(", $edu['college_name']);
    $edu_date = explode("),(", $edu['date']);
    $edu_address = explode("),(", $edu['address']);
    $edu_desc = explode("),(", $edu['description']);
    $edu_len = sizeof($edu_course);
    
    $activities = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `activities` WHERE `id`={$fetch_data['activity']}"));
    $activity_title = $activities['activity_title'];
    $activity_org_name = explode("),(", $activities['org_name']);
    $activity_name = explode("),(", $activities['title']);
    $activity_date = explode("),(", $activities['date']);
    $activity_desc = explode("),(", $activities['description']);
    $activity_len = sizeof($activity_name);
    
    $certificates = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `certificates` WHERE `id`={$fetch_data['certificate']}"));
    $cert_title = $certificates['certificate_title'];
    $cert_name = explode("),(", $certificates['cert_name']);
    $cert_date = explode("),(", $certificates['date']);
    $cert_len = sizeof($cert_name);
    
    $awards = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `awards` WHERE `id`={$fetch_data['award']}"));
    $award_title = $awards['award_title'];
    $award_name = explode("),(", $awards['award_name']);
    $award_date = explode("),(", $awards['date']);
    $award_len = sizeof($award_name);
    
    $interests = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `interests` WHERE `id`={$fetch_data['interest']}"));
    $interest_title = $interests['interest_title'];
    $interest = explode("),(", $interests['interest']);
    $interest_len = sizeof($interest);
    
    $languages = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `languages` WHERE `id`={$fetch_data['language']}"));
    $language_title = $languages['language_title'];
    $language = explode("),(", $languages['language']);
    $language_len = sizeof($language);
    
    $dot_value = explode("),(", $languages['progress']);
    $dot_value_len = sizeof($dot_value);
    
    $references = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `user_references` WHERE `id`={$fetch_data['reference']}"));
    $reference_title = $references['reference_title'];
    $reference = explode("),(", $references['reference']);
    $reference_len = sizeof($reference);
}

?>
