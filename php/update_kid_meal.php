<!DOCTYPE html>
<html>
	<head>
    	<meta charset = "UTF-8">
    	<meta name="keywords" content="Child, health, analysis">
    	<meta name="description" content="data about kids' health">
    	<meta name="author" content="Jing Zhang & Fengxiang Lan">
    	<meta name="generator" content="Sublime Text">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
    	<link rel="stylesheet" type="text/css" href="../css/update_parents.css">
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
    $id=($_POST['kidsID']);
    $date=($_POST['date']);
    $type=($_POST['type']);
    setcookie('meal_kidID',$id);
    setcookie('meal_date',$date);
    setcookie('meal_type',$type);
    $sql="SELECT * FROM Meal_Nutrit WHERE Kid_ID='$id' and Meal_Type='$type' and Meal_Date='$date';";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    if ($row) {   
?>

    <div class="result">
       <form action="submit_kid_meal.php" method="POST">
        <div>
            Kid ID:
            <span><?php echo $row['Kid_ID'];?></span>
        </div>
        <div>
            Meal Date:
            <span><?php echo $row['Meal_Date'];?></span>
        </div>
        <div>
            Meal Type:
            <span class="span"><?php echo $row['Meal_Type'];?></span>
        </div>
        <div>
            Vegetable:</br>
            <input type="text" name="veg" value="<?php echo htmlspecialchars($row['Veg'])?>" class="veg" id="veg" onfocus="if(value=='<?php echo htmlspecialchars($row["Veg"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Veg"])?>'}">
        </div>
        <div>
            Meat:</br>
            <input type="text" name="meat" value="<?php echo htmlspecialchars($row['Meat'])?>" class="meat" id="meat" onfocus="if(value=='<?php echo htmlspecialchars($row["Meat"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Meat"])?>'}">
        </div>
        <div>
            Grain:</br>
            <input type="text" name="grain" value="<?php echo htmlspecialchars($row['Grain'])?>" class="grain" id="grain" onfocus="if(value=='<?php echo htmlspecialchars($row["Grain"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Grain"])?>'}">
        </div>
        <div>
           Protein:</br>
            <input type="text" name="protein" value="<?php echo htmlspecialchars($row['Protein'])?>" class="protein" id="protein" onfocus="if(value=='<?php echo htmlspecialchars($row["Protein"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Protein"])?>'}">
        </div>
        <div>
            <input type="submit" name="update" value="UPDATE" class="update" id="update">
        </div> 
       </form> 
    </div>
<?php
    }
    else{
?>
    <div class="result">
        <p>
<?php
            echo "No such record!!!";
?>
        </p>
    </div>
<?php
    }
?>
    </div>
</body>
</html>