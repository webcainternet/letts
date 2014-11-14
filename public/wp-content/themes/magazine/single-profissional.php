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

	<?php $idpost = get_the_ID(); ?>

	<?php
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
	    die("Could not connect: " . mysql_error());
	mysql_select_db(DB_NAME);

	$result = mysql_query("select id, post_title from wp_posts where post_type = 'profissional' AND post_status = 'publish' AND id = ".$idpost);

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

		$nome = $row["post_title"];
		$idatleta = $row["id"];

		$resultesporte = mysql_query("select meta_value from wp_postmeta where meta_key = 'profissao' AND post_id = ".$row["id"]);
	    while ($rowesporte = mysql_fetch_array($resultesporte, MYSQL_ASSOC)) {
	    	$esporte = $rowesporte["meta_value"];
	    }

		$resultbasicapaisnascimento = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicapaisnascimento' AND post_id = ".$row["id"]);
	    while ($rowbasicapaisnascimento = mysql_fetch_array($resultbasicapaisnascimento, MYSQL_ASSOC)) {
	    	$basicapaisnascimento = $rowbasicapaisnascimento["meta_value"];
	    }

	    $resultbasicagenero = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicagenero' AND post_id = ".$row["id"]);
	    while ($rowbasicagenero = mysql_fetch_array($resultbasicagenero, MYSQL_ASSOC)) {
	    	$basicagenero = $rowbasicagenero["meta_value"];
	    }

	    $resultbasicacidadeatual = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicacidadeatual' AND post_id = ".$row["id"]);
	    while ($rowbasicacidadeatual = mysql_fetch_array($resultbasicacidadeatual, MYSQL_ASSOC)) {
	    	$basicacidadeatual = $rowbasicacidadeatual["meta_value"];
	    }

	    $resultbasicaimagem = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicaimagem' AND post_id = ".$row["id"]);
	    while ($rowbasicaimagem = mysql_fetch_array($resultbasicaimagem, MYSQL_ASSOC)) {
	    	$basicaimagem = $rowbasicaimagem["meta_value"];
	    }
		$resultbasicaimagemurl = mysql_query("select meta_value from wp_postmeta where meta_key = '_wp_attached_file' AND post_id = ".$basicaimagem);
	    while ($rowbasicaimagemurl = mysql_fetch_array($resultbasicaimagemurl, MYSQL_ASSOC)) {
	    	$basicaimagemurl = $rowbasicaimagemurl["meta_value"];
	    }
	}

	mysql_free_result($result);
	?>




		<!-- content -->

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">
	<div style="border-top: 5px #ff8920 solid; 
				background-image: url('<?php print_custom_field('atletaimagembackground'); ?>'); 
				background-size: 1064px; 
				background-position:center; 
				height: 110px;">

		<div style="float: left;
					margin-left: 30px; 
					border: 1px #ff8920 solid; 
					width: 180px; 
					height: 180px; 
					margin-top: 0px; 
					background-image: url('<?php print_custom_field('basicaimagem:to_image_src'); ?>'); 
					background-size: 1800px; 
					background-position:center; " id="imgbackground">
			&nbsp;
		</div>

	</div>


<script type="text/javascript">
	var img = new Image();
	img.onload = function() {
	  if (this.width > this.height) {
	  	var sizeimg = 180 * (this.width / this.height);
		document.getElementById("imgbackground").style.backgroundSize = sizeimg+"px 180px";
	  } else {
	  	var sizeimg = 180 * (this.height / this.width);
	  	document.getElementById("imgbackground").style.backgroundSize = "180px "+sizeimg+"px";
	  }  
	  
	}
	img.src = '<?php print_custom_field('basicaimagem:to_image_src'); ?>';	
</script>
			






	<div style="background-size: 1064px; 
				background-position:center; 
				height: 62px;background-color: #EEE;">

		<div style="float: right; 
					margin-top: 25px;
					/* border-bottom: 2px #ff8920 solid; */
					font-weight: bold;
					text-align: center;
					padding-left: 2px;
					padding-right: 2px;
					text-transform: uppercase;
					margin-left: 5px;
					margin-right: 15px;
					font-size: 12px;">
			<a style="text-decoration: none;" href="?page=videos">Mensagem</a>
		</div>

		<div style="float: right; 
					margin-top: 25px;
					/* border-bottom: 2px #ff8920 solid; */
					font-weight: bold;
					text-align: center;
					padding-left: 2px;
					padding-right: 2px;
					text-transform: uppercase;
					margin-left: 5px;
					margin-right: 5px;
					font-size: 12px;">
			<a style="text-decoration: none;" href="?page=videos">Vídeos</a>
		</div>

		<div style="float: right; 
					margin-top: 25px;
					/* border-bottom: 2px #ff8920 solid; */
					font-weight: bold;
					text-align: center;
					padding-left: 2px;
					padding-right: 2px;
					text-transform: uppercase;
					margin-left: 5px;
					margin-right: 5px;
					font-size: 12px;">
			<a style="text-decoration: none;" href="?page=fotos">Fotos</a>
		</div>

		<div style="float: right; 
					margin-top: 25px;
					/* border-bottom: 2px #ff8920 solid; */
					font-weight: bold;
					text-align: center;
					padding-left: 2px;
					padding-right: 2px;
					text-transform: uppercase;
					margin-left: 5px;
					margin-right: 5px;
					font-size: 12px;">
			<a style="text-decoration: none;" href="?page=sobre">Sobre</a>
		</div>

		<div style="float: right; 
					margin-top: 25px;
					/* border-bottom: 2px #ff8920 solid; */
					font-weight: bold;
					text-align: center;
					padding-left: 2px;
					padding-right: 2px;
					text-transform: uppercase;
					margin-left: 5px;
					margin-right: 5px;
					font-size: 12px;">
			<a style="text-decoration: none;" href="?page=news">News</a>
		</div>

		<div style="float: left;
					margin: 0px;
					margin-left: 25px;">
					<div id="text-1017" class="widget widget_text" style="border: 0px; margin: 0px;">
						<h4 class="widgettitle" style="border: 0px;"><?php echo utf8_encode($esporte); ?></h4>		
					</div>
			
		</div>
		
	</div>

	<div style="margin-top: 20px; margin-bottom: 20px;">
		<h1 class="post-title entry-title" itemprop="name">
			<a href="#" title="<?php the_title(); ?>">
				<h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 1.5em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;"><a href="http://letts.com.br/morre-skatista-jay-adams-um-dos-mais-influentes-da-historia/" style="font-weight: bold;"><?php the_title(); ?></a></h1>
			</a>
		</h1>
	</div>

	<div>
		<div style="float: left; width: 325px;">
				<div class="col3-1" style="width: 100%; margin: 0px;">
					<div id="text-1016" class="widget widget_text" style="">
						<h4 class="widgettitle">Informações básicas</h4>			
						<div class="textwidget">
							<div style="margin-top: 10px;"><strong>Data de nascimento</strong></div>
							<?php print_custom_field('basicanascimento'); ?><br />

							<div style="margin-top: 10px;"><strong>Gênero</strong></div>
							<?php print_custom_field('basicagenero'); ?><br />
						</div>
			
						<div class="textwidget">
							<div style="margin-top: 10px;"><strong>E-mail</strong></div>
							<?php print_custom_field('basicaemail'); ?><br />

							<div style="margin-top: 10px;"><strong>Telefones</strong></div>
							<?php print_custom_field('basicatelefones'); ?><br />

							<div style="margin-top: 10px;"><strong>Facebook</strong></div>
							<?php print_custom_field('basicafacebook'); ?><br />
						</div>

						<div class="textwidget">
							<div style="margin-top: 10px;"><strong>Nascimento</strong></div>
							<?php print_custom_field('basicacidadenascimento'); ?>, <?php print_custom_field('basicaestadonascimento'); ?><br />

							<div style="margin-top: 10px;"><strong>Atual</strong></div>
							<?php print_custom_field('basicacidadeatual'); ?>, <?php print_custom_field('basicaestadoatual'); ?><br />


						</div>
					</div>			
				</div>
		</div>

		<div style="float: left; width: 705px; margin-left: 30px;">
			<div style="width: 100%; display: block;" id="newpoststep1">
				<div>
				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Adicionar news</h4>
				</div>
				<div style="width: 100%;">
					<textarea style="width: 100%; height: 80px;"></textarea>
				</div>
				<div style="text-align: right;">
					<input type="submit" value=">" style="" 
						onclick="document.getElementById('newpoststep1').style.display = 'none'; document.getElementById('newpoststep2').style.display = 'block'; document.getElementById('newpoststep3').style.display = 'none';">
				</div>
			</div>



			<div style="width: 100%; display: none;" id="newpoststep2">
				<div>
				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Selecionar mídia</h4>
				</div>
				<div style="width: 100%;">
					<div style="border: #EEE dotted 5px; padding: 30px; margin-bottom: 15px; text-align: center;">
						<input type="file">
					</div>
				</div>
				<div style="text-align: right;">
					<input type="submit" value="<" style="" 
						onclick="document.getElementById('newpoststep1').style.display = 'block'; document.getElementById('newpoststep2').style.display = 'none'; document.getElementById('newpoststep3').style.display = 'none';">
					<input type="submit" value=">" style="" 
						onclick="document.getElementById('newpoststep1').style.display = 'none'; document.getElementById('newpoststep2').style.display = 'none'; document.getElementById('newpoststep3').style.display = 'block';">
				</div>
			</div>


			<div style="width: 100%; display: none;" id="newpoststep3">
				<div>
				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Publicar como news no site?</h4>
				</div>
				<div style="width: 100%;">
					 <input type="checkbox" 
					 	onchange="document.getElementById('sp-change').style.display = 'block';" 
					 	id="change">
					 	<label for="change">Gostaria de compartilhar esta notícia na página de news?</label>

					 	<div id="sp-change" style="display: none;">
					 		Titulo:<br />
					 		<input type="text">
					 	</div>

				</div>
				<div style="text-align: right;">
					<input type="submit" value="<" style="" 
						onclick="document.getElementById('newpoststep1').style.display = 'none'; document.getElementById('newpoststep2').style.display = 'block'; document.getElementById('newpoststep3').style.display = 'none';">
					<input type="submit" value="Publicar" style="" 
						onclick="alert('Session error!');">
				</div>
			</div>


			<hr style="border: #EEE solid 1px;">
			
			<?php if ($_GET["page"] == "" || $_GET["page"] == "sobre") { ?>
				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Minha história</h4>
				<?php the_content(); ?>

				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Patrocínio ou apoio que esta procurando</h4>
				<?php print_custom_field('atletapatrocinio'); ?><br /><br />

				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Meu sonho</h4>
				<?php print_custom_field('atletameusonho'); ?><br /><br />
			<?php } ?>

			<?php if ($_GET["page"] == "news") { ?>
				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">News</h4>
				


    <div class="related-posts" style="float: left; width: 312px; margin-left: 20px; margin-right: 0px; margin-bottom: 0px;">
    <div style="text-align: right;">
      <span style="background-color: #FFF; color: #7A8B8B; width: 100px; font-size: 16px;font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;">26-08-2014</span>
    </div>

            <a href="http://letts.com.br/morre-skatista-jay-adams-um-dos-mais-influentes-da-historia/"><div class="imgnoticias" style="width: 306px; border-radius: 5px; height: 180px; background-size: 312px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/2014/08/JayAdams1.jpg');">
        &nbsp;
      </div></a>
      <article class="post type-post clearfix">
        <div class="post-content">
          <p class="post-meta">
            <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
              <a href="http://letts.com.br/morre-skatista-jay-adams-um-dos-mais-influentes-da-historia/">Morre skatista Jay Adams um dos mais influentes da história</a></span>
          </p>
        </div>
      </article>   
    </div>
    
    
    
    
    <div class="related-posts" style="float: left; width: 312px; margin-left: 20px; margin-right: 0px; margin-bottom: 0px;">
    <div style="text-align: right;">
      <span style="background-color: #FFF; color: #7A8B8B; width: 100px; font-size: 16px;font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;">26-08-2014</span>
    </div>
            <a href="http://letts.com.br/kelly-slater-sai-da-quiksilver-depois-de-23-anos-e-cria-sua-propria-marca/"><div class="imgnoticias" style="width: 306px; border-radius: 5px; height: 180px; background-size: 312px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/kelly-slater-headsapce-900x521.jpg');">
        &nbsp;
      </div></a>
      <article class="post type-post clearfix">
        <div class="post-content">
          <p class="post-meta">
            <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
              <a href="http://letts.com.br/kelly-slater-sai-da-quiksilver-depois-de-23-anos-e-cria-sua-propria-marca/">Kelly Slater sai da Quiksilver depois de 23 anos e cria sua propria marca</a></span>
          </p>
        </div>
      </article>
    </div>
    
    
    
    
    <div class="related-posts" style="float: left; width: 312px; margin-left: 20px; margin-right: 0px; margin-bottom: 0px;">
    <div style="text-align: right;">
      <span style="background-color: #FFF; color: #7A8B8B; width: 100px; font-size: 16px;font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;">26-08-2014</span>
    </div>
            <a href="http://letts.com.br/alemao-usa-ilusao-de-otica-e-cria-fotos-surreais-de-esportes-radicais/"><div class="imgnoticias" style="width: 306px; border-radius: 5px; height: 180px; background-size: 312px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/18042014-alemao-usa-ilusao-de-otica-e-cria-fotos-surreais-de-esportes-radicais-1397830703348_300x420.jpg');">
        &nbsp;
      </div></a>
      <article class="post type-post clearfix">
        <div class="post-content">
          <p class="post-meta">
            <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
              <a href="http://letts.com.br/alemao-usa-ilusao-de-otica-e-cria-fotos-surreais-de-esportes-radicais/">Alemão usa ilusão de ótica e cria fotos surreais de esportes radicais</a></span>
          </p>
        </div>
      </article>
    </div>


			<?php } ?>
		</div>
		&nbsp;
	</div>



	<div id="contentwrap">
	
		<!-- /content -->
		<?php themify_content_after(); // hook ?>

	<?php endwhile; ?>

	</div>
	<!-- /#contentwrap -->

	<?php
	/////////////////////////////////////////////
	// Sidebar
	/////////////////////////////////////////////
	// if ($themify->layout != "sidebar-none"): get_sidebar(); endif; ?>

</div>
<!-- /layout-container -->
	
<?php get_footer(); ?>