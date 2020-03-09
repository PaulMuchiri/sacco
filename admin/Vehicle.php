<?php 
     session_start();
    include('incoporate/header.php');
    include('incoporate/navbar.php');
   
?>

<body>
<div class="row">
<div class="col-sm-7">
<div id="panels" class="panel panel-default" style="height:650px;">
<div class="panel-heading">
<button class="btn btn-warning" type="button">
<?php
include('incoporate/navbar.php');
$pdo=$db->prepare("SELECT * FROM sacco_data ORDER BY sacco_id DESC");

$pdo->execute();
$count=$pdo->rowCount();
?>
  Available Vehicles<span class="badge"><?php echo $count;?></span>
</button>
</div>
<div class="panel-body" style="height:520px;overflow-y:scroll;">
<?php
if($count===0){
	
}
else{
	echo '<table class="table-striped table-bordered" style="width:700px; margin:0 auto;"><tr><th>Sacco Name</th><th>Number Plate</th><th>Capacity</th><th>Paybill</th></tr>';
	while($row=$pdo->fetch()){
		$name=$row['sacco_name'];
		$plate=$row['number_plate'];
		$capacity=$row['vehicle_capacity'];
		$pay=$row['paybill'];
		echo
		'<tr><td>'.$name.'</td><td>'.$plate.'</td><td>'.$capacity.'</td><td>'.$pay.'</td></tr>';
	
	}
	echo'</table>';
	
}
?>
</div>
</div>
</div>
<div class="col-sm-5">
<div class="panel panel-primary">
<div class="panel-heading">
<center><font color="white" >Register Vehicle</font></center>
</div>
<div class="panel-body">
<form method="POST" action="">
  <div class="form-group">
    <label for="sacco">Sacco Name</label>
    <input type="text" class="form-control" name="sacco" placeholder="Enter sacco name" required="required">
  </div>
  <div class="form-group">
    <label for="num">Number Plate</label>
    <input type="text" class="form-control" name="num" placeholder="Enter number Plate" required="required">
  </div>
   <div class="form-group">
    <label for="paybill">Paybill</label>
    <input type="text" class="form-control" name="paybill" placeholder="Enter paybill number" required="required">
  </div>
   <div class="form-group">
    <label for="capacity">Capacity</label>
    <input type="text" class="form-control" name="capacity" placeholder="Enter vehicle capacity" required="required">
  </div>
  <button type="submit" name="register" class="btn btn-primary">Register</button>
</form>
</div>
<?php
if(isset($_POST['register'])){
	$sacco=strtolower($_POST['sacco']);
	$plate=$_POST['num'];
	$pay=$_POST['paybill'];
	$capacity=$_POST['capacity'];
	$sacco2=ucfirst($sacco);
	
	
?>
<div class="panel-footer">
<?php
$countnum=$db->prepare("SELECT * FROM saco_data WHERE number_plate=?");
$countnum->bindValue(1,$plate);
$countnum->execute();
$numrows=$countnum->rowCount();

if($numrows>0){
	
	echo'<div class="alert alert-danger" role="alert">Sorry the vehicle already registered</div>';
   echo "<meta http-equiv=refresh content=\"0; URL=Vehicle.php\">";
}
/*else if(!preg_match("/^[a-zA-Z]*$/",$sacco)){
		
	echo'<div class="alert alert-danger" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please enter a valid Sacco_name
</div>';
	}
	else if($plate==0 || $plate==null){
		
	echo'<div class="alert alert-danger" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please enter a number plate
</div>';
	}
	elseif(!preg_match('/^[0-9]{6}$/',$pay)){
		
echo'<div class="alert alert-danger" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please enter a valid paybill 
</div>';
	}
elseif(!preg_match('/^[0-9]$/',$capacity)){
		
echo'<div class="alert alert-danger" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please enter a valid number
</div>';
	}*/
else{
$query=$db->prepare("INSERT INTO saco_data(sacco_name,number_plate,vehicle_capacity,paybill)VALUES(?,?,?,?)");	
$query->bindValue(1,$sacco2);
$query->bindValue(2,$plate);
$query->bindValue(3,$capacity);
$query->bindValue(4,$pay);
$query->execute();
if($query)	{
	
	echo'<div class="alert alert-success" role="alert">Vehicle registration is successful. <a href="receptionist.php"><font color="blue">Register more.</a></div>';
    echo "<meta http-equiv=refresh content=\"0; URL=Vehicle.php\">";
}
else{
	
	echo'<div class="alert alert-danger" role="alert">Sorry unable to process the request at this time</div>';
	  echo "<meta http-equiv=refresh content=\"0; URL=Vehicle.php\">";
}	
}
}
?>
</div>
</div>
</div>
</div>
<?php 
    include('incoporate/footer.php');
    include('incoporate/scripts.php');
 ?>