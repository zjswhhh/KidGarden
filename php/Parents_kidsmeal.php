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
    <link rel="stylesheet" type="text/css" href="../css/Parents_kidsmeal.css">
  </head>
  <body>
  	<div class="main">
  	<form action="parent_meal_search.php" method="POST">
  	<?php
 	$userid=$_COOKIE['parents_userid'];
  	if($userid){
  	 			$conn = new mysqli("localhost","jzh136","DyTP6ia2");
   	 			if ($conn->connect_error){
				 	die("Connection failed:". mysql_error());
				}
				else{
					$sql="USE jzh136;";
				 	if ($conn->query($sql)===TRUE) {

	?>					 				
					<span>Kid ID:</span>
					<select name="Kid_ID">
					<option value=""></option>
				<?php
					$sql="select distinct Kid_ID from Kid_basicINFO where P_ID='$userid';";
					$result=$conn->query($sql);
					while ($row=$result->fetch_assoc()) {
				?>
					<option value="<?php echo $row['Kid_ID'];?>"><?php echo $row['Kid_ID'];?></option>
				<?php
					}
				?>
				</select><br><br><br>
				<input type="submit" name="submit">
		</form>
    	<?php
					}else{ echo "Error using database";}
				}
				
	}
	 
   		?>
   	</div>		
  </body>
 </html>