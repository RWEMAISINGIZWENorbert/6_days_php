<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
</head>
<body>
    <div class="h-screen w-full">
        <?php
          include "db_connect.php";
          session_start();
          $admin_email = $_SESSION['email'];
          $admin_sql = "SELECT * FROM admini WHERE email = '$admin_email'";
           $admin_result = $conn->query($admin_sql);
           if($admin_result->num_rows > 0){   
             $admin_row = $admin_result->fetch_assoc();
             $admin_id= $admin_row['id'];
           }
        // DIsplay total users   
          $sql = "SELECT id from users WHERE adminId = '$admin_id'";
          $result = $conn->query($sql);
          $totalLength = 0;
          if($result->num_rows > 0){
                // $row = $result->fetch_assoc();
                while ($row = $result->fetch_assoc()) {
                        foreach ($row as $column) {
                            // Add the length of each column's value to total length
                            $totalLength += strlen($column);
                        }
                    }
                //     echo $totalLength / 2;
          }else{
                $totalLength = 0;
          }

        //   Display total tasks
        $tasks_sql = "SELECT id from tasks WHERE adminId='$admin_id'";
        $tasks_result = $conn->query($tasks_sql);
        $total_tasks = 0;
        if($tasks_result->num_rows>0){
                while($row = $tasks_result->fetch_assoc()){
                        foreach($row as $column){
                                $total_tasks += strlen($column);
                        }
                }
                // echo $total_tasks/2;
        }else{
                $tasks_result = 0;
        }

        // Display Completed tasks
        $completed_sql = "SELECT id from tasks WHERE adminId='$admin_id' AND status = 'Completed'";
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
                        <h4 class="text-2xl font-bold text-amber-700"><?php  echo $totalLength / 2; ?></h4>
                        <p class=" font-bold text-amber-950">Total users</p>
                </div>
                <div class="w-full lg:w-[14rem] py-8 bg-white flex flex-col items-center rounded-xl cursor-pointer">
                        <h4 class="text-2xl font-bold text-amber-700"><?php echo $total_tasks/2;?></h4>
                        <p class="text-nowrap font-bold text-amber-950">Total Tasks</p>
                </div>
                <div class="w-full lg:w-[14rem] py-8 bg-white flex flex-col items-center rounded-xl cursor-pointer">
                        <h4 class="text-2xl font-bold text-amber-700"><?php echo $completed_tasks/2?></h4>
                        <p class="text-nowrap font-bold text-amber-950">Completed Tasks</p>
                </div>
           </div>
    </div>
</body>
</html>