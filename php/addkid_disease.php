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
        <div class="find">
            <form action="addkid_medicalHistory.php" method="post">
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
            Kid ID: 
            <select name="Kid_ID">
            <?php
                $sql = "select * from Kid_basicINFO;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Kid_ID'] ?>"><?php echo $row['Kid_ID'] ?></option>
            <?php 
                }
            ?>
            </select></br></br>
            
            Disease Name: <select name="Disease_Name">
            <?php
                $sql = "select * from Disease;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Disease_Name'] ?>"><?php echo $row['Disease_Name'] ?></option>
            <?php 
                }
            ?>
            </select></br></br>
            
            Medicine List: <input type="text" name="Medicine_List"></br></br>
            Time to Take: <input type="text" name="Med_Date"></br></br>
            <input type="submit" name="submit" class="submit" id="submit">    
    </form>
        </div>          
    </body>	
</html>