<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hairdressers</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@200;300;500&family=Dancing+Script:wght@500&family=Poiret+One&display=swap"
            rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zeyada&display=swap" rel="stylesheet">

</head>

<body>
<?php
include("db_config.php");

if(isset($_GET['id_treatment']) && isset($_SESSION['email'])){
    $id_treatment = $_GET['id_treatment'];
    $email = $_SESSION['email'];


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query_treatment = "SELECT * FROM new_treatment
                            JOIN registered_stylist ON new_treatment.id_stylist = registered_stylist.id_stylist
                            WHERE registered_stylist.email = :email
                            AND new_treatment.id_treatment = :id_treatment";
        $stmt_treatment = $pdo->prepare($query_treatment);
        $stmt_treatment->bindParam(':email', $email);
        $stmt_treatment->bindParam(':id_treatment', $id_treatment);
        $stmt_treatment->execute();

        ?>

        <div class="container">
            <div class="d-flex flex-column justify-content-center position-absolute align-items-center" id="booking">
                <form action="process_booking.php" method="post">
                    <?php
                    while ($row = $stmt_treatment->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <h3 style="color: #C8A2C8FF; font-weight: bold;">Book treatment</h3>
                        <br><br>
                        <div class="d-flex flex-column" style="background-color: #f0f0f0; padding: 10px;">
                            <p>Stylist: <?php echo $row['stylist_fname'].' '.$row['stylist_lname']; ?></p>
                            <p>Email: <?php echo $row['email']; ?></p>
                            <p>Salon: <?php echo $row['salon_name']; ?></p>
                            <p>Phone: <?php echo $row['phone_number']; ?></p>
                            <p>Website: <?php echo $row['website']; ?></p>
                        </div>
                        <br>
                        <h4 style="margin-left: 50%;">Total: $<?php echo $row['price']; ?></h4>
                        <div class="d-flex flex-row" style="background-color: #f0f0f0; padding: 10px; margin-left: 70%;">
                            <p>Duration: <?php echo $row['treatment_duration']; ?></p>
                        </div>

                        <div>
                            <input type="radio" name="selected_term" id="selected_term" value="<?php echo $row['term_date']; ?> <?php echo $row['term_time']; ?>">

                            <label for="selected_term"><?php echo $row['term_date']; ?> <?php echo $row['term_time']; ?></label>

                        </div>
                        <?php
                    }
                    ?>

                    <input type="hidden" name="id_treatment" value="<?php echo $id_treatment; ?>">

                    <input type="submit" value="Book" style="margin-top: 5%; border-radius: 5px; background-color: #f8c870; padding: 10px; font-weight: bold; border: 0;">
                </form>
            </div>
        </div>
        <?php
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "<script> alert('You are not logged in as user!'); </script>";
}
?>

</body>
</html>
