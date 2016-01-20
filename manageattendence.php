<?php $link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
or die(mysql_connect_error("Connection Failed"));
?>

<!DOCTYPE html>

<?php
	//check if the user has come from the login or not//
	include('session.php');
	////////////////////////////////////////////////////
	?>

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
        <h3 class=""><strong>Faculty Development</strong></h3>
      </div>
<CENTER>
	<h1>Manage Faculty Attendance</h1>
      <div class="jumbotron">
        <p class="lead">
		
		<?php
error_reporting(0);

session_start();
if (isset($_POST['aid'])){//if came from addtoactivity.php or not
	$_SESSION['activity_name'] = $_POST['aid'];//checks if the page came from itself or not. 
}
else{ //checks if the page has come from: addtoactivity.php or came from itself.
	$activity_n = $_SESSION['activity_name'];
	if (isset($_POST['fadd'])){//add a relationship to the attendence table. 
		$success = "no"; //assume that the relationship already exists.

		$checkquery = $link -> query ("SELECT * FROM Attendance");
		if ($checkquery -> num_rows != 0){
			while ($row = $checkquery -> fetch_array()){
				//checks if the relationship exists in the attendence table
				
				if($row['f_ID'] == $_POST['fadd'] and $row['a_ID'] == $activity_n){
					$success = "no";//do not insert
					//If the relationship exists, stop searching and break the loop.
					break;
				}
				else{ //relationship not found
					$success = "add"; //proceed with insertion.
				}
			}
		}
		
		else{//relationship not found
			$success = "add"; //proceed with insertion.
		}
	}
	
	else if (isset($_POST['fdel'])){ //delete a relationship from the attendence table
		$success = "del"; //proceed with deletion 
	}
	
	//the remainder of the page works on what to show the user on the interface. 
	if ($success == "add"){//add to the attendence table
		
		//variables for simplicities sake. 
		$f = $_POST['fadd'];
		$a = $_SESSION['activity_name'];
		
		//query to insert the new data into the attendence table in the database
		$insert = $link -> query ("INSERT INTO Attendance (f_ID, a_ID) VALUES ('$f','$a')");

		//Success message
		?>
		<div class="alert alert-success fade in">
		<strong>Success!</strong> Faculty successfully added.
		</div>
		<?php
		
	}
	else if ($success == "del"){//add to the attendence table
		
		//variables for simplicities sake. 
		$f = $_POST['fdel'];
		$a = $_POST['aid'];
		
		//query to insert the new data into the attendence table in the database
		$delete = $link -> query ("DELETE FROM development.Attendance WHERE Attendance.f_ID = '". $_POST['fdel'] ."'");

		//Success message
		?>
		<div class="alert alert-success fade in">
		<strong>Success!</strong> Faculty successfully deleted.
		</div>
		<?php
	}
	else if ($success == "no"){
		//Failed message
		?>
		<div class="alert alert-danger fade in">
		<strong>Failed!</strong> Faculty already in attendence. 
		</div>
		<?php
	}
}

//Displays the name of the activity being edited
$quick = $link->query("SELECT Title FROM Activities_t WHERE ID = ".$_SESSION['activity_name']);
$r = $quick->fetch_array();
echo "<h3>Managing Attendance for: ".$r['Title']."</h3><br/>";


//to supply the values for the add to attendence dropdown menu. 
$fq = $link -> query ("SELECT * FROM faculty ORDER BY lastname");
$hasattend = $link -> query ("SELECT * FROM Attendance, faculty 
							  WHERE Attendance.f_ID = faculty.bnumber
							  AND Attendance.a_ID = '".$_SESSION['activity_name']."'
							  ORDER BY lastname");
?>

<form action = "manageattendence.php" method = "post">
<h4>Add Faculty Member:</h4> <select name="fadd" required>
	<option value="" selected = "selected" disabled = "disabled">Choose a Faculty Member</option>
		<?php
		while($row = $fq -> fetch_array()){
			$name = ("".$row['lastname'].", ".$row['firstname']." ".$row['mi']."");
			echo "<option value='" . $row['bnumber'] . "'>" . $name . "</option>";
		}
		?>
	</select><br /><br />
	<input class="btn-group btn-success btn-sm" type = "Submit" value = "ADD">
</form>

<form action = "manageattendence.php" method = "post">
<h4>Delete Faculty Member:</h4> <select name="fdel" required>
	<option value="" selected = "selected" disabled = "disabled">Choose a Faculty Member</option>
		<?php
		if ($hasattend -> num_rows != 0){
			while($row = $hasattend -> fetch_array()){
				$name = ("".$row['lastname'].", ".$row['firstname']." ".$row['mi']."");
				echo "<option value='" . $row['bnumber'] . "'>" . $name . "</option>";
			}
		}
		
		?>
	</select><br /><br />
	<input class="btn-group btn-danger btn-sm" type = "Submit" value = "DELETE">
</form>
		
		
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