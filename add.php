<?php
  session_start();
  if($_SESSION['user']){
  }
  else{
    header("location:index.php");
  }
  if($_SERVER['REQUEST_METHOD'] = "POST")
  {
    $details = $_POST['details'];
    $time = strftime("%X");
    $date = strftime("%B %d, %Y");
    $decision ="no";


    $db = new PDO('mysql:host=localhost;dbname=first_db;charset=utf8', 'root', 'password');
    foreach($_POST['public'] as $each_check)
    {
      if($each_check !=null ){ 
        $decision = "yes"; 
      }
    }
    $db->query("INSERT INTO list (details, date_posted, time_posted, public) VALUES ('$details', '$date', '$time', '$decision')");
    header("location: home.php");
  }
  else
  {
    header("location:home.php");
  }





//old code that is bad
  //  mysql_connect("localhost", "root","password") or die(mysql_error()); //Connect to server
  //  mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
    
 //  mysql_query("INSERT INTO list (details, date_posted, time_posted, public) VALUES ('$details','$date','$time','$decision')"); //SQL query
?>


