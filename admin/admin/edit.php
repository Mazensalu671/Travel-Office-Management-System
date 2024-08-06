<?php
include "../db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $admin_name = $_POST['admin_name'];
  $admin_password = $_POST['admin_password'];
  $admin_email = $_POST['admin_email'];

  $sql = "UPDATE `admins_table` SET `admin_name`='$admin_name',`admin_password`='$admin_password',`admin_email`='$admin_email' WHERE admin_id = $id";


  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location:../admin.php?msg=Data updated successfully");
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
  <link rel="icon" href="assets/img/logo.png">
  <title>Edit Admin</title>
</head>

<body>
  
<div class="main">     
    <div class="details">
    <div class="recentOrders">
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Admin Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `admins_table` WHERE admin_id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="mb-3">
            <label class="form-label">admin name:</label>
            <input type="text" class="form-control" name="admin_name" value="<?php echo $row['admin_name'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">email:</label>
            <input type="email" class="form-control" name="admin_email" value="<?php echo $row['admin_email'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">password:</label>
          <input type="password" class="form-control" name="admin_password" value="<?php echo $row['admin_password'] ?>">
        </div>

      

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="../admin.php" class="btn btn-danger">Cancel</a>
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