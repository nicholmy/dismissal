<?php include("../../templates/header.php"); ?>
<html>
<head>
	<title>Delete Overrides</title>
</head>
<body>
	<div id="status">
		<?php
			#Connect to MYSQL
			$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
			#Select the database
			$rs = @mysql_select_db("kippgast_dismissal", $conn) or die(mysql_error());
			
			if($_POST["overrideID"]) {
				$query = "DELETE FROM Override WHERE id = '$_POST[overrideID]'";
				 
				if (!mysql_query($query, $conn)) {
					echo ("Error: ".mysql_error () . "<br />Query: " . $query);
				} else {
					echo("Override deleted successfully!");
				}
			}
		?>
	</div>
	<div id="top">
		<h1>Delete Overrides</h1>
		You can only delete the latest 100 overrides in the system.
		<form action="delete.php" method="post">
			<table>
				<tr>
					<td>Override:</td>
					<td>
						<select id="overrideID" name="overrideID">
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