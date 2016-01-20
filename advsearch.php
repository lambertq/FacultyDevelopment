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
      </div>
<CENTER class="jumfix">
	<h1>Advanced Search</h1>
      <div class="jumbotron">
        <p class="lead">
		<?php $link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
		or die(mysql_connect_error("Connection Failed"));
		$gen_op = $link->query("SELECT * FROM gender_T");
		$rank_op = $link->query("SELECT * FROM rank_T");
		$loc_op = $link->query("SELECT * FROM location_t");
		$type_op = $link->query("SELECT * FROM type_t");
		$eth_op = $link->query("SELECT * FROM ethnicity_T");
		$goal_op = $link->query("SELECT * FROM goal_t");
		$status_op = $link->query("SELECT * FROM status_T");
		$prog_op = $link->query("SELECT * FROM academic_p");
		$act_op = $link->query("SELECT * FROM Activities_t");
		?>
		
		<?php
		if(!isset($_POST['select'])){
		?>
		<!--Determine type of search-->
		<form action = "advsearch.php" method = "post">
		<input type="radio" name="select" value="fac" checked>Search Faculty
		<br/>
		<input type="radio" name="select" value="act"> Search Activities
		<br/>
		<input type="radio" name="select" value="both"> Search by Attendance (both)
		<br/>
		<br/>
		<input class = "btn-group btn-primary btn-sm" type ="submit" />
		</form>
		<?php
		}
		else if($_POST['select'] == 'fac'){
			session_start();
			$_SESSION['advopt'] = "f";
		?>
			<form action = "adsresult.php" method = "post">
			<table class = "table-condensed table-striped table-hover" border ='1' align = "center" >
			<td align='center'><b><u>Faculty</u></b></td>
			<tr>
				<td align = "center">
					Gender: <br/>
					<select name="f_gen"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($gen_op)) {
						echo "<option value='" . $row['genderID'] . "'>" . $row['gname'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Rank: <br />
					<select name="f_rank"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($rank_op)) {
						echo "<option value='" . $row['rankID'] . "'>" . $row['rname'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Ethnicity: <br />
					<select name="f_eth"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($eth_op)) {
						echo "<option value='" . $row['ethnicityID'] . "'>" . $row['ename'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Status: <br />
					<select name="f_status"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($status_op)) {
						echo "<option value='" . $row['statusID'] . "'>" . $row['sname'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Academic Program: <br />
					<select name="f_prog"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($prog_op)) {
						echo "<option value='" . $row['ID'] . "'>" . $row['ap_name'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Academic Divisions: <br />
					<select name="f_div"> 
					<option value = "" selected="selected"></option>
					<option value='I'>I</option>
					<option value='II'>II</option>
					<option value='III'>III</option>
					<option value='IV'>IV</option>
					<option value='V'>V</option>
					<option value='VI'>VI</option>
					</select>
				</td>
			</tr>
			</table>
			</div>
			<input class = "btn-group btn-primary btn-sm" type ="submit" />
			</form>
		<?php	
		}
		else if($_POST['select'] == 'act'){
			session_start();
			$_SESSION['advopt'] = "a";
		?>
			<form action = "adsresult.php" method = "post">
			<table class = "table-condensed table-striped table-hover" border ='1' align = "center" >
			<td align='center'><b><u>Activity</u></b></td>
			<tr>
				<td align = "center">
					Location: <br/>
					<select name="a_loc"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($loc_op)) {
						echo "<option value='" . $row['ID'] . "'>" . $row['name'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Type: <br />
					<select name="a_type"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($type_op)) {
						echo "<option value='" . $row['ID'] . "'>" . $row['t_name'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Goal: <br />
					<select name="a_goal"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($goal_op)) {
						echo "<option value='" . $row['ID'] . "'>" . $row['g_name'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			</table>
			</div>
			<input class = "btn-group btn-primary btn-sm" type ="submit" />
			</form>
		<?php
		}
		else if($_POST['select'] == 'both'){
			session_start();
			$_SESSION['advopt'] = "b";
		?>
			<form action = "adsresult.php" method = "post">
			<table class = "table-condensed table-striped table-hover" border ='1' align = "center" >
			<td align='center'><b><u>Faculty</u></b></td><td align='center'><b><u>Activity</u></b></td>
			<tr>
				<td align = "center">
					Gender: <br/>
					<select name="f_gen"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($gen_op)) {
						echo "<option value='" . $row['genderID'] . "'>" . $row['gname'] . "</option>";
					}
					?>
					</select>
				</td>
				<td align = "center">
					Location: <br />
					<select name="a_loc"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($loc_op)) {
						echo "<option value='" . $row['ID'] . "'>" . $row['name'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Rank: <br />
					<select name="f_rank"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($rank_op)) {
						echo "<option value='" . $row['rankID'] . "'>" . $row['rname'] . "</option>";
					}
					?>
					</select>
				</td>
				<td align = "center">
					Type: <br />
					<select name="a_type"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($type_op)) {
						echo "<option value='" . $row['ID'] . "'>" . $row['t_name'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Ethnicity: <br />
					<select name="f_eth"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($eth_op)) {
						echo "<option value='" . $row['ethnicityID'] . "'>" . $row['ename'] . "</option>";
					}
					?>
					</select>
				</td>
				<td align = "center">
					Goal: <br />
					<select name="a_goal"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($goal_op)) {
						echo "<option value='" . $row['ID'] . "'>" . $row['g_name'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Status: <br />
					<select name="f_status"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($status_op)) {
						echo "<option value='" . $row['statusID'] . "'>" . $row['sname'] . "</option>";
					}
					?>
					</select>
				</td>
				<td align = "center">
					Activity Title: <br />
					<select name="a_title"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($act_op)) {
						echo "<option value='" . $row['Title'] . "'>" . $row['Title'] . "</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align = "center">
					Academic Program: <br />
					<select name="f_prog"> 
					<option value = "" selected="selected"></option>
					<?php
					while($row = mysqli_fetch_array($prog_op)) {
						echo "<option value='" . $row['ID'] . "'>" . $row['ap_name'] . "</option>";
					}
					?>
					</select>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align = "center">
					Academic Divisions: <br />
					<select name="f_div"> 
					<option value = "" selected="selected"></option>
					<option value='I'>I</option>
					<option value='II'>II</option>
					<option value='III'>III</option>
					<option value='IV'>IV</option>
					<option value='V'>V</option>
					<option value='VI'>VI</option>
					</select>
				</td>
				<td>&nbsp;</td>
			</tr>
			</table>
			</div>
			<input class = "btn-group btn-primary btn-sm" type ="submit" onclick = 'validate()'/>
			<script>function validate () {
				console.log("It worked");
			}</script>
			</form>
		<?php
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