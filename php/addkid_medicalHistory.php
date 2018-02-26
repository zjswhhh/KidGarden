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
        if($conn->query($sql)=== TRUE) {
          //echo "success";
        }
        else {
            echo "Error using  database: " . $conn->error;
        }
        
        $Kid_ID = $_POST['Kid_ID'];
        $Disease_Name = $_POST['Disease_Name'];
        $Med_Date = $_POST['Med_Date'];
        $Medicine_List = $_POST['Medicine_List'];
        
        $sql = "select * from Medical_History where Disease_Name = '$Disease_Name' AND Kid_ID = '$Kid_ID';";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo "<p>Medicine record already exists!</p>";
        } else {
            $sql = "insert into Medical_History values ('$Kid_ID', '$Disease_Name', '$Med_Date', '$Medicine_List');";
            if($conn->query($sql) === TRUE){
            echo "<p>Medicine Information Inserted Successfully!</p>";
            echo "Kid ID:<p class='record'>".$Kid_ID."</p></br>";
            echo "DIsease Name:<p class='record'>".$Disease_Name."</p></br>";
            echo "Date:<p class='record'>".$Med_Date."</p></br>";
            echo "Medicine List:<p class='record'>".$Medicine_List."</p></br>";
            }else{
                echo "Failed to insert Medicine information!";
            }
        }
?>
</div>
</body>
</html>