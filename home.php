<?php
    session_start();
    include("header.php");
    include('includes/db_credentials.php');
    $user_id = $_SESSION['id'];

    if(!isset($user_id)){
        $URL="http://localhost:8080/Zoom/signup.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
    $userdata = "SELECT * FROM users WHERE id='{$user_id}'";
    $final = mysqli_fetch_assoc(mysqli_query($conn,$userdata));
    $sql = "SELECT * FROM classes where user_id='{$user_id}' ORDER BY time ASC";
    $results = mysqli_query($conn, $sql);
    $userResult1 = mysqli_query($conn,$userdata);
    $userResults = mysqli_fetch_assoc($userResult1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>NodeShack</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="style.css">

</head>
<body id="body" class="body">
    <div class="container">


        <div class="time" id="welcome">
            <h2>Hello, <?php echo $userResults['First'];?></h2>
            <h2 id="time">Time: </h2>
            <h2 id="date">Date: </h2>
            <script src="scripts/time.js"></script>
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
                    <th>Time</th>

                </tr>

            </thead>
            <tbody>

                    <?php while($row=(mysqli_fetch_assoc($results))):?>
                        <tr>
                            <td><?php echo $row['class'];?></td>
                            <td><a href="<?php echo $row['link'];?>">Link</a></td>
                            <td><?php echo $row['time'];?></td>

                        </tr>
                    <?php endwhile;?>
                    <tr>
                    <td>
                        <h3>Calendar Events:</h3>
                    </td>
                </tr>
                <?php
                    $sql = "SELECT * FROM cal where user_id='{$user_id}'";
                    $results = mysqli_query($conn,$sql);
                   
                ?>
                <?php while($row=(mysqli_fetch_assoc($results))):?>

                    <tr>

                    <td><?php echo $row['class'];?></td>
                    <td><a href="<?php echo $row['link'];?>">Link</a></td>
                    <td><?php echo $row['time'];?></td>
                </tr>
                <?php endwhile;?>

            </tbody>

        </table>
    </div>

</body>
</html>