<?php

include("db_config.php");
session_start();

if (isset($_POST['id_treatment']) && isset($_POST['email'])) {
    $id_treatment = $_POST['id_treatment'];
    $email = $_POST['email'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query_insert_cancel = "INSERT INTO cancel_appointment (id_reservation, id_user, id_treatment, email, date, time) 
                                SELECT id_reservation, id_user, id_treatment, email, date, time 
                                FROM user_reservations 
                                WHERE id_treatment = :id_treatment AND email = :email";
        $stmt_insert_cancel = $pdo->prepare($query_insert_cancel);
        $stmt_insert_cancel->bindParam(':id_treatment', $id_treatment);
        $stmt_insert_cancel->bindParam(':email', $email);
        $stmt_insert_cancel->execute();

        $query_delete = "DELETE FROM user_reservations WHERE id_treatment = :id_treatment AND email = :email LIMIT 1";
        $stmt_delete = $pdo->prepare($query_delete);
        $stmt_delete->bindParam(':id_treatment', $id_treatment);
        $stmt_delete->bindParam(':email', $email);
        $stmt_delete->execute();

        echo "Appointment successfully cancelled! <a href='user-dashboard.php'>Back to your user dashboard</a>";

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "<script> alert('Invalid request!'); </script>";
}

