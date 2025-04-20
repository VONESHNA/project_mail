<?php
include_once '../config/db.php';

$query= mysqli_query($con,"SELECT * FROM `users` ORDER BY id DESC");
while($r=mysqli_fetch_assoc($query)){$users[]=$r;}
$data['userData']=$users;
echo json_encode($data);

?>