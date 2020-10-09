<?php require_once("header.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Zoomer</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class = "allClassesDiv">
	<script type="text/javascript">

		//This data will be replaced with data from the database.
		//It has to be a list of lists.
		var arrayOfClasses = [["English", "https:zoom.us/english"], ["Math", "https:zoom.us/math"], ["Science", "https:zoom.us/science"], ["History", "https://zoom.us/history"]]

		for (classDict in arrayOfClasses) {
			document.write("<div class='classDiv'> <h1 class='className'>"+arrayOfClasses[classDict][0]+"</h1><a class='classLink'href="+arrayOfClasses[classDict][1]+">"+arrayOfClasses[classDict][1]+"</a> </div>")
		}

	</script>
	</div>

</body>
</html>