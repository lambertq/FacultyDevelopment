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

	<?php
	//check if the user has come from the login or not//
	include('session.php');
	////////////////////////////////////////////////////
	?>
	
    <title>Add Faculty</title>

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
<?php $link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
or die(mysql_connect_error("Connection Failed"));

$p_opt = $link -> query("SELECT * FROM academic_p");
$e_opt = $link -> query("SELECT * FROM ethnicity_T");
$g_opt = $link -> query("SELECT * FROM gender_T");
$s_opt = $link -> query("SELECT * FROM status_T");
$r_opt = $link -> query("SELECT * FROM rank_T");
?>

<center>
<h1> Add a new Faculty Member: </h1>
  <div class="jumbotron">
        <p class="lead">

<form action = "AddFacResult.php" method = "post"> 

<table class = "table-hover table-condensed " align = "center", cellspacing ="10">
<tr>
	<td align = "right">B#:</td> 
	<td align = "left"> <input type="text" name="bnumber" placeholder="Include the B" required/> </td>
</tr>

<tr>
	<td align = "right"> Title: </td> 
	<td align = "left"><input type="text" name = "title" placeholder="Ms., Mrs., Dr., etc."required/></td>
</td>

<tr>
	<td align = "right">First Name: </td>
	<td align = "left"><input type = "text" name = "firstname" placeholder="First"required/> </td>
</tr>

<tr>
	<td align = "right">Middle Initial: </td>
	<td align = "left"><input type = "text" name = "mi" placeholder = "M." required/> </td>
</tr>

<tr>
	<td align = "right">Last Name: </td>
	<td align = "left"> <input type = "text" name = "lastname" placeholder = "Surname" required/> </td>
</tr>

<tr>
	<td align ="right"> Email: </td>
	<td align = "left"><input type ="text" name = "email" placeholder = "example@berea.edu" required/> </td>
</tr>

<tr>
	<td align = "right">CPO#: </td>
	<td align = "left"><input type ="text" name = "cpo" placeholder = "0000" required/> </td>
</tr>

<tr>
	<td align = "right">Academic Program: </td>
	<td align = "left">
		<select name="program" required>
			<option value="" selected="selected" disabled="disabled">Select an Academic Program</option> 
			<?php while($row = mysqli_fetch_array($p_opt)) {
			 echo "<option value='" . $row['ID'] . "'>" . $row['ap_name'] . "</option>"; }
			?>
		</select>
	</td>
</tr>

<tr>
	<td align = "right">Ethnicity: </td>
	<td align = "left">
		<select name="ethnicity" required>
			<option value="" selected="selected" disabled="disabled">Select an Ethnicity</option> 
			<?php while($row = mysqli_fetch_array($e_opt)) {
			 echo "<option value='" . $row['ethnicityID'] . "'>" . $row['ename'] . "</option>"; }
			?>
		</select>
	</td>
</tr>

<tr>
	<td align ="right">Gender: </td>
	<td align ="left">
		<select name="gender" required>
			<option value="" selected="selected" disabled="disabled">Select a Gender</option> 
			<?php while($row = mysqli_fetch_array($g_opt)) {
			 echo "<option value='" . $row['genderID'] . "'>" . $row['gname'] . "</option>"; }
			?>
		</select>
	</td>
</tr>

<tr>
	<td align = "right">Status: </td>
	<td align = "left"> 
		<select name="status" required>
			<option value="" selected="selected" disabled="disabled">Select a Status</option> 
			<?php while($row = mysqli_fetch_array($s_opt)) {
			 echo "<option value='" . $row['statusID'] . "'>" . $row['sname'] . "</option>";}
			?>
		</select>
	</td>
</tr>

<tr>
	<td align = "right">Rank:</td>
	<td align = "left">
		<select name = "rank" required>
			<option value="" selected="selected" disabled="disabled">Select a Rank</option> 
			<?php while ($row = mysqli_fetch_array($r_opt)) {
			 echo "<option value='" . $row['rankID'] . "'>" . $row['rname'] . "</option>";}
			?>
		</select>
	</td>
</tr>

<tr>
	<td></td>
	<td align = "left" ><br />
	<input class="btn-group btn-primary btn-sm" type = "Submit"></td>
</tr>
</table>

</form>
</div>
</center>

      <footer class="footer">
        <p>&copy; Computer Science 330 Faculty Development Team Fall 2015</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>