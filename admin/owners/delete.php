<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `office_owner` WHERE officeowner_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location:../owner.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
