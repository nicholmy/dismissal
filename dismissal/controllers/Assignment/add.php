<?php include("../../templates/header.php"); ?>
<html>
<head>
	<title>Add Assignment</title>
</head>
<body>
	<div id="status">
		<?php
			#Connect to MYSQL
			$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
			#Select the database
			$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
			
			if($_POST["studentID"]) {
			
				foreach($_POST['dayIDs'] as $day) {
				
					$query = "INSERT INTO Assignment(dayID, studentID, busID) VALUES('" . $day . "', '$_POST[studentID]', '$_POST[busID]')";
					
					if (!mysql_query($query, $conn)) {
						echo ("Error: ".mysql_error ());
					} else {
						echo("Database updated successfully!<br />");
					}
				}
			}
		?>
	</div>
	<div id="top">
		<h1>Add Assignment</h1>
		<form name="input" action="add.php" method="post">
			<table>
				<tr>
					<td>Day:</td> 
					<td><?php include("../Day/radios.php"); ?></td>
				</tr>
				<tr>
					<td>Student:</td>
					<td><select name="studentID"><?php include("../Student/options.php"); ?></select></td>
				<tr>
					<td>Bus:</td> 
					<td><select name="busID"><?php include("../Bus/options.php"); ?></select></td>
				</tr>
			</table>
			<input type="submit" value="Submit" />
		</form>
	</div>
</body>
</html>
<?php include("../../templates/footer.php"); ?>