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

$id =$_COOKIE['userid'];
$sql = "SELECT * from Userdb, Teacher where User_ID='$id' AND User_ID = T_ID;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
    <form class="userinfo-context" action="update_account.php" method="POST" >
      <div>
        User Name:</br>
       <input type="text" name="username" value="<?php echo htmlspecialchars($row['User_name'])?>" class="username" id="username" onfocus="if(value=='<?php echo htmlspecialchars($row["User_name"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["User_name"])?>'}">
      </div>
      <div>
        Email:</br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($row["T_email"])?>" class="email" id="email" onfocus="if(value=='<?php echo htmlspecialchars($row["T_email"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["T_email"])?>'}">
      </div>
      <div>
        Phone:</br>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($row["T_PN"])?>" class="phone" id="phone" onfocus="if(value=='<?php echo htmlspecialchars($row["T_PN"])?>') {value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["T_PN"])?>'}">
      </div>
      <div>
        Gender:
        <table>
        <tr>
          <td>  
            <input type="radio" name="gender" value="male" class="male" id="male">
          </td>
          <td>
            <img src="../image/male.png" width="20px" height="20px">  
          </td>
          <td>
            <input type="radio" name="gender" value="female" class="female" id="female">
          </td>
          <td>
            <img src="../image/female.png" width="20px" height="20px">
          </td>
        </tr>
        </table>
      </div>
      <div>
        <input type="submit" name="update" value="UPDATE" class="update" id="update">
      </div> 
    </form>     
      
  </body>
</html>
