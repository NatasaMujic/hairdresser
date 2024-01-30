<?php
include 'db_config.php';
?>
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

    <style>
        body{
            background-image: url("index-images/frame1.png");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Poiret One', sans-serif;
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
</head>
<body>
<div class="container">

    <form class="form-signup text-center"  id="login-form" method="post" action="login_check.php">
        <div class="logo">
            <img src="index-images/logo.png">
        </div>
        <br>
        <h3>LOG IN AS USER</h3>

        <div class="form-group">
            <span id="emailError"></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
        </div>
        <br>
        <div class="form-group">
            <span id="passwordError"></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>

        <input type="submit" class="btn btn-block" id="login" name="login" value="Submit" style="background-color: #ffdc73;">
        <hr>
        <a href="forgotten-password-email.php">Forgot your password?</a>
        <div class="row" style="margin-top: 20px;">
            <h3>Log in as stylist</h3>
            <a href="login-as-stylist.php" class="link" style="background-color: #c8a2c8; color: white;  padding: 10px; text-decoration: none; border-radius: 5px; margin-top: 10px;">Log in</a>
        </div>
        <hr>
        <a href="admin-login.php">Admin Dashboard</a>
</div>
</form>
</div>


</body>
</html>

    <script>

        function setError(field, errorElement, message){
            field.style.borderColor='red';
            errorElement.textContent=message;
            errorElement.style.color='red';
            errorElement.style.fontWeight='bold';
        }

        function clearError(field, errorElement){
            field.style.borderColor='';
            errorElement.textContent='';
        }

        function validateField(field, errorElement, validationFn, errorMessage){
            if(!validationFn(field.value)){
                setError(field, errorElement, errorMessage);
                return false;
            }else{
                clearError(field, errorElement);
                return true;
            }
        }

        function validateEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        function validatePassword(password) {
            const minLength = 8;
            const hasUppercase = /[A-Z]/.test(password);
            const hasLowercase = /[a-z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSpecialChar = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password);

            return (
                password.length >= minLength &&
                hasUppercase &&
                hasLowercase &&
                hasNumber &&
                hasSpecialChar
            );
        }

        document.addEventListener('DOMContentLoaded', function(){
           var loginForm =document.getElementById('login-form');
            loginForm.addEventListener('submit', function(event){
                var email = document.getElementById('email');
                var emailError = document.getElementById('emailError');
                var password = document.getElementById('password');
                var passwordError = document.getElementById('passwordError');
                var errors = false;

                errors = !validateField(email, emailError, validateEmail, 'Email is not valid!') || errors;
                errors = !validateField(password, passwordError, validatePassword, 'Password is not valid!') || errors;

                if(errors){
                    event.preventDefault();
                }
            });
        });

    </script>
<?php
