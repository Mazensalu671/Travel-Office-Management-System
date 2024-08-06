<?php
include "../db_conn.php";

if (isset($_POST["submit"])) {
   $filename = $_FILES["choosefile"]["name"];
   $tempfile = $_FILES["choosefile"]["tmp_name"];
   $folder = "../upload/offices/".$filename;
   $office_name = $_POST['office_name'];
   $office_location = $_POST['office_location'];
   $bank_account = $_POST['bank_account'];
   $office_type = $_POST['office_type'];
   $office_state = $_POST['office_state'];
   $office_details = $_POST['office_details'];
   $offowner_office  = $_POST['offowner_office'];

   $sql = "INSERT INTO offices (office_name,office_location,office_image, bank_account, office_type, office_state, office_details,offowner_office) 
           VALUES ('$office_name','$office_location', '$filename', '$bank_account', '$office_type', '$office_state', '$office_details','$offowner_office')";

if($filename == "")
{
    echo  " <div class='alert alert-danger' role='alert'>
           <h4 class='text-center'>Select Image</h4>
           </div>  ";
}else{
    $result = mysqli_query($conn, $sql);
    move_uploaded_file($tempfile, $folder);
    header("Location:../offices.php?msg=New record created successfully");
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
   <title>Add New Office</title>
</head>

<body>
   <div class="main">     
    <div class="details">
    <div class="recentOrders">
     <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Office</h3>
         <p class="text-muted">Complete the form below to add a new Office</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
             <div class="mb-3">
               <label class="form-label" >Office Image :</label>
               <input type="file" class="form-control" name="choosefile"  id="">
             </div>

            <div class="mb-3">
               <label class="form-label">Office Name :</label>
               <input type="text" class="form-control" name="office_name">
            </div>

            <div class="col">
               <label class="form-label">Office Location :</label>
               <input type="text" class="form-control" name="office_location">
            </div>

            <div class="col">
               <label class="form-label">Bank Account :</label>
               <input type="text" class="form-control" name="bank_account">
            </div>

            <div class="mb-3">
               <label class="form-label">Office Type  :</label>
               <input type="text" class="form-control" name="office_type">
            </div>

            <div class="mb-3">
               <label class="form-label">Office State  :</label>
               <input type="text" class="form-control" name="office_state">
            </div>

            <div class="mb-3">
               <label class="form-label">Office Details  :</label>
               <input type="text" class="form-control" name="office_details">
            </div>

            <div class="mb-3">
               <label class="form-label">Office Owner  :</label>
               <input type="text" class="form-control" name="offowner_office">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="../offices.php" class="btn btn-danger">Cancel</a>
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
