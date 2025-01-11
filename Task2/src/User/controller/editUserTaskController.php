<?php
  include '../../db_connect.php';
  if(isset($_POST['submit'])){
    $status = $_POST['status'];
    $id = $_POST['id'];
    echo $id;
    $sql = "UPDATE tasks SET status = '$status'  WHERE id = '$id'";
    $result = $conn->query($sql);
    if($result){
        header("location: ../userDashboard.php?page=myTasks");
    }else{
        echo "Failed";
    }
  }
 ?>