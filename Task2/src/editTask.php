<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include 'db_connect.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM tasks WHERE id='$id'";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
            while($task = $result->fetch_assoc()){
                if($task['status'] == 'completed'){
    ?>
          <div class="w-full h-full flex justify-center items-center">
       <div class="w-full flex flex-col items-center justify-center lg:1/2 b bg-gray-300">   
      <div class="w-1/2 bg-white p-3 rounded-xl"> 
      <h4 class="text-amber-700 text-center text-2xl items-center font-semibold cursor-pointer">Edit Task</h4>
     <form action="./controllers/editTaskController.php" method="post">
         <input type="hidden" name="id" value="<?php echo $task['id']?>">
         <label for="title" class="text-gray-700 text-2xl font-semibold">Title</label><br>
         <input type="text" name="title" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent" value="<?php echo $task['title']?>"><br><br>
         <label for="description" class="text-gray-700 text-2xl font-semibold">Description</label><br>
         <!-- <input type="text" name="description" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent" value="<?php echo $task['description']?>"><br><br> -->
          <textarea name="description" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent">
              <?php echo $task['description']?>
          </textarea>
         <label for="status" class="text-gray-700 text-2xl font-semibold">Status</label>
         <select name="status" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent">
            <option value="<?php echo $task['status']?>"><?php echo $task['status']?></option>
            <?php
              $array = ['pending', 'progress', 'Completed'];
                foreach($array as $one){
                    if($one === $task['status']){
                        continue;
                    }
                    ?>
                    <option value="<?php echo $one?>"><?php echo $one?></option>
                    <?php
                }
            ?>
         </select><br><br>
         <label for="author" class="text-gray-700 text-2xl font-semibold">Author</label><br>
         <select name="author" class="text-center items-center border-2 p-2 rounded-md border-amber-700 ml-3 cursor-pointer outline-none w-full">
            <option value="<?php echo $task['author']?>"><?php echo $task['author']?></option>
            <?php
              $sql = "SELECT * FROM users";
              $end = $conn->query($sql);
              foreach($end as $author){
                  if($author === $task['author']){
                    continue;
                }
                    ?>
                     <option value="<?php echo $author['name'] ?>"><?php echo $author['name']?></option>
                    <?php
                  
              }
            ?>
         </select><br><br>
         <div class="flex justify-between">
             <button>Cancel</button>
             <input type="submit" value="Update" class="bg-green-900 px-4 py-2 cursor-pointer text-white outline-none rounded-md">
         </div>
     </form>
     </div>
     </div>
     <div class="hidden w-1/2 relative lg:flex items-center justify-center h-full bg-gray-300">
            <div class="w-60 h-60 bg-gradient-to-tr from-violet-500 to-pink-500 rounded-full animate-pulse"></div>
            <div class="w-full h-1/2 bottom-0 bg-white/10 backdrop-blur-lg absolute"></div>
       </div>
     </div> 
     <?php }else{header("location:adminDashboard.php?page=Tasks&msg=Task completed succesfully");} } }?>
</body>
</html>