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
	<div style="border-top: 5px #ff8920 solid; background-image: url('http://letts.com.br/wp-content/uploads/2014/07/10518313_10203231840894741_1752361656284860759_o.jpg'); background-size: 1064px; background-position:center; height: 400px;">
		<div style="float: left; margin: 10px; border: 2px #ff8920 solid; width: 180px; height: 180px; margin-top: 206px; background-image: url('http://letts.com.br/wp-content/uploads/2014/07/1098357_10200930179274639_1691402653_n.jpg'); background-size: 180px; background-position:center; ">
			&nbsp;
		</div>
	</div>

	<div id="contentwrap">
	

	<?php if( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<?php themify_content_before(); // hook ?>
		<!-- content -->
		<div id="content" class="list-post">
			<?php themify_content_start(); // hook ?>

			<?php get_template_part( 'includes/loop' , 'single'); ?>


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