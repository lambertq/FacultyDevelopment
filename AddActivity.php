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
    <meta name="description" content="Yo">
    <meta name="author" content="Quinten">
    <link rel="icon" href="https://www.higheredjobs.com/images/AccountImages/4698_1.jpg">

    <title>Add Activity</title>

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
<h1>Add a New Activity:</h1>
<div class="jumbotron">
        <p class="lead">
<?php $link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
or die(mysql_connect_error("Connection Failed"));
$l_opt = $link -> query("SELECT * FROM location_t");
$g_opt = $link -> query("SELECT * FROM goal_t");
$t_opt = $link -> query("SELECT * FROM type_t");
?>
<html>
<body>
<head>
<title>Add a New Activity</title>
<CENTER>
<table border=1><tbody>
<form action = "AddActResult.php" method = "post">
Title: <input type="text" name="a_title" placeholder = "Name of Activity" required/>
<br />
<br />
Date: <input type="date" name = "a_date" required/>
<br />
<br />
Time: <input type = "time" name = "a_time" required/>
<br />
<br />
Location: <select name="a_loc" required> 
<option value = "" selected="selected" disabled="disabled">Select a Location</option>
<?php
while($row = mysqli_fetch_array($l_opt)) {
 echo "<option value='" . $row['ID'] . "'>" . $row['name'] . "</option>";
}
?>
</select>
<br />
<br />
Type: <select name="a_type" required>
<option value = "" selected="selected" disabled="disabled">Select a Type</option>
<?php
while($row = mysqli_fetch_array($t_opt)) {
 echo "<option value='" . $row['ID'] . "'>" . $row['t_name'] . "</option>";
}
?>
</select>
<br />
<br />
Goal: <select name="a_goal" required>
<option value = "" selected="selected" disabled="disabled">Select a Goal</option>
<?php
while($row = mysqli_fetch_array($g_opt)) {
 echo "<option value='" . $row['ID'] . "'>" . $row['g_name'] . "</option>";
}
?>
</select>
<br />
<br />
Description: <textarea rows="5" cols="50" name="a_desc"  placeholder = "Activity Description" required/>
</textarea>
<br />
<br />
Narrative (Not Required): <textarea rows="5" cols="50" name="a_narr"  placeholder = "Faculty Response"/>
</textarea>
<br />

<br />
<input class="btn-group btn-primary btn-sm" type = "Submit">
</form>
<!------------------------------------------------------------------------------>
<br />
<br />
<br />
<table border=0 style="width:100%"><tbody>
<tr><td align = "center">ADD A NEW LOCATION:</td><td align = "center">ADD A NEW TYPE:</td>
<td align = "center">ADD A NEW GOAL:</td></tr>
<tr><td align = "center"><form action = "AddActResult.php" method = "post">
<input type="text" name="n_loc" placeholder = "New Location Name" required/>
<input class="btn-group btn-info btn-sm" type = "Submit"></form></td>

<td align = "center"><form action = "AddActResult.php" method = "post">
<input type="text" name="n_type" placeholder = "New Type Name" required/>
<input class="btn-group btn-info btn-sm" type = "Submit"></form></td>

<td align = "center"><form action = "AddActResult.php" method = "post">
<input type="text" name="n_goal" placeholder = "New Goal Description" required/>
<input class="btn-group btn-info btn-sm" type = "Submit"></form></td></tr>
</tbody></table>
<!------------------------------------------------------------------------------>
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