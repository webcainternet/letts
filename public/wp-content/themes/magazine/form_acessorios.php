<!DOCTYPE html>
<?php 
/**
 * Template Name: Formulario Acessórios
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<html>
  <head>
<style type="text/css">
#fotos_anuncios img{
	width: 200px;
	float: left;
	margin-right: 10px;
}

.formularios, #fotos_anuncios{
	float: left;
}

.conteudo_anuncios{
	width: 640px;
}

#fancybox-wrap{
	top: 50px !important;
}

.redes_sociais{
	margin-top: -21px;
	margin-left: 50px;
	width: 90%;
}

</style>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1540707736203396&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  </head>
  <body>
    <?php 
      $postid = $_GET['post_id'];
    ?>
		<?php query_posts('p='. $postid.'&limit=1&post_type=acessorios');
    while (have_posts()): the_post(); ?>
	<div class="conteudo_anuncios">
   		<div id="fotos_anuncios">
	   			<a href="javascript:abrir('<?php print_custom_field('fotoanuncio1'); ?>');"><img src="<?php print_custom_field('fotoanuncio1'); ?>"></a>
				<a href="javascript:abrir('<?php print_custom_field('fotoanuncio2'); ?>');"><img src="<?php print_custom_field('fotoanuncio2'); ?>"></a>
				<a href="javascript:abrir('<?php print_custom_field('fotoanuncio3'); ?>');"><img src="<?php print_custom_field('fotoanuncio3'); ?>"></a>
			</div>


<div class="formularios mensagem_acessorio">
	<div class="mensagem_marca">
		<h1 class="post-title entry-title">Envie mensagem para <?php echo $_GET['nome']; ?></h1>
		<form action="" method="post" id="formulario_mensagem">
			<input type="text" id="nome_msg" name="nome_msg" placeholder="Seu Nome">
			<input type="text" id="email_msg" name="email_msg" placeholder="Seu E-mail">
			<input type="text" id="produto" name="produto" placeholder="Produto" value="<?php echo $_GET['produto']; ?>" disabled="disabled">
			<textarea id="mensagem" name="mensagem" placeholder="Mensagem para <?php echo $_GET['nome']; ?>"></textarea>
			<input type="button" id="botao_mensagem" value="Enviar Mensagem" onclick="EnviarForm();">
		</form>
		<div id="sucesso" style="text-align: center;">E-mail enviado com sucesso.</div>
	</div>	
</div>

<div class="redes_sociais">
	<a id="share-button" href="#" title="Facebook Share Button">
		<img src="/wp-content/themes/magazine/images/compartilhar.jpg" alt="Facebook Share Button" title="Facebook Share Button" />
	</a>

	<div class="fb-like" data-href="<?php the_permalink(); ?>" data-share="false" data-send="true" data-layout="button" data-width="350" data-show-faces="false" data-colorscheme="dark" data-action="like"></div>
</div>

<?php 
	$imagem_fb = get_custom_field('fotoacessorio:to_image_src');
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

<?php endwhile; // end of the loop. ?>
</div>
 		
  </body>
</html>

<script type="text/javascript">
function EnviarForm() {
	$('#formulario_mensagem').hide();
	$('#sucesso').show();
}
</script>

<script language="JavaScript">
function abrir(URL) {
 
  var width = 800;
  var height = 600;
 
  var left = 99;
  var top = 99;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>