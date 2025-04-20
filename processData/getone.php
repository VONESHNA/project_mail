<?php
session_start();
include_once '../config/db.php';
$userid =   $_SESSION['userid'];
$query= mysqli_query($con,"SELECT * FROM `users` WHERE id='$userid'");
$user=mysqli_fetch_assoc($query);
$data['userData']=$user;
echo json_encode($data);

?>