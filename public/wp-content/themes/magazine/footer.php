
<!-- POP INFO -->
<style type="text/css">
  .orctext {
    padding: 15px;
    color: #555;
    font-size: 14px;
    border-radius: 5px;
    border: solid 1px #DDD;
  }

  .orcpop {
    background-color: #eee;
    border: solid 5px #f57300;
    position: fixed;
    bottom: 15px;
    left: 15px;
    padding: 20px;
    color: #333;
    border-radius: 5px;
    font-family: 'Open Sans', sans-serif;
    z-index: 99999;
    font-size: 16px;
    /* display: none; */
  }
  .orcpoperro {
    background-color: #eee;
    border: solid 5px #cc0000;
    position: fixed;
    bottom: 115px;
    left: 15px;
    padding: 20px;
    color: #333;
    border-radius: 5px;
    font-family: 'Open Sans', sans-serif;
    z-index: 99999;
    font-size: 13px;
    /* display: none; */
  }
</style>
<?php if ($_GET['msgsucess'] == 1) { ?> 
<div id="orcpop" class="orcpop"> <span style="font-weight: bold;">Sucesso!</span><br>
Cadastro realizado!
</div>

<script>
  $( document ).ready(function() {
    $("#orcpop").fadeIn(1000);
    $("#orcpop").delay(5000).fadeOut(1000);
  });
 </script>
 <?php } ?>

 <?php if ($_GET['msgsucess'] == 2) { ?> 
<div id="orcpop" class="orcpop"> <span style="font-weight: bold;">Sucesso!</span><br>
Alterações salvas!
</div>

<script>
  $( document ).ready(function() {
    $("#orcpop").fadeIn(1000);
    $("#orcpop").delay(5000).fadeOut(1000);
  });
 </script>
 <?php } ?>
 <!-- FIM POP INFO -->

<?php /* <div style="margin-bottom: 70px; width: 100%; margin: auto; float: left;margin-top: -90px;">
	<div style="margin: auto; width: 1130px;">
		<div class="fb-like" data-href="https://www.facebook.com/letts.global" data-width="1130" data-height="300" data-layout="standard" data-colorscheme="light" data-action="like" data-show-faces="true" data-share="true" data-header="false" data-stream="false" data-show-border="false"></div>
	</div>
</div>
*/ ?>
<?php
/**
 * Template for site footer
 * @package themify
 * @since 1.0.0
 */
?>
<?php
/** Themify Default Variables
 @var object */
	global $themify; ?>

	<?php themify_layout_after(); //hook ?>
    </div>
	<!-- /body -->
	

	<div id="footerwrap">

    
    	<?php themify_footer_before(); // hook ?>
		<footer id="footer" class="pagewidth clearfix">

			<?php themify_footer_start(); // hook ?>

			<p class="back-top">
				<a href="#header"><?php _e('Voltar', 'themify'); ?></a>
			</p>

			<?php get_template_part( 'includes/footer-widgets'); ?>

			<div class="social-widget">
				<?php dynamic_sidebar('footer-social-widget'); ?>
			</div>
			<!-- /.social-widget -->

			<div class="footer-nav-wrap">
				<?php if (function_exists('wp_nav_menu')) {
					wp_nav_menu(array('theme_location' => 'footer-nav' , 'fallback_cb' => '' , 'container'  => '' , 'menu_id' => 'footer-nav' , 'menu_class' => 'footer-nav'));
				} ?>
			</div>
	
			<div class="footer-text clearfix">
				<?php themify_the_footer_text(); ?>
				<?php /* themify_the_footer_text('right'); */ ?>Desenvolvido por <a href="http://webca.com.br/" target="_blank">WebCA Internet</a>
			</div>
			<!-- /footer-text --> 
			<?php themify_footer_end(); // hook ?>
		</footer>
		<!-- /#footer --> 
        <?php themify_footer_after(); // hook ?>
	</div>
	<!-- /#footerwrap -->
	
</div>
<!-- /#pagewrap -->

<?php
/**
 *  Stylesheets and Javascript files are enqueued in theme-functions.php
 */
?>

<?php themify_body_end(); // hook ?>
<!-- wp_footer -->
<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55075317-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>