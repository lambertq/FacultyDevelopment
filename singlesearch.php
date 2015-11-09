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
    <meta name="description" content="Yo">
    <meta name="author" content="Quinten">
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
            <!--<li role="presentation"><a href="#">About</a></li>-->
            <!--<li role="presentation"><a href="#">Contact</a></li>-->
          </ul>
        </nav>
        <h3 class="text-muted">Faculty Development</h3>
      </div>
<CENTER>
      <div class="jumbotron">
        <h1>Single Search</h1>
        <p class="lead">
		<?php
	$homeclick = $_POST['PageChange'];
	
	if ($homeclick == "Faculty Single Search"):
		//echo ("Faculty Single Search");
		//insert query that grabs everything from the faculty table
		$query = $link -> query ("SELECT * FROM Faculty_Placeholder");
		//populate drop down list with all faculty in the database by name
		?><!--end php and start the form for the drop down-->
		<form action = "singleresult.php" method = "post">
		<h4>Faculty Member:</h4> <select name="selection">
		<?php
		while($row = $query -> fetch_array()){
			echo "<option value='" . $row['ID'] . "'>" . $row['Name'] . "</option>";
		}
		?>
		</select>
		<input type = "submit" />
		</form>
		<?php
		//store user selection in a post operation
		//direct the user to the results page to get their results for their search
		
	elseif ($homeclick == "Activity Single Search"):
		//insert query that grabs everything from the activity table
		$query = $link -> query ("SELECT * FROM Activities_t");
		//populate drop down list with all activities in the database by name
		?><!--end php and start the form for the drop down-->
		<form action = "singleresult.php" method = "post">
		<h4>Activity:</h4> <select name="selection">
		<?php
		while($row = $query -> fetch_array()){
			echo "<option value='" . $row['ID'] . "'>" . $row['Title'] . "</option>";
		}
		?>
		</select>
		<input type = "submit" />
		</form>
		<?php
		//store user selection in a post operation
		//direct the user to the results page to get their results for their search
		
	elseif ($homeclick == "View All Faculty"):
		echo ("All Faculty");
		$query = $link -> query ("SELECT * FROM Faculty_Placeholder");
		header('Refresh: 0; URL=http://tango.berea.edu/lambertq/FacultyDB/singleresult.php');
		//insert query that grabs everything from the faculty table
		//direct the user to the results page to display the entire table to the user
		
	elseif ($homeclick == "View All Activities"):
		echo ("All Activies");
		$query = $link -> query ("SELECT * FROM Activities_t");
		header('Refresh: 1; URL=http://tango.berea.edu/lambertq/FacultyDB/singleresult.php');
		//insert query that grabs everything from the activity table
		//direct the user to the results page to display the entire table to the user
	else:
		echo ("Page not created yet. Still under construction.");
	endif;
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
