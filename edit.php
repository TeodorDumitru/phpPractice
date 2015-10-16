<html>
  <head>
    <title>My first PHP website</title>
  </head>
  <?php
  session_start();
  if($_SESSION['user']){ 
  }
  else{
    header("location:index.php");
  }
  $user = $_SESSION['user'];
  $id_exists = false;
  $old_details = "";
  $old_public = "";
  ?>
  <body>
    <h2>Home Page</h2>
    <p>Hello <?php Print "$user"?>!</p> 
    <a href="logout.php">Click here to logout</a><br/><br/>
    <a href="home.php">Return to Home page</a>
    <h2 align="center">Currently Selected</h2>
    <table border="1px" width="100%">
      <tr>
        <th>Id</th>
        <th>Details</th>
        <th>Post Time</th>
        <th>Edit Time</th>
        <th>Public Post</th>
      </tr>
      <?php
        if(!empty($_GET['id']))
        {
          $id = $_GET['id'];
          $_SESSION['id'] = $id;
          $id_exists = true;
          $db = new PDO('mysql:host=localhost;dbname=first_db;charset=utf8', 'root', 'password');
          $query = $db->query("SELECT * FROM list WHERE id='$id'");
          $count = $query->rowCount();
          if($count > 0)
          {
            while($row = $query->fetch(PDO::FETCH_ASSOC))
            {
              Print "<tr>";
                Print '<td align="center">'. $row['id'] . "</td>";
                Print '<td align="center">'. $row['details'] . "</td>";
                Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
                Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
                Print '<td align="center">'. $row['public']. "</td>";
                $old_public = $row['public'];
                $old_details = $row['details'];
              Print "</tr>";

            }
          }
          else
          {
            $id_exists = false;
          }
        }
      ?>
    </table>
    <br/>
    <?php
    if($id_exists) {
      $old_public = ($old_public == "yes" ? "checked" : "");
    Print "
    <form action='edit.php' method='POST'>
      Enter new detail: <input type='text' name='details' value='$old_details'/><br/>
      public post? <input type='checkbox' name='public[]' $old_public/><br/>
      <input type='submit' value='Update List'/>
    </form>
    ";
    }
    else
    {
      Print '<h2 align="center">There is no data to be edited.</h2>';
    }
    ?>
  </body>
</html>

<?php
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $db = new PDO('mysql:host=localhost;dbname=first_db;charset=utf8', 'root', 'password');
    $details = $_POST['details'];
    $public = "no";
    $id = $_SESSION['id'];
    $time = strftime("%X");//time
    $date = strftime("%B %d, %Y");//date
    foreach($_POST['public'] as $list) {
      if($list != null) {
        $public = "yes";
      }
    }
    $db->query("UPDATE list SET details='$details', public='$public', date_edited='$date', time_edited='$time' WHERE id='$id'");
    header("location: home.php");
  }
?>