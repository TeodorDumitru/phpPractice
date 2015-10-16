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
  ?>
  <body>
    <h2>Home Page</h2>
    <p>Hello <?php Print "$user"?>!</p> 
    <a href="logout.php">Click here to logout</a><br/><br/>
    <form action="add.php" method="POST">
      Add more to list: <input type="text" name="details"/><br/>
      public post? <input type="checkbox" name="public[]" value="yes"/><br/>
      <input type="submit" value="Add to list"/>
    </form>
    <h2 align="center">My list</h2>
    <table border="1px" width="100%">
      <tr>
        <th>Id</th>
        <th>Details</th>
        <th>Post Time</th>
        <th>Edit Time</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Public Post</th>
      </tr>
      <?php
        $db = new PDO('mysql:host=localhost;dbname=first_db;charset=utf8', 'root', 'password');
        foreach($db->query("SELECT * FROM list") as $row)
        {
          Print "<tr>";
            Print '<td align="center">'. ('<a href="article.php?id='.$row['id'].'">'.$row['id'].'</a>') . "</td>";
            Print '<td align="center">'. $row['details'] . "</td>";
            Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
            Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
            Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
            Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
            Print '<td align="center">'. $row['public']. "</td>";
          Print "</tr>";
        }
      ?>
    </table>
    <script>
    function myFunction(id)
    {
       var r = confirm("Are you sure you want to delete this record?");
       if(r == true)
       {
          window.location.assign("delete.php?id=" + id);
       }
    }
    </script>
  </body>
</html>