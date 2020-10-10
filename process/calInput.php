<?php
session_start();
    $user_id = $_POST['user'];
    $text = $_POST['text1'];
    $explode = explode(",",$text);
    $class_name = $explode['0'];
    $zoom_link = $explode['1'];
    $time = $explode['2'];
    echo $time;
    print_r($_POST);
    include '../includes/db_credentials.php';
    $sql = "INSERT INTO cal (user_id,time,link,class) VALUES ('{$user_id}','{$time}','{$zoom_link}','{$class_name}')";
    mysqli_query($conn,$sql);
    $conn->close();


    //header('LOCATION: ../home.php');

