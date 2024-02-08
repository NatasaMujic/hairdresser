<?php
session_start();
$host = 'localhost';
$db_name = 'hairdresser';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($_SERVER["REQUEST_METHOD"]=="POST"){
     if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["busname"]) && isset($_POST["salonname"]) && isset($_POST["phonenumber"]) && isset($_POST["state"]) && isset($_POST["city"]) && isset($_POST["service-type"]) && isset($_POST["website"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])){
           $firstName=$_POST["firstname"];
           $lastName=$_POST["lastname"];
           $busName=$_POST["busname"];
           $salonName=$_POST["salonname"];
           $phoneNumber=$_POST["phonenumber"];
           $state=$_POST["state"];
           $city=$_POST["city"];
           $serviceType=$_POST["service-type"];
           $website=$_POST["website"];
           $emailStylist=$_POST["email"];
           $passwordStylist=$_POST["password"];
           $confirmPassword = $_POST["confirm_password"];


           if(empty($firstName) || empty($lastName) || empty($busName) || empty($phoneNumber) || empty($state) || empty($city) || empty($serviceType) || empty($emailStylist) || empty($passwordStylist) || empty($confirmPassword)){
               echo "All fields required!";
           }elseif(!filter_var($emailStylist, FILTER_VALIDATE_EMAIL)){
               echo "Email is not valid!";
           }elseif($passwordStylist !== $confirmPassword){
               echo "Password do not match!";
           }else{
               $stmt = $pdo->prepare("SELECT * FROM registered_stylist WHERE email = :email");
               $stmt->execute(['email' => $emailStylist]);
               $existingUser = $stmt->fetch();
               if ($existingUser) {
                   echo "User with this email already exists!";
               }else{
                   $hashed_password=password_hash($passwordStylist,PASSWORD_BCRYPT);

                   $activationCode=md5(uniqid(rand(),true));

                   $stmt = $pdo->prepare("INSERT INTO registered_stylist (stylist_fname, stylist_lname, email, password, salon_name, business_name, phone_number, state,city,website,service_type,activation_code) VALUES (:firstName, :lastName, :email, :hashedPassword, :salonname,:busname,:phonenumber, :state,:city,:website,:service_type,:activationCode)");
                   $stmt->execute([
                       'firstName' => $firstName,
                       'lastName' => $lastName,
                       'email' => $emailStylist,
                       'hashedPassword' => $hashed_password,
                       'salonname' => $salonName,
                       'busname' => $busName,
                       'phonenumber' => $phoneNumber,
                       'state' => $state,
                       'city' => $city,
                       'website' => $website,
                       'service_type' => $serviceType,
                       'activationCode' => $activationCode
                   ]);

                   $registeredStylistId = $pdo->lastInsertId();
                   $_SESSION['firstname'] = $firstName;
                   $_SESSION['id_stylist'] = $registeredStylistId;

                   $_SESSION['email'] = $emailStylist;
                   include("send-activation-email-stylist.php");

                   $encodedActivationCode = urlencode($activationCode);
                   $_SESSION['encoded_activation_code'] = $encodedActivationCode;
               }

           }
     }else{
         echo "Some data is not correct!";
     }
}