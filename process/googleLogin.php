<?php

    include '../includes/db_credentials.php';
    print_r($_POST);
    if($_POST['googleId']==0){
        header("LOCATION:../login.php?error=google");
    }
    if($_POST['googleId']==null){
        header("LOCATION:../login.php?error=google");
    }

    $sql = "SELECT * FROM users WHERE googlekey = '{$_POST['googleId']}' LIMIT 1";
    $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    print_r($result);
    if ($conn ->query($sql) !== TRUE){
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if($result['googlekey'] == $_POST['googleId']){
        session_start();
        $_SESSION['id'] = $result['id'];
        header("LOCATION: ../home.php");
    }