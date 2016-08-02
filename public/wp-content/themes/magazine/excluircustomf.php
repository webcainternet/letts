<?php
	session_start();
		require "../../../wp-config.php";

		$host = DB_HOST;
		$user = DB_USER;
		$pass = DB_PASSWORD;


		$mysqli = new mysqli($host, $user, $pass, DB_NAME);

		if (mysqli_connect_errno()) {
	    	printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}

		$sql = 'DELETE FROM wp_postmeta WHERE meta_key = "'.$_POST["customname"].'" AND post_id = ' . $_POST["idpost"];
//echo $sql; exit;
		$result = $mysqli->query($sql);

		echo "statusok";
?>
