<?php
    session_start();
    $user_id = $_SESSION['id']
//TODO fix time
?>

<form method="post" action="process/createClass.php">
    <input type="hidden" name="user" value="<?php echo $user_id?>" required>
    <label for="time">Time: </label>
    <input name="time" id="time" type="time" placeholder="time" >
    <label for="link">Zoom Link</label>
    <input type="text" id="link" name="zoom link" required>
    <label for="class">Class Name: </label>
    <input id="class" type="text" name="class" placeholder="class" required>
    <input type="submit" name="Submit" required>
</form>
