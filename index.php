<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <?php
            echo "<p>Hello World!</p>";
        ?>
        <a href="login.php"> Click here to login </a> <br>
        <a href="register.php"> Click here to register </a>
    </body>
    <br/>
	<h2 align="center">List</h2>
	<table width="100%" border="1px">
			<tr>
				<th>Id</th>
				<th>Details</th>
				<th>Post Time</th>
				<th>Edit Time</th>
			</tr>
			<?php
				session_start();
				$db = new PDO('mysql:host=localhost;dbname=first_db;charset=utf8', 'root', 'password');
				//mysql_connect("localhost", "root","password") or die(mysql_error()); //Connect to server
				//mysql_select_db("first_db") or die("Cannot connect to database"); //connect to database
				if(isset($_SESSION['user'])){
					$query = $db->query("SELECT * FROM list"); 
			  	}
			  	else {
			  		$query = $db->query("SELECT * FROM list WHERE public='yes'"); 
			  	}
				foreach($query as $row){
					Print "<tr>";
						Print '<td align="center">'. $row['id'] . "</td>";
						Print '<td align="center">'. $row['details'] . "</td>";
						Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
						Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
					Print "</tr>";
				}
			?>
	</table>
</html> 