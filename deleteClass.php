<?php
session_start();

include 'connection.php';
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM classes where user_id='{$user_id}' ORDER BY time DESC";
$results = mysqli_query($conn, $sql);

?>
<head>
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="settingsPage.css">
</head>
<body class="body">
    <div class="headerDiv1">
            <h1 class="headerTitle" >NodeShack</h1>
    </div>
    <button class="buttonSettings" id="Return" onclick="window.location.href='home.php'">Return to Home</button>
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
    </body>