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

	<?php $idpost = get_the_ID(); ?>
	
	<?php if( have_posts() ) while ( have_posts() ) : the_post(); ?>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">
	<div style="border-top: 5px #ff8920 solid; 
				background-image: url('<?php print_custom_field('image_profissional'); ?>'); 
				background-size: 1064px; 
				background-position:center; 
				height: 400px;">

		<div style="float: left;
					margin-left: 30px; 
					border: 1px #ff8920 solid; 
					width: 180px; 
					height: 180px; 
					margin-top: 280px;
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
	img.src = "<?php print_custom_field('basicaimagem:to_image_src'); ?>";	
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
			<a style="text-decoration: none;" href="?page=mensagem">Mensagem</a>
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
						<h4 class="widgettitle" style="border: 0px;"><?php print_custom_field('profissao'); ?></h4>		
					</div>
			
		</div>
		
	</div>

	<div style="margin-top: 20px; margin-bottom: 20px; width: 100%; float: left;">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 1.5em; font-family: Oswald, sans-serif; 
			text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;">
				<a href="<?php the_permalink(); ?>" style="font-weight: bold; font-size: 50px;"><?php the_title(); ?></a>
			</h1>
		</a>
	</div>

	<div>
		<div style="float: left; width: 325px;">
				<div class="col3-1" style="width: 100%; margin: 0px; background: #EFEFEF; padding-left: 15px; border-top: 5px #ff8920 solid;">
					<div id="text-1016" class="widget widget_text" style="">
						<h4 class="widgettitle">Informações básicas</h4>			
						<div class="textwidget">
							<div style="margin-top: 10px;"><strong>Data de nascimento</strong></div>
							<?php print_custom_field('basicanascimento'); ?><br />

							<div style="margin-top: 10px;"><strong>Gênero</strong></div>
							<?php print_custom_field('basicagenero'); ?><br />

							<div style="margin-top: 10px;"><strong>Telefones</strong></div>
							<?php print_custom_field('basicatelefones'); ?><br />

							<div style="margin-top: 10px;"><strong>Nascimento</strong></div>
							<?php print_custom_field('basicacidadenascimento'); ?>, <?php print_custom_field('basicaestadonascimento'); ?><br />

							<div style="margin-top: 10px;"><strong>Atual</strong></div>
							<?php print_custom_field('basicacidadeatual'); ?>, <?php print_custom_field('basicaestadoatual'); ?><br />							
						</div>
			
						<div class="textwidget icones_sociais">
							<div style="margin-top: 10px;"><strong>Contatos</strong></div>
								<?php if (get_custom_field('basicafacebook')) { ?>
									<a href="<?php print_custom_field('basicafacebook'); ?>" target="_blank">
										<img src="/wp-content/themes/magazine/images/facebook.png">
									</a>
								<?php } ?>

								<?php if (get_custom_field('instagram')) { ?>
									<a href="<?php print_custom_field('instagram'); ?>" target="_blank">
										<img src="/wp-content/themes/magazine/images/instagram.png">
									</a>
								<?php } ?>

								<?php if (get_custom_field('twitter')) { ?>
									<a href="<?php print_custom_field('twitter'); ?>" target="_blank">
										<img src="/wp-content/themes/magazine/images/twitter.png">
									</a>
								<?php } ?>

								<?php if (get_custom_field('linkedin')) { ?>
									<a href="<?php print_custom_field('linkedin'); ?>" target="_blank">
										<img src="/wp-content/themes/magazine/images/linkedin.png">
									</a>
								<?php } ?>

								<?php if (get_custom_field('basicaemail')) { ?>
									<a href="mailto:<?php print_custom_field('basicaemail'); ?>" target="_blank">
										<img src="/wp-content/themes/magazine/images/contacts.png">
									</a>
								<?php } ?>

								<?php if (get_custom_field('blog')) { ?>
									<a href="<?php print_custom_field('blog'); ?>" target="_blank">
										<img src="/wp-content/themes/magazine/images/rss.png">
									</a>
								<?php } ?>								

								<?php if (get_custom_field('site')) { ?>
									<a href="<?php print_custom_field('site'); ?>" target="_blank">
										<img src="/wp-content/themes/magazine/images/domain.png">
									</a>
								<?php } ?>
							</div>
					</div>			
				</div>
		</div>

		<!--<div style="float: left; width: 705px; margin-left: 30px;">
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
			-->
			
			<?php if ($_GET["page"] == "" || $_GET["page"] == "sobre") { ?>
				
				<div style="width: 685px; float: left; margin-left: 50px;">
				
				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Minha história</h4>
				<?php the_content(); ?>

				</div>
			<?php } ?>

			<?php if ($_GET["page"] == "news") { ?>
			<?php 
			$email_user = get_custom_field('basicaemail'); ?>
			<?php $args = array(
			    'orderby'       	=>  'post_date',
			    'post_type'     	=>  'news',
			    'meta_key'     		=>  'basicaemail',
			    'meta_value'     	=>  $email_user,			    
			    'order'        		=>  'ASC'
			); 
			query_posts($args); ?>

			<div style="width: 685px; float: left; margin-left: 50px;">
			<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">News</h4>

			<?php while (have_posts()) : the_post(); ?>

			<div class="related-posts news_perfil" style="float: left; width: 310px; height: 480px;">
				<div class="imgnoticias" style="width: 300px; border-radius: 5px; height: 212px;  margin-bottom: 15px;">
					<img src="<?php print_custom_field('imgnews:to_image_src'); ?>" style="max-height: 212px;">
				</div>
				<article class="post type-post clearfix">
					<div class="post-content">
						<p class="post-meta">
							<span class="post-category" style="font-weight: bold;font-size: 22px; font-family: Oswald, sans-serif;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
						</p>
						<h1 class="post-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_excerpt(30); ?></b></a></a>
						</h1>
					</div>
				</article>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>

			<?php } ?>

			<?php if ($_GET["page"] == "fotos") { ?>
				<div style="width: 685px; float: left; margin-left: 50px;">
					<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Fotos</h4>
					<div class="galeria_profissional">
						<?php $path = "wp-content/uploads/users/$idpost"; 
							$diretorio = dir($path); 
								while($arquivo = $diretorio -> read()){ 
									if($arquivo != '..' && $arquivo != '.'){
										echo '<div class="img_profissional">
												<a href="/wp-content/uploads/users/'.$idpost.'/'.$arquivo.'" class="fancybox" rel="gallery">
													<img src=/wp-content/uploads/users/'.$idpost.'/'.$arquivo.'>
												</a>
											  </div>'; 
									}
								} 
								$diretorio -> close(); 
						?>
					</div>
					
				</div>	

			<?php } ?>

			<?php if ($_GET["page"] == "videos") { ?>
				<?php 
				$email_user = get_custom_field('basicaemail'); ?>
				<?php $args = array(
				    'orderby'       	=>  'post_date',
				    'post_type'     	=>  'video',
				    'meta_key'     		=>  'basicaemail',
				    'meta_value'     	=>  $email_user,			    
				    'order'        		=>  'ASC'
				); 
				query_posts($args); ?>

			<div style="width: 685px; float: left; margin-left: 50px;">
			<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Vídeos</h4>

			<?php while (have_posts()) : the_post(); ?>

			<?php $video = get_custom_field('link_video'); 
				$video = explode("/", $video);
				$url_video = explode("=", $video[3]);
				if ($url_video[0] == 'watch?v') {
				 	$imgid = $url_video[1];
				 	$img_video = 'http://img.youtube.com/vi/'.$imgid.'/0.jpg';
				 } else{
				$imgid = $url_video[0];
				$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
				$img_video = $hash[0]['thumbnail_medium'];
				 } ?>

				<div class="video">
					<h3><?php the_title(); ?></h3>
					<a href="<?php print_custom_field('link_video'); ?>" class="fancybox">
						<img src="<?php echo $img_video; ?>">
					</a>
				</div>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>

			</div>				
			
			<?php } ?>			

			<?php if ($_GET["page"] == "mensagem") { ?>
				<div class="formularios profissionais">
					<div class="mensagem_marca">
						<h1 class="post-title entry-title">Envie mensagem para <?php the_title(); ?></h1>
						<form action="" method="post" id="formulario_mensagem">
							<input type="text" id="nome_msg" name="nome_msg" placeholder="Seu Nome">
							<input type="text" id="email_msg" name="email_msg" placeholder="Seu E-mail">
							<input type="text" id="assunto" name="assunto" placeholder="Assunto">
							<textarea id="mensagem" name="mensagem" placeholder="Mensagem para <?php the_title(); ?>"></textarea>
							<input type="button" id="botao_mensagem" value="Enviar Mensagem">
						</form>
					</div>	
				</div>
			<?php } ?>		
		</div>
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