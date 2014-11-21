<style type="text/css">
	.classificados {
		float: left;
		width: 275px;
		margin-left: 20px;
		margin-bottom: 20px;
		border: solid 1px;
		padding: 28px;
	}
</style>
<?php
	ini_set("DISPLAY_ERRORS", 1);

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

		<div style="width: 100%; background-color: #FFFFFF; height: 130px;">
			<div class="related-posts" style="height: 125px;">
				<h4 class="related-title" style="border: 0px;margin-left: 25px;margin-top: 10px; margin-bottom: 5px;">Acessórios / Classificados:</h4>

				<div class="post-meta" style="display: inline;">
					<form method="post">
					<div style="float: left; margin-right: 15px; margin-left: 25px;">
						<span class="post-category"><a href="#">Titulo</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 190px; height: 30px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

					<div style="float: left; margin-right: 15px;">
						<span class="post-category"><a href="#">Estado</a></span><br>
						<select  class="selectitens" name="esporte">
										<option>-- Selecione --</option>
										<option>Novo</option>
										<option>Usado</option>
									</select>
					</div>


					<div style="float: left; margin-right: 15px;">
						<span class="post-category"><a href="#">De: R$</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 150px; height: 30px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>


					<div style="float: left; margin-right: 15px;">
						<span class="post-category"><a href="#">Até: R$</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 150px; height: 30px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

					<div style="float: left; margin-right: 15px;">
						<span class="post-category"><a href="#">Esporte</a></span><br>
						<select class="selectitens" name="sexo">
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
					</div>

					<div style="float: left; margin-right: 15px;">
						<input type="submit" value="Buscar" style="margin-top: 16px;">
					</div>
					</form>
			</div>
		</div>

<section class="module">
  <section class="wraper">    
  	<?php 
		$result = mysql_query("SELECT distinct `p`.`id`, `p`.`post_date` as post_data, `p`.`post_title` as title, `testado`.`meta_value` as estado, 
			`tesporte`.`meta_value` as esporte, `tfoto`.`meta_value` as idfoto, `tvalor`.`meta_value` as valor, 
			`temail`.`meta_value` as email, `login`.`post_title` as nome, `login`.`post_id` AS loginid, `ttelefone`.`meta_value` AS telefone
		FROM wp_posts p
		INNER JOIN wp_postmeta pm ON `p`.`id` = `pm`.`post_id`
		INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta estado WHERE `estado`.`meta_key` = 'acessorioestado') AS testado ON `testado`.`post_id` = `p`.`id`
		INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta esporte WHERE `esporte`.`meta_key` = 'atletaesporte') AS tesporte ON `tesporte`.`post_id` = `p`.`id`
		INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta foto WHERE `foto`.`meta_key` = 'fotoacessorio') AS tfoto ON `tfoto`.`post_id` = `p`.`id`
		INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta valor WHERE `valor`.`meta_key` = 'acessoriovalor') AS tvalor ON `tvalor`.`post_id` = `p`.`id`
		INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta email WHERE `email`.`meta_key` = 'basicaemail') AS temail ON `temail`.`post_id` = `p`.`id`
		INNER JOIN (
			select `k`.`post_id`, `k`.`meta_value`, `po`.`post_title` from wp_postmeta k 
			INNER JOIN wp_posts po ON `po`.`id` = `k`.`post_id`
			WHERE `k`.`meta_key` = 'basicaemail' 
		) AS login ON `login`.`meta_value` = `temail`.`meta_value`
		INNER JOIN (
			select `k`.`post_id`, `k`.`meta_value` from wp_postmeta k 
			INNER JOIN wp_posts po ON `po`.`id` = `k`.`post_id`
			WHERE `k`.`meta_key` = 'basicatelefones'
		) AS ttelefone ON `ttelefone`.`post_id` = `login`.`post_id`");
	?>

  	<?php while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
  		<?php 
   			$data_acessorio = explode(" ", $row["post_data"]);
  			$data_acessorio = explode("-", $data_acessorio[0]);
  			$data_acessorio = $data_acessorio[2]."-".$data_acessorio[1]."-".$data_acessorio[0];
  		?>

  	<div class="related-posts classificados">
        <div style="text-align: right;">
          <span style="background-color: #FFF; color: #7A8B8B; width: 100px; font-size: 16px;
          font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;">Anunciado: <?php echo $data_acessorio; ?></span>
        </div>
        <a href="/wp-content/themes/magazine/form_acessorios.php?nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox">

		<?php 
			$attachment_id = $row["idfoto"];

			$image_attributes = wp_get_attachment_image_src($attachment_id); 
				if( $image_attributes ) { ?> 
        	<figure class="small" style="border: 0px; width: 100%;">
		      <a href="/wp-content/themes/magazine/form_acessorios.php?nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox">
		      	<div style="width: width: 100%; 
		      	height: 200px; 
		      	background-image: url('<?php echo $image_attributes[0]; ?>');
		      	background-position: center;
		      	background-size: 300px;
		      	"></div>
		      </a>
		      <?php } ?>

		      <figcaption class="transition-050 opacity85">
		        <a href="/wp-content/themes/magazine/form_acessorios.php?nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox">
		          <strong class="text transition-050 title"><?php echo $row["estado"]; ?></strong>
		          <span class="text transition-050 desc"><?php echo $row["nome"]; ?><br>
		                    <b>Contato: </b><?php echo $row["telefone"]; ?></span>
		        </a>
		      </figcaption>
		    </figure>

        </a>
        <br/>
        <article class="post type-post clearfix" style="margin-bottom: 0px !important;">
          <div class="post-content">
            <p class="post-meta">
              <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
                <a href="/wp-content/themes/magazine/form_acessorios.php?nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox"><?php echo $row["title"]; ?></a></span>
            </p>
          </div>
        </article>

        <div style="float: right; margin-right: 0px;margin-top: 0px; margin-bottom: 0px;">
			<a href="/wp-content/themes/magazine/form_acessorios.php?nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox button">R$ <?php echo $row["valor"]; ?></a>
		</div>
  	</div>

  	<?php } ?>
	  </section>
	</section>
			</div>


						</div>

				</div>

		</div>



	</div>
</div>
	<!-- /#contentwrap -->

	

</div>
<!-- /layout-container -->

<?php get_footer(); ?>