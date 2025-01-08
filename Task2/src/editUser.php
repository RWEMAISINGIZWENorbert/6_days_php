<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include  'db_connect.php';
       $id = $_GET['id'];
       $select = "SELECT * FROM users WHERE id = '$id'";
       $result = $conn->query($select); 
       if($result->num_rows > 0){
          while($row= $result->fetch_assoc()){
    ?>
      <form action="./controllers/editUserController.php" method="post">
         <input type="hidden" name="id" value="<?php echo $id?>">
          <label for="name">User Name</label><br>
          <input type="name" name="name" value="<?php echo $row['name']?>"><br><br>
          <label for="email">Email</label><br>
          <input type="email" name="email" value="<?php echo $row['email']?>"><br><br>
          <label for="password">Password</label><br>
          <input type="password" name="password" value="<?php echo $row['password']?>"><br><br>
          <div class="flex space-x-4">
               <input type="btn" value="cancel">
               <a href="./controllers/editUserController.php"><input type="submit" value="Update" class="bg-green-700 text-white p-2 text-center"></a>
          </div>
      </form>
      <?php   }  }?>
</body>
</html>