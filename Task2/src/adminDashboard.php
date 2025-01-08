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
             <h4 class="text-white font-medium text-lg text-center mt-4 cursor-pointer">Admin dashboard</h4>
          <div class="flex flex-col items-center">
               <a href="?page=dashboard"><p class="">dashboard</p></a>
               <a href="?page=completedTasks"><p>Completed Taks</p></a>
               <a href="?page=Tasks"><p>Tasks</p></a>
               <a href="?page=users"><p>Users</p></a>
          </div>
       </div>
       <div class="h-full w-3/4 bg-gray-300 mx-3 my-3">
          <?php 
           if(isset($_GET['page'])){
            $page = $_GET['page']; 
             $allowed_pages =  ['dashboard', 'completedTasks', 'users', 'Tasks'];
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
