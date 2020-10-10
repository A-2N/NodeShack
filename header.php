<?php require_once("process/GetClassRoomLinks.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var id = profile.getId()
        var id_token = googleUser.getAuthResponse().id_token;

        console.log(id_token)
        document.cookie = "user=" + id
        sessionStorage.setItem('id', id_token.toString())
        document.getElementById('myvalue').value = id_token;
        document.getElementById("myText").innerHTML = id_token;
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
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
			<button class = "signIn" data-onsuccess="onSignIn" onclick="getInfoFromGoogleClassRoom();">Sign In</button>
			<button class = "signIn" onclick="getInfoFromGoogleClassRoom();">Get Links</button>



		</div>

</body>
</html>
