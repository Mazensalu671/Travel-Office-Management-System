<?php
include "db_conn.php";
session_start();


if (!isset($_SESSION['office_id'])) {
    die("Office ID is not set in the session.");
}

$office_id = $_SESSION['office_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png">
    <title>Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    
<?php 
        include "navbar.php";
     ?>

        
        <div class="main">

            
         <div class="cardBox">
            <div class="card">
            <div>
            <?php 
            
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (!isset($_SESSION['office_id'])) {
                die("Office ID is not set in the session.");
            }

            $office_id = $_SESSION['office_id'];
            $dash_booking_query = "SELECT * FROM booking_table WHERE office_id = $office_id";
            $dash_booking_query_run = mysqli_query($conn, $dash_booking_query);

            if ($booking_total = mysqli_num_rows($dash_booking_query_run)) {
                echo '<div class="numbers">' . $booking_total . '</div>';
            } else {
                echo '<div class="numbers">No Data</div>';
            }
            ?>
            <div class="cardName">Booking</div>
             </div>
                    <div class="iconBx">
                    <ion-icon name="clipboard-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        
                    <?php 
            
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (!isset($_SESSION['office_id'])) {
                die("Office ID is not set in the session.");
            }

            $office_id = $_SESSION['office_id'];

            
            $dash_services_query = "SELECT * FROM services_table WHERE service_office  = $office_id";
            $dash_services_query_run = mysqli_query($conn, $dash_services_query);

            if ($dash_services_query_run) {
                $services_total = mysqli_num_rows($dash_services_query_run);
                echo '<div class="numbers">' . $services_total . '</div>';
            } else {
                echo '<div class="numbers">No Data</div>';
                
                echo '<div class="error">' . mysqli_error($conn) . '</div>';
            }
            ?>
                        <div class="cardName">Services</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="document-text-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php 
            
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (!isset($_SESSION['office_id'])) {
                die("Office ID is not set in the session.");
            }

            $office_id = $_SESSION['office_id'];
            $dash_offiers_query = "SELECT * FROM office_offers WHERE offer_office   = $office_id";
            $dash_offiers_query_run = mysqli_query($conn, $dash_offiers_query);

            if ($dash_offiers_query_run) {
                $offiers_total = mysqli_num_rows($dash_offiers_query_run);
                echo '<div class="numbers">' . $offiers_total . '</div>';
            } else {
                echo '<div class="numbers">No Data</div>';
                
                echo '<div class="error">' . mysqli_error($conn) . '</div>';
            }
            ?>
                        <div class="cardName">Offers</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="sparkles"></ion-icon>
                    </div>
                </div>

                

               
            </div>

            <!-- =============================================================== -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Booking</h2>
                        <a href="booking.php" class="btn">View All</a>
                    </div>

                    <table>
          <thead>
          <tr>
          <th >Booking ID </th>
          <th >Services Name</th>
          <th >Customer Name</th>
          <th >Service Price</th>
          <th>Statues</th>
          
          
          
                            
                        
        
          </tr>
          </thead>
          <tbody>
          <?php
       $sql = "SELECT * FROM `booking_table` WHERE `office_id` = $office_id";
       $result = mysqli_query($conn, $sql);

       if ($result && mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
       ?>
          <tr>
            
            <td><?php echo $row["booking_id"] ?></td>
            <td><?php echo $row["services_name"] ?></td>
            <td><?php echo $row["customer_fullname"] ?></td>
            <td><?php echo $row["service_price"] ?></td>
            <td> 
                        <?php   if ($row ['statues'] == 1 ){
                             echo  "Pending" ;}
                                if ($row ['statues'] == 2 ){
                                echo  "AcCept" ;}
                                if ($row ['statues'] == 3 ){
                                    echo  "Reject" ;}
                        ?>
                    </td>
            
          
            
            </tr>
            <?php
            }}
        ?>
       </tbody>
       </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>