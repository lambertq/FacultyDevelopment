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
	<h1>Update Faculty Information</h1>
      <div class="jumbotron">
        <p class="lead">

<?php $link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
			or die(mysql_connect_error("Connection Failed"));
			
	if (!isset($_POST['bnumber'])) {
?>
	<form action = "EditFaculty.php" method = "post">
		Faculty B#: <input type= "text" name = "bnumber" placeholder="Include the B"/>

		<input class="btn-group btn-primary btn-sm" type = "Submit">
	</form>
	
<?php
} else {

	$bnumber = ($_POST['bnumber']);
	$query = "SELECT * FROM faculty, academic_p, ethnicity_T, gender_T, rank_T, status_T 
				WHERE bnumber = '$bnumber'
				AND faculty.program = academic_p.ID
				AND faculty.ethnicity = ethnicity_T.ethnicityID
				AND faculty.gender = gender_T.genderID
				AND faculty.rank = rank_T.rankID
				AND faculty.status = status_T.statusID";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_array($result);
	
	$p_opt = $link -> query("SELECT * FROM academic_p");
	$e_opt = $link -> query("SELECT * FROM ethnicity_T");
	$g_opt = $link -> query("SELECT * FROM gender_T");
	$s_opt = $link -> query("SELECT * FROM status_T");
	$r_opt = $link -> query("SELECT * FROM rank_T");
	
	echo "Faculty: " . $row['title'] ." ". $row['firstname'] ." ". $row['lastname'];
?>
	
	<form action = 'DEVELOPMENT_queryFaculty.php' method = 'post'>
	
	<div class ="resultT">
	<table class = "table table-condensed table-hover table-striped" border ='1' align = "center" >
	<th>TYPE</th><th>OLD INFO</th><th>NEW INFO</th>
	
	<tr>
		<td align = 'center'>B#</td>
		<td> 
			<?php
				echo $row['bnumber'];
			?>
		</td> 
		<td><input type= 'text' name = 'bnumber' /></td>
	</tr>
	
	<tr>
		<td align = 'center'>Title</td>
		<td>
			<?php
				echo $row['title'];
			?>
		</td>
		<td><input type= 'text' name = 'title' /></td>
	</tr>
	
	<tr>
		<td align = 'center'>First Name</td>
		<td>
			<?php
				echo $row['firstname'];
			?>
		</td>
		<td><input type= 'text' name = 'firstname' /></td>
	</tr>
	
	<tr>
		<td align = 'center'>Middle Initial</td>
		<td>
			<?php
				echo $row['mi'];
			?>
		</td>
		<td><input type= 'text' name = 'mi' /></td>
	</tr>
	
	<tr>
		<td align = 'center'>Last Name</td>
		<td>
			<?php
				echo $row['lastname'];
			?>
		</td>
		<td><input type= 'text' name = 'lastname' /></td>
	</tr>
	
	<tr>
		<td align = 'center' >Email</td>
		<td>
			<?php
				echo $row['email']
			?>
		</td>
		<td><input type= 'text' name = 'email' /></td>
	</tr>
	
	<tr>
		<td align = 'center' >CPO</td>
		<td>
			<?php
				echo $row['cpo'];
			?>
		</td>
		<td><input type= 'text' name = 'cpo' /></td>
	</tr>
	
	<tr>
		<td align = 'center' >Academic Program</td>
		<td>
			<?php
				echo $row['ap_name'];
			?>
		</td>
		<td>
		<select name="program">
			<option value="" selected="selected" disabled="disabled">Select an Academic Program</option> 
			<?php while($selrow = mysqli_fetch_array($p_opt)) {
			 echo "<option value='" . $selrow['ID'] . "'>" . $selrow['ap_name'] . "</option>"; }
			?>
		</select>
		</td>
	</tr>
	
	<tr>
		<td align = 'center' >Ethnicity</td>
		<td>
			<?php
				echo $row['ename'];
			?>
		</td>
		<td>
		<select name="ethnicity">
			<option value="" selected="selected" disabled="disabled">Select an Ethnicity</option> 
			<?php while($selrow = mysqli_fetch_array($e_opt)) {
			 echo "<option value='" . $selrow['ethnicityID'] . "'>" . $selrow['ename'] . "</option>"; }
			?>
		</select>
		</td>
	</tr>
	
	<tr>
		<td align = 'center' >Gender</td>
		<td>
			<?php
				echo $row['gname'];
			?>
		</td>
		<td>
		<select name="gender">
			<option value="" selected="selected" disabled="disabled">Select a Gender</option> 
			<?php while($selrow = mysqli_fetch_array($g_opt)) {
			 echo "<option value='" . $selrow['genderID'] . "'>" . $selrow['gname'] . "</option>"; }
			?>
		</select>
		</td>
	</tr>
	
	<tr>
		<td align = 'center' >Status</td>
		<td>
			<?php
				echo $row['sname'];
			?>
		</td>
		<td>
		<select name="status" >
			<option value="" selected="selected" disabled="disabled">Select a Status</option> 
			<?php while($selrow = mysqli_fetch_array($s_opt)) {
			 echo "<option value='" . $selrow['statusID'] . "'>" . $selrow['sname'] . "</option>";}
			?>
		</select>
		</td>
	</tr>
	
	<tr>
		<td align = 'center' >Rank</td>
		<td> 
			<?php
				echo $row['rname'];
			?>
		</td>
		<td>
		<select name = "rank" >
			<option value="" selected="selected" disabled="disabled">Select a Rank</option> 
			<?php while ($selrow = mysqli_fetch_array($r_opt)) {
			 echo "<option value='" . $selrow['rankID'] . "'>" . $selrow['rname'] . "</option>";}
			?>
		</select>
		</td>
	</tr>
	
	</table>
	</div>
	
	<input class="btn-group btn-primary btn-sm" type = "Submit">
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
