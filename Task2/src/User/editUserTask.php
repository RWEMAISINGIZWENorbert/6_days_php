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

     <form action="./controller/editUserTaskController.php" method="post">
           <label for="title">Title</label><br>
           <input type="text" name="id" hidden value="<?php echo $row['id']?>">
           <p><?php echo $row['title']?></p>
           <label for="description">description</label><br>
           <p><?php echo $row['description']?></p>
           <select name="status">
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
           <div class="flex space-x-2">
               <button>Cancel</button>
               <input type="submit" value="update" name="submit">
           </div>
     </form>
     <?php
        }
      }
    ?>
</body>
</html>