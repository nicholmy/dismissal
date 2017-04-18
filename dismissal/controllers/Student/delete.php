<?php include("../../templates/header.php"); ?>
<html>
<head>
	<title>Delete Student</title>
</head>
<body>
	<div id="status">
		<?php
			#Connect to MYSQL
			$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
			#Select the database
			$rs = @mysql_select_db("kippgast_dismissal", $conn) or die(mysql_error());
			
			if($_POST["studentID"]) {
				$query = "DELETE FROM Student WHERE id = '$_POST[studentID]'";
				 
				if (!mysql_query($query, $conn)) {
					echo ("Error: ".mysql_error () . "<br />Query: " . $query);
				} else {
					echo("Student deleted successfully!");
					$sid = mysql_insert_id($conn);
					
					$query2 = "DELETE FROM Assignment WHERE studentID='$_POST[studentID]'";
								
					$result = mysql_query($query2, $conn) or die("Error: ".mysql_error());
					
					echo("<br />All Assignments for this student deleted successfully!");
				}
			}
		?>
	</div>
	<div id="top">
		<h1>Delete Student</h1>
		<form action="delete.php" method="post">
			WARNING: Deleting students using this page will delete all of their Assignments for the week, too!
			<table>
				<tr>
					<td>Student:</td>
					<td>
						<select id="studentID" name="studentID">
							<?php include("options.php"); ?>
						</select>
					</td>
				</tr>
			</table>
			<input type="submit" value="Delete">
		</form>
	</div>
	<div id="bottom">
		<?php include("list.php"); ?>
	</div>
</body>
</html>
<?php include("../../templates/footer.php"); ?>