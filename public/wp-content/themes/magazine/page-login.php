<?php
session_start();
$letts_nome = "VISITANTE";
$_SESSION["lettslogin"] = 1;
?>

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

//atleta
$(document).ready(function(){
    //passagens
	$("#imagematleta01").fadeIn(1000);
    $("#imagematleta02").fadeIn(1000);
    $("#imagematleta03").fadeIn(1000);
    $("#imagematleta04").fadeIn(1000);

    var fadedelay = 1000;
    fadedelay = fadedelay + 1000;

    for(var start = 1; start < 10; start++) {
		//Altera 1
	    $("#imagematleta01").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagematleta05").delay(fadedelay).fadeIn(1000);

	    //Altera 2
	    fadedelay = fadedelay + 1000;
	    $("#imagematleta02").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagematleta06").delay(fadedelay).fadeIn(1000);

	    //Altera 3
	    fadedelay = fadedelay + 1000;
	    $("#imagematleta03").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagematleta07").delay(fadedelay).fadeIn(1000);

	    //Altera 4
	    fadedelay = fadedelay + 1000;
	    $("#imagematleta04").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagematleta08").delay(fadedelay).fadeIn(1000);

		//Altera 1
		fadedelay = fadedelay + 1000;
	    $("#imagematleta05").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagematleta01").delay(fadedelay).fadeIn(1000);

	    //Altera 2
	    fadedelay = fadedelay + 1000;
	    $("#imagematleta06").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagematleta02").delay(fadedelay).fadeIn(1000);

	    //Altera 3
	    fadedelay = fadedelay + 1000;
	    $("#imagematleta07").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagematleta03").delay(fadedelay).fadeIn(1000);

	    //Altera 4
	    fadedelay = fadedelay + 1000;
	    $("#imagematleta08").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagematleta04").delay(fadedelay).fadeIn(1000);
    }
});

//profissional
$(document).ready(function(){
    //passagens
	$("#imagemprofissional01").fadeIn(1000);
    $("#imagemprofissional02").fadeIn(1000);
    $("#imagemprofissional03").fadeIn(1000);
    $("#imagemprofissional04").fadeIn(1000);

    var fadedelay = 1000;
    fadedelay = fadedelay + 1000;

    for(var start = 1; start < 10; start++) {
		//Altera 1
	    $("#imagemprofissional01").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemprofissional05").delay(fadedelay).fadeIn(1000);

	    //Altera 2
	    fadedelay = fadedelay + 1000;
	    $("#imagemprofissional02").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemprofissional06").delay(fadedelay).fadeIn(1000);

	    //Altera 3
	    fadedelay = fadedelay + 1000;
	    $("#imagemprofissional03").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemprofissional07").delay(fadedelay).fadeIn(1000);

	    //Altera 4
	    fadedelay = fadedelay + 1000;
	    $("#imagemprofissional04").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemprofissional08").delay(fadedelay).fadeIn(1000);

		//Altera 1
		fadedelay = fadedelay + 1000;
	    $("#imagemprofissional05").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemprofissional01").delay(fadedelay).fadeIn(1000);

	    //Altera 2
	    fadedelay = fadedelay + 1000;
	    $("#imagemprofissional06").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemprofissional02").delay(fadedelay).fadeIn(1000);

	    //Altera 3
	    fadedelay = fadedelay + 1000;
	    $("#imagemprofissional07").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemprofissional03").delay(fadedelay).fadeIn(1000);

	    //Altera 4
	    fadedelay = fadedelay + 1000;
	    $("#imagemprofissional08").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemprofissional04").delay(fadedelay).fadeIn(1000);
    }
});

//marca

//marca
$(document).ready(function(){
    //passagens
	$("#imagemmarca01").fadeIn(1000);
    $("#imagemmarca02").fadeIn(1000);
    $("#imagemmarca03").fadeIn(1000);
    $("#imagemmarca04").fadeIn(1000);

    var fadedelay = 1000;
    fadedelay = fadedelay + 1000;

    for(var start = 1; start < 10; start++) {
		//Altera 1
	    $("#imagemmarca01").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemmarca05").delay(fadedelay).fadeIn(1000);

	    //Altera 2
	    fadedelay = fadedelay + 1000;
	    $("#imagemmarca02").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemmarca06").delay(fadedelay).fadeIn(1000);

	    //Altera 3
	    fadedelay = fadedelay + 1000;
	    $("#imagemmarca03").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemmarca07").delay(fadedelay).fadeIn(1000);

	    //Altera 4
	    fadedelay = fadedelay + 1000;
	    $("#imagemmarca04").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemmarca08").delay(fadedelay).fadeIn(1000);

		//Altera 1
		fadedelay = fadedelay + 1000;
	    $("#imagemmarca05").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemmarca01").delay(fadedelay).fadeIn(1000);

	    //Altera 2
	    fadedelay = fadedelay + 1000;
	    $("#imagemmarca06").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemmarca02").delay(fadedelay).fadeIn(1000);

	    //Altera 3
	    fadedelay = fadedelay + 1000;
	    $("#imagemmarca07").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemmarca03").delay(fadedelay).fadeIn(1000);

	    //Altera 4
	    fadedelay = fadedelay + 1000;
	    $("#imagemmarca08").delay(fadedelay).fadeOut(1000);
	    fadedelay = fadedelay + 2000;
	    $("#imagemmarca04").delay(fadedelay).fadeIn(1000);
    }
});

$(document).ready(function(){
  $("#mostraatleta").click(function(){
  	$("#perfilatleta").show();
  	$("#perfilprofissional").hide();
  	$("#perfilmarca").hide();

  	//out
	$("#dadosatleta").hide();
	$("#dadosprofissional").hide();
	$("#dadosmarca").hide();
	$("#imagensatleta").fadeOut(1000);
	$("#imagensprofissional").fadeOut(1000);
	$("#imagensmarca").fadeOut(1000);
	//in
	$("#dadosatleta").show();
    $("#imagensatleta").delay(1000).fadeIn(1000);

    //passagens
    var fadetime = 5000;
    var fadedelay = 5000;
    $("#imagematleta01").fadeOut(fadetime);
    $("#imagematleta05").delay(fadedelay).fadeIn(fadetime);
    fadetime = fadetime + 5000;

    $("#imagematleta02").fadeOut(fadetime);
    $("#imagematleta06").delay(fadedelay).fadeIn(fadetime);
    fadetime = fadetime + 5000;

    $("#imagematleta03").fadeOut(fadetime);
    $("#imagematleta07").delay(fadedelay).fadeIn(fadetime);
    fadetime = fadetime + 5000;

    $("#imagematleta06").fadeOut(fadetime);
    $("#imagematleta02").delay(fadedelay).fadeIn(fadetime);
    fadetime = fadetime + 5000;

    $("#imagematleta07").fadeOut(fadetime);
    $("#imagematleta03").delay(fadedelay).fadeIn(fadetime);
    fadetime = fadetime + 5000;
    



  });
});	


$(document).ready(function(){
  $("#mostraprofissional").click(function(){
  	$("#perfilatleta").hide();
  	$("#perfilprofissional").show();
  	$("#perfilmarca").hide();
	//out
	$("#dadosatleta").hide();
	$("#dadosprofissional").hide();
	$("#dadosmarca").hide();
	$("#imagensatleta").fadeOut(1000);
	$("#imagensprofissional").fadeOut(1000);
	$("#imagensmarca").fadeOut(1000);
	//in
	$("#dadosprofissional").show();
    $("#imagensprofissional").delay(1000).fadeIn(1000);
  });
});


$(document).ready(function(){
  $("#mostramarca").click(function(){
  	$("#perfilatleta").hide();
  	$("#perfilprofissional").hide();
  	$("#perfilmarca").show();
	//out
	$("#dadosatleta").hide();
	$("#dadosprofissional").hide();
	$("#dadosmarca").hide();
	$("#imagensatleta").fadeOut(1000);
	$("#imagensprofissional").fadeOut(1000);
	$("#imagensmarca").fadeOut(1000);
	//in
	$("#dadosmarca").show();
    $("#imagensmarca").delay(1000).fadeIn(1000);
  });
});	


</script>







<script type="text/javascript">

$(document).ready(function(){
	$( "#criarAtleta" ).click(function() {

	  //Nome em branco
	  if ($( "#nomecompleto" ).val() == '') {
	  	alert( "O nome não foi preenchido" );
	  	$( "#nomecompleto" ).focus();
	  } else {

	  	//Email em branco
	  	if ($( "#basicaemail" ).val() == '') {
	  		alert( "O endereço de e-mail não foi preenchido" );
	  		$( "#basicaemail" ).focus();
	  	} else {

	  		//Senha 1 em branco
		  	if ($( "#senha" ).val() == '') {
		  		alert( "A senha não foi preenchida" );
		  		$( "#senha" ).focus();
		  	} else {

		  		//Senha 2 em branco
			  	if ($( "#senha2" ).val() == '') {
			  		alert( "A senha não foi confirmada" );
			  		$( "#senha2" ).focus();
			  	} else {

			  		//Senhas confirmadas
			  		if ($( "#senha" ).val() != $( "#senha2" ).val()) {
						alert( "A senha deve ser digitada duas vezes iguais!" );
			  			$( "#senha2" ).focus();
		  			} else {

	  					//Esporte
						if ($( "#atletaesporte" ).val() == '-- Selecione o esporte --') {
							alert( "Selecione o esporte" );
				  			$( "#atletaesporte" ).focus();
			  			} else {
	  						
	  						//Termos
	  						if ($('#termos1').is(':checked') == false) {
								alert( "Você deve aceitar os termos de uso para continuar" );
							} else {
								$( "#new_post" ).submit();
							}
		  				}
		  			}
		  		}
	  		}
  		}
	  }
	});


	$( "#criarPro" ).click(function() {

	  //Nome em branco
	  if ($( "#nomecompleto" ).val() == '') {
	  	alert( "O nome não foi preenchido" );
	  	$( "#nomecompleto" ).focus();
	  } else {

	  	//Email em branco
	  	if ($( "#basicaemail" ).val() == '') {
	  		alert( "O endereço de e-mail não foi preenchido" );
	  		$( "#basicaemail" ).focus();
	  	} else {

	  		//Senha 1 em branco
		  	if ($( "#senha" ).val() == '') {
		  		alert( "A senha não foi preenchida" );
		  		$( "#senha" ).focus();
		  	} else {

		  		//Senha 2 em branco
			  	if ($( "#senha2" ).val() == '') {
			  		alert( "A senha não foi confirmada" );
			  		$( "#senha2" ).focus();
			  	} else {

			  		//Senhas confirmadas
			  		if ($( "#senha" ).val() != $( "#senha2" ).val()) {
						alert( "A senha deve ser digitada duas vezes iguais!" );
			  			$( "#senha2" ).focus();
		  			} else {

	  					//profissao
						if ($( "#profissao" ).val() == '-- Selecione a profissão --') {
							alert( "Selecione a profissão" );
				  			$( "#profissao" ).focus();
			  			} else {
	  						
	  						//Termos
	  						if ($('#termos2').is(':checked') == false) {
								alert( "Você deve aceitar os termos de uso para continuar" );
							} else {
								$( "#new_post" ).submit();
							}
		  				}
		  			}
		  		}
	  		}
  		}
	  }
	});




	$( "#criarMarca" ).click(function() {

	  //Nome em branco
	  if ($( "#nomecompleto" ).val() == '') {
	  	alert( "O nome não foi preenchido" );
	  	$( "#nomecompleto" ).focus();
	  } else {

	  	//Email em branco
	  	if ($( "#basicaemail" ).val() == '') {
	  		alert( "O endereço de e-mail não foi preenchido" );
	  		$( "#basicaemail" ).focus();
	  	} else {

	  		//Senha 1 em branco
		  	if ($( "#senha" ).val() == '') {
		  		alert( "A senha não foi preenchida" );
		  		$( "#senha" ).focus();
		  	} else {

		  		//Senha 2 em branco
			  	if ($( "#senha2" ).val() == '') {
			  		alert( "A senha não foi confirmada" );
			  		$( "#senha2" ).focus();
			  	} else {

			  		//Senhas confirmadas
			  		if ($( "#senha" ).val() != $( "#senha2" ).val()) {
						alert( "A senha deve ser digitada duas vezes iguais!" );
			  			$( "#senha2" ).focus();
		  			} else {
	  						
  						//Termos
  						if ($('#termos3').is(':checked') == false) {
							alert( "Você deve aceitar os termos de uso para continuar" );
						} else {
							$( "#new_post" ).submit();
						}
		  			}
		  		}
	  		}
  		}
	  }
	});



});	
</script>




<?php // ******************* Fim Header ******************* ?>

<?php 
/** Themify Default Variables
 *  @var object */
global $themify; ?>

<div id="layout" class="pagewidth clearfix">

	<div id="contentwrap" style="width: 100%; padding-top: 0px;">

		<div id="content" class="list-post">

<div style="width: 100%; margin-top: 0px; min-width: 1160px;">
	<!-- Imagens -->
	<div style="float: left; width: 59%;">
	<div style="position: absolute; top: 320px; left: 370px; z-index: 100;">
		<a href="http://letts.com.br/wp-content/themes/magazine/login.php?visitante=1"><input type="submit" value="Acessar como visitante" style="margin-top: 0px;"></a>
	</div>

		<!-- Atleta Area -->

		<div id="imagensatleta" style="width: 664px; height: 550px;">
			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagematleta01" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/shutterstock_163488158.png'); <?php echo calcbackgroundsize("wp-content/uploads/2014/09/shutterstock_163488158.png", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagematleta05" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/tony-hawk-bcn-2.png'); <?php echo calcbackgroundsize("wp-content/uploads/2014/09/tony-hawk-bcn-2.png", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagematleta09" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/shutterstock_201578162.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/09/shutterstock_201578162.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>

			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagematleta02" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/11/10538696_605394676246270_1019910073_n.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/11/10538696_605394676246270_1019910073_n.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagematleta06" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/shutterstock_149727173.png'); <?php echo calcbackgroundsize("wp-content/uploads/2014/09/shutterstock_149727173.png", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagematleta10" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/shutterstock_114968215.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/09/shutterstock_114968215.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>

			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagematleta03" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/11/10401758_623721997748540_354651532_n.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/11/10401758_623721997748540_354651532_n.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagematleta07" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/shutterstock_203153002.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/09/shutterstock_203153002.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagematleta11" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/shutterstock_176002655.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/09/shutterstock_176002655.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>

			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagematleta04" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/11/10369412_643742709037684_2094578073_n.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/11/10369412_643742709037684_2094578073_n.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagematleta08" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/shutterstock_116403520.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/09/shutterstock_116403520.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagematleta12" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/shutterstock_203153029.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/09/shutterstock_203153029.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>
		</div>
		<!-- Fim Atleta Area -->

		<!-- Profissional Area -->
		<div id="imagensprofissional" style="width: 664px; height: 550px; display: none;">
			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagemprofissional01" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_101549977-682x1024.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_101549977-682x1024.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagemprofissional05" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_134263049.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_134263049.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>

			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagemprofissional02" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_151604315.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_151604315.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagemprofissional06" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_152624879.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_152624879.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>

			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagemprofissional03" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_156031931.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_156031931.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagemprofissional07" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_161874146.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_161874146.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>

			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagemprofissional04" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_170408588.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_170408588.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagemprofissional08" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_176321288.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_176321288.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>
		</div>
		<!-- Fim Profissional Area -->

		<!-- marca Area -->
		<div id="imagensmarca" style="width: 664px; height: 550px; display: none;">
			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagemmarca01" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_169089455.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_169089455.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagemmarca05" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_197751698.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_197751698.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>

			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagemmarca02" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_214171819.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_214171819.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagemmarca06" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_164469431.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_164469431.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>

			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagemmarca03" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_172633460.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_172633460.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagemmarca07" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/10/shutterstock_219788542.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/10/shutterstock_219788542.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>

			<div style="float: left; width: 332px; height: 250px; overflow: hidden;">
				<div id="imagemmarca04" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/11/mormaii.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/11/mormaii.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
				<div id="imagemmarca08" style="display: none; width: 100%; min-height: 250px; background-image: url('http://letts.com.br/wp-content/uploads/2014/11/BIMG_4751select.jpg'); <?php echo calcbackgroundsize("wp-content/uploads/2014/11/BIMG_4751select.jpg", 332, 250); ?>; background-position: center;">&nbsp;</div>
			</div>
		</div>
		<!-- Fim marca Area -->
	</div>

	<!-- Loging -->
	<div style="float: right;">
		<div style="float: left; width: 460px; padding-top: 10px;">
			<h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%; display: none;">
				<div id="perfilatleta" style="display: block;">Perfil: Atleta</div>
				<div id="perfilprofissional" style="display: none;">Perfil: Profissional</div>
				<div id="perfilmarca" style="display: none;">Perfil: Marca</div>
			</h1>
				<div class="related-posts" style="float: left; width: 400px; margin-bottom: 30px;">
					

					<article class="post type-post clearfix">
						<div class="post-content">
							<p class="post-meta" style="display: none;">
								<span class="post-category"><a href="#">Criar perfil através do site</a></span>
							</p>
							<form id="new_post" method="post" action="/add-login-db/" >
								<div style="margin-left: 0px; margin-top: 0px;">
									<div style="text-align: center; margin-top: 10px; text-align: left;">
										<p class="post-meta" style="margin-left: 25px;">
											<span class="post-category"><a href="#">Tipo de conta:</a> / </span>
										</p>
										<h1 class="post-title" style="margin-left: 25px; margin-bottom: 10px;">
											<input id="mostraatleta" type="radio" value="atleta" name="tipodeconta" style="margin-left: 0px;" checked>Atleta
											<input id="mostraprofissional" type="radio" value="profissional" name="tipodeconta" style="margin-left: 20px;">Profissional
											<input id="mostramarca" type="radio" value="marca" name="tipodeconta" style="margin-left: 20px;">Marca
										</h1>
									</div>

									<div style="text-align: center; margin-top: 10px; text-align: left;">
										<p class="post-meta" style="margin-left: 25px;">
											<span class="post-category"><a href="#">Cadastrar com o Facebook:</a> / </span>
										</p>
										<h1 class="post-title" style="margin-left: 0px; margin-bottom: 10px; text-align: center; width: 340px;">
											<a href="https://www.facebook.com/dialog/oauth?client_id=1540707736203396&redirect_uri=https://letts.com.br/add-login/&scope=email,user_website,user_location"><img src="/wp-content/themes/magazine/images/pZzc4.png" alt="Login com Facebook" style="width: 250px;"></a>
										</h1>
									</div>

									<div style="text-align: center; margin-top: 10px; text-align: left; width: 340px;">
										<p class="post-meta" style="margin-left: 25px; text-align: center; color: #f57300;">
											<span class="post-category"><a href="#">Ou</a> / </span>
										</p>
									</div>

									<div class="post-content" style="margin-top: 10px; display: none;">
										<p class="post-meta">
											<span class="post-category"><a href="#">Crie seu perfil com o facebook</a></span>
										</p>

										<p>
											<div style="text-align: left; margin-top: 10px; margin-left: 0px;">
												<a href="#" onclick="nowblock()"><img src="http://letts.com.br/wp-content/uploads/2014/08/facebook-login-button.png"></a>
											</div>
										</p>
									</div>

									<div style="text-align: center; margin-top: 0px; text-align: left;">
										<p class="post-meta" style="margin-left: 25px;">
											<span class="post-category"><a href="#">Nome completo:</a> / </span>
										</p>
										<h1 class="post-title" style="margin-left: 25px;">
											<input id="nomecompleto" name="nomecompleto" type="text" value="" size="30" class="required">
										</h1>
									</div>

									<div style="text-align: center; margin-top: 0px; text-align: left;">
										<p class="post-meta" style="margin-left: 25px;">
											<span class="post-category"><a href="#">E-mail:</a> / </span>
										</p>
										<h1 class="post-title" style="margin-left: 25px;">
											<input id="basicaemail" name="basicaemail" type="text" value="" size="30" class="required">
										</h1>
									</div>

									<div style="text-align: center; margin-top: 0px; text-align: left;">
										<p class="post-meta" style="margin-left: 25px;">
											<span class="post-category"><a href="#">Senha:</a> / </span>
										</p>
										<h1 class="post-title" style="margin-left: 25px;">
											<input id="senha" name="senha" type="password" value="" size="20" class="required">
										</h1>

										<h1 class="post-title" style="margin-left: 25px;">
											<input id="senha2" name="senha2" type="password" value="" size="20" class="required"><label style="font-size: 10px;"> * Confirme a senha</label>
										</h1>
									</div>

									<!-- Atleta Area -->
									<div id="dadosatleta">
										<div style="text-align: center; margin-top: 0px; text-align: left;">
											<p class="post-meta" style="margin-left: 25px;">
												<span class="post-category"><a href="#">Esporte:</a> / </span>
											</p>
											<h1 class="post-title" style="margin-left: 25px;">
												<select id="atletaesporte" name="atletaesporte" style="font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
												<option>-- Selecione o esporte --</option>
												<option>Aeromodelismo</option>
												<option>Alpinismo</option>
												<option>Asa Delta</option>
												<option>BMX</option>
												<option>BMX – Free style</option>
												<option>Balonismo</option>
												<option>Base Jumping</option>
												<option>Bodyboard</option>
												<option>Bouldering</option>
												<option>Bungee Jumping</option>
												<option>Canoagem</option>
												<option>Carveboard</option>
												<option>Caça submarina</option>
												<option>Ciclismo</option>
												<option>Cliff Diving</option>
												<option>Corrida aventura</option>
												<option>Drift</option>
												<option>Escalada</option>
												<option>Esqui</option>
												<option>Football Freestyle</option>
												<option>Free Style Motocross</option>
												<option>FreeBoard</option>
												<option>Heli-Skiing</option>
												<option>Highline</option>
												<option>Jet Ski</option>
												<option>Kart</option>
												<option>Kitesurfing</option>
												<option>Liquid Mountaineering</option>
												<option>Longboard skate</option>
												<option>Longboard surf</option>
												<option>Mega ramp</option>
												<option>Mergulho</option>
												<option>Moto Trial</option>
												<option>Moto Wheeling</option>
												<option>Motocross</option>
												<option>Mountain Bike</option>
												<option>Mountain biking</option>
												<option>Mountain boarding</option>
												<option>Off Road/Rally</option>
												<option>Paintball</option>
												<option>Paragliding</option>
												<option>Paragliding</option>
												<option>Parapente</option>
												<option>Parkour</option>
												<option>Patins in Line</option>
												<option>Psicobloc</option>
												<option>Rafting</option>
												<option>Rally</option>
												<option>Rapel</option>
												<option>Sandboard</option>
												<option>Skate - Street</option>
												<option>Skate – Free style</option>
												<option>Skate – Mini ramp</option>
												<option>Sky Surfing</option>
												<option>Skydive</option>
												<option>Slackline</option>
												<option>Snowboard</option>
												<option>Stand Up Paddle</option>
												<option>Street Luge</option>
												<option>Surf</option>
												<option>Surf - Freesurf</option>
												<option>Tow-in</option>
												<option>Trekking</option>
												<option>Triathlon</option>
												<option>UFC (MMA)</option>
												<option>Vela/Iatismo</option>
												<option>Velocidade</option>
												<option>Wakeboard</option>
												<option>Wakeboard Free style</option>
												<option>Windsurf</option>
												<option>WingWalking</option>
											</select>
											</h1>
										</div>
										<div style="text-align: center; margin-top: 0px; text-align: left;">
											<h1 class="post-title" style="margin-left: 25px;">
												<input type="checkbox" name="termos1" id="termos1" value="termos">Li e aceito as <a target="_blank" href="http://letts.com.br/politicas-de-privacidade/">políticas de uso</a>
											</h1>
										</div>
										<div style="text-align: right; margin-right: 25px; margin-top: 0px;">
											<input name="criarAtleta" type="button" id="criarAtleta" value="Criar Conta">
										</div>
									</div>
									<!-- Fim Atleta Area -->

									<!-- Atleta Profissional -->
									<div id="dadosprofissional" style="display: none;">
										<div style="text-align: center; margin-top: 0px; text-align: left;">
											<p class="post-meta" style="margin-left: 25px;">
												<span class="post-category"><a href="#">Profissão:</a> / </span>
											</p>
											<h1 class="post-title" style="margin-left: 25px;">
												<select id="profissao" name="profissao" style="font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
													<option>-- Selecione a profissão --</option>
													<option>Assessor de imprensa</option>
													<option>Coordenador de eventos</option>
													<option>Desenhista</option>
													<option>Empresário</option>
													<option>Estatístico</option>
													<option>Estilista</option>
													<option>Executivo de contas publicitárias</option>
													<option>Fisioterapeuta</option>
													<option>Fotografo</option>
													<option>Fotojornalista</option>
													<option>Gerente de relações públicas</option>
													<option>Gestor desportivo</option>
													<option>Jornalista</option>
													<option>Nutricionista</option>
													<option>Personal Crossfit</option>
													<option>Personal academia</option>
													<option>Professor de idomas</option>
													<option>Psicologo</option>
													<option>Psicólogo esportivo</option>
													<option>Técnico</option>
													<option>Videomaker</option>
												</select>
											</h1>
										</div>
										<div style="text-align: center; margin-top: 0px; text-align: left;">
											<h1 class="post-title" style="margin-left: 25px;">
												<input type="checkbox" name="termos2" id="termos2" value="termos">Li e aceito as <a target="_blank" href="http://letts.com.br/politicas-de-privacidade/">políticas de uso</a>
											</h1>
										</div>
										<div style="text-align: right; margin-right: 25px; margin-top: 10px;">
											<input name="criarPro" type="button" id="criarPro" value="Criar Conta">
										</div>
									</div>
									<!-- Fim Profissional Area -->

									<!-- marca -->
									<div id="dadosmarca" style="display: none;">
										<div style="text-align: center; margin-top: 0px; text-align: left;">
											<h1 class="post-title" style="margin-left: 25px;">
												<input type="checkbox" name="termos3" id="termos3" value="termos">Li e aceito as <a target="_blank" href="http://letts.com.br/politicas-de-privacidade/">políticas de uso</a>
											</h1>
										</div>
										<div style="text-align: right; margin-right: 25px; margin-top: 0px;">
											<input name="criarMarca" type="button" id="criarMarca" value="Criar Conta">
										</div>
									</div>
									<!-- Fim marca -->


								</div>
							</form>
						</div>
					</article>

				</div>

			</div>
	</div>
</div>

</div></div></div>

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