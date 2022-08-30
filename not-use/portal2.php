<?php

if(isset($_FILES['avatar']['name'])){
    $user = mysqli_fetch_array(mysqli_query($db,"select * from job_user where id='$uid'"));
    $parts = explode("@", "$user[email]");    
    $username = $parts[0];
    $url = "https://www.jobaaj.com/content/pro/";

    $pro = $_FILES['avatar']['name'];
    $proU = $url.$_FILES['avatar']['name'];

    $proPath = $_FILES['avatar']['tmp_name'];
    if($pro != ''){
        $ext = pathinfo($pro, PATHINFO_EXTENSION);
        // $ext=strtolower(end(explode('.',$_FILES['avatar']['name'])));
        $pro = $username.$uid."_1.".$ext;
        $proU = $url.$pro;
        // if($user['tagline']!=''){
        if(strpos($user['tagline'], '_1') !== false){
            $proU = str_replace("_1","",$user['tagline']);
            $pro = str_replace("_1","",$pro);
            // echo "_1--$pro";
        }
        // echo "--$pro";
        
        // $file = rand(100,1000)."pro-".$userId.$pro;
        // echo "$pro";
        if($_SESSION['j_user']=='employer'){
            if(move_uploaded_file($proPath, "../content/logo/".$pro)){
                // $company = mysqli_fetch_assoc(mysqli_query($db,"select * from job_companies_new where id ='$uid'"));
                // move_uploaded_file($proPath, "../content/pro/".$pro);
                $finaluser  =     mysqli_fetch_array(mysqli_query($db,"select * from job_user where id='$uid'"));
                mysqli_query($db,"update `job_companies_new` set logo = '$pro' where id ='$finaluser[comp_id]' ");
            }
        }
        // else{
            move_uploaded_file($proPath, "../content/pro/".$pro);
        // }
        mysqli_query($db,"update job_user set tagline = 'https://www.jobaaj.com/content/pro/$pro' where id ='$uid' ");

    }else{
        $proU = $_POST['pro_exist'];
    }

    if($_SESSION['j_user']=='employer'){
        echo "content/logo/$pro";
    }else{
        echo "content/pro/$pro";
    }
    // echo "https://www.jobaaj.com/uploads/profile/nishtya6383.png";
}



?>