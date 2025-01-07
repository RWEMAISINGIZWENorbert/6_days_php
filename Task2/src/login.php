<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./output.css">
</head>
<body>
    <div class="h-screen w-full bg-gray-300 flex justify-center items-center">
    <div class="bg-white px-2 py-4 rounded-xl">
         <h2 class="font-bold  text-amber-800 text-lg text-center cursor-pointer"> Sign In</h2>
     <form action="controllers/loginController.php" method="post">
           <label for="email" 
                     class="text-lg font-medium">Email Adress</label><br>
           <input type="email" 
                      name="email" 
                      class="w-full border-2 border-gray-100 rounded-xl py-2 mt-1 bg-transparent outline-none"><br><br>
           <label for="password"
                      class="text-lg font-medium">Password</label><br>
           <input type="password" 
                      name="password"
                      class="w-full border-2 border-gray-100 rounded-xl py-2 mt-1 bg-transparent outline-none"><br><br>
           <input type="submit" 
                      value="Login"
                      class="w-full text-white font-bold bg-amber-800 p-2 rounded-xl cursor-pointer">
     </form>
     <div class="flex space-x-2 ml-10 mt-4">
         <input type="checkbox">
         <p>remember me</p>
     </div>
     <p class="text-gray-700 " class = "mb-2">Is your first time to us create account? <a href="index.php" class="">here</a></p>
     </div>
     </div>
</body>
</html>