<?php
 include 'db_connect.php';
 
 $id = $_GET['id'];
 $sql = "DELETE FROM students WHERE id = $id";
 $query = mysqli_query($conn, $sql);

 if(!$query){
    die('Delete operation failed');
 }else{
    header('location:index.php?del_msg=row'. "$id".'deleted succsefully');
 }

?>