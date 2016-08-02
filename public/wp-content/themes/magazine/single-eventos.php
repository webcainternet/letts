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
	.logo_eventos {
    height: none !important;
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

	<?php
		$idpost = get_the_ID();
	?>
		<!-- content -->

<!-- layout-container -->
	<div style="background-image: url('<?php print_custom_field('eventofoto:to_image_src'); ?>');
				background-size: 1064px;
				background-position:center;
				background-repeat: no-repeat;
				height: 400px;"></div>

				<?php
				include "../../../wp-config.php";

				mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
						die("Could not connect: " . mysql_error());
				mysql_select_db(DB_NAME);

				$query1 = "select p.id
				, vendedor.post_title as vendedor

				from wp_posts p
				LEFT OUTER JOIN  wp_postmeta pmemail1 on p.id = pmemail1.post_id

				LEFT OUTER JOIN (

				select p.id, p.post_title, pmemail.meta_value as email , pmtelefone.meta_value as telefone from wp_posts p
				INNER JOIN wp_postmeta pmemail on p.id = pmemail.post_id
				INNER JOIN wp_postmeta pmtelefone on p.id = pmtelefone.post_id
				where pmtelefone.`meta_key` = 'basicatelefones'
				AND pmemail.`meta_key` = 'basicaemail'
				) vendedor ON (vendedor.email = pmemail1.meta_value)

				WHERE post_type = 'eventos'

				AND pmemail1.`meta_key` = 'basicaemail'
				AND p.id = ".$idpost;

				$result = mysql_query($query1);

				if(mysql_num_rows($result) > 0) {
					while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
										$resultvendedor = $row["vendedor"];
					}
				}

				mysql_free_result($result);
				?>

<div id="layout" class="pagewidth clearfix">
	<div style="background-color: #EEE; padding: 15px;">Organizador: <span style="color: #333;"><?php echo $resultvendedor; ?></span>

		<?php if (get_custom_field('link_ingresso') == '') {} else { ?>
		<div style="float: right; margin-left: 15px;">
		<?php
			$tipo_evento = get_custom_field('eventotipo');
			if ($tipo_evento == 'Campeonato') { ?>
				<a href="<?php print_custom_field('link_ingresso'); ?>" target="_blank" class="button">Realizar Inscrição</a>
			<?php }elseif (get_custom_field('link_ingresso')) { ?>
				<a href="<?php print_custom_field('link_ingresso'); ?>" target="_blank" class="button">Comprar Ingresso</a>	.
			<?php } ?>
		</div>
		<?php } ?>

		<div style="float: right; text-transform: uppercase; color: #333;">
			<?php print_custom_field('eventotipo'); ?>
		</div>

	</div>
	<div style="float: left; margin: 15px; margin-left: 25px; width: 545px;">
		<h1 class="post-title entry-title" itemprop="name">
				<?php the_title(); ?> <!--<span style="font-size: 18px;">(<?php print_custom_field('eventotipo'); ?>)</span>-->
		</h1>

<?php
	$imagem_fb = get_custom_field('atletaimagembackground:to_image_src');
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

		<div style="padding-right: 15px;">
			<?php the_content(); ?>
		</div>






			<?php $meuemail = get_custom_field('basicaemail'); ?>
	</div>

	<div class="logo_eventos">&nbsp;<br>

<?php /*
		<div style="background-color: #EEE; padding: 20px 30px 30px; margin-bottom: 20px;">
			<img src="<?php print_custom_field('atletaimagembackground:to_image_src'); ?>" style="float: right; width: 80px;">
		</div>
*/ ?>



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
    color: #ff8920; margin-bottom: 15px;"><a href="/edicao-evento/?ideventog=<?php echo $idpost; ?>">Editar evento</a></div>
</div>
<?php } ?>




<?php include('banners.php') ?>

<?php get_footer(); ?>
