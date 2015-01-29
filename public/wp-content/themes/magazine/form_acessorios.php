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
	   			<img src="<?php print_custom_field('fotoanuncio1'); ?>">
				<img src="<?php print_custom_field('fotoanuncio2'); ?>">
				<img src="<?php print_custom_field('fotoanuncio3'); ?>">
			</div>

<?php endwhile; // end of the loop. ?>
<div class="formularios mensagem_acessorio">
	<div class="mensagem_marca">
		<h1 class="post-title entry-title">Envie mensagem para <?php echo $_GET['nome']; ?></h1>
		<form action="" method="post" id="formulario_mensagem">
			<input type="text" id="nome_msg" name="nome_msg" placeholder="Seu Nome">
			<input type="text" id="email_msg" name="email_msg" placeholder="Seu E-mail">
			<input type="text" id="produto" name="produto" placeholder="Produto" value="<?php echo $_GET['produto']; ?>">
			<textarea id="mensagem" name="mensagem" placeholder="Mensagem para"></textarea>
			<input type="button" id="botao_mensagem" value="Enviar Mensagem">
		</form>
	</div>	
</div>
</div>
 		
  </body>
</html>    