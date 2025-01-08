<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="./controllers/addNewTaskController.php" method="post">
          <label for="title">Task name</label><br>
          <input type="text" name="title"><br><br>
          <label for="description">Description</label><br>
          <input type="text" name="description"><br><br>
          <select name="taken" id="">
            <option value="0">Select Employee</option>
                  <?php
                 include 'db_connect.php';
                   $sql = "SELECT * FROM users";
                   $result = $conn->query($sql);    
                   if($result -> num_rows > 0){
                     while($row = $result -> fetch_assoc()){
                 ?>
                 <option value="<?php echo $row['name']?>"><?php echo $row['name']; } }?></option>
          </select>
          <div class="flex justify-between">
               <button>Cancel</button>
               <input type="submit" value="Add">
          </div>
     </form>
     <?php
          if(isset($_GET['msg'])){
            echo "<p class = 'text-red-700 font-semibold'>".$_GET['msg']."</p>";
          }
     ?>
</body>
</html>