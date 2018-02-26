<?php
require_once('db_setup.php');
$sql = "USE jzh136";
$conn->query($sql);
$id=$_COOKIE['kidsID'];

$kidname=$_POST['kidname'];
$classid=$_POST['classid'];
$gender=$_POST['gender'];
$birthday=$_POST['birthday'];
$entertime=$_POST['entertime'];
$graduatetime=$_POST['graduatetime'];
$bim=$_POST['bim'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$lefteye=$_POST['lefteye'];
$righteye=$_POST['righteye'];
$leftear=$_POST['leftear'];
$rightear=$_POST['rightear'];


if($conn->query($sql)===TRUE){

} 

if ($kidname) {
	$sql = "update Kid_basicINFO set Kid_name ='$kidname' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($classid) {
	$sql = "update Kid_basicINFO set Class_ID ='$classid' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($gender) {
	$sql = "update Kid_basicINFO set Gender ='$gender' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($birthday) {
	$sql = "update Kid_basicINFO set Birth ='$birthday' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($entertime) {
	$sql = "update Kid_basicINFO set Enter_T ='$entertime' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($graduatetime) {
	$sql = "update Kid_basicINFO set Grad_T='$graduatetime' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($bim) {
	$sql = "update Kid_Physical set BIM ='$bim' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($height) {
	$sql = "update Kid_Physical set Height ='$height' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($weight) {
	$sql = "update Kid_Physical set Weight ='$weight' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($lefteye) {
	$sql = "update Kid_Physical set L_Vision ='$lefteye' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($righteye) {
	$sql = "update Kid_Physical set R_Vision ='$righteye' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($leftear) {
	$sql = "update Kid_Physical set L_Audition ='$leftear' where Kid_ID = '$id';";
    $conn->query($sql);
}

if ($rightear) {
	$sql = "update Kid_Physical set R_Audition ='$rightear' where Kid_ID = '$id';";
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
        $sql="SELECT * FROM Kid_basicINFO,Kid_Physical WHERE Kid_basicINFO.Kid_ID='$id' and Kid_basicINFO.Kid_ID=Kid_Physical.Kid_ID;";
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
              Class ID:
              <span><?php echo $row['Class_ID'];?></span>
            </div>
            <div>
              Gender:
              <span><?php echo $row['Gender'];?></span>
            </div>
            <div>
              Birthdday:
              <span><?php echo $row['Birth'];?></span>
            </div>
            <div>
              Enter Time:
              <span><?php echo $row['Enter_T'];?></span>
            </div>
            <div>
              Graduate Time:
              <span><?php echo $row['Grad_T'];?></span>
            </div>
            <div>
              BMI:
              <span><?php echo $row['BIM'];?></span>
            </div>
            <div>
              Height:
              <span><?php echo $row['Height'];?></span>
            </div>
            <div>
              Weight:
              <span><?php echo $row['Weight'];?></span>
            </div>
            <div>
              Left Eye:
              <span><?php echo $row['L_Vision'];?></span>
            </div>
            <div>
              Right Eye:
              <span><?php echo $row['R_Vision'];?></span>
            </div>
            <div>
              Left Ear:
              <span><?php echo $row['L_Audition'];?></span>
            </div>
            <div>
              Right Ear:
              <span><?php echo $row['R_Audition'];?></span>
            </div>           
         </div>
<?php
        }
?>  
        </div>
    </body> 
</html>