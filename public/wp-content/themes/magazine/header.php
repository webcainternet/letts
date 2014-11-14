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

<title itemprop="name"><?php wp_title( '' ); ?></title>

<?php
/**
 *  Stylesheets and Javascript files are enqueued in theme-functions.php
 */
?>
<!-- wp_header -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php themify_body_start(); // hook ?>
<div id="pagewrap" class="hfeed site">

	<div id="headerwrap">

		<div id="nav-bar">
			<div class="pagewidth clearfix">
				<?php if( has_nav_menu( 'top-nav' ) ) : ?>
					<a id="menu-icon-top" href="#top-nav"><i class="fa fa-list-ul icon-list-ul"></i></a>
					<?php if (function_exists('wp_nav_menu')) { ?>
					<nav id="top-nav-sidr" class="top-nav-sidr">
						<?php wp_nav_menu(array('theme_location' => 'top-nav' , 'fallback_cb' => '' , 'container'  => '' , 'menu_id' => 'top-nav' , 'menu_class' => 'top-nav')); ?>
					</nav>
					<?php } ?>
				<?php endif; ?>

				<div class="social-widget" style="margin-top: 2px;"><a href="/?p=<?php echo $_SESSION["lettslogin"]; ?>" style="text-decoration: none;margin-right: 7px;color: #fff;font-size: 0.75em;text-transform: uppercase;"><?php echo $letts_nome; ?></a> <a href="/wp-content/themes/magazine/logout.php" style="text-decoration: none;margin-right: 7px;color: #fff;font-size: 0.75em;text-transform: uppercase;">(Sair)</a></div>

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