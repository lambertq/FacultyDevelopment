<html>
<body>
<head>
<title>Single Search Page</title>
<CENTER>
<h1> Single Search Page </h1>
<?php
	$homeclick = $_POST['PageChange'];
	if ($homeclick == "Faculty Single Search"):
		echo ("Faculty Single Search");
		//insert query that grabs everything from the faculty table
		//fac_query = ("SELECT * FROM Faculty");
		//populate drop down list with all faculty in the database by name
		?><!--end php and start the form for the drop down-->
		<form action = "http://tango.berea.edu/lambertq/FacultyDB/Results/SingleResult.php" method = "post">
		Faculty Member: <select name="select_name">
		<?php
		while($row = $fullq -> fetch_array()){
			echo "<option value='" . $row['pid'] . "'>" . $row['Name'] . "</option>";
		}
		//store user selection in a post operation
		//direct the user to the results page to get their results for their search
		
	elseif ($homeclick == "Activity Single Search"):
		echo ("Activity Single Search");
		//insert query that grabs everything from the activity table
		//act_query = ("SELECT * FROM Activity");
		//populate drop down list with all activities in the database by name
		?><!--end php and start the form for the drop down-->
		<form action = "http://tango.berea.edu/lambertq/FacultyDB/results/SingleResult.php" method = "post">
		Activity: <select name="select_name">
		<?php
		while($row = $fullq -> fetch_array()){
			echo "<option value='" . $row['pid'] . "'>" . $row['Name'] . "</option>";
		}
		//store user selection in a post operation
		//direct the user to the results page to get their results for their search
		
	elseif ($homeclick == "View All Faculty"):
		echo ("All Faculty");
		header('Refresh: 1; URL=http://tango.berea.edu/lambertq/FacultyDB/results/SingleResult.php');
		//insert query that grabs everything from the faculty table
		//direct the user to the results page to display the entire table to the user
		
	elseif ($homeclick == "View All Activities"):
		echo ("All Activies");
		header('Refresh: 1; URL=http://tango.berea.edu/lambertq/FacultyDB/results/SingleResult.php');
		//insert query that grabs everything from the activity table
		//direct the user to the results page to display the entire table to the user
	else:
		echo ("Page not created yet. Still under construction.");
	endif;
?>
</CENTER>
</head>
</body>
</html>