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
        
        $P_ID = $_POST['P_ID'];
        $F_name = $_POST['F_name'];
        $M_name = $_POST['M_name'];
        $F_PN  = $_POST['F_PN'];
        $M_PN = $_POST['M_PN'];
        $F_email = $_POST['F_email'];
        $M_email = $_POST['M_email'];
        $Addr = $_POST['Addr'];
        $sql="select * from Userdb where User_ID='$P_ID';";
        $result=$conn->query($sql);
        if ($result->num_rows) {
          $sql1="select * from Parents where P_ID='$P_ID';";
          $result1=$conn->query($sql1);
          if($result1->num_rows){echo "<p class='alter'>The account information of this id  already EXISTS!!!</p>";}
          else{
            $sql3 = "insert into Parents values ('$P_ID', '$F_name', '$M_name', '$F_PN', '$M_PN', '$F_email', '$M_email', '$Addr');";
            if($conn->query($sql3) === TRUE){
              echo "Parents ID:</br><p class='record'>".$P_ID."</p></br>";
              echo "Father Name</br><p class='record'>".$F_name."</p></br>";
              echo "Mother Name</br><p class='record'>".$M_name."</p></br>";
              echo "Father Phone</br><p class='record'>".$F_PN."</p></br>";
              echo "Mother Phone</br><p class='record'>".$M_PN."</p></br>";
              echo "Father Email</br><p class='record'>".$F_email."</p></br>";
              echo "Mother Email</br><p class='record'>".$M_email."</p></br>";
              echo "Home Address</br><p class='record'>".$Addr."</p></br>";
            }
            else{
              echo "<p class='alter'>Insert Failed!!!</p>";
            }
          }
           
        }
        else{
          echo "<p class='alter'>The Parent Account NOT EXISTS!!! Go back to Add Account to add a new parent account first</p>";
          // $sql="select * from Userdb where User_ID='$P_ID';";
          // $result=$conn->query($sql);
          // if($result->num_rows > 0){
          //   echo"success";
          //   $sql = "insert into Parents values ('$P_ID', '$F_name', '$M_name', '$F_PN', '$M_PN', '$F_email', '$M_email', '$Addr');";
          //   if($conn->query($sql) === TRUE){
            // echo "Parents ID:</br><p class='record'>".$P_ID."</p></br></br>";
            // echo "Father Name</br><p class='record'>".$F_name."</p></br></br>";
            // echo "Mother Name</br><p class='record'>".$M_name."</p></br></br>";
            // echo "Father Phone</br><p class='record'>".$F_PN."</p></br></br>";
            // echo "Mother Phone</br><p class='record'>".$M_PN."</p></br></br>";
            // echo "Father Email</br><p class='record'>".$F_email."</p></br></br>";
            // echo "Mother Email</br><p class='record'>".$M_email."</p></br></br>";
            // echo "Home Address</br><p class='record'>".$Addr."</p></br></br>";
             }
        //     else{
        //     echo "<p class='alter'>Insert Failed!!!</p>";
        //     }
        //   else{
        //     echo "<p class='alter'>You should creat the user account first, then you can add the information for parents!!!</p>";
        //   }
        // }
        // }
?>
</div>
</body>
</html>