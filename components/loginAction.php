<?php
include 'config.php';

if (isset($_POST['l_username']) && isset($_POST['l_password'])){
    $userName = $_POST['l_username'];
    $Password = $_POST['l_password'];
    session_start();
    // echo $userName . " " . $Password;

    $usernameCheck = "SELECT * FROM `register` WHERE email='$userName' AND password='$Password'";

    $result = mysqli_query($conn, $usernameCheck);

    //echo mysqli_num_rows($result);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
       // print_r($row);
        // echo "Username: " . $row['email'] . "<br>";
        // echo "Password: " . $row['password'] . "<br>";
        $foundUsername = $row['email'];
        $foundPassword = $row['password'];
        $userId = $row['id'];

        // Other data you want to display
        if($foundUsername === $userName && $Password ===  $foundPassword){
            $_SESSION['homepage']=$userName;
            // $_SESSION['userId'] = $userId; <?php echo $userId;
            header("Location: home.php?userId=$userId");// Redirect to home.php
            exit();
            // pass the id to this page 
            //echo "<script>location.href='home.php'</script>";
        }else {
            echo "<script>alert('Not Valid user')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
    else {
        echo "<script>alert('Not Valid user')</script>";
        echo "<script>location.href='login.php'</script>";
    }
    
} else {
    echo "<script>alert('User not Found')</script>";
    echo "<script>location.href='login.php'</script>";
}
