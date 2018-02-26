<?php
require_once('db_setup.php');
$sql = "USE jzh136";
$conn->query($sql);

$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$id = $_COOKIE['userid'];
//echo $email;
//echo $phone;
    
    
require_once('db_setup.php');
$sql = "USE jzh136;";
if($conn->query($sql)===TRUE){
//	echo "Connected!";
}

if($username){
    $sql = "update Userdb set User_name ='$username' where User_ID = '$id';";
    $conn->query($sql);
}
if($email){
    $sql = "update Teacher set T_email='$email' where T_ID = '$id';";
    $conn->query($sql);
}

if($phone){
    $sql = "update Teacher set T_PN='$phone' where T_ID = '$id';";
    $conn->query($sql);
}

if($gender){
    $sql = "update Teacher set Gender='$gender' where T_ID = '$id';";
    $conn->query($sql);
}

header("Location: userinfo.php");
?>
