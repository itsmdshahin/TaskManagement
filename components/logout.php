<?php
session_start();

if (isset($_SESSION['homepage'])) {
    session_unset();
    session_destroy(); 
    echo "<script>alert('Successfully Logged Out')</script>";
    echo "<script>location.href='login.php'</script>";
} else {
    echo "<script>alert('Do not access directly!')</script>";
    echo "<script>location.href='login.php'</script>";
}
?>
