<html>
  <head>
    <title>My first PHP website</title>
  </head>
  <body>
    <h2>Registration Page</h2>
    <a href="index.php">Click here to go back</a><br/><br/>
    <form action="register.php" method="post">
      Enter Username: <input type="text" name="username" required="required"/> <br/>
      Enter Password: <input type="password" name="password" required="required" /> <br/>
      <input type="submit" value="Register"/>
    </form>
  </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];
    $bool = true;
    $db = new PDO('mysql:host=localhost;dbname=first_db;charset=utf8', 'root', 'password');
    foreach($db->query('SELECT * FROM users') as $row) {
      $table_users = $row['username']; 
      if($username == $table_users) 
      {
        $bool = false; 
        Print '<script>alert("Username has been taken!");</script>';
        Print '<script>window.location.assign("register.php");</script>'; 
      }
    }
  }
  if($bool)
  {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $affected_rows = $db->exec("INSERT INTO users (username, password) VALUES ('$username','$password')");
    Print '<script>alert("Successfully Registered!");</script>'; 
    Print '<script>window.location.assign("register.php");</script>';
  }
?>