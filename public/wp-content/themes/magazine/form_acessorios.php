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

</style>


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

<?php endwhile; // end of the loop. ?>
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