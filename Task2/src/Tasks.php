<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./output.css">
</head>
<body>
    <div class="w-full h-full">
        <div class="flex justify-between my-2">
          <h4 class="text-2xl  font-semibold text-gray-800">All Tasks</h4>
          <?php
            if(isset($_GET['msg'])) {
                 echo "<p class = 'text-xl font-semibold text-green-700 text-center -mt-2'>".$_GET['msg']."</p>";
            }
          ?>
          <a href="adminDashboard.php?page=addNewTask"><button class="text-center bg-amber-600 text-white font-semibold cursor-pointer rounded-lg p-2">Add New Task</button></a>
          </div>
          <div class="grid grid-cols-3 gap-5">
             <?php
              include 'db_connect.php';
              session_start();
              $admin_email = $_SESSION['email'];
              $admin_sql = "SELECT * FROM admini WHERE email='$admin_email'";
              $admin_result = $conn->query($admin_sql);
              if($admin_result->num_rows > 0){
                $admin_row = $admin_result->fetch_assoc();
                $admin_id = $admin_row['id'];

               $sql = "SELECT * FROM tasks WHERE adminId = '$admin_id'";
               $result = $conn->query($sql);
               if($result -> num_rows > 0){
                while($each = $result -> fetch_assoc()){
             ?>
                <div class="bg-white p-2 rounded-xl space-y-8">
                    <div class="">
                    <div class="flex justify-between mx-2">
                        <h2 class="text-center text-2xl font-bold text-gray-800"><?php echo $each['title'] ?></h2>
                        <p class=" flex items-center mt-1 rounded-full text-sm text-gray-100 font-semibold px-2 bg-amber-600 cursor-pointer"><?php echo $each['author'] ?></p>
                      </div>
                      <p><?php echo $each['description']?></p>
                      </div>
                      <div class="flex justify-between">
                          <p class="flex items-center px-2 bg-green-300 text-green-800 text-sm rounded-full cursor-pointer font-semibold"><?php echo $each['status']?></p>
                          <div class="flex gap-2">
                              <a href="adminDashboard.php?page=editTask&id=<?php echo $each['id']?>"><button class="bg-green-600 text-white px-2">Edit</button></a>
                              <a href="./controllers/deleteTaskController.php?id=<?php echo $each['id']?>"><button class="bg-red-600 text-white px-2">Delete </button></a>
                          </div>
                      </div>
                </div>
                <!-- <div class="bg-white p-2 rounded-xl space-y-8">
                    <div class="">
                    <div class="flex justify-between mx-2">
                        <h2 class="text-center text-2xl font-bold text-gray-800">Task 2</h2>
                        <p class=" flex items-center mt-1 rounded-full text-sm text-gray-100 font-semibold px-2 bg-amber-600 cursor-pointer">rwema</p>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus veniam odit ratione iusto. Perferendis, temporibus eos. Quod, maxime impedit neque fugiat, molestias pariatur harum delectus corrupti culpa, officiis repudiandae perspiciatis!</p>
                      </div>
                      <div class="flex justify-between">
                          <p class="flex items-center px-2 bg-green-300 text-green-800 text-sm rounded-full cursor-pointer font-semibold">Completed</p>
                          <div class="flex gap-2">
                              <button class="bg-green-600 text-white px-2">Edit</button>
                              <button class="bg-red-600 text-white px-2">Delete </button>
                          </div>
                      </div>
                </div>
                <div class="bg-white p-2 rounded-xl space-y-8">
                    <div class="">
                    <div class="flex justify-between mx-2">
                        <h2 class="text-center text-2xl font-bold text-gray-800">Task 3</h2>
                        <p class=" flex items-center mt-1 rounded-full text-sm text-gray-100 font-semibold px-2 bg-amber-600 cursor-pointer">rwema</p>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus veniam odit ratione iusto. Perferendis, temporibus eos. Quod, maxime impedit neque fugiat, molestias pariatur harum delectus corrupti culpa, officiis repudiandae perspiciatis!</p>
                      </div>
                      <div class="flex justify-between">
                          <p class="flex items-center px-2 bg-green-300 text-green-800 text-sm rounded-full cursor-pointer font-semibold">Completed</p>
                          <div class="flex gap-2">
                              <button class="bg-green-600 text-white px-2">Edit</button>
                              <button class="bg-red-600 text-white px-2">Delete </button>
                          </div>
                      </div>
                </div> -->
                <?php }  } }?>
          </div>
    </div>
</body>
</html>