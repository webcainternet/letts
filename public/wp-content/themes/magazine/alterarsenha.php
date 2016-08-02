<?php include "../../../wp-config.php"; ?>
<?php include "logincheck.php"; ?>
<?php
/**
 * Alterar Senha
 */
 $host = DB_HOST;
 $user = DB_USER;
 $pass = DB_PASSWORD;

if ($_SESSION['lettslogin'] > 1 && isset($_POST['senha'])) {
  //var_dump($_SESSION);
  $sql = "update wp_postmeta pm set pm.meta_value = '".$_POST['senha']."' WHERE pm.post_id = ". $_SESSION['lettslogin'] ." AND pm.meta_key = 'senha'";

	$mysqli = new mysqli($host, $user, $pass, DB_NAME);

	if (mysqli_connect_errno()) {
    	printf("Connect failed: %s\n", mysqli_connect_error());
    echo 'Falha ao alterar a senha';
    exit();
	}
	$result = $mysqli->query($sql);
  echo 'Senha alterada com sucesso!';
} else {
  echo 'Falha ao alterar a senha';
}


?>
