<?php include("../../templates/header.php"); ?>
<html>
<head>
	<title>Add Bus</title>
</head>
<body>
	<div id="status">
		<?php
			#Connect to MYSQL
			$conn = @mysql_connect("localhost", "kippgast_mnichol", "Yumyum92!!!");
				
			#Select the database
			$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
			
			if($_POST["name"]) {
				$query = "INSERT INTO Bus(busID, name, lineName, lineOrder, driverName) VALUES('$_POST[busID]', '$_POST[name]', '$_POST[lineName]', '$_POST[lineOrder]', '$_POST[driverName]')";
				
				if (!mysql_query($query, $conn)) {
					echo ("Error: ".mysql_error ());
				} else {
					echo("Database updated successfully!");
				}
			}
		?>
	</div>
	<div id="top">
		<h1>Add Bus</h1>
		<form name="input" action="add.php" method="post">
			<table>
				<tr>
					<td>Bus ID:</td> 
					<td><input type="text" name="busID"></td>
				</tr>
				<tr>
					<td>Name:</td> 
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>Line:</td>
					<td><select name="lineName"><?php include("../Line/options.php"); ?></select></td>
				</tr>
				<tr>
					<td>Line Order:</td>
					<td><select name="lineOrder"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
				</tr>
				<tr>
					<td>Driver Name:</td>
					<td><input type="text" name="driverName"></td>
				</tr>
			</table>
			<input type="submit" value="Submit">
		</form>
	</div>
	<div id="bottom">
		<?php include("list.php"); ?>
	</div>
</body>
</html>
<?php include("../../templates/footer.php"); ?>