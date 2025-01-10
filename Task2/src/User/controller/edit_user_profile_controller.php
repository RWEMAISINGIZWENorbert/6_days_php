<?php
      
      include '../../db_connect.php';

     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $id = $_POST['id'];

     $sql = "UPDATE users SET name = '$name',
                                            email = '$email',
                                            password = '$password' WHERE id = '$id' ";
     $result = $conn->query($sql);
     if($result){
        $_SESSION['user_email'] = $email;
        header("location: ../userDashboard.php?page=dashboard");
     }                                       

?>