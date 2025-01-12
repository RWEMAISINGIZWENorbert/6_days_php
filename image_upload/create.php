<?php
include 'db_connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="create_controller.php" method="post" enctype="multipart/form-data">
          <label for="name">Full name</label><br>
          <input type="text" name="name"><br><br>
          <label for="File">File</label><br>
          <input type="file" name="file"><br><br>
          <input type="submit" name="submit">
     </form>
</body>
</html>