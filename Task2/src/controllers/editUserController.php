<?php
  include '../db_connect.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
 
  session_start();
  $newId = $_SESSION['id'];
  
  $select = "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";
  $result =  mysqli_query($conn, $select);
  if($result){
    header("location: ../adminDashboard.php?page=users&editmsg=user updated successfull");
  }else{
    echo "Failed";
  }

?>