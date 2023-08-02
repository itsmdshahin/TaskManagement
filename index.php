<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/bodys.css">
    <title>Task Management System</title>
</head>

<body>

    <div class="container">
        <div class="navbar">
            <div class="header-logo">
                <a href='./index.php'>
                    <h1>Task Management System</h1>
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


        <div>
            <h2> All Task </h2>
        </div>
        <div class="bodyss">
            <?php
            include './components/config.php';
            $all_query = "SELECT * FROM `tasklist`";
            $alldata = mysqli_query($conn, $all_query);
            echo "<div class='containers'>";
            while ($row = mysqli_fetch_array($alldata)) {
                echo "
       
            <div class='cards'> 
                <div class='card-bodys'>
                    <h4>
                        $row[title]
                    </h4>
                    <p>
                        $row[des]
                    </p>
                    <div class='users'>
                        <div class='user-infos'>
                            <h5>$row[name]</h5>
                            <small>2h ago</small>
                        </div>
                    </div>
                </div>
            </div>";
            }
            echo "</div>";
            ?>
        </div>

        <div class="row">
            <h3 style="color: blue; font-size: 30px;">Contact Us</h3>

            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="txtName" class="form-control" placeholder="Your Name " value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="txtEmail" class="form-control" placeholder="Your Email " value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number " value="" />
                </div>

                <a class="btn btn-primary" style="margin-right: 30px;" href="index.php">
                    Send
                </a>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                </div>
                 
            </div>
              
        </div>

        <div class="fotter-col">
            <p> All Copyright &copy; 2023 by itsmdshahin </p>
        </div>

    </div>


</body>

</html>