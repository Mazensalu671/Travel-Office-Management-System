<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `offices` WHERE office_id  = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location:../offices.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}



