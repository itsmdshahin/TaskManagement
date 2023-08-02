
<?php

include './config.php';

$userId = $_GET['userId'];


if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $Select_Query_profile = "SELECT * FROM `register` WHERE id='$userId'";
    $Select_Query_profile_result = mysqli_query($conn, $Select_Query_profile);
    if ($Select_Query_profile_result) {
        if ($row = mysqli_fetch_array($Select_Query_profile_result)) {
            // $Names = $row['name'];
            // $Emails = $row['image'];
            $Images = $row['image'];
        } else {
            echo "No recent logins found.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>  

<?php
include './config.php';

// $mId = $_GET['userId'];

// echo $userId;
$name = $_POST['name'];
$email = $_POST['email'];
$title = $_POST['title'];
$bio = $_POST['bio'];
$description = $_POST['description'];
$subject = $_POST['subject'];
$skill = $_POST['skill'];
$exprience = $_POST['exprience'];
$imageFiles = $_FILES['image'];

// Access file properties
$tmpFilePath = $imageFiles['tmp_name'];
$fileName = $imageFiles['name'];
$fileSize = $imageFiles['size'];
$fileType = $imageFiles['type'];

// Move uploaded file to desired location
$destination = 'image/' . $fileName;
$maxFileSize = 2 * 1024 * 1024; // 2MB
$allowedExtensionsRegex = '/\.(jpg|jpeg|png|gif)$/i';


$Insert_Query = "INSERT INTO `tasklist` (name, email, subject, des, title) VALUES ('$name','$email','$subject','$description','$title')";
if (mysqli_query($conn, $Insert_Query)) {
    echo "<script>alert('Successfully inserted connection.')</script>";
    //    move_uploaded_file($tmpFilePath, $destination);
    echo "<script>location.href = './home.php?userId=$userId'</script>";
} else {
    echo "Error: " . mysqli_error($conn);
    echo "<pre>";
    print_r(mysqli_query($conn, $Insert_Query));
    echo "</pre>";
}
?>  