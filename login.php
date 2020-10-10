<?php
    $errormsg='';
    if($_GET['error']??'' == 1)
    {
        $errormsg = 'We could not find a user with that email and password.  Please try again.';
    }
    if($_GET['error']??'' == "google")
    {
        $errormsg = 'Sign in with google using the blue button.';
    }

?>
<html>
<head>
    <link rel="stylesheet" href="login_signup.css" />
    <title>Login</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="531207811184-g1n8qv7apc6ktj3rjlgcs7vq754056nj.apps.googleusercontent.com">
</head>
<script src="scripts/googleLogin.js"></script>
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
    <input type="hidden" name="googleId" id="google" value="0">
    <input type="hidden" name="firstName" id="firstName">
    <input type="hidden" name="lastName" id="lastName">
    <input type="hidden" name="email" id="email">
    <input type="hidden" name="confirm" value="0" id="test"">
    <input type="submit" name="google" value="Sign In with Google" >
</form>
<p><a href="signup.php" target="_blank">Or sign up instead</a></p>
</html>