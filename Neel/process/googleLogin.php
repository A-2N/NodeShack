<?php
    include '..//connection.php';
    print_r($_POST);
    $sql = "SELECT * FROM users WHERE googlekey = '{$_POST['googleId']}' LIMIT 1";
    $result = mysqli_fetch_assoc(mysqli_query($connection,$sql));
    print_r($result);
    if ($connection ->query($sql) !== TRUE){
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
    if(isset($result['googlekey']) == isset($_POST['googleId'])){
        session_start();
        $_SESSION['id'] = $result['id'];
        header("LOCATION: ../home.php");
    }