<?php
    include'connection.php';
    $error = "";
    $FirstName = $_POST['FirstName']??'';
    $LastName = $_POST['LastName']??'';
    $Email = $_POST['Email']??'';
    if($_POST['SignUp']??"" == "Sign Up"){
        if(!$_POST['FirstName']??''){
            $error.='Please Enter Your First Name.<br />';
        }
        if(!$_POST['LastName']??''){
            $error.='Please Enter Your Last Name.<br />';
        }
        
        if(!filter_var(($_POST['Email']??''),FILTER_VALIDATE_EMAIL)){
            $error.='Please Enter a valid Email.<br />';
        }
        if(!$_POST['Password']){
            $error.='Please Enter a Password.<br />';
        }
        if(strlen($_POST['Password'])<8){
            $error.= 'Please enter a password with atleast 8 characters.<br />';
        }
        if($_POST['ConfirmedPassword'] != $_POST['Password']??""){
            $error.='Please Confirm Your Password.<br />';
        }
        $Existing = "SELECT email FROM `users` WHERE `email` = ".$Email;
        $result = mysqli_query($connection, $Existing);
        if($result){
            $error.="An account is already associated with that email.  Would you like to log in instead?";
        }
        if($error !=''){
            echo"There were error(s) in your signup details:<br />".$error;
        }
        else{
            $hashedpassword=md5(md5($_POST['Password']??''));
            $query = 'INSERT INTO `users` (`first`, `last`, `email`, `password`) VALUES ("'.$FirstName.'", "'. $LastName.'", "'.$Email. '", "'.$hashedpassword.'")';
            $result = mysqli_query($connection, $query);
            echo 'You\'ve been signed up';
        }
    }
?>