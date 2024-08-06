<?php
include "../db_conn.php";
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="../assets/img/logo.png">
  <title>View Office</title>
</head>

<body>
<div class="main">     
    <div class="details">
    <div class="recentOrders">
        <div class="container">
            <?php
            // Fetch office details
            $sql = "SELECT * FROM `booking_table` WHERE booking_id  = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $office = mysqli_fetch_assoc($result);
            ?>
            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width:50vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Services Name :</label>
                            <input type="text" class="form-control" value="<?php echo $office ? $office['services_name'] : ''; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Customer Name :</label>
                            <input type="text" class="form-control" value="<?php echo $office ? $office['customer_fullname'] : ''; ?>">
                        </div>
                        <div class="mb-3"><br>
                            <label class="form-label">Service Price :</label>
                            <input type="text" class="form-control" value="<?php echo $office ? $office['service_price'] : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Service Notes :</label>
                            <input type="text" class="form-control" value="<?php echo $office ? $office['service_notes'] : ''; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Customer Phone  :</label>
                            <input type="text" class="form-control" value="<?php echo $office ? $office['customer_phone'] : ''; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Booking Date :</label>
                            <input type="text" class="form-control" value="<?php echo $office ? $office['booking_date'] : ''; ?>">
                        </div>

                        <div class="mb-3"><br>
                            <label class="form-label">Passport Image :</label>
                            <img src="../upload/offers/<?php echo $row['passport_image'] ?>" width="60px">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Payment Image  :</label>
                            <img src="../upload/offers/<?php echo $row['payment_image'] ?>" width="60px">
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">Booking Notes :</label>
                            <input type="text" class="form-control" value="<?php echo $office ? $office['booking_notes'] : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Methode  :</label>
                            <input type="text" class="form-control" value="<?php echo $office ? $office['payment_methode'] : ''; ?>">
                        </div>

                        
                        
                        

                        <div>
                            <a href="../booking.php" class="btn btn-danger">Go Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
