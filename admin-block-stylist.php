<?php

include("db_config.php");

session_start();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['block_user'])) {
            $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            foreach ($_POST['block_user'] as $user_id => $block_user) {
                $updateQuery = "UPDATE registered_stylist SET block_user = :block_user WHERE id_stylist=:id_stylist";
                $stmt = $pdo->prepare($updateQuery);
                $stmt->execute([
                    'block_user' => $block_user,
                    'id_stylist' => $user_id
                ]);
            }

            echo "Register status updated successfully!" . "<a href='admin-dashboard.php'>Back to your admin dashboard!</a>";
        }
    }
