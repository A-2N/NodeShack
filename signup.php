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
<form method="post" name="signup" id="signup" action="process/logLinks.php">
    <input type="hidden" name="googleId" id="google">
    <input type="hidden" name="firstName" id="firstName">
    <input type="hidden" name="lastName" id="lastName">

</form>
<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var id = profile.getId()
        var id_token = googleUser.getAuthResponse().id_token;

        console.log(id_token)
        document.cookie = "user=" + id
        sessionStorage.setItem('id', id_token.toString())
        document.getElementById('google').value = id_token;
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        var firstName = profile.getGivenName();
        var lastName = profile.getFamilyName();
        document.getElementById('firstName').value = firstName;
        document.getElementById('lastName').value = lastName;
        //TODO put on main page or else will loop
        document.signup.submit();
        // Simulate an HTTP redirect:
        //window.location.replace("localhost:8080/Zoom/Home");
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

</html>
