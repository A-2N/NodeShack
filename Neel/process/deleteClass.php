<?php
    include "connection.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM classes WHERE id='{$id}'";
        mysqli_query($conn, $sql);
        $conn ->close();
    }

    //header("LOCATION:tasks.php");