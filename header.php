<?php require_once("process/GetClassRoomLinks.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="531207811184-g1n8qv7apc6ktj3rjlgcs7vq754056nj.apps.googleusercontent.com">
</head>
<body>
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
    }
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }
</script>
	<div class="headerDiv">
		<h1 class="headerTitle">Z o o m e r</h1>
		<div class = "headerBarDiv">
            <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
            <button class = "signIn" onclick="getInfoFromGoogleClassRoom();">Get Links</button>
		</div>

</body>
</html>
