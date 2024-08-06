<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="assets/img/logo.png">

  <title>Users</title>
</head>

<body>

<?php 
        include "navbar.php";
     ?>



  <div class="main">     
    <div class="details">
      <div class="recentOrders">
     
       <?php
       if (isset($_GET["msg"])) {
       $msg = $_GET["msg"];
       echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
       ' . $msg . '
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
       }
        ?>
       <div class="cardHeader">
       <a href="users/add.php" class="btn">Add New User</a>
       </div>

          <table>
          <thead>
          <tr>
          <th >ID</th>
          <th >Name</th>
          <th >Email</th>
          <th >Password</th>
          <th >Approve</th>
          <th >Action</th>
          </tr>
          </thead>
          <tbody>
          <?php
         $sql = "SELECT * FROM `users_table`";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($result)) {
         ?>
          <tr>
            <td><?php echo $row["user_id"] ?></td>
            <td><?php echo $row["user_name"] ?></td>
            <td><?php echo $row["user_email"] ?></td>
            <td><?php echo $row["user_password"] ?></td>
            <td>  
                <?php  
                       if ($row['isactive']==1) {  
                            echo "Active";  
                       }if ($row['isactive']==0) {  
                            echo "Un Active";  
                           }?>
             <td>
              <a href="users/edit.php?id=<?php echo $row["user_id"] ?>"><ion-icon name="create-outline"></ion-icon></a>
              <a href="users/delete.php?id=<?php echo $row["user_id"] ?>" ><ion-icon name="trash-outline"></ion-icon></a>
            </td>
            </tr>
            <?php
            }
        ?>
       </tbody>
       </table>
     </div>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>