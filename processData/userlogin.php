<?php
session_start();
include_once '../config/db.php';

$userID     =   trim($_POST['userID']);
$password   =   trim($_POST['password']);

$query = mysqli_query($con,"SELECT * FROM `users` WHERE email='$userID' AND verification=1");
if(mysqli_num_rows($query)>0){
$userData = mysqli_fetch_assoc($query);
$hash = $userData['password'];

if (password_verify($password, $hash)) {
    $userlog=TRUE;
    //echo 'Password is valid!';
    $data = [
        'status' => 'success',
        'message' => 'User Logged In successfully!'
    ];
   $_SESSION['userid'] = $userData['id'];
   $_SESSION['username'] = $userData['name'];
$_SESSION['userpic'] = $userData['pic'];
} else {
    $userlog=FALSE;
   // echo 'Invalid password.';
   $data = [
    'status' => 'error',
    'message' => 'Userid OR Password mismatch'
];
}
}else{$userlog=FALSE;
    $data = [
        'status' => 'error',
        'message' =>'User Not Found OR Not Verified'
    ];
}
//    $data = [
//         'status' => 'success',
//         'message' => $userlog.'User Logged In successfully!'
//     ];

echo json_encode($data);

?>