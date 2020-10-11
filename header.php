<?php require_once("process/GetClassRoomLinks.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>



    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="scripts/showSettings.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="531207811184-g1n8qv7apc6ktj3rjlgcs7vq754056nj.apps.googleusercontent.com">
</head>
<body>
	<div class="headerDiv">
		<h1 class="headerTitle">Z o o m e r</h1>

        <div class = "headerBarDiv">
            <button class="signIn" onclick="window.location.href='automated_zoom_links/home.php'">Classroom</button>
            <button class="signIn" onclick="window.location.href='settings.php'">Settings</button>
            <button class ="signIn" name="Sign Out" onclick="window.location.href='process/logout.php'">Sign Out</button>
            <button class = "signIn" onclick="getInfoFromGoogleClassRoom();">Get Links</button>
		</div>

</body>
</html>

