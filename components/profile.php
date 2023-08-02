<?php

session_start(); // Start the session

include './config.php';

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    // Store the userId in the session
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
    <title>TasK Managment System</title>
</head>

<body>

    <div class='container'>
        <div class='navbar'>
            <div class='header-logo'>
                <a href='./home.php?userId=<?php echo $userId ?>'>
                    <h1>TasK Management System</h1>
                </a>
            </div>
            <div class='header-menu'>
                <ul>
                    <li> <a href='./home.php?userId=<?php echo $userId ?>'> Home </a> </li>
                    <li> <a href='./tutor.php?userId=<?php echo $userId ?>'> Add a task </a> </li>
                    <li><a href='./profile.php?userId=<?php echo $userId ?>'>Profile</a></li>
                    <li> <a href='./logout.php'> Logout</a> </li>
                </ul>
            </div>
        </div>

        <div class="profile-div">
            <h3>Welcome to profile</h3>
            <img width='150px' src='<?php echo $image ?>' alt='Profile'>
            <h4>Name : <?php echo $name ?> <img width='20px' height='20px' src='./image/verified.png'> </h4>
            <h5>Email : <?php echo $email ?> </h5>
            <h5>Username : <?php echo $username ?> </h5>
            <h5>Mobile : <?php echo $mobile ?> </h5>
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5">
                <label for="star5"></label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4"></label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3"></label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2"></label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1"></label>
                5 Start <small>(100 Review)</small>
            </div>
            <button class="btn btn-primary?"> <a href='./profileedit.php?userId= <?php echo $userId ?>'> EDIT PROFILE</a></button>
        </div>

        <div class="become-div">
            <h4 class='header-logo'>List of Task</h4>
            <h4 class='header-menu'> <a href="./tutor.php?userId= <?php echo $userId ?>"> Add a task</a> </h4>
        </div>
        <div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>title</th>
                        <th>bio</th>
                        <th>subject</th> 
                        <th>Update/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $alldata =  mysqli_query($conn, "SELECT * FROM `tasklist` WHERE email='$email' ");

                    while ($row = mysqli_fetch_array($alldata)) {
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[title]</td>
                            <td>$row[des]</td>
                            <td>$row[subject]</td> 
                            
                            <td>
                                <a class='btn btn-warning' href='update.php?userId=$userId&mid=$row[id]'> Update </a>
                                <br><br>
                                <a class='btn btn-danger' href='delete.php?userId=$userId&mid=$row[id]'> Delete </a>
                            </td>
                            
                        </tr>
                        ";
                    }
                    ?>

                </tbody>
            </table>

        </div>

        <div class='fotter-col'>
            <p> All Copyright &copy; 2023 </p>
        </div>

    </div>

</body>

</html>