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
  .redes_sociais{
    width: 40%;
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
                      <option>-- Esporte --</option>
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
                    <option>-- Profissão --</option>
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


  if ($_POST["profissao"]) {
    $result = mysql_query("select po.id, po.post_title, po.post_content, po.post_date, po.guid, pm.meta_value from wp_posts po INNER JOIN wp_postmeta pm ON pm.post_id = po.id where pm.meta_key = 'profissao' AND po.post_type = 'news' AND po.post_status = 'publish' AND pm.meta_value = '".$_POST["profissao"]."' ORDER BY po.post_date DESC LIMIT 10");
  } else {
      if ($_POST["slesporte"]) {
        $result = mysql_query("select po.id, po.post_title, po.post_content, po.post_date, po.guid, pm.meta_value from wp_posts po INNER JOIN wp_postmeta pm ON pm.post_id = po.id where pm.meta_key = 'atletaesporte' AND po.post_type = 'news' AND po.post_status = 'publish' AND pm.meta_value = '".$_POST["slesporte"]."' ORDER BY po.post_date DESC LIMIT 10");
      } else {
        $result = mysql_query("select id, post_title, post_content, post_date, guid from wp_posts where post_type = 'news' AND post_status = 'publish' ORDER BY post_date DESC LIMIT 10");
      }
  }


if(mysql_num_rows($result) > 0) {

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $guid = $row["guid"];
  $nome = $row["post_title"];
  $texto = $row["post_content"];
  $idatleta = $row["id"];
  $post_date = $row["post_date"];
  $date = date_create($post_date);
  $data2 = date_format($date, 'd-m-Y');

  $post_date = date_format($post_date, 'Y-m-d H:i:s');

    $resultaprovado = mysql_query("select meta_value from wp_postmeta where meta_key = 'aprovado' AND post_id = ".$row["id"]);
    while ($rowaprovado = mysql_fetch_array($resultaprovado, MYSQL_ASSOC)) {
      $aprovado = $rowaprovado["meta_value"];
    }

    $resultatletaesporte = mysql_query("select meta_value from wp_postmeta where meta_key = 'atletaesporte' AND post_id = ".$row["id"]);
    while ($rowatletaesporte = mysql_fetch_array($resultatletaesporte, MYSQL_ASSOC)) {
      $atletaesporte = $rowatletaesporte["meta_value"];
    }

    $resultbasicaemail = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicaemail' AND post_id = ".$row["id"]);
    while ($rowbasicaemail = mysql_fetch_array($resultbasicaemail, MYSQL_ASSOC)) {
      $basicaemail = $rowbasicaemail["meta_value"];
    }
    
    $resultimgnews = mysql_query("select meta_value from wp_postmeta where meta_key = 'imgnews' AND post_id = ".$row["id"]);
    while ($rowimgnews = mysql_fetch_array($resultimgnews, MYSQL_ASSOC)) {
      $imgnews = $rowimgnews["meta_value"];
    }

    $resultslvideo = mysql_query("select meta_value from wp_postmeta where meta_key = 'slvideo' AND post_id = ".$row["id"]);
    while ($rowslvideo = mysql_fetch_array($resultslvideo, MYSQL_ASSOC)) {
      $slvideo = $rowslvideo["meta_value"];
    }

    $resultvideourl = mysql_query("select meta_value from wp_postmeta where meta_key = 'videourl' AND post_id = ".$row["id"]);
    while ($rowvideourl = mysql_fetch_array($resultvideourl, MYSQL_ASSOC)) {
      $videourl = $rowvideourl["meta_value"];
    }

    $resultbasicaimagemurl = mysql_query("select meta_value from wp_postmeta where meta_key = '_wp_attached_file' AND post_id = ".$imgnews);
    while ($rowbasicaimagemurl = mysql_fetch_array($resultbasicaimagemurl, MYSQL_ASSOC)) {
      $basicaimagemurl = $rowbasicaimagemurl["meta_value"];
    }
    ?>

    <?php if ($cont % 3 == 0 ) { ?>
    <?php } ?>

    <?php
      if ($_POST['slesporte'] == "") {
        $atletaesporte = "";
      }


      if ($aprovado == 1 && $atletaesporte == $_POST['slesporte']) {
      $cont = $cont + 1;
    
    
    ?>

    <div class="related-posts">
    
    <div style="text-align: left;">
      <span style="background-color: #FFF; color: #7A8B8B; width: 100px; font-size: 16px;font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;"><?php echo $data2; ?></span>
    </div>
    <?php if ($basicaimagemurl != "" || $slvideo == "youtube" || $slvideo == "vimeo") { ?>

      <?php if ($slvideo == "youtube") { ?>
        <div class="imgnoticias" style="background-image: url('http://letts.com.br/wp-content/uploads/<?php echo $basicaimagemurl; ?>');">
          
          <?php 
            $url_video = explode("=", $videourl);            
          ?>
          <iframe width="330" height="180" src="//www.youtube.com/embed/<?php echo $url_video[1]; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
        <article class="post type-post clearfix">
          <div class="post-content">
            <p class="post-meta">
              <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
                <a href="<?php echo "$guid"; ?>"><?php echo $nome; ?></a></span>
            </p>
          </div>
        </article>
      <?php } else { ?>

      <?php if ($slvideo == "vimeo") { 
        $videourl = str_replace("vimeo.com/", "player.vimeo.com/video/", $videourl)

        ?>
        <div class="imgnoticias" style="background-image: url('http://letts.com.br/wp-content/uploads/<?php echo $basicaimagemurl; ?>');">
          <iframe width="330" height="180" src="<?php echo $videourl; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        <article class="post type-post clearfix">
          <div class="post-content">
            <p class="post-meta">
              <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
                <a href="<?php echo "$guid"; ?>"><?php echo $nome; ?></a></span>
            </p>
          </div>
        </article>
      <?php } else { ?>



      <?php if ($basicaimagemurl != "") { ?>

      <?php 
        $basicaimagemurl = explode("http://letts.com.br/wp-content/uploads/", $basicaimagemurl);

       ?>

       <?php if ($basicaimagemurl[1]){ ?>
                <a href="<?php echo "$guid"; ?>">
                  <div class="imgnoticias" 
        style="background-image: url('http://letts.com.br/wp-content/uploads/<?php echo $basicaimagemurl[1]; ?>');">
        &nbsp;
               </div></a>           
       <?php }else{ ?>
                <a href="<?php echo "$guid"; ?>">
                  <div class="imgnoticias" 
        style="background-image: url('http://letts.com.br/wp-content/uploads/<?php echo $basicaimagemurl[0]; ?>');">
        &nbsp;
               </div></a> 
      <?php } ?>
      <article class="post type-post clearfix">
        <div class="post-content">
          <p class="post-meta">
            <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
              <a href="<?php echo "$guid"; ?>"><?php echo $nome; ?></a></span>
          </p>
        </div>
      </article>
      <?php } } } ?>

      



    <?php $basicaimagemurl = ""; } else { ?>
      <article class="post type-post clearfix">
        <div class="post-content">
          <p class="post-meta" style="background-image: url('http://letts.com.br/wp-content/uploads/2014/09/icon_folha.png'); background-size: 50px; background-repeat: no-repeat; padding-left: 60px;">
            <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
              <a href="<?php echo "$guid"; ?>"><?php echo $nome; ?></a></span>
          </p>
          <h1 class="post-title">
            <a href="<?php echo "$guid"; ?>" title="Lançamento do website"><?php echo substr($texto,0, 190); ?>... <a href="<?php echo "$guid"; ?>"><b>[Leia mais]</b></a></a>
          </h1>
        </div>
      </article>
    <?php } ?>

    </div>

    <?php if ($contador % 2 == 1 ) { echo "<div style='float: left; width: 100%;'><hr style='border: 0px; border-top: dotted 1px;'></div>"; } $contador++;?>
    
    <?php
    }


    
}
} else {
  echo "<div style=\"float: left; margin-top: 20px;\">Nenhuma noticia encontrada!</div>";
}


mysql_free_result($result);
?>




        </div>




      </div>


  <div id="newsajax">


    


  </div>


<div style="float: left; width: 100%;">
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


<input type="text" name="noticount" id="noticount" style="display: none;">


<script type="text/javascript">
  function carregarmais() {
    //Get
    var bla = $('#noticount').val();
    var nova = parseInt(bla) + 1;
    
    $('#noticount').val(nova);


    $.ajax({url: "/wp-content/themes/magazine/page-news-ajax.php?cont="+bla, success: function(result){
        $("#newsajax").append(result);
        //alert(result);
    }});


  }


  $('#noticount').val('1');


</script>

  
<?php get_footer(); ?>