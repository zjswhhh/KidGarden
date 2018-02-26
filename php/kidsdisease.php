<!DOCTYPE html>
<html>
  <head>
      <meta charset = "UTF-8">
      <meta name="keywords" content="Child, health, analysis">
      <meta name="description" content="data about kids' health">
      <meta name="author" content="Jing Zhang & Fengxiang Lan">
      <meta name="generator" content="Sublime Text">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">   
      <link rel="stylesheet" type="text/css" href="../css/kidsinfo.css">
    </head>
  <body>
   <div class="main">
      <!-- The search bar -->
      <form method="post" action="kidsdisease.php">
        <div class="search">
        <!-- Search by Kid ID -->
        <div class="ForKidID">
          <span>Kid ID: </span>
          <input type="text" name="KidID" class="KidID" id="KidID">
        </div>
        <!-- Search by Class ID -->
        <div class="ForClassID">
          <span>Class ID: </span>
          <input type="text" name="ClassID" class="ClassID" id="ClassID">     
        </div>
        <!-- Search Button -->
        <div class="SearchButton">
          <input type="submit" name="submit" class="submit" id="submit">
        </div>
      </div>
        </form>
<?php
require_once('db_setup.php');
$sql = "USE jzh136;";
if ($conn->query($sql) === TRUE) 
{
//echo "success";
}
else {echo "Error using  database: " . $conn->error;}

$KidID = $_POST['KidID'];
$ClassID = $_POST['ClassID'];

if($KidID){$sql = "SELECT * FROM Kid_basicINFO, Medical_History,Disease where Kid_basicINFO.Kid_ID = $KidID AND Kid_basicINFO.Kid_ID = Medical_History.Kid_ID AND Disease.Disease_Name = Medical_History.Disease_Name; ";}
else{$sql = "SELECT * FROM Kid_basicINFO, Medical_History ,Disease where Kid_basicINFO.Class_ID = $ClassID AND Kid_basicINFO.Kid_ID = Medical_History.Kid_ID AND Disease.Disease_Name = Medical_History.Disease_Name;";}
$result = $conn->query($sql);
?>
      <!-- The search result -->
      <div class="content">
<?php
if($result->num_rows > 0){
?>
        <table class="basic">
          <caption>Kid Physical Information</caption>
          <thead>
            <tr class="title">
              <th>Kid ID</th>
              <th>Kid Name</th>
              <th>Disease Name</th>
              <th>Date</th>
              <th>Medicine</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
<?php
while($row = $result->fetch_assoc()){
?>
            <tr>
              <td><?php echo $row['Kid_ID']?></td>
              <td><?php echo $row['Kid_name']?></td>
              <td><?php echo $row['Disease_Name']?></td>
              <td><?php echo $row['Med_Date']?></td>
              <td><?php echo $row['Medicine_List']?></td>
              <td><?php echo $row['Description']?></td>
            </tr>
<?php
}
?>  
          </tbody> 
        </table> 
<?php
} else {echo "Not found!";}
?>
      </div>
    </div>
  </body>
</html>