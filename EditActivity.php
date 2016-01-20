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
	<h1>Update Activity Information</h1>
	<br />
      <div class="jumbotron">
        <p class="lead">
<?php $link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
			or die(mysql_connect_error("Connection Failed"));
	$act = $link -> query("SELECT * FROM Activities_t ORDER BY Date DESC");
			
	if (!isset($_POST['A_ID'])) {
?>
	<form SELECT = "EditActivity.php" method = "post">
		Activity Name: <select name="A_ID" required>
		<option value = "" selected="selected" disabled="disabled">Select an Activity to Edit</option>
		<?php
		while($row = mysqli_fetch_array($act)) {
			$dcon = DateTime::createFromFormat('Y-m-d', $row['Date']);
			$date = $dcon->format('m/d/y');
			echo "<option value='" . $row['ID'] . "'>" .$date.": ".$row['Title'] . "</option>";
		}
		?>
	</select>
	<br />
	<br />
	<input class="btn-group btn-primary btn-sm" type = "Submit">
	</form>
	
<?php
} else {

	$actID = ($_POST['A_ID']);
	session_start();
	$_SESSION['EditActID'] = $actID;
	$result = $link->query("SELECT * FROM Activities_t, location_t, goal_t, type_t
				WHERE Activities_t.ID = $actID
				AND Activities_t.Location = location_t.ID
				AND Activities_t.Type = type_t.ID
				AND Activities_t.Goal = goal_t.ID");
	$row = mysqli_fetch_array($result);
	
	$l_opt = $link -> query("SELECT * FROM location_t");
	$t_opt = $link -> query("SELECT * FROM type_t");
	$g_opt = $link -> query("SELECT * FROM goal_t");
	
	echo "<h3>"."Activity: ".$row['Title']."</h3>";
	echo "<br />";
?>
	
	<form action = 'EditActivityResult.php' method = 'post'>
	
	<div class ="resultT">
	<table class = "table table-condensed table-hover table-striped tables" border=1><tbody>
	<td align='center'><b>TYPE</b></td><td align='center'><b>OLD INFO</b></td><td align='center'><b>NEW INFO</b></td>
	
	<tr>
		<td align = 'center'>Title</td>
		<td> 
			<?php
				echo $row['Title'];
			?>
		</td> 
		<td><input type= 'text' name = 'a_title' placeholder = "New Activity Name" /></td>
	</tr>
	
	<tr>
		<td align = 'center'>Date</td>
		<td>
			<?php
				$date = DateTime::createFromFormat('Y-m-d', $row['Date']);
				echo $date->format('M/d/Y');
			?>
		</td>
		<td><input type="date" name = "a_date"/></td>
	</tr>
	
	<tr>
		<td align = 'center'>Time</td>
		<td>
			<?php
				$time = DateTime::createFromFormat('G:i:s', $row['Time']);
				echo $time->format('g:iA');
			?>
		</td>
		<td><input type = "time" name = "a_time"/></td>
	</tr>
	
	<tr>
		<td align = 'center' >Location</td>
		<td>
			<?php
				echo $row['name'];
			?>
		</td>
		<td>
		<select name="a_loc">
			<option value="NULL" selected="selected" disabled="disabled">Select a new Location</option> 
			<?php while($selrow = mysqli_fetch_array($l_opt)) {
			 echo "<option value='" . $selrow['ID'] . "'>" . $selrow['name'] . "</option>"; }
			?>
		</select>
		</td>
	</tr>
	
	<tr>
		<td align = 'center' >Type</td>
		<td>
			<?php
				echo $row['t_name'];
			?>
		</td>
		<td>
		<select name="a_type">
			<option value="NULL" selected="selected" disabled="disabled">Select a new Type</option> 
			<?php while($selrow = mysqli_fetch_array($t_opt)) {
			 echo "<option value='" . $selrow['ID'] . "'>" . $selrow['t_name'] . "</option>"; }
			?>
		</select>
		</td>
	</tr>
	
	<tr>
		<td align = 'center' >Goal</td>
		<td>
			<?php
				echo $row['g_name'];
			?>
		</td>
		<td>
		<select name="a_goal" >
			<option value="NULL" selected="selected" disabled="disabled">Select a new Goal</option> 
			<?php while($selrow = mysqli_fetch_array($g_opt)) {
			 echo "<option value='" . $selrow['ID'] . "'>" . $selrow['g_name'] . "</option>";}
			?>
		</select>
		</td>
	</tr>
	
	<tr>
		<td align = 'center'>Description</td>
		<td>
			<?php
				echo $row['Description'];
			?>
		</td>
		<td><textarea rows="5" cols="50" name="a_desc" placeholder="Updated Activity Description"/></textarea></td>
	</tr>
	
	<tr>
		<td align = 'center'>Narrative</td>
		<td>
			<?php
				echo $row['Narrative'];
			?>
		</td>
		<td><textarea rows="5" cols="50" name="a_narr" placeholder="Updated Faculty Response"/></textarea></td>
	</tr>
	
	</table>
	</div>
	<input class = "btn-group btn-sm btn-primary"type ="submit" />
	</form>
	</div>
	
<?php
}
?>
</CENTER>

      <footer class="footer">
        <p>&copy; Computer Science 330 Faculty Development Team Fall 2015	</p>
      </footer>


    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  
  </body>
</html>
