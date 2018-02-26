<!DOCTYPE html>
<html>
  <head>
    <title>Child Life Database System</title>
    <meta charset = "UTF-8">
    <meta name="keywords" content="Child, health, analysis">
    <meta name="description" content="data about kids' health">
    <meta name="author" content="Jing Zhang & Fengxiang Lan">
    <meta name="generator" content="Sublime Text">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/useraccount.css">
  </head>
  <body>
  	<form>
  	<?php
  	if($_COOKIE["userid"]){
  	 			$conn = new mysqli("localhost","jzh136","DyTP6ia2");
   	 			if ($conn->connect_error){
				 	die("Connection failed:". mysql_error());
				}
				else{
					$sql="USE jzh136;";
				 	if ($conn->query($sql)===TRUE) {
						  $userid=$_COOKIE['userid'];
						  $query="select * from Teacher, Userdb where T_ID=User_ID and T_ID='$userid';";
						  $result=$conn->query($query);
						  $row=$result->fetch_assoc();
						  if ($row) {
							echo 'User Name: <span class="usertext" id="username">'.$row['User_name'].'</span></br>';
							echo 'User ID: <span class="usertext" id="userid">'.$row['T_ID'].'</span></br>';
							echo 'Teacher Name: <span class="usertext" id="teachername">'.$row['T_name'].'</span></br>';
							echo 'Gender: <span class="usertext" id="gender">'.$row['Gender'].'</span></br>';
							echo 'Age: <span class="usertext" id="age">'.$row['Age'].'</span></br>';
							echo 'Teacher Email: <span class="usertext" id="teacheremail">'.$row['T_email'].'</span></br>';
							echo 'Teacher Phone: <span class="usertext" id="teacherphone">'.$row['T_PN'].'</span></br>';
							echo 'Class ID: <span class="usertext" id="classid">'.$row['Class_ID'].'</span></br>';
						}
				 	}
				 	else{ echo "Error using database";}
				} 
   			}
   	?>
   	</form>		
  </body>
 </html>	