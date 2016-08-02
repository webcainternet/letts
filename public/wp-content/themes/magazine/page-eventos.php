<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<style type="text/css">
  .classificados {
      float: left;
      width: 320px;
      margin-left: 0px;
      margin-bottom: 20px;
      border: solid 1px #ddd;
      margin: 5px;
      background-color: #f9f9f9;
      padding: 10px;
      padding-bottom: 20px;
  }
  .classificados:hover {
      background-color: #DDD;
  }
  .selectitens{
    width: 132px !important;
  }

  .related-posts .post {
    margin-bottom: -10px !important;
}

</style>

<?php
/** Themify Default Variables
 *  @var object */
global $themify; ?>

<script type="text/javascript">

	function excluirevento(idevento, idlogin) {
    var txt;
    var r = confirm("Tem certeza que deseja excluir?");
    if (r == true) {
  		$.ajax({
  		method: "POST",
  		url: "/wp-content/themes/magazine/excluireventos.php",
  		data: { idevento: idevento, idlogin: idlogin }
  		})
  		.done(function( msg ) {
  			var n = msg.indexOf("statusok");
  			if (n == -1) {
  				alert('Erro ao excluir evento');
  			} else {
  				//alert('Evento excluido com sucesso!');
  				window.location.href = window.location.pathname;
  			}
  		});
    }
	}

</script>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

  <div id="contentwrap" style="width: 100%;padding-top: 0px;">
    <div style="width: 100%; background-color: #FFFFFF; height: 130px;">
    <div class="related-posts" style="height: 125px;">
      <h4 class="related-title" style="border: 0px;margin-left: 25px;margin-top: 10px; margin-bottom: 5px;">Eventos:</h4>

    <?php if ($_SESSION["lettslogin"]) { ?>
      <div class="bt_acessorios">
        <a href="/cadastrar-evento/?id_post=<?php echo $_SESSION["lettslogin"]; ?>"><div  style="background: #ff8920 !important;
  color: #fff;
  border: none;
  padding: 7px 20px;
  cursor: pointer;
  letter-spacing: .1em;
  font-size: 1.125em;
  font-family: Oswald, sans-serif;
  text-transform: uppercase;
  -webkit-appearance: none;
  -webkit-border-radius: 0;     margin-top: -7px;    margin-right: 15px;">Cadastrar Evento</div></a>
      </div>
    <?php } ?>

      <div class="post-meta" style="display: inline;">
        <form method="post">
        <div style="float: left; margin-right: -5px; margin-left: 25px;">
          <span class="post-category"><a href="#">Buscar</a></span><br>
          <input id="author" name="titulo" type="text" value="" size="30" class="required" style="width: 160px; height: 32px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
        </div>

        <div style="float: left; margin-right: 10px;">
          <span class="post-category"><a href="#">Esporte</a></span><br>
            <select name="esporte" class="selectitens" style="height: 32px; border: solid 1px; border-radius: 5px;">
                    <option value="">-- Selecione --</option>
                    <option>Aeromodelismo</option>
                    <option>Alpinismo</option>
                    <option>Asa Delta</option>
                    <option>BMX</option>
                    <option>BMX – Free style</option>
                    <option>Balonismo</option>
                    <option>Base Jumping</option>
                    <option>Bodyboard</option>
                    <option>Bouldering</option>
                    <option>Bungee Jumping</option>
                    <option>Canoagem</option>
                    <option>Carveboard</option>
                    <option>Caça submarina</option>
                    <option>Ciclismo</option>
                    <option>Cliff Diving</option>
                    <option>Corrida aventura</option>
                    <option>Drift</option>
                    <option>Escalada</option>
                    <option>Esqui</option>
                    <option>Football Freestyle</option>
                    <option>Free Style Motocross</option>
                    <option>FreeBoard</option>
                    <option>Heli-Skiing</option>
                    <option>Highline</option>
                    <option>Jet Ski</option>
                    <option>Kart</option>
                    <option>Kitesurfing</option>
                    <option>Liquid Mountaineering</option>
                    <option>Longboard skate</option>
                    <option>Longboard surf</option>
                    <option>Mega ramp</option>
                    <option>Mergulho</option>
                    <option>Moto Trial</option>
                    <option>Moto Wheeling</option>
                    <option>Motocross</option>
                    <option>Mountain Bike</option>
                    <option>Mountain biking</option>
                    <option>Mountain boarding</option>
                    <option>Off Road/Rally</option>
                    <option>Paintball</option>
                    <option>Paragliding</option>
                    <option>Paragliding</option>
                    <option>Parapente</option>
                    <option>Parkour</option>
                    <option>Patins in Line</option>
                    <option>Psicobloc</option>
                    <option>Rafting</option>
                    <option>Rally</option>
                    <option>Rapel</option>
                    <option>Sandboard</option>
                    <option>Skate</option>
                    <option>Skate - Street</option>
                    <option>Skate – Free style</option>
                    <option>Skate – Mini ramp</option>
                    <option>Skate - Vertical</option>
                    <option>Sky Surfing</option>
                    <option>Skydive</option>
                    <option>Slackline</option>
                    <option>Snowboard</option>
                    <option>Stand Up Paddle</option>
                    <option>Street Luge</option>
                    <option>Surf</option>
                    <option>Surf - Freesurf</option>
                    <option>Tow-in</option>
                    <option>Trekking</option>
                    <option>Triathlon</option>
                    <option>UFC (MMA)</option>
                    <option>Vela/Iatismo</option>
                    <option>Velocidade</option>
                    <option>Wakeboard</option>
                    <option>Wakeboard Free style</option>
                    <option>Windsurf</option>
                    <option>WingWalking</option>
                    <option>Outros</option>
                  </select>
        </div>

        <div style="float: left; margin-right: 10px;">
          <span class="post-category"><a href="#">Profissão</a></span><br>
          <select  class="selectitens" id="profissao" name="profissao">
            <option value="">-- Selecione --</option>
            <option value="Assessor de imprensa">Assessor de imprensa</option>
            <option value="Coordenador de eventos">Coordenador de eventos</option>
            <option value="Desenhista">Desenhista</option>
            <option value="Empresário">Empresário</option>
            <option value="Estatístico">Estatístico</option>
            <option value="Estilista">Estilista</option>
            <option value="Executivo de contas publicitárias">Executivo de contas publicitárias</option>
            <option value="Fisioterapeuta">Fisioterapeuta</option>
            <option value="Fotografo">Fotografo</option>
            <option value="Fotojornalista">Fotojornalista</option>
            <option value="Gerente de relações públicas">Gerente de relações públicas</option>
            <option value="Gestor desportivo">Gestor desportivo</option>
            <option value="Jornalista">Jornalista</option>
            <option value="Nutricionista">Nutricionista</option>
            <option value="Personal Crossfit">Personal Crossfit</option>
            <option value="Personal academia">Personal academia</option>
            <option value="Professor de idomas">Professor de idomas</option>
            <option value="Psicologo">Psicologo</option>
            <option value="Psicólogo esportivo">Psicólogo esportivo</option>
            <option value="Técnico">Técnico</option>
            <option value="Videomaker">Videomaker</option>
                </select>
        </div>


        <div style="float: left; margin-right: 10px;">
          <span class="post-category"><a href="#">País</a></span><br>
          <select name="pais" class="form-control countries" id="countryId" style="width: 132px !important; height: 32px;">
          <option value="">Selecionar Pais</option>
          </select>
        </div>

        <div style="float: left; margin-right: 10px;">
          <span class="post-category"><a href="#">Estado</a></span><br>
          <select name="estado" class="form-control states" id="stateId" style="width: 132px !important; height: 32px;">
          <option value="">Selecionar Estado</option>
          </select>
        </div>
        <script src="http://letts.com.br/wp-content/themes/magazine/country/js/location.js"></script>

        <div style="float: left; margin-right: 10px;">
          <span class="post-category"><a href="#">Tipo de Evento</a></span><br>
          <select  class="selectitens" id="tipo_evento" name="tipo_evento">
            <option value="">-- Selecione --</option>
            <option value="Campeonato">Campeonato</option>
            <option value="Show">Show</option>
            <option value="Festa">Festa</option>
            <option value="Empresário">Outros</option>
                </select>
        </div>



        <div style="float: left; margin-right: 15px; margin-top: -3px;">
          <input type="submit" value="Buscar" style="margin-top: 16px;">
        </div>
        </form>
    </div>
    </div>


  </div>


    <div id="content" class="list-post">


        <div style="margin: 0px; padding: 0px;">

          <div style="width: 100%; float: left; height: 1px;"> &nbsp;</div>



<?php
include "../../../wp-config.php";

mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);


  			if ($_POST['titulo'] != '') {
  				$querywhere .= " AND `p`.`post_title` LIKE '%".$_POST['titulo']."%' ";
  			}

        if ($_POST['esporte'] != '') {
  				$querywhere = " AND `pesporte`.`meta_value` = '".$_POST['esporte']."' ";
  			}

        if ($_POST['profissao'] != '') {
  				$querywhere = " AND `pprofissao`.`meta_value` = '".$_POST['profissao']."' ";
  			}

        if ($_POST['pais'] != '') {
  				$querywhere = " AND `ppais`.`meta_value` = '".$_POST['pais']."' ";
  			}
        if ($_POST['estado'] != '') {
  				$querywhere = " AND `pestado`.`meta_value` = '".$_POST['estado']."' ";
  			}

        if ($_POST['tipo_evento'] != '') {
  				$querywhere = " AND `peventotipo`.`meta_value` = '".$_POST['tipo_evento']."' ";
  			}

/*
$query1 = "select p.id,
p.post_title,
pimage.meta_value as image,
pdata.meta_value as data,
LEFT(pdata.meta_value,2) as data_mes,
RIGHT(LEFT(pdata.meta_value,5),2) as data_dia,
RIGHT(pdata.meta_value,4) as data_ano,
pesporte.meta_value as esporte ,
pprofissao.meta_value as profissao ,
ppais.meta_value as pais,
pestado.meta_value as estado,
peventotipo.meta_value as eventotipo,
pemail.meta_value as email
from wp_posts p
INNER JOIN wp_postmeta pimage on pimage.post_id = p.id
INNER JOIN wp_postmeta pdata on pdata.post_id = p.id
INNER JOIN wp_postmeta pesporte on pesporte.post_id = p.id
INNER JOIN wp_postmeta pprofissao on pprofissao.post_id = p.id
INNER JOIN wp_postmeta ppais on ppais.post_id = p.id
INNER JOIN wp_postmeta pestado on pestado.post_id = p.id
INNER JOIN wp_postmeta peventotipo on peventotipo.post_id = p.id
INNER JOIN wp_postmeta pemail on pemail.post_id = p.id
WHERE post_type = 'eventos'
AND pimage.meta_key = 'post_image'
AND pdata.meta_key = 'dataevento'
AND pesporte.meta_key = 'atletaesporte'
AND pprofissao.meta_key = 'profissao'
AND ppais.meta_key = 'basicapaisatual'
AND pestado.meta_key = 'basicaestadoatual'
AND peventotipo.meta_key = 'eventotipo'
AND pemail.meta_key = 'basicaemail'
AND p.post_status = 'publish' "
.$querywhere.
"ORDER BY data_ano, data_mes, data_dia";
//AND p.post_status = 'publish' AND pdata.meta_value  > '07/03/2016'
*/
//var_dump($query1);exit;


$query1 = "select p.id,
p.post_title,
tfotourl.meta_value AS image,
pdata.meta_value as data,
LEFT(pdata.meta_value,2) as data_mes,
RIGHT(LEFT(pdata.meta_value,5),2) as data_dia,
RIGHT(pdata.meta_value,4) as data_ano,
pesporte.meta_value as esporte ,
pprofissao.meta_value as profissao ,
ppais.meta_value as pais,
pestado.meta_value as estado,
peventotipo.meta_value as eventotipo,
pemail.meta_value as email
from wp_posts p

INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta foto WHERE `foto`.`meta_key` = 'atletaimagembackground') AS tfoto ON `tfoto`.`post_id` = `p`.`id`

INNER JOIN (SELECT * FROM wp_postmeta where post_id IN (SELECT meta_value FROM wp_postmeta foto WHERE `foto`.`meta_key` = 'atletaimagembackground') AND meta_key = '_wp_attached_file') AS tfotourl ON `tfoto`.`meta_value` = `tfotourl`.`post_id`

INNER JOIN wp_postmeta pdata on pdata.post_id = p.id
INNER JOIN wp_postmeta pesporte on pesporte.post_id = p.id
INNER JOIN wp_postmeta pprofissao on pprofissao.post_id = p.id
INNER JOIN wp_postmeta ppais on ppais.post_id = p.id
INNER JOIN wp_postmeta pestado on pestado.post_id = p.id
INNER JOIN wp_postmeta peventotipo on peventotipo.post_id = p.id
INNER JOIN wp_postmeta pemail on pemail.post_id = p.id
WHERE post_type = 'eventos'
AND pdata.meta_key = 'dataevento'
AND pesporte.meta_key = 'atletaesporte'
AND pprofissao.meta_key = 'profissao'
AND ppais.meta_key = 'basicapaisatual'
AND pestado.meta_key = 'basicaestadoatual'
AND peventotipo.meta_key = 'eventotipo'
AND pemail.meta_key = 'basicaemail'
AND p.post_status = 'publish' "
.$querywhere.
"ORDER BY data_ano, data_mes, data_dia";

$result = mysql_query($query1);

if(mysql_num_rows($result) > 0) {
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

?>







          <?php
            $basicaimagemurl = $row["image"];
            $basicaimagemurl2 = str_replace('http://letts.com.br/wp-content/uploads/', '', $basicaimagemurl)
           ?>
         <div class="related-posts classificados">

              <div style="text-align: left;">
                <a href="/?p=<?php echo $row["id"]; ?>">
                  <span style="color: #333; width: 100px; font-size: 14px; font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;"><?php echo date('d-m-Y', strtotime($row["data"])); ?></span>
                </a>

    <?php
      $emailvaga = $row["email"];
      if ($emailvaga == $_SESSION['meuemail']) { ?>
        <div style="float: right;"><a href="#"><img src="/wp-content/themes/magazine/images/remove.png" onclick="javascript: excluirevento('<?php echo $row["id"]; ?>','<?php echo $_SESSION["lettslogin"]; ?>')" height="17" style="height: 17px;"></a></div>
      <?php }
    ?>



              </div>

              <a href="/?p=<?php echo $row["id"]; ?>">
              <div style="height: 180px;
              background-position: center;
              background-image: url('<?php echo $basicaimagemurl ?>');
              <?php echo calcbackgroundsize("wp-content/uploads/".$basicaimagemurl2, 320, 180); ?>;
              ">

              &nbsp;</div></a>
&nbsp;
            </a>
            <article class="post type-post clearfix" style="margin-top: -15px;">
              <div class="post-content">
                <p class="post-meta" style="height: 25px; ">
                  <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
                      <a style="color: #444;"  href="/?p=<?php echo $row["id"]; ?>"><?php echo $row["post_title"]; ?></a></span>
                </p>
              </div>
            </article>
          </div>






<?php }
} else {
  echo "<div style=\"float: left; margin-top: 20px;width: 500px;\">Nenhum evento próximo!</div>";
}

mysql_free_result($result);
?>



        </div>

      </div>
  </div>
</div>
  <!-- /#contentwrap -->

</div>
<!-- /layout-container -->

<?php include('banners.php') ?>

<?php get_footer(); ?>

<script type="text/javascript">
function ChangeSelect(){
  $('#formulario').submit();
}

</script>
