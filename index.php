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

<title>Berea College || Faculty Development</title>

<!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="bootstrap/css/signin.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]
<script src="boot/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

<div class="container">
<div class="header clearfix">
<h3 class=""><strong>Faculty Development</strong></h3>
</div>

<br><br><br>

<center>
<form class="form-signin" action="check.php" method="post">
<h2 class="form-signin-heading">Please sign in</h2>
<label for="inputEmail" class="sr-only">Email address</label>
<input type="text" id="inputText" class="form-control" placeholder="Username" name="username" required autofocus><br>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
<div class="checkbox">
<label>
<input type="checkbox" value="remember-me"> Remember me
</label>
</div>
<input  type="submit" class="btn btn-lg btn-primary btn-block" name="submit"><br>
<p><span class="info"></span><a href="https://webapps.berea.edu/smop/ChangePasswordDirect.aspx" target="_blank">Forgot Password?</a></p>
<p><span><?php error_reporting(0); echo $error; ?></span></p>
</form>

</div> <!-- /container -->
</center><br><br><br>
<center>
<footer class="footer">
<p>Copyright&copy; Berea College 2015</p>
</footer>
</center>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
