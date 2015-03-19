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
<div id="layout" class="pagewidth clearfix">

	
		
	<div class="img_marcas imagem_editar_capa" style="background: url('<?php print_custom_field('basicaimagem:to_image_src'); ?>') no-repeat;">
		<?php if ($_SESSION["lettslogin"] == $idpost) { ?>		
			<div id="link_editar_capa">
					<a class="fancybox" href="/alterar-foto-de-capa/?id_post=<?php echo $idpost; ?>">Editar Foto de Capa</a>		
			</div>			
		<?php } ?>
	</div>

	<?php if (get_custom_field('logo:to_image_src')	) { ?>
		<div class="logo_marcas imagem_editar" style="background: url('<?php print_custom_field('logo:to_image_src'); ?>') no-repeat; margin-right: 25px;">
			<?php if ($_SESSION["lettslogin"] == $idpost) { ?>	
			<div id="link_editar">
				<a class="fancybox" href="/alterar-foto/?id_post=<?php echo $idpost; ?>">Editar Foto</a>		
			</div>
			<?php } ?>
		</div>
	<?php } ?>

	<div class="fb-like" data-href="<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']; ?>" data-width="100%" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
		

		<p id="sucesso_perfil" class="bg_sucesso">Foto alterada com sucesso</p>			
		<p id="sucesso_capa" class="bg_sucesso">Foto de capa alterada com sucesso</p>
		<p id="sucesso_edicaoperfil" class="bg_sucesso">Dados alterados com sucesso</p>				

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
		E-mail: <?php print_custom_field('basicaemail'); ?></p>
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
		<?php the_content(); ?>
	</div>

		<div class="fb-comments" data-href="<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']; ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>

	<div class="formularios">
		<?php if ($_SESSION["lettslogin"] == $idpost) { ?>	
		<div class="convidar_atleta">
			<h1 class="post-title entry-title">Convide um Atleta</h1>
			<form action="" method="post" id="formulario_convite">
				<input type="text" id="nome" name="nome" placeholder="Seu Nome">
				<input type="text" id="nome_atleta" name="nome_atleta" placeholder="Nome do Atleta">
				<input type="text" id="email_atleta" name="email_atleta" placeholder="E-mail do Atleta">
				<textarea id="mensagem_atleta" name="mensagem_atleta" placeholder="Mensagem ao Atleta"></textarea>
				<input type="button" id="botao_convite" value="Convidar Atleta">
			</form>
		</div>
		<?php } ?>

		<div class="mensagem_marca">
			<h1 class="post-title entry-title">Envie mensagem para a marca</h1>
			<form action="" method="post" id="formulario_mensagem">
				<input type="text" id="nome_msg" name="nome_msg" placeholder="Seu Nome">
				<input type="text" id="email_msg" name="email_msg" placeholder="Seu E-mail">
				<input type="text" id="assunto" name="assunto" placeholder="Assunto">
				<textarea id="mensagem" name="mensagem" placeholder="Mensagem para a Marca"></textarea>
				<input type="button" id="botao_mensagem" value="Enviar Mensagem">
			</form>
		</div>		
	</div>



<?php endwhile; ?>

</div>
<!-- /layout-container -->
	
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