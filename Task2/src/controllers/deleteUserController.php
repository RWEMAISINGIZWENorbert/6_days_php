<?php
  include '../db_connect.php';

 $id = $_GET['id'];
 $sql= "DELETE FROM users WHERE id = '$id'";
 $result = $conn ->query($sql);

 if($result){
    header("location: ../adminDashboard.php?page=users");
 }
?>