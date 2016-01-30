<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<script type="text/javascript">
   $(document).ready(function(){
      $("#postarmensagem").click(function(){
          if ($( "#nome_msg" ).val() == "") {
            alert( "Você deve preencher o nome!" );
            $( "#nome_msg" ).focus();
            } else {
           		if ($( "#email_msg" ).val() == "") {
           			alert( "Você deve preencher o e-mail!" );
           			$( "#email_msg" ).focus();
       			} else {
       				if ($( "#assunto" ).val() == "") {
       					alert( "Você deve preencher o assunto!" );
       					$( "#assunto" ).focus();
       				} else {
       					if ($( "#mensagemmail" ).val() == "") {
	       					alert( "Você deve preencher a mensagem!" );
	       					$( "#mensagemmail" ).focus();
	       				} else {
	       					$( "#formmensagem" ).submit();
	       				}
       				}
       			}
   			}
      });
   });
 </script>

<style type="text/css">
	.formularios textarea {
    width: 95%;
    padding: 10px;
    height: 53px;
}
.comentario-texto {
    width: 345px;
}
.comentario-content {
    width: 410px;
}
.formularios input[type="text"] {
    max-width: 96%;
}
</style>

<?php 
/** Themify Default Variables
 *  @var object */
global $themify; ?>

<?php $idpost = get_the_ID(); ?>

<?php $atualizar_perfil = $_POST['atualizar_perfil'];
    if ($atualizar_perfil == 'atualizar_perfil'){
        $my_post = array(
          'ID'           => $idpost,
          'post_content' => $_POST['content_marca'],
          'post_title'   => $_POST['titulo']
        );

      // Update the post into the database
        wp_update_post($my_post);

        update_post_meta($idpost, 'basicatelefones', $_POST['telefones']);
        update_post_meta($idpost, 'basicafacebook', $_POST['facebook']);
        update_post_meta($idpost, 'instagram', $_POST['instagram']);
        update_post_meta($idpost, 'twitter', $_POST['twitter']);
        update_post_meta($idpost, 'linkedin', $_POST['linkedin']);
        update_post_meta($idpost, 'blog', $_POST['blog']);
        update_post_meta($idpost, 'site', $_POST['site']);
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sucesso_edicaoperfil').show();
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
		delete_post_meta($cur_post_id, 'basicaimagem');
		update_post_meta($cur_post_id, 'basicaimagem', $attach_id, true);
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sucesso_capa').show();
      }) 
    </script>
  <?php } ?> 

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
		delete_post_meta($cur_post_id, 'logo');
		update_post_meta($cur_post_id, 'logo', $attach_id, true);
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sucesso_perfil').show();
      }) 
    </script>
  <?php } ?> 

	<?php if( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<!-- content -->

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix" style="margin-bottom: 40px;">
<?php $defaultbg1 = get_custom_field('logo:to_image_src'); 
	  $defaultbg1 = str_replace('defaultbg.jpg', 'defaultbgmarcas.jpg' , $defaultbg1);
?>
	
		
	<div class="img_marcas imagem_editar_capa" style="background: url('<?php echo $defaultbg1; ?>') no-repeat; background-size: 1064px !important; height: 405px; background-position:center;">
		<?php if ($_SESSION["lettslogin"] == $idpost) { ?>		
			<div id="link_editar_capa">
					<a class="fancybox" href="/alterar-foto-de-capa/?id_post=<?php echo $idpost; ?>">Editar Foto de Capa</a>		
			</div>			
		<?php } ?>
	</div>

	<?php if (get_custom_field('logo:to_image_src')	) { ?>
		<div class="logo_marcas imagem_editar" style="background: url('<?php print_custom_field('basicaimagem:to_image_src'); ?>') no-repeat; margin-right: 25px;">
			<?php if ($_SESSION["lettslogin"] == $idpost) { ?>	
			<div id="link_editar">
				<a class="fancybox" href="/alterar-foto/?id_post=<?php echo $idpost; ?>">Editar Foto</a>		
			</div>
			<?php } ?>
		</div>
	<?php } ?>


<div class="redes_sociais">
<a id="share-button" href="#" title="Facebook Share Button">
	<img src="/wp-content/themes/magazine/images/compartilhar.jpg" alt="Facebook Share Button" title="Facebook Share Button" />
</a>

<div style="margin: 0px; padding: 0px; margin-top: -12px;">
	<div class="fb-like" data-href="<?php the_permalink(); ?>" data-share="false" data-send="true" data-layout="button" data-width="350" data-show-faces="false" data-colorscheme="dark" data-action="like"></div>
	</div>
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

		<p id="sucesso_perfil" class="bg_sucesso">Foto alterada com sucesso</p>			
		<p id="sucesso_capa" class="bg_sucesso">Foto de capa alterada com sucesso</p>
		<p id="sucesso_edicaoperfil" class="bg_sucesso">Dados alterados com sucesso</p>				

<?php 
	if ($_SESSION["lettslogin"] == $idpost) {
		$ismypage = 1;
	}
?>

	<div style="float: left; margin: 15px 0px; width: 420px;">
		<h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 1.5em; font-family: Oswald, sans-serif; width: 785px;"> 
			<a href="<?php the_permalink(); ?>" style="font-weight: bold; font-size: 50px" >
					<?php the_title(); ?>
			</a>
		</h1>


		<?php if ($_SESSION["lettslogin"] == $idpost) { ?>	
			<a class="editarperfil_marca" href="/edicao-marca/?id_post=<?php echo $idpost; ?>">Editar Perfil</a>		
		<?php } ?>

		<?php print_custom_field('endereco:do_shortcode'); ?>
		<p>Telefones: <?php print_custom_field('basicatelefones'); ?><br />
		E-mail: <?php $emailuser = get_custom_field('basicaemail'); echo $emailuser; ?></p>
	</div>
	<div class="icones_sociais">
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

	<div class="description_marcas">
			<?php if ($_SESSION["lettslogin"] != $idpost) { ?>
				<div style="float: right;">
					<iframe src="http://letts.com.br/wp-content/themes/magazine/visitas.php?idlogin=<?php echo $idpost; ?>" width="1" height="1" frameborder="0" scrolling="no" noresize></iframe>
				</div>
			<?php } ?>

			<?php if ($_SESSION["lettslogin"] == $idpost) { ?>
				<div style="float: right;">
					<iframe src="http://letts.com.br/wp-content/themes/magazine/visitas.php?idlogin=<?php echo $idpost; ?>" width="275" height="36" frameborder="0" scrolling="no" noresize></iframe>
				</div>
			<?php } ?>

		<?php the_content(); ?>
	</div>

		<!--<div class="fb-comments" data-href="<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']; ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>-->

	<div class="formularios">

		<div style="float: left; width: 43%;
					  padding: 10px 30px 30px;
					  border: 0px;
					  border-radius: 0px;
					  margin: 0 auto;">
          

		  	<?php
                $idpagina = $_SERVER['REQUEST_URI'];;
                include "comentarios_ajax.php"; 
            ?>


        </div>

		<?php if ($_SESSION["lettslogin"] == $idpost) { ?>	
		<div class="convidar_atleta" style="float: left;>
			<h1 class="post-title entry-title">Convide um Atleta</h1>
			<form action="" method="post" id="formulario_convite">
				<input type="text" id="nome" name="nome" placeholder="Seu Nome">
				<input type="text" id="nome_atleta" name="nome_atleta" placeholder="Nome do Atleta">
				<input type="text" id="email_atleta" name="email_atleta" placeholder="E-mail do Atleta">
				<textarea id="mensagem_atleta" name="mensagem_atleta" placeholder="Mensagem ao Atleta"></textarea>
				<input type="button" id="botao_convite" value="Convidar Atleta">
			</form>
		</div>
		<?php }else{ ?>

		<?php /* INICIO BLOCO DE ENVIO DE EMAIL */ ?>
				<div class="formularios profissionais">
					<?php if ( isset($_POST['nome_msg']) && isset($_POST['email_msg']) && isset($_POST['assunto']) && isset($_POST['mensagem']) && isset($_SESSION['lettslogin']) ) { 
						//to: 
						$to  = $emailuser;

						// subject
						$subject = 'Letts Mensagem - '.$_POST['nome_msg'];

						// message
						$message = '
						<html>
						<head>
						  <title>'.$subject.'</title>
						</head>
						<body>
						  <p>Mensagem enviada através do site letts.com.br!</p>
						  <table>
						    <tr>
						      <th>Nome: </th>
						      <td>'.$_POST['nome_msg'].'</td>
						    </tr>
						    <tr>
						      <th>Email: </th>
						      <td>'.$_POST['email_msg'].'</td>
						    </tr>
						    <tr>
						      <th>Assunto: </th>
						      <td>'.$_POST['assunto'].'</td>
						    </tr>
						    <tr>
						      <th>Mensagem: </th>
						      <td>'.$_POST['mensagem'].'</td>
						    </tr>
						  </table>
						</body>
						</html>
						';

						// To send HTML mail, the Content-type header must be set
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

						// Additional headers
						$headers .= 'To: '. $emailuser . "\r\n";
						$headers .= 'From: Letts Mensagem <noreply@letts.com.br>' . "\r\n";
						//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
						//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

						// Mail it
						mail($to, $subject, $message, $headers);

					?>
					<div class="mensagem_atleta" style="width: 37%; margin-left: 0px;">
						<h1 class="post-title entry-title" style="padding-top: 25px;">Mensagem enviada com sucesso!</h1>
					</div>	
					<?php } else {
						if ($_SESSION['lettslogin'] == 1) { ?>
							<div class="mensagem_atleta" style="width: 37%; margin-left: 0px;">
								<h2 class="post-title entry-title" style="padding-top: 25px; font-size: 24px;">Efetue o login para enviar mensagem!</h1>
							</div>	
						<?php } else { ?>
							<div class="mensagem_atleta" style="width: 37%; margin-left: 0px;">
								<h1 class="post-title entry-title">Envie mensagem para <?php the_title(); ?></h1>
								<form id="formmensagem" action="" method="post" id="formulario_mensagem">
									<input type="text" id="nome_msg" name="nome_msg" placeholder="Seu Nome">
									<input type="text" id="email_msg" name="email_msg" placeholder="Seu E-mail">
									<input type="text" id="assunto" name="assunto" placeholder="Assunto">
									<textarea id="mensagemmail" name="mensagem" placeholder="Mensagem para <?php the_title(); ?>"></textarea>

									
									<input type="button" id="postarmensagem" style="  background: #ff8920 !important;
		                                  color: #fff;
		                                  border: none;
		                                  padding: 7px 20px;
		                                  cursor: pointer;
		                                  letter-spacing: .1em;
		                                  font-size: 1.125em;
		                                  font-family: Oswald, sans-serif;
		                                  text-transform: uppercase;
		                                  -webkit-appearance: none;
		                                  -webkit-border-radius: 0;float: right; margin-top: 0px;margin-left: 300px;" value="Enviar Mensagem">
		                                  <br>&nbsp;<br>
								</form>
							</div>	
						<?php } ?>
					<?php } ?>
				</div>
			<?php /* FIM BLOCO DE ENVIO DE EMAIL */ ?>



		<?php } ?>	
	</div>



<?php endwhile; ?>

</div>
<!-- /layout-container -->

<?php include('banners.php') ?>  
	
<?php get_footer(); ?>

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