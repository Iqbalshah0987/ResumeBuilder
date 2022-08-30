<?php
//initialize facebook sdk
require '../vendor/autoload.php';
include "config.php";

$fb = new Facebook\Facebook([
    'app_id' => '528976668968090',
    'app_secret' => '7ccde87e6e79d197082f837b3346c407',
    'default_graph_version' => 'v5.1',
]);

$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if (isset($_GET['code'])) {
    if (isset($_SESSION['access_token'])) {
        $access_token = $_SESSION['access_token'];
    } else {
        $access_token = $facebook_helper->getAccessToken();

        $_SESSION['access_token'] = $access_token;

        $facebook->setDefaultAccessToken($_SESSION['access_token']);
    }

    $_SESSION['user_id'] = '';
    $_SESSION['user_name'] = '';
    $_SESSION['user_email_address'] = '';
    $_SESSION['user_image'] = '';

    $graph_response = $facebook->get("/me?fields=name,email", $access_token);

    $facebook_user_info = $graph_response->getGraphUser();

    if (!empty($facebook_user_info['id'])) {
        $_SESSION['user_image'] = 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture';
    }

    if (!empty($facebook_user_info['name'])) {
        $_SESSION['user_name'] = $facebook_user_info['name'];
    }

    if (!empty($facebook_user_info['email'])) {
        $_SESSION['user_email_address'] = $facebook_user_info['email'];
    }
} else {
    // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost:1234/phpDataFiles/templateProject/fun/login-facebook.php', $facebook_permissions);

    // Render Facebook login button
?>
    <a id="login-btn" href="<?php echo $login_url; ?>">Login</a>

<?php
}
?>