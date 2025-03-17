<?php
require 'vendor/autoload.php';

include "config.php";

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('648103258374-c0bt67kmbm6m03f2dmep3rsq5qvd26sc.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost:1234/phpDataFiles/templateProject/fun/login-google.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


if(isset($_GET['code'])){

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = mysqli_real_escape_string($db, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($db, "SELECT * FROM `apna_user` WHERE `email`='$email'");
        if(mysqli_num_rows($get_user) > 0){

            $data=mysqli_fetch_assoc($get_user);

            $_SESSION['uid'] = $data['id']; 
            $_SESSION['uname'] = $data['name']; 
            $_SESSION['umail'] = $data['email']; 
            $_SESSION['umob'] = $data['mobile'];

            header('Location: ../index.php');
            exit;

        }
        else{
            $date=date("Y-m-d H:i:s");
            // if user not exists we will insert the user
            $insert = mysqli_query($db, "INSERT INTO `apna_user`(`name`,`email`,`mobile`,`password`,`auth_provider_id`,`auth_provider_name`,`logo`,`created_at`) VALUES('$full_name','$email',NULL,NULL,'$id','google','$profile_pic','$date')");

            if($insert){

                $data=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `apna_user` WHERE `email`='$email'"));

                $_SESSION['uid'] = $data['id']; 
                $_SESSION['uname'] = $data['name']; 
                $_SESSION['umail'] = $data['email']; 
                $_SESSION['umob'] = $data['mobile']; 
                header('Location: ../index.php');

                exit;
            }
            else{
                header('Location: ../404.php');
            }

        }

    }
    else{
        header('Location: ../login.php');
        exit;
    }
}  
else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="0; url=<?php echo $client->createAuthUrl(); ?>">
    <title>Document</title>
</head>
<body>
    
    <!-- <a id="login-btn" href="< ?php echo $client->createAuthUrl(); ?>">Login</a> -->
</body>
</html>
    
<?php } ?>