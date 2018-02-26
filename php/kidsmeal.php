<!DOCTYPE html>
<html>
  <head>
      <meta charset = "UTF-8">
      <meta name="keywords" content="Child, health, analysis">
      <meta name="description" content="data about kids' health">
      <meta name="author" content="Jing Zhang & Fengxiang Lan">
      <meta name="generator" content="Sublime Text">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">   
      <link rel="stylesheet" type="text/css" href="../css/kidsmeal.css">
      <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    </head>
  <body>
    <div class="main">
      <form action="meal_search.php" method="post">
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
            <div class="search">
            <div class="ForKidID">  
            <span>Kid ID:</span> 
            <select name="Kid_ID">
                <option value=""></option>
            <?php
                $sql = "select distinct Kid_ID from Meal_Nutrit;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Kid_ID'] ?>"><?php echo $row['Kid_ID'];?></option>
            <?php 
                }
            ?> 
            </select><br>
            </div>
            <div class="ForClassID">
            <span>Class ID: </span>
            <select name="Class_ID">
                <option value=""></option>    
            <?php
                $sql = "select * from Class;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Class_ID'] ?>"><?php echo $row['Class_ID']; ?></option>
            <?php 
                }
            ?>
            </select><br>
            </div>
            <div class="ForDate">
            <span>Date:</span> 
            <select name="Meal_Date">
                <option value=""></option> 
            <?php
                $sql = "select distinct Meal_Date from Meal_Nutrit;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Meal_Date'] ?>"><?php echo $row['Meal_Date']; ?></option>
            <?php 
                }
            ?>
            </select></br>
            </div>
            <div class="SearchButton">
            <input type="submit" name="submit" class="submit" id="submit">
            </div>
          </div>
  </form>
</div>
</body>
</html>