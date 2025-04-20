<?php
include_once '../config/db.php';
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

mysqli_query($con,"INSERT INTO `users`(`name`, `mobno`, `email`, `pic`,`password`) 
VALUES ('$name','$mobNo','$emailID','$fileName','$hash')");

$data = [
    'status' => 'success',
    'message' => 'User Registered successfully!'
];

echo json_encode($data);




?>



