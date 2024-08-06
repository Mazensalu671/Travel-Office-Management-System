<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `office_offers` WHERE offer_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location:../offers.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
