<?php
    include '../db_connect.php';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $id = $_POST['id'];
  $hashhed_password = md5($password);

  if($_FILES['image']){
    $upload_dir = 'uploads/';
    $upload_file = $upload_dir .$_FILES['image']['name'];

    if(!is_dir($upload_dir)) {
        mkdir($upload_dir, true);
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) {
        $image_data = base64_encode(file_get_contents($upload_file));
    }
}
  
   $sql = "UPDATE admini SET name = '$name', email ='$email', password = '$hashhed_password' WHERE id = '$id'";
   $result = $conn->query($sql);
   if($result){
     $_SESSION['email'] = $email;
    header('location: ../adminDashboard.php?page=admin_profile');
   }

?>

