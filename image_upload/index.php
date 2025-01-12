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
 <style>
      td img{
        width: 36px;
        height: 36px;
        border-radius: 50%;
      }
 </style>
<body>
     <a href="create.php"><h2>Add New</h2></a>
     <?php
       $sql = "SELECT * FROM images";
       $result = $conn->query($sql);
       if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
             $row_name = $row['file_name'];
              $file  = './uploads/'.$row_name;
            ?>
               <div class="contaniner">
                <div class="main">
                     <table>
                          <thead>
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Images</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['full_name']?></td>
                                    <td><img src="./uploads/<?php echo $row_name ?>" alt=""> </td>
                                    <!-- <img src="./uploads/" alt=""> -->
                                </tr>
                            </tbody>
                          </thead>
                     </table>
                </div>
               </div>
            <?php
        }
       }
     ?>
</body>
</html>