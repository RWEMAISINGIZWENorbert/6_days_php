<?php
require 'db_connect.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./output.css">
</head>
<body>
   <div class="flex justify-center">
      <h2 class="text-2xl font-bold cursor-pointer">Day 2 Crud Operation</h2>
   </div>
<div class="flex flex-col justify-center items-center w-screen">
  <div class=" w-full flex justify-between m-4 mx-5">
    <h4 class=" text-xl -mb-2 ">All Students</h4>
    <a href="new_student.php"><h4 class="bg-green-700 px-2 text-white text-xl -mb-2 rounded-md cursor-pointer">Add Student</h4></a> 
  </div>
<table border="2" class="w-full my-2 py-2" >
    <thead class="bg-gray-800 text-white">
      <tr class="">
        <th>ID</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>AGE</th>
        <th>ACTIONS</th>
      </tr>
    </thead>
     <tbody class="w-full">
     <?php
         $select = 'SELECT * FROM students';
         $result = mysqli_query($conn, $select);
         if($result -> num_rows > 0){
            ?>
            <?php while($row = $result ->fetch_assoc()):?>
      <tr class="text-center">
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['first_name']?></td>
        <td><?php echo $row['last_name']?></td>
        <td><?php echo $row['age']?></td>
        <td class="space-x-2">
          <a href="update_student.php?id=<?php echo $row['id']?>">
            <button class="bg-green-700 px-2 text-white text-xl -mb-2 rounded-md">update</button>
            </a>
            <a href="delete_student.php?id=<?php echo $row['id']?>">
          <button class="bg-red-700 px-2 text-white text-xl -mb-2 rounded-md">Delete</button>
          </a>
        </td>
      </td>
     </tbody>
     <?php endwhile?>
     <?php  } ?>     
 </table>
  
 <?php
   
   if(isset($_GET['message'])){
    echo "<h6 class = 'text-center text-red-700 font-bold'> " .$_GET['message']. " </h6>";
   }
  
   if(isset($_GET['insert_msg'])){
    echo "<h6 class = 'text-center text-green-700 font-bold'> " . $_GET['insert_msg']. " </h6>";
   }

   if(isset($_GET['update_msg'])){
    echo "<h6 class = 'text-center text-green-700 font-bold'> " . $_GET['update_msg']. " </h6>";
   }

   if(isset($_GET['del_msg'])){
    echo "<h6 class = 'text-center text-red-700 font-bold'> " .$_GET['del_msg']. " </h6>";
   }
   
 ?>

</div>
  
</body>
</html>