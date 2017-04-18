<!-- Links in the header/footer need absolute paths -->

<?php
	#Supposed to be a template for connecting to the database, 
	#but can't seem to get it to work.
	
	#Connect to MYSQL
	$conn = @mysql_connect("mysql.kippenc.org", "kippgast_mnichol", "Yumyum92!!!");
				
	#Select the database
	$rs = @mysql_select_db("kippgast_dismissal", $conn) or die('.mysql_error');
?>