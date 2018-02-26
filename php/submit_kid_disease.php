<?php
require_once('db_setup.php');
$sql = "USE jzh136";
$conn->query($sql);
$id=$_COOKIE['disease_kidID'];
$diseasename=$_POST['diseasename'];

$date=$_POST['date'];
$medlist=$_POST['medlist'];

if ($conn->query($sql)===TRUE) {}
if ($date) {
	$sql="UPDATE Medical_History set Med_Date='$date' WHERE Kid_ID='$id' AND Disease_Name='$diseasename';";
	$conn->query($sql);
}

if ($medlist) {
	$sql="UPDATE Medical_History set Medicine_List='$medlist' WHERE Kid_ID='$id' AND Disease_Name='$diseasename';";
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
	$sql="SELECT * FROM Medical_History,Kid_basicINFO WHERE Medical_History.Kid_ID='$id' and Disease_Name='$diseasename' and Medical_History.Kid_ID=Kid_basicINFO.Kid_ID;";
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
            Disease Name:
            <span><?php echo $row['Disease_Name'];?></span>
        </div>
        <div>
            Date:
            <span><?php echo $row['Med_Date'];?></span>
        </div>
        <div>
            Medicine List:
            <span><?php echo $row['Medicine_List'];?></span>
        </div>
<?php
	}
?>
	</div>
	</div>
</body>
</html>
