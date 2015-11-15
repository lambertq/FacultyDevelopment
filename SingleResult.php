<?php
$link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
or die(mysql_connect_error("Connection Failed"));
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://www.higheredjobs.com/images/AccountImages/4698_1.jpg">

    <title>Faculty Tracking</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>

    <div class="containresult">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="homestyles.php">Home</a></li>
            <!--<li role="presentation"><a href="#">About</a></li>-->
            <!--<li role="presentation"><a href="#">Contact</a></li>-->
          </ul>
        </nav>
        <h3 class="text-muted">Faculty Development</h3>
      </div>
<CENTER>
<<<<<<< HEAD
	<h1>Result Page</h1>
      <div class="jumbotron">
        <p class="lead">
		<table border=1><tbody>

		<?php
//==============================================================================================================================================//
//			
//==============================================================================================================================================//	
		$numresults = 0;
		error_reporting(0);
		if (isset($_POST['fsel'])){
			$profid = $_POST['fsel'];
			////////////////////////////////////////////////////////////////////////////////
			$query = $link -> query("SELECT * FROM faculty, gender_T, status_T, rank_T, ethnicity_T
										 WHERE faculty.ethnicity = ethnicity_T.ethnicityID
										 AND faculty.gender = gender_T.genderID
										 AND faculty.status = status_T.statusID
										 AND faculty.rank = rank_T.rankID
										 AND faculty.bnumber = '$profid'");
			////////////////////////////////////////////////////////////////////////////////
			if ($query -> num_rows !=0){
				echo("<tr><th> BNumber </th><th> Title </th><th> First Name </th>
					  <th> MI </th><th> Last Name </th><th> Email </th><th> CPO </th>
					  <th> Ethinicity </th><th> Gender </th><th> Status </th><th> Rank </th></tr>");
				while($row = $query -> fetch_array()){
					$bnum = $row['bnumber'];
					$title = $row['title'];
					$fname = $row['firstname'];
					$mi = $row['mi'];
					$lname = $row['lastname'];
					$email = $row['email'];
					$cpo = $row['cpo'];
					$ethnicity = $row['ename'];
					$gender = $row['gname'];
					$status = $row['sname'];
					$rank = $row['rname'];
					echo "<tr><th>".$bnum."</th><th>".$title."</th><th>".$fname."</th><th>".$mi."</th>
					<th>".$lname."</th><th>".$email."</th><th>".$cpo."</th><th>".$ethnicity."</th>
					<th>".$gender."</th><th>".$status."</th><th>".$rank."</th></tr>\n";
				}
			}
		}
//==============================================================================================================================================//
//			
//==============================================================================================================================================//	
		elseif (isset($_POST['asel'])){
			$actID = $_POST['asel'];
			////////////////////////////////////////////////////////////////////////////////
			$query = $link -> query("SELECT * FROM Activities_t, location_t, type_t, goal_t 
										WHERE Activities_t.Location = location_t.ID
										AND Activities_t.Type = type_t.ID
										AND Activities_t.Goal = goal_t.ID
										AND Activities_t.ID = '$actID'");
			////////////////////////////////////////////////////////////////////////////////
			if ($query -> num_rows !=0){
				echo("<tr><th>Title</th><th>Date</th><th>Location</th>
					  <th>Type</th><th>Goal</th><th>Description</th><th>Narrative</th></tr>");
				while($row = $query -> fetch_array()){
					$title = $row['Title'];
					$date = $row['Date'];
					$location = $row['name'];
					$type = $row['t_name'];
					$goal = $row['g_name'];
					$description = $row['Description'];
					$narrative = $row['Narrative'];
					echo ("<tr><th>".$title."</th><th>".$date."</th><th>".$location."</th><th>".$type."</th>
					<th>".$goal."</th><th>".$description."</th><th>".$narrative."</th></tr>\n");
				}
			}
		}
//==============================================================================================================================================//
//			
//==============================================================================================================================================//			
		elseif (isset($_POST['PageChange'])){//checks if from homepage 
			$homeclick = $_POST['PageChange'];//pulls a variable to see if from the home page
			if ($homeclick == "View All Activities"){
				////////////////////////////////////////////////////////////////////////////////
				$query = $link -> query("SELECT * FROM Activities_t, location_t, type_t, goal_t 
											WHERE Activities_t.Location = location_t.ID
											AND Activities_t.Type = type_t.ID
											AND Activities_t.Goal = goal_t.ID");
				////////////////////////////////////////////////////////////////////////////////
				if ($query -> num_rows !=0){
					echo("<tr><th>Title</th><th>Date</th><th>Location</th>
					      <th>Type</th><th>Goal</th><th>Description</th><th>Narrative</th></tr>");
					while($row = $query -> fetch_array()){
						$title = $row['Title'];
						$date = $row['Date'];
						$location = $row['name'];
						$type = $row['t_name'];
						$goal = $row['g_name'];
						$description = $row['Description'];
						$narrative = $row['Narrative'];
						echo ("<tr><th>".$title."</th><th>".$date."</th><th>".$location."</th><th>".$type."</th>
						<th>".$goal."</th><th>".$description."</th><th>".$narrative."</th></tr>\n");
					}
				}
			}
//==============================================================================================================================================//
//
//==============================================================================================================================================//	
			if ($homeclick == "View All Faculty"){
				////////////////////////////////////////////////////////////////////////////////////////
				$query = $link -> query("SELECT * FROM faculty, gender_T, status_T, rank_T, ethnicity_T
										 WHERE faculty.ethnicity = ethnicity_T.ethnicityID
										 AND faculty.gender = gender_T.genderID
										 AND faculty.status = status_T.statusID
										 AND faculty.rank = rank_T.rankID");
				////////////////////////////////////////////////////////////////////////////////////////
				if ($query -> num_rows != 0){
					//identifying line of the table
					echo("<tr><th> BNumber </th><th> Title </th><th> First Name </th>
						  <th> MI </th><th> Last Name </th><th> Email </th><th> CPO </th>
						  <th> Ethinicity </th><th> Gender </th><th> Status </th><th> Rank </th></tr>");
					while($row = $query -> fetch_array()){
						$bnum = $row['bnumber'];
						$title = $row['title'];
						$fname = $row['firstname'];
						$mi = $row['mi'];
						$lname = $row['lastname'];
						$email = $row['email'];
						$cpo = $row['cpo'];
						$ethnicity = $row['ename'];
						$gender = $row['gname'];
						$status = $row['sname'];
						$rank = $row['rname'];
						echo "<tr><th>".$bnum."</th><th>".$title."</th><th>".$fname."</th><th>".$mi."</th>
						<th>".$lname."</th><th>".$email."</th><th>".$cpo."</th><th>".$ethnicity."</th>
						<th>".$gender."</th><th>".$status."</th><th>".$rank."</th></tr>\n";
					}
				}
			}
=======
<h1> Result Page </h1>
<table border=1><tbody>

<?php
$homeclick = $_POST['PageChange'];
if ($homeclick == "View All Activities"){
	echo("<tr><th>Title</th><th>Date</th><th>Location</th><th>Type</th><th>Goal</th><th>Description</th><th>Narrative</th></tr>");

	$query = $link -> query("SELECT * FROM Activities_t, location_t, type_t, goal_t
								WHERE Activities_t.Location = location_t.ID
								AND Activities_t.Type = type_t.ID
								AND Activities_t.Goal = goal_t.ID");
	if ($query -> num_rows !=0){
		while($row = $query -> fetch_array()){
			$title = $row['Title'];
			$date = $row['Date'];
			$location = $row['name'];
			$type = $row['t_name'];
			$goal = $row['g_name'];
			$description = $row['Description'];
			$narrative = $row['Narrative'];
			echo "<tr><th>".$title."</th><th>".$date."</th><th>".$location."</th><th>".$type."</th>
			<th>".$goal."</th><th>".$description."</th><th>".$narrative."</th></tr>\n";
		}
	}
}if ($homeclick == "View All Faculty"){
	echo("<tr><th>Title</th><th>Date</th><th>Location</th><th>Type</th><th>Goal</th><th>Description</th><th>Narrative</th></tr>");

	$query = $link -> query("SELECT * FROM Faculty_Placeholder");
	if ($query -> num_rows !=0){
		while($row = $query -> fetch_array()){
			$title = $row['Title'];
			$date = $row['Date'];

			$type = $row['Type'];
			$goal = $row['Goal'];
			$description = $row['Description'];
			$narrative = $row['Narrative'];
			echo "<tr><th>".$title."</th><th>".$date."</th><th>".$location."</th><th>".$type."</th>
			<th>".$goal."</th><th>".$description."</th><th>".$narrative."</th></tr>\n";
>>>>>>> 01537267ebf0d1bdd1b2a76b88355863d0c5be3d
		}
//==============================================================================================================================================//
//
//==============================================================================================================================================//	
		else{
			echo "<h3>Invalid Access Route.<br />  Please click the home button to return to the home page.</h3>";
		}
		

<<<<<<< HEAD
		?>
		</tbody></table>
      </div>
</CENTER>

      <footer class="footer">
        <p>&copy; Computer Science 330 Faculty Development Team Fall 2015</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
=======
?>
</tbody></table>
</body>
>>>>>>> 01537267ebf0d1bdd1b2a76b88355863d0c5be3d
</html>
