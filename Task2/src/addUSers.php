<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div class="w-full h-full flex justify-center items-center">
     <div class="w-full flex flex-col items-center justify-center lg:1/2 b bg-gray-300">
     <div class="w-1/2 bg-white p-3 rounded-xl">
     <h4 class="text-amber-700 text-center text-2xl items-center font-semibold cursor-pointer my-2">Add new User</h4>   
     <form action="./controllers/addUserController.php" method="post">
          <label for="name" class="text-2xl font-semibold text-gray-700">User Name</label><br>
          <input type="text" name="name" class="w-full py-2 border-2 border-amber-700 bg-transparent rounded-md outline-none"><br><br>
          <label for="email"  class="text-2xl font-semibold text-gray-700">Email Adress</label><br>
          <input type="email" name="email" class="w-full py-2 border-2 border-amber-700 bg-transparent rounded-md outline-none"><br><br>
          <label for="password"  class="text-2xl font-semibold text-gray-700">Password</label><br>
          <input type="password" name="password" class="w-full py-2 border-2 border-amber-700 bg-transparent rounded-md outline-none"><br><br>
           <?php
              if(isset($_GET['msg'])){
               echo "<p class = 'text-sm text-red-700 text-center -mt-[2rem]'>*".$_GET['msg']."*</p>";
              }
           ?>
          <div class="flex justify-between">
             <a href="adminDashboard.php?page=users"><input type="button" value="Cancel" class="cursor-pointer text-2xl font-medium text-gray-600"></a>
              <input type="submit" value="Add" class="bg-amber-700 text-white text-center px-[2rem] py-2 rounded-md cursor-pointer">
          </div>
     </form>
     </div>
     </div>
     <div class="hidden w-1/2 relative lg:flex items-center justify-center h-full bg-gray-300">
            <div class="w-60 h-60 bg-gradient-to-tr from-violet-500 to-pink-500 rounded-full animate-pulse"></div>
            <div class="w-full h-1/2 bottom-0 bg-white/10 backdrop-blur-lg absolute"></div>
       </div>
</body>
</html>