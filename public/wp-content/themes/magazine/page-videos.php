<?php
if (isset($_GET['vid']) == false) {
  if ($_POST["esporte"]) {
    $resultIDNull = mysql_query("SELECT id FROM (SELECT id, post_title,meta_value FROM wp_posts p INNER JOIN wp_postmeta pm on p.id = pm.post_id WHERE p.post_type = 'video' AND p.post_status = 'publish' AND pm.meta_key = 'basicaemail' AND meta_value IN (
SELECT pm2.meta_value FROM wp_postmeta pm INNER JOIN wp_posts p ON pm.post_id = p.id
INNER JOIN wp_postmeta pm2 ON p.id = pm2.post_id
WHERE p.post_type = 'atleta' AND pm.meta_key = 'atletaesporte' AND pm.meta_value = '".$_POST["esporte"]."' AND pm2.meta_key = 'basicaemail') ) AS t1 order by rand() limit 1");
  } else {
    if ($_POST["profissao"]) {
      $resultIDNull = mysql_query("SELECT id FROM (SELECT id, post_title,meta_value FROM wp_posts p INNER JOIN wp_postmeta pm on p.id = pm.post_id WHERE p.post_type = 'video' AND p.post_status = 'publish' AND pm.meta_key = 'basicaemail' AND meta_value IN (
SELECT pm2.meta_value FROM wp_postmeta pm INNER JOIN wp_posts p ON pm.post_id = p.id
INNER JOIN wp_postmeta pm2 ON p.id = pm2.post_id
WHERE p.post_type = 'profissional' AND pm.meta_key = 'profissao' AND pm.meta_value = '".$_POST["profissao"]."' AND pm2.meta_key = 'basicaemail') ) AS t1 order by rand() limit 1");
  } else {
	   //Randomiza Video ID
	   $resultIDNull = mysql_query("SELECT id FROM (SELECT * FROM wp_posts WHERE post_type = 'video' AND post_status = 'publish' ORDER BY post_modified limit 5) AS t1 order by rand() limit 1");
  } }

  while ($rowIDNull = mysql_fetch_array($resultIDNull, MYSQL_ASSOC)) {
		$idq = $rowIDNull["id"];
	}
} else {
	$idq = $_GET['vid'];
}

//Obtem email do video aberto
$resultEmail = mysql_query("select meta_value from wp_postmeta WHERE post_id = '".$idq."' AND meta_key = 'basicaemail'");
while ($rowEmail = mysql_fetch_array($resultEmail, MYSQL_ASSOC)) {
	$EmailVideo = $rowEmail["meta_value"];
}

//Obtem ID do login do video aberto
$resultIDLogin = mysql_query("select PU.post_id as id FROM wp_postmeta PU inner join wp_postmeta PS ON PU.post_id = PS.post_id where PU.meta_key = 'basicaemail' AND PU.meta_value = '".$EmailVideo."' AND PS.meta_key = 'senha'");
while ($rowIDLogin = mysql_fetch_array($resultIDLogin, MYSQL_ASSOC)) {
	$IDLogin = $rowIDLogin["id"];
}

//Obtem Nome do autor do vídeo
$resultNome = mysql_query("SELECT post_title FROM wp_posts WHERE ID = ".$IDLogin);
while ($rowNome = mysql_fetch_array($resultNome, MYSQL_ASSOC)) {
	$NomeU = $rowNome["post_title"];
}

//Obtem Imagem do perfil
$resultImgP = mysql_query("SELECT meta_value FROM wp_postmeta WHERE post_id IN (select meta_value from wp_postmeta WHERE meta_key = 'basicaimagem' AND post_id =  ".$IDLogin." ) AND meta_key = '_wp_attached_file'");
while ($rowImgP = mysql_fetch_array($resultImgP, MYSQL_ASSOC)) {
  $ImgP = $rowImgP["meta_value"];
}

?>

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

<style type="text/css">
  .module figure { border: 0px; }
</style>

<div style="width: 100%; background-image: url('http://letts.com.br/wp-content/uploads/2014/09/abstract_wallpaper_for_mac_by_pimpyourscreen-d6nnlut.jpg');
			background-position: center; height: 504px;">

<?php
			mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
			    die("Could not connect: " . mysql_error());
			mysql_select_db(DB_NAME);

			$resultTitle = mysql_query("SELECT post_title FROM wp_posts WHERE post_type = 'video' AND post_status = 'publish' AND ID = ".$idq."");
			while ($rowTitle = mysql_fetch_array($resultTitle, MYSQL_ASSOC)) {
				$titulovideo = $rowTitle["post_title"];
			}

			$resultVideoURL = mysql_query("SELECT meta_value FROM wp_postmeta WHERE post_id = ".$idq." AND meta_key = 'link_video'");

			while ($rowVideoURL = mysql_fetch_array($resultVideoURL, MYSQL_ASSOC)) {
				$VideoURL = $rowVideoURL["meta_value"];
			}
		?>
		

	<div id="layout" class="pagewidth clearfix">
		<div style="width: 790px%; background-color: #fff; padding: 10px;opacity: 0.9; filter: alpha(opacity=90);">
			<span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;"><a href="#" style="text-decoration: none;"><?php echo $titulovideo; ?></a></span>

			<div style="float: right; text-align: right; margin-bottom: 10px;margin-top: 0px;margin-right: 0px;"> 
        
        <div class="post-meta" style="display: inline;">
          <div style="float: right; margin-right: 15px;">
              <form method="post" id="filtroesporte">
              <select name="esporte" class="selectitens"  onchange="this.form.submit();">
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
                          <select  class="selectitens" name="profissao"  onchange="this.form.submit();">
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







		</div>


		<div style="width: 790px; float: left;">
			<?php 
				$video = explode("/", $VideoURL);
				$url_video = explode("=", $video[3]);
				if ($url_video[0] == 'watch?v') {
				 	$imgid = $url_video[1];
				 	$img_video = 'http://img.youtube.com/vi/'.$imgid.'/0.jpg';
				 	?> <iframe width="790" height="450" src="//www.youtube.com/embed/<?php echo $imgid; ?>?autoplay=1" frameborder="0" allowfullscreen></iframe> <?php
				 } else{
				$imgid = $url_video[0];
				$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
				$img_video = $hash[0]['thumbnail_medium'];
					?> <iframe width="790" height="450" src="//player.vimeo.com/video/<?php echo $imgid; ?>?badge=0&autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> <?php
				 } 
			?>

		
		</div>

    <?php 
      $ImgP = explode("http://letts.com.br/wp-content/uploads/", $ImgP);
      if ($ImgP[1]) {
        $ImgP = $ImgP[1];
      }else{
        $ImgP = $ImgP[0];
      }
    ?>

		<div style="float: right; width: 253px;">
			<section class="module">
			  <section class="wraper">    
			    <figure class="small" style="width: 100%;">
			      <a href="/?p=2435">
			      	<div style="width: 250px; 
			      	height: 200px; 
			      	background-image: url('http://letts.com.br/wp-content/uploads/<?php echo $ImgP; ?>');
			      	background-position: center;
			      	background-size: 300px;
			      	">
			      		&nbsp;
			      	</div>
			      </a>
			    </figure>
			  </section>
			</section>

			<style type="text/css">
				.videos-link {
					text-decoration: none; text-transform: uppercase; color: #FFFFFF;
				}
				.videos-link:hover {
					text-decoration: none; text-transform: uppercase; color: #ff8920;
				}
			</style>

			<div style="background-color: #333333; padding: 10px; color: #FFFFFF;">
		        <a href="/?p=2435">
		          <strong style="color: #FFFFFF;"><?php echo $NomeU; ?></strong><br>
		          <span style="color: #FFFFFF;">
					<a class="videos-link" href="?p=<?php echo $IDLogin; ?>&page=mensagem">Mensagem</a> | 
					<a class="videos-link" href="?p=<?php echo $IDLogin; ?>&page=fotos">Fotos</a> | 
					<a class="videos-link" href="?p=<?php echo $IDLogin; ?>&page=sobre">Sobre</a>
		          </span>
		        </a>
	        <div>
		</div>
	</div>
</div></div>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">




	<div id="contentwrap" style="width: 100%;padding-top: 0px;">







<?php
if ($_POST["esporte"]) { ?>


  <!-- Selecionada pelo filtro -->
    <div style="float: left; width: 100%; margin-top: 10px;">
      <div class="related-posts">
        <h4 class="related-title" style="margin-bottom: 15px; border: 0px;">Selecionados por esporte: <?php echo $_POST["esporte"]; ?></h4>
        <div class="related-posts" style="float: left; width: 100%;">
          <article class="post type-post clearfix">
            <div class="post-content">
              <section class="module">
                <section class="wraper">    


<?php
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);

$result = mysql_query("SELECT id, post_title,meta_value FROM wp_posts p INNER JOIN wp_postmeta pm on p.id = pm.post_id WHERE p.post_type = 'video' AND p.post_status = 'publish' AND pm.meta_key = 'basicaemail' AND meta_value IN (
SELECT pm2.meta_value FROM wp_postmeta pm INNER JOIN wp_posts p ON pm.post_id = p.id
INNER JOIN wp_postmeta pm2 ON p.id = pm2.post_id
WHERE p.post_type = 'atleta' AND pm.meta_key = 'atletaesporte' AND pm.meta_value = '".$_POST["esporte"]."' AND pm2.meta_key = 'basicaemail' 
)");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $nomevideo = $row["post_title"];
  $idusuario = $row["id"];

  $resultlink_video = mysql_query("select meta_value from wp_postmeta where meta_key = 'link_video' AND post_id = ".$row["id"]);
    while ($rowlink_video = mysql_fetch_array($resultlink_video, MYSQL_ASSOC)) {
      $link_video = $rowlink_video["meta_value"];
      $videoid = $row["id"];
    ?>
    <figure class='small'>
      <a href="/videos/?vid=<?php echo $videoid; ?>">
        


        <?php 
          $video = $link_video;
      $video = explode("/", $video);
      $url_video = explode("=", $video[3]);
    
      if ($url_video[0] == 'watch?v') {
        $imgid = $url_video[1];
        $img_video = 'http://img.youtube.com/vi/'.$imgid.'/0.jpg';
      } else{
        $imgid = $url_video[0];
        $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
        $img_video = $hash[0]['thumbnail_medium'];
      } 
    ?>


        <div style="width: 250px; 
        height: 200px; 
        background-image: url('<?php echo $img_video; ?>; ?>');
        background-position: center;
        background-size: 300px;
        ">
          &nbsp;
        </div>
        <!-- <img src="http://fakeimg.pl/250x250/" alt=""> -->
      </a>
      <figcaption class="transition-050 opacity85">
        <a href="/?p=<?php echo $idatleta; ?>">
          <strong class="text transition-050 title"><?php echo utf8_encode($nomevideo); ?></strong>
        </a>
      </figcaption>
    </figure>

    <?php
  }
}

mysql_free_result($result);
?>
                </section>
              </section>
            </div>
          </article>
        </div>
      </div>
    </div>

  
<? } else { ?>









<?php
if ($_POST["profissao"]) { ?>


  <!-- Selecionada pelo filtro -->
    <div style="float: left; width: 100%; margin-top: 10px;">
      <div class="related-posts">
        <h4 class="related-title" style="margin-bottom: 15px; border: 0px;">Selecionados pelo filtro pela profissão: <?php echo $_POST["profissao"]; ?></h4>
        <div class="related-posts" style="float: left; width: 100%;">
          <article class="post type-post clearfix">
            <div class="post-content">
              <section class="module">
                <section class="wraper">    


<?php
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);

$result = mysql_query("SELECT id, post_title,meta_value FROM wp_posts p INNER JOIN wp_postmeta pm on p.id = pm.post_id WHERE p.post_type = 'video' AND p.post_status = 'publish' AND pm.meta_key = 'basicaemail' AND meta_value IN (
SELECT pm2.meta_value FROM wp_postmeta pm INNER JOIN wp_posts p ON pm.post_id = p.id
INNER JOIN wp_postmeta pm2 ON p.id = pm2.post_id
WHERE p.post_type = 'profissional' AND pm.meta_key = 'profissao' AND pm.meta_value = '".$_POST["profissao"]."' AND pm2.meta_key = 'basicaemail' 
)");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $nomevideo = $row["post_title"];
  $idusuario = $row["id"];

  $resultlink_video = mysql_query("select meta_value from wp_postmeta where meta_key = 'link_video' AND post_id = ".$row["id"]);
    while ($rowlink_video = mysql_fetch_array($resultlink_video, MYSQL_ASSOC)) {
      $link_video = $rowlink_video["meta_value"];
      $videoid = $row["id"];
    ?>
    <figure class='small'>
      <a href="/videos/?vid=<?php echo $videoid; ?>">
        


        <?php 
          $video = $link_video;
      $video = explode("/", $video);
      $url_video = explode("=", $video[3]);
    
      if ($url_video[0] == 'watch?v') {
        $imgid = $url_video[1];
        $img_video = 'http://img.youtube.com/vi/'.$imgid.'/0.jpg';
      } else{
        $imgid = $url_video[0];
        $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
        $img_video = $hash[0]['thumbnail_medium'];
      } 
    ?>


        <div style="width: 250px; 
        height: 200px; 
        background-image: url('<?php echo $img_video; ?>; ?>');
        background-position: center;
        background-size: 300px;
        ">
          &nbsp;
        </div>
        <!-- <img src="http://fakeimg.pl/250x250/" alt=""> -->
      </a>
      <figcaption class="transition-050 opacity85">
        <a href="/?p=<?php echo $idatleta; ?>">
          <strong class="text transition-050 title"><?php echo utf8_encode($nomevideo); ?></strong>
        </a>
      </figcaption>
    </figure>

    <?php
  }
}

mysql_free_result($result);
?>
                </section>
              </section>
            </div>
          </article>
        </div>
      </div>
    </div>

  
<? } else { ?>





	<!-- Vídeos do mesmo autor -->
		<div style="float: left; width: 100%; margin-top: 10px;">
			<div class="related-posts">
				<h4 class="related-title" style="margin-bottom: 15px; border: 0px;">Vídeos do mesmo autor</h4>
				<div class="related-posts" style="float: left; width: 100%;">
					<article class="post type-post clearfix">
						<div class="post-content">
              <section class="module">
                <section class="wraper">    
<?php
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);

$result = mysql_query("SELECT id, post_title FROM wp_posts p INNER JOIN wp_postmeta pm on p.id = pm.post_id WHERE p.post_type = 'video' AND p.post_status = 'publish' AND pm.meta_key = 'basicaemail' AND meta_value = '".$EmailVideo."' ORDER BY id DESC");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$nomevideo = $row["post_title"];
	$idusuario = $row["id"];

	$resultlink_video = mysql_query("select meta_value from wp_postmeta where meta_key = 'link_video' AND post_id = ".$row["id"]);
    while ($rowlink_video = mysql_fetch_array($resultlink_video, MYSQL_ASSOC)) {
    	$link_video = $rowlink_video["meta_value"];
    	$videoid = $row["id"];
    ?>
    <figure class='small'>
      <a href="/videos/?vid=<?php echo $videoid; ?>">
      	<?php 
      		$video = $link_video;
			$video = explode("/", $video);
			$url_video = explode("=", $video[3]);
		
			if ($url_video[0] == 'watch?v') {
			 	$imgid = $url_video[1];
			 	$img_video = 'http://img.youtube.com/vi/'.$imgid.'/0.jpg';
		 	} else{
				$imgid = $url_video[0];
				$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
				$img_video = $hash[0]['thumbnail_medium'];
		 	} 
	 	?>


      	<div style="width: 250px; 
      	height: 200px; 
      	background-image: url('<?php echo $img_video; ?>; ?>');
      	background-position: center;
      	background-size: 300px;
      	">
      		&nbsp;
      	</div>
        <!-- <img src="http://fakeimg.pl/250x250/" alt=""> -->
      </a>
      <figcaption class="transition-050 opacity85">
        <a href="/?p=<?php echo $idatleta; ?>">
          <strong class="text transition-050 title"><?php echo utf8_encode($nomevideo); ?></strong>
        </a>
      </figcaption>
    </figure>

    <?php
	}
}

mysql_free_result($result);
?>
  </section>
</section>
						</div>
					</article>
				</div>
			</div>
		</div>








	<!-- Vídeos mais recentes -->
		<div style="float: left; width: 100%; margin-top: 10px;">
			<div class="related-posts">
				<h4 class="related-title" style="margin-bottom: 15px; border: 0px;">Mais recentes</h4>
				<div class="related-posts" style="float: left; width: 100%;">
					<article class="post type-post clearfix">
						<div class="post-content">
              <section class="module">
                <section class="wraper">    
<?php
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);

$resultu = mysql_query("SELECT id, post_title FROM wp_posts p INNER JOIN wp_postmeta pm on p.id = pm.post_id WHERE p.post_type = 'video' AND p.post_status = 'publish' AND pm.meta_key = 'basicaemail' ORDER BY post_modified desc limit 10");

while ($rowu = mysql_fetch_array($resultu, MYSQL_ASSOC)) {
	$nomevideo = $rowu["post_title"];
	$idusuario = $rowu["id"];

	$resultulink_video = mysql_query("select meta_value from wp_postmeta where meta_key = 'link_video' AND post_id = ".$rowu["id"]);
    while ($rowulink_video = mysql_fetch_array($resultulink_video, MYSQL_ASSOC)) {
    	$link_video = $rowulink_video["meta_value"];
    	$videoid = $rowu["id"];
    ?>
    <figure class='small'>
      <a href="/videos/?vid=<?php echo $videoid; ?>">
      	<?php 
      		$video = $link_video;
			$video = explode("/", $video);
			$url_video = explode("=", $video[3]);
		
			if ($url_video[0] == 'watch?v') {
			 	$imgid = $url_video[1];
			 	$img_video = 'http://img.youtube.com/vi/'.$imgid.'/0.jpg';
		 	} else{
				$imgid = $url_video[0];
				$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
				$img_video = $hash[0]['thumbnail_medium'];
		 	} 
	 	?>


      	<div style="width: 250px; 
      	height: 200px; 
      	background-image: url('<?php echo $img_video; ?>; ?>');
      	background-position: center;
      	background-size: 300px;
      	">
      		&nbsp;
      	</div>
        <!-- <img src="http://fakeimg.pl/250x250/" alt=""> -->
      </a>
      <figcaption class="transition-050 opacity85">
        <a href="/?p=<?php echo $idatleta; ?>">
          <strong class="text transition-050 title"><?php echo utf8_encode($nomevideo); ?></strong>
        </a>
      </figcaption>
    </figure>

    <?php
	}
}

mysql_free_result($resultu);
?>

                </section>
              </section>
						</div>
					</article>
				</div>
			</div>

<?php } } ?>



				</div>
			
			<br>&nbsp;<br>



	

</div>
<!-- /layout-container -->
	
<?php get_footer(); ?>