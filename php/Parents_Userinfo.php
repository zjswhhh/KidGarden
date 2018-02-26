<!DOCTYPE html>
<html>
  <head>
      <meta charset = "UTF-8">
      <meta name="keywords" content="Child, health, analysis">
      <meta name="description" content="data about kids' health">
      <meta name="author" content="Jing Zhang & Fengxiang Lan">
      <meta name="generator" content="Sublime Text">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">   
      <link rel="stylesheet" type="text/css" href="../css/userinfo.css">
    </head>
  <body>
<?php
require_once('db_setup.php');
$sql = "USE jzh136;";
if($conn->query($sql)===TRUE){
//	echo "Connected!";
}

$id =$_COOKIE['parents_userid'];
$sql = "SELECT * from Userdb, Parents where User_ID='$id' AND User_ID = P_ID;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
    <form class="userinfo-context" action="update_account_parents.php" method="POST" >
      <div>
        User Name:</br>
       <input type="text" name="username" value="<?php echo htmlspecialchars($row['User_name'])?>" class="username" id="username" onfocus="if(value=='<?php echo htmlspecialchars($row["User_name"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["User_name"])?>'}">
      </div>
      <div>
        Father Name:</br>
        <input type="text" name="fathername" value="<?php echo htmlspecialchars($row["F_name"])?>" class="fathername" id="fathername" onfocus="if(value=='<?php echo htmlspecialchars($row["F_name"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["F_name"])?>'}">
      </div>
      <div>
        Mother Name:</br>
        <input type="text" name="mothername" value="<?php echo htmlspecialchars($row["M_name"])?>" class="mothername" id="mothername" onfocus="if(value=='<?php echo htmlspecialchars($row["M_name"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["M_name"])?>'}">
      </div>
      <div>
        Father Phone:</br>
        <input type="text" name="fatherphone" value="<?php echo htmlspecialchars($row["F_PN"])?>" class="fatherphone" id="fatherphone" onfocus="if(value=='<?php echo htmlspecialchars($row["F_PN"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["F_PN"])?>'}">
      </div>
      <div>
        Mother Phone:</br>
        <input type="text" name="motherphone" value="<?php echo htmlspecialchars($row["M_PN"])?>" class="motherphone" id="motherphone" onfocus="if(value=='<?php echo htmlspecialchars($row["M_PN"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["M_PN"])?>'}">
      </div>
      <div>
        Father Email:</br>
        <input type="text" name="fatheremail" value="<?php echo htmlspecialchars($row["F_email"])?>" class="fatheremail" id="fatheremail" onfocus="if(value=='<?php echo htmlspecialchars($row["F_email"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["F_email"])?>'}">
      </div>
      <div>
        Mother Email:</br>
        <input type="text" name="motheremail" value="<?php echo htmlspecialchars($row["M_email"])?>" class="motheremail" id="motheremail" onfocus="if(value=='<?php echo htmlspecialchars($row["M_email"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["M_email"])?>'}">
      </div>
      <div>
        Home Address:</br>
        <input type="text" name="address" value="<?php echo htmlspecialchars($row["Addr"])?>" class="address" id="address" onfocus="if(value=='<?php echo htmlspecialchars($row["Addr"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Addr"])?>'}">
      </div>
      <div>
        <input type="submit" name="update" value="UPDATE" class="update" id="update">
      </div> 
    </form>     
      
  </body>
</html>
