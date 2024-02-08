<?php
include("db_config.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@200;300;500&family=Dancing+Script:wght@500&family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zeyada&display=swap" rel="stylesheet">
    <script src="libraries/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            //handler for sending the identification number to the user's email
            $("#verify-form").submit(function (e) {
                e.preventDefault();

                var email = $("#email").val();

                $.ajax({
                    type: "POST",
                    url: "send-verification-code.php",
                    data: {email: email},
                    success: function (response) {
                        alert("Verification code sent! Check your email.");
                        //redirect the user to the next page where they enter the verification code
                        window.location.href = "verify-code.php";
                    },
                    error: function (error) {
                        alert("Error sending verification code.");
                    }
                });
            });

        });
    </script>
    <style>
        body {
            font-family: 'Poiret One', sans-serif;
            font-weight: bold;
            padding-top: 7%;
        }

        .form-signup {
            margin: 0 auto;
            max-width: 400px;
            background-color: white;
            padding: 40px;
            border: 2px solid lightgray;
            box-shadow: 10px 10px lightgray;
        }

        .logo img {
            width: 80px;
            height: 80px;
        }

    </style>
</head>
<body>
<form class="form-signup text-center" id="verify-form" method="post">
    <div class="logo">
        <img src="index-images/logo.png">
    </div>
    <h4>We'll send the identification number to your email</h4>

    <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
    </div>

    <input type="submit" class="btn btn-block" style="background-color: #c8a2c8; color: white;" id="login" name="login"
           value="Send">
    <hr>
    <a href="login-as-user.php">Back to login page</a>
</form>
</body>
</html>