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
        <h3 class="text-muted">Faculty Development</h3>
      </div>
<CENTER>
	<h1>Manage Faculty Attendance</h1>
      <div class="jumbotron">
        <p class="lead">
				<?php
		error_reporting(0);
//==============================================================================================================================================//
// This code is to let the user know if the insertion was successful for failed. 
//==============================================================================================================================================//	
		if (!isset($_POST['fid']) and !isset($_POST['aid'])){
		$fq = $link -> query ("SELECT * FROM faculty");
		$aq = $link -> query ("SELECT * FROM Activities_t");
		
		?><!--end php and start the form for the drop down-->
		
		<!--Drop down for the Faculty selection-->
		<form action = "addtest.php" method = "post">
		<h4>Faculty Member:</h4> <select name="fid" required>
		<option value="" selected = "selected" disabled = "disabled">Choose a Faculty Member</option>
		<?php
		while($row = $fq -> fetch_array()){
			$name = ("".$row['firstname']." ".$row['mi']." ".$row['lastname']."");
			echo "<option value='" . $row['bnumber'] . "'>" . $name . "</option>";
		}
		?>
		</select>

		<!--Drop down for the Activity selection-->
		<h4>Activity Select:</h4> <select name="aid" required>
		<option value="" selected = "selected" disabled = "disabled">Choose the Attended Activity</option>
		<?php
		while($row = $aq -> fetch_array()){
			echo "<option value='" . $row['ID'] . "'>" . $row['Title'] . "</option>";
		}
		?>
		</select><br /><br />
		<input class="btn-group btn-primary btn-sm" type = "Submit">
		</form>
		<?php
		}
		
		else{ //checks if the page has came from itself. 
			$toinsert = "no"; //assume that the relationship already exists.

			$checkquery = $link -> query ("SELECT * FROM Attendance");//grab the information from the attendence table
			if ($checkquery -> num_rows != 0){
				while ($row = $checkquery -> fetch_array()){
					if (($row['f_ID'] == $_POST['fid']) and ($row['a_ID'] == $_POST['aid'])){ //find if the relationship already exists
						$toinsert = "no";//do not insert
						break;//break out of the loop in order to continue the processes
					}else{
						$toinsert = "yes"; //proceed with insertion.
					}
				}
			}else{
				$toinsert = "yes"; //proceed with insertion.
			}
			
			if ($toinsert == "yes"){
				//sets the post operations to values for simplicities sake
				$f = $_POST['fid'];
				$a = $_POST['aid'];
				$insert = $link -> query ("INSERT INTO Attendance (f_ID, a_ID) VALUES ('$f','$a')");//updates the attendence table
				
				//Success alert for the page to show the user that the insertion was successful
				?>
				<div class="alert alert-success fade in">
				<strong>Success!</strong> Faculty successfully added.
				</div>
				<?php
				
			}else if ($toinsert == "no"){
				//Failure alert for the page to show the user that the insertion failed because the relation already exists. 
				?>
				<div class="alert alert-danger fade in">
				<strong>Failed!</strong> Faculty already in attendence. 
				</div>
				<?php
			}
			
			$fq = $link -> query ("SELECT * FROM faculty");
			$aq = $link -> query ("SELECT * FROM Activities_t");
			
			?>
			<!--end php and start the form for the drop down-->
			
			<!--Drop down for the Faculty selection-->
			<form action = "addtest.php" method = "post">
			<h4>Faculty Member:</h4> <select name="fid" required>
			<option value="" disabled = "disabled">Choose a Faculty Member</option>
			<?php
			$FID = $_POST['fid'];
			$quick2 = $link->query("SELECT firstname, mi, lastname from faculty WHERE faculty.bnumber = '$FID'");
			$q2 = $quick2->fetch_array();
			echo"<option selected = 'selected' value='".$FID."'>".$q2['firstname']." ".$q2['mi']." ".$q2['lastname']."</option>";
			while($row = $fq -> fetch_array()){
				if($row['bnumber'] != $FID){
					$name = ("".$row['firstname']." ".$row['mi']." ".$row['lastname']."");
					echo "<option value='" . $row['bnumber'] . "'>" . $name . "</option>";
				}
			}
			?>
			</select>

			<!--Drop down for the Activity selection-->
			<h4>Activity Select:</h4> <select name="aid" required>
			<option value="" disabled = "disabled">Choose the Attended Activity</option>
			<?php
			$ID = $_POST['aid'];
			$quick = $link->query("SELECT Title from Activities_t WHERE Activities_t.ID = '$ID'");
			$q = $quick->fetch_array();
			echo"<option selected = 'selected' value='".$ID."'>".$q['Title']."</option>";
			while($row = $aq -> fetch_array()){
				if($row['ID'] != $ID){
					echo "<option value='" . $row['ID'] . "'>" . $row['Title'] . "</option>";
				}
			}
			?>
			</select><br /><br />
			<input class="btn-group btn-primary btn-sm" type = "Submit">
			</form>
			<?php
		}
		
//==============================================================================================================================================//
// Initial code for the Page, this runs the first time that the page is loaded. 
//==============================================================================================================================================//	
		//queries to supply the drop down menus with the information from the database
		?>
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