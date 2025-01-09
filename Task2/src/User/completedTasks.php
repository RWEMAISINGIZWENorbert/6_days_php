<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="w-full h-screen">
         <h4 class="text-2xl font-semibold text-amber-700 cursor-pointer">My Completed Tasks</h4>
         <table class="bg-white rounded-md my-4">
            <thead class="w-full bg-gray-200 text-amber-700 ">
                <tr>
                    <th class="w-1/3">Task Name</th>
                    <th class="w-1/3">Description</th>
                    <th class="w-1/3">Actions</th>
                </tr>
            </thead>
            <tbody class="w-full">
                <?php
                include '../db_connect.php';
                  session_start();
                  $user_email = $_SESSION['user_email'];
                  $select = "SELECT * FROM users WHERE email = '$user_email'";
                  $result = $conn->query($select);
                  if($result->num_rows > 0){
                       $row = $result->fetch_assoc();
                        $id = $row['id'];
                 $sql = "SELECT * FROM tasks WHERE authorId = '$id' AND status = 'completed'";
                 $sql_result = $conn->query($sql);      
                   if($sql_result ->num_rows > 0){
                      $sql_row = $sql_result->fetch_assoc();               
                ?>
                <tr class="space-x-3">
                    <td class="text-center text-2xl font-medium"><?php echo $sql_row['title']?></td>
                    <td class="text-center">
                        <p class="text-sm"><?php echo $sql_row['description']?></p>
                    </td>
                    <td class="text-center">
                     <a href="./controllers/deleteTaskController.php?id=<?php echo $sql_row['id']?>"><button class="bg-red-300 text-red-700 text-xl font-medium px-4 rounded-md">Delete</button></a>
                    </td>
                </tr>
                <tr>
                </tr>
                <?php }else{
                    $no_results = "<p class= 'text-2xl font-bold'>"."No results found"."<p/>";
                }} ?>
            </tbody>
         </table>  
    </div>
</body>
</html>