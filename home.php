<html>
<body>
<head>
<title>Faculty Tracking</title>
<CENTER><!--Center of da page :D-->
<h2>Faculty Tracking</h2>
<table border=2><tbody>
<tr><th> <h3>Faculty</h3> </th><th> <h3>Activity</h3> </th></tr>
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
</CENTER><!--center of da page :D-->
</head>
</body>
</html>