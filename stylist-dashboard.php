<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <script src="https://smtpjs.com/v3/smtp.js"></script>
        <link href="style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>Register dashboard</title>
        <style>
            *{
                font-family: 'Montserrat', sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;

            }
            body{
                min-height: 100vh;
                overflow-x: hidden;
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

            .recentEvents{
                display: grid;
                grid-gap: 30px;
                margin-top: 10px;
                min-height: 500px;
                padding: 20px;
                box-shadow: 0 7px 25px rgba(0,0,0,0.8);
                border-radius: 20px;

            }
            .recentEvents table thead{
                font-size: 20px;
                font-weight: 600;
            }
            .recentEvents table tr{
                border-bottom: 1px solid rgba(0,0,0,0.1);
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
                    background: darkblue;
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
                        <span class="title">REGISTERED USER</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="link" data-target="content2">
                        <span class="title">Your events</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="link" data-target="content3">
                        <span class="title">Invitations</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="link" data-target="content4">
                        <span class="title">Event archive</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="link" data-target="content456">
                        <span class="title">Wish list</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="link" data-target="content4567">
                        <span class="title">Event reminder</span>
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


    <div id="content2" class="content">
        <div class="yourEvents">
            <?php
            if (isset($_SESSION['firstName'])) {
                $username = $_SESSION['firstName'];
                echo "Welcome $username again!";
            } else {
                // redirection on the login page if the user is not logged
                // header("Location: register_dashboard.php");
                //exit();
            }
            ?>

            <h2>Create your event</h2>
            <br>
            <form class="forma" method="post" action=""  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputText">Event Name</label>
                        <input type="text" class="form-control" id="eventName" name="eventName" placeholder="Event Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="customFile">Choose image for your event</label>
                        <input type="file" class="form-control"  id="image" name="image" />
                    </div>
                </div>
                <div form="row">
                    <div class="form-outline">
                        <label class="form-label" for="textAreaExample2">Short Event Description</label>
                        <textarea class="form-control" id="shortText" name="shortText" rows="4" placeholder="Less than 500 characters!"></textarea>
                    </div>
                </div>
                <div form="row">
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="eventAddress" name="eventAddress" placeholder="1234 Main St">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="eventCity" name="eventCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <input type="text" class="form-control" id="eventState" name="eventState">

                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputDate">Date</label>
                        <input type="date" class="form-control"  id="eventDate" name="eventDate">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group  col-md-6">
                        <label for="inputAllowComment">Allow comment (1-allowed, 0-not allowed)</label>
                        <input type="number" class="form-control"  id="eventAllowComment" name="eventAllowComment">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            <br><br>


        </div>
    </div>

    <div id="content3" class="content">
        <div class="yourEvents">
            <form class="form-contact" action="send-invitation.php" method="post" enctype="multipart/form-data">
                <h2>Create invitations for your guests</h2>

                <!-- Select list for user's events -->
                <div class="form-group">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Guest Name"> <br>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lname" placeholder="Last Name"> <br>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Guest Email"> <br>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="message" placeholder="Message"> <br>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="wishlist" placeholder="Wishlist"></textarea> <br>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="file"> <br>
                </div>

                <input type="submit" class="btn btn-info" value="Submit">
            </form>
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
            <script>
                // add an event listener to the select element
                document.getElementById('event').addEventListener('change', function() {
                    // Get the selected value
                    var selectedValue = this.value;
                    // set the selected value to the hidden input field
                    document.getElementById('selectedEvent').value = selectedValue;
                });
            </script>
        </div>

    </div>
    <div id="content4" class="content">
        <div class="yourEvents">

        </div>
    </div>

    <div id="content456" class="content">
        <div class="yourEvents">

        </div>
    </div>

    <div id="content4567" class="content">
        <div class="yourEvents">

            <br><br><br>
            <form class="form-contact" action="send-reminder-email.php" method="post" enctype="multipart/form-data">
                <h2>Create event reminder for an invitee</h2>

                <div class="form-group">
                    <input type="text" class="form-control" name="eventName" placeholder="Event Name"> <br>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="guestName" placeholder="Guest Name"> <br>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="guestEmail" placeholder="Guest Email"> <br>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="message" placeholder="Message"> <br>
                </div>

                <input type="submit" class="btn btn-info" value="Submit">
            </form>
            <br><br>
        </div>
    </div>

    <div id="content5" class="content">
        <div class="yourEvents">
            <h2>Update your account data</h2>
            <form class="form-signup text-center" id="registerForm" method="post" action="register_dashboard.php">

                <input type="text" class="form-control" id="firstname1" name="firstname1" placeholder="First Name">
                <br>
                <input type="text" class="form-control" id="lastname1" name="lastname1" placeholder="Last Name">
                <br>
                <input type="text" class="form-control" id="orgname1" name="orgname1" placeholder="Organization name (not necessary)">
                <br>
                <input type="email" class="form-control" id="email1" name="email1" placeholder="Email Address">
                <br>
                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                <br>
                <input type="password" class="form-control" id="password21" name="confirm_password1" placeholder="Confirm password">
                <br>
                <button type="submit" style='text-decoration: none; background-color: #389aab; padding: 10px; color: #fff; border-radius: 5px; border: 0;'>Update</button>
            </form>

            <br><br>
            <a href='logout.php' style='text-decoration: none; background-color: #f8c870; padding: 10px; color: #000; border-radius: 5px;'>Logout</a>
        </div>
    </div>

    </div>
    <div id="content1" class="content">
        <h1>Welcome registered user!</h1>

        <?php
        //php for creating registered user
        include("db_config.php");

        $host = 'localhost';
        $db_name = 'hairdresser';
        $username = 'root';
        $password = '';

        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        /*
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // checking if all necessary data are entered
            if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
                $firstName = $_POST["firstname"];
                $lastName = $_POST["lastname"];
                $orgName = $_POST["orgname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $confirmPassword = $_POST["confirm_password"];

                if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
                    echo "All fields required!";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "Email is not valid!";
                } elseif ($password !== $confirmPassword) {
                    echo "Passwords do not match!";
                } else {
                    // Check if user already exists in the database
                    $stmt = $pdo->prepare("SELECT * FROM registered_user WHERE email = :email");
                    $stmt->execute(['email' => $email]);
                    $existingUser = $stmt->fetch();

                    if ($existingUser) {
                        echo "User with this email already exists!";
                    } else {
                        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                        // adding activation code
                        $activationCode = md5(uniqid(rand(), true));

                        // enter user data together with activation code
                        $stmt = $pdo->prepare("INSERT INTO registered_user (first_name, last_name, organization_name, email, password, activation_code) VALUES (:firstName, :lastName, :orgName, :email, :hashedPassword, :activationCode)");
                        $stmt->execute([
                            'firstName' => $firstName,
                            'lastName' => $lastName,
                            'orgName' => $orgName,
                            'email' => $email,
                            'hashedPassword' => $hashedPassword,
                            'activationCode' => $activationCode,
                        ]);

                        include("send-activation-email.php");

                        $registeredUserId = $pdo->lastInsertId();
                        $_SESSION['firstname'] = $firstName;
                        $_SESSION['user_id'] = $registeredUserId;

                        // showing data on registration dashboard
                        echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;'>";
                        echo "<h1 style='text-align: center;'>Welcome " . $firstName . "</h1>";
                        echo "<div style='text-align: center;'>";
                        echo "<p>Your data:</p>";
                        echo "<p>Name: " . $firstName . " <br>Last Name: " . $lastName . "<br>Organization Name: " . $orgName . "<br>Email: " . $email . "<br>Password: " . $password . "</p>";
                        echo "</div>";
                    }
                }
            } else {
                echo "Some data is not correct!";
            }
        } */
        ?>
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

