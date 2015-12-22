<head><meta charset="UTF-8"></head>

<?php
include "../../../wp-config.php";

$vez = 0;
$vez = $vez + $_GET["cont"] * 8;

mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);



if ($_GET["profissao"] == "" && $_GET['slesporte'] == "") { 
$query1 = "select p.id, p.post_title, p.post_date, pvideo.meta_value as video, pimage.meta_value as imagem, p.post_status from wp_posts p
INNER JOIN wp_postmeta pvideo on pvideo.post_id = p.id
INNER JOIN wp_postmeta pimage on pimage.post_id = p.id
where post_type = 'news' 
AND post_status = 'publish' 
AND pvideo.meta_key = 'videourl'
AND pimage.meta_key = 'post_image'
AND p.post_status = 'publish'
ORDER BY post_date DESC LIMIT ".$vez.", 8";
}

if ($_GET["profissao"] != "") {
$query1 = "select p.id, p.post_title, p.post_date, pvideo.meta_value as video, pimage.meta_value as imagem, pprofissao.meta_value as profissao, p.post_status from wp_posts p
INNER JOIN wp_postmeta pvideo on pvideo.post_id = p.id
INNER JOIN wp_postmeta pimage on pimage.post_id = p.id
INNER JOIN wp_postmeta pprofissao on pprofissao.post_id = p.id
where post_type = 'news' 
AND post_status = 'publish' 
AND pvideo.meta_key = 'videourl'
AND pimage.meta_key = 'post_image'
AND pprofissao.meta_key = 'profissao' 
AND p.post_status = 'publish'
AND pprofissao.meta_value = '".$_GET['profissao']."'
ORDER BY post_date DESC LIMIT ".$vez.", 8";
}

if ($_GET['slesporte'] != "") {
$query1 = "select p.id, p.post_title, p.post_date, pvideo.meta_value as video, pimage.meta_value as imagem, pesporte.meta_value as esporte, p.post_status from wp_posts p
INNER JOIN wp_postmeta pvideo on pvideo.post_id = p.id
INNER JOIN wp_postmeta pimage on pimage.post_id = p.id
INNER JOIN wp_postmeta pesporte on pesporte.post_id = p.id
where post_type = 'news' 
AND post_status = 'publish' 
AND pvideo.meta_key = 'videourl'
AND pimage.meta_key = 'post_image'
AND pesporte.meta_key = 'atletaesporte' 
AND p.post_status = 'publish'
AND pesporte.meta_value = '".$_GET['slesporte']."'
ORDER BY post_date DESC LIMIT ".$vez.", 8";
}

$result = mysql_query($query1);

if(mysql_num_rows($result) > 0) {
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>

<div class="noticiaitem">
<a href="/?post_id=<?php echo $row["id"]; ?>">
  <div class="noticiadata"><?php echo $row["post_date"]; ?></div>

  <?php 
    if ($row["video"] != "") { ?>
      <?php
        if (strpos($row["video"], 'youtube')) { ?>
          <div class="noticiamedia">
            <?php $url_video = explode("=", $row["video"]); ?>           
            <iframe width="344" height="212" src="//www.youtube.com/embed/<?php echo $url_video[1]; ?>" frameborder="0" allowfullscreen></iframe>
          </div>
        <?php } elseif (strpos($row["video"], 'vimeo')) { ?>
          <div class="noticiamedia">
            <?php $videourl = str_replace("vimeo.com/", "player.vimeo.com/video/", $row["video"]); ?>
            <iframe width="344" height="212" src="<?php echo $videourl; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
          </div>
        <?php } else { ?>
          <div class="noticiamedia">Erro ao carregar vídeo!</div>
        <?php } ?>
    <?php } else { ?>
      <?php if ($row["imagem"] != "") { ?>
        <div class="noticiamedia" style="background-image: url('<?php echo $row["imagem"]; ?>'); <?php echo calcbackgroundsize($row["imagem"], 344, 212); ?>;"></div>
      <?php } ?>
    <?php } ?>
    <div class="noticiatitulo"><?php echo $row["post_title"]; ?></div>
</a>
</div>

  <?php }
} else {
  echo "<div style=\"float: left; margin-top: 20px;width: 500px;\">Nenhuma noticia mais!</div>";
}

mysql_free_result($result);
?>




