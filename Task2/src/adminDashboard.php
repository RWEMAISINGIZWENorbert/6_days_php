<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="output.css">
</head>
<body>
    <div class="flex h-screen w-full bg-gray-300">
       <div class="h-full w-1/4 bg-amber-700">
             <h4 class="text-white font-semibold text-lg ml-[4rem] mt-4 cursor-pointer">Admin dashboard</h4>
             <?php  include './profile_avatar.php' ?>
           <div class="flex flex-col  space-y-5 ml-[4rem]">
               <a href="?page=dashboard"><p class="text-xl font-medium text-gray-300">dashboard</p></a>
               <a href="?page=completedTasks"><p class="text-xl font-medium text-gray-300">Completed Taks</p></a>
               <a href="?page=Tasks"><p class="text-xl font-medium text-gray-300">Tasks</p></a>
               <a href="?page=users"><p class="text-xl font-medium text-gray-300">Users</p></a>
          </div>
       </div>
       <div class="h-full w-3/4 bg-gray-300 mx-3 my-3">
          <?php 
           if(isset($_GET['page'])){
            $page = $_GET['page']; 
             $allowed_pages =  ['dashboard', 'completedTasks', 'users', 'Tasks','addNewTask', 'addUsers','admin_profile', 'editTask'];
             if(in_array($page, $allowed_pages)){
                include $page . '.php';
             }else{
               include 'dashboard.php';
             }
           }
            
          ?>
       </div>
    </div>
</body>
</html>
