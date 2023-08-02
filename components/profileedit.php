<?php

include './config.php';


//$select_Query = "SELECT * FROM `register`";
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    // echo $userId;
    $select_Query = "SELECT * FROM `register` WHERE id='$userId'";
    $select_Query_Result = mysqli_query($conn, $select_Query);
    if ($select_Query_Result) {
        if ($row = mysqli_fetch_array($select_Query_Result)) {
            $name = $row['name'];
            $image = $row['image'];
            $email = $row['email'];
            $username = $row['username'];
            $mobile = $row['mobile'];

            // echo "Name: $name<br>";
            // echo "Image: $image<br>";
            // echo "Email: $email<br>";
            // echo "Username: $username<br>";
            // echo "Mobile: $mobile<br>";
        } else {
            echo "No recent logins found.";
            echo "<script>location.href = 'login.php'</script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        echo "<script>location.href = 'login.php'</script>";
    }
} else {
    echo "Error: " . mysqli_error($conn);
    echo "<script>location.href = 'login.php'</script>";
}



?>


<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
    <link rel='stylesheet' href='../assets/css/bodys.css'>
    <title>Task Managment System</title>
</head>

<body>

    <div class='container'>
        <div class='navbar'>
            <div class='header-logo'>
                <a href='./home.php?userId=<?php echo $userId ?>'>
                    <h1>Task Management System</h1>
                </a>
            </div>
            <div class='header-menu'>
                <ul>
                    <li> <a href='./home.php?userId=<?php echo $userId ?>'> Home </a> </li>
                    <li> <a href='./Teacher.php?userId=<?php echo $userId ?>'> Teacher </a> </li>
                    <li> <a href='./skill.php?userId=<?php echo $userId ?>'> Skills </a> </li>
                    <li><a href='./profile.php?userId=<?php echo $userId ?>'>Profile</a></li>
                    <li> <a href='./logout.php'> Logout</a> </li>
                </ul>
            </div>
        </div>

        <form action='profileAction.php' method='post' enctype='multipart/form-data'>
            <div class="md-3 lg-6 sm-12">
                <h4>Edit Profile </h4>
            </div>
            <div class="md-3 lg-6 sm-12">
                <label>Change Profile: </label>
                <input type="file" id="u_image" name="u_image" value="<?php echo $row['image'] ?>">
                <br>
            </div>
            <div class="md-3 lg-6 sm-12">
                <label>Image: </label>
                <img id="preview_image" width="100px" src="<?php echo $row['image'] ?>" alt="Photo">
                <br>
            </div>
            <div class="md-3 lg-6 sm-12">
                <label>Name: </label>
                <input type="text" name="u_name" value="<?php echo $row['name'] ?>">
                <br>
            </div>
            <div class="md-3 lg-6 sm-12">
                <label>Email: </label>
                <input type="text" name="u_email" value="<?php echo $row['email'] ?>">
                <br>
            </div>
            <div class="md-3 lg-6 sm-12">
                <label>Username: </label>
                <input type="text" name="u_username" value="<?php echo $row['username'] ?>">
                <br>
            </div>
            <div class="md-3 lg-6 sm-12">
                <label>Password: </label>
                <input type="text" name="u_password" value="<?php echo $row['password'] ?>">
                <br>
            </div>
            <div class="md-3 lg-6 sm-12">
                <label>Mobile: </label>
                <input type="text" name="u_mobile" value="<?php echo $row['mobile'] ?>">
                <br>
            </div>

            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <br>
            <button type="Login" value="Login" class="btn btn-primary">UPDATE</button>
        </form>

        <div class='fotter-col'>
            <p> All Copyright &copy; 2023 </p>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#u_image').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>

</body>

</html>