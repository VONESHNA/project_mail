<?php
include_once '../config/db.php';

$rejectID=$_POST['rejectID'];
mysqli_query($con,"UPDATE `users` SET `verification`=2 WHERE `id`='$rejectID'");
$data['reject']=['status'=>'success', 'message'=>'user rejected'];
echo json_encode($data);
?>