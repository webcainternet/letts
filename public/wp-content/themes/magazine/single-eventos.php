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
<div id="layout" class="pagewidth clearfix">

	<div class="logo_eventos" style="background: url('<?php print_custom_field('eventofoto:to_image_src'); ?>') no-repeat;"></div>

	<div style="float: left; margin: 15px; margin-left: 25px; width: 420px;">
		<h1 class="post-title entry-title" itemprop="name">
				<?php the_title(); ?> <span style="font-size: 18px;">(<?php print_custom_field('eventotipo'); ?>)</span>
		</h1>
		<p>Local: <?php print_custom_field('basicatelefones'); ?></p>
		<p>Data e Hora: <?php print_custom_field('basicatelefones'); ?></p>
		<p>Preço: <?php print_custom_field('basicatelefones'); ?></p>
		<p>Esporte: <?php print_custom_field('basicatelefones'); ?></p>
	</div>
	<div class="icones_sociais">
		<?php if (get_custom_field('basicafacebook')) { ?>
			<a href="<?php print_custom_field('basicafacebook'); ?>" target="_blank">
				<img src="/wp-content/themes/magazine/images/facebook.png">
			</a>
		<?php } ?>

		<?php if (get_custom_field('instagram')) { ?>
			<a href="<?php print_custom_field('instagram'); ?>" target="_blank">
				<img src="/wp-content/themes/magazine/images/instagram.png">
			</a>
		<?php } ?>

		<?php if (get_custom_field('twitter')) { ?>
			<a href="<?php print_custom_field('twitter'); ?>" target="_blank">
				<img src="/wp-content/themes/magazine/images/twitter.png">
			</a>
		<?php } ?>

		<?php if (get_custom_field('linkedin')) { ?>
			<a href="<?php print_custom_field('linkedin'); ?>" target="_blank">
				<img src="/wp-content/themes/magazine/images/linkedin.png">
			</a>
		<?php } ?>

		<?php if (get_custom_field('basicaemail')) { ?>
			<a href="<?php print_custom_field('basicaemail'); ?>" target="_blank">
				<img src="/wp-content/themes/magazine/images/contacts.png">
			</a>
		<?php } ?>

		<?php if (get_custom_field('blog')) { ?>
			<a href="<?php print_custom_field('blog'); ?>" target="_blank">
				<img src="/wp-content/themes/magazine/images/rss.png">
			</a>
		<?php } ?>								

		<?php if (get_custom_field('site')) { ?>
			<a href="<?php print_custom_field('site'); ?>" target="_blank">
				<img src="/wp-content/themes/magazine/images/domain.png">
			</a>
		<?php } ?>

	</div>

	<div class="description_marcas">
		<?php the_content(); ?>
	</div>

	<div class="formularios">
		
		<div class="mensagem_marca">
			<h1 class="post-title entry-title">Envie mensagem para a marca</h1>
			<form action="" method="post" id="formulario_mensagem">
				<input type="text" id="nome_msg" name="nome_msg" placeholder="Seu Nome">
				<input type="text" id="email_msg" name="email_msg" placeholder="Seu E-mail">
				<input type="text" id="assunto" name="assunto" placeholder="Assunto">
				<textarea id="mensagem" name="mensagem" placeholder="Mensagem para a Marca"></textarea>
				<input type="button" id="botao_mensagem" value="Enviar Mensagem">
			</form>
		</div>		
	</div>


<?php endwhile; ?>

</div>
<!-- /layout-container -->
	
<?php get_footer(); ?>