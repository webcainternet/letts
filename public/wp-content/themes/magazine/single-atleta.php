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
	<div style="border-top: 5px #ff8920 solid; 
				background-image: url('<?php print_custom_field('atletaimagembackground'); ?>'); 
				background-size: 1064px; 
				background-position:center; 
				height: 400px;">

		<div style="float: left;
					margin-left: 30px; 
					border: 2px #ff8920 solid; 
					width: 180px; 
					height: 180px; 
					margin-top: 280px; 
					background-image: url('http://letts.com.br/wp-content/uploads/2014/07/1098357_10200930179274639_1691402653_n.jpg'); 
					background-size: 180px; 
					background-position:center; ">
			&nbsp;
		</div>

		<div style="float: right;
					margin-left: 25px;
					margin-right: -25px;
					width: 180px;
					margin-top: 373px;
					color: #FFFFFF;
					background-size: 180px;
					background-position: center;">
			Skatista profissional
		</div>
	</div>
	<div style="border-top: 0px #ff8920 solid; 
				background-color: #DCDCDC; 
				background-size: 1064px; 
				background-position:center; 
				height: 90px;">

		<div style="float: right; 
					margin-top: 65px;
					border-bottom: 2px #ff8920 solid;
					text-align: center;
					padding-left: 2px;
					padding-right: 2px;
					text-transform: uppercase;
					margin-left: 5px;
					margin-right: 5px;
					font-size: 12px;">
			Mensagem
		</div>

		<div style="float: right; 
					margin-top: 65px;
					border-bottom: 2px #ff8920 solid;
					text-align: center;
					padding-left: 2px;
					padding-right: 2px;
					text-transform: uppercase;
					margin-left: 5px;
					margin-right: 5px;
					font-size: 12px;">
			Vídeos
		</div>

		<div style="float: right; 
					margin-top: 65px;
					border-bottom: 2px #ff8920 solid;
					text-align: center;
					padding-left: 2px;
					padding-right: 2px;
					text-transform: uppercase;
					margin-left: 5px;
					margin-right: 5px;
					font-size: 12px;">
			Fotos
		</div>

		<div style="float: right; 
					margin-top: 65px;
					border-bottom: 2px #ff8920 solid;
					text-align: center;
					padding-left: 2px;
					padding-right: 2px;
					text-transform: uppercase;
					margin-left: 5px;
					margin-right: 5px;
					font-size: 12px;">
			Sobre
		</div>

		<div style="float: left;
					margin: 15px;
					margin-left: 25px;">
			<h1 class="post-title entry-title" itemprop="name">
				<a href="#" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>
		</div>
		
	</div>

	<div class="footer-widgets clearfix" style="margin-top: 20px;">
				<div class="col3-1 first">
					<div id="text-1016" class="widget widget_text">
						<h4 class="widgettitle">Informações básicas</h4>			
						<div class="textwidget">
							<strong>Data de nascimento</strong><br />
							<?php print_custom_field('basicanascimento'); ?><br /><br />

							<strong>Gênero</strong><br />
							<?php print_custom_field('basicagenero'); ?><br /><br />
						</div>
					</div>			
				</div>

				<div class="col3-1 ">
					<div id="text-1017" class="widget widget_text">
						<h4 class="widgettitle">Informações de contato</h4>			
						<div class="textwidget">
							<strong>E-mail</strong><br />
							<?php print_custom_field('basicaemail'); ?><br /><br />

							<strong>Telefones</strong><br />
							<?php print_custom_field('basicatelefones'); ?><br /><br />

							<strong>Facebook</strong><br />
							<?php print_custom_field('basicafacebook'); ?><br /><br />
						</div>
					</div>			
				</div>

				<div class="col3-1 ">
					<div id="text-1018" class="widget widget_text">
						<h4 class="widgettitle">Locais onde morou</h4>			
						<div class="textwidget">
							<strong>Nascimento</strong><br />
							<?php print_custom_field('basicacidadenascimento'); ?>, <?php print_custom_field('basicaestadonascimento'); ?><br /><br />

							<strong>Atual</strong><br />
							<?php print_custom_field('basicacidadeatual'); ?>, <?php print_custom_field('basicaestadoatual'); ?><br /><br />


						</div>
					</div>			
				</div>
			</div>

	<div id="contentwrap">
	
		<div id="content" class="list-post">

			<strong>Minha história</strong><br />
			<?php the_content(); ?>

			<strong>Patrocínio ou apoio que esta procurando</strong> <br />
			<?php print_custom_field('atletapatrocinio'); ?><br /><br />

			<strong>Meu sonho</strong><br />
			<?php print_custom_field('atletameusonho'); ?><br /><br />

			<strong>Esporte</strong><br />
			<?php print_custom_field('atletaesporte'); ?><br /><br />


			
			<?php /*
			<strong>Imagem de perfil:</strong> <img src="<?php print_custom_field('basicaimagem:to_image_src'); ?>" /><br />
			<strong>Imagem de background</strong> <?php print_custom_field('atletaimagembackground'); ?><br />
			*/ ?>



		</div>
		<!-- /content -->
		<?php themify_content_after(); // hook ?>

	<?php endwhile; ?>

	</div>
	<!-- /#contentwrap -->

	<?php
	/////////////////////////////////////////////
	// Sidebar
	/////////////////////////////////////////////
	if ($themify->layout != "sidebar-none"): get_sidebar(); endif; ?>

</div>
<!-- /layout-container -->
	
<?php get_footer(); ?>