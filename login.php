<?php
    $errormsg='';
    if($_GET['error']??'' == 1)
    {
        $errormsg = 'We could not find a user with that email and password.  Please try again.';
    }

?>
<html>
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
    <p><a href="signup.php" target="_blank">Or sign up instead</a></p>
</html>