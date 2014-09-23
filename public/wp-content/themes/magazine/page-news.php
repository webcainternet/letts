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

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

  <div id="contentwrap" style="width: 100%;padding-top: 0px;">

    <div id="content" class="list-post">

      <div style="float: left; width: 100%; padding-top: 10px; margin-bottom: 10px;">
      
      <div style="float: left; width: 49%;"> 
        <h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;" style="font-weight: bold;">Notícias</h1>
      </div>

      <div style="float: right; width: 49%; text-align: right; margin-bottom: 10px;"> 
        
        <div class="post-meta" style="display: inline;">
          <div style="float: right; margin-right: 15px;">
              <span class="post-category" style="margin-right: 108px;"><a href="#">Esporte</a></span><br>
              <form method="post" id="filtroesporte">
              <select name="slesporte" class="selectitens"  onchange="this.form.submit();">
                      <option>-- Selecione --</option>
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
        </div>


        <div style="margin: 0px; padding: 0px;">

          <div style="width: 100%; float: left; height: 1px;"> &nbsp;</div>


    

<?php

mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);


  $result = mysql_query("select id, post_title, post_content, post_date, guid from wp_posts where post_type = 'news' AND post_status = 'publish'");

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
        <div style="width: 100%; float: left; height: 1px;"> &nbsp;</div>
    <?php } ?>

    <?php
      if ($_POST['slesporte'] == "") {
        $atletaesporte = "";
      }


      if ($aprovado == 1 && $atletaesporte == $_POST['slesporte']) {
      $cont = $cont + 1;
    
    
    ?>

    <div class="related-posts" style="float: left; width: 312px; margin-left: 20px; margin-right: 20px; margin-bottom: 0px;">
    <div style="text-align: right;">
      <span style="background-color: #FFF; color: #7A8B8B; width: 100px; font-size: 16px;font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;"><?php echo $data2; ?></span>
    </div>
    <?php if ($basicaimagemurl != "" || $slvideo == "youtube" || $slvideo == "vimeo") { ?>

      <?php if ($slvideo == "youtube") { ?>
        <div class="imgnoticias" style="width: 306px; border-radius: 5px; height: 180px; background-size: 312px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/<?php echo utf8_encode($basicaimagemurl); ?>');">
          <iframe width="306" height="180" src="<?php echo $videourl; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
        <article class="post type-post clearfix">
          <div class="post-content">
            <p class="post-meta">
              <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
                <a href="<?php echo "$guid"; ?>"><?php echo utf8_encode($nome); ?></a></span>
            </p>
          </div>
        </article>
      <?php } else { ?>

      <?php if ($slvideo == "vimeo") { 
        $videourl = str_replace("vimeo.com/", "player.vimeo.com/video/", $videourl)

        ?>
        <div class="imgnoticias" style="width: 306px; border-radius: 5px; height: 180px; background-size: 312px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/<?php echo utf8_encode($basicaimagemurl); ?>');">
          <iframe width="306" height="180" src="<?php echo $videourl; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        <article class="post type-post clearfix">
          <div class="post-content">
            <p class="post-meta">
              <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
                <a href="<?php echo "$guid"; ?>"><?php echo utf8_encode($nome); ?></a></span>
            </p>
          </div>
        </article>
      <?php } else { ?>



      <?php if ($basicaimagemurl != "") { ?>
      <a href="<?php echo "$guid"; ?>"><div class="imgnoticias" style="width: 306px; border-radius: 5px; height: 180px; background-size: 312px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/<?php echo utf8_encode($basicaimagemurl); ?>');">
        &nbsp;
      </div></a>
      <article class="post type-post clearfix">
        <div class="post-content">
          <p class="post-meta">
            <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
              <a href="<?php echo "$guid"; ?>"><?php echo utf8_encode($nome); ?></a></span>
          </p>
        </div>
      </article>
      <?php } } } ?>

      



    <?php $basicaimagemurl = ""; } else { ?>
      <article class="post type-post clearfix">
        <div class="post-content">
          <p class="post-meta" style="background-image: url('http://letts.com.br/wp-content/uploads/2014/09/icon_folha.png'); background-size: 50px; background-repeat: no-repeat; padding-left: 60px;">
            <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
              <a href="<?php echo "$guid"; ?>"><?php echo utf8_encode($nome); ?></a></span>
          </p>
          <h1 class="post-title">
            <a href="<?php echo "$guid"; ?>" title="Lançamento do website"><?php echo substr(utf8_encode($texto),0, 190); ?>... <a href="<?php echo "$guid"; ?>"><b>[Leia mais]</b></a></a>
          </h1>
        </div>
      </article>
    <?php } ?>

    </div>
    
    <?php
    }


    
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
  
<?php get_footer(); ?>