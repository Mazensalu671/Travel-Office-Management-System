<?php
session_start();
if (!isset($_SESSION['office_id'])) {
    die("Office ID is not set in the session.");
}

$office_id = $_SESSION['office_id'];
?>

<?php

include "../db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $filename = $_FILES["choosefile"]["name"];
  $tempfile = $_FILES["choosefile"]["tmp_name"];
  $folder = "../upload/offers/" . $filename;
  $old_filename = $_POST['image_old'];  // Get the old filename from the hidden input field
  $isavailable = mysqli_real_escape_string($conn, $_POST['isavailable']);

  if ($filename != '') {
      $update_filename = $filename;
      if (move_uploaded_file($tempfile, $folder)) {
          if (file_exists("../upload/offers/".$old_filename)) {
              unlink("../upload/offers/".$old_filename);
          }
      } else {
          echo "Failed to upload the file";
          exit;
      }
  } else {
      $update_filename = $old_filename;
  }

  $sql = "UPDATE office_offers SET 
          offer_image='$update_filename',
          isavailable='$isavailable'
          WHERE offer_id = $id";
  
  $result = mysqli_query($conn, $sql);

  if ($result) {
      header("Location:../offers.php?msg=Data updated successfully");
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
  <link rel="stylesheet" href="../assets/css/style.css">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Edit Offer</title>
</head>

<body>
<div class="main">     
    <div class="details">
    <div class="recentOrders">
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Offer Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `office_offers` WHERE offer_id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
      <div class="row mb-3">
        
             <div class="mb-3">
               <label class="form-label">Offer Image :</label>
               <input type="file" class="form-control" name="choosefile">
               <input type="hidden" class="form-control" name="image_old" value="<?php echo $row['offer_image'] ?>">
               <img src="../upload/offers/<?php echo $row['offer_image'] ?>" width="60px">
             </div>

             <div class="mb-3">
                  <label class="form-label">Approve :</label>
                  <input type="text" class="form-control" name="isavailable" value="<?php echo $row['isavailable'] ?>">
             </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="../offers.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
  </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
