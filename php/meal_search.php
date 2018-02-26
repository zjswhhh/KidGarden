<html>
  <head>
      <meta charset = "UTF-8">
      <meta name="keywords" content="Child, health, analysis">
      <meta name="description" content="data about kids' health">
      <meta name="generator" content="Sublime Text">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">   
      <link rel="stylesheet" type="text/css" href="../css/kidsinfo.css">
    </head>
  <body>
      <?php
      require_once('db_setup.php');
      $sql = "USE jzh136;";
      if ($conn->query($sql) === TRUE) 
      {
          //echo "success";
      }
      else {echo "Error using  database: " . $conn->error;}

      $Kid_ID = $_POST['Kid_ID'];
      $Class_ID = $_POST['Class_ID'];
      $Meal_Date = $_POST['Meal_Date'];

      if($Kid_ID){
          if($Meal_Date){
            $sql = "SELECT * FROM Meal_Nutrit where Kid_ID = $Kid_ID AND Meal_Date = '$Meal_Date';";
        } else {
            $sql = "SELECT * FROM Meal_Nutrit where Kid_ID = $Kid_ID;";
        }
      } elseif($Class_ID) {
          if($Meal_Date){
              $sql = "SELECT * FROM Meal_Nutrit where Meal_Date = '$Meal_Date' AND Kid_ID in (SELECT K.Kid_ID from Kid_basicINFO AS K, Meal_Nutrit AS M where K.Kid_ID = M.Kid_ID and Class_ID = '$Class_ID' );";
          } else {
              $sql = "SELECT * FROM Meal_Nutrit where Kid_ID in (SELECT K.Kid_ID from Kid_basicINFO AS K, Meal_Nutrit AS M where K.Kid_ID = M.Kid_ID and Class_ID = '$Class_ID' );;";
          }
      } elseif($Meal_Date) {
          $sql =  "SELECT * FROM Meal_Nutrit where Meal_Date = '$Meal_Date';";
      } else {
          $sql =  "SELECT * FROM Meal_Nutrit;";
      }


$result = $conn->query($sql);
?>
      <!-- The search result -->
      <div class="content">
<?php
if($result->num_rows > 0){
?>
        <table class="basic">
          <caption>Kid Meal Information</caption>
          <thead>
            <tr class="title">
              <th>Kid ID</th>
              <th>Meal Type</th>
              <th>Date</th>
              <th>Vegetable</th>
              <th>Meat</th>
              <th>Grain</th>
              <th>Protein</th>
            </tr>
          </thead>
          <tbody>
<?php
while($row = $result->fetch_assoc()){
?>
            <tr>
              <td><?php echo $row['Kid_ID']?></td>
              <td><?php echo $row['Meal_Type']?></td>
              <td><?php echo $row['Meal_Date']?></td>
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
} else {echo "Not found!";}
?>
      </div>
    </div>
  </body>
</html>