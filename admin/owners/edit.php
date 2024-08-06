<?php
include "../db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $officeowner_name = $_POST['officeowner_name'];
   $officeowner_username = $_POST['officeowner_username'];
   $officeowner_password = $_POST['officeowner_password'];
   $isactive = $_POST['isactive'];

  $sql = "UPDATE office_owner SET officeowner_name ='$officeowner_name',officeowner_username ='$officeowner_username',
  officeowner_password ='$officeowner_password',isactive ='$isactive' WHERE officeowner_id = $id";


  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location:../owner.php?msg=Data updated successfully");
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
  <link rel="icon" href="../assets/img/logo.png">
  <title>Edit Owner</title>
</head>

<body>
  
<div class="main">     
    <div class="details">
    <div class="recentOrders">
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Owner Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `office_owner` WHERE officeowner_id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="mb-3">
            <label class="form-label">Owner Name:</label>
            <input type="text" class="form-control" name="officeowner_name" value="<?php echo $row['officeowner_name'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Owner Username:</label>
            <input type="text" class="form-control" name="officeowner_username" value="<?php echo $row['officeowner_username'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Owner Password:</label>
          <input type="password" class="form-control" name="officeowner_password" value="<?php echo $row['officeowner_password'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Approve:</label>
          <input type="text" class="form-control" name="isactive" value="<?php echo $row['isactive'] ?>">
        </div>

      

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="../owner.php" class="btn btn-danger">Cancel</a>
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