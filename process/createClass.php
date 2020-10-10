<?php
    $user_id = $_POST['user'];
    $time = $_POST['time'];
    $zoom_link = $_POST['zoom_link'];
    $class_name = $_POST['class'];
    print_r($_POST);
    include '../includes/db_credentials.php';
    $sql = "INSERT INTO classes (user_id,time,link,class) VALUES ('{$user_id}','{$time}','{$zoom_link}','{$class_name}')";
    mysqli_query($conn,$sql);
    $conn->close();


    header('LOCATION: ../home.php');

