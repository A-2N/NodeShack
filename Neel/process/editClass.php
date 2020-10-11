<?php
    session_start();
    include '../connection.php';
    $id = $_GET['id'];
    echo $id;
    $sql = "SELECT * FROM classes WHERE id='{$id}}'";
    $results = mysqli_query($connection,$sql);
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
<form method="post" action="sqlEditClass.php">
    <input type="hidden" name="user" value="<?php echo $id?>" required>
    <label for="time">Time: </label>

    <input name="time" value="<?php echo $row['time']?>" id="time" type="time" placeholder="time" >
    <label for="link">Zoom Link</label>
    <input value="<?php echo $row['link']?>" type="text" id="link" name="zoom link" required>
    <label for="class">Class Name: </label>
    <input value="<?php echo $row['class']?>" id="class" type="text" name="class" placeholder="class" required>
    <input type="submit" name="Submit" required>

</form>
<p>Class Name: <?php echo $row['class']?></p>
<p>Class Time: <?php echo $row['time']?></p>
<p>Zoom Link: <?php echo $row['link']?></p>


</body>
</html>
