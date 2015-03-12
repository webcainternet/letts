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


	<?php if( have_posts() ) while ( have_posts() ) : the_post(); ?>


		<!-- content -->

<!-- layout-container -->
	<div style="background-image: url('<?php print_custom_field('atletaimagembackground:to_image_src'); ?>'); 
				background-size: 1064px; 
				background-position:center; 
				height: 400px;"></div>
<div id="layout" class="pagewidth clearfix">
	<div class="logo_eventos" style="background: url('<?php print_custom_field('eventofoto:to_image_src'); ?>') no-repeat;"></div>

	<div style="float: left; margin: 15px; margin-left: 25px; width: 420px;">
		<h1 class="post-title entry-title" itemprop="name">
				<?php the_title(); ?> <!--<span style="font-size: 18px;">(<?php print_custom_field('eventotipo'); ?>)</span>-->
		</h1>
		<!--<p>Local: <?php print_custom_field('basicatelefones'); ?></p>
		<p>Data e Hora: <?php print_custom_field('basicatelefones'); ?></p>
		<p>Preço: <?php print_custom_field('basicatelefones'); ?></p>
		<p>Esporte: <?php print_custom_field('basicatelefones'); ?></p>-->

		<div style="width: 500px;">
			<?php the_content(); ?>
		</div>
		<p>Tipo do Evento: <?php print_custom_field('eventotipo'); ?></p>
		<?php 
			$tipo_evento = get_custom_field('eventotipo');
			if ($tipo_evento == 'Campeonato') { ?>
				<a href="<?php print_custom_field('link_ingresso'); ?>" target="_blank" class="button">Realizar Inscrição</a>
			<?php }elseif (get_custom_field('link_ingresso')) { ?>
				<a href="<?php print_custom_field('link_ingresso'); ?>" target="_blank" class="button">Comprar Ingresso</a>	.
			<?php } ?>
	</div>

<!--<div class="mensagem_marca" style="margin-top: 30px;">
			<h1 class="post-title entry-title">Envie mensagem para a marca</h1>
			<form action="" method="post" id="formulario_mensagem">
				<input type="text" id="nome_msg" name="nome_msg" placeholder="Seu Nome">
				<input type="text" id="email_msg" name="email_msg" placeholder="Seu E-mail">
				<input type="text" id="assunto" name="assunto" placeholder="Assunto">
				<textarea id="mensagem" name="mensagem" placeholder="Mensagem para a Marca"></textarea>
				<input type="button" id="botao_mensagem" value="Enviar Mensagem">
			</form>
		</div>	
-->

<?php endwhile; ?>

</div>
<!-- /layout-container -->
	
<?php get_footer(); ?>