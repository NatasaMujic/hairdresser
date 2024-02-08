<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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

    <style>
        body{
          font-family: 'Poiret One', sans-serif;
                font-weight: bold;

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
    <form class="form-signup text-center" id="registerForm" method="post" action="php-registration-admin.php">
        <div class="logo">
            <img src="index-images/logo.png">
        </div>
        <h2>Admin register form</h2>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <span id="nameError"></span>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                </div>
                <div class="col-md-6">
                    <span id="lastNameError"></span>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                </div>

            </div>
        </div>
        <div class="form-group">
            <span id="emailError"></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
        </div>
        <div class="form-group">
            <span id="passwordError"></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <input type="submit" class="btn btn-block" name="btn" value="Submit" style="background-color: #c8a2c8; color: black;">
    </form>
</div>
</body>
</html>
<?php

