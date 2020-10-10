<?php
        //In header("Location:connection.php");, connection.php is a filler for mainpage.
        session_start();
        include'connection.php';
        include'login.php';

        $Email = $_POST['Email']??'';
        $Password = $_POST['Password']??'';
        $query = 'SELECT * FROM `users` WHERE Email = "'.$Email.'" AND Password = "'.$Password.'" LIMIT 1';
        $result = mysqli_query($connection, $query);
        $results = mysqli_fetch_array($result);
        if($results){
            $_SESSION['ID'] = $results['ID']??'';
            header("Location:connection.php");
           
        }else{
            header("Location:login.php?error=1");
        }
?>