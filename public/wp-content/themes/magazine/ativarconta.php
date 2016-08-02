<?php include "../../../wp-config.php"; ?>
<?php include "logincheck.php"; ?>
<?php
/**
 * Alterar Senha
 */
 $host = DB_HOST;
 $user = DB_USER;
 $pass = DB_PASSWORD;

if ($_SESSION['lettslogin'] == $_POST['contaid']) {
  //var_dump($_SESSION);
  $sql = "update wp_posts p set p.post_status = 'publish' WHERE p.id = ". $_SESSION['lettslogin'];

	$mysqli = new mysqli($host, $user, $pass, DB_NAME);

	if (mysqli_connect_errno()) {
    	printf("Connect failed: %s\n", mysqli_connect_error());
    echo 'Falha ao ativar conta1';
    exit();
	}
	$result = $mysqli->query($sql);
  echo 'Conta ativada com sucesso!';
} else {
  echo 'Falha ao ativar conta2';
}


?>
