<!DOCTYPE html>
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
    <div class="main">
      <!-- The search bar -->
      <form method="post" action="kidsinfo.php">
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

if($KidID){$sql = "SELECT * FROM Kid_basicINFO, Parents where Kid_ID = $KidID AND Kid_basicINFO.P_ID = Parents.P_ID;";}
else{$sql = "SELECT * FROM Kid_basicINFO, Parents where Class_ID = '$ClassID' AND Kid_basicINFO.P_ID = Parents.P_ID;";}
$result = $conn->query($sql);
?>
      <!-- The search result -->
      <div class="content">

<?php
if($result->num_rows > 0){
?>
        <table class="basic">
          <caption>Kid Basic Information</caption>
          <thead>
            <tr class="title">
              <th>Kid ID</th>
              <th>Kid Name</th>
              <th>Gender</th>
              <th>Birthday</th>
              <th>Class ID</th>
              <th>Enter Time</th>
              <th>Graduate Time</th>
            </tr>
          </thead>
          <tbody>
<?php
while($row = $result->fetch_assoc()){
?>
              <tr>
              <td><?php echo $row['Kid_ID']?></td>
              <td><?php echo $row['Kid_name']?></td>
              <td><?php echo $row['Gender']?></td>
              <td><?php echo $row['Birth']?></td>
              <td><?php echo $row['Class_ID']?></td>
              <td><?php echo $row['Enter_T']?></td>
              <td><?php echo $row['Grad_T']?></td>
            </tr> 
<?php
}
?>
          </tbody> 
        </table> 
        <table class="parents">
          <caption>Kid Family Information</caption>
          <thead>
            <tr>
              <th>Parent ID</th> 
              <th>Father Name</th> 
              <th>Mother Name</th>
              <th>Father Phone</th>
              <th>Mother Phone</th>
              <th>Father Email</th>
              <th>Mother Email</th>
              <th>Home Address</th>
          </tr>
          </thead>
          <tbody>
<?php
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
?>
            <tr>
              <td><?php echo $row['P_ID']?></td>
              <td><?php echo $row['F_name']?></td>
              <td><?php echo $row['M_name']?></td>
              <td><?php echo $row['F_PN']?></td>
              <td><?php echo $row['M_PN']?></td>
              <td><?php echo $row['F_email']?></td>
              <td><?php echo $row['M_email']?></td>
              <td><?php echo $row['Addr']?></td>
            </tr>
<?php
}
?>
          </tbody>
        </table>
      </div>
<?php
} else {
?>
      <div class="alter">
<?php
      echo "<p>Can't find Record!</p></div>";
    }
?>

    </div>
  </body>
</html>
