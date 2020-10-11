<?php
       
        session_start();
        include'connection.php';
        include'login.php';

        $Email = $_POST['Email']??'';
        $Password = md5(md5($_POST['Password']??''));
        $query = 'SELECT * FROM `users` WHERE email = "'.$Email.'" AND password = "'.$Password.'" LIMIT 1';
        $result = mysqli_query($connection, $query);
        $results = mysqli_fetch_array($result);
        if($results){
            $_SESSION['ID'] = $results['ID']??'';
            header("Location:home.php");
           
        }else{
            header("Location:login.php?error=1");
        }
?>