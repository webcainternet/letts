<?php 
	session_start();

	if ($_SESSION["lettslogin"] == "1" || $_GET["visitante"] == "1") {
		$letts_nome = "VISITANTE";
		$_SESSION["lettslogin"] = 1;
	} else {
		if ($_SESSION["lettslogin"] == "") {
			//echo "<script> window.location.assign(\"http://letts.com.br/login\") </script>";
			//exit;
			$letts_nome = "VISITANTE";
			$_SESSION["lettslogin"] = 1;
		} else {
			//Conecta bd
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (mysqli_connect_errno()) {
		    	printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}

			//Busca username
			$obj = $mysqli->query("select post_title FROM wp_posts where ID = ".$_SESSION["lettslogin"])->fetch_object();
			$letts_nome = $obj->post_title;
		}
	}
?>