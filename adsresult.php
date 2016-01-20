<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript" src="tableExport.js"></script>

<script type="text/javascript" src="jquery.base64.js"></script>


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
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/tables.css" rel="stylesheet">

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

    <div class="container" >
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
	<h1>Advanced Search Results</h1>
      <div class="jumbotron">
        <p class="lead">
		<?php
		//CONNECT TO DATABASE
		$link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
		or die(mysql_connect_error("Connection Failed"));
		
		//Access session variable
		session_start();
		$search = $_SESSION['advopt'];
		
		//////////////////////////////////////////////////////////////////////////////////////
		//FACULTY QUERY
		if($search == "f"){
			
			// retrieve POSTS
			$Gender = $_POST['f_gen'];
			$Rank = $_POST['f_rank'];
			$Ethnicity = $_POST['f_eth'];
			$Status = $_POST['f_status'];
			$Program = $_POST['f_prog'];
			$Div = $_POST['f_div'];
			
			//begin query
			$advquery = "SELECT * FROM faculty, academic_p, gender_T, status_T, rank_T, ethnicity_T
										 WHERE faculty.program = academic_p.ID
										 AND faculty.ethnicity = ethnicity_T.ethnicityID
										 AND faculty.gender = gender_T.genderID
										 AND faculty.status = status_T.statusID
										 AND faculty.rank = rank_T.rankID ";
			$where = "";
			
			//filter query
			if($Gender != Null){
				$where = $where."AND faculty.gender = '$Gender' ";
			}

			if($Rank != Null){
				$where = $where."AND faculty.rank = '$Rank' ";
			}
			
			if($Ethnicity != Null){
				$where = $where."AND faculty.ethnicity = '$Ethnicity' ";
			}
			
			if($Status != Null){
				$where = $where."AND faculty.status = '$Status' ";
			}
			
			if($Program != Null){
				$where = $where."AND faculty.program = '$Program' ";
			}
			
			if($Div != Null){
				$where = $where."AND academic_p.division = '".$Div."' ";
			}
			
			//Make and use query
			$advquery = $advquery.$where;
			$find = $link->query($advquery);
			
			//Display
			if ($find -> num_rows !=0){
				echo "<div class = 'table-responsive'>";
				echo "<table class = 'table-striped table-condensed tables' align='center' border=1><tbody>";
				$thetable = "";
				$numtimes = 0;
				echo("<tr><td align='center'><b>BNumber</b></td><td align='center'><b>Title</b></td>
					<td align='center'><b>First Name</b></td><td align='center'><b> MI </b></td>
					<td align='center'><b>Last Name </b></td><td align='center'><b>Email</b></td>
					<td align='center'><b>CPO </b></td><td align='center'><b> Academic Program </b></td>
					<td align='center'><b> Division </b></td><td align='center'><b> Ethinicity </b></td>
					<td align='center'><b> Gender </b></td><td align='center'><b> Status </b></td><td align='center'><b> Rank </b></td></tr>");
				while($row = $find -> fetch_array()){
					$bnum = $row['bnumber'];
					$title = $row['title'];
					$fname = $row['firstname'];
					$mi = $row['mi'];
					$lname = $row['lastname'];
					$email = $row['email'];
					$cpo = $row['cpo'];
					$prog = $row['ap_name'];
					$div = $row['division'];
					$ethnicity = $row['ename'];
					$gender = $row['gname'];
					$status = $row['sname'];
					$rank = $row['rname'];
					$thetable = $thetable."<tr><td align='center'>".$bnum."</td><td align='center'>".$title."</td>
					<td align='center'>".$fname."</td><td align='center'>".$mi."</td><td align='center'>".$lname."</td>
					<td align='center'>".$email."</td><td align='center'>".$cpo."</td><td align='center'>".$prog."</td>
					<td align='center'>".$div."</td><td align='center'>".$ethnicity."</td><td align='center'>".$gender."</td>
					<td align='center'>".$status."</td><td align='center'>".$rank."</td></tr>\n";
					$numtimes++;
				}
				echo $numtimes." Faculty Member(s)";
				echo $thetable;
				echo "</table>";
				echo "</div>";
			}
			else{
				echo "No results.";
			}
		}
		
		//////////////////////////////////////////////////////////////////////////////////////
		//ACTIVITY QUERY
		else if($search == "a"){
			
			// retrieve POSTS
			$Location = $_POST['a_loc'];
			$Type = $_POST['a_type'];
			$Goal = $_POST['a_goal'];
			
			//begin query
			$advquery = "SELECT * FROM Activities_t, location_t, type_t, goal_t 
										WHERE Activities_t.Location = location_t.ID
										AND Activities_t.Type = type_t.ID
										AND Activities_t.Goal = goal_t.ID ";
			$where = "";
			
			//filter query
			if($Location != Null){
				$where = $where."AND Activities_t.location = '$Location' ";
			}

			if($Type != Null){
				$where = $where."AND Activities_t.type = '$Type' ";
			}
			
			if($Goal != Null){
				$where = $where."AND Activities_t.goal = '$Goal' ";
			}
			
			//Make and use query
			$advquery = $advquery.$where;
			$find = $link->query($advquery);
			
			//Display
			if ($find -> num_rows !=0){
				$thetable = "";
				$numtimes = 0;
				echo "<div class = 'table-responsive'>";
				echo "<table class = 'table-striped table-condensed tables' align='center' border=1><tbody>";
				echo("<tr><td align='center'><b>Title</b></td><td align='center'><b>Date</b></td>
				<td align='center'><b>Time</b></td><td align='center'><b>Location</b></td>
				<td align='center'><b>Type</b></td><td align='center'><b>Goal</b></td></tr>");
				while($row = $find -> fetch_array()){
					$title = $row['Title'];
					$dcon = DateTime::createFromFormat('Y-m-d', $row['Date']);
					$date = $dcon->format('M/d/Y');
					$tcon = DateTime::createFromFormat('G:i:s', $row['Time']);
					$time = $tcon->format('g:iA');
					$location = $row['name'];
					$type = $row['t_name'];
					$goal = $row['g_name'];
					$thetable = $thetable."<tr><td align='center'>".$title."</td><td align='center'>".$date."</td>
					<td align='center'>".$time."</td><td align='center'>".$location."</td>
					<td align='center'>".$type."</td><td align='center'>".$goal."</td></tr>\n";
					$numtimes++;
				}
				echo "".$numtimes." Activities";
				echo $thetable;
				echo "</table>";
				echo "</div>";
			}
			else{
				echo "No results.";
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////
		// ATTENDANCE QUERY
		else if($search == "b"){
			
			//Get POSTS
			$Gender = $_POST['f_gen'];
			$Rank = $_POST['f_rank'];
			$Ethnicity = $_POST['f_eth'];
			$Status = $_POST['f_status'];
			$Program = $_POST['f_prog'];
			$Div = $_POST['f_div'];
			$Location = $_POST['a_loc'];
			$Type = $_POST['a_type'];
			$Goal = $_POST['a_goal'];
			$Title = $_POST['a_title'];
			
			//begin query
			$advquery = "SELECT * ";
			$from = "FROM Activities_t, faculty, Attendance, type_t, academic_p ";
			$where = "";
			
			//BOOLEANS
			$first = True;

			//FACULTY:
			if($Gender != Null){
				if($first){
					$where = $where."WHERE faculty.gender = '$Gender' ";
					$first = False;
				}
				else{
					$where = $where."AND faculty.gender = '$Gender' ";
				}
			}

			if($Rank != Null){
				if($first){
					$where = $where."WHERE faculty.rank = '$Rank' ";
					$first = False;
				}
				else{
					$where = $where."AND faculty.rank = '$Rank' ";
				}
			}
			
			if($Ethnicity != Null){
				if($first){
					$where = $where."WHERE faculty.ethnicity = '$Ethnicity' ";
					$first = False;
				}
				else{
					$where = $where."AND faculty.ethnicity = '$Ethnicity' ";
				}
			}
			
			if($Status != Null){
				if($first){
					$where = $where."WHERE faculty.status = '$Status' ";
					$first = False;
				}
				else{
					$where = $where."AND faculty.status = '$Status' ";
				}
			}
			
			if($Program != Null){
				if($first){
					$where = $where."WHERE faculty.program = '$Program' ";
					$first = False;
				}
				else{
					$where = $where."AND faculty.program = '$Program' ";
				}
			}
			
			if($Div != Null){
				if($first){
					$where = $where."WHERE academic_p.division = '".$Div."' ";
					$first = False;
				}
				else{
					$where = $where."AND academic_p.division = '".$Div."' ";
				}
			}
			
			//ACTIVITIES:
			if($Location != Null){
				if($first){
					$where = $where."WHERE Activities_t.Location = '$Location' ";
					$first = False;
				}
				else{
					$where = $where."AND Activities_t.Location = '$Location' ";
				}
			}

			if($Type != Null){
				if($first){
					$where = $where."WHERE Activities_t.Type = '$Type' ";
					$first = False;
				}
				else{
					$where = $where."AND Activities_t.Type = '$Type' ";
				}
			} 
			
			if($Goal != Null){
				if($first){
					$where = $where."WHERE Activities_t.Goal = '$Goal' ";
					$first = False;
				}
				else{
					$where = $where."AND Activities_t.Goal = '$Goal' ";
				}
			}
			
			if($Title != Null){
				if($first){
					$where = $where."WHERE Activities_t.Title = '$Title' ";
					$first = False;
				}
				else{
					$where = $where."AND Activities_t.Title = '$Title' ";
				}
			}

			//BUILD QUERY
			if($first){
				$where = $where."WHERE faculty.bnumber = Attendance.f_ID AND Activities_t.ID = Attendance.a_ID
				AND faculty.program = academic_p.ID AND Activities_t.Type = type_t.ID";
			}
			else{
				$where = $where."AND faculty.bnumber = Attendance.f_ID AND Activities_t.ID = Attendance.a_ID
				AND faculty.program = academic_p.ID AND Activities_t.Type = type_t.ID";
			}
			$advquery = $advquery.$from.$where." GROUP BY faculty.lastname, Activities_t.Title";
			$find = $link->query($advquery);
			
			//UNIQUE FACULTY NAMES
			$fq = "SELECT DISTINCT bnumber ";
			$fq = $fq.$from.$where;
			$fq = $link->query($fq);
			
			//UNIQUE ACTIVITY NAMES
			$aq = "SELECT DISTINCT Activities_t.ID ";
			$aq = $aq.$from.$where;
			$aq = $link->query($aq);
			
			
	
			//DISPLAY 
			
			////////////////////////////////////////////////////START TAB 1///////////////////////////////////////////
			?>

			<?php
			if($find->num_rows != 0){
				$numtimes = 0;
				$fac_num = 0;
				$thetable = "";
				$namecatch = "";
				echo "<div class = 'table-responsive'>";
				echo "<table class = 'table-striped table-condensed tables' align='center' border=1><tbody>";
				echo "<tr><td align='center'><b>Faculty Name</b></td>
				<td align='center'><b>Academic Program</b></td>
				<td align='center'><b>Activity Name</b></td>
				<td align='center'><b>Activity Type</b></td></tr>";
				while($row = $find->fetch_array()){
					$Name = $row['firstname']." ".$row['mi']." ".$row['lastname'];
					$Program = $row['ap_name'];
					$Title = $row['Title'];
					$Type = $row['t_name'];
					if($namecatch != $Name){
						//$thetable = $thetable."<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
						$thetable = $thetable."<tr><td align = 'center'>".$Name."</td><td align='center'>".$Program."</td>
						<td align = 'center'>".$Title."</td><td align='center'>".$Type."</td></tr>";
						$fac_num++;
					}
					else{
						$thetable = $thetable."<tr><td align = 'center'>&nbsp;</td><td align='center'>&nbsp;</td>
						<td align = 'center'>".$Title."</td><td align='center'>".$Type."</td></tr>";
					}
					$numtimes++;
					$namecatch = $Name;
				}
				echo $numtimes." entries.";
				echo "<br/>";
				echo $thetable;
				echo "</table>";
				echo "<br/>";
				echo "</div>";
			}
			else{
				echo "No results";
			}
			
			////////////////////////////////////////////////////END TAB 1///////////////////////////////////////////
			////////////////////////////////////////////////////START TAB 2///////////////////////////////////////////
			?>
		
			<?php
			//FAC TABLE
			if($fq->num_rows != 0){
				$fac_num = 0;
				$fac_t = "";
				echo "<div class = 'table-responsive'>";
				echo "<table class = 'table-striped table-condensed tables' align='center' border=1><tbody>";
				echo "<tr><td align='center'><b>Faculty Name</b></td><td align='center'><b>Academic Program</b></td></tr>";
				while($row = $fq->fetch_array()){
					$BNumber = $row['bnumber'];
					$quick = $link->query("SELECT firstname, mi, lastname, ap_name FROM faculty, academic_p 
					WHERE bnumber = '$BNumber' AND faculty.program = academic_p.ID");
					$r = $quick->fetch_array();
					$name = $r['firstname']." ".$r['mi']." ".$r['lastname'];
					$fac_t = $fac_t."<tr><td align = 'center'>".$name."</td><td align = 'center'>".$r['ap_name']."</td></tr>";
					$fac_num++;
				}
				echo $fac_num." Faculty Member(s)";
				echo $fac_t;
				echo "</table>";
				echo "</div>";
				echo "<br/>";
			}
			else{
				echo "No Faculty results";
			}
			
			////////////////////////////////////////////////////END TAB 2///////////////////////////////////////////
			////////////////////////////////////////////////////START TAB 3///////////////////////////////////////////
			?>
			<?php
			if($aq->num_rows != 0){
				$act_num = 0;
				$act_t = "";
				echo "<div class = 'table-responsive'>";
				echo "<table class = 'table-striped table-condensed tables' align='center' border=1><tbody>";
				echo "<tr><td align='center'><b>Activity Name</b></td><td align='center'><b>Activity Type</b></td></tr>";
				while($row = $aq->fetch_array()){
					$ID = $row['ID'];
					$quick = $link->query("SELECT Title, t_name FROM Activities_t, type_t 
					WHERE Activities_t.ID = '$ID' AND Activities_t.Type = type_t.ID");
					$r = $quick->fetch_array();
					$act_t = $act_t."<tr><td align = 'center'>".$r['Title']."</td><td align = 'center'>".$r['t_name']."</td></tr>";
					$act_num++;
				}
				echo $act_num." Activities";
				echo $act_t;
				echo "</table>";
				echo "</div>";
			}
			else{
				echo "No Activity results";
			}
			?>
				
			<?php
			////////////////////////////////////////////////////END TAB 3///////////////////////////////////////////
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