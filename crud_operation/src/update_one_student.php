<?php
include 'db_connect.php';
 if(isset($_POST['submit'])){
 $id = $_POST['id'];
 $f_name = $_POST['f_name'];
 $l_name = $_POST['l_name'];
 $age = $_POST['age'];

 $sql = "UPDATE students SET first_name = '$f_name',last_name = '$l_name', age = '$age' WHERE id = '$id' ";
 $query = $conn -> query($sql);

 if(!$query){
    die('Connection failed');
 }else{
    header('location:index.php?update_msg=student'. " $f_name ". 'updated succcefully');
 }

}
 
?>