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

	
		
	<img src="http://letts.com.br/wp-content/uploads/2014/07/nike-ronalod-orange-mercurial-vapor-c_1600x1200_83114.jpg" width="100%">

<div style="float: left;
				margin: 15px;
				margin-left: 25px;">
		<h1 class="post-title entry-title" itemprop="name">
			<a href="#" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h1>
	</div>

<?php the_content(); ?>

<div>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet malesuada odio, sit amet tempor orci. Nullam at dolor eu tellus molestie porttitor. Phasellus porttitor augue sit amet magna lacinia convallis. Nullam malesuada felis sollicitudin nunc mollis, gravida accumsan enim commodo. Curabitur congue, augue non dictum bibendum, augue metus faucibus diam, sed tempus tortor diam vel leo. Donec volutpat pretium nibh, id accumsan diam congue at. Nullam urna lacus, imperdiet in augue sed, malesuada sodales lorem. Nam euismod magna eget risus adipiscing, imperdiet interdum neque pulvinar. Duis in posuere metus. Curabitur et tempor purus. Maecenas molestie, lorem suscipit tristique aliquam, turpis ante ultrices tortor, sit amet malesuada libero ligula nec lorem.
</div>
<br />
<div>
	Sed vel gravida sapien. Sed fermentum diam ligula, nec pulvinar est commodo eget. Nunc bibendum mi dapibus tellus porttitor, sit amet feugiat turpis volutpat. Maecenas nec arcu felis. Proin eleifend nisl eget euismod varius. Vestibulum in lectus sed ligula laoreet iaculis. Nunc eget nisl mollis, mollis risus at, elementum elit. Aenean congue accumsan enim, id vestibulum sapien mollis hendrerit. Aenean vestibulum diam a nunc cursus ullamcorper. Nam aliquet luctus erat non elementum. Etiam sagittis, nibh facilisis commodo rhoncus, ipsum metus ornare purus, a interdum tortor nulla ac sapien. Phasellus euismod eu ligula in lacinia. Nulla sit amet nulla rhoncus, bibendum dui porttitor, vestibulum eros. Aliquam erat volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
</div>
<br />

<div style="text-align: center; width: 100%;">
	<img src="http://letts.com.br/wp-content/uploads/2014/07/demo001.png">
</div>
<br />


<div style="float: right; background-color: #ff8920; color: white; padding: 10px;" >
	Enviar mensagem
</div>
<br />



<?php endwhile; ?>

</div>
<!-- /layout-container -->
	
<?php get_footer(); ?>