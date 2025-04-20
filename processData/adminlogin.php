<?php
session_start();
include_once '../config/db.php';

$userID     =   trim($_POST['userID']);
$password   =   trim($_POST['password']);

$query = mysqli_query($con,"SELECT * FROM `member` WHERE userID='$userID'");
if(mysqli_num_rows($query)>0){
$memberData = mysqli_fetch_assoc($query);
$hash = $memberData['password'];

if (password_verify($password, $hash)) {
    $userlog=TRUE;
    //echo 'Password is valid!';
    $data = [
        'status' => 'success',
        'message' => 'User Logged In successfully!'
    ];
   $_SESSION['memberid'] = $memberData['id'];
   $_SESSION['membername'] = $memberData['name'];

} else {
    $userlog=FALSE;
   // echo 'Invalid password.';
   $data = [
    'status' => 'error',
    'message' => 'admin Userid OR Password mismatch'
];
}
}else{$userlog=FALSE;
    $data = [
        'status' => 'error',
        'message' =>'admin User Not Found '
    ];
}
//    $data = [
//         'status' => 'success',
//         'message' => $userlog.'User Logged In successfully!'
//     ];

echo json_encode($data);

?>