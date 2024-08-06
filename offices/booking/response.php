<?php
include "../db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $filename = $_FILES["choosefile"]["name"];
    $tempfile = $_FILES["choosefile"]["tmp_name"];
    $folder = "../upload/response/" . $filename;
    $response_booking = $_POST['response_booking'];
    
    if ($filename == "") {
        echo "<div class='alert alert-danger' role='alert'>
              <h4 class='text-center'>Select Image</h4>
              </div>";
    } else {
        
        $sql = "INSERT INTO confirm_booking (response_booking, confirm_image, confirm_bookingid) 
                VALUES ('$response_booking', '$filename', '$id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            move_uploaded_file($tempfile, $folder);
            header("Location:../booking.php?msg=response successfully");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/logo.png">
    <title>Response Page</title>
</head>

<body>
    <div class="main">     
        <div class="details">
            <div class="recentOrders">
                <div class="container">
                    <div class="container d-flex justify-content-center">
                        <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Response message:</label>
                                <input type="text" class="form-control" name="response_booking">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Response Image:</label>
                                <input type="file" class="form-control" name="choosefile" id="">
                            </div>
                            
                            <div><br>
                                <button type="submit" class="btn btn-success" name="submit">Response</button>
                                <a href="../booking.php" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
