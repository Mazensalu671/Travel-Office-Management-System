<?php
include "../db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $user_name = $_POST['user_name'];
   $user_email = $_POST['user_email'];
   $user_verifycode = $_POST['user_verifycode'];
   $isactive = $_POST['isactive'];
   $user_password = $_POST['user_password'];


  $sql = "UPDATE `users_table` SET 
  `user_name`='$user_name',
  `user_email`='$user_email',
  `user_verifycode`='$user_verfiycode',
  `isactive`='$isactive',
  `user_password`='$user_password' WHERE user_id = $id";


  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location:../users.php?msg=Data updated successfully");
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
  <title>Edit User</title>
</head>

<body>
  
<div class="main">     
    <div class="details">
    <div class="recentOrders">
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `users_table` WHERE user_id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
        <div class="mb-3">
                  <label class="form-label"> User name:</label>
                  <input type="text" class="form-control" name="user_name" value="<?php echo $row['user_name'] ?> ">
               </div>

               <div class="mb-3">
               <label class="form-label">User email:</label>
               <input type="email" class="form-control" name="user_email" value="<?php echo $row['user_email'] ?> ">
            </div>

               <div class="mb-3">
                  <label class="form-label"> User password :</label>
                  <input type="password" class="form-control" name="user_password" value="<?php echo $row['user_password'] ?> ">
               </div>

               <div class="mb-3">
               <label class="form-label">User verfiycode:</label>
               <input type="text" class="form-control" name="user_verifycode" value="<?php echo $row['user_verifycode'] ?> ">
            </div>

               <div class="mb-3">
                  <label class="form-label"> Users approve :</label>
                  <input type="text" class="form-control" name="isactive" value="<?php echo $row['isactive'] ?>">
               </div>
               </div>

      

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="../users.php" class="btn btn-danger">Cancel</a>
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