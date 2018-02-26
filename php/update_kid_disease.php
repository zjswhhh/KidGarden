<!DOCTYPE html>
<html>
	<head>
    	<meta charset = "UTF-8">
    	<meta name="keywords" content="Child, health, analysis">
    	<meta name="description" content="data about kids' health">
    	<meta name="author" content="Jing Zhang & Fengxiang Lan">
    	<meta name="generator" content="Sublime Text">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
    	<link rel="stylesheet" type="text/css" href="../css/update_kid_meal.css">
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
    require_once('db_setup.php');
    $sql="USE jzh136;";
    if($conn->query($sql)===FALSE){echo "Error using database".$conn->error;} 
    $id=$_POST['kidsID'];
    $sql="SELECT * FROM Medical_History, Kid_basicINFO WHERE Medical_History.Kid_ID='$id' AND Medical_History.Kid_ID=Kid_basicINFO.Kid_ID;";
    $result=$conn->query($sql);
    if($result->num_rows>0){
?>
    <div class="result">
        <form action="select_kid_disease.php" method="POST">
            <select name="diseasename">
<?php
    while($row=$result->fetch_assoc()){
        setcookie('disease_kidID',$row['Kid_ID']);
?>        
        <option value="<?php echo htmlspecialchars($row['Disease_Name'])?>"><?php echo $row['Disease_Name']?></option>
<?php
    }
?>
        <input type="submit" value="select">
        </form> 
    </div>
<?php
    }
    else{
?>
    <div class="result">
        <p>
<?php
    echo "No such record!!!!";
?>
        </p>
    </div>
<?php
    }
?>
    </div>
</body>
</html>

