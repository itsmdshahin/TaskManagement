<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Online Tutior</title>
</head>

<body>

    <div class="navbar">
        <div class="header-logo">
            <a href='./index.php'>
                <h1>Task Managment System</h1>
            </a>
        </div>
        <div class="header-menu">
            <ul>
                <li> <a href="./"> Home </a> </li>
                <li> <a href="./components/login.php"> Login </a> </li>
                <li> <a href="./components/registration.php"> Register</a> </li>
            </ul>
        </div>
    </div>

    <div id="container">
        <h1>Registration</h1>

        <form action="regiserAction.php" method="post">
            <div class="md-3 lg-6 sm-12">
                <label>Full Name: </label>
                <input type="text" name="uname" id="iname" placeholder="Full Name">
                <br>
            </div>
            <div class="md-3 lg-6 sm-12">
                <br>
                <label>User name : </label>
                <input type="text" name="uusername" id="iusername" placeholder="Shahin_123" require>
                <span id="gettheerroruser"></span>
            </div>
            <div class="md-3 lg-6 sm-12">
                <br>
                <label>Email : </label>
                <input type="email" name="uemail" id="iemail" placeholder="email" require>
                <span id="gettheerroremail"></span>
            </div>
            <div class="md-3 lg-6 sm-12">
                <br>
                <label>Password : </label>
                <input type="password" name="upassword" id="ipassword" placeholder="password" require>
                <span id="gettheerrorpass"></span>
            </div>
            <div class="md-3 lg-6 sm-12">
                <br>
                <label>Re-Password : </label>
                <input type="password" name="urpassword" id="irpassword" placeholder="password" require>
                <span id="gettheerrorrepass"></span>
            </div>
            <div class="md-3 lg-6 sm-12">
                <br>
                <label>Mobile : </label>
                <input type="text" name="umobile" id="imobile" placeholder="+8801717122334">

            </div>
            <br>
            <span id="gettheerrorr"></span>
            <button type="submit" value="submit" class="btn btn-primary">Register</button>
        </form>
        <p>Already register <a href="./login.php">Log In</a></p>



    </div>
    <div class="fotter-col">
        <p> All Copyright &copy; 2023 </p>
    </div>
    <script src="../assets/script.js"></script>
</body>

</html>