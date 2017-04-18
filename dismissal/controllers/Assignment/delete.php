<?php include("../../templates/header.php"); ?>
<html>
<head>
	<title>Delete Assignment</title>
</head>
<body>
	<div id="status">
		<?php
			#Connect to MYSQL
			$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
			#Select the database
			$rs = @mysql_select_db("kippgast_dismissal", $conn) or die(mysql_error());
			
			if($_POST["assignmentID"]) {
				$query = "DELETE FROM Assignment WHERE id = '$_POST[assignmentID]'";
				 
				if (!mysql_query($query, $conn)) {
					echo ("Error: ".mysql_error () . "<br />Query: " . $query);
				} else {
					echo("Assignment deleted successfully!");
				}
			}
		?>
	</div>
	<div id="top">
		<h1>Delete Assignments</h1>
		<form action="delete.php" method="post">
			<table>
				<tr>
					<td>Assignment:</td>
					<td>
						<select id="assignmentID" name="assignmentID">
							<?php include("options.php"); ?>
						</select>
					</td>
				</tr>
			</table>
			<input type="submit" value="Delete">
		</form>
	</div>
</body>
</html>
<?php include("../../templates/footer.php"); ?>