<?php
 include '../db_connect.php';
 
 $id = $_POST['id'];
 $title = $_POST['title'];
 $description = $_POST['description'];
 $status = $_POST['status'];
 $author = $_POST['author'];

 $sql = "UPDATE tasks SET title = '$title',
                                        description = '$description',
                                        status = '$status',
                                        author = '$author' WHERE id = '$id'";
$result = $conn->query($sql);
if($result){
    header('location:../adminDashboard.php?page=Tasks');
}else{
    echo "Failed";
}

?>