<?php
    session_start();
    include '../includes/db_credentials.php';

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $GoogleId = $_POST['googleId'];
    //print_r($_POST);

    $sql = "INSERT INTO users (First, Last, googlekey)
                values('{$firstName}','{$lastName}', '{$GoogleId}')";
    if ($conn ->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("LOCATION:../login.php");

