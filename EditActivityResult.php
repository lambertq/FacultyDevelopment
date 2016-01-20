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
	<h1>Home Directory</h1>
      <div class="jumbotron">
        <p class="lead">
		<?php $link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
			or die(mysql_connect_error("Connection Failed"));
	
		session_start();
		$ID = $_SESSION['EditActID'];
		
			if($_POST['a_title'] != NULL){
				$upd = $link->query("UPDATE Activities_t SET Title = '".$_POST['a_title']."' WHERE Activities_t.ID = '$ID'");
				if(!$upd){
					echo "ERROR: Title did not update <br />";
				}
				else{
					echo "Title successfully updated! <br />";
				}
			}
			
			if($_POST['a_date'] != NULL){
				$upd = $link->query("UPDATE Activities_t SET Date = '".$_POST['a_date']."' WHERE Activities_t.ID = '$ID'");
				if(!$upd){
					echo "ERROR: Date did not update <br />";
				}
				else{
					echo "Date successfully updated! <br />";
				}
			}
			
			if($_POST['a_time'] != NULL){
				$upd = $link->query("UPDATE Activities_t SET Time = '".$_POST['a_time']."' WHERE Activities_t.ID = '$ID'");
				if(!$upd){
					echo "ERROR: Time did not update <br />";
				}
				else{
					echo "Time successfully updated! <br />";
				}
			}
			
			if(isset($_POST['a_loc'])){
				$upd = $link->query("UPDATE Activities_t SET Location = '".$_POST['a_loc']."' WHERE Activities_t.ID = '$ID'");
				if(!$upd){
					echo "ERROR: Location did not update <br />";
				}
				else{
					echo "Location successfully updated! <br />";
				}
			}
			
			if(isset($_POST['a_type'])){
				$upd = $link->query("UPDATE Activities_t SET Type = '".$_POST['a_type']."' WHERE Activities_t.ID = '$ID'");
				if(!$upd){
					echo "ERROR: Type did not update <br />";
				}
				else{
					echo "Type successfully updated! <br />";
				}
			}
			
			if(isset($_POST['a_goal'])){
				$upd = $link->query("UPDATE Activities_t SET Goal = '".$_POST['a_goal']."' WHERE Activities_t.ID = '$ID'");
				if(!$upd){
					echo "ERROR: Goal did not update <br />";
				}
				else{
					echo "Goal successfully updated! <br />";
				}
			}
			
			if($_POST['a_desc'] != ""){
				$upd = $link->query("UPDATE Activities_t SET Description = '".$_POST['a_desc']."' WHERE Activities_t.ID = '$ID'");
				if(!$upd){
					echo "ERROR: Description did not update <br />";
				}
				else{
					echo "Description successfully updated! <br />";
				}
			}
			
			if($_POST['a_narr'] != ""){
				$upd = $link->query("UPDATE Activities_t SET Narrative = '".$_POST['a_narr']."' WHERE Activities_t.ID = '$ID'");
				if(!$upd){
					echo "ERROR: Narrative did not update <br />";
				}
				else{
					echo "Narrative successfully updated! <br />";
				}
			}
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
