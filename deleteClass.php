<?php
session_start();

include 'includes/db_credentials.php';
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM classes where user_id='{$user_id}' ORDER BY time DESC";
$results = mysqli_query($conn, $sql);

?>

<table>
    <thead>
    <tr>
        <th>Class Name</th>
        <th>Link</th>

    </tr>

    </thead>
    <tbody>

    <?php while($row=(mysqli_fetch_assoc($results))):?>
        <tr>
            <td><?php echo $row['class'];?></td>
            <td><?php echo $row['link'];?></td>
            <td><a href="viewClass.php?id=<?php echo $row['id']?>">Details</a></td>

        </tr>
    <?php endwhile;?>
    </tbody>

</table>
