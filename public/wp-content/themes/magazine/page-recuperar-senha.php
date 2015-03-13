<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php // ******************* Start Header ******************* ?>
<?php
/**
 * Template for site header
 * @package themify
 * @since 1.0.0
 */
?>
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

		<div id="nav-bar" style="display: none;">
			<div class="pagewidth clearfix">
				<?php if( has_nav_menu( 'top-nav' ) ) : ?>
					<a id="menu-icon-top" href="#top-nav"><i class="fa fa-list-ul icon-list-ul"></i></a>
					<?php if (function_exists('wp_nav_menu')) { ?>
					<nav id="top-nav-sidr" class="top-nav-sidr">
						<?php wp_nav_menu(array('theme_location' => 'top-nav' , 'fallback_cb' => '' , 'container'  => '' , 'menu_id' => 'top-nav' , 'menu_class' => 'top-nav')); ?>
					</nav>
					<?php } ?>
				<?php endif; ?>

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

			<form action="/wp-content/themes/magazine/login.php" method="post">
				<div style="float: right; width: 500px;">
					<div style="float: left; width: 200px;">
						<div style="font-size: 10px; margin: 0px; padding: 0px; color: #FFF; font-weight: bold;">Email</div>
						<div style="font-size: 10px; margin: 0px; padding: 0px;"><input name="loginemail" type="text" style="margin: 0px; border-radius: 0px;"></div>
						<div style="font-size: 10px; margin: 0px; padding: 0px; color: #ffca9a;"><input type="checkbox" value="1" checked="1">Manter-me conectado</div>
					</div>
					<div style="float: left; width: 200px;">
						<div style="font-size: 10px; margin: 0px; padding: 0px; color: #FFF; font-weight: bold;">Senha</div>
						<div style="font-size: 10px; margin: 0px; padding: 0px;"><input name="loginsenha" type="password" style="width: 240px; max-width: 90%;margin: 0px; border-radius: 0px;"></div>
						<div style="font-size: 10px; margin: 0px; padding: 0px; color: #ffca9a;">Esqueci minha senha</div>
					</div>
					<div style="float: left; width: 50px;">
						<input type="submit" value="Entrar" style="margin-top: 25px;">
					</div>
				</div>
			</form>

			<nav id="sidr"  style="display: none;">
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
	
	<div id="body" class="clearfix"  style="padding: 0px;">

    <?php themify_layout_before(); //hook ?>




<?php // ******************* Fim Header ******************* ?>

<?php 
/** Themify Default Variables
 *  @var object */
global $themify; ?>

<?php 
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);

	if ($_POST) {
		$sql_senha = mysql_query("SELECT meta_value FROM wp_postmeta where meta_key = 'senha' AND post_id in (
					SELECT `m`.`post_id` FROM wp_postmeta m
					INNER JOIN wp_posts p ON `m`.`post_id` = `p`.`ID`
					WHERE `m`.`meta_value` = '".$_POST['email']."'
					AND `p`.`post_type` in ('atleta', 'marca', 'profissional') );");
		while ($row = mysql_fetch_array($sql_senha, MYSQL_ASSOC)) {
			$senha = $row['meta_value'];
			
				$destinatario = $_POST['email'];  

			    $headers = "From: contato@letts.com.br \r\n";
			    $headers.= "Content-Type: text/html; charset=ISO-8859-1 ";
			    $headers.= "MIME-Version: 1.0 ";    

			    $html = 'Sua senha para acesso ao site é: '.$senha;

			    mail($destinatario,"Nova senha para acesso do site Letts Global",$html,$headers);

			    echo '<div class="div_esqueci">Senha enviada com sucesso.</div>';
		}
		
		if (!$senha) {	
			echo '<div class="div_esqueci">E-mail não identificado, por favor entre em contato com o administrador do site.</div>';
		}	

	}	
?>



<div id="layout" class="pagewidth clearfix">

	<div id="contentwrap" style="width: 100%; padding-top: 0px;">

		<div id="content" class="list-post" style="width: 450px;text-align: center;margin: 0 auto;padding: 10px 0px 30px;">
			<h1 style="text-transform: uppercase; margin-bottom: -13px; font-weight: bold;">Recuperar Senha</h1>
			<p style="margin: 4px 0px 20px;">Digite abaixo seu e-mail para recuperar sua senha.</p>

			<form id="recuperar_senha" name="recuperar_senha" method="post" action="" enctype="multipart/form-data">
				<input type="text" name="email" placeholder="E-mail" style="width: 450px; padding-left: 10px;">
				<input type="submit" value="Recuperar Senha" class="button">
			</form>

		</div>
	</div>
</div>

<!-- /layout-container -->
	
<?php // ******************** Footer *************************** ?>
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
			<p>&nbsp;</p>
			<div class="social-widget">
				<?php dynamic_sidebar('footer-social-widget'); ?>
			</div>
			<!-- /.social-widget -->

			<div class="footer-nav-wrap">
				<ul id="footer-nav" class="footer-nav">
					<li id="menu-item-2497" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2497"><a href="http://letts.com.br/news/?visitante=1">News</a></li>
					<li id="menu-item-2702" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2702"><a href="http://letts.com.br/contato/?visitante=1">Contato</a></li>
					<li id="menu-item-2685" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2685"><a href="http://letts.com.br/politicas-de-privacidade/?visitante=1">Políticas de Privacidade</a></li>
				</ul>
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