<?php

require_once "config.php";

if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
}

// for signup
if(isset($_POST['semail'])){

    $name=mysqli_real_escape_string($db,$_POST['sname']);
    $email=mysqli_real_escape_string($db,$_POST['semail']);
    $mob=mysqli_real_escape_string($db,$_POST['smobile']);
    $pass=mysqli_real_escape_string($db,$_POST['spassword']);
    $date=date("Y-m-d H:i:s");
    // password hash
    $password = password_hash($pass, PASSWORD_BCRYPT);

    // echo ($name." ".$email." ".$mob." ".$pass);
    $already=mysqli_query($db,"SELECT * FROM `apna_user` WHERE `email`='$email'") or die("select query not run.");
    if(mysqli_num_rows($already)>0){
        echo 1;
    }else{ 

        $add=mysqli_query($db,"INSERT INTO `apna_user` (`name`,`email`,`mobile`,`password`,`auth_provider_id`,`auth_provider_name`,`created_at`) VALUES ('$name','$email','$mob','$password',NULL,'email','$date')") or die("insert query not run.");
        if($add){
            $_SESSION['new_user_time']=time();
            echo 2;
        }

    }
}

// for login
if(isset($_POST['lemail'])){
    
    $email=mysqli_real_escape_string($db,$_POST['lemail']);
    $pass=mysqli_real_escape_string($db,$_POST['lpassword']);

    $login_query=mysqli_query($db,"SELECT * FROM `apna_user` WHERE `email`='$email'");

    if(mysqli_num_rows($login_query)==1){
        
        $data=mysqli_fetch_assoc($login_query);

        $match = password_verify($pass, $data['password']);
        if($match){
            $_SESSION['uid']=$data['id'];
            $_SESSION['uname']=$data['name'];
            $_SESSION['umail']=$data['email'];

            if(isset($_SESSION['url'])){
                echo $_SESSION['url'];
            }else{
                echo 1;
            }
        }else{
            echo 2;
        }
    }else{
        echo 3;
    }
}


// reset password
if(isset($_POST['rcpassword'])){

    $cpass=mysqli_real_escape_string($db,$_POST['rcpassword']);
    $npass=mysqli_real_escape_string($db,$_POST['rnpassword']);

    $reset_query=mysqli_query($db,"SELECT * FROM `apna_user` WHERE `id`=$uid");

    if(mysqli_num_rows($reset_query)==1){

        $data=mysqli_fetch_assoc($reset_query);

        $match = password_verify($cpass, $data['password']);

        if($match){

            $password = password_hash($npass, PASSWORD_BCRYPT);

            mysqli_query($db,"UPDATE `apna_user` SET `password`='$password' WHERE `id`=$uid");
            echo 1;

        }else{
            echo 2;
        }

    }
}


if(isset($_POST['fb_email'])){

    $fb_id=mysqli_real_escape_string($db,$_POST['fb_id']);
    $fb_provider=mysqli_real_escape_string($db,'facebook');
    $name=mysqli_real_escape_string($db,$_POST['fb_name']);
    $email=mysqli_real_escape_string($db,$_POST['fb_email']);
    $picture=mysqli_real_escape_string($db,$_POST['fb_picture']);
    $date=date("Y-m-d H:i:s");

    // checking user already exists or not
    $get_user = mysqli_query($db, "SELECT * FROM `apna_user` WHERE `email`='$email'");
    if(mysqli_num_rows($get_user) > 0){

        $data=mysqli_fetch_assoc($get_user);

        $_SESSION['uid'] = $data['id']; 
        $_SESSION['username'] = $data['name']; 
        $_SESSION['usermail'] = $data['email']; 

        echo 1;
        // header('Location: ../index.php');
        // exit;

    }
    else{
        // if user not exists we will insert the user
        $insert = mysqli_query($db, "INSERT INTO `apna_user`(`name`,`email`,`mobile`,`password`,`auth_provider_id`,`auth_provider_name`,`logo`,`created_at`) VALUES('$name','$email',NULL,NULL,'$fb_id','$fb_provider','$picture','$date')");

        if($insert){

            $data=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `apna_user` WHERE `email`='$email'"));

            $_SESSION['uid'] = $data['id']; 
            $_SESSION['uname'] = $data['name']; 
            $_SESSION['umail'] = $data['email']; 
            echo 2;
            // header('Location: ../index.php');
            // exit;
        }
        else{
            header('Location: ../404.php');
        }

    }

}




?>