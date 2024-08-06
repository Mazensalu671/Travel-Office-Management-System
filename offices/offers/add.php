<?php
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
   <link rel="stylesheet" href="../assets/css/style.css">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/logo.png">
    <title>Add Offer</title>
</head>
<body>

<div class="main">
    <div class="details">
    <div class="recentOrders">
  <div class="container">
    <div class="text-center mb-4">
      <h3>Add Offer Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
if (isset($_POST['submit'])) {
    include "../db_conn.php";
    
    $filename = $_FILES["choosefile"]["name"];
    $tempfile = $_FILES["choosefile"]["tmp_name"];
    $folder = "../upload/offers/" . $filename;
    $isavailable = mysqli_real_escape_string($conn, $_POST['isavailable']);
    
    if ($filename == "") {
        echo "<div class='alert alert-danger' role='alert'>
                <h4 class='text-center'>Select Image</h4>
              </div>";
    } else {
        $sql = "INSERT INTO `office_offers` (offer_id, offer_image, isavailable, offer_office)
                VALUES (null, '$filename', '$isavailable', '$office_id')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (move_uploaded_file($tempfile, $folder)) {
                header("Location:../offers.php?msg=New record created successfully");
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                        <h4 class='text-center'>Failed to upload image</h4>
                      </div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                    <h4 class='text-center'>Failed to add offer: " . mysqli_error($conn) . "</h4>
                  </div>";
        }
    }
}
?>

         <form action="add.php" method="post" enctype="multipart/form-data">
         <div class="row mb-3">
            <div class="mb-3">
             <label class="form-label">Offer Image :</label>
            <input type="file" class="form-control" name="choosefile">
             </div>

            <div class="mb-3"><br>
            <label class="form-label">Approve :</label>
            <input type="text" class="form-control" name="isavailable">
          </div>
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Save</button>
          <a href="../offers.php" class="btn btn-danger">Cancel</a>
        </form>

       </div>
    </div>
    </div>
    </div>
</div>

</body>
</html>
