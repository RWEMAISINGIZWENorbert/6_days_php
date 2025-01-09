<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <div class="w-full h-full">
         <h4 class="text-2xl font-bold text-gray-800 cursor-pointer">My Tasks</h4>
          <div class="grid grid-cols-4 gap-4">
             <?php
             include '../db_connect.php';
               session_start();
                $email = $_SESSION['user_email'];
                $user = "SELECT * FROM users WHERE email = '$email' ";
               $result = $conn->query($user);
               if($result->num_rows > 0){
                 $row = $result->fetch_assoc();
                 $rowId =  $row['id'];    
                 $sql = "SELECT * FROM tasks WHERE authorId = '$rowId'";
                 $sql_result = $conn->query($sql);
                 if($sql_result->num_rows > 0){ 
                    while($each = $sql_result->fetch_assoc()){
                        
            ?>
                <div class="bg-white p-2 rounded-xl space-y-8">
                    <div class="my-2">
                     <h4 class="text-2xl  font-semibold text-gray-800 text-center cursor-pointer"><?php echo $each['title'] ?></h4>
                     <p><?php echo $each['description']?></p>
                     </div>
                     <div class="flex justify-between">
                         <p class="flex items-center px-2 bg-green-300 text-green-800 text-sm rounded-full cursor-pointer font-semibold"><?php echo $each['status'] ?></p>
                         <a href="./userDashboard.php?page=editUserTask&id=<?php echo $each['id']?>&status=<?php echo $each['status']?>"><button class="flex items-center px-2 bg-red-800 text-white  rounded-md cursor-pointer font-semibold text-2xl">Edit</button></a>
                     </div>
                </div>
                <?php   } }else{echo "No results found";}}else{echo "Failed";}?>
          </div>
      </div>
</body>
</html>