<?php
include("db_config.php");
session_start();

if (isset($_POST['id_treatment']) && isset($_POST['selected_term']) && isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $id_treatment = $_POST['id_treatment'];
    $selected_term = $_POST['selected_term'];


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query_user_id = "SELECT id_user FROM registered_user WHERE user_email = :email";
        $stmt_user_id = $pdo->prepare($query_user_id);
        $stmt_user_id->bindParam(':email', $email);
        $stmt_user_id->execute();
        $row_user_id = $stmt_user_id->fetch(PDO::FETCH_ASSOC);
        $id_user = $row_user_id['id_user'];

        $query_insert = "INSERT INTO user_reservations (id_user, id_treatment, email, date, time) VALUES (:id_user, :id_treatment, :email, :date, :time)";
        $stmt_insert = $pdo->prepare($query_insert);
        $stmt_insert->bindParam(':id_user', $id_user);
        $stmt_insert->bindParam(':id_treatment', $id_treatment);
        $stmt_insert->bindParam(':email', $email);
        $stmt_insert->bindParam(':date', $selected_term);
        $stmt_insert->bindParam(':time', $selected_term);

        $stmt_insert->execute();

        echo "Appointment successfully booked! <a href='services.php'>Back to services page</a>";

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "<script> alert('You are not logged in as user!'); </script>";
}
?>
