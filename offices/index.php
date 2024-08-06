<?php
include "db_conn.php";
session_start();

if (isset($_POST['submit'])) {
    $officeowner_username = mysqli_real_escape_string($conn, $_POST['officeowner_username']);
    $officeowner_password = mysqli_real_escape_string($conn, $_POST['officeowner_password']);

    if (!empty($officeowner_username) && !empty($officeowner_password)) {
        
        $sql = "SELECT oo.*, o.office_id FROM office_owner oo 
                LEFT JOIN offices o ON oo.officeowner_id = o.offowner_office 
                WHERE oo.officeowner_username = '$officeowner_username' 
                AND oo.officeowner_password = '$officeowner_password'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($row) {
                
                echo "<pre>";
                print_r($row);
                echo "</pre>";

                $_SESSION["officeowner_username"] = $row['officeowner_username'];
                $_SESSION["officeowner_password"] = $row['officeowner_password'];
                
                if (isset($row['office_id'])) {
                    $_SESSION['office_id'] = $row['office_id'];
                    echo "Office ID is set: " . $_SESSION['office_id'];
                    header("Location: dashbord.php");
                    exit();
                } else {
                    echo "Office ID not found in the database row.";
                }
            } else {
                echo "Invalid Username or Password!";
            }
        } else {
            echo "Failed to execute query: " . mysqli_error($conn);
        }
    } else {
        echo "Please enter both username and password!";
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
    <title>Login Page | Offices</title>
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
                <input type="text" placeholder="User Name" name="officeowner_username" required>
                <input type="password" placeholder="Password" name="officeowner_password" required>
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
