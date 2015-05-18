<?php
	session_start();
	if ($_POST["idlogin"] == $_SESSION["lettslogin"]) {
		$remover = getcwd();
		$remover .= '/../../../'.$_POST["nomefoto"];
		unlink($remover);
		echo "statusok";
	} else {
		echo "login fail";
	}
?>



