<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="./controllers/addUserController.php" method="post">
          <label for="name">User Name</label><br>
          <input type="text" name="name"><br><br>
          <label for="email">Email Adress</label><br>
          <input type="email" name="email"><br><br>
          <label for="password">Password</label><br>
          <input type="password" name="password"><br><br>

          <div class="flex justify-end">
             <a href="adminDashboard.php?page=users"><input type="button" value="Cancel"></a>
              <input type="submit" value="Add" class="bg-amber-700 text-white text-center px-2">
          </div>
     </form>
</body>
</html>