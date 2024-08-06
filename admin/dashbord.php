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
        include "db_conn.php";
     ?>

        
        <div class="main">

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <?php 
                         $dash_admin_query = "SELECT * FROM admins_table";
                         $dash_admin_query_run = mysqli_query($conn,$dash_admin_query);
                         if($admin_total = mysqli_num_rows($dash_admin_query_run)){

                            echo '<div class="numbers">'.$admin_total.'</div>';
                         }
                         else{

                            echo '<div class="numbers">No Data</div>';

                         }
                        ?>
                        <div class="cardName">Admin</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php 
                         $dash_offiecs_query = "SELECT * FROM offices";
                         $dash_offiecs_query_run = mysqli_query($conn,$dash_offiecs_query);
                         if($offiecs_total = mysqli_num_rows($dash_offiecs_query_run)){

                            echo '<div class="numbers">'.$offiecs_total.'</div>';
                         }
                         else{

                            echo '<div class="numbers">No Data</div>';

                         }
                        ?>
                        <div class="cardName">Travel Offiecs</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="storefront-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php 
                         $dash_users_query = "SELECT * FROM users_table";
                         $dash_users_query_run = mysqli_query($conn,$dash_users_query);
                         if($users_total = mysqli_num_rows($dash_users_query_run)){

                            echo '<div class="numbers">'.$users_total.'</div>';
                         }
                         else{

                            echo '<div class="numbers">No Data</div>';

                         }
                        ?>
                        <div class="cardName">Users</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php 
                         $dash_booking_query = "SELECT * FROM booking_table";
                         $dash_booking_query_run = mysqli_query($conn,$dash_booking_query);
                         if($booking_total = mysqli_num_rows($dash_booking_query_run)){

                            echo '<div class="numbers">'.$booking_total.'</div>';
                         }
                         else{

                            echo '<div class="numbers">No Data</div>';

                         }
                        ?>
                        <div class="cardName">Booking</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="clipboard-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
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
          
          
          
                            
                        
        
          </tr>
          </thead>
          <tbody>
          <?php
         $sql = "SELECT * FROM `booking_table`";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($result)) {
         ?>
          <tr>
            
            <td><?php echo $row["booking_id"] ?></td>
            <td><?php echo $row["services_name"] ?></td>
            <td><?php echo $row["customer_fullname"] ?></td>
            <td><?php echo $row["service_price"] ?></td>
            
          
            
            </tr>
            <?php
            }
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
</body>

</html>