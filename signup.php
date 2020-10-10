<?php
	session_start();
	session_destroy();
    
?>
<html>
    <h1>Sign Up:</h1>
    <?php include"signuplogic.php"; ?>
    <form method="post">
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
</html>
