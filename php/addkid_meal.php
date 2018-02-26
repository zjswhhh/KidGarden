<!DOCTYPE html>
<html>
	<head>
    	<meta charset = "UTF-8">
    	<meta name="keywords" content="Child, health, analysis">
    	<meta name="description" content="data about kids' health">
    	<meta name="author" content="Jing Zhang & Fengxiang Lan">
    	<meta name="generator" content="Sublime Text">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
    	<link rel="stylesheet" type="text/css" href="../css/addkids_meal.css">
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
        <form action="addmeal.php" method="post">
            <?php
                require_once('db_setup.php');
                $sql="USE jzh136";
                if($conn->query($sql)=== TRUE) {
                    //echo "success";
                }
                else {
                    echo "Error using  database: " . $conn->error;
                }
            ?>
            <div class="find">
            <div class="ForKidID">
            Kid ID: 
            <select name="Kid_ID">
                <option value=""></option>
            <?php
                $sql = "select Kid_ID from Kid_basicINFO;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Kid_ID'] ?>"><?php echo $row['Kid_ID'] ?></option>
            <?php 
                }
            ?> 
            </select><br>
            </div>
            <div class="FormealType">
            Meal Type:<br>
            <input type="radio" name="Meal_Type" value="breakfast">breakfast<br>
            <input type="radio" name="Meal_Type" value="lunch">lunch<br>
            <input type="radio" name="Meal_Type" value="dinner">dinner<br>
            </div>
            <div class="Fordate">
            Date: <input type="date" name="Meal_Date"><br>
            </div>
            <br>
            <div class="ForVeg">
            Vegetables: <input type="text" name="Veg"><br>
            </div>
            <div class="ForMeat">
            Meat: <input type="text" name="Meat"><br>
            </div>
            <div class="ForGrain">
            Grain: <input type="text" name="Grain"><br>
            </div>
            <div class="ForProtein">
            Protein: <input type="text" name="Protein"><br>
            </div>
            <div class="SearchButton">
                <input type="submit" name="submit" class="submit" id="submit">
            </div>
        </form>
    </body>
    </html>