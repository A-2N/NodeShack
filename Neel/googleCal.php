<?php
    session_start();
print_r($_SESSION);

    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Google Calendar Add Class</title>
    <meta charset="utf-8" />
</head>
<body>

<!--Add buttons to initiate auth sequence and sign out-->
<button id="authorize_button" style="display: none;">Authorize</button>
<button id="signout_button" style="display: none;">Sign Out of Google Cal</button>

<pre id="content" style="white-space: pre-wrap;"></pre>

<script src="scripts/googleCal.js"></script>
<form action="process/calInput.php" method="post">
    <input type="hidden" id="text1" name="text1">
    <input type="hidden" name="user" value="<?php echo $_SESSION['id']?>">
    <input type="hidden" id="text2" name="text2">
    <input type="hidden" id="text3" name="text3">
    <input type="hidden" id="text4" name="text4">
    <input type="hidden" id="text5" name="text5">
    <input type="hidden" id="text6" name="text6">
    <input type="submit" name="submit" value="Add To Account">
</form>
<script async defer src="https://apis.google.com/js/api.js"
        onload="this.onload=function(){};handleClientLoad()"
        onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>
</body>
</html>