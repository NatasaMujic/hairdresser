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
                background: #f8c870;
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
                    background: #f8c870;
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
                    background: #f8c870;
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
                        <span class="title">ADMIN DASHBOARD</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="link" data-target="content2">
                        <span class="title">Create stylist account</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="link" data-target="content3">
                        <span class="title">Registered stylists & salons</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="link" data-target="content4">
                        <span class="title">Treatments</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="link" data-target="content5">
                         <a href='logout-user.php' style='text-decoration: none; background-color: #f8c870; padding: 10px; color: #000; border-radius: 5px;'>Logout</a>
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
                echo "<h3 style='color: #c8a2c8;'><b>Welcome {$_SESSION['email']} to your admin dashboard!<b></h3>";
            }
            ?>
            <h2>Create stylist account</h2>
            <br>
            <form class="form-signup text-center" id="registerForm" method="post" action="php-registration-stylist.php">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <span id="nameError"></span>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                        </div>
                        <br>
                        <div class="col-md-6">
                            <span id="lastNameError"></span>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                        </div>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <span id="busnameError"></span>
                            <input type="text" class="form-control" id="busname" name="busname" placeholder="Business Name">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <span id="salonnameError"></span>
                            <input type="text" class="form-control" id="salonname" name="salonname" placeholder="Salon Name (Optional)">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-md-12">
                        <span id="phonenumberError"></span>
                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <span id="stateError"></span>
                            <input type="text" class="form-control" id="state" name="state" placeholder="State">
                        </div>
                        <br>
                        <div class="col-md-6">
                            <span id="cityError"></span>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                        </div>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <span id="emailError"></span>
                    <input type="text" class="form-control" id="service-type" name="service-type" placeholder="Service type">
                </div>

                <br>
                <div class="form-group">
                    <span id="emailError"></span>
                    <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                </div>
                <br>
                <div class="form-group">
                    <span id="emailError"></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                </div>
                <br>
                <div class="form-group">
                    <span id="passwordError"></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <br>
                <div class="form-group">
                    <span id="password2Error"></span>
                    <input type="password" class="form-control" id="password2" name="confirm_password" placeholder="Confirm password">
                </div>
                <br>
                <input type="submit" class="btn" name="btn" value="Submit" style="background-color: #c8a2c8; color: white;  padding: 10px; text-decoration: none; border-radius: 5px;">
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

            <h2>Registered stylists & salons</h2>
        <form method="POST" action="admin-block-stylist.php">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID stylist</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Salon name</th>
                        <th>Business name</th>
                        <th>Phone number</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Website</th>
                        <th>Service type</th>
                        <th>Registration date</th>
                        <th>Block/Unblock</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $host = 'localhost';
                    $db_name = 'hairdresser';
                    $username = 'root';
                    $password = '';


                        try {
                            $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $query = "SELECT * FROM registered_stylist";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $row['id_stylist'] . "</td>";
                                echo "<td>" . $row['stylist_fname'] . "</td>";
                                echo "<td>" . $row['stylist_lname'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['salon_name'] . "</td>";
                                echo "<td>" . $row['business_name'] . "</td>";
                                echo "<td>" . $row['phone_number'] . "</td>";
                                echo "<td>" . $row['state'] . "</td>";
                                echo "<td>" . $row['city'] . "</td>";
                                echo "<td>" . $row['website'] . "</td>";
                                echo "<td>" . $row['service_type'] . "</td>";
                                echo "<td>" . $row['registration_date'] . "</td>";
                                echo '<td>' . '<input type="number" min="0" max="1" name="block_user[' . $row['id_stylist'] . ']" value="' . $row['block_user'] . '">' .'<input type="submit" value="Submit" style="background-color: #c8a2c8; border: 0; padding: 5px;">'. '</td>';


                                echo "</tr>";

                            }

                        } catch (PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                        }

                    ?>
                    </tbody>
                </table>
            </div>
        </form>

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
            <h2>Treatments</h2>
            <form method="POST" action="admin-block-unblock.php">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>ID treatment</th>
                            <th>ID stylist</th>
                            <th>ID service</th>
                            <th>Treatment name</th>
                            <th>Description</th>
                            <th>Treatment duration</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Date of publication</th>
                            <th>Availability</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        try {
                            $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $query = "SELECT * FROM new_treatment";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td><img src='blob-images/" . $row['image'] . "' width='100' height='100'/></td>";
                                echo "<td>" . $row['id_treatment'] . "</td>";
                                echo "<td>" . $row['id_stylist'] . "</td>";
                                echo "<td>" . $row['id_service'] . "</td>";
                                echo "<td>" . $row['treatment_name'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . $row['treatment_duration'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['discount'] . "</td>";
                                echo "<td>" . $row['date_of_publication'] . "</td>";
                                echo "<td>" . $row['availability'] . "</td>";
                                echo '<td>' . '<input type="number" min="0" max="1" name="blocked[' . $row['id_treatment'] . ']" value="' . $row['blocked'] . '">' .'<input type="submit" value="Submit" style="background-color: #c8a2c8; border: 0; padding: 5px;">'. '</td>';


                                echo "</tr>";

                            }

                        } catch (PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
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
