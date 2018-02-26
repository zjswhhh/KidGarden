<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8">
      <meta name="keywords" content="Child, health, analysis">
      <meta name="description" content="data about kids' health">
      <meta name="author" content="Jing Zhang & Fengxiang Lan">
      <meta name="generator" content="Sublime Text">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">   
      <link rel="stylesheet" type="text/css" href="../css/delete.css">
      <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
  </head>
  <body>
    <div class="main">
      <?php
        require_once('db_setup.php');
        $sql="USE jzh136";
        if($conn->query($sql)=== TRUE) {
            //echo "success";
        }
        else {
            echo "Error using  database: " . $conn->error;
        }
        ?>
      <!-- The search bar -->
      <form method="post" action="deletekid.php">
        <!-- Search by Kid ID -->
          Kid ID:
          <select name="Kid_ID">
              <option value=""></option>
              <?php
                $sql = "select Kid_ID from Kid_basicINFO;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Kid_ID'] ?>"><?php echo $row['Kid_ID'] ?></option>
            <?php 
                }
            ?> 
            </select>
            <!-- Search Button -->
            <input type="submit" name="submit" class="submit" id="submit">
      </form>

      <form method="post" action="deleteparents.php">
          <!-- Search by Parents ID -->
            Parents' ID: 
            <select name="User_ID">
                <option value=""></option>
            <?php
                $sql = "select User_ID from Userdb where Type_ID = '2';";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
            ?>
                <option value="<?php echo $row['User_ID'] ?>"><?php echo $row['User_ID'] ?></option>
            <?php 
                }
            ?> 
            </select>
        <!-- Search Button -->
          <input type="submit" name="submit" class="submit" id="submit">
        </form>
    </div>
  </body>
</html>