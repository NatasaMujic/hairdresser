<?php
session_start();

$host = 'localhost';
$db_name = 'hairdresser';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["email"]) && isset($_POST["password"])){
        $email=$_POST["email"];
        $password=$_POST["password"];

        $stmt=$pdo->prepare("SELECT * FROM registered_stylist WHERE email=:email");
        $stmt->execute(['email'=>$email]);
        $user = $stmt->fetch();


        if($user && password_verify($password, $user['password'])){
               if($user['block_user']==0){
                   $_SESSION['id_stylist'] = $user['id_stylist'];

                   $_SESSION['email'] = $email;

                   $_SESSION['stylist_fname'] = $user['stylist_fname'];

                   header("Location: stylist-dashboard.php");
                   exit();
               }else{
                   echo "<script>alert('Access denied for this account. For more information, contact the admin.');</script>";
                   header("login-as-stylist.php");
                   exit();
               }
        }

    }else{
        $errorMessage = "Email and password are required!";
        echo "<script>alert('$errorMessage');</script>";
    }
}