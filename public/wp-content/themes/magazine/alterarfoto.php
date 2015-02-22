<!DOCTYPE html>
<?php 
/**
 * Template Name: Alterar Foto
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
   <script src="/wp-content/themes/magazine/js/input_file.js"></script>    
  </head>
  <body>
    <?php 
      $postid = $_GET['post_id'];
    ?>

	<form id="alterar_foto_perfil" name="alterar_foto_perfil" method="post" action="" enctype="multipart/form-data">
		<input type="file" name="img_perfil" id="file">
		<input type="hidden" name="alterarfoto" value="alterar">
		<input type="submit" id="botao_foto" value="Alterar Foto">
	</form>
		
  </body>
</html>    