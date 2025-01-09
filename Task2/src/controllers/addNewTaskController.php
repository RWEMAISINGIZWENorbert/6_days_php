<?php
   include '../db_connect.php';
  $title = $_POST['title'];
  $description = $_POST['description'];
  $taken = $_POST['taken'];
  
  if(empty($title) || empty($description) || empty($taken)){
    header('location:../adminDashboard.php?page=addNewTask&msg=Please Fill the credentials');
  }else{
     session_start();
     $admin_email = $_SESSION['email'];
     $admin = "SELECT * FROM admini WHERE email = '$admin_email'";
     $admin_result = $conn->query($admin);
    if($admin_result->num_rows  > 0){
       $admin_row = $admin_result->fetch_assoc();
       $admin_id = $admin_row['id'];
    

   //  $user_email =  $_SESSION['user_email'];
    $user = "SELECT * FROM users WHERE name = '$taken'";
    $userResult = $conn->query($user);
    if($userResult->num_rows > 0){
       $row = $userResult->fetch_assoc();
       $rowId = $row['id'];
    
    $sql = "INSERT INTO tasks (title, description, author,authorId,adminid) VALUES ('$title', '$description','$taken', '$rowId', '$admin_id')";
    $result = $conn->query($sql);
    if($result){
        header("location:../adminDashboard.php?page=Tasks&msg=Task added succesfully ");
    }
  }
  }
  }
?>