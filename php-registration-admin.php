<?php

include("db_config.php");

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
            $firstName = $_POST["first_name"];
            $lastName = $_POST["last_name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
                echo "All fields required!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email is not valid!";
            } else {
                $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :email");
                $stmt->execute(['email' => $email]);
                $existingUser = $stmt->fetch();

                if ($existingUser) {
                    echo "User with this email already exists!";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                    $activationCode = md5(uniqid(rand(), true));

                    $stmt = $pdo->prepare("INSERT INTO admin (first_name, last_name, email, password) VALUES (:firstName, :lastName, :email, :hashedPassword)");
                    $stmt->execute([
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                        'email' => $email,
                        'hashedPassword' => $hashedPassword
                    ]);


                    $adminId = $pdo->lastInsertId();
                    $_SESSION['f_name'] = $firstName;
                    $_SESSION['id'] = $adminId;
                    $_SESSION['email'] = $email;
                    include("admin-dashboard.php");
                }
            }
        } else {
            echo "Some data is not correct!";
        }
    }




