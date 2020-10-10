<?php
session_start();

    include("header.php");
    print_r($_SESSION);
    include 'includes/db_credentials.php';
    $user_id = $_SESSION['id'];

    if(!isset($user_id)){
        $URL="http://localhost:8080/Zoom/signup.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
    $userdata = "SELECT * FROM users WHERE id='{$user_id}'";
    $final = mysqli_fetch_assoc(mysqli_query($conn,$userdata));
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

    <a href="deleteClass.php">Edit/Review Classes</a>

    <a href="createClass.php">Create Class</a>

    <div class="time">


    </div>
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
                <td><a href="<?php echo $row['link'];?>"><?php echo $row['link'];?></a></td>

            </tr>
        <?php endwhile;?>
        </tbody>

    </table>


</body>
</html>
