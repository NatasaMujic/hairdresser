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
    if (isset($_SESSION['id_stylist']) && isset($_GET['id_treatment'])) {
        $id_treatment = $_GET['id_treatment'];
        $id_stylist = $_SESSION['id_stylist'];

        $query = "SELECT * FROM new_treatment 
          WHERE new_treatment.id_stylist = :id_stylist";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id_stylist' => $id_stylist]);
        $treatment = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($_POST["dates"]) && isset($_POST["times"])) {

            $dates = $_POST["dates"];
            $times = $_POST["times"];

                foreach ($dates as $key => $date) {
                    $time = $times[$key];
                    $updateQuery = $pdo->prepare("UPDATE new_treatment 
                                                SET term_date = :date,
                                                term_time = :time                                         
                                                WHERE id_treatment = :id_treatment
                                    ");

                    $updateQuery->bindParam(':id_treatment', $id_treatment);
                    $updateQuery->bindParam(':date', $date);
                    $updateQuery->bindParam(':time', $time);

                    $updateQuery->execute();
                }
            echo "Term information updated successfully! <a href='stylist-dashboard.php'>Back to your dashboard</a>";
        } else {
            echo "Missing form data.";
        }
    } else {
        echo "Missing session or parameter.";
    }
}
?>

<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh; position: relative; font-family: 'Poiret One', sans-serif;">
    <h2>Update your treatment</h2>
    <br>
    <form class="forma" method="post" action="" enctype="multipart/form-data" id="imageForm">

        <div class="form-group col-md-2">
            <div id="datetime-container">
                <div>
                    <label for="date">Add dates</label>
                    <label>
                        <input type="date" name="dates[]" class="form-control">
                        <input type="time" name="times[]" class="form-control">
                </div>
                <br>
            </div>

        </div>

        <script>
            function addDateTimeField() {
                var container = document.getElementById("datetime-container");
                var dateTimeField = document.createElement("div");
                dateTimeField.innerHTML = '<input type="date" name="dates[]" class="form-control"><input type="time" name="times[]" class="form-control">';
                dateTimeField.style.color = '#ffdc73';
                dateTimeField.style.backgroundColor = '#f0f0f0';
                dateTimeField.style.border='0px';
                dateTimeField.style.height = 'fit-content';
                container.appendChild(dateTimeField);
            }

            function removeDateTimeField() {
                var container = document.getElementById("datetime-container");
                if (container.children.length > 1) {
                    container.removeChild(container.lastChild);
                }
            }
        </script>
        <button type="button" onclick="addDateTimeField()">Add Date and Time</button>
        <button type="button" onclick="removeDateTimeField()">Remove Date and Time</button>
        <br><br>
        <button type="submit" class="btn" style="background-color: #ffdc73;">Update</button>
    </form>
</div>
</body>
</html>
<?php
