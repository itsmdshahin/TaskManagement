<?php
include 'config.php';

$id = $_POST['id'];
$name = $_POST['u_name'];
$email = $_POST['u_email'];
$username = $_POST['u_username'];
$mobile = $_POST['u_mobile'];
$password = $_POST['u_password'];
// $image = $_FILES['u_image'];

$select_Query = "SELECT `image` FROM `register` WHERE id='$id'";
$select_Query_result = mysqli_query($conn, $select_Query);
$result = mysqli_fetch_array($select_Query_result);
$imageN = $result['image'];
$previousImage = $result['image'];
// echo "<pre>";
// echo "$imageN";
// echo "</pre>";
echo $id." ".$name." ".$email." ".$username." ".$mobile." ".$password." ";

if(empty($username)){
    echo "<script>alert('Please fill-up the username')</script>";
    echo "<script>location.href='home.php?userId=$id'</script>";
}
else if ($name === '' || $email === '' || $username === '' || $mobile === '' || $password === '' ) {
    echo "<script>alert('Please fill-up the from')</script>";
    echo "<script>location.href='home.php?userId=$id'</script>";
}//else echo "CODE IS DONE!";
else if($result){
    $imageLocation = $_FILES['u_image']['tmp_name'];
    $imageName = basename($_FILES['u_image']['name']);
    $imageSize = $_FILES['u_image']['size'];
    $imageDestination = "image/" . $imageName;
    $maxFileSize = 2 * 1024 * 1024; // 2MB
    $allowedExtensionsRegex = '/\.(jpg|jpeg|png|gif)$/i';
    echo $imageDestination." ".$imageLocation;
    //$update_query = "UPDATE `register` SET `name`='$name',`image`='$imageDestination',`email`='$email',`password`='$password',`mobile`='$mobile',`username`='$username' WHERE id = '$id'";
    echo "INSIDE THE RESULT";
    if($imageSize == 0){
        $update_query = "UPDATE `register` SET `name`='$name',`email`='$email',`password`='$password',`mobile`='$mobile',`username`='$username' WHERE id = '$id'";
        echo "INSIDE THE IMAGE SIZE WHERE 0 <br>.";
        if (mysqli_query($conn, $update_query)) {
            //echo "<script>alert('Successfully Insert connection.')</script>";
            echo "INSIDE THE QUERY OK  0 <br>.";
            move_uploaded_file($imageLocation, $imageDestination);
            echo "<script>alert('Successfully Insert.')</script>";
            echo "<script>location.href = 'profile.php?userId=$id'</script>";
        } else {
            echo "<script>alert('Failed to update the profile.')</script>";
            echo "<script>location.href = 'profile.php?userId=$id'</script>";
        }                           

    }
    else{
        $update_query = "UPDATE `register` SET `name`='$name',`image`='$imageDestination',`email`='$email',`password`='$password',`mobile`='$mobile',`username`='$username' WHERE id = '$id'";
         // Delete previous image
        
         if ($imageSize <= $maxFileSize && preg_match($allowedExtensionsRegex, $imageName)) {
        
            if (mysqli_query($conn, $update_query)) {
                //echo "<script>alert('Successfully Insert connection.')</script>";
                move_uploaded_file($imageLocation, $imageDestination);
                if (!empty($previousImage) && file_exists($previousImage)) {
                    unlink($previousImage);
                 }
                echo "<script>alert('Successfully Insert.')</script>";
                echo "<script>location.href = 'profile.php?userId=$id'</script>";
            } else {
                echo "<script>alert('Failed to update the profile.')</script>";
                echo "<script>location.href = 'profile.php?userId=$id'</script>";
            }
        }
        else{
            echo "<script>alert('Invlid file! please add jpg,png formate.')</script>";
                echo "<script>location.href = 'profile.php?userId=$id'</script>";
        }
        
    }
}
else{
    echo "USER NOT VALID! PLEASE LOG-IN";
    echo "<script>location.href='login.php'</script>";
}


//$update_query = "UPDATE `register` SET `name`='$name',`image`='$image',`email`='$email',`password`='$password',`mobile`='$mobile',`username`='$username' WHERE 1"
