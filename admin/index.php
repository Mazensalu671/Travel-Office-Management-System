<?php
include "db_conn.php";
session_start();

if (isset($_POST['submit'])) {
    $admin_name = $_POST['admin_name'] ;
    $admin_password = $_POST['admin_password'] ;
    $sql =mysqli_query($conn,"SELECT * FROM admins_table WHERE admin_name = '$admin_name' AND admin_password = '$admin_password' ");
    $row =mysqli_fetch_array($sql);

    if(is_array($row)){

        $_SESSION["admin_name"] = $row['admin_name'];
        $_SESSION["admin_password"] = $row['admin_password'];

    }else{
        echo "Failed: " . mysqli_error($conn);
    }
    if(isset($_SESSION["admin_name"])){
        header("location:dashbord.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login_style.css">
    <link rel="icon" href="assets/img/logo.png">
    <title>Login Page | Admin</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="" method="post">
                <h1>Sign In</h1>
                <span>Enter your user name and password</span>
                <?php
                if (isset($message)) {
                    echo '<div class="message">' . $message . '</div>';
                }
                ?>
                <input type="text" placeholder="user name" name="admin_name">
                <input type="password" placeholder="Password" name="admin_password">
                <button type="submit" class="btn btn-success" name="submit">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <img src="assets/img/logo.png"><br>
                    <h1>Book Your Ticket</h1>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
