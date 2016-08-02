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
#myModal1,#myModal2,#myModal3,#myModal5,#myModal6 {
  width: 100%;
  text-align: center;
}
#img01,#img02,#img03,#img04,#img05,#img06 {
  margin: auto;
}
.imganuncio{
  width: 95px;
	float: left;
	margin-right: 10px;
}
*/

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

.mensagem_acessorio .mensagem_marca {
    width: 576px;
}
.formularios input[type="text"] {
    width: 100%;
}
.formularios textarea {
    width: 100%;
}
body {
  font-size: 14px;
  color: #333;
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


      $meuemail = $_GET['email']; if ($_SESSION['meuemail'] == $meuemail && $_SESSION['lettslogin'] != 1) { ?>
    <style type="text/css">
    .modal {
      top: 155px !important;
    }
    </style>
    <div>
    	<div style="margin: auto; border-top: solid 1px #ddd; padding-top: 10px;font-weight: bold;
        font-size: 14px;
        color: #ff8920; margin-bottom: 15px;"><a href="http://letts.com.br/edicao-classificados/?idacessoriog=<?php echo $_GET['post_id']; ?>">Editar acessório</a></div>
    </div>
    <?php } ?>


    <?php
      $postid = $_GET['post_id'];
    ?>
		<?php query_posts('p='. $postid.'&limit=1&post_type=acessorios');
    while (have_posts()): the_post(); ?>

<style>
/* Style the Image Used to Trigger the Modal */
.modal {
  position: absolute;
  z-index: 99999;
  left: 0;
  top: 75px;
}

#myImg1 img,#myImg2 img,#myImg3 img,#myImg4 img,#myImg5 img,#myImg6 img {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg1,#myImg2,#myImg3,#myImg4,#myImg5,#myImg6{
  float: left;
  width: 95px;
  margin-right: 10px;
}

#myImg1:hover #myThumImg1 {opacity: 0.7;}
#myImg1:hover #myModal1 { display: block;}

#myImg2:hover #myThumImg2 {opacity: 0.7;}
#myImg2:hover #myModal2 { display: block;}

#myImg3:hover #myThumImg3 {opacity: 0.7;}
#myImg3:hover #myModal3 { display: block;}

#myImg4:hover #myThumImg4 {opacity: 0.7;}
#myImg4:hover #myModal4 { display: block;}

#myImg5:hover #myThumImg5 {opacity: 0.7;}
#myImg5:hover #myModal5 { display: block;}

#myImg6:hover #myThumImg6 {opacity: 0.7;}
#myImg6:hover #myModal6 { display: block;}

/* The Modal (background) */
.modal {
  position: absolute;
  z-index: 99999;
  left: 0;
  overflow: auto;
}
#myModal1, #myModal2, #myModal3, #myModal4, #myModal5, #myModal6 {
  display: none;
}
</style>


	<div class="conteudo_anuncios">
   		<div id="fotos_anuncios">

<?php if (get_custom_field('fotoanuncio1') != '') { ?>
        <div id="myImg1">
          <!-- Trigger the Modal -->
          <img id="myThumImg1" src="<?php print_custom_field('fotoanuncio1'); ?>" class="imganuncio">

          <!-- The Modal -->
          <?php $vfotoanuncio1 = get_custom_field('fotoanuncio1'); if ($vfotoanuncio1 != '') { ?>
            <div id="myModal1" class="modal">
              <img src="<?php print_custom_field('fotoanuncio1'); ?>" class="modal-content" id="img01">
            </div>
          <?php } ?>
        </div>
<?php } ?>


<?php if (get_custom_field('fotoanuncio2') != '') { ?>
        <div id="myImg2">
          <!-- Trigger the Modal -->
          <img id="myThumImg2" src="<?php print_custom_field('fotoanuncio2'); ?>" class="imganuncio">

          <!-- The Modal -->
          <?php $vfotoanuncio2 = get_custom_field('fotoanuncio2'); if ($vfotoanuncio2 != '') { ?>
            <div id="myModal2" class="modal">
              <img src="<?php print_custom_field('fotoanuncio2'); ?>" class="modal-content" id="img02">
            </div>
          <?php } ?>
        </div>
<?php } ?>


<?php if (get_custom_field('fotoanuncio3') != '') { ?>
        <div id="myImg3">
          <!-- Trigger the Modal -->
          <img id="myThumImg3" src="<?php print_custom_field('fotoanuncio3'); ?>" class="imganuncio">

          <!-- The Modal -->
          <?php $vfotoanuncio3 = get_custom_field('fotoanuncio3'); if ($vfotoanuncio3 != '') { ?>
            <div id="myModal3" class="modal">
              <img src="<?php print_custom_field('fotoanuncio3'); ?>" class="modal-content" id="img03">
            </div>
          <?php } ?>
        </div>
<?php } ?>


<?php if (get_custom_field('fotoanuncio4') != '') { ?>
        <div id="myImg4">
          <!-- Trigger the Modal -->
          <img id="myThumImg4" src="<?php print_custom_field('fotoanuncio4'); ?>" class="imganuncio">

          <!-- The Modal -->
          <?php $vfotoanuncio4 = get_custom_field('fotoanuncio4'); if ($vfotoanuncio4 != '') { ?>
            <div id="myModal4" class="modal">
              <img src="<?php print_custom_field('fotoanuncio4'); ?>" class="modal-content" id="img04">
            </div>
          <?php } ?>
        </div>
<?php } ?>


<?php if (get_custom_field('fotoanuncio5') != '') { ?>
        <div id="myImg5">
          <!-- Trigger the Modal -->
          <img id="myThumImg5" src="<?php print_custom_field('fotoanuncio5'); ?>" class="imganuncio">

          <!-- The Modal -->
          <?php $vfotoanuncio5 = get_custom_field('fotoanuncio5'); if ($vfotoanuncio5 != '') { ?>
            <div id="myModal5" class="modal">
              <img src="<?php print_custom_field('fotoanuncio5'); ?>" class="modal-content" id="img05">
            </div>
          <?php } ?>
        </div>
<?php } ?>


<?php if (get_custom_field('fotoanuncio6') != '') { ?>
        <div id="myImg6">
          <!-- Trigger the Modal -->
          <img id="myThumImg6" src="<?php print_custom_field('fotoanuncio6'); ?>" class="imganuncio">

          <!-- The Modal -->
          <?php $vfotoanuncio6 = get_custom_field('fotoanuncio6'); if ($vfotoanuncio6 != '') { ?>
            <div id="myModal6" class="modal">
              <img src="<?php print_custom_field('fotoanuncio6'); ?>" class="modal-content" id="img06">
            </div>
          <?php } ?>
        </div>
<?php } ?>

			</div>

      <?php
      include "../../../wp-config.php";

      mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
          die("Could not connect: " . mysql_error());
      mysql_select_db(DB_NAME);

      $query1 = "select p.id, p.post_title, p.post_content
, pmestadoc.meta_value as estado1
, pmvalor.meta_value as valor
, pmmoeda.meta_value as moeda
, pmpais.meta_value as pais
, pmestado.meta_value as estado
, pmcidade.meta_value as cidade
, pmemail1.meta_value as email
, vendedor.post_title as vendedor
, vendedor.telefone as telefone

from wp_posts p
LEFT OUTER JOIN  wp_postmeta pmestadoc on p.id = pmestadoc.post_id
LEFT OUTER JOIN  wp_postmeta pmvalor  on p.id = pmvalor.post_id
LEFT OUTER JOIN  wp_postmeta pmmoeda  on p.id = pmmoeda.post_id
LEFT OUTER JOIN  wp_postmeta pmpais   on p.id = pmpais.post_id
LEFT OUTER JOIN  wp_postmeta pmestado on p.id = pmestado.post_id
LEFT OUTER JOIN  wp_postmeta pmcidade on p.id = pmcidade.post_id
LEFT OUTER JOIN  wp_postmeta pmemail1 on p.id = pmemail1.post_id

LEFT OUTER JOIN (
select p.id, p.post_title, pmemail.meta_value as email , pmtelefone.meta_value as telefone from wp_posts p
INNER JOIN wp_postmeta pmemail on p.id = pmemail.post_id
INNER JOIN wp_postmeta pmtelefone on p.id = pmtelefone.post_id
where pmtelefone.`meta_key` = 'basicatelefones'
AND pmemail.`meta_key` = 'basicaemail'
) vendedor ON (vendedor.email = pmemail1.meta_value)

WHERE post_type = 'acessorios'

AND pmestadoc.`meta_key` = 'acessorioestado'
AND pmvalor.`meta_key` = 'acessoriovalor'
AND pmmoeda.`meta_key` = 'moeda'
AND pmpais.`meta_key` = 'basicapaisatual'
AND pmestado.`meta_key` = 'basicacidadeatual'
AND pmcidade.`meta_key` = 'basicaestadoatual'
AND pmemail1.`meta_key` = 'basicaemail'
AND p.id = ".$_GET["post_id"];
      //AND p.post_status = 'publish' AND pdata.meta_value  > '07/03/2016'
      //var_dump($query1);exit;

      $result = mysql_query($query1);

      if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

                  $resulttitulo = $row["post_title"];
                  $resultdescricao = $row["post_content"];
                  $resultestado1 = $row["estado1"];
                  $resultvalor = $row["valor"];
                  $resultmoeda = $row["moeda"];
                  $resultpais = $row["pais"];
                  $resultestado = $row["estado"];
                  $resultcidade = $row["cidade"];
                  $resultemail = $row["email"];
                  $resultvendedor = $row["vendedor"];
                  $resulttelefone = $row["telefone"];

?>

      <div style="float: left; width: 100%; margin-top: 40px;">
        <div style="width: 70%; float: left;font-size: 22px;
    font-weight: bold; padding-top: 10px;"><?php echo $resulttitulo; ?></div>
        <div style="width: 180px;
    float: left;
    text-align: center;
    background-color: #f57300;
    padding: 8px 0px;
    color: #FFF;"><font class="" style="
    font-size: 18px;
    font-weight: bold;
"><?php echo $resultmoeda; ?> <?php echo $resultvalor; ?></font></div>
      </div>

      <div style="float: left; width: 100%; margin-top: 15px; text-align: center;">
        <div><?php echo $resultpais; ?> - <?php echo $resultcidade; ?> - <?php echo $resultestado; ?></div>
      </div>

      <div style="float: left; width: 100%; margin-top: 15px; background-color: #DDD;padding: 15px;">
        <div style="width: 33%; float: left;"><b>Vendedor</b></div>
        <div style="width: 33%; float: left;"><b>E-mail</b></div>
        <div style="width: 190px; float: left; text-align: left;"><b>Telefone</b></div>

        <div style="width: 33%; float: left;"><?php echo $resultvendedor; ?></div>
        <div style="width: 33%; float: left;"><?php echo $resultemail; ?></div>
        <div style="width: 190px; float: left; text-align: left;"><?php echo $resulttelefone; ?></div>

      </div>

      <div style="float: left; width: 100%; margin-top: 15px;">
        <div style="margin-bottom: 5px;"><b>Descrição:</b></div>
        <div style="    overflow: scroll;
    width: 100%;
    height: 120px;"><?php echo $resultdescricao; ?></div>
      </div>




      <?php }
      } else {
        echo "<div style=\"float: left; margin-top: 20px;width: 500px;\">Erro ao obter dados!</div>";
      }

      mysql_free_result($result);
      ?>

      <div style="float: left; width: 100%; margin-top: 15px; height: 120px; overflow: none;">
          <img src="http://pagead2.googlesyndication.com/simgad/16187398275919832002" border="0" width="300" height="100" alt="" class="img_ad"> <img src="http://pagead2.googlesyndication.com/simgad/16187398275919832002" border="0" width="300" height="100" alt="" class="img_ad">
      </div>

<?php /*
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

*/ ?>

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
