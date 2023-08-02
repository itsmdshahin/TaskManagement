<?php

$name = $_POST['p_name'];
$email = $_POST['p_email'];
$subject = $_POST['p_subject'];
$skill = $_POST['p_skill'];
$experience = $_POST['p_experience'];
$from = $_POST['p_from'];
$image = $_FILES['u_image'];
$Description = $_POST['p_venue'];
// Access file properties
$tmpFilePath = $image['tmp_name'];
$fileName = $image['name'];
$fileSize = $image['size'];
$fileType = $image['type'];
// Move uploaded file to desired location
$destination = 'image/' . $fileName;
move_uploaded_file($tmpFilePath, $destination);

echo $name . " " . $Description . " " . $email . " " . $subject . " " . $skill . " " . $experience . "<br>";
echo $from . " " . $destination;
