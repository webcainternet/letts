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

	$query1 = "INSERT INTO `letts`.`letts_comentarios` (`idlogin`, `data`, `mensagem`, `idpagina`) VALUES ('".$_SESSION["lettslogin"]."', CURRENT_TIMESTAMP, '".$_GET["mensagem"]."', '".$_GET["idpagina"]."')";
	$result=mysqli_query($con,$query1);

	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
}
/// FIM - PUBLICA COMENTARIO ///

/// REMOVE COMENTARIO ///
if (isset($_GET['rmcomentario']) && isset($_GET['idpagina']) && isset($_SESSION['lettslogin'])){
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query1 = "DELETE FROM `letts`.`letts_comentarios` WHERE idlogin = '".$_SESSION["lettslogin"]."' AND id = '".$_GET["rmcomentario"]."' AND idpagina = '".$_GET["idpagina"]."'";
	$result=mysqli_query($con,$query1);

	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
}
/// FIM - REMOVE COMENTARIO ///
?>







	<?php
			$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$query1 = "SELECT lc.*, p.post_title, lc.idlogin FROM letts_comentarios lc  inner join wp_posts p on lc.idlogin = p.id WHERE lc.idpagina = '".$idpagina."' ORDER BY lc.data DESC";

			$result=mysqli_query($con,$query1);

			while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
				<div class="comentario-body">
					<div class="comentario-foto">
						<a href="#" target="_blank">

							<?php 
								$post_usuario = $row["idlogin"];
								if ($post_usuario != 0) { ?>

							<?php query_posts( array('post_type'=>array('profissional','atleta','marca'),'p' => $post_usuario ) ); ?>

							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php $imgsize_top = get_custom_field('basicaimagem:to_image_src'); ?>
								<?php
									$imgsize_top = str_replace("letts.com.br/", "", $imgsize_top);
									$imgsize_top = str_replace("http://", "", $imgsize_top);
									$imgsize_top = str_replace("https://", "", $imgsize_top);
								?>
									
									<div style="margin-top: 0px; width: 40px; height: 40px; 
									background-image: url(<?php print_custom_field('basicaimagem:to_image_src'); ?>); 
									background-size: 40px 40px;" id="imgbackgroundtopo">&nbsp;</div>
									
								<?php endwhile; endif; ?>
								<?php wp_reset_query(); ?>
							<?php } ?>	

						</a>
					</div>

					<div class="comentario-texto">
						<div><a href="#" style="color: #ff8920; font-weight: bold; font-size: 14px;" target="_blank"><?php echo $row["post_title"]; ?></a></div>
						<div><?php echo $row["mensagem"]; ?></div>
						<div><?php if ($post_usuario == $_SESSION["lettslogin"] || $_GET['m'] == 1) { ?>
						<a style="color: #f57300;" onclick="javascript:removecomentario(<?php echo $row["id"]; ?>);"><div style="cursor: pointer;">Remover comentário</div></a>
						<?php } ?></div>
						<div class="comentario-data">Enviado: <?php echo $row["data"]; ?></div><div class="comentario-like"></div>
					</div>
				</div>
			<?php }

			// Free result set
			mysqli_free_result($result);
			mysqli_close($con);
	?>
	
</div>