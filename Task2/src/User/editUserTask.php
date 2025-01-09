<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      include '../db_connect.php';
      $id = $_GET['id'];
      $status = $_GET['status'];
      $sql = "SELECT * FROM tasks WHERE id = '$id'";
      $result = $conn->query($sql);
      if($result -> num_rows > 0){  
        while ($row = $result->fetch_assoc()){
            ?>
      <div class="w-full h-full flex justify-center items-center">
       <div class="w-full flex flex-col items-center justify-center lg:1/2 b bg-gray-300">   
      <div class="w-1/2 bg-white p-3 rounded-xl"> 
      <h4 class="text-amber-700 text-center text-2xl items-center font-semibold cursor-pointer">Edit Task</h4>
     <form action="./controller/editUserTaskController.php" method="post">
           <label for="title" class="text-gray-700 text-2xl font-semibold">Title</label><br>
           <input type="text" name="id" hidden value="<?php echo $row['id']?>" >
           <p><?php echo $row['title']?></p>
           <label for="description"  class="text-gray-700 text-2xl font-semibold">description</label><br>
           <p><?php echo $row['description']?></p>
           <p class="text-gray-700 text-2xl font-semibold text-center">Task status</p>
           <select name="status" class="text-center items-center border-2 p-2 rounded-md border-amber-700 ml-3 cursor-pointer outline-none w-full">
                <option value="<?php echo $status ?>"><?php echo $status ?></option>
                <?php
                   $status_array = ['pending', 'completed', 'progress'];
                   foreach($status_array as $status_one){
                      if($status === $status_one){
                        continue;
                        }else{
                            ?>
                            <option value="<?php echo $status_one?>"><?php echo $status_one?></option>
                            <?php
                        }
                   }
                ?>
           </select>
           <div class="flex justify-between my-2">
               <button class="bg-red-600 text-white px-[2rem] py-1 rounded-sm tetx-xl font-semibold">Cancel</button>
               <input type="submit" value="Update" class="bg-green-600 text-white px-[2rem] py-1 rounded-sm tetx-xl font-semibold cursor-pointer">
          </div>
     </form>
     </div>
     </div>
     <div class="hidden w-1/2 relative lg:flex items-center justify-center h-full bg-gray-300">
            <div class="w-60 h-60 bg-gradient-to-tr from-violet-500 to-pink-500 rounded-full animate-pulse"></div>
            <div class="w-full h-1/2 bottom-0 bg-white/10 backdrop-blur-lg absolute"></div>
       </div>
     </div> 

     <?php
        }
      }
    ?>
</body>
</html>