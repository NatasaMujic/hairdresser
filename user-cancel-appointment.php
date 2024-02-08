<?php
include("db_config.php");
session_start();

if(isset($_GET['id_treatment']) && isset($_SESSION['email'])){
    $id_treatment = $_GET['id_treatment'];
    $email = $_SESSION['email'];

    try {
        echo "<form action='process_cancel_appointment.php' method='post'>";
        echo "<input type='hidden' name='id_treatment' value='$id_treatment'>";
        echo "<input type='hidden' name='email' value='$email'>";

        echo "<input type='submit' value='Cancel Appointment' style='background-color: #ffdc73; color: #ffffff; padding: 10px; border: 0; border-radius: 5px;'>";
        echo "</form>";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "<script> alert('You are not logged in as user!'); </script>";
}