<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@200;300;500&family=Dancing+Script:wght@500&family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zeyada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js'></script>
    <title>Register dashboard</title>
    <style>
        *{
            font-family: 'Poiret One', sans-serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            box-sizing: border-box;


        }
        body{
            min-height: 100vh;
            overflow-x: hidden;
        }

        .navigation{
            position: fixed;
            width: 220px;
            height: 100%;
            background: #c8a2c8;
            transition: 0.5s;
            overflow: hidden;
        }
        .navigation ul{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .navigation ul li:nth-child(1){
            margin-bottom: 40px;
            pointer-events: none;
        }

        .navigation ul li a,
        .navigation ul li.hovered a{
            position: relative;
            display: block;
            width: 100%;
            display: flex;
            text-decoration: none;
            color: #fff;
            line-height: 60px;
            min-width: 60px;
        }
        .navigation ul li:hover a{
            color: white;
        }


        .navigation ul li a .title{
            position: relative;
            display: block;
            padding: 0 10px;
            height: 60px;
            line-height: 60px;
            text-align: start;
            white-space: nowrap;
        }

        .content {
            display: none;
        }

        .yourEvents{
            position: relative;
            width: 70%;
            float:right;
            margin-top: 40px;
            margin-right: 40px;
        }


        .container-fluid {
            padding-right: 0;
            padding-left: 0;
        }


        <!-- RESPONSIVE DESIGN FOR NAVIGATION BAR-->
        @media (max-width: 991px) {
            .yourEvents table {
                width: 100%;
            }
            .yourEvents th,
            .yourEvents td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }

            .navigation {
                position: fixed;
                width: 100%;
                height: auto;
                background: #c8a2c8;
                transition: 0.5s;
                overflow: hidden;
                left: 0;
                top: 0;
            }
            .navigation.active {
                height: 100%;
            }
            .navigation ul li {
                display: none;
            }
            .navigation.active ul li {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .yourEvents table {
                width: 100%;
            }
            .yourEvents th,
            .yourEvents td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }

            .navigation {
                position: fixed;
                width: 100%;
                height: 100%;
                background: darkblue;
                transition: 0.5s;
                overflow: hidden;
                left: 0;
                top: -100%;
            }
            .navigation.active {
                top: 0;
            }
            .navigation.active ul li {
                display: block;
            }
        }

        @media (max-width: 480px) {
            .yourEvents table {
                width: 100%;
            }
            .yourEvents th,
            .yourEvents td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }

            .navigation {
                position: fixed;
                width: 100%;
                height: 100%;
                background: darkblue;
                transition: 0.5s;
                overflow: hidden;
                left: 0;
                top: -100%;
            }
            .navigation.active {
                top: 0;
            }
            .navigation.active ul li {
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="navigation">
        <ul>
            <li>
                <a href="#" class="link" data-target="content1">
                    <span class="title">STYLIST DASHBOARD</span>
                </a>
            </li>

            <li>
                <a href="#" class="link" data-target="content2">
                    <span class="title">Make treatments</span>
                </a>
            </li>

            <li>
                <a href="#" class="link" data-target="content3">
                    <span class="title">Update & Delete treatments</span>
                </a>
            </li>

            <li>
                <a href="#" class="link" data-target="content4">
                    <span class="title">Update Daily Terms</span>
                </a>
            </li>
            <li>
                <a href="#" class="link" data-target="content456">
                    <span class="title">Appointments</span>
                </a>
            </li>
            <li>
                <a href="#" class="link" data-target="content4567">
                    <span class="title">Cancelled Appointments</span>
                </a>
            </li>
            <li>
                <a href="#" class="link" data-target="content5">
                    <span class="title">Treatments archive</span>
                </a>
            </li>
            <li>
                <a href="#" class="link" data-target="content6">
                    <span class="title">Intake form messages</span>
                </a>
            </li>
            <li>
                <a href="#" class="link" data-target="content7">
                    <span class="title">Settings</span>
                </a>
            </li>
        </ul>
    </div>

</div>
<div id="content1" class="content">
    <div class="yourEvents">

    </div>
</div>

<div id="content2" class="content">
    <div class="yourEvents">
        <?php
        if(isset($_SESSION['email'])){
            echo "<h3 style='color: #c8a2c8;'><b>Welcome {$_SESSION['email']} to your dashboard!<b></h3>";
        }
        ?>
        <h2>Create your treatment</h2>
        <br>
        <form class="forma" method="post" action="stylist-dashboard.php"  enctype="multipart/form-data" id="imageForm">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputText">Treatment Name</label>
                    <input type="text" class="form-control" id="treatmentName" name="treatmentName" placeholder="Treatment Name">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label" for="customFile">Choose image for your treatment</label>
                    <input type="file" class="form-control"  id="image" name="image" />
                </div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $target_dir = "blob-images/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);

                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                ?>
            </div>
            <div class="form">
                <div class="form-outline">
                    <label class="form-label" for="shortText">Short Treatment Description</label>
                    <textarea class="form-control" id="shortText" name="shortText" rows="4" placeholder="Less than 500 characters!"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="duration">Treatment duration</label>
                    <input type="text" class="form-control" id="duration" name="duration" placeholder="45 min">
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
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                <div class="form-group col-md-4">
                    <label for="discount">Discount</label>
                    <input type="number" class="form-control" id=discount" name="discount">

                </div>
                <div class="form-group col-md-2">
                    <label for="availability">Availability</label>
                    <input type="date" class="form-control"  id="availability" name="availability">
                </div>
                <div class="form-group col-md-2">
                <div id="datetime-container">
                    <div>
                        <label for="date">Add dates</label>
                        <label>
                            <input type="date" name="dates[]" class="form-control">
                            <input type="time" name="times[]" class="form-control">
                    </div>
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

            </div>

            <button type="submit" class="btn" style="background-color: #ffdc73;">Create</button>
        </form>
        <script>
            document.getElementById('imageForm').addEventListener('submit', function(e) {
                e.preventDefault();

                var fileInput = document.getElementById('image');

                if (fileInput.files.length === 0) {
                    alert('Please select an image.');
                    return;
                }

                this.submit();
            });
        </script>
        <br><br>
    </div>
</div>

<div id="content3" class="content">
    <div class="yourEvents">

            <h2>Update & Delete Treatments</h2>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Service Name</th>
                    <th>Image</th>
                    <th>Treatment Name</th>
                    <th>Description</th>
                    <th>Treatment Duration</th>
                    <th>Price</th>
                    <th>Date of Publication</th>
                    <th>Availability</th>
                    <th>Term date</th>
                    <th>Term time</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $host = 'localhost';
                $db_name = 'hairdresser';
                $username = 'root';
                $password = '';

if(isset($_SESSION['id_stylist'])) {
    $id_stylist = $_SESSION['id_stylist'];
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM new_treatment 
                              JOIN services ON new_treatment.id_service = services.id_service
                              WHERE new_treatment.id_stylist = :id_stylist";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_stylist', $id_stylist);
        $stmt->execute();


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id_service'] . "</td>";
            echo "<td>" . $row['service_name'] . "</td>";
            echo "<td><img src='blob-images/" . $row['image'] . "' width='100' height='100'/></td>";
            echo "<td>" . $row['treatment_name'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['treatment_duration'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['date_of_publication'] . "</td>";
            echo "<td>" . $row['availability'] . "</td>";
            echo "<td>" . $row['term_date'] . "</td>";
            echo "<td>" . $row['term_time'] . "</td>";

            echo "<td><a href='update-treatment.php?id_treatment=" . $row['id_treatment'] . "&id_stylist=" . $row['id_stylist'] . "' style='text-decoration: none; background-color: #ffdc73; padding: 10px; color: #fff; border-radius: 5px; border: 0;'>Update</a></td>";
            echo "<td><a href='delete-treatment.php?id_treatment=" . $row['id_treatment'] . "&id_stylist=" . $row['id_stylist'] . "' style='text-decoration: none; background-color: #ff0000; padding: 10px; color: #fff; border-radius: 5px; border: 0;'>Delete</a></td>";

            echo "</tr>";

        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
                ?>
                </tbody>
            </table>
        </div>

        <script>
            document.getElementById('event').addEventListener('change', function() {

                var selectedValue = this.value;

                document.getElementById('selectedEvent').value = selectedValue;
            });
        </script>
    </div>

</div>
<div id="content4" class="content">
    <div class="yourEvents">
        <h2>Update daily terms</h2>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID treatment</th>
                <th>Treatment Name</th>
                <th>Price</th>
                <th>Term date</th>
                <th>Term time</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $host = 'localhost';
            $db_name = 'hairdresser';
            $username = 'root';
            $password = '';

            if(isset($_SESSION['id_stylist'])) {
                $id_stylist = $_SESSION['id_stylist'];
                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $query = "SELECT * FROM new_treatment 
                              WHERE new_treatment.id_stylist = :id_stylist";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':id_stylist', $id_stylist);
                    $stmt->execute();


                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        echo "<tr>";
                        echo "<td>" . $row['id_service'] . "</td>";
                        echo "<td>" . $row['treatment_name'] . "</td>";;
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['term_date'] . "</td>";
                        echo "<td>" . $row['term_time'] . "</td>";

                        echo "<td><a href='update-daily-terms.php?id_treatment=" . $row['id_treatment'] . "&id_stylist=" . $row['id_stylist'] . "' style='text-decoration: none; background-color: #ffdc73; padding: 10px; color: #fff; border-radius: 5px; border: 0;'>Update</a></td>";

                        echo "</tr>";

                    }

                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

<div id="content456" class="content">
    <div class="yourEvents">
        <h2>User appointments</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID reservation</th>
                    <th>ID user</th>
                    <th>ID treatment</th>
                    <th>Term date</th>
                    <th>Term time</th>

                </tr>
                </thead>
                <tbody>
                <?php


                if(isset($_SESSION['id_stylist'])) {
                    $id_stylist = $_SESSION['id_stylist'];
                    try {
                        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $query = "SELECT * FROM user_reservations
                              JOIN new_treatment ON user_reservations.id_treatment = new_treatment.id_treatment
                              JOIN registered_stylist ON new_treatment.id_stylist = registered_stylist.id_stylist
                              WHERE registered_stylist.id_stylist = :id_stylist";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindParam(':id_stylist', $id_stylist);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_reservation'] . "</td>";
                            echo "<td>" . $row['id_user'] . "</td>";
                            echo "<td>" . $row['id_treatment'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";


                            echo "</tr>";

                        }

                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="content4567" class="content">
    <div class="yourEvents">
        <h2>Cancelled user appointments</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID reservation</th>
                    <th>ID user</th>
                    <th>ID treatment</th>
                    <th>Term date</th>
                    <th>Term time</th>

                </tr>
                </thead>
                <tbody>
                <?php


                if(isset($_SESSION['id_stylist'])) {
                    $id_stylist = $_SESSION['id_stylist'];
                    try {
                        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $query = "SELECT ca.*
                                  FROM cancel_appointment ca
                                  JOIN user_reservations ur ON ca.id_reservation = ur.id_reservation
                                  JOIN new_treatment nt ON ur.id_treatment = nt.id_treatment
                                  JOIN registered_stylist rs ON nt.id_stylist = rs.id_stylist
                                  WHERE rs.id_stylist = :id_stylist";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindParam(':id_stylist', $id_stylist);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_reservation'] . "</td>";
                            echo "<td>" . $row['id_user'] . "</td>";
                            echo "<td>" . $row['id_treatment'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";


                            echo "</tr>";

                        }

                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="content5" class="content">
    <div class="yourEvents">

        <h2>Treatments archive</h2>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Service Name</th>
                    <th>Image</th>
                    <th>Treatment Name</th>
                    <th>Description</th>
                    <th>Treatment Duration</th>
                    <th>Price</th>
                    <th>Date of Publication</th>
                    <th>Availability</th>
                    <th>Term date</th>
                    <th>Term time</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $host = 'localhost';
                $db_name = 'hairdresser';
                $username = 'root';
                $password = '';

                if(isset($_SESSION['id_stylist'])) {
                    $id_stylist = $_SESSION['id_stylist'];
                    try {
                        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $query = "SELECT * FROM new_treatment 
                              JOIN services ON new_treatment.id_service = services.id_service
                              WHERE new_treatment.id_stylist = :id_stylist";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindParam(':id_stylist', $id_stylist);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_service'] . "</td>";
                            echo "<td>" . $row['service_name'] . "</td>";
                            echo "<td><img src='blob-images/" . $row['image'] . "' width='100' height='100'/></td>";
                            echo "<td>" . $row['treatment_name'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['treatment_duration'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['date_of_publication'] . "</td>";
                            echo "<td>" . $row['availability'] . "</td>";
                            echo "<td>" . $row['term_date'] . "</td>";
                            echo "<td>" . $row['term_time'] . "</td>";



                            echo "</tr>";

                        }

                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

        <script>
            document.getElementById('event').addEventListener('change', function() {

                var selectedValue = this.value;

                document.getElementById('selectedEvent').value = selectedValue;
            });
        </script>
    </div>
</div>

<div id="content6" class="content">
    <div class="yourEvents">
        <h2>Intake form messages</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID form</th>
                    <th>ID user</th>
                    <th>User first name</th>
                    <th>User last name</th>
                    <th>User email</th>
                    <th>Stylist email</th>
                    <th>Message</th>
                    <th>Fill date</th>

                </tr>
                </thead>
                <tbody>
                <?php


                if(isset($_SESSION['id_stylist'])) {
                    $id_stylist = $_SESSION['id_stylist'];
                    try {
                        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $query = "SELECT i.*
                                  FROM intake_forms i
                                  JOIN registered_stylist rs ON i.user_email = rs.email
                                  WHERE rs.id_stylist = :id_stylist";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindParam(':id_stylist', $id_stylist);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_form'] . "</td>";
                            echo "<td>" . $row['id_user'] . "</td>";
                            echo "<td>" . $row['user_fname'] . "</td>";
                            echo "<td>" . $row['user_lname'] . "</td>";
                            echo "<td>" . $row['user_email'] . "</td>";
                            echo "<td>" . $row['stylist_email'] . "</td>";
                            echo "<td>" . $row['message'] . "</td>";
                            echo "<td>" . $row['fill_date'] . "</td>";


                            echo "</tr>";

                        }

                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<div id="content7" class="content">
    <div class="yourEvents">
        <h2>Update your account data</h2>
        <form class="form-signup text-center" id="registerForm" method="post" action="update-stylist.php">

            <input type="text" class="form-control" id="firstname1" name="firstname1" placeholder="First Name">
            <br>
            <input type="text" class="form-control" id="lastname1" name="lastname1" placeholder="Last Name">
            <br>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
            <br>
            <input type="text" class="form-control" id="salon" name="salon" placeholder="Salon name">
            <br>
            <input type="text" class="form-control" id="busname" name="busname" placeholder="Business name">
            <br>
            <input type="text" class="form-control" id="phoneNum" name="phoneNum" placeholder="Phone number">
            <br>
            <input type="text" class="form-control" id="state" name="state" placeholder="State">
            <br>
            <input type="password" class="form-control" id="city" name="city" placeholder="City">
            <br>
            <input type="password" class="form-control" id="website" name="website" placeholder="Website">
            <br>
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
            <br>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm password">
            <br>
            <button type="submit" style='text-decoration: none; background-color: #389aab; padding: 10px; color: #fff; border-radius: 5px; border: 0;'>Update</button>
        </form>

        <br><br>
        <a href='logout-user.php' style='text-decoration: none; background-color: #f8c870; padding: 10px; color: #000; border-radius: 5px;'>Logout</a>
    </div>


</div>

<!--JavaScript for dashboard links-->
<script>

    var links = document.getElementsByClassName('link');
    for (var i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function(event) {
            event.preventDefault();

            var target = this.getAttribute('data-target');
            var contents = document.getElementsByClassName('content');


            for (var j = 0; j < contents.length; j++) {
                contents[j].style.display = 'none';
            }

            document.getElementById(target).style.display = 'block';
        });
    }


</script>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (isset($_POST["treatmentName"]) && isset($_FILES["image"]) && isset($_POST["shortText"]) && isset($_POST["duration"]) && !empty($_POST['category']) && isset($_POST["price"]) && isset($_POST["discount"]) && isset($_POST["availability"]) && isset($_POST['dates']) && isset($_POST['times'])) {

    $treatmentName = $_POST["treatmentName"];
    $image = $_FILES["image"]["name"];
    $image_tmp = $_FILES["image"]["tmp_name"];
    $shortText = $_POST["shortText"];
    $duration = $_POST["duration"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];
    $availability = $_POST["availability"];
    $dates = $_POST["dates"];
    $times = $_POST["times"];

if (empty($treatmentName) || empty($image) || empty($shortText) || empty($duration) || empty($category) || empty($price) || empty($availability) || empty($dates) || empty($times)) {
echo "All fields required!";
} else {

    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    move_uploaded_file($image_tmp, "C:/wamp64/www/hairdresser_project/blob-images/" . $image);
} else {
    echo "Image upload failed.";
}

if (!isset($_SESSION['id_stylist'])) {
    echo "User ID not found in session.";
} else {
    $id_stylist = $_SESSION['id_stylist'];


    foreach ($dates as $key => $date) {
        $time = $times[$key];
        $stmt = $pdo->prepare("INSERT INTO new_treatment (id_stylist, id_service, treatment_name, description, treatment_duration, price, discount, availability, image, term_date, term_time) VALUES (:id_stylist, :category, :treatmentName, :shortText, :duration, :price, :discount, :availability, :image, :date, :time)");
        $stmt->execute([
            'id_stylist' => $id_stylist,
            'category' => $category,
            'treatmentName' => $treatmentName,
            'shortText' => $shortText,
            'duration' => $duration,
            'price' => $price,
            'discount' => $discount,
            'availability' => $availability,
            'image' => $image,
            'date' => $date,
            'time' => $time
        ]);
        $lastInsertedId = $pdo->lastInsertId();
        $_SESSION['id_treatment'] = $lastInsertedId;

    }
echo "<script> alert('Treatment successfully created!') </script>";
}
}
} else {
echo "<script> alert('Some data is not correct!') </script>";
}
} else {
echo "<script> alert('Invalid request method!') </script>";
}



