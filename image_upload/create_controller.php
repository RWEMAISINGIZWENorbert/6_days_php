<?php
 
 include 'db_connect.php';
 if(isset($_POST['submit'])){
      $full_name = $_POST['name'];
      $file_name = $_FILES['file']['name'];
      $tmp_name = $_FILES['file']['tmp_name'];
      $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
      $allowed_ext = ["png", "jpg", "jpeg"];
      $target_path = 'uploads/'.$file_name;
      
      if(in_array($file_ext, $allowed_ext)){
          if(move_uploaded_file($tmp_name, $target_path)){
              $sql = "INSERT INTO images(full_name, file_name) VALUES ('$full_name', '$file_name')";
              $result = $conn->query($sql);
               if($result){
                  header("location: index.php?msg = Data inserted successfully");
               }else{
                echo "Error occured";
               }
          }else{
            echo "Image failed to be inserted";
          }
      }
 }

?>