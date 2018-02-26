<!DOCTYPE html>
<html>
	<head>
    	<meta charset = "UTF-8">
    	<meta name="keywords" content="Child, health, analysis">
    	<meta name="description" content="data about kids' health">
    	<meta name="author" content="Jing Zhang & Fengxiang Lan">
    	<meta name="generator" content="Sublime Text">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
    	<link rel="stylesheet" type="text/css" href="../css/update_parents.css">
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
        require_once('db_setup.php');
        $sql="USE jzh136;";
        if($conn->query($sql)===FALSE){echo "Error using database".$conn->error;}
        $id=$_POST['kidsID'];
        $sql="SELECT * FROM Kid_basicINFO, Kid_Physical WHERE Kid_basicINFO.Kid_ID='$id'and Kid_basicINFO.Kid_ID=Kid_Physical.Kid_ID;";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        if ($row) {
          setcookie('kidsID',$row['Kid_ID']);
    ?> 
        <div class="result">
          <form action="submit_kids.php" method="POST">
            <div>
              Kid Name:</br>
              <input type="text" name="kidname" value="<?php echo htmlspecialchars($row['Kid_name'])?>" class="kidname" id="kidname" onfocus="if(value=='<?php echo htmlspecialchars($row["Kid_name"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Kid_name"])?>'}">
            </div>
            <div>
              Class ID:</br>
              <input type="text" name="classid" value="<?php echo htmlspecialchars($row['Class_ID'])?>" class="classid" id="classid" onfocus="if(value=='<?php echo htmlspecialchars($row["Class_ID"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Class_ID"])?>'}">
            </div>
            <div>
              Gender:</br>
              <input type="text" name="gender" value="<?php echo htmlspecialchars($row['Gender'])?>" class="gender" id="gender" onfocus="if(value=='<?php echo htmlspecialchars($row["Gender"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Gender"])?>'}">
            </div>
            <div>
              Birthday:</br>
              <input type="text" name="birthday" value="<?php echo htmlspecialchars($row['Birth'])?>" class="birthday" id="birthday" onfocus="if(value=='<?php echo htmlspecialchars($row["Birth"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Birth"])?>'}">
            </div>
             <div>
              Enter Time:</br>
              <input type="text" name="entertime" value="<?php echo htmlspecialchars($row['Enter_T'])?>" class="entertime" id="entertime" onfocus="if(value=='<?php echo htmlspecialchars($row["Enter_T"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Enter_T"])?>'}">
            </div>
             <div>
              Graduate Time:</br>
              <input type="text" name="graduatetime" value="<?php echo htmlspecialchars($row['Grad_T'])?>" class="graduatetime" id="graduatetime" onfocus="if(value=='<?php echo htmlspecialchars($row["Grad_T"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["Grad_T"])?>'}">
            </div> 
           <div>
            BMI:</br>
            <input type="text" name="bim" value="<?php echo htmlspecialchars($row['BIM'])?>" class="bim" id="bim" onfocus="if(value=='<?php echo htmlspecialchars($row["BIM"])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row["BIM"])?>'}">
           </div>
           <div>
            Height:</br>
            <input type="text" name="height" value="<?php echo htmlspecialchars($row['Height'])?>" class="height" id="height" onfocus="if(value=='<?php echo htmlspecialchars($row['Height'])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row['Height'])?>'}">
           </div>
           <div>
            Weight:</br>
            <input type="text" name="weight" value="<?php echo htmlspecialchars($row['Weight'])?>" class="weight" id="weight" onfocus="if(value=='<?php echo htmlspecialchars($row['Weight'])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row['Weight'])?>'}">
           </div>
           <div>
            Left Eye:</br>
            <input type="text" name="lefteye" value="<?php echo htmlspecialchars($row['L_Vision'])?>" class="lefteye" id="lefteye" onfocus="if(value=='<?php echo htmlspecialchars($row['L_Vision'])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row['L_Vision'])?>'}">
           </div>
           <div>
            Right Eye:</br>
            <input type="text" name="righteye" value="<?php echo htmlspecialchars($row['R_Vision'])?>" class="righteye" id="righteye" onfocus="if(value=='<?php echo htmlspecialchars($row['R_Vision'])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row['R_Vision'])?>'}">
           </div>
           <div>
            Left Ear:</br>
            <input type="text" name="leftear" value="<?php echo htmlspecialchars($row['L_Audition'])?>" class="leftear" id="leftear" onfocus="if(value=='<?php echo htmlspecialchars($row['L_Audition'])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row['L_Audition'])?>'}">
           </div>
           <div>
            Right Ear:</br>
            <input type="text" name="rightear" value="<?php echo htmlspecialchars($row['R_Audition'])?>" class="rightear" id="rightear" onfocus="if(value=='<?php echo htmlspecialchars($row['R_Audition'])?>'){value=''}" onblur="if (value=='') {value='<?php echo htmlspecialchars($row['R_Audition'])?>'}">
           </div>
           <div>
              <input type="submit" name="update" value="UPDATE" class="update" id="update">
            </div>      
          </form>    
       </div>
<?php
        }
        else{
?>
        <div class="result">
        <p>
<?php   
        echo "No Such Kid!!!";
?>
       </p> 
       </div>
<?php
        }
?>   


<!-- end -->
    	</div>
    </body>	
</html>