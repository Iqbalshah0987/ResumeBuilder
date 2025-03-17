<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // setup the facebook sdk
    window.fbAsyncInit = function() {
        FB.init({
            appId: '590475192344227',
            cookie: true,
            xfbml: true,
            version: 'v14.0'
        });

        // FB.AppEvents.logPageView();

        // check login status
        FB.getLoginStatus(function(response) {
    
            if(response.status==='connected'){
                // get user data
                getFbUserData();
            }
            // statusChangeCallback(response);
        });
    };
    


    // response from login status
    // {
    //     status: 'connected',
    //     authResponse: {
    //         accessToken: '...',
    //         expiresIn: '...',
    //         signedRequest: '...',
    //         userID: '...'
    //     }
    // }

    // load the javascript sdk asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));



    function fbLogin(){
        FB.login(function(response){
            console.log("fblogin");

            if(response.authResponse){
                // get and display the user profile data
                getFbUserData();
            }else{
                document.getElementById('status').innerHTML='user cancelled login or did notfully authorized.';
            }
        }, {scope:'email'});
    }


    // fetch the user profile data from facebook
    function getFbUserData(){
        FB.api('/me',{locale:'en_us', fields:'id,name,email,picture'},
        function(response){
            saveUserData(response);
        });
    }

    // save user data to database
    function saveUserData(user_data){
        var fb_id=user_data['id'];
        var fb_name=user_data['name'];
        var fb_email=user_data['email'];
        var fb_picture=user_data['picture']['data']['url'];

        $.ajax({
            url:'user-login.php',
            type:'POST',
            data:{fb_id:fb_id,fb_name:fb_name,fb_email:fb_email,fb_picture:fb_picture},
            success:function(data){
                if(data==1 || data==2){
                    location.href='../index.php';
                }

            }
        });
    }


    // add facebook button
    // function checkLoginState() {
    //     FB.getLoginStatus(function(response) {
    //         statusChangeCallback(response);
    //     });
    // }

    window.onload=function(){
        setTimeout(function(){
            console.log("onload");
            fbLogin();
        },100);
    }
    
</script>

<!-- <button id="login-btn">Login</button> -->
