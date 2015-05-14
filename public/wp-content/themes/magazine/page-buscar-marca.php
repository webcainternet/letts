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


<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

	<div id="contentwrap" style="width: 100%;padding-top: 0px;">

		<div style="width: 100%;">
			<div class="related-posts">
				<h4 class="related-title" style="border: 0px;margin-top: 10px; margin-bottom: 5px;">Filtrar Marcas</h4>
			</div>
    <div class="post-meta" style="display: inline;">
          <div style="float: left; margin-right: 15px;">
            <form method="post" id="filtroesporte">
            <span class="post-category"><a href="#">Esporte</a></span><br>
            <select  class="selectitens" name="esporte" onchange="this.form.submit();">
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
                    <option>Skate - Street</option>
                    <option>Skate – Free style</option>
                    <option>Skate – Mini ramp</option>
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
                  </select>
                </form>  
          </div>

          <div style="float: left; margin-right: 15px;">
            <form method="post" id="filtroprofissao">
            <span class="post-category"><a href="#">Profissão</a></span><br>
            <select  class="selectitens" name="profissao" onchange="this.form.submit();">
              <option>-- Selecione --</option>
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
            </form>        
          </div>		
    </div>
</form>
			<div style="float: left; width: 100%; padding-top: 10px;">
				<div class="related-posts" style="float: left; width: 100%; margin-bottom: 30px;">



							<div style="">
								
<section class="module">
  <section class="wraper">    


<?php
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);

$result = mysql_query("select id, post_title from wp_posts where post_type = 'marca' AND post_status = 'publish'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$nome = $row["post_title"];
	$idatleta = $row["id"];

	$resultesporte = mysql_query("select meta_value from wp_postmeta where meta_key = 'atletaesporte' AND post_id = ".$row["id"]);
    while ($rowesporte = mysql_fetch_array($resultesporte, MYSQL_ASSOC)) {
    	$esporte = $rowesporte["meta_value"];
    }

    $resultbasicacidadeatual = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicacidadeatual' AND post_id = ".$row["id"]);
    while ($rowbasicacidadeatual = mysql_fetch_array($resultbasicacidadeatual, MYSQL_ASSOC)) {
    	$basicacidadeatual = $rowbasicacidadeatual["meta_value"];
    }

    $resultbasicaimagem = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicaimagem' AND post_id = ".$row["id"]);
    while ($rowbasicaimagem = mysql_fetch_array($resultbasicaimagem, MYSQL_ASSOC)) {
    	$basicaimagem = $rowbasicaimagem["meta_value"];
    }
	$resultbasicaimagemurl = mysql_query("select meta_value from wp_postmeta where meta_key = '_wp_attached_file' AND post_id = ".$basicaimagem);
    while ($rowbasicaimagemurl = mysql_fetch_array($resultbasicaimagemurl, MYSQL_ASSOC)) {
    	$basicaimagemurl = $rowbasicaimagemurl["meta_value"];
        $basicaimagemurl = explode("http://letts.com.br/wp-content/uploads/", $basicaimagemurl);
        if ($basicaimagemurl[1]) {
            $basicaimagemurl = $basicaimagemurl[1];
        }else{
            $basicaimagemurl = $basicaimagemurl[0];
        }        
    }


    ?>
    <figure class='small' style="border: 0px;">
      <a href="/?p=<?php echo $idatleta; ?>">
      	<div style="width: 250px; 
      	height: 200px; 
      	background-image: url('http://letts.com.br/wp-content/uploads/<?php echo $basicaimagemurl; ?>');
      	background-position: center;
        background-repeat: no-repeat;
      	<?php echo calcbackgroundsize("wp-content/uploads/".$basicaimagemurl, 250, 200); ?>;
      	">
      		&nbsp;
      	</div>
        <!-- <img src="http://fakeimg.pl/250x250/" alt=""> -->
      </a>
      <figcaption class="transition-050 opacity85">
        <a href="/?p=<?php echo $idatleta; ?>">
          <strong class="text transition-050 title"><?php echo $nome; ?></strong>
          <!-- <span class="text transition-050 desc"><?php echo $esporte; ?><br><b>Mora em: </b><?php echo $basicacidadeatual; ?></span> -->
        </a>
      </figcaption>
    </figure>
    <?php
}

mysql_free_result($result);
?>



  </section>
</section>



							</div>


						</div>

				</div>

			</div>

		</div>

</div>
</div>
</div>


	</div>
</div>
	<!-- /#contentwrap -->

	

</div>
<!-- /layout-container -->

<?php include('banners.php') ?>  

<?php get_footer(); ?>