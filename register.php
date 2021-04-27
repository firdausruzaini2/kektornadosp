<?php
    include_once("dbconnect.php");
     $name = $_POST["name"];
     $phone = $_POST["phone"];
     $email = $_POST["email"];
     $passa = $_POST["passworda"];
     $passb = $_POST["passwordb"];
     $shapass = sha1($passa);
     $otp = rand(1000,9999);

     if (!(isset($name) || isset($email) || isset($phone) || isset($passa) || isset($passb))){
        echo "<script>alert('Please fill in all required information')</script>";
        echo "<script>window.location.replace('register.html')</script>";
    }else{
     $sqlregister = "INSERT INTO tbl_user(name, phone, email, password,otp) VALUES('$name','$phone','$email','$shapass','$otp')";
        try{
            $conn->exec($sqlregister);
            echo "<script> alert('Registration successful')</script>";
            echo "<script> window.location.replace('login.html')</script>";
        }catch(PDOException $e){
            echo "<script> alert('Registration failed')</script>";
            echo "<script> window.location.replace('register.html')</script>";
        }
    }
?>
