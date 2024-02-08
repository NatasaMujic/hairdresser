<?php

session_start();

include("db_config.php");

$host = 'localhost';
$db_name = 'hairdresser';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $pdo->prepare("SELECT * FROM registered_user WHERE user_email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();


        if ($user && password_verify($password, $user['user_password'])) {

            if ($user['block_user'] == 0) {

                $_SESSION['id_user'] = $user['id_user'];

                $_SESSION['email'] = $email;

                $_SESSION['firstName'] = $user['first_name'];

                header("Location: services.php");
                exit();
            } else {
                echo "<script>alert('Access denied for this account. For more information, contact the admin.');</script>";
                header("login-as-user.php");
                exit();
            }
        } else {
            $errorMessage = "Email or password are incorrect!";
            echo "<script>alert('$errorMessage');</script>";


        }
    } else {
        $errorMessage = "Email and password are required!";
        echo "<script>alert('$errorMessage');</script>";
    }
}

