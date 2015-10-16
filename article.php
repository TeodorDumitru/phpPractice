<html>
	<body>
	<?php
		$id = $_GET['id'];
		$db = new PDO('mysql:host=localhost;dbname=first_db;charset=utf8', 'root', 'password');
		foreach($db->query("SELECT * FROM list WHERE id='$id'") as $row) {
			Print "<p>ID: " . $row['id'] . "</p>";
			Print "<p>Details: " . $row['details'] . "</p>";
			Print "<p>Date Posted: " . $row['date_posted'] . "</p>";
			Print "<p>Time Posted: " . $row['time_posted'] . "</p>";
			Print "<p>Date Edited: " . $row['date_edited'] . "</p>";
			Print "<p>Time Edited: " . $row['time_edited'] . "</p>";
			Print "<p>Public: " . $row['public'] . "</p>";
		}
	?>
	
	<a href="home.php"> Click here to go back.</a>

	</body>
</html>