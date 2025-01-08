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
    ?>
     <form action="./controllers/editTaskController.php" method="post">
         <input type="hidden" name="id" value="<?php echo $task['id']?>">
         <label for="title">Title</label><br>
         <input type="text" name="title" value="<?php echo $task['title']?>"><br><br>
         <label for="description">Description</label><br>
         <input type="text" name="description" value="<?php echo $task['description']?>"><br><br>
         <label for="status">Status</label>
         <select name="status">
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
         <label for="author">Author</label>
         <select name="author">
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
         <div class="flex space-x-2">
             <button>Cancel</button>
             <input type="submit" value="Update" class="bg-green-900 text-white outline-none rounded-md">
         </div>
     </form>
     <?php } } ?>
</body>
</html>