<?php
include_once '../config/db.php';
$verifyID=$_POST['verifyID'];

mysqli_query($con,"UPDATE `users` SET `verification`=1 WHERE `id`='$verifyID'");
$data['verify']=['status'=>'success', 'message'=>'user verified'];
echo json_encode($data);
?>