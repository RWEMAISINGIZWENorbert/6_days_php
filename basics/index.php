<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="index.php" method="POST" enctype="multipart/form-data">
     <!-- <input type="date" name="date">
     <input type="submit" name="submit"> -->
     <input type="name" name="name">
     <input type="file" name="image">
     <input type="submit" name="submit">
     </form>
</body>
</html>


<?php
 if(isset($_POST['submit'])){
    // $date =  $_POST['date'];
    //  echo $date;
//   $time_stamp = time();
//   echo $date + date('y-m-d', $time_stamp);
  $name = $_POST['name'];
  $image = $_FILES['image']['name'];
  $ext = pathinfo($image, PATHINFO_EXTENSION);
  $allowed = ['jpg', 'jpeg', 'png'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $target_path = "uploads/".$image;
  if(in_array($ext, $allowed)){
    if(move_uploaded_file($tmp_name, $target_path)){
         echo "done";
    }else{
        echo "fail";
    }
  }else{
    echo "Extension not allowed";
  } 
 }

?>