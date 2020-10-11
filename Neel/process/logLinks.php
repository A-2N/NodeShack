<?php
    $servername = "localhost";
    $username = "neel";
    $password = "test";
    $database_name = "zoom";

    print_r($_POST);
    //create connection
    $connection = mysqli_connect($servername, $username, $password, $database_name);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];


    $sql = "INSERT INTO users (First, email, Last)
                values('{$firstName}', '{$email}','{$lastName}')";

    if ($conn ->query($sql) !== TRUE){
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("LOCATION:../login.php");
