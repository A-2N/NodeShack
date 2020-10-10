<?php require_once("header.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Zoomer</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class = "allClassesDiv">

<!-- 	<p id="userName"></p> -->


	<script type="text/javascript">

		//var name = "Avani";

		//document.getElementById("demo").innerHTML = name;
		//This data will be replaced with data from the database.
		//It has to be a list of lists.
		//var arrayOfClasses = [["English", "https:zoom.us/english"], ["Math", "https:zoom.us/math"], ["Science", "https:zoom.us/science"], ["History", "https://zoom.us/history"]]

		 
		 var finalCourseDetailsWithMeetingLinksList = JSON.parse(localStorage.getItem('finalCourseDetailsWithMeetingLinksList'));

		 // console.log("From Home PHP");
		 // console.log(localStorage);



	  //   		console.log("IIIII");
	  //   		console.log(finalCourseDetailsWithMeetingLinksList);
	  //   		console.log(typeof finalCourseDetailsWithMeetingLinksList);


	  		for (classDict in finalCourseDetailsWithMeetingLinksList) {
			 	var link = ""

			 	if (finalCourseDetailsWithMeetingLinksList[classDict][1] == "no link found") {

			 		console.log("I am in if block");

			 		document.write("<div class='classDiv'> <h1 class='className'>"+finalCourseDetailsWithMeetingLinksList[classDict][0]+"</h1><h2 class='classLink'>"+"No link found"+"</h2></div>");

			 		//link = "<h2 class='noLink'>"+no link found+"</h2>"
			 	} else {


			 		console.log("I am in else block");

			 		document.write("<div class='classDiv'> <h1 class='className'>"+finalCourseDetailsWithMeetingLinksList[classDict][0]+"</h1><a class='classLink'href="+finalCourseDetailsWithMeetingLinksList[classDict][1]+">"+finalCourseDetailsWithMeetingLinksList[classDict][1]+"</a> </div>");
			 	}
	     	}

	    	
			 // for (classDict in finalCourseDetailsWithMeetingLinksList) {
			 // 	console.log("what is classDict");
			 // 	console.log(classDict);
			 // 	var link = ""
			 // 	console.log(finalCourseDetailsWithMeetingLinksList[classDict][1])
			 // 	console.log(typeof finalCourseDetailsWithMeetingLinksList[classDict][1])

			 // 	if (finalCourseDetailsWithMeetingLinksList[classDict][1] == "no link found") {
			 // 		//link = "<h2 class='noLink'>"+no link found+"</h2>"
			 // 	} else {
			 // 		link = "<a class='classLink'href="+finalCourseDetailsWithMeetingLinksList[classDict][1]+">"+finalCourseDetailsWithMeetingLinksList[classDict][1]+"</a>"
			 // 	}

	   //    		document.write("<div class='classDiv'> <h1 class='className'>"+finalCourseDetailsWithMeetingLinksList[classDict][0]+"</h1>"+link+"</div>")
	   //   	}    		
	    		
	    		//if (classDict/2) === 0 {
	    			// document.write("<div class='classDiv'> <h1 class='className'>"+finalCourseDetailsWithMeetingLinksList[classDict][0]+"</h1><a class='classLink'href="+finalCourseDetailsWithMeetingLinksList[classDict][1]+">"+finalCourseDetailsWithMeetingLinksList[classDict][1]+"</a> </div>")
	    			// document.write("<div class='classDiv'> <h1 class='className'>"+finalCourseDetailsWithMeetingLinksList[classDict+1][0]+"</h1><a class='classLink'href="+finalCourseDetailsWithMeetingLinksList[classDict+1][1]+">"+finalCourseDetailsWithMeetingLinksList[classDict+1][1]+"</a> </div>")
	    		//}
	    		
	    	
		
	</script>
	</div>

</body>
</html>