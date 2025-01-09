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
     <h4 class="text-amber-700 text-center text-2xl items-center font-semibold cursor-pointer">Add new Task</h4>
     <form action="./controllers/addNewTaskController.php" method="post">
          <label for="title" class="text-gray-700 text-2xl font-semibold">Task name</label><br>
          <input type="text" name="title" class="w-full border-2 border-amber-700 outline-none rounded-md"><br><br>
          <label for="description" class="text-gray-700 text-2xl font-semibold">Description</label><br>
          <!-- <input type="text" name="description"><br><br> -->
          <textarea name="description" class="w-full border-2 border-amber-700 outline-none rounded-md"></textarea><br><br>
          <div class="ml-[4rem] mb-5">
          <select name="taken" id="" class="text-center items-center border-2 p-2 rounded-md border-amber-700 cursor-pointer outline-none">
            <option value="0">Select Author</option>
                  <?php
                 include 'db_connect.php';
                   $sql = "SELECT * FROM users";
                   $result = $conn->query($sql);    
                   if($result -> num_rows > 0){
                     while($row = $result -> fetch_assoc()){
                 ?>
                 <option value="<?php echo $row['name']?>"><?php echo $row['name']; } }?></option>
          </select>
          </div>
          <?php
          if(isset($_GET['msg'])){
            echo "<p class = 'text-sm text-red-700 text-center -mt-2'>*".$_GET['msg']."*</p>";
          }
     ?>
          <div class="flex justify-between my-2">
               <button class="bg-red-600 text-white px-[2rem] py-1 rounded-sm tetx-xl font-semibold">Cancel</button>
               <input type="submit" value="Add" class="bg-green-600 text-white px-[2rem] py-1 rounded-sm tetx-xl font-semibold cursor-pointer">
          </div>
     </form>
     </div>
     </div>
     <div class="hidden w-1/2 relative lg:flex items-center justify-center h-full bg-gray-300">
            <div class="w-60 h-60 bg-gradient-to-tr from-violet-500 to-pink-500 rounded-full animate-pulse"></div>
            <div class="w-full h-1/2 bottom-0 bg-white/10 backdrop-blur-lg absolute"></div>
       </div>
     </div>
</body>
</html>