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

      $Kid_ID = $_POST['Kid_ID'];
        $Kid_name = $_POST['Kid_name'];
        $Class_ID = $_POST['Class_ID'];
        $P_ID = $_POST['P_ID'];
        $Gender = $_POST['Gender'];
        $Birth = $_POST['Birth'];
        $Enter_T = $_POST['Enter_T'];
        $Grad_T = $_POST['Grad_T'];
        $F_name = $_POST['F_name'];
        $M_name = $_POST['M_name'];
        $F_PN  = $_POST['F_PN'];
        $M_PN = $_POST['M_PN'];
        $F_email = $_POST['F_email'];
        $M_email = $_POST['M_email'];
        $Addr = $_POST['Addr'];
        $BIM = $_POST['BIM'];
        $Height = $_POST['Height'];
        $Weight = $_POST['Weight'];
        $L_Vision = $_POST['L_Vision'];
        $R_Vision = $_POST['R_Vision'];
        $L_Audition = $_POST['L_Audition'];
        $R_Audition = $_POST['R_Audition'];
		$sql = "insert into Kid_basicINFO values ($Kid_ID, '$Kid_name', '$Class_ID', '$P_ID', '$Gender', '$Birth', '$Enter_T', '$Grad_T');";
        if($conn->query($sql) === TRUE){
            echo "<p class='record'>Basic Information Inserted Successfully!</p>";
        }else{
            echo "<p class='alter'>Failed to insert basic information!</p>";
        }
        
        $sql = "insert into Kid_Physical values ($Kid_ID, '$BIM', '$Height', '$Weight', '$L_Vision', '$R_Vision', '$L_Audition', '$R_Audition');";
        if($conn->query($sql) === TRUE){
            echo "<p class='record'>Physical Information Inserted Successfully!</p>";
        }else{
            echo "<p class='alter'>Failed to insert physical information!</p>";
        }
?>
  </div>
  </body>
</html>