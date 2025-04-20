<?php
session_start();
include_once '../config/db.php';

$query= mysqli_query($con,"SELECT * FROM `users` WHERE verification=0");
$newUserCount=mysqli_num_rows($query);

$query= mysqli_query($con,"SELECT * FROM `users` WHERE verification=1");
$verifiedUserCount=mysqli_num_rows($query);

$query= mysqli_query($con,"SELECT * FROM `users` WHERE verification=2");
$rejectedUserCount=mysqli_num_rows($query);
$data['userCount']=['status'=>'success','newUserCount'=>$newUserCount,'verifiedUserCount'=>$verifiedUserCount,'rejectedUserCount'=>$rejectedUserCount];
echo json_encode($data);

?>