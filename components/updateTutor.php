
<?php

include './config.php';

$userId = $_GET['userId'];
$mId = $_GET['mid'];


// echo $userId;  
$title = $_POST['title'];
$description = $_POST['description'];
$subject = $_POST['subject'];
// $skill = $_POST['skill'];
// $exprience = $_POST['exprience'];
// $imageFiles = $_FILES['image'];

// // Access file properties
// $tmpFilePath = $imageFiles['tmp_name'];
// $fileName = $imageFiles['name'];
// $fileSize = $imageFiles['size'];
// $fileType = $imageFiles['type'];

// // Move uploaded file to desired location
// $destination = 'image/' . $fileName;
// $maxFileSize = 2 * 1024 * 1024; // 2MB
// $allowedExtensionsRegex = '/\.(jpg|jpeg|png|gif)$/i';

// $Insert_Query = "INSERT INTO `tutorlist` (name, email, subject, skill, exprience, description, bio, title,level13,image) VALUES ('$name','$email','$subject','$skill','$exprience','$description','$bio','$title','$destination','$Images')";
$update_query = "UPDATE `tasklist` SET `subject`='$subject',`des`='$description',`title`='$title' WHERE id='$mId'";

if (mysqli_query($conn, $update_query)) {
    echo "<script>alert('Successfully inserted connection.')</script>";

    echo "<script>location.href = './home.php?userId=$userId'</script>";
} else {
    echo "<script>location.href = './update.php?userId=$userId'</script>";
}
