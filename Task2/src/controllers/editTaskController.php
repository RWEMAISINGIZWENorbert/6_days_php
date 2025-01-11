<?php
 include '../db_connect.php';
 
 $id = $_POST['id'];
 $title = $_POST['title'];
 $description = $_POST['description'];
 $status = $_POST['status'];
 $author = $_POST['author'];
 
 $author_sql = "SELECT * FROM users WHERE name = '$author'";
 $author_result = $conn->query($author_sql);

 if($author_result->num_rows > 0){
     $author_row = $author_result->fetch_assoc();
     $author_id = $author_row['id'];
 }

 $sql = "UPDATE tasks SET title = '$title',
                                        description = '$description',
                                        status = '$status',
                                        author = '$author',
                                        authorId = '$author_id' WHERE id = '$id'";
$result = $conn->query($sql);
if($result){
    header('location:../adminDashboard.php?page=Tasks');
}else{
    echo "Failed";
}

?>