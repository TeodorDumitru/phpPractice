<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $bool = true;


    $db = new PDO('mysql:host=localhost;dbname=first_db;charset=utf8', 'root', 'password');

    foreach($db->query("SELECT * FROM users WHERE username='$username'") as $row) {
      $table_users = $row['username']; query is finished
      $table_password = $row['password']; 
    }
    if(isset($table_users)) {
    if(($username == $table_users) && password_verify($password, $table_password))
       {
             $_SESSION['user'] = $username;
             header("location: home.php");
       }
       else
       {
        Print '<script>alert("Incorrect Password!");</script>';
        Print '<script>window.location.assign("login.php");</script>';
       }
    }
    else{
      Print '<script>alert("Incorrect username!");</script>'; 
        Print '<script>window.location.assign("login.php");</script>'; 
    }

//Old code with depricated things
  //  mysql_connect("localhost", "root", "password") or die (mysql_error()); //Connect to server
 //   mysql_select_db("first_db") or die ("Cannot connect to database"); //Connect to database
 //   $query = mysql_query("Select * from users WHERE username='$username'"); // Query the users table
 //   $exists = mysql_num_rows($query); //Checks if username exists



//    $table_users = "";
 ///   $table_password = "";
   // if($exists > 0) //IF there are no returning rows or no existing username
  //  {
   //    while($row = mysql_fetch_assoc($query)) // display all rows from query
    //   {
     //     $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
      //    $table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
//       }
 //      if(($username == $table_users) && password_verify($password, $table_password))// checks if there are any matching fields
 //      {
 //            $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
 //            header("location: home.php"); // redirects the user to the authenticated home page
 //      }
 //      else
 //      {
  //      Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
  //      Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
  //     }
//    }
//    else
//    {
 //       Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
  //      Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
   // }
?>