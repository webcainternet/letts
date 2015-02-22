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

  <?php $publicar_news = $_POST['adicionarnews'];
    if ($publicar_news == 'adicionarnews'){ ?>
	  <?php 
      // Create post object
        $my_post = array(
          'post_title'    => $_POST['titulo_noticia'],
          'post_status'   => 'pending',
          'post_content'   => $_POST['content_noticia'],
          'post_type'     => 'news',
          'post_author'   => 1
        );

mkdir('C:\xampp\htdocs\letts\public\wp-content\uploads\users\\'.$idpost);
$path = "wp-content/uploads/users/".$idpost."/"; 

$valid_formats = array("pdf", "doc", "xls", "docx", "jpg", "gif", "png", "tif", "zip", "jpeg", "xlsx", "ppt", "pptx");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{

	//Arquivo Catálogo
	$name = $_FILES['img_destacada']['name'];
	$size = $_FILES['img_destacada']['size'];

	$file_info = pathinfo($name);
	$name = md5($name) .'.'. $file_info['extension'];

	if(strlen($name))
		{
			list($txt, $ext) = explode(".", $name);
			if(in_array($ext,$valid_formats))
			{
			if($size<(10240*10240))
				{
					$actual_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					$tmp = $_FILES['img_destacada']['tmp_name'];
					if(move_uploaded_file($tmp, $path.$actual_name))
						{
							$response['response']="Arquivo OK";
						}
					else
						$response['response']="Falhou"; 
				}
				else
				$response['response']="Arquivo tem mais de 4MB"; 
				}
				else
				$response['response']="Formato Inválido"; 
		}
	else
		$response['response']="Selecione um arquivo";
}

		$cur_post_id = wp_insert_post( $my_post );

		$filename = 'http://letts.com.br/wp-content/uploads/users/'.$idpost.'/'.$actual_name;

		$wp_filetype = wp_check_filetype(basename($filename), null );
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
			'post_content' => '',
			'post_status' => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $cur_post_id );
		add_post_meta($cur_post_id, '_thumbnail_id', $attach_id, true);
		add_post_meta($cur_post_id, 'post_image', $filename, true);
		add_post_meta($cur_post_id, 'imgnews', $attach_id, true);
		add_post_meta($cur_post_id, 'basicaemail', $_POST['email'], true);
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sucesso').show();
      }) 
    </script>
  <?php } ?>

    <?php 
    $alterarfoto = $_POST['alterarfoto'];
    if ($alterarfoto == 'alterar'){ ?>

<?php $path = "wp-content/uploads/users/perfil/"; 

$valid_formats = array("pdf", "doc", "xls", "docx", "jpg", "gif", "png", "tif", "zip", "jpeg", "xlsx", "ppt", "pptx");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{

	//Arquivo Catálogo
	$name = $_FILES['img_perfil']['name'];
	$size = $_FILES['img_perfil']['size'];

	$file_info = pathinfo($name);
	$name = md5($name) .'.'. $file_info['extension'];

	if(strlen($name))
		{
			list($txt, $ext) = explode(".", $name);
			if(in_array($ext,$valid_formats))
			{
			if($size<(10240*10240))
				{
					$actual_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					$tmp = $_FILES['img_perfil']['tmp_name'];
					if(move_uploaded_file($tmp, $path.$actual_name))
						{
							$response['response']="Arquivo OK";
						}
					else
						$response['response']="Falhou"; 
				}
				else
				$response['response']="Arquivo tem mais de 4MB"; 
				}
				else
				$response['response']="Formato Inválido"; 
		}
	else
		$response['response']="Selecione um arquivo";
}

		$cur_post_id = $idpost;

	
		$filename = 'http://letts.com.br/wp-content/uploads/users/perfil/'.$actual_name;

		$wp_filetype = wp_check_filetype(basename($filename), null );
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
			'post_content' => '',
			'post_status' => 'inherit'
		);
		$attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
		delete_post_meta($cur_post_id, 'basicaimagem');
		update_post_meta($cur_post_id, 'basicaimagem', $attach_id, true);
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sucesso_perfil').show();
      }) 
    </script>
  <?php } ?> 

    <?php 
    $alterarfotocapa = $_POST['alterarfotocapa'];
    if ($alterarfotocapa == 'alterar'){ ?>

<?php $path = "wp-content/uploads/users/capa/"; 

$valid_formats = array("pdf", "doc", "xls", "docx", "jpg", "gif", "png", "tif", "zip", "jpeg", "xlsx", "ppt", "pptx");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{

	//Arquivo Catálogo
	$name = $_FILES['img_capa']['name'];
	$size = $_FILES['img_capa']['size'];

	$file_info = pathinfo($name);
	$name = md5($name) .'.'. $file_info['extension'];

	if(strlen($name))
		{
			list($txt, $ext) = explode(".", $name);
			if(in_array($ext,$valid_formats))
			{
			if($size<(10240*10240))
				{
					$actual_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					$tmp = $_FILES['img_capa']['tmp_name'];
					if(move_uploaded_file($tmp, $path.$actual_name))
						{
							$response['response']="Arquivo OK";
						}
					else
						$response['response']="Falhou"; 
				}
				else
				$response['response']="Arquivo tem mais de 4MB"; 
				}
				else
				$response['response']="Formato Inválido"; 
		}
	else
		$response['response']="Selecione um arquivo";
}

		$cur_post_id = $idpost;

	
		$filename = 'http://letts.com.br/wp-content/uploads/users/capa/'.$actual_name;

		$wp_filetype = wp_check_filetype(basename($filename), null );
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
			'post_content' => '',
			'post_status' => 'inherit'
		);
		$attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
		delete_post_meta($cur_post_id, 'atletaimagembackground');
		update_post_meta($cur_post_id, 'atletaimagembackground', $attach_id, true);
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sucesso_capa').show();
      }) 
    </script>
  <?php } ?> 

	
	<?php if( have_posts() ) while ( have_posts() ) : the_post(); ?>

<style type="text/css">
.editar_perfil{
	font-size: 12px;
	margin-top: -25px;
	float: left;
}

.news_perfil:nth-child(2n+2){
	margin-left: 0px;
}

</style>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">
	<div class="imagem_editar_capa" style="border-top: 5px #ff8920 solid; 
				background-image: url('<?php print_custom_field('atletaimagembackground'); ?>'); 
				background-size: 1064px; 
				background-position:center; 
				height: 400px;">

		<?php if ($_SESSION["lettslogin"] == $idpost) { ?>		
			<div id="link_editar_capa">
					<a class="fancybox" href="/alterar-foto-de-capa/?id_post=<?php echo $idpost; ?>">Editar Foto de Capa</a>		
			</div>			
		<?php } ?>

		<div class="imagem_editar" style="float: left;
					margin-left: 30px; 
					border: 1px #ff8920 solid; 
					width: 180px; 
					height: 180px; 
					margin-top: 280px;
					background-image: url('<?php print_custom_field('basicaimagem:to_image_src'); ?>'); 
					background-size: 1800px; 
					background-position:center; " id="imgbackground">
			<?php if ($_SESSION["lettslogin"] == $idpost) { ?>	
			<div id="link_editar">
				<a class="fancybox" href="/alterar-foto/?id_post=<?php echo $idpost; ?>">Editar Foto</a>		
			</div>
			<?php } ?>
				
			&nbsp;
		</div>

	</div>

<script type="text/javascript">
	$(document).ready(function() {
    	$('.imagem_editar').hover(function(){
    		$('#link_editar').toggle();
    	})

    	$('.imagem_editar_capa').hover(function(){
    		$('#link_editar_capa').toggle();
    	})    	
	});
</script>


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
		<?php if ($_SESSION["lettslogin"] != $idpost) { ?>		
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
		<?php } ?>	

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
						<h4 class="widgettitle" style="border: 0px;"><?php print_custom_field('atletaesporte'); ?></h4>
						<?php if ($_SESSION["lettslogin"] == $idpost) { ?>
			              <a class="editar_perfil" href="/edicao-atleta/?id_post=<?php echo $idpost; ?>">Editar Perfil</a>  
			            <?php } ?>	
					</div>

		<p id="sucesso_perfil">Foto alterada com sucesso</p>			
		<p id="sucesso_capa">Foto de capa alterada com sucesso</p>			
			
		</div>
		
	</div>

	<div style="margin-top: 20px; margin-bottom: 20px; width: 100%; float: left;">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; text-align: center; padding: 0; font-size: 1.5em; font-family: Oswald, sans-serif; 
			text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;">
				<a href="<?php the_permalink(); ?>" style="font-weight: bold; font-size: 50px;"><?php the_title(); ?></a>
			</h1>
		</a>
	</div>

	<div>
		<div style="float: left; width: 325px;">
				<div class="col3-1" style="width: 100%; margin: 0px; background: #F5E1CD; padding-left: 15px; border-top: 5px #ff8920 solid;">
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

							<div style="margin-top: 10px;"><strong>E-mail</strong></div>
									<?php print_custom_field('basicaemail'); ?><br />
						</div>
			
						<div class="textwidget icones_sociais">
							<div style="margin-top: 10px;"><strong>Outros Contatos</strong></div>
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
							<?php if ($_SESSION["lettslogin"] == $idpost) { ?>
								<a href="/print?post_id=<?php echo get_the_ID(); ?>" target="_blank">Imprimir Currículo</a>
							<?php } ?>	
					</div>			
				</div>
		</div>
			<?php if ($_GET["page"] == "sobre") { ?>
				
				<div style="width: 685px; float: left; margin-left: 50px;">
				
				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Minha história</h4>
				<?php the_content(); ?>

				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Patrocínio ou apoio que esta procurando</h4>
				<?php print_custom_field('atletapatrocinio'); ?><br /><br />

				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Meu sonho</h4>
				<?php print_custom_field('atletameusonho'); ?><br /><br />

				</div>
			<?php } ?>

			<?php if ($_GET["page"] == "" || $_GET["page"] == "news") { ?>
			<?php 
			$email_user = get_custom_field('basicaemail'); ?>
			<?php $args = array(
			    'orderby'       	=>  'post_date',
			    'post_type'     	=>  'news',
			    'meta_key'     		=>  'basicaemail',
			    'meta_value'     	=>  $email_user,			    
			    'order'        		=>  'DESC',
			    'post_status'		=> 	array('pending', 'publish')
			); 
			query_posts($args); ?>

			<div style="width: 685px; float: left; margin-left: 50px;">
			<?php if ($_SESSION["lettslogin"] == $idpost) { ?>
				<p id="sucesso">Noticia cadastrada com sucesso.</p>
            <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
	             <div id="box_pensando">
		             <textarea class="textarea_noticia" name="content_noticia" placeholder="No que você está pensando..."></textarea>
					 <span class="button" id="avancar" style="float: right;">Avançar</span>
				 </div>

				 <div id="nome_img">
		             <input class="input_noticia" type="text" name="titulo_noticia" value="" placeholder="Título da Postagem">
		             <input type="file" class="custom-file-input input_file" name="img_destacada">
		             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">
		             <input type="hidden" value="adicionarnews" name="adicionarnews">
		             <input type="submit" style="float: right;" value="Publicar">
            	</div>
            </form> 
            <?php } ?>

			<h4 class="widgettitle" style="border: 0px; padding: 0px; margin-top: 20px; margin-bottom: 10px;">News</h4>

			<?php while (have_posts()) : the_post(); ?>

			<div class="related-posts news_perfil" style="float: left; width: 100%;">
				<?php $imgsizeok = get_custom_field('imgnews:to_image_src'); 
					if ($imgsizeok) { ?>
				<div class="imgnoticias" style="width: 679px; border-radius: 5px; height: 320px;  margin-bottom: 15px;">
					<?php
						$imgsizeok = str_replace("letts.com.br/", "", $imgsizeok);
						$imgsizeok = str_replace("http://", "", $imgsizeok);
						$imgsizeok = str_replace("https://", "", $imgsizeok);
					?>
					<div style="width: 679px; 
			      	height: 320px; 
			      	background-image: url('<?php print_custom_field('imgnews:to_image_src'); ?>');
			      	background-position: center;
			      	<?php echo calcbackgroundsize($imgsizeok, 685, 320); ?>; ">
			      		&nbsp;
  					</div>
					<?php /*<img src="<?php print_custom_field('imgnews:to_image_src'); ?>" style="max-height: 212px;"> */?>
				
				</div>
				<?php } ?>


				



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

				<div style="float: left; width: 100%;"><hr style="border: 0px; margin: 0px 0px 30px; border-top: dotted 1px;"></div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>

			<?php } ?>

			<?php if ($_GET["page"] == "fotos") { ?>
				<div style="width: 685px; float: left; margin-left: 50px;">
					<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Fotos</h4>
					<?php if ($_SESSION["lettslogin"] == $idpost) { ?>
						<a class="button link_botao" href="/add-fotos/?id_post=<?php echo $idpost; ?>">+ Fotos</a>
					<?php } ?>	
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
			<?php if ($_SESSION["lettslogin"] == $idpost) { ?>
				<a class="button link_botao" href="/add-videos/?id_post=<?php echo $idpost; ?>">+ Vídeos</a>
			<?php } ?>	

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

<script type="text/javascript">
$(document).ready(function() {
	$('#avancar').click(function(){
   	 	$('#box_pensando').hide();
		$('#nome_img').show();
   	}) 

	$('.textarea_noticia').click(function() {
		$('.textarea_noticia').css('height','200px');
	})

	$('.textarea_noticia').focusout(function() {
		$('.textarea_noticia').css('height','30px');
	})
});
</script>