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
    <div class="alter">
      <?php
      require_once('db_setup.php');
      $sql = "USE jzh136;";
      if ($conn->query($sql) === TRUE) 
      {
          //echo "success";
      }
      else 
      {
          echo "Error using  database: " . $conn->error;
      }
      
      $Kid_ID = $_POST['Kid_ID'];
      if($Kid_ID){
          $sql = "delete from Kid_basicINFO where Kid_ID = $Kid_ID;";
          if($conn->query($sql) === TRUE){
              echo "<p>Deleted Successfully!</p>";
          } else {
              echo "<p>Can't delete!</p>";
          }
        } else {
          echo "<p>Invalid input!</p>";
      }
      
        ?>
    </div>
  </body>
</html>