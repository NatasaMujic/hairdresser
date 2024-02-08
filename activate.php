<?php
include("db_config.php");

session_start();
$registeredUserId = $_SESSION['user_id'];

$host = 'localhost';
$db_name = 'hairdresser';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["code"])) {
    $encodedActivationCode = $_GET["code"];

    $activationCode = base64_decode(urldecode($encodedActivationCode));

    $stmt = $pdo->prepare("SELECT * FROM registered_user WHERE activation_code = :activationCode AND is_active = 0");
    $stmt->execute(['activationCode' => $activationCode]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);


        echo "Your account has been successfully activated. You can now log in: <a href='http://localhost:80/hairdresser_project/login-as-user.php?code'>Log in</a>";

} else {
    echo "Invalid request.";
}

