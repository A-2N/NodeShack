<?php
    $errormsg='';
    if($_GET['error']??'' == 1)
    {
        $errormsg = 'We could not find a user with that email and password.  Please try again.';
    }

?>
<html>
<head>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="531207811184-g1n8qv7apc6ktj3rjlgcs7vq754056nj.apps.googleusercontent.com">
</head>
<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var id = profile.getId()
        var id_token = googleUser.getAuthResponse().id_token;
        console.log(id)
        console.log(id_token)
        sessionStorage.setItem('id', id_token.toString())
        //console.log('Given Name: ' + profile.getGivenName());
        //console.log('Family Name: ' + profile.getFamilyName());
        var email = profile.getEmail();
        var firstName = profile.getGivenName();
        var lastName = profile.getFamilyName();
        document.getElementById('firstName').value = firstName;
        document.getElementById('lastName').value = lastName;
        document.getElementById('email').value = email;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'https://yourbackend.example.com/tokensignin');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            console.log('Signed in as: ' + xhr.responseText);
        };
        xhr.send('idtoken=' + id_token);
        document.getElementById('google').value = id;


    }
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }</script>
    <h1>Login:</h1>
    <span style="color: red; "><?php echo $errormsg; ?></span>
    <form method="post" action="loginlogic.php">
        <label for="email" >Email:</label>
        <input type=email name="Email"  " />
        <br />
        <label for="password" >Password:</label>
        <input type=password name="Password"  " />
        <br />
        <input type=submit name="Login" value="Login" />  
    </form>

<h1>Sign In with google:</h1>
<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
<br>
<form method="post" name="signup" id="signup" action="process/googleLogin.php">
    <input type="hidden" name="googleId" id="google">
    <input type="hidden" name="firstName" id="firstName">
    <input type="hidden" name="lastName" id="lastName">
    <input type="hidden" name="email" id="email">
    <input type="submit" name="google" value="Sign In with Google" >
</form>
<p><a href="signup.php" target="_blank">Or sign up instead</a></p>
</html>