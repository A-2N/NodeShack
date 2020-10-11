<?php
    session_start();
    $user_id = $_SESSION['id']
//TODO fix time
?>
<head>
    <link type="text/css" rel="stylesheet" href="settingsPage.css">
    <link type="text/css" rel="stylesheet" href="style.css">
    
</head>
<body class="body">
    <div class="headerDiv1">
            <h1 class="headerTitle" >NodeShack</h1>
    </div>
    <button class="buttonSettings" id="Return" onclick="window.location.href='home.php'">Return to Home</button>
    <form method="post" id="addClass" action="process/createClass.php">
        <input type="hidden" name="user" value="<?php echo $user_id?>" required>
        <label for="time">Time: </label>
        <input name="time" id="time" type="time" placeholder="time" >
        <label for="link">Zoom Link</label>
        <input type="text" id="link" name="zoom link" required>
        <label for="class">Class Name: </label>
        <input id="class" type="text" name="class" placeholder="Class" required>
        <input type="submit" name="Submit" required>
    </form>
</body>