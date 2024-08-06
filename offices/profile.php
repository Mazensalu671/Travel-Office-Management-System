<?php

include "db_conn.php";
session_start();


if (!isset($_SESSION['office_id'])) {
    die("Office ID is not set in the session.");
}

$office_id = $_SESSION['office_id'];



if (isset($_POST["submit"])) {
    $filename = $_FILES["choosefile"]["name"];
    $tempfile = $_FILES["choosefile"]["tmp_name"];
    $folder = "../upload/offices/".$filename;
    $old_filename = $_POST['image_old'];  
    $office_name = $_POST['office_name'];
    $office_location = $_POST['office_location'];
    $bank_account = $_POST['bank_account'];
    $office_type = $_POST['office_type'];
    $office_state = $_POST['office_state'];
    $office_details = $_POST['office_details'];
    $offowner_office = $_POST['offowner_office'];

    if ($filename != '') {
        $update_filename = $filename;
        if (move_uploaded_file($tempfile, $folder)) {
            if (file_exists("../upload/offices/".$old_filename)) {
                unlink("../upload/offices/".$old_filename);
            }
        } else {
            echo "Failed to upload the file";
            exit;
        }
    } else {
        $update_filename = $old_filename;
    }

    $sql = "UPDATE offices SET 
            office_name='$office_name',
            office_location='$office_location',
            office_image='$update_filename',
            bank_account='$bank_account',
            office_type='$office_type',
            office_state='$office_state',
            office_details='$office_details',
            offowner_office='$offowner_office'
            WHERE office_id = $id";
  
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location:../offices.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
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
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Edit offices</title>
</head>
<body>

<div class="main">     
    <div class="details">
    <div class="recentOrders">
        <div class="container">
            
            <?php
        
            $sql = "SELECT * FROM `offices` WHERE office_id = $office_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="container d-flex justify-content-center">
                <form action="" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="mb-3">
                            <label class="form-label">Office Image :</label>
                            <input type="file" class="form-control" name="choosefile">
                            <input type="hidden" class="form-control" name="image_old" value="<?php echo $row['office_image'] ?>">
                            <img src="upload/offices/<?php echo $row['office_image'] ?>" width="70px">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Office name:</label>
                            <input type="text" class="form-control" name="office_name" value="<?php echo $row['office_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Office location:</label>
                            <input type="text" class="form-control" name="office_location" value="<?php echo $row['office_location'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Office state:</label>
                            <input type="text" class="form-control" name="office_state" value="<?php echo $row['office_state'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Office details:</label>
                            <input type="text" class="form-control" name="office_details" value="<?php echo $row['office_details'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank account:</label>
                            <input type="text" class="form-control" name="bank_account" value="<?php echo $row['bank_account'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Office type:</label>
                            <input type="text" class="form-control" name="office_type" value="<?php echo $row['office_type'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Office Owner:</label>
                            <input type="text" class="form-control" name="offowner_office" value="<?php echo $row['offowner_office'] ?>">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success" name="submit">Update</button>
                            <a href="dashbord.php" class="btn btn-danger">Cancel</a>
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
