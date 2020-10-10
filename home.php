<?php
session_start();

include("header.php");
    include 'includes/db_credentials.php';
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM classes where user_id='{$user_id}' ORDER BY time DESC";
    $results = mysqli_query($conn, $sql);
    //TODO fix time
?>

<!DOCTYPE html>
<html>
<head>
	<title>Zoomer</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="deleteClass.php">Delete Class</a>

    <a href="createClass.php">Create Class</a>


	<div class = "allClassesDiv">
<!--	<script type="text/javascript">-->
<!--        var arrayOfClasses = [["English", "https:zoom.us/english"], ["Math", "https:zoom.us/math"], ["Science", "https:zoom.us/science"], ["History", "https://zoom.us/history"]]-->
<!---->
<!--        for (classDict in arrayOfClasses) {-->
<!--            document.write("<div class='classDiv'> <h1 class='className'>"+arrayOfClasses[classDict][0]+"</h1><a class='classLink'href="+arrayOfClasses[classDict][1]+">"+arrayOfClasses[classDict][1]+"</a> </div>")-->
<!--        }-->
<!---->
<!--        var username = json1["user"]["displayName"];-->
<!--        var email = json1["user"]["emailAddress"];-->
<!--        //here I take the form and put the value as the var values-->
<!--        document.getElementById('email').value = email;//sets values-->
<!--        document.getElementById('displayName').value = username;-->
<!--        document.form.submit();-->
<!---->
<!---->
<!--		//This data will be replaced with data from the database.-->
<!--		//It has to be a list of lists.-->
<!---->
<!--	</script>-->
	</div>
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

            </tr>
        <?php endwhile;?>
        </tbody>

    </table>


</body>
</html>
