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
		
		<!--Shows the current user that is logged in.-->
		<?php include('session.php');//runs the session to check the current user. 
		?>
		<div class="log">
			<div class="alert-thin alert-success fade in">
				<b>Welcome  <?php echo $login_session; ?>. You're logged in.</b>
			</div><!--/alert-->
		</div><!--/log-->
	</div><!--/header clearfix-->

<CENTER>
	  <h1>Home Directory</h1>
      <div class="jumbotron">
        <p class="lead">
		
		<!--creates the table with the needed classes -->
		<table class = "table table-condensed table-hover"><tbody>
		
		
		<tr><th> <h3><CENTER><b><u>Faculty</u></b></CENTER></h3> </th><th> <h3><CENTER><b><u>Activity</u></b></CENTER></h3> </th></tr>
		<!--begin row 1-->
		<tr><th><CENTER><form action = "singlesearch.php" method = "post">
				<input class="btn-group btn-info btn-sm" type = "Submit" value = "Faculty Single Search" name = "PageChange">
				</form></CENTER>
	
		</th><th><CENTER><form action = "singlesearch.php" method ="post">
				 <input class="btn-group btn-sm btn-info" type = "Submit" value = "Activity Single Search" name = "PageChange">
				 </form></CENTER>
		</th></tr>
		<!--end row 1-->
		<!--begin row 2-->
		<tr><th><CENTER><form action = "singleresult.php" method = "post">
				 <input class="btn-group btn-info btn-sm"type = "Submit" value = "View All Faculty" name = "PageChange">
				 </form></CENTER>
				 
		</th><th><CENTER><form action = "singleresult.php" method = "post">
				 <input class="btn-group btn-sm btn-info" type = "Submit" value = "View All Activities" name = "PageChange">
				 </form></CENTER>
		</th></tr>
		<!--end row 2-->
		<!--begin row 3-->
		<tr><th><CENTER><form action = "AddFaculty.php">
				 <input class="btn-group btn-sm btn-info" type = "Submit" value = "Add Faculty">
				 </form></CENTER>
				 
		</th><th><CENTER><form action = "AddActivity.php">
				 <input class="btn-group btn-sm btn-info" type = "Submit" value = "Add Activities">
				 </form></CENTER>
		</th></tr>
		<!--end row 3-->
		<!--begin row 4-->
		<tr><th><CENTER><form action = "EditFaculty.php">
				 <input class="btn-group btn-sm btn-info" type = "Submit" value = "  Edit Faculty  ">
				 </form></CENTER>
				 
		</th><th><CENTER><form action = "EditActivity.php" method = "post">                          
				 <input class="btn-group btn-sm btn-info" type = "Submit" value = "Edit Activities">
				 </form></CENTER>
		</th></tr>
		<!--end row 4-->
		<!--begin row 5-->
		<tr><th><CENTER><form action = "DelFac.php">
				 <input class="btn-group btn-sm btn-info" type = "Submit" value = "Remove Faculty">
				 </form></CENTER>
				 
		</th><th><CENTER><form action = "DelActivity.php">
				 <input class="btn-group btn-sm btn-info" type = "Submit" value = "Remove Activities">
				 </form></CENTER>
		</th></tr>
		<!--end row 5-->
		
		<!--ends the table-->
		</tbody></table>
		
		</p> <!--/lead-->
		
		<!--Buttons at the bottom of the page-->
		<p><a class="btn-group btn-lg btn-primary" href="advsearch.php" role="button">Advanced Search</a>
		<a class="btn-group btn-lg btn-primary" href="addtoactivity.php" role="button">Manage Attendance</a></p>
      </div> <!--/jumbotron-->
</CENTER>

      <footer class="footer">
        <p>&copy; Computer Science 330 Faculty Development Team Fall 2015</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
