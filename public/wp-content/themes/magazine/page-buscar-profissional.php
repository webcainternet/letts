<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
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
			<h1 class="post-title entry-title" itemprop="name"><a href="#">Profissional</a></h1>
				<div class="related-posts" style="float: left; width: 674px; margin-bottom: 30px;">

					<article class="post type-post clearfix">
						<div class="post-content">
							<p class="post-meta">
								<span class="post-category"><a href="#">Resultado da busca por: </a></span>
							</p>

							<!-- Perfil -->
							<div style="margin: 0px; padding: 0px; margin-bottom: 50px;">
								<div style="background-color: #FAFAFA; padding: 10px; height: 150px; ">
									<!-- Image -->
									<div style="float: left; width: 150px; height: 150px; background-size: 150px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/2014/07/1098357_10200930179274639_1691402653_n.jpg');">
										&nbsp;
									</div>

									<!-- Image -->
									<div style="float: left; width: 494px; height: 150px; margin-left: 10px;">
										<div style="font-size: 1.0em; font-family: Oswald, sans-serif; text-transform: uppercase; color: #000;">Fernando de Figueiredo Mendes</div>
										<div style="text-transform: uppercase; letter-spacing: 1px; color: #555; font-size: .8em; font-weight: bold;">Fotógrafo</div>
										<div style="color: #999; font-size: .7em;">Lorem ipsom dolor si amet sobre minha historia dolor si amet dolor si amet sobre minha historia dolor si amet dolor si amet sobre minha historia dolor si amet sobre minha historia dolor si amet sobre minha historia dolor si amet sobre minha historia</div>
										<div style="text-transform: uppercase; color: #555; font-size: .8em; font-weight: bold;">Mora em: São Caetano do Sul</div>
									</div>
								</div>
								<div style="background-color: #FAFAFA; padding: 10px; padding-top: 0px; height: 150px; float: right; font-size: 1.0em; font-family: Oswald, sans-serif; text-transform: uppercase; color: #ff8920; height: 20px;">
									<a href="#" style="text-decoration: none;">Enviar mensagem</a> | <a href="#" style="text-decoration: none;">Visualizar perfil</a>
								</div>
							</div>

							<!-- Perfil -->
							<div style="margin: 0px; padding: 0px; margin-bottom: 50px;">
								<div style="background-color: #FAFAFA; padding: 10px; height: 150px; ">
									<!-- Image -->
									<div style="float: left; width: 150px; height: 150px; background-size: 220px 150px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/2014/08/iconprofessional.png');">
										&nbsp;
									</div>

									<!-- Image -->
									<div style="float: left; width: 494px; height: 150px; margin-left: 10px;">
										<div style="font-size: 1.0em; font-family: Oswald, sans-serif; text-transform: uppercase; color: #000;">Renato Botani</div>
										<div style="text-transform: uppercase; letter-spacing: 1px; color: #555; font-size: .8em; font-weight: bold;">Fotógrafo</div>
										<div style="color: #999; font-size: .7em;">Lorem ipsom dolor si amet sobre minha historia dolor si amet dolor si amet sobre minha historia dolor si amet dolor si amet sobre minha historia dolor si amet sobre minha historia dolor si amet sobre minha historia dolor si amet sobre minha historia</div>
										<div style="text-transform: uppercase; color: #555; font-size: .8em; font-weight: bold;">Mora em: São Caetano do Sul</div>
									</div>
								</div>
								<div style="background-color: #FAFAFA; padding: 10px; padding-top: 0px; height: 150px; float: right; font-size: 1.0em; font-family: Oswald, sans-serif; text-transform: uppercase; color: #ff8920; height: 20px;">
									<a href="#" style="text-decoration: none;">Enviar mensagem</a> | <a href="#" style="text-decoration: none;">Visualizar perfil</a>
								</div>
							</div>

							<!-- Perfil -->
							<div style="margin: 0px; padding: 0px; margin-bottom: 50px;">
								<div style="background-color: #FAFAFA; padding: 10px; height: 150px; ">
									<!-- Image -->
									<div style="float: left; width: 150px; height: 150px; background-size: 220px 150px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/2014/08/iconprofessional.png');">
										&nbsp;
									</div>

									<!-- Image -->
									<div style="float: left; width: 494px; height: 150px; margin-left: 10px;">
										<div style="font-size: 1.0em; font-family: Oswald, sans-serif; text-transform: uppercase; color: #000;">Gabriel Alberto</div>
										<div style="text-transform: uppercase; letter-spacing: 1px; color: #555; font-size: .8em; font-weight: bold;">Fotógrafo</div>
										<div style="color: #999; font-size: .7em;">Lorem ipsom dolor si amet sobre minha historia dolor si amet dolor si amet sobre minha historia dolor si amet dolor si amet sobre minha historia dolor si amet sobre minha historia dolor si amet sobre minha historia dolor si amet sobre minha historia</div>
										<div style="text-transform: uppercase; color: #555; font-size: .8em; font-weight: bold;">Mora em: São Caetano do Sul</div>
									</div>
								</div>
								<div style="background-color: #FAFAFA; padding: 10px; padding-top: 0px; height: 150px; float: right; font-size: 1.0em; font-family: Oswald, sans-serif; text-transform: uppercase; color: #ff8920; height: 20px;">
									<a href="#" style="text-decoration: none;">Enviar mensagem</a> | <a href="#" style="text-decoration: none;">Visualizar perfil</a>
								</div>
							</div>




						</div>
					</article>

				</div>

			</div>

			<!-- Login -->
			<div id="divFiltro">
				<?php include("includes/side-filtro-profissional.php"); ?>
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

<?php get_footer(); ?>