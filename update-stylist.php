<?php
session_start();
//php for update registered stylist's account information
include("db_config.php");

$host = 'localhost';
$db_name = 'hairdresser';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_SESSION['id_stylist'])) {
    $id_stylist = $_SESSION['id_stylist'];
    if (isset($_POST["firstname1"]) && isset($_POST["lastname1"]) && isset($_POST["email"]) && isset($_POST["salon"]) && isset($_POST["busname"]) && isset($_POST["phoneNum"]) && isset($_POST["state"]) && isset($_POST["city"]) && isset($_POST["website"]) && isset($_POST['password1']) && isset($_POST['password2'])) {
        $firstName = $_POST["firstname1"];
        $lastName = $_POST["lastname1"];
        $email = $_POST["email"];
        $salon = $_POST["salon"];
        $busName = $_POST["busname"];
        $phoneNum = $_POST["phoneNum"];
        $state = $_POST["state"];
        $city= $_POST["city"];
        $website= $_POST["website"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];

        if (empty($firstName) || empty($lastName) || empty($email)) {
            echo "All fields required!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email is not valid!";
        } elseif ($password1 !== $password2) {
            echo "Passwords do not match!";
        } else {

            $hashedPassword = password_hash($password1, PASSWORD_BCRYPT);

            $stmt = $pdo->prepare("UPDATE registered_stylist SET stylist_fname = :firstName1, stylist_lname = :lastName1, email = :email, password = :hashedPassword, salon_name = :salon, business_name = :busname, phone_number = :phoneNum, state = :state, city = :city, website = :website WHERE id_stylist = :id_stylist");
            $stmt->execute([
                'firstName1' => $firstName,
                'lastName1' => $lastName,
                'email' => $email,
                'hashedPassword' => $hashedPassword,
                'salon' => $salon,
                'busname' => $busName,
                'phoneNum' => $phoneNum,
                'state' => $state,
                'city' => $city,
                'website' => $website,
                'id_stylist' => $_SESSION["id_stylist"]
            ]);

            echo "Data successfully updated! <a href='stylist-dashboard.php'>Back to your dashboard</a>";
        }
    }
}

?>
