<?php
	session_start();
	session_destroy();
    
?>
<html>
<head>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="531207811184-g1n8qv7apc6ktj3rjlgcs7vq754056nj.apps.googleusercontent.com">
</head>
    <h1>Sign Up:</h1>
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
    <?php include"signuplogic.php"; ?>
    <form method="post" action="signup.php">
        <label for="First" >First Name:</label>
        <input type=text name="FirstName" id="First" value="<?php $_POST['FirstName']??'' ?>" />
        <br />
        <label for="Last" >Last Name:</label>
        <input type=text name="LastName" id="Last" value="<?php $_POST['LastName']??''; ?>" />
        <br />
        <label for="email" >Email:</label>
        <input type=email name="Email" value="<?php $_POST['Email']??''; ?>" />
        <br />
        <label for="password" >Password:</label>
        <input type=password name="Password" value="<?php $_POST['Password']??''; ?>" />
        <br />
        <label for="confirmpassword" >Confirm Password:</label>
        <input type=password name="ConfirmedPassword" value="<?php $_POST['ConfirmedPassword']??''; ?>" />
        <br />
        <input type=submit name="SignUp" value="Sign Up" />
    </form>

<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

<h1>Sign In with google:</h1>
<form method="post" name="signup" id="signup" action="process/googleSignup.php">
    <input type="hidden" name="googleId" id="google">
    <input type="hidden" name="firstName" id="firstName">
    <input type="hidden" name="lastName" id="lastName">
    <input type="hidden" name="email" id="email">
    <input type="submit" name="google" value="Sign In with Google" >
</form>
</html>
