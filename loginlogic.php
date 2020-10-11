<?php
       
        session_start();
        include 'connection.php';
        include 'login.php';
        print_r($_POST);
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $query = 'SELECT * FROM users WHERE email = "'.$Email.'" AND password = "'.$Password.'" LIMIT 1';
        $result = mysqli_query($conn, $query);
        $results = mysqli_fetch_array($result);
        print_r($results);
        if ($conn ->query($query) !== TRUE){
            echo "Error: " . $query . "<br>" . $conn->error;
        }
        if($results['email']==$Email && $results['password']==$Password){
            $_SESSION['id'] = $results['id']??'';
            echo 'test';
            header("Location:home.php");
           
        }else{
           // header("Location:login.php?error=1");
        }
?>