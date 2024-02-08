<?php
include("db_config.php");
session_start();
$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST["pass"];
    $confirmedPassword = $_POST["pass1"];



    if ($newPassword === $confirmedPassword) {
        if (isset($_SESSION['id_user'])) {
            $userID = $_SESSION["id_user"];
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $updateQuery = "UPDATE registered_user SET user_password = :password WHERE id_user = :id_user";
            $stmt = $pdo->prepare($updateQuery);
            $stmt->bindParam(":password", $hashedNewPassword);
            $stmt->bindParam(":id_user", $userID);

            if ($stmt->execute()) {
                echo "<script> alert('Password updated successfully.'); window.location.href = 'login-as-user.php';</script>";
            } else {
                echo "Error updating password: " . $stmt->errorInfo()[2];
            }
        } else {
            echo "Session ID not set.";
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@200;300;500&family=Dancing+Script:wght@500&family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zeyada&display=swap" rel="stylesheet">
    <script src="libraries/jquery.min.js"></script>

    <style>
        body {
            font-family: 'Poiret One', sans-serif;
            font-weight: bold;
            padding-top: 7%;
        }

        .form-signup {
            margin: 0 auto;
            max-width: 400px;
            background-color: white;
            padding: 40px;
            border: 2px solid lightgray;
            box-shadow: 10px 10px lightgray;
        }

        .logo img {
            width: 80px;
            height: 80px;
        }

    </style>
</head>
<body>
<div class="container">
    <form class="form-signup text-center" method="post">
        <div class="logo">
            <img src="index-images/logo.png">
        </div>
        <h4>Create a new password</h4>
        <div class="form-group">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="New password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Confirm password">
        </div>
        <input type="submit" class="btn btn-block" style="background-color: #c8a2c8; color: white;" id="submit"
               name="submit" value="Submit">
    </form>
</div>
</body>
</html>
