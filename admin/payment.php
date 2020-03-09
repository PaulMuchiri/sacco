<?php
require'db_connect.php';
$fetch=$db->prepare("SELECT saco_data.sacco_name,payments_table.vehicle_number,payments_table.amount_paid,payments_table.mpesa_refno,payments_table.phone_no FROM saco_data INNER JOIN payments_table ON saco_data.sacco_id=payments_table.sacco_id ORDER BY payments_table.payment_id DESC");
$fetch->execute();
$count=$fetch->rowCount();
?>
<!DOCTYPE html>
<html>
<head>
<title>
payments
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
<div class="panel panel-default" >
<div class="panel-heading">
<div class="row">
<div class="col-sm-12"><font color="orange"><b>Available Payments (<?php echo $count; ?>) </b></font></div>
</div>
</div>
<div class="panel-body" style="height:600px;overflow-y:scroll;">

<table class="table table-striped">
<th>Sacco Name</th><th>Vehicle</th><th>Amount(ksh) </th><th>Mpesa Refno</th><th>Phone Number</th>
<?php

while($res=$fetch->fetch()){
	
    $pname=$res['sacco_name'];
	$quantity=$res['vehicle_number'];
	$price=$res['amount_paid'];
	$transaction=$res['mpesa_refno'];
	$dyte=$res['phone_no'];
	
	echo '<tr><td>'.$pname.'</td><td>'.$quantity.'</td><td>'.$price.'</td><td>'.$transaction.'</td><td>'.$dyte.'</td>
	</tr>';
}

?>
</table>
</div>
</div>
</body>
</html>