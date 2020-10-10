<?php
        //In header("Location:connection.php");, connection.php is a filler for mainpage.
        session_start();
        include 'includes/db_credentials.php';
        include'login.php';

        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        print_r($_POST);
        $query = "SELECT * FROM users WHERE Email = '{$Email}' AND Password = '{$Password}' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $results = mysqli_fetch_assoc($result);
    if ($conn ->query($query) !== TRUE){
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    $conn->close();
        print_r($results);
        if($results['password'] == $Password || $Email==$results['email']){
            $_SESSION['id'] = $results['id'];
            header("Location:home.php");
           
        }else{
            echo 'error';
            header("Location:login.php?error=1");
        }
?>