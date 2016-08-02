<?php
include "../../../wp-config.php";

$vez = 6;
$vez = $vez + $_GET["cont"] * 4;

mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);


  if ($_POST["profissao"]) {
    $result = mysql_query("select po.id, po.post_title, po.post_content, po.post_date, po.guid, pm.meta_value from wp_posts po INNER JOIN wp_postmeta pm ON pm.post_id = po.id where pm.meta_key = 'profissao' AND po.post_type = 'news' AND po.post_status = 'publish' AND pm.meta_value = '".$_POST["profissao"]."' ORDER BY po.post_date DESC LIMIT ".$vez.", 4");
  } else {
      if ($_POST["slesporte"]) {
        $result = mysql_query("select po.id, po.post_title, po.post_content, po.post_date, po.guid, pm.meta_value from wp_posts po INNER JOIN wp_postmeta pm ON pm.post_id = po.id where pm.meta_key = 'atletaesporte' AND po.post_type = 'news' AND po.post_status = 'publish' AND pm.meta_value = '".$_POST["slesporte"]."' ORDER BY po.post_date DESC LIMIT ".$vez.", 4");
      } else {
        $result = mysql_query("select id, post_title, post_content, post_date, guid from wp_posts where post_type = 'news' AND post_status = 'publish' ORDER BY post_date DESC LIMIT ".$vez.", 4");
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
  echo "<div style=\"float: left; margin-top: 20px;\">Nenhuma noticia mais!</div>";
}


mysql_free_result($result);
?>

