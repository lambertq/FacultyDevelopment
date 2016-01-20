<?php $link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
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

	<?php
	//check if the user has come from the login or not//
	include('session.php');
	////////////////////////////////////////////////////
	?>
	
    <title>Faculty Tracking</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/tables.css" rel="stylesheet">

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

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="homestyles.php">Home</a></li>
			<li role="presentation" class="active"><a href="logout.php">Log Out</a></li>
            <!--<li role="presentation"><a href="#">About</a></li>-->
            <!--<li role="presentation"><a href="#">Contact</a></li>-->
          </ul>
        </nav>
        <h3 class="text-muted">Faculty Development</h3>
      </div>
<CENTER>
	<h1>Result Page</h1>
      <div class="jumbotron">
        <p class="lead">
		<div class = "table-responsive tables"><!--start the table response class-->
		<table class = "table-striped table-condensed table-hover tables" cellspacing ="10" align = "center" border = 1><tbody>

		<?php
//==============================================================================================================================================//
//			
//==============================================================================================================================================//	
		$numresults = 0;
		error_reporting(0);
		if (isset($_POST['fsel'])){
			echo "<h3> Professor Searched: </h3>";
			$profid = $_POST['fsel'];
			////////////////////////////////////////////////////////////////////////////////
			$query = $link -> query("SELECT * FROM faculty, academic_p, gender_T, status_T, rank_T, ethnicity_T
										 WHERE faculty.program = academic_p.ID
										 AND faculty.ethnicity = ethnicity_T.ethnicityID
										 AND faculty.gender = gender_T.genderID
										 AND faculty.status = status_T.statusID
										 AND faculty.rank = rank_T.rankID
										 AND faculty.bnumber = '$profid'");
			////////////////////////////////////////////////////////////////////////////////
			if ($query -> num_rows !=0){
				echo("<tr><td align='center'><b>BNumber</b></td><td align='center'><b>Title</b></td>
					<td align='center'><b>First Name</b></td><td align='center'><b> MI </b></td>
					<td align='center'><b>Last Name </b></td><td align='center'><b>Email</b></td>
					<td align='center'><b>CPO </b></td><td align='center'><b> Academic Program </b></td>
					<td align='center'><b> Division </b></td><td align='center'><b> Ethinicity </b></td>
					<td align='center'><b> Gender </b></td><td align='center'><b> Status </b></td><td align='center'><b> Rank </b></td></tr>");
				while($row = $query -> fetch_array()){
					$bnum = $row['bnumber'];
					$title = $row['title'];
					$fname = $row['firstname'];
					$mi = $row['mi'];
					$lname = $row['lastname'];
					$email = $row['email'];
					$cpo = $row['cpo'];
					$prog = $row['ap_name'];
					$div = $row['division'];
					$ethnicity = $row['ename'];
					$gender = $row['gname'];
					$status = $row['sname'];
					$rank = $row['rname'];
					echo "<tr><td align='center'>".$bnum."</td><td align='center'>".$title."</td>
					<td align='center'>".$fname."</td><td align='center'>".$mi."</td><td align='center'>".$lname."</td>
					<td align='center'>".$email."</td><td align='center'>".$cpo."</td><td align='center'>".$prog."</td>
					<td align='center'>".$div."</td><td align='center'>".$ethnicity."</td><td align='center'>".$gender."</td>
					<td align='center'>".$status."</td><td align='center'>".$rank."</td></tr>\n";
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
				echo("<tr><td align='center'><b>Title</b></td><td align='center'><b>Date</b></td>
						<td align='center'><b>Time</b></td><td align='center'><b>Location</b></td>
					    <td align='center'><b>Type</b></td><td align='center'><b>Goal</b></td></tr>");
					while($row = $query -> fetch_array()){
						$title = $row['Title'];
						$dcon = DateTime::createFromFormat('Y-m-d', $row['Date']);
						$date = $dcon->format('M/d/Y');
						$tcon = DateTime::createFromFormat('G:i:s', $row['Time']);
						$time = $tcon->format('g:iA');
						$location = $row['name'];
						$type = $row['t_name'];
						$goal = $row['g_name'];
						$description = $row['Description'];
						$narrative = $row['Narrative'];
						echo ("<tr><td align='center'>".$title."</td><td align='center'>".$date."</td>
						<td align='center'>".$time."</td><td align='center'>".$location."</td>
						<td align='center'>".$type."</td><td align='center'>".$goal."</td></tr>\n");
					}
				echo "</tbody></table>";
				echo "<br />";
				echo "<br />";
				echo "<CENTER>";
				?>
				<table class = "table-striped table-condensed tables" border=1><tbody>
				<?php
				echo "<tr><td align='center'><b>Description<b/></td></tr>";
				echo "<tr><td align = 'center'>".$description."</td></tr>";
				echo "</tbody></table>";
				echo "</CENTER>";
				echo "<br />";
				echo "<br />";
				echo "<CENTER>";
				?>
				<table class = "table-striped table-condensed tables" border=1><tbody>
				<?php
				echo "<tr><td align = 'center'><b>Narrative</b></td></tr>";
				echo "<tr><td align = 'center'>".$narrative."</td></tr>";
				echo "</tbody></table";
				echo "</CENTER>";
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
				?>
				<table class = "table table-condensed table-hover table-striped tables" border=1><tbody>
				<?php
				if ($query -> num_rows !=0){
					echo("<tr><td align='center'><b>Title</b></td><td align='center'><b>Date</b></td>
						<td align='center'><b>Time</b></td><td align='center'><b>Location</b></td>
					    <td align='center'><b>Type</b></td><td align='center'><b>Goal</b></td></tr>");
					while($row = $query -> fetch_array()){
						$title = $row['Title'];
						$dcon = DateTime::createFromFormat('Y-m-d', $row['Date']);
						$date = $dcon->format('M/d/Y');
						$tcon = DateTime::createFromFormat('G:i:s', $row['Time']);
						$time = $tcon->format('g:iA');
						$location = $row['name'];
						$type = $row['t_name'];
						$goal = $row['g_name'];
						echo ("<tr><td align='center'>".$title."</td><td align='center'>".$date."</td>
						<td align='center'>".$time."</td><td align='center'>".$location."</td>
						<td align='center'>".$type."</td><td align='center'>".$goal."</td></tr>\n");
					}
				}
			}
//==============================================================================================================================================//
//
//==============================================================================================================================================//	
			if ($homeclick == "View All Faculty"){
				////////////////////////////////////////////////////////////////////////////////////////
				$query = $link -> query("SELECT * FROM faculty, academic_p, gender_T, status_T, rank_T, ethnicity_T
										 WHERE faculty.program = academic_p.ID
										 AND faculty.ethnicity = ethnicity_T.ethnicityID
										 AND faculty.gender = gender_T.genderID
										 AND faculty.status = status_T.statusID
										 AND faculty.rank = rank_T.rankID");
				////////////////////////////////////////////////////////////////////////////////////////
				if ($query -> num_rows != 0){
					//identifying line of the table
					echo("<tr><td align='center'><b>BNumber</b></td><td align='center'><b>Title</b></td>
					<td align='center'><b>First Name</b></td><td align='center'><b> MI </b></td>
					<td align='center'><b>Last Name </b></td><td align='center'><b>Email</b></td>
					<td align='center'><b>CPO </b></td><td align='center'><b> Academic Program </b></td>
					<td align='center'><b> Division </b></td><td align='center'><b> Ethinicity </b></td>
					<td align='center'><b> Gender </b></td><td align='center'><b> Status </b></td><td align='center'><b> Rank </b></td></tr>");
					while($row = $query -> fetch_array()){
						$bnum = $row['bnumber'];
						$title = $row['title'];
						$fname = $row['firstname'];
						$mi = $row['mi'];
						$lname = $row['lastname'];
						$email = $row['email'];
						$cpo = $row['cpo'];
						$prog = $row['ap_name'];
						$div = $row['division'];
						$ethnicity = $row['ename'];
						$gender = $row['gname'];
						$status = $row['sname'];
						$rank = $row['rname'];
						echo "<tr><td align='center'>".$bnum."</td><td align='center'>".$title."</td>
						<td align='center'>".$fname."</td><td align='center'>".$mi."</td><td align='center'>".$lname."</td>
						<td align='center'>".$email."</td><td align='center'>".$cpo."</td><td align='center'>".$prog."</td>
						<td align='center'>".$div."</td><td align='center'>".$ethnicity."</td><td align='center'>".$gender."</td>
						<td align='center'>".$status."</td><td align='center'>".$rank."</td></tr>\n";
					}
				}
			}
		}
//==============================================================================================================================================//
//
//==============================================================================================================================================//	
		else{
			echo "<h3>Invalid Access Route.<br />  Please click the home button to return to the home page.</h3>";
		}
		
/////////////////////////////////
		?>
		</tbody></table>
		</div>
<!--
//==============================================================================================================================================//
//
//==============================================================================================================================================//	
-->	
		<div class = "table-responsive">
		<table class = "table-striped table-condensed tables" align="center" border=1><tbody>
		<?php
		$numresults = 0;
		error_reporting(0);
		if (isset($_POST['fsel'])){
			echo "<h3> Activities Attended: </h3>";
			$profid = $_POST['fsel'];
			////////////////////////////////////////////////////////////////////////////////
			$relquery = $link -> query("SELECT * FROM Attendance, Activities_t, location_t,
										goal_t, type_t WHERE Attendance.f_ID = '$profid' 
										AND Activities_t.ID = Attendance.a_ID
										AND Activities_t.Location = location_t.ID
										AND Activities_t.Type = type_t.ID
										AND Activities_t.Goal = goal_t.ID"); 
			///////////////////////////////////////////////////////////////////////////////////
			if ($relquery -> num_rows !=0){
				$thetable = "";
				$numtimes = 0;
						echo("<tr><td align='center'><b>Title</b></td><td align='center'><b>Date</b></td>
						<td align='center'><b>Time</b></td><td align='center'><b>Location</b></td>
					    <td align='center'><b>Type</b></td><td align='center'><b>Goal</b></td></tr>");
					while($row = $relquery -> fetch_array()){
						$title = $row['Title'];
						$dcon = DateTime::createFromFormat('Y-m-d', $row['Date']);
						$date = $dcon->format('M/d/Y');
						$tcon = DateTime::createFromFormat('G:i:s', $row['Time']);
						$time = $tcon->format('g:iA');
						$location = $row['name'];
						$type = $row['t_name'];
						$goal = $row['g_name'];
						$thetable = $thetable."<tr><td align='center'>".$title."</td><td align='center'>".$date."</td>
						<td align='center'>".$time."</td><td align='center'>".$location."</td>
						<td align='center'>".$type."</td><td align='center'>".$goal."</td></tr>\n";
						$numtimes++;
					}
				}
				echo "".$numtimes." activities attended.";
				echo $thetable;
			}	
//==============================================================================================================================================//
//
//==============================================================================================================================================//	
		elseif (isset($_POST['asel'])){
			echo "<h3> Faculty Members that Attended: </h3>";
			$actID = $_POST['asel'];
			$query = $link -> query("SELECT * FROM faculty, academic_p, gender_T, status_T, rank_T, ethnicity_T, Attendance
										 WHERE Attendance.a_ID = '$actID'
										 AND faculty.bnumber = Attendance.f_ID
										 AND faculty.program = academic_p.ID
										 AND faculty.ethnicity = ethnicity_T.ethnicityID
										 AND faculty.gender = gender_T.genderID
										 AND faculty.status = status_T.statusID
										 AND faculty.rank = rank_T.rankID");
			////////////////////////////////////////////////////////////////////////////////
			if ($query -> num_rows !=0){
				$thetable = "";
				$numtimes = 0;
				echo("<tr><td align='center'><b>BNumber</b></td><td align='center'><b>Title</b></td>
				<td align='center'><b>First Name</b></td><td align='center'><b> MI </b></td>
				<td align='center'><b>Last Name </b></td><td align='center'><b>Email</b></td>
				<td align='center'><b>CPO </b></td><td align='center'><b> Academic Program </b></td>
				<td align='center'><b> Division </b></td><td align='center'><b> Ethinicity </b></td>
				<td align='center'><b> Gender </b></td><td align='center'><b> Status </b></td><td align='center'><b> Rank </b></td></tr>");
				while($row = $query -> fetch_array()){
					$bnum = $row['bnumber'];
					$title = $row['title'];
					$fname = $row['firstname'];
					$mi = $row['mi'];
					$lname = $row['lastname'];
					$email = $row['email'];
					$cpo = $row['cpo'];
					$prog = $row['ap_name'];
					$div = $row['division'];
					$ethnicity = $row['ename'];
					$gender = $row['gname'];
					$status = $row['sname'];
					$rank = $row['rname'];
					echo "<tr><td align='center'>".$bnum."</td><td align='center'>".$title."</td>
					<td align='center'>".$fname."</td><td align='center'>".$mi."</td><td align='center'>".$lname."</td>
					<td align='center'>".$email."</td><td align='center'>".$cpo."</td><td align='center'>".$prog."</td>
					<td align='center'>".$div."</td><td align='center'>".$ethnicity."</td><td align='center'>".$gender."</td>
					<td align='center'>".$status."</td><td align='center'>".$rank."</td></tr>\n";
					$numtimes++;
				}echo "".$numtimes." faculty member(s) attended.";
				echo $thetable;
			}
		}
//==============================================================================================================================================//
//
//==============================================================================================================================================//	
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
</html>
