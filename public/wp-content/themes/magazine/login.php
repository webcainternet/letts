<?php
	//incluindo config
	include "../../../wp-config.php";

	$loginemail = $_POST['loginemail'];
	$loginsenha = $_POST['loginsenha'];

	//Conecta bd
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (mysqli_connect_errno()) {
    	printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	//autenticacao
	$obj = $mysqli->query("select PU.post_id FROM wp_postmeta PU inner join wp_postmeta PS ON PU.post_id = PS.post_id where PU.meta_key = 'basicaemail' AND PU.meta_value = '".$loginemail."' AND PS.meta_key = 'senha' AND PS.meta_value = '".$loginsenha."'")->fetch_object();
	$letts_loginid = $obj->post_id;

	if ($letts_loginid == "") {
		echo "<script> window.location.assign(\"/login/?error=invalid_login\") </script>";
	}
	else {
		session_start();
		$_SESSION["lettslogin"] = $letts_loginid;
		echo "<script> window.location.assign(\"http://letts.com.br/?p=".$_SESSION["lettslogin"]."\") </script>";
	}
	exit;
?>