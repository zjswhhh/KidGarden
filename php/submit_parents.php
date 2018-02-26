<?php
require_once('db_setup.php');
$sql = "USE jzh136";
$conn->query($sql);
$id=$_COOKIE['parentsID'];
$username = $_POST['username'];
$fathername = $_POST['fathername'];
$mothername = $_POST['mothername'];
$fatheremail = $_POST['fatheremail'];
$motheremail = $_POST['motheremail'];
$fatherphone = $_POST['fatherphone'];
$motherphone = $_POST['motherphone'];
$home_address = $_POST['home_address'];
//echo $email;
//echo $phone;
if($conn->query($sql)===TRUE){
//	echo "Connected!";
}
if($username){
    $sql = "update Userdb set User_name ='$username' where User_ID = '$id';";
    $conn->query($sql);
}
if($fathername){
    $sql = "update Parents set F_name='$fathername' where P_ID = '$id';";
    $conn->query($sql);
}

if($mothername){
    $sql = "update Parents set M_name='$mothername' where P_ID = '$id';";
    $conn->query($sql);
}

if($fatheremail){
    $sql = "update Parents set F_email='$fatheremail' where P_ID = '$id';";
    $conn->query($sql);
}

if($motheremail){
    $sql = "update Parents set M_email='$motheremail' where P_ID = '$id';";
    $conn->query($sql);
}

if($fatherphone){
    $sql = "update Parents set F_PN='$fatherphone' where P_ID = '$id';";
    $conn->query($sql);
}

if($motherphone){
    $sql = "update Parents set M_PN='$motherphone' where P_ID = '$id';";
    $conn->query($sql);
}

if($home_address){
    $sql = "update Parents set Addr='$home_address' where P_ID = '$id';";
    $conn->query($sql);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name="keywords" content="Child, health, analysis">
        <meta name="description" content="data about kids' health">
        <meta name="author" content="Fengxiang Lan">
        <meta name="generator" content="Sublime Text">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">   
        <link rel="stylesheet" type="text/css" href="../css/submit_parents.css">
    </head>
    <body>
        <div class="main">
        <nav class="menu">
          <ul>
            <li><a class="Parents" href="update_parents.html">Update Parents</a></li>
            <li><a class="Kid" href="update_kid.html">Update Kid</a></li>
            <li><a class="Kid" href="update_kid_meal.html">Update Kid Meal</a></li>
            <li><a class="Kid" href="update_kid_disease.html">Update Kid Disease</a></li>
          </ul>
        </nav>
        <br></br>
      <?php
        $sql="SELECT * FROM Parents,Userdb WHERE P_ID='$id' and P_ID=User_ID;";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        if ($row) {
    ?> 
        <div class="result">
            <div>
              User ID:
              <span><?php echo $row['User_ID'];?></span>
            </div> 
            <div>
              User Name:
              <span><?php echo $row['User_name'];?></span>
            </div>
            <div>
              Father Name:
              <span><?php echo $row['F_name'];?></span>
            </div>
            <div>
              Mother Name:
              <span><?php echo $row['M_name'];?></span>
            </div>
            <div>
              Father Email:
              <span><?php echo $row['F_email'];?></span>
            </div>
            <div>
              Mother Email:
              <span><?php echo $row['M_email'];?></span>
            </div>
            <div>
              Father Phone:
              <span><?php echo $row['F_PN'];?></span>
            </div>
            <div>
              Mother Phone:
              <span><?php echo $row['M_PN'];?></span>
            </div>
            <div>
              Home Address:
              <span><?php echo $row['Addr'];?></span>
            </div>          
         </div>
    <?php
        }
    ?>  
        </div>
    </body> 
</html>
