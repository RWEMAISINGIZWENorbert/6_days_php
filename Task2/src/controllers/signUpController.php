<?php
 include '../db_connect.php';
 
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $hashed_password = md5($password);

 $find = "SELECT * FROM admini WHERE email = '$email'";
 $findResult = mysqli_query($conn, $find);

 if($findResult->num_rows > 0){
    header("location: ../index.php?msg=User Already exists");
 }else{
     
    $sql = "INSERT INTO admini(name, email, password) VALUES('$name', '$email', '$hashed_password')";
    $result = $conn->query($sql);
   
    if($result){
       header('location: ../login.php');
    }

 }
?>