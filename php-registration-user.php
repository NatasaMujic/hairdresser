<?php
//registering new user

session_start();
$host = 'localhost';
$db_name = 'hairdresser';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["password2"];

        if (empty($firstName) || empty($lastName) || empty($age) || empty($email) || empty($password) || empty($confirmPassword)) {
            echo "All fields required!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email is not valid!";
        } elseif ($password !== $confirmPassword) {
            echo "Passwords do not match!";
        } else {
            // Check if user already exists in the database
            $stmt = $pdo->prepare("SELECT * FROM registered_user WHERE user_email = :email");
            $stmt->execute(['email' => $email]);
            $existingUser = $stmt->fetch();

            if ($existingUser) {
                echo "User with this email already exists!";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $activationCode = md5(uniqid(rand(), true));

                $stmt = $pdo->prepare("INSERT INTO registered_user (user_fname, user_lname, age, user_email, user_password, activation_code) VALUES (:firstName, :lastName, :age, :email, :hashedPassword, :activationCode)");
                $stmt->execute([
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'age' => $age,
                    'email' => $email,
                    'hashedPassword' => $hashedPassword,
                    'activationCode' => $activationCode
                ]);

                $registeredUserId = $pdo->lastInsertId();
                $_SESSION['firstname'] = $firstName;
                $_SESSION['user_id'] = $registeredUserId;

                $_SESSION['email'] = $email;
                include("send-activation-email.php");

                $encodedActivationCode = urlencode($activationCode);
                $_SESSION['encoded_activation_code'] = $encodedActivationCode;


            }
        }
    } else {
        echo "Some data is not correct!";
    }
}