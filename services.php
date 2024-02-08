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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@200;300;500&family=Dancing+Script:wght@500&family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zeyada&display=swap" rel="stylesheet">

</head>

<body>
<div class="container-fluid" style="min-height: 100vh; position: relative; padding: 0; margin: 0;">

<nav class="navbar navbar-expand-lg navbar-light" style="font-family: 'Poiret One', sans-serif; font-weight: bold; background-color: #ffdc73;">
    <img src="index-images/logo.png" alt="logo" style="width: 110px; height: 120px;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services.php">SERVICES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="hairstyle_salons.php">HAIRSTYLE SALONS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CONTACT US</a>
            </li>
            <li class="nav-item">
                <?php


                //prikazuje se logout samo ako je registrovani korisnik ulogovan

                if (isset($_SESSION['email'])) {
                echo '<a href="logout-user.php" class="nav-link" style="width: fit-content;">LOGOUT</a>';

                }else {
                echo '<a href="login-as-user.php" class="nav-link">LOG IN</a>';
                }
                ?>
            </li>

            <li class="nav-item">
                <img src="index-images/facebook.png" alt="img" style="width: 45px; height; 45px;">
            </li>
            <li class="nav-item">
                <img src="index-images/instagram.png" alt="img" style="width: 45px; height; 45px;">
            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['email'])) {
                    echo "<p style='margin-left: 20px; margin-top: 10px;'>Welcome {$_SESSION['email']} to your dashboard!</p>";

                }
                    ?>

            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['email'])) {
                    echo "<a href='user-dashboard.php' class='nav-link' style='margin-left: 20px;'>GO TO YOUR DASHBOARD</a>";
                }
                ?>

            </li>
        </ul>
    </div>
</nav>
    <br><br>
    <div class="container d-flex flex-column" style="margin-bottom: 40px; position: relative;">
        <h2 style="font-family: 'Poiret One', sans-serif; font-weight: bold;">Find the services you need</h2>
        <br>
        <div class="container d-flex flex-row">
            <img src="index-images/filter.png" alt="img" style="height: 28px; width: 28px; margin-right: 7px;">
            <h5 style="margin-right: 18px;">Filters</h5>
            <form method="GET">
                <select id="selectList" name="option" style="font-family: 'Poiret One', sans-serif; font-weight: bold; border-radius: 7px;">
                    <option><b>Sort by<b></option>
                    <option>Low to High Price</option>
                    <option>High to Low Price</option>

                </select>
                <button type="submit" style="background-color: #c8a2c8; color: #ffffff; border:0; border-radius: 10px; padding: 6px; font-family: 'Poiret One', sans-serif; font-weight: bold;">Apply</button>
            </form>
        </div>
    </div>

    <?php
    include("db_config.php");

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_GET['option'])) {
            $option = $_GET['option'];
            $query = "";
            switch ($option) {
                case 'Low to High Price':
                    $query = "SELECT * FROM new_treatment ORDER BY price ASC";
                    break;
                case 'High to Low Price':
                    $query = "SELECT * FROM new_treatment ORDER BY price DESC";
                    break;
                default:
                    break;
            }

            if ($query !== "") {
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    //racunam discount ako ga ima
                    $discount = $row["discount"];
                    $price = $row["price"];

                    if (!function_exists('discountPrice')) {
                        function discountPrice($discount, $price)
                        {
                            $new_price = $price;
                            if ($discount > 0) {
                                $new_price = $price - ($price * ($discount / 100));
                            }
                            return $new_price;
                        }
                    }
                    $result = discountPrice($discount, $price);
                    if($row['blocked']==0) {
                        echo '<div class="container d-flex flex-column justify-content-center" style="margin-top: 40px;">
            <div class="container d-flex flex-row">
                    <img src="blob-images/' . $row["image"] . '" class="service-images"/>
                    <div class="d-flex flex-column">
                    <h3 class="service-title">' . $row["treatment_name"] . '</h3>
                    <p class="service-paragraph"> Date of publication: ' . $row["date_of_publication"] . '<br><br> Treatment duration: ' . $row["treatment_duration"] . ' </p>
                    <hr style="width: 150vh; margin-left: 20px;">
                    <div class="d-flex flex-row justify-content-between">
                        <p class="service-paragraph"> Treatment description: ' . $row["description"] . ' </p>
                        <a href="book.php?id_treatment=' . $row['id_treatment'] . '" class="service-link">Book</a>
                    </div>
                    <h6 class="service-h5title"> Price: $' . $row["price"] . '.00+ </h6>
                    <h6 class="service-h5title"> $' . $result . ' </h6>
                    <p class="discount-paragraph"> Discount: ' . $row["discount"] . '%</p>
                    <br>
                    <p class="service-paragraph"> Available from: ' . $row["availability"] . ' </p>
                </div>
            </div>
        </div>';
                    }
                }
            }
        } else {
            $query = "SELECT * FROM new_treatment";

            $stmt = $pdo->prepare($query);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $discount = $row["discount"];
                $price = $row["price"];

                if (!function_exists('discountPrice')) {
                    function discountPrice($discount, $price)
                    {
                        $new_price = $price;
                        if ($discount > 0) {
                            $new_price = $price - ($price * ($discount / 100));
                        }
                        return $new_price;
                    }
                }
                $result = discountPrice($discount, $price);
                    if($row['blocked']==0) {
                        echo '<div class="container d-flex flex-column justify-content-center" style="margin-top: 40px;">
            <div class="container d-flex flex-row">
                    <img src="blob-images/' . $row["image"] . '" class="service-images"/>
                    <div class="d-flex flex-column">
                    <h3 class="service-title">' . $row["treatment_name"] . '</h3>
                    <p class="service-paragraph"> Date of publication: ' . $row["date_of_publication"] . '<br><br> Treatment duration: ' . $row["treatment_duration"] . ' </p>
                    <hr style="width: 150vh; margin-left: 20px;">
                    <div class="d-flex flex-row justify-content-between">
                        <p class="service-paragraph"> Treatment description: ' . $row["description"] . ' </p>
                        <a href="book.php?id_treatment=' . $row['id_treatment'] . '" class="service-link">Book</a>
                    </div>
                    <h6 class="service-h5title"> Price: $' . $row["price"] . '.00+ </h6>
                    <h6 class="service-h5title"> $' . $result . ' </h6>
                    <p class="discount-paragraph"> Discount: ' . $row["discount"] . '%</p>
                    <br>
                    <p class="service-paragraph"> Available from: ' . $row["availability"] . ' </p>
                </div>
            </div>
        </div>';
                    }
            }
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>


    <div class="container d-flex flex-column justify-content-center" style="margin-top: 40px;">
        <div class="container d-flex flex-row">
            <img src="index-images/braids.jpg" alt="pic" class="service-images">
            <div class="d-flex flex-column">
                <h3 class="service-title">Colorful braids</h3>
                <p class="service-paragraph">6451 N Blackstone Ave, Fresno, 93710</p>
                <hr style="width: 150vh; margin-left: 20px;">
                <div class="d-flex flex-row justify-content-between">
                <h5 class="service-h5title">Takedown</h5>
                    <a href="#" class="service-link">Book</a>
                </div>
                <p class="service-paragraph">It's all in the name. Safely take down your hairstyle so you can start fresh.</p>
                <h6 class="service-h5title">$45.00+</h6>
                <hr style="width: 150vh; margin-left: 20px;">
                <div class="d-flex flex-row justify-content-between">
                    <h5 class="service-h5title">Invisible locks</h5>
                    <a href="book.php" class="service-link">Book</a>
                </div>
                <p class="service-paragraph">Lowest price in 30 days, before discount: $180.00</p>
                <h6 class="service-h5title">$162.00+</h6>
                <h6 class="service-discount">$180.00+</h6>
                <p class="discount-paragraph">Discount: 10%</p>
            </div>
        </div>
    </div>


</div>



<!--footer-->
<div class="container-fluid" style="background-color: #ffdc73; min-height: 70vh;">
    <div class="row">
        <div class="col-3">
            <div class="container d-flex flex-row justify-content-start" style="margin-left: 80px;">
                <img src="index-images/logo.png" alt="logo" style="width: 200px; height: 200px;">
            </div>

            <div class="container d-flex flex-row justify-content-start" style="margin-left: 100px;">
                <img src="index-images/facebook1.png" alt="logo" style="width: 35px; height: 35px;">
                <img src="index-images/instagram1.png" alt="logo" style="width: 35px; height: 35px;">
                <img src="index-images/youtube.png" alt="logo" style="width: 35px; height: 35px;">
                <img src="index-images/twitter.png" alt="logo" style="width: 35px; height: 35px;">
            </div>
            <div class="container d-flex flex-row justify-content-start" style="margin-left: 80px;">
                <img src="index-images/expertise.png" alt="logo" style="width: 200px; height: 200px;">
            </div>
        </div>

        <div class="col-3">
            <div class="container d-flex flex-column justify-content-start" style="margin-top: 100px;">
                <a href="index.php" class="nav1">Home</a>
                <a href="about.php" class="nav1">About Us</a>
                <a href="services.php" class="nav1">Services</a>
                <a href="#" class="nav1">Hair Salons</a>
                <a href="#" class="nav1">Contact Us</a>
                <a href="login-as-user.php" class="nav1">Log In</a>
                <a href="register-as-user.php" class="nav1">Register</a>
            </div>
        </div>

        <div class="col-3">
            <div class="container d-flex flex-column justify-content-start" style="margin-top: 100px;">
                <a href="#" class="nav2">OUR STYLISTS</a>
                <br>
                <a href="#" class="nav2">BLOG</a>
                <br>
                <a href="#" class="nav2">FAQS</a>
                <a href="#" class="nav2">Salon FAQs</a>
                <a href="#" class="nav2">Hair Color FAQs</a>

            </div>
        </div>

        <div class="col-3">
            <div class="container d-flex flex-column justify-content-start" style="margin-top: 100px;">
                <a href="#" class="nav3">CONTACT</a>
                <a href="#" class="nav3">2870 5th Avenue, Ste. 101,
                    San Diego 92103</a>
                <br>
                <a class="but2" href="#">BOOK APPOINTMENT</a>
                <br>
                <a class="but2" href="#">(619) 255-9779</a>
                <br>
                <a href="#" class="nav3">Careers</a>
                <a href="#" class="nav3">Policies</a>
                <a href="#" class="nav3">Terms and Conditions</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
