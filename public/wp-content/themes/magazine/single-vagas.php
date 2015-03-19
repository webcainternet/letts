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


<div id="layout" class="pagewidth clearfix">

	<div id="contentwrap">

	<?php if( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<div id="content" class="list-post">
	<div id="vagas" style="float: left; width: 650px; margin-left: 20px;">
	    <div class="vaga">
	      <div style="margin-top: 0px; color: #666; font-size: 12px;">Data de postagem: <?php echo mysql2date('j/m/Y', $post->post_date); ?></div>
	      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;"><center><?php the_title(); ?></center></strong></div>
	      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;"><center><?php print_custom_field('basicacidadeatual'); ?> - <?php print_custom_field('basicaestadoatual'); ?></center></strong></div>
	      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Empresa: </strong><br /><?php print_custom_field('empresa'); ?></div>
	      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Contato: </strong><br /> <?php print_custom_field('basicaemail'); ?></div>
	      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Descrição: </strong><br /> <?php the_content(); ?></div>
	      <div style="margin-top: 10px; color: #666; text-align: right;"><a href="mailto:<?php print_custom_field('basicaemail'); ?>?subject=<?php the_title(); ?>"><input type="submit" value="Enviar currículo" style="margin-top: 16px;"></a></div>

		  <div class="fb-like" style="margin-top: 30px;" data-href="<?php the_permalink(); ?>" data-width="100%" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>

	    </div>
</div>
		
		</div>
	<?php endwhile; ?>

	</div>

	<?php
	if ($themify->layout != "sidebar-none"): get_sidebar(); endif; ?>

</div>

	

</div>
<!-- /layout-container -->
	
<?php get_footer(); ?>