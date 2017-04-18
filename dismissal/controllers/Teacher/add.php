<?php include("../../templates/header.php"); ?>
<html>
<head>
	<title>Add Teacher</title>
</head>
<body>
	<div id="status">
		<?php
			#Connect to MYSQL
			$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
			#Select the database
			$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
			
			if($_POST["lastName"]) {
				$query = "INSERT INTO Teacher(teacherID, firstName, lastName) VALUES(NULL, '$_POST[firstName]', '$_POST[lastName]')";
				
				if (!mysql_query($query, $conn)) {
					die ("Error: ".mysql_error ());
				} else {
					echo("Database updated successfully!");
				}
			}
		?>
	</div>
	<div id="top">
		<h1>Add Teacher</h1>
		<form name="input" action="add.php" method="post">
			First Name: <input type="text" name="firstName" /> <br />
			Last Name: <input type="text" name="lastName" /> <br />
			Bus Line: <select name="lineName"><?php include("../Line/options.php"); ?></select> <br />
			<input type="submit" value="Submit" />
		</form>
	</div>
	<div id="bottom">
		<?php include("list.php"); ?>
	</div>
</body>
</html>
<?php include("../../templates/footer.php"); ?>