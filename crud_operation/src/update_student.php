<?php
 
 include 'db_connect.php';
 $id = $_GET['id'];
 $sql = "SELECT * FROM students WHERE id = $id";
 $query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="flex justify-center min-h-4 w-screen">
    <?php
      if($query -> num_rows > 0){
        while($row = $query -> fetch_assoc()):{
    ?>
           <h2 class="flex text-center">Add New Student</h2>
           <form action="update_one_student.php" method="post" class="w-full  flex justify-center" >
               <!-- <label for="id">ID</label><br> -->
               <input type="hidden" name="id" value=<?php echo $row['id']?>><br><br>

               <label for="f-name">First Name</label><br>
               <input type="text" name="f_name" value=<?php echo $row['first_name']?>><br><br>

               <label for="l-name">Last Name</label><br>
               <input type="text" name="l_name" value= <?php echo $row['last_name']?>><br><br>

               <label for="age">Age</label><br>
               <input type="text" name="age"  value= <?php echo $row['age']?>><br><br>

               <div class="flex justify-between">
                 <a href="index.php"><button class="bg-blue-700 px-2 text-white text-xl -mb-2 rounded-md">Cancel</button></a>
                  <a href="update_one_student.php?id=<?php echo $row['id']?>"><input type="submit" name="submit" value="Update" class="bg-red-600 px-2 text-white text-xl -mb-2 rounded-md" /></a>
               </div>
           </form>
     </div>
     <?php
     }
    endwhile;
         }
     ?>
</body>
</html>