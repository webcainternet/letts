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

<script type="text/javascript">
  newsfiltraesporte() {
    document.forms["filtroesporte"].submit();
  }

  $( ".selectitens" ).change(function() {
    alert( "Handler for .change() called." );
  });
</script>


<style type="text/css">
  .imgnoticias {
    width: 330px; border-radius: 5px; height: 180px; background-size: 336px; background-position: center;
  }
  .related-posts {
    float: left; width: 336px; margin-left: 0px; margin-right: 20px; margin-bottom: 0px;
  }
</style>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

  <div id="contentwrap" style="width: 100%;padding-top: 0px;">

    <div id="content" class="list-post" style="width: 67%; float: left;">

      <div style="float: left; width: 100%; padding-top: 10px; margin-bottom: 10px;">
      
      <div style="float: left; width: 49%;"> 
        <h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;" style="font-weight: bold;">Notícias</h1>
      </div>

     <div style="float: right; width: 60%; text-align: right; margin-bottom: 10px;margin-top: -45px;margin-right: 7px;"> 
        
        <div class="post-meta" style="display: inline;">
          <div style="float: right; margin-right: 15px;">
              <form method="post" id="filtroesporte">
              <select name="slesporte" id="slesporte" class="selectitens"  onchange="this.form.submit();">
                      <option value="">-- Esporte --</option>
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
                    </form>
            </div>
        </div>

        <div class="post-meta" style="display: inline;">
          <div style="float: right; margin-right: 15px;">
              <form method="post" id="filtroprofissao">
                          <select  class="selectitens" name="profissao" id="profissao" onchange="this.form.submit();">
                    <option value="">-- Profissão --</option>
                    <option>Assessor de imprensa</option>
                    <option>Coordenador de eventos</option>
                    <option>Desenhista</option>
                    <option>Empresário</option>
                    <option>Estatístico</option>
                    <option>Estilista</option>
                    <option>Executivo de contas publicitárias</option>
                    <option>Fisioterapeuta</option>
                    <option>Fotografo</option>
                    <option>Fotojornalista</option>
                    <option>Gerente de relações públicas</option>
                    <option>Gestor desportivo</option>
                    <option>Jornalista</option>
                    <option>Nutricionista</option>
                    <option>Personal Crossfit</option>
                    <option>Personal academia</option>
                    <option>Professor de idomas</option>
                    <option>Psicologo</option>
                    <option>Psicólogo esportivo</option>
                    <option>Técnico</option>
                    <option>Videomaker</option>
                  </select>
                    </form>
            </div>
        </div>

        </div>


        <div style="margin: 0px; padding: 0px;">



    

<?php

mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);

?>
  

<style type="text/css">
.noticiaitem {     
    float: left;
    width: 338px;
    margin-right: 15px;
    margin-bottom: 15px;
    border-bottom: dotted 1px #DDD;
    padding-bottom: 15px;
    height: 306px;
}
.noticiadata {
    font-weight: bold;
    font-size: 14px;
    font-family: Oswald, sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #999;
    display: inline-block;
    line-height: 1.5;
}
.noticiamedia {
  background-size: 100%;
  width: 100%;
  height: 212px;
  border: solid 2px #FFF;
}
.noticiamedia:hover {
  border: solid 2px #f57300;
}
.noticiatitulo {
    font-weight: bold;
    font-size: 22px;
    font-family: Oswald, sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #999;
    display: inline-block;
    line-height: 1.5;
        overflow: hidden;
    max-height: 65px;
}
.noticiatitulo:hover {
  color: #f57300;
}

</style>


<div id="newsajax" style="float: left; width: 100%;">
  




</div>


<input type="text" name="noticount" id="noticount" style="display: none;">
<script type="text/javascript">
  //Primeiro carregamento
  carregarmais();

  function carregarmais() {
    //Get
    var bla = $('#noticount').val();
    var nova = parseInt(bla) + 1;
    
    $('#noticount').val(nova);


<?php if ($_POST["profissao"] == "" && $_POST['slesporte'] == "") { ?>
    $.ajax({url: "/wp-content/themes/magazine/page-news-ajax2.php?cont="+bla, success: function(result){
<?php } ?>

<?php if ($_POST["profissao"] != "") { ?>
    $.ajax({url: "/wp-content/themes/magazine/page-news-ajax2.php?cont="+bla+"&profissao=<?php echo $_POST["profissao"]; ?>", success: function(result){
<?php } ?>

<?php if ($_POST['slesporte'] != "") { ?>
    $.ajax({url: "/wp-content/themes/magazine/page-news-ajax2.php?cont="+bla+"&slesporte=<?php echo $_POST['slesporte']; ?>", success: function(result){
<?php } ?>

        $("#newsajax").append(result);
        //alert(result);
    }});
  }


  $('#noticount').val('1');
</script>



        </div>
      </div>


<div style="float: left; width: 100%; margin-bottom: 30px;">
  <div class="pagewidth clearfix">
        <a id="criar" onclick="carregarmais()" style="padding: 10px 255px; background: #f57300; text-decoration: none; display: inline-block; margin-top: 20px;">
          Ver mais noticias
        </a>
  </div>
</div>
    

  </div>
  <?php get_sidebar("sidebar-alt"); ?>
</div>
  <!-- /#contentwrap -->
</div>
<!-- /layout-container -->


<?php get_footer(); ?>