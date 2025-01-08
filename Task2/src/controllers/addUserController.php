<?php
   include '../db_connect.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

 $select = "SELECT * FROM users WHERE email = '$email' ";
 $result = $conn->query($select);

 if($result->num_rows > 0){
     header('location:../addUsers.php?insertmsg=Email Alredy exists');
 }else{
     $sql = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')";
     $insert = $conn->query($sql);
     if($insert){
        header("location:../addUsers.php?insertmsg=User' $name 'Added Successfully");  
     }
 }

?>