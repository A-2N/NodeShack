<?php
    $id = $_POST['user'];
    $time = $_POST['time'];
    $zoom_link = $_POST['zoom_link'];
    $class_name = $_POST['class'];
    print_r($_POST);
    include '../includes/db_credentials.php';
    $sql = "UPDATE classes SET time = '{$time}', link = '{$zoom_link}', class='{$class_name}' where id='{$id}'";
    mysqli_query($conn,$sql);
    $conn->close();
    header('LOCATION: ../home.php');
