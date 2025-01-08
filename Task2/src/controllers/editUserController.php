<?php
  include '../db_connect.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $select = "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";
  $result =  mysqli_query($conn, $select);
  if($result){
    header('location: ../editUser.php?id=$id?editmsg = user updated successfully');
  }else{
    echo "Failed";
  }

?>