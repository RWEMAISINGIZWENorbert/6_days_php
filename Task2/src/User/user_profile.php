<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <div class="w-full h-full">
        <?php
          include '../db_connect.php';
           session_start();
           if($_SESSION['user_email']){
          $user_email = $_SESSION['user_email'];
          $select = "SELECT * FROM users WHERE email = '$user_email'";
          $result = $conn->query($select);
          if($result->num_rows > 0){
               $row = $result->fetch_assoc();
            //    $hahed_password = $row['password'];
               $passwod = $row['password'];
        ?>
        <form action="./controller/edit_user_profile_controller.php" method="post" enctype="multipart/form-data">
            <!-- <input type="file" name="image"> -->
             <div class="flex my-4">
                    <div class="w-1/2 cursor-pointer relative">
                        <img src="../assets/avatar.jpg" alt="" class="rounded-full"> 
                    </div> 
                    <div class="flex flex-col w-1/2">
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">  
                    <label for="title" class="text-gray-700 text-2xl font-semibold">User Name</label><br>
                    <input type="text" name="name" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent" value="<?php echo $row['name'] ?>"><br>
                    <label for="title" class="text-gray-700 text-2xl font-semibold">Email</label><br>
                    <input type="text" name="email" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent" value="<?php echo $row['email']?>"><br>
                    <label for="title" class="text-gray-700 text-2xl font-semibold">Password</label><br>
                    <input type="text" name="password" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent" value="<?php echo $passwod?>"><br>
                    </div>
             </div>
             <div class="flex justify-between w-full">
                 <a href="userDashboard.php?page=dashboard"><button class="py-3 px-5  bg-red-700 text-white text-2xl font-semibold rounded-md">Cancel</button></a>
                 <button type="submit" class="py-3 px-5 bg-green-700 text-white text-2xl font-semibold rounded-md">Edit</button>
             </div>
             </form>
             <?php  } }else{header("location: ../index.php");} ?>
      </div>
</body>
</html>