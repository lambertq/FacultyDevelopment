
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
	
	<?php include('session.php');?>
<div class="log"><b>Welcome  <?php echo $login_session; ?>. You're logged in.</b></div>


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
      <div class="jumbotron">
        <h1>Home Directory</h1>
        <p class="lead">
		<CENTER>
		<table border=5><tbody>
		<tr><th> <h3><CENTER><b>Faculty</b></CENTER></h3> </th><th> <h3><CENTER><b>Activity</b></CENTER></h3> </th></tr>
		<!--begin row 1-->
		<tr><th><form action = "singlesearch.php" method = "post">
				 <input type="Submit" value = "Faculty Single Search" name = "PageChange"/>
				 </form>
		</th><th><form action = "singlesearch.php" method = "post">
				 <input type="Submit" value = "Activity Single Search" name = "PageChange"/>
				 </form>
		</th></tr>
		<!--end row 1-->
		<!--begin row 2-->
		
		<tr><th><form action = "singleresult.php" method = "post">
				<CENTER><input type="Submit" value = "View All Faculty" name = "PageChange"/></CENTER>
				</form>
		</th><th><form action = "singleresult.php" method = "post">
				<CENTER><input type="Submit" value = "View All Activities" name = "PageChange"/></CENTER>
				</form>
		</th></tr>
		<!--end row 2-->
		<!--begin row 3-->
		<tr><th><form action = "singlesearch.php" method = "post">
				<CENTER><input type="Submit" value = "Add Faculty" name = "PageChange"/></CENTER>
				</form>
		</th><th><form action = "singlesearch.php" method = "post">
				<CENTER><input type="Submit" value = "Add Activities" name = "PageChange"/></CENTER>
				</form>
		</th></tr>
		<!--end row 3-->
		<!--begin row 4-->
		<tr><th><form action = "singlesearch.php" method = "post">
				<CENTER><input type="Submit" value = "Edit Faculty" name = "PageChange"/></CENTER>
				</form>
		</th><th><form action = "singlesearch.php" method = "post">
				<CENTER><input type="Submit" value = "Edit Activities" name = "PageChange"/><CENTER>
				</form>
		</th></tr>
		<!--end row 4-->
		<!--begin row 5-->
		<tr><th><form action = "singlesearch.php" method = "post">
				<CENTER><input type="Submit" value = "Remove Faculty" name = "PageChange"/></CENTER>
				</form>
		</th><th><form action = "singlesearch.php" method = "post">
				<CENTER><input type="Submit" value = "Remove Activities" name = "PageChange"/></CENTER>
				</form>
		</th></tr>
		<!--end row 5-->

		</tbody></table>
		
		</CENTER>
		</p>
        <p><a class="btn btn-lg btn-success" href="advsearch.php" role="button">Advanced Search</a>
		<a class="btn btn-lg btn-success" href="advsearch.php" role="button">Add to Event</a></p>
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
