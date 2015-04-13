<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>


<script src="/wp-content/themes/magazine/js/jquery-1.5.2.min.js"></script>
<script type='text/javascript' src='/wp-content/themes/magazine/js/jquery.maskedinput-1.3.min.js'></script>

<script>
  $(function($){
    $("#data_nascimento").mask("99/99/9999");
  });
</script>

<?php 
/** Themify Default Variables
 *  @var object */
global $themify; ?>
  <?php 
    query_posts( array('p' => $_GET['id_post'], 'post_type' => 'marca') );
    while ( have_posts() ) : the_post();
  ?>

<div id="layout" class="pagewidth clearfix">

	
		
	<div class="img_marcas imagem_editar_capa" style="background: url('<?php print_custom_field('basicaimagem:to_image_src'); ?>') no-repeat;">
	</div>

	<?php if (get_custom_field('logo:to_image_src')	) { ?>
		<div class="logo_marcas imagem_editar" style="background: url('<?php print_custom_field('logo:to_image_src'); ?>') no-repeat; margin-right: 25px;">
		</div>
	<?php } ?>

<form id="new_post" name="new_post" method="post" action="<?php the_permalink(); ?>" enctype="multipart/form-data"> 
	<p id="sucesso">Dados alterados com sucesso.</p>
	<div style="float: left; margin: 15px 0px; width: 420px;">
			
		<input type="text" name="titulo" value="<?php the_title(); ?>">
		
		<div style="margin-top: 10px;"><strong>Telefones</strong></div>
        <input type="text" name="telefones" value="<?php print_custom_field('basicatelefones'); ?>"><br />
	</div>

	<div class="icones_sociais edit_marcas">
            <div class="textwidget icones_sociais" style="margin-left: 20px;">
              <div><strong>Outros Contatos</strong></div>
            
            <div style="display: inline-block;"><strong>Facebook</strong><br />
              <input type="text" name="facebook" value="<?php print_custom_field('basicafacebook'); ?>">   </div>           

            <div style="display: inline-block;"><strong>Instagram</strong><br />
              <input type="text" name="instagram" value="<?php print_custom_field('instagram'); ?>"> </div> 

            <div style="display: inline-block;"><strong>Twitter</strong><br />
              <input type="text" name="twitter" value="<?php print_custom_field('twitter'); ?>"></div> 

            <div style="display: inline-block;"><strong>Linkedin</strong><br />
              <input type="text" name="linkedin" value="<?php print_custom_field('linkedin'); ?>"> </div>

            <div style="display: inline-block;"><strong>Blog</strong><br />
              <input type="text" name="blog" value="<?php print_custom_field('blog'); ?>"> </div>

            <div style="display: inline-block;"><strong>Site</strong><br />
              <input type="text" name="site" value="<?php print_custom_field('site'); ?>">
              <input type="hidden" name="atualizar_perfil" value="atualizar_perfil"><br /> 
            </div>         
          </div>
	</div>

	<div class="description_marcas">
		 <div style="display: inline-block;"><strong>Descrição</strong><br /></div>

     <?php $minhahistoria = get_the_content(); ?>
		<textarea name="content_marca" class="marca_textarea"><?php echo strip_tags($minhahistoria); ?></textarea>  
	</div>

	<div style="float: right; margin-right: 37px;">
        <input type="submit" value="Salvar Alterações">
    </div> 

</form>

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