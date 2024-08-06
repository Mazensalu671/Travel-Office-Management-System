<?php
include "db_conn.php";
session_start();

if (!isset($_SESSION['office_id'])) {
    die("Office ID is not set in the session.");
}

$office_id = $_SESSION['office_id'];

if (isset($_GET['id']) && isset($_GET['statues'])) {  
    $id = $_GET['id'];  
    $statues = $_GET['statues'];  
    $updateQuery = "UPDATE booking_table SET statues='$statues' WHERE booking_id='$id'";
    if (mysqli_query($conn, $updateQuery)) {
        header("location:booking.php?msg=Status updated successfully");  
        die();  
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="assets/img/logo.png">
  <title>Booking</title>
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
       <table>
       <thead>
       <tr>
          <th>Booking ID</th>
          <th>Services Name</th>
          <th>Customer Name</th>
          <th>Service Price</th>
          <th>Service Notes</th>
          <th>Payment Image</th>
          <th>View Details</th>
          <th>Response</th>
          <th>Statues</th>
          <th>Action</th>
       </tr>
       </thead>
       <tbody>
       <?php
       $sql = "SELECT * FROM booking_table WHERE office_id = $office_id";
       $result = mysqli_query($conn, $sql);

       if ($result && mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
       ?>
       <tr>
          <td><?php echo $row["booking_id"]; ?></td>
          <td><?php echo $row["services_name"]; ?></td>
          <td><?php echo $row["customer_fullname"]; ?></td>
          <td><?php echo $row["service_price"]; ?></td>
          <td><?php echo $row["service_notes"]; ?></td>
          <td><img src="upload/offers/<?php echo $row['payment_image']; ?>" width="60px"></td>
          <td><a href="booking/view.php?id=<?php echo $row["booking_id"]; ?>"><span class="status inProgress">View</span></a></td>
          <td><a href="booking/response.php?id=<?php echo $row["booking_id"]; ?>"><span class="status pending">Response</span></a></td>
          <td> 
            <?php 
                if ($row['statues'] == 1) {
                    echo "Pending";
                } elseif ($row['statues'] == 2) {
                    echo "Accept";
                } elseif ($row['statues'] == 3) {
                    echo "Reject";
                }
            ?>
          </td>
          <td>  
              <select onchange="statues_update(this.value, '<?php echo $row['booking_id']; ?>')">  
                  <option value="">Update Status</option>  
                  <option value="1">Pending</option>  
                  <option value="2">Accept</option>  
                  <option value="3">Reject</option>  
              </select>  
          </td>
          <td><a href="booking/delete.php?id=<?php echo $row["booking_id"]; ?>"><ion-icon name="trash-outline"></ion-icon></a></td>
       </tr>
       <?php
           }
       }
       ?>
       </tbody>
       </table>
     </div>
    </div>
  </div>

  <!-- Bootstrap -->
  <script type="text/javascript">  
      function statues_update(value, id){  
          let url = "booking.php";  
          window.location.href = url + "?id=" + id + "&statues=" + value;  
      }  
 </script> 
</body>
</html>
