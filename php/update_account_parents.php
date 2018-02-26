<?php
require_once('db_setup.php');
$sql = "USE jzh136";
$conn->query($sql);

$username = $_POST['username'];
$fathername = $_POST['fathername'];
$mothername = $_POST['mothername'];
$fatherphone = $_POST['fatherphone'];
$motherphone = $_POST['motherphone'];
$fatheremail=$_POST['fatheremail'];
$motheremail=$_POST['motheremail'];
$address=$_POST['address'];
$id = $_COOKIE['parents_userid'];
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

if($fathername){
    $sql = "update Parents set F_name ='$fathername' where P_ID = '$id';";
    $conn->query($sql);
}

if($mothername){
    $sql = "update Parents set M_name ='$mothername' where P_ID = '$id';";
    $conn->query($sql);
}

if($fatherphone){
    $sql = "update Parents set F_PN ='$fatherphone' where P_ID = '$id';";
    $conn->query($sql);
}

if($moherphone){
    $sql = "update Parents set M_PN ='$motherphone' where P_ID = '$id';";
    $conn->query($sql);
}

if($fatheremail){
    $sql = "update Parents set F_email ='$fatheremail' where P_ID = '$id';";
    $conn->query($sql);
}

if($motheremail){
    $sql = "update Parents set M_email ='$motheremail' where P_ID = '$id';";
    $conn->query($sql);
}

if($address){
    $sql = "update Parents set Addr ='$address' where P_ID = '$id';";
    $conn->query($sql);
}
header("Location: Parents_Userinfo.php");
?>
