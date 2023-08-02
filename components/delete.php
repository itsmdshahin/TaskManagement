<?php

include './config.php';

$userId = $_GET['userId'];
$mId = $_GET['mid'];


$delete_query = "DELETE FROM `tasklist` WHERE id='$mId'";
mysqli_query($conn, $delete_query);

header("location:home.php?userId=$userId");
