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
            min-height: 70vh;
            overflow-x: hidden;
        }

        .navigation{
            position: fixed;
            width: 220px;
            height: 100%;
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
            text-decoration: none;
            color: #000;
            line-height: 60px;
            min-width: 60px;
        }
        .navigation ul li:hover a{
            color: #000;
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
                height: 80%;
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
                transition: 0.5s;
                overflow: hidden;
                left: 0;
                top: -80%;
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
    <nav class="navbar navbar-expand-lg navbar-light" style="font-family: 'Poiret One', sans-serif; font-weight: bold; background-color: #ffdc73;">
        <img src="index-images/logo.png" alt="logo" style="width: 110px; height: 120px;">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" style="color: black;">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: black;">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php" style="color: black;">SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hairstyle_salons.php" style="color: black;">HAIRSTYLE SALONS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: black;">CONTACT US</a>
                </li>
                <li class="nav-item">
                    <?php

                    $email=$_SESSION['email'];
                    if (isset($email)) {
                        echo '<a href="logout-user.php" class="nav-link" style="width: fit-content; color: black;">LOGOUT</a>';

                    }
                    ?>
                </li>

                <li class="nav-item">
                    <img src="index-images/facebook.png" alt="img" style="width: 45px; height; 45px;">
                </li>
                <li class="nav-item">
                    <img src="index-images/instagram.png" alt="img" style="width: 45px; height; 45px;">
                </li>

            </ul>
        </div>
    </nav>

    <div class="navigation">
        <ul>
            <li>
                <a href="#" data-target="content1">

                </a>
            </li>
            <li>
                <a href="#" class="link" data-target="content2">
                    <span class="title">Your reservations</span>
                </a>
            </li>

            <li>
                <a href="#" class="link" data-target="content3">
                    <span class="title">Intake form</span>
                </a>
            </li>

            <li>
                <a href="#" class="link" data-target="content4">
                    <span class="title">Treatments archive</span>
                </a>
            </li>

            <li>
                <a href="#" class="link" data-target="content5">
                    <span class="title">Settings</span>
                </a>
            </li>

        </ul>
    </div>

</div>
<div id="content1" class="content">

</div>

<div id="content2" class="content">
    <div class="yourEvents">
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
        <h2>Your reservations</h2>
        <?php
        $host = 'localhost';
        $db_name = 'hairdresser';
        $username = 'root';
        $password = '';

        if(isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            try {
                $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT * FROM user_reservations
                              WHERE user_reservations.email = :email";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_reservation'] . "</td>";
                    echo "<td>" . $row['id_user'] . "</td>";
                    echo "<td>" . $row['id_treatment'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";

                    echo "<td><a href='user-cancel-appointment.php?id_treatment=" . $row['id_treatment'] ."&email=" . $row['email'] ."' style='text-decoration: none; background-color: #ff0000; padding: 10px; color: #fff; border-radius: 5px; border: 0;'>Cancel appointment</a></td>";

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

<div id="content3" class="content">
    <div class="yourEvents">
        <form class="form-contact" action="" method="post" enctype="multipart/form-data">
            <h2>Send informational message to your stylist before treatment</h2>

            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name"> <br>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="lname" placeholder="Your Last Name"> <br>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Your Email"> <br>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="stylist_email" placeholder="Stylist Email"> <br>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="message" placeholder="Your message"></textarea> <br>
            </div>

            <input type="submit" class="btn" style="background-color: #c8a2c8; color: white; font-weight: bold;" value="Submit">
        </form>
        <?php
        include("db_config.php");

        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_SESSION['email']) && isset($_POST['name']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['stylist_email']) && isset($_POST['message'])) {
                $name=$_POST['name'];
                $lastName=$_POST['lname'];
                $email=$_POST['email'];
                $stylistEmail=$_POST['stylist_email'];
                $message=$_POST['message'];
                if(empty($name) || empty($lastName) || empty($email) || empty($stylistEmail) || empty($message)) {
                    echo "All fields required!";
                }elseif((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!filter_var($stylistEmail, FILTER_VALIDATE_EMAIL))) {
                echo "Email is not valid!";
            }else {

                    $query = "SELECT id_user FROM registered_user WHERE user_email = :email";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    $id_user = $result['id_user'];

                    $stmt = $pdo->prepare("INSERT INTO intake_forms (id_user, user_fname, user_lname, user_email, stylist_email, message) VALUES (:id_user, :name, :lname, :email, :stylist_email, :message)");
                    $stmt->execute([
                        'id_user' => $id_user,
                        'name' => $name,
                        'lname' => $lastName,
                        'email' => $email,
                        'stylist_email' => $stylistEmail,
                        'message' => $message
                    ]);

                    echo "<script> alert('Intake message successfully sent!'); </script>";
                }
            }else {
                echo "Missing session or parameter.";
            }
        }

        ?>
        <script>
            //add an event listener to the select element
            document.getElementById('event').addEventListener('change', function() {
                // Get the selected value
                var selectedValue = this.value;
                //set the selected value to the hidden input field
                document.getElementById('selectedEvent').value = selectedValue;
            });
        </script>
        </form>

    </div>

</div>
<div id="content4" class="content">
    <div class="yourEvents">
        <h2>Your treatments archive</h2>
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


                if(isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    try {
                        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $query = "SELECT * FROM user_reservations
                              WHERE user_reservations.email = :email";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindParam(':email', $email);
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

<div id="content456" class="content">
    <div class="yourEvents">

    </div>
</div>



<div id="content5" class="content">
    <div class="yourEvents">
        <h2>Update your account data</h2>
        <form class="form-signup text-center" id="registerForm" method="post" action="">

            <input type="text" class="form-control" id="firstname1" name="firstname1" placeholder="First Name">
            <br>
            <input type="text" class="form-control" id="lastname1" name="lastname1" placeholder="Last Name">
            <br>
            <input type="int" class="form-control" id="age" name="age" placeholder="Age">
            <br>
            <input type="email" class="form-control" id="email1" name="email1" placeholder="Email Address">
            <br>
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
            <br>
            <input type="password" class="form-control" id="password21" name="confirm_password1" placeholder="Confirm password">
            <br>
            <button type="submit" style='text-decoration: none; background-color: #c8a2c8; padding: 10px; color: #fff; border-radius: 5px; border: 0;'>Update</button>
        </form>
        <?php
        //php for update registered user's account information
        include("db_config.php");

        $host = 'localhost';
        $db_name = 'hairdresser';
        $username = 'root';
        $password = '';

        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        if (isset($_POST["firstname1"]) && isset($_POST["lastname1"]) && isset($_POST["age"]) && isset($_POST["email1"]) && isset($_POST["password1"]) && isset($_POST["confirm_password1"])) {
            $firstName = $_POST["firstname1"];
            $lastName = $_POST["lastname1"];
            $age = $_POST["age"];
            $email = $_POST["email1"];
            $password = $_POST["password1"];
            $confirmPassword = $_POST["confirm_password1"];

            if (empty($firstName) || empty($lastName) || empty($email)) {
                echo "All fields required!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email is not valid!";
            } elseif ($password !== $confirmPassword) {
                echo "Passwords do not match!";
            } else {
                // update user data
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $stmt = $pdo->prepare("UPDATE registered_user SET user_fname = :firstName1, user_lname = :lastName1, age = :age, user_email = :email1, user_password = :hashedPassword WHERE user_email = :user_email");
                $stmt->execute([
                    'firstName1' => $firstName,
                    'lastName1' => $lastName,
                    'age' => $age,
                    'email1' => $email,
                    'hashedPassword' => $hashedPassword,
                    'user_email' => $_SESSION["email"]
                ]);

                echo "<script> alert('Data are successfully updated!'); </script>";
            }
        }
        ?>
        <br><br>
        <a href='logout-user.php' style='text-decoration: none; background-color: #f8c870; padding: 10px; color: #000; border-radius: 5px;'>Logout</a>
    </div>
</div>

</div>
<div id="content1" class="content">
    <h1>Welcome registered user!</h1>


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

