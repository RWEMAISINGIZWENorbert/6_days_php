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
       session_start();
       $_SESSION['id'] = $id;
       $select = "SELECT * FROM users WHERE id='$id'";
       $result = $conn->query($select); 
       if($result->num_rows > 0){
          while($row= $result->fetch_assoc()){
    ?>
        <div class="w-full h-full flex justify-center items-center -mt-5">
       <div class="w-full flex flex-col items-center justify-center lg:1/2 b bg-gray-300">   
      <div class="w-1/2 bg-white p-3 rounded-xl"> 
      <h4 class="text-amber-700 text-center text-2xl items-center font-semibold cursor-pointer">Edit User Details</h4>
      <form action="./controllers/editUserController.php" method="post">
         <input type="hidden" name="id" value="<?php echo $id?>">
          <label for="name"  class="text-gray-700 text-2xl font-semibold">User Name</label><br>
          <input type="name" name="name" value="<?php echo $row['name']?>" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent"><br><br>
          <label for="email"  class="text-gray-700 text-2xl font-semibold">Email</label><br>
          <input type="email" name="email" value="<?php echo $row['email']?>" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent"><br><br>
          <label for="password"  class="text-gray-700 text-2xl font-semibold">Password</label><br>
          <input type="password" name="password" value="<?php echo $row['password']?>" class="w-full p-2 text-xl py-2 border border-amber-600 rounded-md outline-none bg-transparent"><br><br>
          <div class="flex justify-between">
               <input type="btn" value="cancel" class="bg-red-700 text-white p-2 text-center rounded-md">
               <a href="./controllers/editUserController.php"><input type="submit" value="Update" class="bg-green-700 text-white p-2 text-center rounded-md"></a>
          </div>
      </form>
      </div>
     </div>
     <div class="hidden w-1/2 relative lg:flex items-center justify-center h-full bg-gray-300">
            <div class="w-60 h-60 bg-gradient-to-tr from-violet-500 to-pink-500 rounded-full animate-pulse"></div>
            <div class="w-full h-1/2 bottom-0 bg-white/10 backdrop-blur-lg absolute"></div>
       </div>
     </div> 
      <?php   }  }?>
</body>
</html>