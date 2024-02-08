
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@200;300;500&family=Dancing+Script:wght@500&family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zeyada&display=swap" rel="stylesheet">
    <script src="libraries/jquery.min.js"></script>

    <!--ajax code for verification -->
    <script>
        $(document).ready(function() {
            //handler for verification of identification number
            $("#verify-form").submit(function(e) {
                e.preventDefault();

                var verificationCode = $("#verificationCode").val();

                $.ajax({
                    type: "POST",
                    url: "verify-code-process.php",
                    data: { verificationCode: verificationCode },
                    success: function(response) {
                        if (response === "success") {
                            $("#verification-result").text("Verification successful! You can reset your password now.");
                            window.location.href = "change-password.php";
                        } else {
                            $("#verification-result").text("Verification code is incorrect.");
                        }
                    },
                    error: function(error) {
                        alert("Error verifying verification code.");
                    }
                });
            });
        });
    </script>
</head>
<style>
    body{
        font-family: 'Poiret One', sans-serif;
        font-weight: bold;
        padding-top: 7%;
    }
    .form-signup{
        margin: 0 auto;
        max-width: 400px;
        background-color: white;
        padding: 40px;
        border: 2px solid lightgray;
        box-shadow: 10px 10px lightgray;
    }
    .logo img{
        width: 80px;
        height: 80px;
    }
</style>
<body>
<div class="container">
    <form class="form-signup text-center" id="verify-form" method="post">
        <div class="logo">
            <img src="index-images/logo.png">
        </div>
        <h4>Enter the verification code sent to your email</h4>
        <div class="form-group">
            <input type="text" class="form-control" id="verificationCode" name="verificationCode" placeholder="Verification Code">
        </div>
        <input type="submit" class="btn btn-block" style="background-color: #c8a2c8; color: white;" id="verify" name="verify" value="Verify">
        <hr>
        <a href="login-as-stylist.php">Back to login page</a>
        <div id="verification-result"></div>

    </form>
</div>
</body>
</html>
<?php
