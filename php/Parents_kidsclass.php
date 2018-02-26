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
						  $query1="SELECT Kid_ID,Kid_name, Class_ID from Kid_basicINFO where P_ID='$userid';";
						  $result1=$conn->query($query1);
						  if($result1->num_rows){
						  	while($row1=$result1->fetch_assoc()){
						  		$Class_ID=$row1['Class_ID'];
						  		echo 'Kid ID: <span class="usertext" id="kidid">'.$row1['Kid_ID'].'</span></br>';
						  		echo 'Kid Name: <span class="usertext" id="kidname">'.$row1['Kid_name'].'</span></br>';
						  		echo 'Class ID:<span class="usertext" id="classid">'.$Class_ID.'</span></br>';
						  		$query2="SELECT * from Teacher WHERE Class_ID='$Class_ID';";
						  		$result2=$conn->query($query2);
						  		if ($result2->num_rows) {
						  			echo "-------------------------------------------------</br>";
						  			while ($row2=$result2->fetch_assoc()) {
						  				
						  				echo 'Teacher Name: <span class="usertext" id="teachername">'.$row2['T_name'].'</span></br></br>';
										echo 'Teacher Email: <span class="usertext" id="teachername">'.$row2['T_email'].'</span></br></br>';
										echo 'Teacher Phone: <span class="usertext" id="teachername">'.$row2['T_PN'].'</span>';
										echo "</br>-------------------------------------------------</br>";
						  			}
						  			echo "</br></br>";
						  		}
						  		
						  	}
						  	
						  }else{ echo "No kid record for this parents";}
				 	}
				 	else{ echo "Error using database";}
				} 
   			}
   	?>
   	</form>		
  </body>
 </html>