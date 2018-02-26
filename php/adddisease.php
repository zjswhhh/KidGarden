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
      $sql="USE jzh136";
      if($conn->query($sql)=== TRUE){}
      else 
      {
          echo "Error using  database: " . $conn->error;
      }

      $Disease_Name = $_POST['Disease_Name'];
      $Description = $_POST['Description'];
        
      $sql = "select * from Disease where Disease_Name = '$Disease_Name';";

      $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo "<p class='alter'>Disease already exists!</p>";
        } else {
            $sql = "insert into Disease values ('$Disease_Name', '$Description');";
            if($conn->query($sql) === TRUE){
            echo "<p class='record'>Disease Information Inserted Successfully!</p></br>";
            echo "Disease Name:<p class='record'>".$Disease_Name."</p></br>";
            echo "Description:<p class='record'>".$Description."</p></br>";
            }else{
                echo "Failed to insert disease information!";
            }
        }
?>

  </div>
  </body>
</html>