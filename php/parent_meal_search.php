<!DOCTYPE html>
<html>
  <head>
    <title>Child Life Database System</title>
    <meta charset = "UTF-8">
    <meta name="keywords" content="Child, health, analysis">
    <meta name="description" content="data about kids' health">
    <meta name="author" content="Jing Zhang & Fengxiang Lan">
    <meta name="generator" content="Sublime Text">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/kidsinfo.css">
  </head>
  <body>
  	<div class="content">
<?php
      require_once('db_setup.php');
      $sql="USE jzh136;";
      if($conn->query($sql)===TRUE)
      {

      }
      else {echo "Error using  database: " . $conn->error;}

      $Kid_ID = $_POST['Kid_ID'];
      $sql = "SELECT * FROM Meal_Nutrit Where Meal_Nutrit.Kid_ID =$Kid_ID;";
      $result=$conn->query($sql);
      if($result->num_rows){
?>
        <table class="basic">
          <caption>Kid Meal Information</caption>
          <thead>
            <tr class="title">
              <th>Date</th>
              <th>Meal Type</th>
              <th>Vegetable</th>
              <th>Meat</th>
              <th>Grain</th>
              <th>Protein</th>
            </tr>
          </thead>
          <tbody>
<?php
        while($row=$result->fetch_assoc()){
?>
            <tr>
              <td><?php echo $row['Meal_Date']?></td>
              <td><?php echo $row['Meal_Type']?></td>
              <td><?php echo $row['Veg']?></td>
              <td><?php echo $row['Meat']?></td>
              <td><?php echo $row['Grain']?></td>
              <td><?php echo $row['Protein']?></td> 
            </tr>
<?php
        }
?>
        </tbody>
      </table>
<?php
      }
      else{echo "<p>No record for this kid</p>";}
?>        
  </div>
  </body>
</html>
      
