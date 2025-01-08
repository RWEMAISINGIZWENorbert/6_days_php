<?php
include '../db_connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$hashedPassword = md5($password);

 $sql  = "SELECT * FROM admini WHERE email = '$email' AND password = '$hashedPassword'";
 $result = $conn->query($sql);

 if($result->num_rows >0){
     header('location:../adminDashboard.php');
     session_start();
     $_SESSION['email'] = $email;
 }else{
    header("location: ../login.php?existMessage=Email and Password does not match");
 }

?>