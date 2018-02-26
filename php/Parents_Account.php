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
  	if($_COOKIE["parents_userid"]){
  	 			$conn = new mysqli("localhost","jzh136","DyTP6ia2");
   	 			if ($conn->connect_error){
				 	die("Connection failed:". mysql_error());
				}
				else{
					$sql="USE jzh136;";
				 	if ($conn->query($sql)===TRUE) {
						  $userid=$_COOKIE['parents_userid'];
						  $query="select * from Parents, Userdb where P_ID=User_ID and P_ID='$userid';";
						  $result=$conn->query($query);
						  $row=$result->fetch_assoc();
						  if ($row) {
							echo 'User Name: <span class="usertext" id="username">'.$row['User_name'].'</span></br>';
							echo 'User ID: <span class="usertext" id="userid">'.$row['P_ID'].'</span></br>';
							echo 'Father Name: <span class="usertext" id="fathername">'.$row['F_name'].'</span></br>';
							echo 'Mother Name: <span class="usertext" id="mothername">'.$row['M_name'].'</span></br>';
							echo 'Father Email: <span class="usertext" id="fatheremail">'.$row['F_email'].'</span></br>';
							echo 'Mother Email: <span class="usertext" id="motheremail">'.$row['M_email'].'</span></br>';
							echo 'Father Phone: <span class="usertext" id="fatherphone">'.$row['F_PN'].'</span></br>';
							echo 'Mother Phone: <span class="usertext" id="motherphone">'.$row['M_PN'].'</span></br>';
							echo 'Home Address: <span class="usertext" id="address">'.$row['Addr'].'</span></br>';
						}
				 	}
				 	else{ echo "Error using database";}
				} 
   			}
   	?>
   	</form>		
  </body>
 </html>	