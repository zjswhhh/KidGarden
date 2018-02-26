<!DOCTYPE html>
<html>
	<head>
    	<meta charset = "UTF-8">
    	<meta name="keywords" content="Child, health, analysis">
    	<meta name="description" content="data about kids' health">
    	<meta name="author" content="Jing Zhang & Fengxiang Lan">
    	<meta name="generator" content="Sublime Text">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
    	<link rel="stylesheet" type="text/css" href="../css/update_kid_disease.css">
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
    $id=$_COOKIE['disease_kidID'];
    $diseasename=$_POST['diseasename'];
    $sql="SELECT * FROM Medical_History, Kid_basicINFO WHERE Medical_History.Kid_ID='$id' AND Disease_Name='$diseasename' AND Medical_History.Kid_ID=Kid_basicINFO.Kid_ID;";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
?>
    <div class="result">
        <form action="submit_kid_disease.php" method="POST">
            <div>
                Kid ID:
                <span><?php echo $id; ?></span>
            </div>
            <div>
                Kid Name:
                <span><?php echo $row['Kid_name']?></span>
            </div>
            <div>
                Disease Name:
                <input type="text" name="diseasename" value="<?php echo htmlspecialchars($row['Disease_Name']);?>" readonly="readonly" class="specical">
            </div>
            <div>
                Date:</br>
            <input type="text" name="date" value="<?php echo htmlspecialchars($row['Med_Date'])?>" class="date" id="date" onfocus="if(value=='<?php echo htmlspecialchars($row["Med_Date"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Med_Date"])?>'}">
            </div>
            <div>
                Medicine List:</br>
            <input type="text" name="medlist" value="<?php echo htmlspecialchars($row['Medicine_List'])?>" class="medlist" id="medlist">
            </div>
            <div>
            <input type="submit" name="update" value="UPDATE" class="update" id="update">
            </div> 
           </form>
    </div> 
</div>
</body>
</html>