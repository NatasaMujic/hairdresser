<?php

session_start();

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

        $stmt = $pdo->prepare("SELECT * FROM admin WHERE email=:email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();


        if ($user && password_verify($password, $user['password'])) {

                $_SESSION['id_admin'] = $user['id_admin'];

                $_SESSION['email'] = $email;

                $_SESSION['f_name'] = $user['f_name'];

                header("Location: admin-dashboard.php");
                exit();
            } else {
            echo "<script>alert('Email or password is not correct!');</script>";
            header("login-as-admin.php");
            exit();
        }


    } else {
        $errorMessage = "Email and password are required!";
        echo "<script>alert('$errorMessage');</script>";
    }
}