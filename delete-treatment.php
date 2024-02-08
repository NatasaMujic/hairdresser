<?php

include("db_config.php");
session_start();

if (isset($_SESSION['id_stylist']) && isset($_GET['id_treatment'])) {
    $id_treatment = $_GET['id_treatment'];
    $id_stylist = $_SESSION['id_stylist'];

    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $deleteQuery = "DELETE FROM new_treatment WHERE id_treatment = :id_treatment AND id_stylist = :id_stylist";
    $stmt = $pdo->prepare($deleteQuery);
    $stmt->execute(['id_treatment' => $id_treatment, 'id_stylist' => $id_stylist]);

    header('Location: stylist-dashboard.php');
    exit();
} else {
    echo "Missing parameter.";
}
?>