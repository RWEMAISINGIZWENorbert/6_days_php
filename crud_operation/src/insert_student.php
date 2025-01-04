<?php
include 'db_connect.php';
 
 if(isset($_POST['submit'])){
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $age = $_POST['age'];

    if(empty($f_name || empty($l_name)) || empty($age)){
        header('location:index.php?message=The credentilas are required');
    }else{
        $sql = "INSERT INTO `students` (`first_name`, `last_name`, `age`) VALUES ('$f_name', '$l_name', '$age')";
        $querry = $conn -> query($sql);
        if(!$querry){
            die('querry failed');
        }else{
            header('location:index.php?insert_msg= Student ' .$f_name.' added succcesfully');
        }
    }
 }

?>