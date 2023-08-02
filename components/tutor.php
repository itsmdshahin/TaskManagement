<?php

include './config.php';

session_start();

//$select_Query = "SELECT * FROM `register`";
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    //echo $userId;
    $_SESSION['userId'] = $userId;

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
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

?>


<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
    <link rel='stylesheet' href='../assets/css/style.css'>
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
                    <li> <a href='./tutor.php?userId=<?php echo $userId ?>'> ADD A TASK </a> </li>
                    <li><a href='./profile.php?userId=<?php echo $userId ?>'>Profile</a></li>
                    <li> <a href='./logout.php'> Logout</a> </li>
                </ul>
            </div>
        </div>

        <div class='containerforform'>
            <h1>ADD A TASK</h1>
            <form action="tutorAction.php?userId=<?php echo $userId ?>" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Name </label>
                    <input class="form-control" type="text" name="name" placeholder="MD SHAHINUR RAHMAN" require>
                    <br>
                </div>
                <div>
                    <label>Email </label>
                    <input class="form-control" type="email" name="email" placeholder="itsmdshahin@example.com" require>
                    <br>
                </div>
                <div>
                    <label>Title </label>
                    <input class="form-control" type="text" name="title" placeholder="I will be your tutor" require>
                    <br>
                </div>
                <div>
                    <label>Description </label>
                    <textarea class="form-control" name="description" placeholder="1000 word limit" required></textarea>
                    <br>
                </div>
                <div>
                    <label>Subject </label>
                    <input class="form-control" type="text" name="subject" placeholder="CSE" require>
                    <br>
                </div>
                <button type='submit' class='btn btn-primary'> Complete </button>
            </form>
        </div>


    </div>

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