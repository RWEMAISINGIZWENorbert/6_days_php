<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="flex flex-col justify-center w-full">
           <div class="flex justify-between w-full">
                 <h4 class="text-2xl text-gray-700 font-semibold">All Users</h4>
               <a href="adminDashboard.php?page=addUsers"><button class="bg-amber-700 text-white p-2 rounded-sm">Add users</button></a>
           </div>
           <?php
            if(isset($_GET['insertmsg'])) {
                 echo "<p class = 'text-xl font-semibold text-green-700 text-center -mt-2'>".$_GET['insertmsg']."</p>";
            }
          ?>
           <table class="bg-white rounded-md my-4">
            <thead class="w-full bg-gray-200 text-amber-700">
                <tr>
                    <th>ID</th>
                    <th>Names</th>
                    <th>Email Adress</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                 include 'db_connect.php';
                //  session_start();
                 $adminEmail = $_SESSION['email'];
                 $one = "SELECT * FROM admini WHERE email = '$adminEmail'";
                 $display = $conn -> query($one);
                 if($display->num_rows > 0){
                 $displayed = $display->fetch_assoc();
                  $displayedId = $displayed['id'];
                    $sql = "SELECT * FROM  users WHERE adminId = '$displayedId'";
                    $result = $conn->query($sql);
                    if($result -> num_rows > 0){
                         while($row = $result->fetch_assoc()){
                ?>
                  <tr class="space-x-3">
                    <td class="text-center"><?php echo $row['id']?></td>
                    <td class="text-center"><?php echo $row['name']?></td>
                    <td class="text-center"><?php echo $row['email']?></td>
                    <td class="text-center"><?php echo $row['password']?></td>
                    <td class="text-center">
                        <a href="adminDashboard.php?page=editUser&id=<?php echo $row['id']?>"><button class="bg-green-200 text-green-700 text-xl font-medium px-4 rounded-md">Edit</button></a>
                         <a href="./controllers/deleteUserController.php?id=<?php echo $row['id']?>"><button class="bg-red-300 text-red-700 text-xl font-medium px-4 rounded-md">Delete</button></a>
                    </td>
                  </tr>
            </tbody>
            <?php } } } ?>

           </table>
    </div>
</body>
</html>