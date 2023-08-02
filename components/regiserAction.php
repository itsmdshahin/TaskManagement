<?php

include 'config.php';

$Fullname = $_POST['uname'];
$username = $_POST['uusername'];
$uemail = $_POST['uemail'];
$upassword = $_POST['upassword'];
$urpassword = $_POST['urpassword'];
$umobile = $_POST['umobile'];
echo $Fullname . " " . $uemail . " " . $upassword . " " . $urpassword . " " . $umobile;

// for insert the registion value
$insertQuery = "INSERT INTO `register`(`name`, `email`, `password`, `re-password`, `mobile`,`username`) VALUES ('$Fullname','$uemail','$upassword','$urpassword','$umobile','$username' )";

// for duplicate user found
$duplicateUser = "SELECT * FROM `register` WHERE username='$username'";
$duplicateEmail = "SELECT * FROM `register` WHERE email='$uemail'";

$duplicateUserFound = mysqli_query($conn, $duplicateUser);
$duplicateEmailFound = mysqli_query($conn, $duplicateEmail);

// Regex partten 
$user_partten = "/[a-zA-Z _.]{3,20}/";
$phone_partten = "/(\+880)?-?01[3-9]\d{8}/";
$email_pattern = "/^\S+@\S+\.\S+$/";
$pass_pattern = "/((?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$&^%*_+<>])).{6,20}/";


if (mysqli_num_rows($duplicateEmailFound) > 0) {
    echo "<script>alert('Email Already taked!')</script>";
    echo "<script>location.href = 'registration.php'</script>";
} else if (mysqli_num_rows($duplicateUserFound) > 0) {
    echo "<script>alert('User Already taked!')</script>";
    echo "<script>location.href = 'registration.php'</script>";
} else if (!preg_match($user_partten, $username)) {
    echo "<script>alert('User Not valid')</script>";
    echo "<script>location.href = 'registration.php' </script>";
} else if (!preg_match($email_pattern, $uemail)) {
    echo "<script>alert('Email Not valid')</script>";
    echo "<script>location.href = 'registration.php' </script>";
} else if (!preg_match($phone_partten, $umobile)) {
    echo "<script>alert('Mobile Not valid')</script>";
    echo "<script>location.href = 'registration.php' </script>";
} else if (!preg_match($pass_pattern, $upassword)) {
    echo "<script>alert('Password Not valid')</script>";
    echo "<script>location.href = 'registration.php' </script>";
} else if (!preg_match($pass_pattern, $urpassword)) {
    echo "<script>alert('Password Not valid')</script>";
    echo "<script>location.href = 'registration.php' </script>";
} else if ($upassword !== $urpassword) {
    echo "<script>alert('Password Not Match')</script>";
    echo "<script>location.href = 'registration.php' </script>";
} else {
    if (!mysqli_query($conn, $insertQuery)) {
        echo "<script>alert('Wrong User and Password')</script>";
        echo "<script>location.href = 'registration.php' </script>";
    } else {
        echo "<script>alert('Sucessfully Registart!!!')</script>";
        echo "<script>location.href = 'login.php' </script>";
    }
}
