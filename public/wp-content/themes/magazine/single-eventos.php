<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<style type="text/css">
	#banners {
		display: none;
	}
</style>

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
textarea {
    height: 200px;
}
</style>

<?php 
/** Themify Default Variables
 *  @var object */
global $themify; ?>


	<?php if( have_posts() ) while ( have_posts() ) : the_post(); ?>


		<!-- content -->

<!-- layout-container -->
	<div style="background-image: url('<?php print_custom_field('atletaimagembackground:to_image_src'); ?>'); 
				background-size: 1064px; 
				background-position:center; 
				height: 400px;"></div>
<div id="layout" class="pagewidth clearfix">
	<div class="logo_eventos" style="background: url('<?php print_custom_field('eventofoto:to_image_src'); ?>') no-repeat;"></div>



	<div style="float: left; margin: 15px; margin-left: 25px; width: 420px;">
		<h1 class="post-title entry-title" itemprop="name">
				<?php the_title(); ?> <!--<span style="font-size: 18px;">(<?php print_custom_field('eventotipo'); ?>)</span>-->
		</h1>

<?php 
	$imagem_fb = get_custom_field('eventofoto:to_image_src');
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

		<!--<p>Local: <?php print_custom_field('basicatelefones'); ?></p>
		<p>Data e Hora: <?php print_custom_field('basicatelefones'); ?></p>
		<p>Preço: <?php print_custom_field('basicatelefones'); ?></p>
		<p>Esporte: <?php print_custom_field('basicatelefones'); ?></p>-->

		<div style="width: 500px; padding-right: 15px;">
			<?php the_content(); ?>
		</div>
		<p>Tipo do Evento: <?php print_custom_field('eventotipo'); ?></p>
		<?php 
			$tipo_evento = get_custom_field('eventotipo');
			if ($tipo_evento == 'Campeonato') { ?>
				<a href="<?php print_custom_field('link_ingresso'); ?>" target="_blank" class="button">Realizar Inscrição</a>
			<?php }elseif (get_custom_field('link_ingresso')) { ?>
				<a href="<?php print_custom_field('link_ingresso'); ?>" target="_blank" class="button">Comprar Ingresso</a>	.
			<?php } ?>


			<?php $meuemail = get_custom_field('basicaemail'); ?>
	</div>

	<div class="logo_eventos">&nbsp;<br>

          <?php
                $idpagina = $_SERVER['REQUEST_URI'];;
                include "comentarios_ajax.php"; 
              ?>


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

<!--<div class="mensagem_marca" style="margin-top: 30px;">
			<h1 class="post-title entry-title">Envie mensagem para a marca</h1>
			<form action="" method="post" id="formulario_mensagem">
				<input type="text" id="nome_msg" name="nome_msg" placeholder="Seu Nome">
				<input type="text" id="email_msg" name="email_msg" placeholder="Seu E-mail">
				<input type="text" id="assunto" name="assunto" placeholder="Assunto">
				<textarea id="mensagem" name="mensagem" placeholder="Mensagem para a Marca"></textarea>
				<input type="button" id="botao_mensagem" value="Enviar Mensagem">
			</form>
		</div>	
-->

<?php endwhile; ?>

	

</div>
<!-- /layout-container -->
	



<?php if ($_SESSION['meuemail'] == $meuemail && $_SESSION['lettslogin'] != 1) { ?>
<div>
	<div style="width: 1024px; margin: auto; border-top: solid 1px #ddd; padding-top: 10px;font-weight: bold;
    font-size: 14px;
    color: #ff8920; margin-bottom: 15px;">Formulário de solicitação de edição</div>
    <div style="width: 1024px; margin: auto; ">
    	<?php echo do_shortcode( '[contact-form-7 id="3654" title="Alteração de eventos"]' ); ?>
    	
    </div>
</div>
<?php } ?>




<?php include('banners.php') ?>  
	
<?php get_footer(); ?>