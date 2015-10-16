<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Login Page</h2>
        <a href="index.php">Click here to go back<br/><br/></a>
        <form action="checklogin.php" method="POST">
          <p> Enter Username: <input type="text" name="username" required="required" /> </p> 
          <p> Enter password: <input type="password" name="password" required="required" /> </p> 
           <input type="submit" value="Login"/>
        </form>
    </body>
</html>