<?php
require_once('db_setup.php');
$sql = "USE jzh136";
$conn->query($sql);
$id=$_COOKIE['meal_kidID'];
$date=$_COOKIE['meal_date'];
$type=$_COOKIE['meal_type'];

$veg=$_POST['veg'];
$meat=$_POST['meat'];
$grain=$_POST['grain'];
$protein=$_POST['protein'];


if($conn->query($sql)===TRUE){

} 

if ($veg) {
	$sql = "UPDATE Meal_Nutrit set Veg ='$veg' where Kid_ID = '$id'and Meal_Date='$date' and Meal_Type='$type';";
    $conn->query($sql);
}

if ($meat) {
	$sql = "UPDATE Meal_Nutrit set Meat ='$meat' where Kid_ID = '$id'and Meal_Date='$date' and Meal_Type='$type';";
    $conn->query($sql);
}

if ($grain) {
	$sql = "UPDATE Meal_Nutrit set Grain ='$grain' where Kid_ID = '$id'and Meal_Date='$date' and Meal_Type='$type';";
    $conn->query($sql);
}

if ($protein) {
	$sql = "UPDATE Meal_Nutrit set Protein ='$protein' where Kid_ID = '$id'and Meal_Date='$date' and Meal_Type='$type';";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name="keywords" content="Child, health, analysis">
        <meta name="description" content="data about kids' health">
        <meta name="author" content="Fengxiang Lan">
        <meta name="generator" content="Sublime Text">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">   
        <link rel="stylesheet" type="text/css" href="../css/submit_parents.css">
    </head>
    <body>
        <div class="main">
        <nav class="menu">
          <ul>
            <li><a class="Parents" href="update_parents.html">Update Parents</a></li>
            <li><a class="Kid" href="update_kid.html">Update Kid</a></li>
            <li><a class="Kid" href="update_kid_meal.html">Update Kid Meal</a></li>
            <li><a class="Kid" href="update_kid_disease.html">Update Kid Disease</a></li>
          </ul>
        </nav>
        <br></br>
<?php 
	$sql="SELECT * FROM Meal_Nutrit WHERE Kid_ID='$id' and Meal_Type='$type' and Meal_Date='$date';";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    if ($row) {
?>
	<div class="result">
            <div>
              Kid ID:
              <span><?php echo $row['Kid_ID'];?></span>
            </div> 
            <div>
              Kid Name:
              <span><?php echo $row['Kid_name'];?></span>
            </div>
            <div>
              Meal Date:
              <span><?php echo $row['Meal_Date'];?></span>
            </div>
            <div>
              Meal Type:
              <span><?php echo $row['Meal_Type'];?></span>
            </div>
            <div>
              Vegetable:
              <span><?php echo $row['Veg'];?></span>
            </div>
            <div>
              Meat:
              <span><?php echo $row['Meat'];?></span>
            </div>
            <div>
              Grain:
              <span><?php echo $row['Grain'];?></span>
            </div>
            <div>
              Protein:
              <span><?php echo $row['Protein'];?></span>
            </div>        
         </div>
<?php
	}
?>		
    </div>
    </body> 
</html>

