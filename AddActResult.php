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
<div class="jumbotron">
        <p class="lead">
<?php $link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
or die(mysql_connect_error("Connection Failed"));
if(isset($_POST['a_title'])){
	$name = $_POST["a_title"];
	$date = $_POST["a_date"];
	$time = $_POST["a_time"];
	$loc = $_POST["a_loc"];
	$type = $_POST["a_type"];
	$goal = $_POST["a_goal"];
	$desc = $_POST["a_desc"];
	if(isset($_POST['a_narr'])){
		$narr = $_POST["a_narr"];
		$add = $link -> query("INSERT INTO Activities_t (Title, Date, Time, Location, Type, Goal, Description, Narrative) VALUES( '$name', '$date', '$time', '$loc', '$type', '$goal', '$desc', '$narr')");
	}
	else{
	$add = $link -> query("INSERT INTO Activities_t (Title, Date, Time, Location, Type, Goal, Description) VALUES( '$name', '$date', '$time', '$loc', '$type', '$goal', '$desc')");
	}
	if (!$add){
		echo "Did not work";
	}
	else{
		echo "ACTIVITY successfully added to the database";
	}
}
elseif(isset($_POST['n_loc'])){
	$add = $link -> query("INSERT INTO location_t (name) VALUES('".$_POST['n_loc']."')");
	if (!$add){
		echo "Did not work";
	}
	else{
		echo "New activity LOCATION successfully added to the database";
	}
}
elseif(isset($_POST['n_type'])){
	$add = $link -> query("INSERT INTO type_t (t_name) VALUES('".$_POST['n_type']."')");
	if (!$add){
		echo "Did not work";
	}
	else{
		echo "New activity TYPE successfully added to the database";
	}
}
elseif(isset($_POST['n_goal'])){
	$add = $link -> query("INSERT INTO goal_t (g_name) VALUES('".$_POST['n_goal']."')");
	if (!$add){
		echo "Did not work";
	}
	else{
		echo "New activity GOAL successfully added to the database";
	}
}
else{
	echo "ERROR: Nothing added to the database.";
}
?>

</CENTER>

      <footer class="footer">
        <p>&copy; Computer Science 330 Faculty Development Team Fall 2015</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>