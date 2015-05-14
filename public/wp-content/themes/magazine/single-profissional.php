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

<?php $atualizar_perfil = $_POST['atualizar_perfil'];
    if ($atualizar_perfil == 'atualizar_perfil'){
        $my_post = array(
          'ID'           => $idpost,
          'post_content' => $_POST['content_profissional'],
          'post_title'   => $_POST['titulo']
        );

      // Update the post into the database
        wp_update_post($my_post);

        update_post_meta($idpost, 'profissao', $_POST['profissao']);
        update_post_meta($idpost, 'basicanascimento', $_POST['data_nascimento']);
        update_post_meta($idpost, 'basicagenero', $_POST['genero']);
        update_post_meta($idpost, 'basicatelefones', $_POST['telefones']);
        update_post_meta($idpost, 'basicacidadenascimento', $_POST['cidade_nascimento']);
        update_post_meta($idpost, 'basicaestadonascimento', $_POST['estado_nascimento']);
        update_post_meta($idpost, 'basicacidadeatual', $_POST['cidade_atual']);
        update_post_meta($idpost, 'basicaestadoatual', $_POST['estado_atual']);
        update_post_meta($idpost, 'basicafacebook', $_POST['facebook']);
        update_post_meta($idpost, 'instagram', $_POST['instagram']);
        update_post_meta($idpost, 'twitter', $_POST['twitter']);
        update_post_meta($idpost, 'linkedin', $_POST['linkedin']);
        update_post_meta($idpost, 'blog', $_POST['blog']);
        update_post_meta($idpost, 'site', $_POST['site']);
        update_post_meta($idpost, 'escolaridade', $_POST['escolaridade']);
        update_post_meta($idpost, 'idiomas', $_POST['check_idiomas']);
        update_post_meta($idpost, 'paisesviagem', $_POST['paisesviagem']);
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sucesso_edicaoperfil').show();
      }) 
    </script>
  <?php } ?>
  

	
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

$valid_formats = array("jpg", "gif", "png", "tif", "jpeg", "JPG", "GIF", "PNG", "TIF", "JPEG");
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
		if ($actual_name) {
			add_post_meta($cur_post_id, 'imgnews', $attach_id, true);
		}    	
    	add_post_meta($cur_post_id, 'atletaesporte', $_POST['esporte'], true);
    	add_post_meta($cur_post_id, 'profissao', $_POST['profissao'], true);	
		add_post_meta($cur_post_id, 'basicaemail', $_POST['email'], true);
		add_post_meta($cur_post_id, 'videourl', $_POST['link_video'], true);
		add_post_meta($cur_post_id, 'Aprovado', 1 , true);

		$tipo_video = explode("/", $_POST['link_video']);
		$final_tipo = $tipo_video[2];
		if ($final_tipo == 'www.youtube.com') {
			$final_tipo = 'youtube';
		}else if ($final_tipo == 'vimeo.com') {
			$final_tipo = 'vimeo';
		}

		add_post_meta($cur_post_id, 'slvideo', $final_tipo, true);		

	    $destinatario = "renato.botani@letts.com.br";  

	    $headers = "From: $destinatario \r\n";
	    $headers.= "Content-Type: text/html; charset=ISO-8859-1 ";
	    $headers.= "MIME-Version: 1.0 ";    

	    $html = 'Você tem uma nova postagem de News para aprovação';

	    mail($destinatario,"Nova postagem pendente",$html,$headers);
		
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sucesso').show();
      }) 
    </script>
  <?php } ?>

  <?php 
  if ($_POST['link_video']) {
  	    $my_post_video = array(
          'post_title'    => $_POST['titulo_noticia'],
          'post_status'   => 'publish',
          'post_type'     => 'video',
          'post_author'   => 1
        );

        $post_id_video = wp_insert_post($my_post_video);
        add_post_meta($post_id_video, 'link_video', $_POST['link_video'], true);
        add_post_meta($post_id_video, 'basicaemail', $_POST['email'], true);
        add_post_meta($post_id_video, 'atletaesporte', $_POST['esporte'], true);
        add_post_meta($post_id_video, 'profissao', $_POST['profissao'], true); 
  }
  ?>

    <?php 
    $alterarfoto = $_POST['alterarfoto'];
    if ($alterarfoto == 'alterar'){ ?>

<?php $path = "wp-content/uploads/users/perfil/"; 

$valid_formats = array("jpg", "gif", "png", "tif", "jpeg", "JPG", "GIF", "PNG", "TIF", "JPEG");
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

$valid_formats = array("jpg", "gif", "png", "tif", "jpeg", "JPG", "GIF", "PNG", "TIF", "JPEG");
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
		delete_post_meta($cur_post_id, 'image_profissional');
		update_post_meta($cur_post_id, 'image_profissional', $attach_id, true);
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
	<?php $imagemdefault = get_custom_field('image_profissional'); 
			$defaultbg = 'http://letts.com.br/wp-content/uploads/users/defaultbg.jpg';
	if ($imagemdefault == $defaultbg && $_SESSION["lettslogin"] != $idpost) {
		$imagemdefault = '';
	}

	?>

	<div class="imagem_editar_capa" style="border-top: 5px #ff8920 solid;
				background-image: url('<?php echo $imagemdefault; ?>'); 
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
						<h4 class="widgettitle" style="border: 0px;"><?php print_custom_field('profissao'); ?></h4>
						<?php if ($_SESSION["lettslogin"] == $idpost) { ?>
			              <a class="editar_perfil" href="/edicao-profissional/?id_post=<?php echo $idpost; ?>">Editar Perfil</a>  
			            <?php } ?>
					</div>

		<p id="sucesso_perfil">Foto alterada com sucesso</p>			
		<p id="sucesso_capa">Foto de capa alterada com sucesso</p>
		<p id="sucesso_edicaoperfil">Dados alterados com sucesso</p>		

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
<div class="redes_sociais">
<a id="share-button" href="#" title="Facebook Share Button">
	<img src="/wp-content/themes/magazine/images/compartilhar.jpg" alt="Facebook Share Button" title="Facebook Share Button" />
</a>

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-share="false" data-send="true" data-layout="button" data-width="350" data-show-faces="false" data-colorscheme="dark" data-action="like"></div>
</div>

<?php 
	$imagem_fb = get_custom_field('basicaimagem:to_image_src');
	$texto_fb = strip_tags(get_the_excerpt(120));
?>

<script type="text/javascript">

$('#share-button').click(function (e){
	e.preventDefault();
	FB.ui({
		method: 'feed',
		name: '<?php the_title(); ?>',
		link: '<?php the_permalink(); ?>',
		picture: '<?php echo $imagem_fb; ?>',
		caption: '',
		description: '<?php echo $texto_fb; ?>',
	});
});
</script>

<meta property="og:image" content="<?php echo $imagem_fb; ?>"/>	

	<div>
		<div style="float: left; width: 325px;">
				<div class="col3-1" style="width: 100%; margin: 0px; background: #EFEFEF; padding-left: 15px; border-top: 5px #ff8920 solid;">
					<div id="text-1016" class="widget widget_text" style="">
						<h4 class="widgettitle">Informações básicas</h4>			
						<div class="textwidget">
							<div style="margin-top: 10px;"><strong>Data de nascimento</strong></div>
							<?php print_custom_field('basicanascimento'); ?><br />

							<div style="margin-top: 10px;"><strong>Sexo</strong></div>
							<?php print_custom_field('basicagenero'); ?><br />

							<div style="margin-top: 10px;"><strong>Telefones</strong></div>
							<?php print_custom_field('basicatelefones'); ?><br />

							<div style="margin-top: 10px;"><strong>Nascimento</strong></div>
							<?php print_custom_field('basicacidadenascimento'); ?>, <?php print_custom_field('basicaestadonascimento'); ?><br />

							<div style="margin-top: 10px;"><strong>Onde Mora</strong></div>
							<?php print_custom_field('basicacidadeatual'); ?>, <?php print_custom_field('basicaestadoatual'); ?><br />	

							<div style="margin-top: 10px;"><strong>E-mail</strong></div>
							<?php print_custom_field('basicaemail'); ?><br />
							
							<div style="margin-top: 10px;"><strong>Escolaridade</strong></div>
							<?php print_custom_field('escolaridade'); ?><br />

							<div style="margin-top: 10px;"><strong>Idiomas</strong></div>
							<?php 
								$my_array = get_custom_field('idiomas:to_array');
								foreach ($my_array as $item) {
									print $item.'<br />'; 
								}
							?>

							<div style="margin-top: 10px;"><strong>Paises que já viajou</strong></div>
							<?php print_custom_field('paisesviagem'); ?>

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
                <a href="/print-profissional?post_id=<?php echo get_the_ID(); ?>" target="_blank">Imprimir Currículo</a>
              <?php } ?>  							
					</div>			
				</div>
				<?php include('banner_lateral.php') ?>  
		</div>

			<?php if ($_GET["page"] == "sobre") { ?>
				
				<?php $conteudo = get_the_content();
				if ($conteudo == '') { } else { ?>
				<div style="width: 685px; float: left; margin-left: 50px;">
				
				<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Minha história</h4>
				<?php the_content(); ?>

				</div>
				<?php } ?>
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
		             <textarea class="textarea_noticia" name="content_noticia" placeholder="No que você está pensando..."></textarea>
		             <input class="input_noticia" type="text" name="titulo_noticia" value="" placeholder="Título da Postagem">
		        <p style="margin: 0px 0px 2px;text-align: center;">Selecione apenas uma opção: Esporte ou Profissão</p>     
                <select id="atletaesporte" name="esporte" style="width: 325px; height: 35px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; margin: 0px 27px 14px 0px;">
                        <option>-- Selecione o esporte --</option>
                        <option value="Aeromodelismo">Aeromodelismo</option>
                        <option value="Alpinismo">Alpinismo</option>
                        <option value="Asa Delta">Asa Delta</option>
                        <option value="BMX">BMX</option>
                        <option value="BMX – Free style">BMX – Free style</option>
                        <option value="Balonismo">Balonismo</option>
                        <option value="Base Jumping">Base Jumping</option>
                        <option value="Bodyboard">Bodyboard</option>
                        <option value="Bouldering">Bouldering</option>
                        <option value="Bungee Jumping">Bungee Jumping</option>
                        <option value="Canoagem">Canoagem</option>
                        <option value="Carveboard">Carveboard</option>
                        <option value="Caça submarina">Caça submarina</option>
                        <option value="Ciclismo">Ciclismo</option>
                        <option value="Cliff Diving">Cliff Diving</option>
                        <option value="Corrida aventura">Corrida aventura</option>
                        <option value="Drift">Drift</option>
                        <option value="Escalada">Escalada</option>
                        <option value="Esqui">Esqui</option>
                        <option value="Football Freestyle">Football Freestyle</option>
                        <option value="Free Style Motocross">Free Style Motocross</option>
                        <option value="FreeBoard">FreeBoard</option>
                        <option value="Heli-Skiing">Heli-Skiing</option>
                        <option value="Highline">Highline</option>
                        <option value="Jet Ski">Jet Ski</option>
                        <option value="Kart">Kart</option>
                        <option value="Kitesurfing">Kitesurfing</option>
                        <option value="Liquid Mountaineering">Liquid Mountaineering</option>
                        <option value="Longboard skate">Longboard skate</option>
                        <option value="Longboard surf">Longboard surf</option>
                        <option value="Mega ramp">Mega ramp</option>
                        <option value="Mergulho">Mergulho</option>
                        <option value="Moto Trial">Moto Trial</option>
                        <option value="Moto Wheeling">Moto Wheeling</option>
                        <option value="Motocross">Motocross</option>
                        <option value="Mountain Bike">Mountain Bike</option>
                        <option value="Mountain biking">Mountain biking</option>
                        <option value="Mountain boarding">Mountain boarding</option>
                        <option value="Off Road/Rally">Off Road/Rally</option>
                        <option value="Paintball">Paintball</option>
                        <option value="Paragliding">Paragliding</option>
                        <option value="Paragliding">Paragliding</option>
                        <option value="Parapente">Parapente</option>
                        <option value="Parkour">Parkour</option>
                        <option value="Patins in Line">Patins in Line</option>
                        <option value="Psicobloc">Psicobloc</option>
                        <option value="Rafting">Rafting</option>
                        <option value="Rally">Rally</option>
                        <option value="Rapel">Rapel</option>
                        <option value="Sandboard">Sandboard</option>
                        <option value="Skate - Street">Skate - Street</option>
                        <option value="Skate – Free style">Skate – Free style</option>
                        <option value="Skate – Mini ramp">Skate – Mini ramp</option>
                        <option value="Sky Surfing">Sky Surfing</option>
                        <option value="Skydive">Skydive</option>
                        <option value="Slackline">Slackline</option>
                        <option value="Snowboard">Snowboard</option>
                        <option value="Stand Up Paddle">Stand Up Paddle</option>
                        <option value="Street Luge">Street Luge</option>
                        <option value="Surf">Surf</option>
                        <option value="Surf - Freesurf">Surf - Freesurf</option>
                        <option value="Tow-in">Tow-in</option>
                        <option value="Trekking">Trekking</option>
                        <option value="Triathlon">Triathlon</option>
                        <option value="UFC (MMA">UFC (MMA)</option>
                        <option value="Vela/Iatismo">Vela/Iatismo</option>
                        <option value="Velocidade">Velocidade</option>
                        <option value="Wakeboard">Wakeboard</option>
                        <option value="Wakeboard Free style">Wakeboard Free style</option>
                        <option value="Windsurf">Windsurf</option>
                        <option value="WingWalking">WingWalking</option>
                      </select>

                <select id="profissao" name="profissao" style="width: 330px; height: 35px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; margin-bottom: 14px; margin-top: 0px; margin-right: -2px;">
                      <option>-- Selecione a profissão --</option>
                      <option value="Assessor de imprensa">Assessor de imprensa</option>
                      <option value="Coordenador de eventos">Coordenador de eventos</option>
                      <option value="Desenhista">Desenhista</option>
                      <option value="Empresário">Empresário</option>
                      <option value="Estatístico">Estatístico</option>
                      <option value="Estilista">Estilista</option>
                      <option value="Executivo de contas publicitárias">Executivo de contas publicitárias</option>
                      <option value="Fisioterapeuta">Fisioterapeuta</option>
                      <option value="Fotografo">Fotografo</option>
                      <option value="Fotojornalista">Fotojornalista</option>
                      <option value="Gerente de relações públicas">Gerente de relações públicas</option>
                      <option value="Gestor desportivo">Gestor desportivo</option>
                      <option value="Jornalista">Jornalista</option>
                      <option value="Nutricionista">Nutricionista</option>
                      <option value="Personal Crossfit">Personal Crossfit</option>
                      <option value="Personal academia">Personal academia</option>
                      <option value="Professor de idomas">Professor de idomas</option>
                      <option value="Psicologo">Psicologo</option>
                      <option value="Psicólogo esportivo">Psicólogo esportivo</option>
                      <option value="Técnico">Técnico</option>
                      <option value="Videomaker">Videomaker</option>
                  </select> 				             
					<div class="custom-upload">
					    <input type="file" name="img_destacada">
					    <div class="fake-file">
					        <input disabled="disabled" placeholder="Selecione uma Imagem">
					    </div>
					</div>

		             <input class="input_video" type="text" name="link_video" style="width: 316px !important; max-width: 100%;margin-top: -33px;float: right;margin-right: -1px;" value="" placeholder="Link do Video do Youtube ou Vímeo">
		             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">
		             <input type="hidden" value="adicionarnews" name="adicionarnews">
		             <input type="submit" style="float: right; margin-top: 0px;margin-left: 300px;" value="Publicar">
            </form> 
            <?php } ?>				
			<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px; margin-top: 45px;">News</h4>

			<?php while (have_posts()) : the_post(); ?>

			<div class="related-posts news_perfil" style="float: left; width: 100%;">
				<?php $imgsizeok = get_custom_field('imgnews:to_image_src'); 
					if ($imgsizeok) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
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
				</div></a>
				<?php }else if(get_custom_field('videourl')){

				$video = get_custom_field('videourl'); 
				$video = explode("/", $video);
				$url_video = explode("=", $video[3]);
				if ($url_video[0] == 'watch?v') {
				 	$imgid = $url_video[1]; ?>
				 	<iframe width="710" height="350" src="//www.youtube.com/embed/<?php echo $imgid; ?>" frameborder="0" allowfullscreen></iframe>
				 <?php 	
				 } else{
				$imgid = $url_video[0]; ?>
				<iframe width="710" height="350" src="http://player.vimeo.com/video/<?php echo $imgid; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<?php } 
				} ?>




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

	<?php /* if ($_SESSION["lettslogin"] && $_SESSION["lettslogin"] != $idpost) { ?>

    <?php if ($_POST['comment']){ ?>
      <p>Comenário adicionado com sucesso.</p>
    <?php } ?>

   <form action="" method="post" id="commentform">
      <fieldset>
      <h3><span>Deixe seu comentário</span></h3>
      <ul>
        <li>
          <label for="author">Nome: <span>(Obrigatório)</span></label>
          <input type="text" aria-required="true" tabindex="1" size="22" id="author" name="author" value="" maxlength="100">
        </li>                           
        <li>
          <label for="email">E-mail: <span>(Obrigatório)</span></label>
          <input type="text" aria-required="true" tabindex="2" size="22" id="email" name="email" value="">
        </li>                           
        <li>
          <label for="url">Website: </label>
          <input type="text" tabindex="3" size="22" value="" id="url" name="url">
        </li>
        <li>
        <label for="comment">Comentário: </label>
        <textarea tabindex="4" rows="10" cols="58" id="comment" name="comment"></textarea>
        <div class="clear"></div>
        <span>&nbsp;</span>
        <input type="submit" value="Enviar" tabindex="5" id="submit" class="bt-enviar-comentarios" name="submit">
        <input type="hidden" name="comment_post_ID" value="<?php the_ID(); ?>" id="comment_post_ID">
        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
        </li>                                                        
      </ul>
            </fieldset>
    </form>
<?php } */ ?>			
		</div>

			<?php } ?>

			<?php if ($_GET["page"] == "fotos") { ?>
				<div style="width: 685px; float: left; margin-left: 50px;">
					<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Fotos</h4>
					<?php if ($_SESSION["lettslogin"] == $idpost) { ?>
						<a class="button link_botao" href="/add-fotos-profissional/?id_post=<?php echo $idpost; ?>">+ Fotos</a>
					<?php } ?>						
					<div class="galeria_profissional">
						<?php $pasta = "wp-content/uploads/users/$idpost/"; 
							$diretorio = dir($pasta);
								while($arquivo = $diretorio -> read()){ 
									if($arquivo != '..' && $arquivo != '.'){
										$arrayArquivos[date('Y/m/d H:i:s', filemtime($pasta.$arquivo))] = $pasta.$arquivo;
									}
								} 
								$diretorio -> close();	 

								krsort($arrayArquivos, SORT_STRING);

							foreach($arrayArquivos as $valorArquivos){
								echo '<div class="img_profissional">
									<a href="/'.$valorArquivos.'" class="fancybox" rel="gallery">
										<img src="/'.$valorArquivos.'">
									</a>
								</div>';
							}	

						?>
					</div>
					
					<div class="fb-comments" data-href="<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']; ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
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
				<a class="button link_botao" href="/add-videos-profissional/?id_post=<?php echo $idpost; ?>">+ Vídeos</a>
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

				<div class="fb-comments" data-href="<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']; ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>

			</div>				
			
			<?php } ?>			

			<?php if ($_GET["page"] == "mensagem") { ?>
				<div class="formularios profissionais">
					<div class="mensagem_atleta">
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

			<div style="float: right; width: 652px; margin-right: 40px; margin-top: 30px;">
				<div class="fb-comments" data-href="<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']; ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
			</div>	
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
	$('.textarea_noticia').click(function() {
		$('.textarea_noticia').css('height','200px');
	})

	$('.textarea_noticia').focusout(function() {
		$('.textarea_noticia').css('height','30px');
	})
});

$("#atletaesporte").change(function() {
  $("#profissao").hide();
  $("#atletaesporte").css('width','684px');
}) 

$("#profissao").change(function() {
  $("#atletaesporte").hide();
  $("#profissao").css('width','684px');
}) 

$('.custom-upload input[type=file]').change(function(){
    $(this).next().find('input').val($(this).val());
});

</script>

<style type="text/css">
.banner_lateral {
  margin-top: 30px;
  width: 100%;
  display: inline-block;
}

.fb-like span{
	width: 450px !important;
}
</style>