<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `booking_table` WHERE booking_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location:../booking.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}