<?php

include("db_config.php");

session_start();



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['blocked'])) {
            $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            foreach ($_POST['blocked'] as $id_treatment => $blocked) {
                $updateQuery = "UPDATE new_treatment SET blocked = :blocked WHERE id_treatment = :id_treatment";
                $stmt = $pdo->prepare($updateQuery);
                $stmt->execute([
                    'blocked' => $blocked,
                    'id_treatment' => $id_treatment
                ]);
            }

            echo "Treatment status updated successfully!" . "<a href='admin-dashboard.php'>Back to your admin dashboard!</a>";
        }
    }









