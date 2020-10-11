<?php
    session_start();
    include '..//connection.php';

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $GoogleId = $_POST['googleId'];
    //print_r($_POST);

    $sql = "INSERT INTO users (First, Last, googlekey)
                values('{$firstName}','{$lastName}', '{$GoogleId}')";
    if ($connection ->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
    header("LOCATION:../login.php");

