
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

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
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Project name</h3>
      </div>
<CENTER>
      <div class="jumbotron">
        <h1>Home Directory</h1>
        <p class="lead">
		<table border=2><tbody>
		<tr><th> <h3><CENTER>Faculty</CENTER></h3> </th><th> <h3><CENTER>Activity</CENTER></h3> </th></tr>
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
		<tr><th><form action = "singlesearch.php" method = "post">
				<input type="Submit" value = "View All Faculty" name = "PageChange"/>
				</form>
		</th><th><form action = "singlesearch.php" method = "post">
				<input type="Submit" value = "View All Activities" name = "PageChange"/>
				</form>
		</th></tr>
		<!--end row 2-->
		<!--begin row 3-->
		<tr><th><form action = "singlesearch.php" method = "post">
				<input type="Submit" value = "Add Faculty" name = "PageChange"/> 
				</form>
		</th><th><form action = "singlesearch.php" method = "post">
				<input type="Submit" value = "Add Activities" name = "PageChange"/>
				</form>
		</th></tr>
		<!--end row 3-->
		<!--begin row 4-->
		<tr><th><form action = "singlesearch.php" method = "post">
				<input type="Submit" value = "Edit Faculty" name = "PageChange"/> 
				</form>
		</th><th><form action = "singlesearch.php" method = "post">
				<input type="Submit" value = "Edit Activities" name = "PageChange"/>
				</form>
		</th></tr>
		<!--end row 4-->
		<!--begin row 5-->
		<tr><th><form action = "singlesearch.php" method = "post">
				<input type="Submit" value = "Remove Faculty" name = "PageChange"/> 
				</form>
		</th><th><form action = "singlesearch.php" method = "post">
				<input type="Submit" value = "Remove Activities" name = "PageChange"/>
				</form>
		</th></tr>
		<!--end row 5-->

		</tbody></table>
		<form action = "http://tango.berea.edu/lambertq/FacultyDB/advancedsearch/advsearch.php" method = "post">
				<input type="Submit" value = "Advanced Search" name = "PageChange"/>
				</form>
	
		</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>
</CENTER>

      <footer class="footer">
        <p>&copy; Company 2014</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
