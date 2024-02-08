<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@200;300;500&family=Dancing+Script:wght@500&family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zeyada&display=swap" rel="stylesheet">
</head>
<body>

<?php
include("db_config.php");
session_start();

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['id_stylist']) && isset($_GET['id_treatment']) && isset($_GET['id_stylist'])) {
        $id_treatment = $_GET['id_treatment'];
        $id_stylist = $_SESSION['id_stylist'];

        $query = "SELECT * FROM new_treatment WHERE id_treatment = :id_treatment";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id_treatment' => $id_treatment]);
        $treatment = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($_POST["treatmentName"]) && isset($_FILES["image"]) && isset($_POST["shortText"]) && isset($_POST["duration"]) && !empty($_POST['category']) && isset($_POST["price"]) && isset($_POST["discount"]) && isset($_POST["availability"])) {

            $treatmentName = $_POST["treatmentName"];
            $category = $_POST["category"];
            $image = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            $shortText = $_POST["shortText"];
            $duration = $_POST["duration"];
            $price = $_POST["price"];
            $discount = $_POST["discount"];
            $availability = $_POST["availability"];

            $updateQuery = $pdo->prepare("UPDATE new_treatment 
                                                SET treatment_name = :treatmentName,
                                                description = :shortText,
                                                treatment_duration = :duration,
                                                id_service = :id_service,
                                                price = :price,
                                                discount = :discount,
                                                availability = :availability,
                                                image = :image
                                                WHERE id_treatment = :id_treatment
                                    ");

            $updateQuery->execute([
                'treatmentName' => $treatmentName,
                'shortText' => $shortText,
                'duration' => $duration,
                'id_service' => $category,
                'price' => $price,
                'discount' => $discount,
                'availability' => $availability,
                'image' => $image,
                'id_treatment' => $id_treatment,
            ]);

            echo "Treatment information updated successfully! <a href='stylist-dashboard.php'>Back to your dashboard</a>";
        } else {
            echo "Missing form data.";
        }
    } else {
        echo "Missing session or parameter.";
    }
}
?>

<div class="container d-flex flex-column justify-content-center" style="min-height: 100vh; position: relative; font-family: 'Poiret One', sans-serif;">
    <h2>Update your treatment</h2>
    <br>
    <form class="forma" method="post" action="update-treatment.php?id_treatment=<?php echo $_GET['id_treatment']; ?>&id_stylist=<?php echo $_GET['id_stylist']; ?>" enctype="multipart/form-data" id="imageForm">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputText">Treatment Name</label>
                <input type="text" class="form-control" id="treatmentName" name="treatmentName" value="<?php echo $treatment['treatment_name'] ?? ''; ?>" placeholder="Treatment Name">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="customFile">Choose image for your treatment</label>
                <input type="file" class="form-control"  id="image" name="image">
            </div>
        </div>
        <div class="form">
            <div class="form-outline">
                <label class="form-label" for="shortText">Short Treatment Description</label>
                <textarea class="form-control" id="shortText" name="shortText" rows="4" placeholder="Less than 500 characters!"><?php echo $treatment['description'] ?? ''; ?></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="duration">Treatment duration</label>
                <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $treatment['treatment_duration'] ?? ''; ?>" placeholder="45 min">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="category">Select treatment category</label>
                <br>
                <select class="form-control" id="category" name="category">
                    <option>Choose</option>
                    <?php

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "hairdresser";

                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT id_service, service_name FROM services";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["id_service"] . '">' . $row["service_name"] . '</option>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $treatment['price'] ?? ''; ?>" >
            </div>
            <div class="form-group col-md-4">
                <label for="discount">Discount</label>
                <input type="number" class="form-control" id="discount" name="discount" value="<?php echo $treatment['discount'] ?? ''; ?>" >
            </div>
            <div class="form-group col-md-2">
                <label for="availability">Availability</label>
                <input type="date" class="form-control"  id="availability" name="availability" value="<?php echo $treatment['availability'] ?? ''; ?>" >
            </div>
        </div>
        <br>
        <button type="submit" class="btn" style="background-color: #ffdc73;">Update</button>
    </form>
</div>
</body>
</html>
