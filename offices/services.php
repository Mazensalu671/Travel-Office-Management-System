<?php
include "db_conn.php";
session_start();

// تأكد من أن office_id موجود في الجلسة
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/logo.png">
    <title>Services</title>
</head>

<body>

<?php 
    include "navbar.php";
?>

<div class="main">     
    <div class="details">
        <div class="recentOrders">
            <?php
            if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                ' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
            <div class="cardHeader">
                <a href="services/add.php" class="btn">Add New Services</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Service Current Price</th>
                        <th>Service New Price</th>
                        <th>Service Notes</th>
                        <th>Service Type</th>
                        <th>Approve</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // استعلام لجلب الخدمات بناءً على service_office
                $sql = "SELECT * FROM `services_table` WHERE `service_office` = $office_id";
                $result = mysqli_query($conn, $sql);

                // التحقق من نتيجة الاستعلام
                if (!$result) {
                    die("Failed to execute query: " . mysqli_error($conn));
                }

                // جلب البيانات وعرضها
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><div class="imgBx"><img src="upload/services/<?php echo $row["service_image"]; ?>" width="70px"></div></td>
                        <td><?php echo $row["service_id"]; ?></td>
                        <td><?php echo $row["service_name"]; ?></td>
                        <td><?php echo $row["service_current_price"]; ?></td>
                        <td><?php echo $row["service_new_price"]; ?></td>
                        <td><?php echo $row["service_notes"]; ?></td>
                        <td><?php echo $row["service_type"]; ?></td>
                        <td><?php echo $row['isavailable'] == 1 ? 'Active' : 'Un Active'; ?></td>
                        <td>
                            <a href="services/edit.php?id=<?php echo $row["service_id"]; ?>"><ion-icon name="create-outline"></ion-icon></a>
                            <a href="services/delete.php?id=<?php echo $row["service_id"]; ?>"><ion-icon name="trash-outline"></ion-icon></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="assets/js/alert"></script>
</body>
</html>
