<?php
include 'db_config.php';

//registering new user
$host = 'localhost';
$db_name = 'hairdresser';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
<div class="container-fluid" style="background-color: #ffdc73; min-height: 100vh; position: relative;">

    <nav class="navbar navbar-expand-lg navbar-light" style="font-family: 'Poiret One', sans-serif; font-weight: bold;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
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
                    <a class="nav-link" href="login-as-user.php">LOG IN</a>
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

    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh; position: relative;">
        <img src="index-images/logo.png" alt="logo" style="width: 450px; height: 450px;">
        <a class="button1" href="services.php">Schedule your appointment</a>
    </div>
    <img src="index-images/black-women.png" style="width: 600px; height: 460px; position: absolute; bottom: 0; right: 0;" alt="img">
    <img src="index-images/cutting.png" style="width: 250px; height: 250px; position: absolute; top: 20%; left: -45px;" alt="img">

</div>


<div class="container-fluid" style="background-color: #ffffff; min-height: 100vh;">
    <div class="container d-flex flex-row justify-content-center align-items-center " style="min-height: 100vh; position: relative;">

        <div class="first">
        <h1 class="firstTitle">Services</h1>
        <p class="firstParText">Located in the heart of Nashville,<br> we pride ourselves on having a fantastic team <br>specializing in incredible treatments
           <br> and unbeatable customer service. </p>
        </div>

        <div class="second fade-in">
            <h2 class="secondTitle" style="font-family: 'Zeyada', cursive;">Hair Color</h2>
            <p class="color">Highlights/Lowlights</p>
            <p class="color">Permanent Hair Color</p>
            <p class="color">Temporary Hair Color</p>
            <p class="color">Balayage</p>
            <p class="color">Foilyage</p>
            <p class="color">Ombre</p>
            <p class="color">Gloss</p>
            <img src="index-images/logo.png" alt="logo" style="width: 50px; height: 50px; border-radius: 500px; float: right;">

        </div>

        <div class="third fade-in">
            <h2 class="secondTitle" style="font-family: 'Zeyada', cursive;">Shape & Style</h2>
            <p class="color">Women's Cut</p>
            <p class="color">Up Dos</p>
            <p class="color">Blowouts</p>
            <p class="color">Extensions</p>
            <p class="color">Pixie Cut</p>
            <p class="color">Pompadour</p>
            <p class="color">Curls and Waves</p>
            <img src="index-images/logo.png" alt="logo" style="width: 50px; height: 50px; border-radius: 500px; float: right;">

        </div>

        <div class="fourth fade-in">
            <h2 class="secondTitle" style="font-family: 'Zeyada', cursive;">Treatments</h2>
            <p class="color">Scalp Treatment</p>
            <p class="color">Olaplex</p>
            <p class="color">K Water Shine Treatment</p>
            <p class="color">Deep Conditioning</p>
            <p class="color">Brazilian Blowout</p>
            <p class="color">Kérastase Treatment</p>
            <p class="color">Volume Treatments</p>
            <img src="index-images/logo.png" alt="logo" style="width: 50px; height: 50px; border-radius: 500px; float: right;">

        </div>
        <div class="fifth fade-in">
            <h2 class="secondTitle" style="font-family: 'Zeyada', cursive;">Products</h2>
            <p class="color">Shampoo</p>
            <p class="color">Conditioner</p>
            <p class="color">Hair Masks</p>
            <p class="color">Styling Products</p>
            <p class="color">Hair Color Products</p>
            <p class="color">Hair Extensions</p>
            <p class="color">Hair Serums</p>
            <img src="index-images/logo.png" alt="logo" style="width: 50px; height: 50px; border-radius: 500px; float: right;">

        </div>
    </div>
</div>

<div class="container" style="background-color: #ffffff; min-height: 100vh; top: 50%;">
    <div class="container d-flex flex-row justify-content-center align-items-center " style="min-height: 100vh; position: relative;">

    <div class="section1">
        <img src="index-images/hairstyle.jpg" alt="pattern" style="height: 550px; box-shadow: 0 4px 8px rgba(0.2, 0.2, 0.2, 0.4);">
    </div>
    <div class="section2">
        <h1 style="font-family: 'Zeyada', cursive;">Welcome to LockLineup: Elevating Your Salon Experience</h1>
        <p>At LockLineup, we believe that beauty and wellness should be accessible,
            effortless, and tailored just for you. We've reimagined the way you schedule and experience salon services,
            bringing innovation to the forefront of your self-care routine.</p>
        <p>LockLineup isn't just a reservation platform; it's a beauty revolution. Our vision is to seamlessly
            connect you with a network of top-tier salons, offering a spectrum of services to cater to your unique
            style and preferences. We're here to transform your beauty journey into an indulgent, stress-free experience.
            LockLineup partners with a multitude of salons, ensuring a comprehensive range of options to suit your every beauty need.
            Booking your favorite salon services has never been easier. Our user-friendly interface allows you to effortlessly browse
            through multiple salons, check real-time availability, and secure your preferred time slot—all at your fingertips.</p>
        <p>Whether you're a trendsetter or a traditionalist, LockLineup celebrates beauty in all its forms. We embrace diversity
            and cater to every style, ensuring everyone finds their perfect match among our partner salons.</p>
        <img src="index-images/pattern.png" alt="pattern" style="width: 550px; height: 600px; opacity: 20%; position: absolute; margin-left: 500px; top: 50%;">

    </div>
    </div>
    <div class="container d-flex flex-row justify-content-center align-items-center " style="position: relative;">

    <div class="section3">
        <h1 style="font-family: 'Zeyada', cursive;">Join the Beauty Revolution–LockLineup is Your Key!</h1>
        <br>
        <p>Unlock a world of beauty at your convenience. LockLineup is not just a reservation platform;
            it's a lifestyle—a commitment to making your beauty journey seamless, exciting, and uniquely yours.
            Join us in redefining the way you experience beauty services. Your next beauty adventure is just a click away with LockLineup.
        </p>
    </div>
        <div class="container d-flex flex-column justify-content-center align-items-center " style="position: relative;">
            <div class="section4 d-flex flex-row">
                <a href="hairstyle_salons.php" class="s"><img src="index-images/wedding.png" style="height: 140px;"></a>
                <h5 class="txt">MEET OUR STYLISTS</h5>
            </div>
            <div class="section5 d-flex flex-row">
                <a href="services.php" class="s"><img src="index-images/lady.png" style="height: 140px;"></a>
                <h5 class="txt">VIEW OUR SERVICES</h5>

            </div>
        </div>
        </div>


    <div class="container d-flex flex-column justify-content-center align-items-center " style="background-image: url('index-images/stylist.png'); background-repeat: no-repeat; background-size: contain;">
        <br><br><br><br><br><br>
        <h1 class="thirdTitle">Our featured stylists</h1>
       <br><br>
        <div class="container d-flex flex-row justify-content-around">

            <div class="section6" style="position: relative;">
            <img src="index-images/stylist1.jpg" style="height: 390px;">
                <h4 style="font-family: 'Poiret One', sans-serif; font-weight: bold;">Helena Jackson</h4>

        </div>
        <div class="section7" style="position: relative;">
            <img src="index-images/stylist2.jpg" style="height: 390px;">
            <h4 style="font-family: 'Poiret One', sans-serif; font-weight: bold;">Clarice Stivens</h4>

        </div>
        <div class="section8" style="position: relative;">
            <img src="index-images/stylist3.jpg" style="height: 390px;">
            <h4 style="font-family: 'Poiret One', sans-serif; font-weight: bold;">Johnatan Cage</h4>


        </div>
    </div>
        </div>


    <div class="container" style="position: relative; margin-top: 15%; border-radius: 50px; overflow: hidden;">
        <img src="index-images/canva-design.png" alt="Background Image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; object-fit: cover;">
        <div class="inner-container" style="position: relative; width: 500px; margin-left: auto; padding: 20px;">
         <br>
            <h1 style="font-family: 'Zeyada', cursive; font-weight: bold;">Not registered yet?</h1>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">For registered users on our system, allowing easy booking and tracking of appointments across multiple hair salons,
                the following benefits are provided upon registration:</p>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">Registered users gain access to a variety of hair salons, can easily manage their profile details, book appointments
                across multiple salons, and track their appointment history. Our platform offers convenience and simplicity
                for scheduling and managing hair appointments online.</p>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">
                Experience the ease of booking and managing hair appointments online! With our platform, users unlock access to diverse
                salon offerings, seamless appointment scheduling, and effortless profile management. Join us to simplify
                your salon experience and discover the convenience of hassle-free booking!
            </p>
          <br><br><br><br>
            <a class="but" href="register-as-user.php" style="margin-top: 20%;">Make your account</a>

        </div>

    </div>
    <div class="container d-flex flex-column" style="position: absolute;">
        <img src="index-images/shine1.png" style="width: 90px; margin-right: 30px; margin-top: 50px;">
        <img src="index-images/shine1.png" style="width: 60px;">
    <img src="index-images/shine2.png" style="width: 90px; margin-left: 300px; margin-top: 150px;">
    </div>
    <div class="container d-flex flex-row justify-content-end justify-content-around" style="position: relative;">
        <img src="index-images/shine1.png" style="width: 90px; margin-right: 50px; margin-top: 100px;">
        <img src="index-images/shine1.png" style="width: 90px; margin-right: 20px; margin-top: 100px;">

    </div>

    <div class="container-fluid d-flex flex-column justify-content-center align-items-center " style="margin-top: 40px; background-image: url('index-images/frame.png'); background-repeat: no-repeat; background-size: contain;">
        <br><br><br><br><br><br>

        <div class="container d-flex flex-column justify-content-around">
            <img src="index-images/quotation.png" style="width: 70px;">
            <br><br><br>
            <h1 style="font-family: 'Poiret One', sans-serif; font-weight: bold;">Her own hair was a glory of copper fire that morning, shining like a whisky still, long and loose in gentle flames down her back.</h1>
           <br><br>
            <h3 style="font-family: 'Poiret One', sans-serif; font-weight: bold;">Elizabeth Wein</h3>
            <br><br><br>
            <img src="index-images/quotation.png" style="width: 70px; right: 0; margin-left: 90%;">

        </div>
        <img src="index-images/frame2.png" style="width: 1300px;">
    </div>

    <div class="container" style="position: relative; margin-top: 5%; border-radius: 50px; overflow: hidden; height: 90vh;">
        <img src="index-images/style-salon.png" alt="Background Image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; object-fit: cover;">
        <div class="inner-container" style="position: relative; width: 500px; margin-right: auto; padding: 20px;">
            <br>
            <h1 style="font-family: 'Zeyada', cursive; font-weight: bold;">Are you a stylist?</h1>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">As a stylist or salon owner registered on our platform, you will have access to a range of powerful
                features designed to streamline your business operations and enhance your service delivery:</p>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">Easily create, modify, or remove services offered at your salon, along with their corresponding prices and durations.
                This allows you to keep your service menu up-to-date and tailored to your clients' needs.</p>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">
                Take control of your schedule by creating, modifying, or canceling appointments on a daily basis.
                This flexibility ensures that you can adapt to changing client demands and optimize your salon's workflow.
            </p>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">Gain insights into your salon's booking activity by accessing a comprehensive overview of all appointments,
                including those that are reserved, archived, or canceled. This feature enables you to effectively manage your
                salon's resources and optimize your staff's schedules.</p>

            <a class="but1" href="register-as-stylist.php" style="margin-top: 35%;">Make business account</a>

        </div>

    </div>

    <div class="container d-flex flex-column" style="position: absolute;">
        <img src="index-images/shine2.png" style="width: 60px;">
        <img src="index-images/shine2.png" style="width: 90px; margin-left: 300px; margin-top: 150px;">
    </div>
    <div class="container d-flex flex-row justify-content-end justify-content-around" style="position: relative;">
        <img src="index-images/shine2.png" style="width: 90px; margin-right: 50px; margin-top: 100px;">
        <img src="index-images/shine2.png" style="width: 90px; margin-right: 20px; margin-top: 100px;">

    </div>
    <div class="container d-flex flex-column justify-content-around" style="position: relative; margin-top: 10%; margin-bottom: 10%;">
        <img src="index-images/girl-with-phone.png" alt="Background Image" style="position: absolute; top: 0;right: 100px; z-index: 0; height: 600px;">
        <div class="inner-container" style="position: relative; width: 500px; margin-right: auto; padding: 20px;">
            <br>
            <img src="index-images/flower-graphic.png" style="width: 350px;position: absolute; height: 600px; opacity: 30%; left: 400px;">

            <h1 style="font-family: 'Zeyada', cursive; font-weight: bold;">Welcome to our salon booking platform! </h1>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">We want to introduce our intake forms – designed to tailor your salon visits according to your preferences and needs.

                Why fill out our intake forms?
            </p>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">👉 Personalized Service: Provide us with insights into your preferred hairstyles, treatments, and styling preferences so our stylists can deliver exactly what you desire.</p>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">👉 Streamlined Experience: Save time during your salon visit by pre-communicating your requirements, ensuring that your appointment is focused on pampering and perfection.</p>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">👉 Seamless Booking: Enjoy the convenience of booking future appointments with just a few clicks, as our system remembers your preferences for each visit.</p>
            <p style="font-family: 'Poiret One', sans-serif; font-weight: bold;">
                By completing our intake forms, you empower us to craft a bespoke salon experience tailored to you. Your satisfaction is our priority,
                and these forms serve as the first step towards achieving your hair goals with us.</p>

            <a class="but" href="register-as-user.php" style="margin-top: 40%;">Make your account</a>

        </div>

    </div>


    </div>
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
        <a href="hairstyle_salons.php" class="nav1">Hair Salons</a>
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
                <a class="but2" href="services.php">BOOK APPOINTMENT</a>
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

</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const divs = document.querySelectorAll('.fade-in');
        function isInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function handleScroll() {
            divs.forEach((div) => {
                if (isInViewport(div)) {
                    div.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', handleScroll);
        handleScroll();
    });
</script>
<?php
