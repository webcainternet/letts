<?php
	include('../../../wp-config.php');

	error_reporting(E_ALL & ~E_NOTICE);

	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    	die("Could not connect: " . mysql_error());

	mysql_select_db(DB_NAME);

	foreach($_POST as $key => $value){
		$_POST[$key]=utf8_decode($value);
	}
	
	extract($_POST);
	
	$sql=mysql_query("SELECT * FROM wp_postmeta WHERE meta_key = 'basicaemail' and meta_value = '".$email."'");
	
	$num_rows = mysql_num_rows($sql);
	
	if($num_rows >= 1){
		$response['response']=1;
	}else{
		$response['response']=0;
	}
	echo $response['response'];
?>
