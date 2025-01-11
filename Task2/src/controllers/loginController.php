<?php
include '../db_connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$hashedPassword = md5($password);

 $sql  = "SELECT * FROM admini WHERE email = '$email' AND password = '$hashedPassword'";
 $result = $conn->query($sql);

 if($result->num_rows >0){
     header('location:../adminDashboard.php?page=dashboard');
     session_start();
     $_SESSION['email'] = $email;
     $_SESSION['admin_password'] = $password;
 }
 else{
    // header("location: ../login.php?existMessage=Email and Password does not match");
  $user = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $userResult  = $conn->query($user);
  if($userResult->num_rows > 0){
     session_start();
     $_SESSION['user_email'] = $email;
     header('location: ../User/userDashboard.php');
  }else{
   header('location: ../login.php?msg=Incorect User name or Password');
  }
 }

?>