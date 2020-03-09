<?php
require 'db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>
Dashboard
</title>
<meta charset="utf-8">
<meta name="viewport" content="width-device-width, initial-scale=1">
<link href="css/bootstrap2.css" rel="stylesheet"/>
<style type="text/css">

  #hr-right{
   border: 1px solid #A5A5A5;
}
#account_a{padding-top:10px;}
</style>
</head> 
<body>
    <br></br>
    <div class="row">
        <div class="col-sm-4"> 
        </div>
    <div class="col-sm-4">
<div class="panel panel-primary">
<div class="panel-heading">
<center><font color="white" >UPDATE FARE</font></center>
</div>
<div class="panel-body">
<form method="POST" action="">
  <div class="form-group">
    <label for="sacco">Sacco ID</label>
    <input type="text" class="form-control" name="sacco" placeholder="Enter sacco ID">
  </div>
  <div class="form-group">
    <label for="time">Time</label>
    <input type="text" class="form-control" name="time" placeholder="Enter period">
  </div>
   <div class="form-group">
    <label for="fare">Fare</label>
    <input type="text" class="form-control" name="fare" placeholder="Enter afternoon fare">
  </div>
  
  <button type="submit" name="register" class="btn btn-primary">Update</button>
</form>
</div>
<?php
if(isset($_POST['register'])){
	$sacco=$_POST['sacco'];
	$time=$_POST['time'];
	$time=preg_replace("#[^0-9a-z]#i","",$time);
	$fare=$_POST['fare'];
?>
<div class="panel-footer">
<?php
$countnum=$db->prepare("SELECT * FROM sacco_time_defination WHERE sacco_id=?");
$countnum->bindValue(1,$sacco);
$countnum->execute();
$numrows=$countnum->rowCount();

if($numrows==0){
	
	echo'<div class="alert alert-danger" role="alert">Sorry the sacco doesnt exist</div>';	

}
else{
$query=$db->prepare("UPDATE sacco_time_defination SET fare=? WHERE sacco_id=? AND time like '%$time%'");	
$query->bindValue(1,$fare);
$query->bindValue(2,$sacco);
$query->execute();
if($query)	{
	
	echo'<div class="alert alert-success" role="alert">Update successful.</div>';
}
else{
	
	echo'<div class="alert alert-danger" role="alert">Sorry unable to process the request at this time</div>';
}	
}
}
?>
</div>
</div>
</div>
   <div class="col-sm-4">
       </div>
       </div>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
