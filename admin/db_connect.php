<?php
try{
$db=new PDO("mysql:host=localhost;dbname=chasingm_SBP;charset=utf8;","chasingm_peter","peter@2018");		
}
catch(exception $e){
	echo "Unable to connect to the database at this time";


}

?>