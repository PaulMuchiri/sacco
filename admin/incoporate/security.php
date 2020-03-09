<?php 
session_start()

include('dabase/dbconfg.php');
if ($dbconfig) {
	
}else{
	header("location: database/dbconfig.php");

}

if (!$_SESSION['username']) {
	header('location: login.php')
}