<?php
	session_start();
	if ($_POST["idlogin"] == $_SESSION["lettslogin"]) {
		require "../../../wp-config.php";

		$host = DB_HOST;
		$user = DB_USER;
		$pass = DB_PASSWORD;


		$mysqli = new mysqli($host, $user, $pass, DB_NAME);

		if (mysqli_connect_errno()) {
	    	printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}


		$sql = 'DELETE FROM wp_posts WHERE ID = '.$_POST["idvaga"];
		echo $sql;

		$result = $mysqli->query($sql);

		echo "statusok";
	} else {
		echo "login fail";
	}
?>
