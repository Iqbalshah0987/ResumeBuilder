




<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="648103258374-c0bt67kmbm6m03f2dmep3rsq5qvd26sc.apps.googleusercontent.com"/>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <script>
        console.log('call before');
        window.gapi.client
        .init({
          clientId:'Your Client ID',
          scope: "email",
          plugin_name:'App Name that you used in google developer console API'
        })
        function onSignIn(googleUser) {
          
          console.log('call After');
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }
    </script>
  </body>
</html> -->


<html>
  <body>
      <script src="https://accounts.google.com/gsi/client" async defer></script>
      <script>
        function handleCredentialResponse(response) {
          console.log("Encoded JWT ID token: " + response.credential);
          // console.log("ID: " + profile.getId());
        }
        window.onload = function () {
          google.accounts.id.initialize({
            client_id: "648103258374-c0bt67kmbm6m03f2dmep3rsq5qvd26sc.apps.googleusercontent.com",
            callback: handleCredentialResponse
          });
          google.accounts.id.renderButton(
            document.getElementById("buttonDiv"),
            { theme: "outline", size: "large" }  // customization attributes
          );
          google.accounts.id.prompt(); // also display the One Tap dialog
        }
    </script>
    <div id="buttonDiv"></div> 
  </body>
</html>