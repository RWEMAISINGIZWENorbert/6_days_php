<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="h-screen w-full">
        <?php
           include '../db_connect.php';
           session_start();
           
           $user_email = $_SESSION['user_email'];
           $user_sql = "SELECT * FROM users WHERE email = '$user_email'";
            $user_result = $conn->query($user_sql);
            if($user_result->num_rows > 0){   
              $user_row = $user_result->fetch_assoc();
              $user_id= $user_row['id'];
            }

           $tasks_sql = "SELECT id from tasks WHERE authorId='$user_id'";
           $tasks_result = $conn->query($tasks_sql);
           $total_tasks = 0;
           if($tasks_result->num_rows>0){
                   while($row = $tasks_result->fetch_assoc()){
                           foreach($row as $column){
                                   $total_tasks += strlen($column);
                           }
                   }
                //    echo $total_tasks/2;
           }else{
                   $tasks_result = 0;
           }
   
           // Display Completed tasks
           $completed_sql = "SELECT id from tasks WHERE authorId='$user_id' AND status = 'Completed'";
           $completed_result = $conn->query($completed_sql);
           $completed_tasks = 0;
           if($tasks_result->num_rows > 0){
                   while($row = $completed_result->fetch_assoc()){
                           foreach($row as $column){
                                   $completed_tasks +=strlen($column);
                           }
                   }
   
           }else{
                   $completed_tasks = 0;
           }
        ?>
           <div class="w-full grid grid-cols-1 lg:grid-cols-4 mt-4 my-2 space-x-4 justify-center">
                <div class="w-full lg:w-[14rem] py-8 bg-white flex flex-col items-center rounded-xl cursor-pointer">
                        <h4 class="text-2xl font-bold text-amber-700"><?php echo $total_tasks/2 ?></h4>
                        <p class=" font-bold text-amber-950">My total Tasks</p>
                </div>
                <div class="w-full lg:w-[14rem] py-8 bg-white flex flex-col items-center rounded-xl cursor-pointer">
                        <h4 class="text-2xl font-bold text-amber-700"><?php echo $completed_tasks/2 ?></h4>
                        <p class="text-nowrap font-bold text-amber-950">Completed Tasks</p>
                </div>
                <div class="w-full lg:w-[14rem] py-8 bg-white flex flex-col items-center rounded-xl cursor-pointer">
                        <h4 class="text-2xl font-bold text-amber-700">0</h4>
                        <p class="text-nowrap font-bold text-amber-950">My Notifications</p>
                </div>
           </div>
</body>
</html>