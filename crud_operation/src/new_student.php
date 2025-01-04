<?php 
 include 'db_connect.php';
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
           <h2 class="flex text-center">Add New Student</h2>
           <form action="insert_student.php" method="post" class="w-full  flex justify-center" >
               <label for="f-name">First Name</label><br>
               <input type="text" name="f_name"><br><br>
               <label for="l-name">Last Name</label><br>
               <input type="text" name="l_name"><br><br>
               <label for="age">Age</label><br>
               <input type="text" name="age"><br><br>
               <div class="flex justify-between">
                 <a href="index.php"><button class="bg-blue-700 px-2 text-white text-xl -mb-2 rounded-md">Cancel</button></a>
                  <input type="submit" name="submit" value="Update" class="bg-red-600 px-2 text-white text-xl -mb-2 rounded-md" />
               </div>
           </form>
     </div>
</body>
</html>