<?php
    include '../includes/db_credentials.php';
    $id = $_GET['id'];
    echo $id;
    $sql = "SELECT * FROM classes WHERE id='{$id}}'";
    $results = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($results);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>Class Name: <?php echo $row['class']?></p>
<p>Class Time: <?php echo $row['time']?></p>
<p>Zoom Link: <?php echo $row['link']?></p>


</body>
</html>
