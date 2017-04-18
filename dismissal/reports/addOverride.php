<?php include("../templates/header.php"); ?>
<html>
<head>
	<title>Add an Override</title>
	<script type="text/javascript" src="../js/overrideView.js"></script>
</head>
<body>
	<div id="status">
		<?php
			#Connect to MYSQL
			$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
			#Select the database
			$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
			
			if($_POST["date"] && $_POST["studentID"] && $_POST["busID"]) {
			
				$query = "INSERT INTO Override(date, studentID, busID, notes) VALUES('$_POST[date]', '$_POST[studentID]', '$_POST[busID]', '$_POST[notes]')";
					
				if (!mysql_query($query, $conn)) {
					echo ("Error: ".mysql_error ());
				} else {
					echo("Database updated successfully!<br />");
				}
			}
		?>
	</div>
	<form action="addOverride.php" method="post">
		<table>
			<tr>
				<td>Date:</td>
				<td><input type="text" id="date" name="date" /></td>
			</tr>
			<tr>
				<td>Student:</td>
				<td>
					<select id="studentID" name="studentID">
						<?php include("../controllers/Student/options.php"); ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Bus:</td>
				<td>
					<select id="busID" name="busID">
						<?php include("../controllers/Bus/options.php"); ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Special Instructions:</td>
				<td>
					<textarea cols="40" rows="5" name="notes"></textarea>
				</td>
			</tr>
		</table>
		
		<input type="submit" value="Submit Override" />
	</form>
	<div id="studentTable"></div>
	<div id="overrideTable"></div>
</body>
</html>
<?php include("../templates/footer.php"); ?>