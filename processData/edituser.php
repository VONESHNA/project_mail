<?php
session_start();
include_once '../config/db.php';
$userid =   $_SESSION['userid'];
$uploadDir='../uploads/';
$file = $_FILES['pic'];
			$fileName = $file['name'];
			$fileTmpPath = $file['tmp_name'];
			$fileSize = $file['size'];
			$fileError = $file['error'];
$name=$_POST['fullName'];
$mobNo=$_POST['mobNo'];
$emailID=$_POST['emailID'];
$password=$_POST['password'];
$hash=password_hash($password, PASSWORD_BCRYPT); 
move_uploaded_file($fileTmpPath,$uploadDir.$fileName);
$fileName!=''?mysqli_query($con,"UPDATE `users` SET `pic`='$fileName' WHERE `id`='$userid' AND `verification`=1")
:'';
$password!=''?mysqli_query($con,"UPDATE `users` SET `password`='$hash' WHERE `id`='$userid' AND `verification`=1")
:'';
mysqli_query($con,"UPDATE `users` SET `name`='$name', `mobno`='$mobNo', `email`='$emailID' WHERE `id`='$userid' AND `verification`=1");
$data = [
    'status' => 'success',
    'message' => 'User updated successfully!'
];

echo json_encode($data);

?>