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
              <h4>All users</h4>
              <a href="addUSers.php"><button class="bg-amber-700 text-white p-2 rounded-sm">Add users</button></a>
           </div>
           <table>
            <thead>
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
                    $sql = "SELECT * FROM  users";
                    $result = $conn->query($sql);
                    if($result -> num_rows > 0){
                         while($row = $result->fetch_assoc()){
                ?>
                  <tr>
                    <td class="text-center"><?php echo $row['id']?></td>
                    <td class="text-center"><?php echo $row['name']?></td>
                    <td class="text-center"><?php echo $row['email']?></td>
                    <td class="text-center"><?php echo $row['password']?></td>
                    <td class="text-center">
                        <a href="editUser.php?id=<?php echo $row['id']?>"><button>Edit</button></a>
                         <a href="./controllers/deleteUserController.php?id=<?php echo $row['id']?>"><button>Delete</button></a>
                    </td>
                  </tr>
            </tbody>
            <?php   }   }?>
           </table>
    </div>
</body>
</html>