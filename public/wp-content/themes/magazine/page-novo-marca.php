<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>


<?php
	if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST) ) {

		$titulo = $_POST['nomecompleto'];

		$my_post = array(
		'post_type'     => 'marca',
		'post_title'    => $titulo,
		'post_status'   => 'publish',
		'post_author'   => 1
		);

		// Insere e retorna o id do post
		$pid = wp_insert_post( $my_post );

		// Salva os Custom content type de acordo com o Post_id retornado
		update_post_meta($pid, 'basicaemail', $_POST['basicaemail']);
		update_post_meta($pid, 'senha', $_POST['senha']);
		?>
		<script type="text/javascript">
			window.location = "http://letts.com.br/?p=<?php echo $pid; ?>"
		</script>
		<?php
		exit;
	}
?>


<?php get_header(); ?>



<?php 
/** Themify Default Variables
 *  @var object */
global $themify; ?>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

	<div id="contentwrap" style="width: 100%;padding-top: 0px;">

		<div id="content" class="list-post">

			<div style="float: left; width: 674px; padding-top: 10px;">
			<h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;">Perfil: Marca</h1>
				<div class="related-posts" style="float: left; width: 674px; margin-bottom: 30px;">
					

					<article class="post type-post clearfix">
						<div class="post-content">
							<p class="post-meta">
								<span class="post-category"><a href="#">Crie seu perfil com o facebook</a></span>
							</p>

							<p>
								<div style="text-align: left; margin-top: 10px; margin-left: 150px;">
									<a href="#" onclick="nowblock()"><img src="http://letts.com.br/wp-content/uploads/2014/08/facebook-login-button.png"></a>
								</div>
							</p>
						</div>
					</article>
					

					<article class="post type-post clearfix">
						<div class="post-content">
							<p class="post-meta">
								<span class="post-category"><a href="#">Criar perfil através do site</a></span>
							</p>
							<form id="new_post" method="post" action="">
								<div style="margin-left: 150px; margin-top: 30px;">
									<div style="text-align: center; margin-top: 10px; text-align: left;">
										<p class="post-meta" style="margin-left: 25px;">
											<span class="post-category"><a href="#">Nome da marca:</a> / </span>
										</p>
										<h1 class="post-title" style="margin-left: 25px;">
											<input id="nomecompleto" name="nomecompleto" type="text" value="" size="30" class="required">
										</h1>
									</div>

									<div style="text-align: center; margin-top: 10px; text-align: left;">
										<p class="post-meta" style="margin-left: 25px;">
											<span class="post-category"><a href="#">E-mail:</a> / </span>
										</p>
										<h1 class="post-title" style="margin-left: 25px;">
											<input id="basicaemail" name="basicaemail" type="text" value="" size="30" class="required">
										</h1>
									</div>

									<div style="text-align: center; margin-top: 10px; text-align: left;">
										<p class="post-meta" style="margin-left: 25px;">
											<span class="post-category"><a href="#">Senha:</a> / </span>
										</p>
										<h1 class="post-title" style="margin-left: 25px;">
											<input id="senha" name="senha" type="password" value="" size="20" class="required">
										</h1>

										<h1 class="post-title" style="margin-left: 25px;">
											<input id="senha2" name="senha2" type="password" value="" size="20" class="required"><label style="font-size: 10px;"> * Confirme a senha</label>
										</h1>
									</div>

									<div style="text-align: center; margin-top: 10px; text-align: left;">
										<h1 class="post-title" style="margin-left: 25px;">
											<input type="checkbox" name="termos" value="termos">Li e aceito as <a target="_blank" href="http://letts.com.br/politicas-de-privacidade/">políticas de uso</a>
										</h1>
									</div>

									<div style="text-align: right; margin-right: 25px;">
										<input name="submit" type="submit" id="criar" value="Criar Conta">
									</div>
								</div>
							</form>
						</div>
					</article>

				</div>

			</div>

			<!-- Login -->
			<div id="divLogin">
				<?php include("includes/side-login.php"); ?>
			</div>

			<!-- Login -->
			<div id="divNovo" style="display: none;">
				<?php include("includes/side-novoperfil.php"); ?>
			</div>

		</div>



		<div style="float: left; width: 100%; margin-top: 10px;">
			<div class="related-posts">
				<h4 class="related-title" style="margin-bottom: 15px; border: 0px;">Marcas</h4>
				<div class="related-posts" style="float: left; width: 100%;">
					<article class="post type-post clearfix">
						<div class="post-content">
							
							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/08/ripcurl-logo-1.png">
							</div>

							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/08/nike-logo-sfo6hqef.jpg">
							</div>

							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/08/adidas-logo.jpg">
							</div>

							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/08/ripcurl-logo-1.png">
							</div>

							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/08/adidas-logo.jpg">
							</div>

							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/08/ripcurl-logo-1.png">
							</div>


						</div>
					</article>
				</div>
			</div>
			<p class="post-meta" style="text-align: right;">
				<span class="post-category"><a href="#">Ver mais marcas</a> / </span>
			</p>
		</div>

	</div>
</div>
	<!-- /#contentwrap -->

	

</div>
<!-- /layout-container -->

<script type="text/javascript">
	document.getElementById("divLogin").style.display="none";
	document.getElementById("divNovo").style.display="block";
</script>

<?php get_footer(); ?>