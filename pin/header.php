<?php
include ($page == 'template') ? "../fun/config.php" : "fun/config.php";
// session_start();

if (isset($_SESSION['uid'])) {

    $user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * from `apna_user` WHERE `id`=$_SESSION[uid]"));
}

// $actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// echo $actual_link;

?>
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0" id="navbar-position-sticky">
    <a href="<?php echo ($page == 'template') ? '../' : ''; ?>index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><sub>Apna</sub>Design</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="<?php echo ($page == 'template') ? '../' : ''; ?>index.php" class="nav-item nav-link <?php echo ($page == 'index') ? 'active' : ''; ?>">Home</a>
            <a href="<?php echo ($page == 'template') ? '../' : ''; ?>about.php" class="nav-item nav-link <?php echo ($page == 'about') ? 'active' : ''; ?>">About</a>

            <a href="<?php echo ($page == 'template') ? '../' : ''; ?>template/<?php echo isset($user['id'])?'my-resumes.php':'all-resumes.php'; ?>" class="nav-link nav-link <?php echo ($page == 'template') ? 'active' : ''; ?>">Resume/CV</a>
           
            <a href="<?php echo ($page == 'template') ? '../' : ''; ?>contact.php" class="nav-item nav-link <?php echo ($page == 'contact') ? 'active' : ''; ?>">Contact</a>

            <?php
            if (isset($user['id'])) {
            ?>
                <div class="dropdown">
                    <a id="profiledropdown" class="nav-item nav-link dropdown-toggle pt-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="" id="full_profile" onerror="this.onerror=null;this.src='<?php echo ($page == 'template') ? '../' : ''; ?>img/logo/avatar.png';" src="" alt="Image Description" style="width:2.5rem;">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profiledropdown" style="right:1px;">
                        <a class="dropdown-item border-bottom bg-light">
                            <h5><?php echo $user['name']; ?></h5>
                            <h6><?php echo $user['email']; ?></h6>
                        </a>
                        <a class="dropdown-item " href="<?php echo ($page == 'template') ? '../' : ''; ?>profile.php">Your Profile</a>
                        <a class="dropdown-item " href="<?php echo ($page == 'template') ? '../' : ''; ?>dashboard.php">Your Resumes</a>
                        <a class="dropdown-item " href="<?php echo ($page == 'template') ? '../' : ''; ?>reset-password.php">Reset Password</a>
                        <a class="dropdown-item " href="<?php echo ($page == 'template') ? '../' : ''; ?>fun/user-logout.php">Logout</a>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <a class="btn btn-primary py-4 px-lg-5 join-button-width" data-bs-toggle="modal" href="#loginSignupModalToggle" role="button">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
            <?php } ?>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- modal for signup and login page -->
<!-- modal 1 -->
<div class="modal fade" id="loginSignupModalToggle" aria-hidden="true" aria-labelledby="loginSignupModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="loginSignupModalToggleLabel">Howdy, Sir !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 py-4 mx-3">
                <p class="mb-4">Use your email or another service to continue (it's free)!</p>
                <div class="row mb-4">
                    <div class="col-12">
                        <a href="<?php echo ($page == 'template') ? '../' : ''; ?>login.php" class="btn btn-lg btn-outline-info width-sm-75 fs-6">Login with email<i class="fa fa-chevron-right ms-3"></i></a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <a href="<?php echo ($page == 'template') ? '../' : ''; ?>signup.php" class="btn btn-lg btn-outline-info width-sm-75 fs-6">Sign Up with email<i class="fa fa-chevron-right ms-3"></i></a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <button class="btn btn-lg btn-dark width-sm-75 fs-6" data-bs-target="#loginButtonModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Continue with Another way<i class="fa fa-chevron-right ms-3"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal 2 -->
<div class="modal fade" id="loginButtonModalToggle" aria-hidden="true" aria-labelledby="loginButtonModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="loginSignupModalToggleLabel">Howdy, Sir !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 py-4 mx-3">
                <p class="mb-4">Use any service to continue with Apna Design (it's free)!</p>
                <!-- login with google -->
                <div class="row mb-4">
                    <div class="col-12">
                        <a href="<?php echo ($page == 'template') ? '../' : ''; ?>fun/login-google.php" class="btn btn-lg width-sm-75 fs-6 shadow" style="color:#dd4b39;"><img src="<?php echo ($page == 'template') ? '../' : ''; ?>img/social-img/social-media/google.svg" class="me-3" align="left" alt="" style="width:24px; height:24px;">Login with Google<i class="fa fa-chevron-right ms-3"></i></a>
                    </div>
                </div>
                <!-- login with facebook -->
                <div class="row mb-4">
                    <div class="col-12">
                        <a href="<?php echo ($page == 'template') ? '../' : ''; ?>fun/login-facebook.php" class="btn btn-lg width-sm-75 fs-6 shadow" style="color:#3B5998;"><img src="<?php echo ($page == 'template') ? '../' : ''; ?>img/social-img/social-media/facebook.svg" class="me-3" align="left" alt="" style="width:24px; height:24px;">Login with Facebook<i class="fa fa-chevron-right ms-3"></i></a>
                    </div>
                </div>
                <!-- login with instagram -->
                <!-- <div class="row mb-4">
                    <div class="col-12">
                        <a href="< ?php echo ($page == 'template') ? '../' : ''; ?>login.php" class="btn btn-lg width-sm-75 fs-6 shadow" style="color:#fb3958;"><img src="< ?php echo ($page == 'template') ? '../' : ''; ?>img/social-img/instagram.svg" class="me-3" align="left" alt="" style="width:24px; height:24px;">Login with Instagram<i class="fa fa-chevron-right ms-3"></i></a>
                    </div>
                </div> -->
                <!-- login with twitter -->
                <!-- <div class="row mb-4">
                    <div class="col-12">
                        <a href="< ?php echo ($page == 'template') ? '../' : ''; ?>login.php" class="btn btn-lg width-sm-75 fs-6 shadow" style="color:#55ACEE;"><img src="< ?php echo ($page == 'template') ? '../' : ''; ?>img/social-img/twitter.svg" class="me-3" align="left" alt="" style="width:24px; height:24px;">Login with Twitter<i class="fa fa-chevron-right ms-3"></i></a>
                    </div>
                </div> -->

                <div class="row mb-4">
                    <div class="col-12">
                        <button class="btn btn-lg btn-dark width-sm-75 fs-6" data-bs-target="#loginSignupModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa fa-chevron-left me-3"></i>Continue with email</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End modal -->