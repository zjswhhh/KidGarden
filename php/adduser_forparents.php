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
if($conn->query($sql)=== TRUE) {}
else 
{
  echo "Error using  database: " . $conn->error;
}
$User_ID = $_POST['User_ID'];
$User_name = $_POST['User_name'];
$Password = $_POST['Password'];
$sql = "select * from Userdb where User_ID = '$User_ID';";
$result = $conn->query($sql);
if($result->num_rows > 0){
    echo "<p class='alter'>User ID already EXISTS!!!</p>";
  }
else{
  $sql = "insert into Userdb values ('$User_ID', '$User_name', '$Password', 2);";
  if($conn->query($sql) === TRUE){
    echo "<p>Success!</p>";
  }
  else{ echo "<p>Failed!</p>";
  }
}
?>

  </div>
  </body>
  </html>


      