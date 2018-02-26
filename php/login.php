<?php
$conn = new mysqli("localhost", "jzh136","DyTP6ia2"); 

if ($conn->connect_error){
	die("Connection failed:". mysql_error());
}
else{
	$sql="USE jzh136;"; 
	if ($conn->query($sql)===True){
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		$query ="select User_ID, Password,Type_ID from Userdb where User_ID = '$userid' and Password = '$password';";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		if($row){
			if($row['User_ID']){
				if($row['Password']){
					if($row['Type_ID']==1){
						setcookie("userid",$row['User_ID']);
						setcookie("password", $row['Password']);
						setcookie("typeid",$row['Type_ID']);
						header("location: ../index.html");
					}
					else{ 
						if($row['Type_ID']==2){
						setcookie("parents_userid",$row['User_ID']);
						setcookie("parents_password", $row['Password']);
						setcookie("parents_typeid",$row['Type_ID']);
						header("location: ../index2.html");
						}else{
							
						}
					}
				}
				else{ echo "Password is wrong";}
			}
			else{ echo "User not exists";}
		}
		else{ echo "Wrong Username or Password..."; header('Refresh: 2; url=../login.html');}
	}
	else{
		echo "Error using database:".mysql_error();
	}
}
?>
