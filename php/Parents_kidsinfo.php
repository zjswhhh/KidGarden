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
						  $query="SELECT * from Kid_basicINFO, Kid_Physical where Kid_basicINFO.Kid_ID=Kid_Physical.Kid_ID and P_ID='$userid';";
						  $result=$conn->query($query);
						  if($result->num_rows){
						  while ($row=$result->fetch_assoc()) {
							echo 'Kid Name: <span class="usertext" id="kidname">'.$row['Kid_name'].'</span></br>';
							echo 'Kid ID: <span class="usertext" id="kidid">'.$row['Kid_ID'].'</span></br>';
							echo 'Class ID: <span class="usertext" id="classid">'.$row['Class_ID'].'</span></br>';
							echo 'Gender: <span class="usertext" id="gender">'.$row['Gender'].'</span></br>';
							echo 'Birthday: <span class="usertext" id="birthday">'.$row['Birth'].'</span></br>';
							echo 'Enter Time: <span class="usertext" id="entertime">'.$row['Enter_T'].'</span></br>';
							echo 'Graduate Time: <span class="usertext" id="graduatetime">'.$row['Grad_T'].'</span></br>';
							echo 'BMI: <span class="usertext" id="bmi">'.$row['BIM'].'</span></br>';
							echo 'Height: <span class="usertext" id="height">'.$row['Height'].'</span></br>';
							echo 'Weight: <span class="usertext" id="weight">'.$row['Weight'].'</span></br>';
							echo 'Left Eye: <span class="usertext" id="lefteye">'.$row['L_Vision'].'</span></br>';
							echo 'Right Eye: <span class="usertext" id="righteye">'.$row['R_Vision'].'</span></br>';
							echo 'Left Ear: <span class="usertext" id="leftear">'.$row['L_Audition'].'</span></br>';
							echo 'Right Ear: <span class="usertext" id="rightear">'.$row['R_Audition'].'</span></br></br>';
							echo "----------------------------------------------------------------------";
							echo "</br>";

						}
					}
				 	}
				 	else{ echo "Error using database";}
				} 
   			}
   	?>
   	</form>		
  </body>
 </html>