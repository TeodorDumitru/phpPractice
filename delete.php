<?php
    session_start();
    if($_SESSION['user']){
    }
    else {
       header("location:index.php");
    }

    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
      $db = new PDO('mysql:host=localhost;dbname=first_db;charset=utf8', 'root', 'password');
      $id = $_GET['id'];
      $db->query("DELETE FROM list WHERE id='$id'");
      header("location:home.php");
      
      // mysql_connect("localhost", "root", "password") or die(mysql_error()); //connect to server
      // mysql_select_db("first_db") or die("cannot connect to database"); //Connect to database
      // mysql_query("DELETE FROM list WHERE id='$id'");
    }
?>