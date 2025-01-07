<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <form action="controllers/signUpController.php" method="post">
           <label for="name">Username</label><br>
           <input type="text" name="name"><br><br>
           <label for="email">Email Adress</label><br>
           <input type="text" name="email"><br><br>
           <label for="password">Password</label><br>
           <input type="password" name="password"><br><br>
           <input type="submit" name="submit" value="Sign Up">
      </form>
      <p>Alread have Account? login <a href="login.php">here</a></p>
</body>
</html>

<?php

 if(isset($_GET['msg'])){
    echo $_GET['msg'];
 }

?>