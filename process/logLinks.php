<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "zoom";

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $database_name);
    $username = $_POST['displayName'];
    $email = $_POST['email'];
    $sql = "INSERT INTO users (First, email)
                values('{$username}', '{$email}')";

    if ($conn ->query($sql) !== TRUE){
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();