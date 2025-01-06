<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <form action="Home.php" method="POST">
           <label for="">User name</label> <br>
           <input type="text" name="name"><br> <br>
           <label for="">Email</label> <br>
           <input type="text" name="email"><br> <br>
           <label for="">Password</label> <br>
           <input type="text" name="password"><br> <br>
           <input type="submit" name="submit">
      </form>
</body>
</html>

<?php
session_start();
 if(isset($_POST['submit'])){

 $name = $_POST['name'];
 $email = $_POST['email'];
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;

}

?>