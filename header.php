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
	<div class="headerDiv">
		<h1 class="headerTitle">Z o o m e r</h1>
		<div class = "headerBarDiv">
            <button class = "signIn" onclick="getInfoFromGoogleClassRoom();">Get Links</button>
		</div>

</body>
</html>
