<meta charset="UTF-8">
<?php include "../../../wp-config.php"; ?>
<?php include "logincheck.php"; ?>

<?php $idpagina = $_GET["idpagina"]; ?>

<?php
/// PUBLICA COMENTARIO ///
if (isset($_GET['mensagem']) && isset($_GET['idpagina']) && isset($_SESSION['lettslogin'])){
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query1 = "INSERT INTO `letts`.`letts_comentarios` (`id`, `idlogin`, `data`, `mensagem`, `idpagina`) VALUES (NULL, '".$_SESSION["lettslogin"]."', CURRENT_TIMESTAMP, '".$_GET["mensagem"]."', '".$_GET["idpagina"]."')";
	$result=mysqli_query($con,$query1);

	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
}
/// FIM - PUBLICA COMENTARIO ///
?>







	<?php
			$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$query1 = "SELECT lc.*, p.post_title FROM letts_comentarios lc  inner join wp_posts p on lc.idlogin = p.id WHERE lc.idpagina = '".$idpagina."' ORDER BY lc.data DESC";

			$result=mysqli_query($con,$query1);

			while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
				<div class="comentario-body">
					<div class="comentario-foto">
						<a href="#" target="_blank">
							<img class="_1ci" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xtp1/v/t1.0-1/p40x40/12141696_10206510530059921_6521226772923966991_n.jpg?oh=15602d3ab06936677ee89e1bd6ff7948&amp;oe=56D831FC&amp;__gda__=1458042672_9d06af294364e26c728f86020161239f">
						</a>
					</div>

					<div class="comentario-texto">
						<div><a href="#" style="color: #ff8920; font-weight: bold; font-size: 14px;" target="_blank"><?php echo $row["post_title"]; ?></a></div>
						<div><?php echo $row["mensagem"]; ?></div>
						<div class="comentario-data">Enviado: <?php echo $row["data"]; ?></div><div class="comentario-like"><!-- Curtir --></div>
					</div>
				</div>
			<?php }

			// Free result set
			mysqli_free_result($result);
			mysqli_close($con);
	?>






	
</div>