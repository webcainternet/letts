<?php
/**
 * Template for site header
 * @package themify
 * @since 1.0.0
 */
?>
<?php include "logincheck.php"; ?>
<!doctype html>
<html <?php echo themify_get_html_schema(); ?> <?php language_attributes(); ?>>
<head>
<?php
/** Themify Default Variables
 *  @var object */
	global $themify; ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<title itemprop="name"><?php wp_title( '' ); ?></title>

<style type="text/css">
	.skiptranslate {
		display: none;
	}
	#goog-gt-tt { display:none !important; }
</style>

<!-- Facebook Like box -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=805023986191114";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- FIM Facebook Like box -->

<?php
/**
 *  Stylesheets and Javascript files are enqueued in theme-functions.php
 */
?>
<!-- wp_header -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



<div style="display: none;">
	<div>
		<div class="tool-items">
			<a id="btnTrEnglish" title="English" class="notranslate flag en tool-item gradient">English</a>
			<a id="btnTrFrench" title="French" class="notranslate flag fr tool-item gradient">French</a>
			<a id="btnTrPortuguese" title="Portuguese" class="notranslate flag pt tool-item gradient">Portuguese</a>
			<a id="btnTrSpanish" title="Spanish" class="notranslate flag es tool-item gradient">Spanish</a>
			<a id="btnTrDutch" title="Dutch" class="notranslate flag es tool-item gradient">Dutch</a>
			<a id="btnTrGerman" title="German" class="notranslate flag es tool-item gradient">German</a>
			<a id="btnTrItalian" title="Italian" class="notranslate flag es tool-item gradient">Italian</a>
		</div>
		<div class="arrow" style="left: auto; right: 67.4062px;"></div>
	</div>
</div>



<!-- Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1540707736203396&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<style type="text/css">
	.linkidioma {
	    text-decoration: none;
		margin-right: 7px;
		color: #fff;
		font-size: 0.65em;
		text-transform: uppercase;
	}
	.linkidioma:hover {
		color: #111;
	}
	#baridioma {
		display: none;
	}
	.changelgbr:hover {
		color: #ff8920;
	}
#glt-translate-trigger {
	display: none;
}

</style>

<script type="text/javascript">
	function AlteraIdiomabtnTrPortuguese() {
		$("#btnTrPortuguese").click();
	}
	function AlteraIdiomabtnTrEnglish() {
		$("#btnTrEnglish").click();
	}
	function AlteraIdiomabtnTrSpanish() {
		$("#btnTrSpanish").click();
	}
	function AlteraIdiomabtnTrFrench() {
		$("#btnTrFrench").click();
	}
	function AlteraIdiomabtnTrDutch() {
		$("#btnTrDutch").click();
	}
	function AlteraIdiomabtnTrGerman() {
		$("#btnTrGerman").click();
	}
	function AlteraIdiomabtnTrItalian() {
		$("#btnTrItalian").click();
	}
</script>

<?php themify_body_start(); // hook ?>
<div id="pagewrap" class="hfeed site">

	<div id="headerwrap">

		

		<div id="nav-bar">
			<div class="pagewidth clearfix">
				<?php if( has_nav_menu( 'top-nav' ) ) : ?>
					<a id="menu-icon-top" href="#top-nav"><i class="fa fa-list-ul icon-list-ul"></i></a>
					<?php if (function_exists('wp_nav_menu')) { ?>
					
					
						<div onmouseover="javascript:document.getElementById('baridioma').style.display = 'block';" style="float: left; margin-top: 3px; margin-right: 5px; height: 18px; color: #FFFFFF;"><a href="#" style="color: #fff; font-size: 0.75em;text-transform: uppercase;" class="changelgbr">Idioma ▾</a></div>

						<div onmouseover="javascript:document.getElementById('baridioma').style.display = 'block';" id="baridioma"  style="position: absolute; float: left; top: 30px; margin-left: 30px;z-index: 999; background-color: #ff8920; padding: 0px 0px 5px 5px;">
							<div onmouseout="javascript:document.getElementById('baridioma').style.display = 'none';" style="padding: 1px;">
								<a href="#" onclick="javascript:AlteraIdiomabtnTrPortuguese();" class="linkidioma"><div style="float: left; margin-top: 4px; margin-right: 5px; background: url('/wp-content/plugins/google-language-translator/images/flags.png') -116px -264px no-repeat; width: 24px; height: 18px; color: #FFFFFF;">&nbsp;</div>Português</a><br>
								<a href="#" onclick="javascript:AlteraIdiomabtnTrEnglish();" class="linkidioma"><div style="float: left; margin-top: 4px; margin-right: 5px; background: url('/wp-content/plugins/google-language-translator/images/flags.png') -116px -351px no-repeat; width: 24px; height: 18px; color: #FFFFFF;">&nbsp;</div>Inglês</a><br>
								<a href="#" onclick="javascript:AlteraIdiomabtnTrSpanish();" class="linkidioma"><div style="float: left; margin-top: 4px; margin-right: 5px; background: url('/wp-content/plugins/google-language-translator/images/flags.png') -0px -322px no-repeat; width: 24px; height: 18px; color: #FFFFFF;">&nbsp;</div>Espanhol</a><br>
								<a href="#" onclick="javascript:AlteraIdiomabtnTrFrench();" class="linkidioma"><div style="float: left; margin-top: 4px; margin-right: 5px; background: url('/wp-content/plugins/google-language-translator/images/flags.png') -116px -90px no-repeat; width: 24px; height: 18px; color: #FFFFFF;">&nbsp;</div>Frances</a><br>
								<a href="#" onclick="javascript:AlteraIdiomabtnTrDutch();" class="linkidioma"><div style="float: left; margin-top: 4px; margin-right: 5px; background: url('/wp-content/plugins/google-language-translator/images/flags.png') -145px -61px no-repeat; width: 24px; height: 18px; color: #FFFFFF;">&nbsp;</div>Holandês</a><br>
								<a href="#" onclick="javascript:AlteraIdiomabtnTrGerman();" class="linkidioma"><div style="float: left; margin-top: 4px; margin-right: 5px; background: url('/wp-content/plugins/google-language-translator/images/flags.png') -29px -119px no-repeat; width: 24px; height: 18px; color: #FFFFFF;">&nbsp;</div>Alemão</a><br>
								<a href="#" onclick="javascript:AlteraIdiomabtnTrItalian();" class="linkidioma"><div style="float: left; margin-top: 4px; margin-right: 5px; background: url('/wp-content/plugins/google-language-translator/images/flags.png') -58px -177px no-repeat; width: 24px; height: 18px; color: #FFFFFF;">&nbsp;</div>Italiano</a>




							</div>
						</div>
					</nav>

					<nav id="top-nav-sidr" class="top-nav-sidr">
						<?php wp_nav_menu(array('theme_location' => 'top-nav' , 'fallback_cb' => '' , 'container'  => '' , 'menu_id' => 'top-nav' , 'menu_class' => 'top-nav')); ?>
					</nav>
					<?php } ?>
				<?php endif; ?>


				



				<div class="social-widget" style="margin-top: 4px;">

				<?php 
				$post_usuario = $_SESSION["lettslogin"];
					if ($post_usuario != 0) { ?>

				<?php query_posts( array('post_type'=>array('profissional','atleta','marca'),'p' => $post_usuario ) ); ?>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php $imgsize_top = get_custom_field('basicaimagem:to_image_src'); ?>
					<?php
						$imgsize_top = str_replace("letts.com.br/", "", $imgsize_top);
						$imgsize_top = str_replace("http://", "", $imgsize_top);
						$imgsize_top = str_replace("https://", "", $imgsize_top);
					?>
						
						<div style="float: left; margin-right: 7px; border: 0px solid rgb(255, 137, 32); 
						border-radius: 2px; width: 22px; height: 22px; 
						background-image: url(<?php print_custom_field('basicaimagem:to_image_src'); ?>); 
						<?php echo calcbackgroundsize($imgsize_top, 22, 22); ?>" id="imgbackgroundtopo">&nbsp;</div>
						
					<?php endwhile; endif; ?>
					<?php wp_reset_query(); ?>
				<?php } ?>	


					<a href="/?p=<?php echo $_SESSION["lettslogin"]; ?>" style="text-decoration: none;margin-right: 7px;color: #fff;font-size: 0.75em;text-transform: uppercase;">
						<?php // echo $letts_nome; ?>
						<?php
						$pos = strpos($letts_nome." ", ' ');
						echo substr($letts_nome, 0,$pos); 
						?>
					</a>
					|&nbsp;
					<a href="/" style="text-decoration: none;margin-right: 7px;color: #fff;font-size: 0.75em;text-transform: uppercase;">
						Página inicial
					</a>
					

					<?php if ($letts_nome != "VISITANTE") { ?>
					<a href="/wp-content/themes/magazine/logout.php" style="text-decoration: none;margin-right: 7px;color: #fff;font-size: 0.75em;text-transform: uppercase;">
						(Sair)
					</a>
					<?php } else { ?>
						<style type="text/css">
						.criarcontalink a:hover {
							color: #FFFFFF !important;
						}
						</style>
						
						<div style="float: right;">
							<div class="related-posts criarcontalink" style="height: 30px;">
								<div style="text-align: right; padding: 0px 0px;">
									<a href="/wp-content/themes/magazine/logout.php" id="criar" style="background: #f57300; text-decoration: none; padding: 0px; padding-left: 10px; padding-right: 10px; color: #FFFFFF;">
										Criar Nova Conta
									</a>
								</div>
								<br>					
							</div>
						</div>

				 <?php } ?>



				</div>

				<div class="social-widget">
					<?php dynamic_sidebar('social-widget'); ?>

					<?php if(!themify_check('setting-exclude_rss')): ?>
						<div class="rss">
							<a href="<?php themify_theme_feed_link(); ?>" class="hs-rss-link">
								<i class="fa fa-icon icon-rss"></i>
							</a>
						</div>
					<?php endif ?>
				</div>

				<!-- /.social-widget -->

				<?php if(!themify_check('setting-exclude_search_form')): ?>
					<div id="searchform-wrap">
						<div id="search-icon" class="mobile-button"></div>
						<?php get_search_form(); ?>
					</div>
					<!-- /#searchform-wrap -->
				<?php endif ?>

			</div>
		</div>
		<!-- /#nav-bar -->
    
		<?php themify_header_before(); // hook ?>

		<header id="header" class="pagewidth clearfix">

			<?php themify_header_start(); // hook ?>

			<hgroup>
				<?php echo themify_logo_image('site_logo'); ?>
			</hgroup>

			<a id="menu-icon" href="#sidr"><i class="fa fa-list-ul icon-list-ul"></i></a>
			<nav id="sidr">
				<?php themify_theme_main_menu(); ?>
				<!-- /#main-nav --> 
			</nav>

			<?php themify_header_end(); // hook ?>

		</header>
		<!-- /#header -->

        <?php themify_header_after(); // hook ?>
				
	</div>
	<!-- /#headerwrap -->

	<div class="header-widget pagewidth">
		<?php dynamic_sidebar('header-widget'); ?>
	</div>
	<!--/header widget -->

	<?php /* if( '' != themify_get('setting-breaking_news') ) : ?>
		<?php get_template_part( 'includes/breaking-news'); ?>
	<?php endif; // end breaking news */ ?>
	
	<div id="body" class="clearfix">

    <?php themify_layout_before(); //hook ?>


    
<script type="text/javascript">
	function nowblock() {
		alert('Area não liberada!');
	}
	function goatleta() {
		window.location = "http://letts.com.br/nenhum-atleta-cadastrado/";
	}
	function goprofissional() {
		window.location = "http://letts.com.br/nenhum-profissional-cadastrado/";
	}	
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#criar").click(function(){
    $("#divLogin").fadeOut(1000);

    $("#divNovo").delay(1000).fadeIn(1000);
  });
});
</script>

<style type="text/css">
	.titulosmateriahome {
		font-weight: bold;
		font-size: 22px;
		font-family: Oswald, sans-serif;
	}
	.btntextarea {
		height: 200px;
	}
	.btntext {
		width: 250px; height: 14px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;
	}

	.wcalogos {
		width: 15%;
		float: left;
		margin: 5px;
		text-align: center;
	}
	.wcsimglogos {
		width: 145px;
		text-align: center;
	}
	.novoperf {
		border: solid 3px #C0C0C0;
		border-radius: 5px;
	}

	.novoperf:hover {
		border: solid 3px #ff8920;
		border-radius: 5px;
	}

	.imgnoticias {
		border: solid 3px #FFFFFF;
		border-radius: 5px;
	}

	.imgnoticias:hover {
		border: solid 3px #ff8920;
		border-radius: 5px;
	}


	.selectitens {
		border: 1px solid;
		height: 32px;
		width: 162px;
		font-size: 100%;
		font-family: "Segoe UI","Segoe UI Web Regular","Segoe UI Symbol","Helvetica Neue","BBAlpha Sans","S60 Sans",Arial,sans-serif;
		line-height: 142%;
		background-color: rgb(248, 248, 248);
		border: 1px solid rgb(166, 166, 166);
		border-image-source: initial;
		border-image-slice: initial;
		border-image-width: initial;
		border-image-outset: initial;
		border-image-repeat: initial;
		-webkit-appearance: menulist;
		box-sizing: border-box;
		align-items: center;
		border: 1px solid;
		border-image-source: initial;
		border-image-slice: initial;
		border-image-width: initial;
		border-image-outset: initial;
		border-image-repeat: initial;
		white-space: pre;
		-webkit-rtl-ordering: logical;
		color: #666;
		background-color: white;
		cursor: default;
		border-radius: 5px;
	}
	.textinput {
		width: 250px;
		height: 14px;
		background-color: #FFFFFF;
		border: solid 1px;
		border-radius: 5px;
	}

</style>

<style type="text/css">
	/* Transitions */
	.transition-050 {
	  -moz-transition: 0.50s;
	  -webkit-transition: 0.50s;
	  -ms-transition: 0.50s;
	  -o-transition: 0.50s;
	  transition: 0.50s;
	}
	.opacity85{ 
	  opacity: 0.85; 
	  filter: alpha(opacity=85); 
	}
	.module { max-width: 100%; margin:auto; }
	.module figure {
	  position: relative;
	  overflow: hidden;
	  border:1px solid #fff;
	  -moz-box-sizing: border-box;
	  -webkit-box-sizing: border-box;
	  box-sizing: border-box;
	}
	.module .small {
	  float: left;
	  width: 20%;
	}
	.module figure img {
	  display: block;
	  max-width: 100%;
	}
	.module figcaption {
	  position: absolute;
	  bottom: 0px;
	  width: 100%;
	  max-height: 27px;
	}
	.module .text {
	  color: #fff;
	  background-color: #000;
	  font-size:0.90em;
	}
	.module figure:hover figcaption { max-height: 100%;}
	.module figure:hover figcaption .text {
	  background-color: #000;
	  color:#fff;
	}
	.module figcaption a { display: block; text-decoration:none; }
	.module .title {
	  display: inline-block;
	  padding: 5px;
	  text-transform:uppercase;  
	}
	.module .desc {
	  display: block;
	  padding: 15px;
	}
	.bgcolor {
	  background-color: #fff;
	}
</style>