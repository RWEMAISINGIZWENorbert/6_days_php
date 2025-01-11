<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./output.css">
</head>
<body>
<div class="flex w-full h-screen">
    <div class="w-full flex flex-col items-center justify-center lg:1/2 b bg-gray-200">
        <div class="w-full lg:w-1/2 bg-white p-4 rounded-md px-5">
            <div class="flex justify-between my-2 mx-5">
                  <h2 class="text-2xl font-bold text-amber-700 flex-shrink-0 hover:motion-preset-seesaw cursor-pointer">My Task</h2>
                   <h4 class="text-2xl font-semibold text-gray-700">Login</h4>
            </div>
            <?php
              if(isset($_GET['msg'])){
                echo "<p class= 'text-center text-xl font-semibold text-red-600 my-4'>*".$_GET['msg']."*</p>";
              }
            ?>
          <form action="controllers/loginController.php" method="post">
           <label for="email"class="text-xl text-gray-700">Email Adress</label><br>
           <input type="text" name="email" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent"><br><br>
           <label for="password" class="text-xl text-gray-700">Password</label><br>
           <input type="password" name="password" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent"><br><br>
           <input type="submit" name="submit" value="Login" class="w-full p-2 text-xl py-2 border-none bg-amber-600 rounded-md outline-none text-white cursor-pointer active:scale-[.98] active:duration-100 hover:scale-[1.01]">
          </form>
        <div class="flex justify-between my-3 items-center text-center">  
          <p>Don't have account?</P><P><a href="index.php" class="text-amber-600 underline">sign up here</a></p>
      </div>
      </div>
      </div>
       <div class="hidden w-1/2 relative lg:flex items-center justify-center h-full bg-gray-200">
            <div class="w-60 h-60 bg-gradient-to-tr from-violet-500 to-pink-500 rounded-full animate-pulse"></div>
            <div class="w-full h-1/2 bottom-0 bg-white/10 backdrop-blur-lg absolute"></div>
       </div>
      </div>
</body>
</html>