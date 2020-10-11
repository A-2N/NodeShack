<?php
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="settingsPage.css" />
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <button class="buttonSettings" id="Return" onclick="window.location.href='home.php'">Return to Home</button>
    <title>Settings</title>
</head>
<body>
    <div class="headerDiv">
		<h1 class="headerTitle">NodeShack</h1>
    </div>
    <h1>Settings:</h1>
    <div class="settings" id="settings">
        <button class="buttonSettings" id="update" onclick="window.location.href='deleteClass.php'">Update/Review Classes</button>
        <button class="buttonSettings" id="add" onclick="window.location.href='createClass.php'">Add Classes</button>
        <button class="buttonSettings" id="cal" onclick="window.location.href='googlecal.php'">Sync from Google Calendar</button>
    </div>
</body>
</html>
