<?php $link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
or die(mysql_connect_error("Connection Failed"));


$toinsert = "no"; //assume that the relationship already exists.

$checkquery = $link -> query ("SELECT * FROM Attendance");
if ($checkquery -> num_rows != 0){
	while ($row = $checkquery -> fetch_array()){
		if (($row['f_ID'] == $_POST['fid']) and ($row['a_ID'] == $_POST['aid'])){
			$toinsert = "no";//do not insert
			break;
		}else{
			$toinsert = "yes"; //proceed with insertion.
		}
	}
}else{
	$toinsert = "yes"; //proceed with insertion.
}

if ($toinsert == "yes"){
	$f = $_POST['fid'];
	$a = $_POST['aid'];
	$insert = $link -> query ("INSERT INTO Attendance (f_ID, a_ID) VALUES ('$f','$a')");
	
	$fac = $link -> query ("SELECT * FROM faculty WHERE bnumber = '$f'");
	if ($checkquery -> num_rows != 0){
		while ($row = $checkquery -> fetch_array()){
			
		}
	}
	?>
	<div class="alert alert-success">
    <strong>Success!</strong> $name was added to the activity: $activity !
	</div>
	<?php
	
}else if ($toinsert == "no"){
	echo "That faculty has already been added to this activity.";
}

?>