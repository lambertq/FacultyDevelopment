<?php
$link = NEW MySQLi('localhost', 'development', 'leslie', 'development')
or die(mysql_connect_error("Connection Failed"));
?>
<html>
<body>
<head>
<title>Results Page</title>
<CENTER>
<h1> Result Page </h1>
<table border=1><tbody>

<?php
$homeclick = $_POST['PageChange'];
if ($homeclick == "View All Activities"){
	echo("<tr><th>Title</th><th>Date</th><th>Location</th><th>Type</th><th>Goal</th><th>Description</th><th>Narrative</th></tr>");

	$query = $link -> query("SELECT * FROM Activities_t, location_t, type_t, goal_t
								WHERE Activities_t.Location = location_t.ID
								AND Activities_t.Type = type_t.ID
								AND Activities_t.Goal = goal_t.ID");
	if ($query -> num_rows !=0){
		while($row = $query -> fetch_array()){
			$title = $row['Title'];
			$date = $row['Date'];
			$location = $row['name'];
			$type = $row['t_name'];
			$goal = $row['g_name'];
			$description = $row['Description'];
			$narrative = $row['Narrative'];
			echo "<tr><th>".$title."</th><th>".$date."</th><th>".$location."</th><th>".$type."</th>
			<th>".$goal."</th><th>".$description."</th><th>".$narrative."</th></tr>\n";
		}
	}
}if ($homeclick == "View All Faculty"){
	echo("<tr><th>Title</th><th>Date</th><th>Location</th><th>Type</th><th>Goal</th><th>Description</th><th>Narrative</th></tr>");

	$query = $link -> query("SELECT * FROM Faculty_Placeholder");
	if ($query -> num_rows !=0){
		while($row = $query -> fetch_array()){
			$title = $row['Title'];
			$date = $row['Date'];

			$type = $row['Type'];
			$goal = $row['Goal'];
			$description = $row['Description'];
			$narrative = $row['Narrative'];
			echo "<tr><th>".$title."</th><th>".$date."</th><th>".$location."</th><th>".$type."</th>
			<th>".$goal."</th><th>".$description."</th><th>".$narrative."</th></tr>\n";
		}
	}
}

?>
</tbody></table>
</body>
</html>
