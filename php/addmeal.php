<!DOCTYPE html>
<html>
	<head>
    	<meta charset = "UTF-8">
    	<meta name="keywords" content="Child, health, analysis">
    	<meta name="description" content="data about kids' health">
    	<meta name="author" content="Jing Zhang & Fengxiang Lan">
    	<meta name="generator" content="Sublime Text">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
    	<link rel="stylesheet" type="text/css" href="../css/add.css">
    </head>
    <body>
        <nav class="menu">
          <ul>
            <li><a class="Parents" href="adduser_forparents.html">Add Account</a></li>
            <li><a class="Parents" href="addparents.html">Add Parents</a></li>
            <li><a class="Nutritionists" href="adddisease.html">Add Disease</a></li>
            <li><a class="Kid" href="addkid.html">Add Kid</a></li>
            <li><a class="Kid" href="addkid_meal.php">Add Kid Meal</a></li>
            <li><a class="Kid" href="addkid_disease.php">Add Kid Disease</a></li>
          </ul>
        </nav>
        <br></br>
        <div class="result">
<?php
      require_once('db_setup.php');
      $sql = "USE jzh136;";
      if ($conn->query($sql) === TRUE) 
      {
          //echo "success";
      }
      else {echo "Error using  database: " . $conn->error;}

      $Kid_ID = $_POST['Kid_ID'];
      $Meal_Date = $_POST['Meal_Date'];
      $Meal_Type = $_POST['Meal_Type'];
      $Veg = $_POST['Veg'];
      $Meat = $_POST['Meat'];
      $Grain = $_POST['Grain'];
      $Protein = $_POST['Protein'];
      
      $sql = "insert into Meal_Nutrit values ($Kid_ID, '$Meal_Type', '$Meal_Date', '$Veg', '$Meat', '$Grain', '$Protein');";
      
      if($conn->query($sql)===TRUE) {
          echo "<p>Succesed!</p>";
      } else {
          echo "<p>Failed!</p>";
      }

?>
</div>
</body>
</html>
