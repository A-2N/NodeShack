<?php
    include'connection.php';
    $error = "";
    if($_POST['SignUp']??"" == "Sign Up"){
        if(!$_POST['FirstName']){
            $error.='Please Enter Your First Name.<br />';
        }
        if(!$_POST['LastName']){
            $error.='Please Enter Your Last Name.<br />';
        }
        if(!filter_var(($_POST['email']??""),FILTER_VALIDATE_EMAIL)){
            $error.='Please Enter Your Email.<br />';
        }
        if(!$_POST['Password']??""){
            $error.='Please Enter a Password.<br />';
        }
        if(strlen($_POST['Password']??"")<8){
            $error.= 'Please enter a password with atleast 8 characters.<br />';
        }
        if($_POST['ConfirmedPassword']??"" != $_POST['Password']??""){
            $error.='Please Confirm Your Password.<br />';
        }
        if($error){
            echo"There were error(s) in your signup details:<br />".$error;
        }
        else{
            $query = 'INSERT INTO `users` (`First`, `Last`, `Email`, `Password`) VALUES ("'.$FirstName.'", "'. $LastName.'", "'.$Email. '", "'.$Password.'")';
            echo $query;
            //$result = mysqli_query($connection, $query);
            echo 'You\'ve been signed up';
        }
    }
?>