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

  <title>Travel Offiec </title>
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
       <a href="offices/add.php" class="btn">Add New Offiec</a>
       </div>

          <table>
          <thead>
          <tr>
          <th >Image</th>
          <th >ID</th>
          <th >Name</th>
          <th >Location</th>
          <th >Bank Account</th>
          <th >Type</th>
          <th >State</th>
          <th >Details</th>
          <th >View</th>
          <th >Action</th>
          </tr>
          </thead>
          <tbody>
          <?php
         $sql = "SELECT * FROM `offices`";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($result)) {
         ?>
          <tr>
            <div class ="imgBx"><td><img src = "upload/offices/<?php echo $row["office_image"] ?>" width=60px></td></div> 
            <td><?php echo $row["office_id"] ?></td>
            <td><?php echo $row["office_name"] ?></td>
            <td><?php echo $row["office_location"] ?></td>
            <td><?php echo $row["bank_account"] ?></td>
            <td><?php echo $row["office_type"] ?></td>
            <td><?php echo $row["office_state"] ?></td>
            <td><?php echo $row["office_details"] ?></td>
            
            
            <td>
            <a href="offices/view.php?id=<?php echo $row["office_id"] ?>"><span class="status inProgress">View</span></a>
            </td>
            <td>
              <a href="offices/edit.php?id=<?php echo $row["office_id"] ?>"><ion-icon name="create-outline"></ion-icon></a>
              <a href="offices/delete.php?id=<?php echo $row["office_id"] ?>" ><ion-icon name="trash-outline"></ion-icon></a>
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