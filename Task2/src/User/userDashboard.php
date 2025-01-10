<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css">
</head>
<body>
    <div class="flex h-screen w-full bg-gray-300">
       <div class="h-full w-1/4 bg-amber-700">
          <h4 class="text-white font-semibold telg text-center mt-4 cursor-pointer">User dashboard</h4>
          <?php include 'profile_avatar.php'?>
           <div class="flex flex-col space-y-4"> 
          <div class="flex flex-col  space-y-5 ml-[4rem]">
               <a href="?page=dashboard"><p class="text-xl font-medium text-gray-300">dashboard</p></a>
               <a href="?page=myTasks"><p class="text-xl font-medium text-gray-300">My task</p></a>
               <a href="?page=completedTasks"><p class="text-xl font-medium text-gray-300">Completed tasks</p></a>
               <a href="?page=Notification"><p class="text-xl font-medium text-gray-300">Notifications</p></a>
          </div>
          <div class="ml-[4rem]">
              <a href="./controller/logout_controller.php"><button class="bg-amber-500 text-xl font-medium text-gray-300 px-5 py-2 rounded-md">Logout</button></a>
            </div>
           </div>
       </div>
       <div class="h-full w-3/4 bg-gray-300 mx-3 my-3">
            <?php
               if(isset($_GET['page'])){
                  $page = $_GET['page'];
                  $allowed_pages = ['dashboard', 'myTasks', 'completedTasks','Notification','editUserTask','user_profile'];
                  if(in_array($page, $allowed_pages)){
                    include $page . ".php";
                  }else{
                    include "dashboard.php";
                  }
               }
            ?>
       </div>
    </div>
</body>
</html>