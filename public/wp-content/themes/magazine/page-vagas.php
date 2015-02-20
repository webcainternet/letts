<style type="text/css">
	.classificados {
		float: left;
		width: 234px;
		margin-left: 0px;
		margin-bottom: 20px;
		border: solid 1px #FFFFFF;
		padding: 15px;
	}
	.classificados:hover {
		border: solid 1px #BBBBBB;
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
			<div class="related-posts" style="height: 625px; width: 305px; float: left; ">
				<h4 class="related-title" style="border: 0px;margin-left: 25px;margin-top: 10px; margin-bottom: 5px;">Vagas e oportunidades:</h4>

				<div class="post-meta" style="display: inline;">
					<form method="post">
					<div style="float: left; margin-right: 15px; margin-left: 25px;">
						<span class="post-category"><a href="#">Titulo</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 190px; height: 30px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

					<div style="float: left; margin-right: 15px; margin-left: 25px;">
						<span class="post-category"><a href="#">Estado</a></span><br>
						<select  class="selectitens" name="esporte">
										<option>-- Selecione --</option>
										<option>Novo</option>
										<option>Usado</option>
									</select>
					</div>

					<div style="float: left; margin-right: 15px; margin-left: 25px; margin-top: 10px;">
						<span class="post-category"><a href="#">Profissão</a></span><br>
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

					<div style="float: right; margin-right: 105px;">
						<input type="submit" value="Buscar" style="margin-top: 16px;">
					</div>
					</form>
			</div>
		</div>



<div id="vagas" style="float: left; width: 705px; margin-left: 20px;">

    <?php query_posts('post_type=vagas');
    while (have_posts()): the_post(); ?>


    <div class="vaga">
      <div style="margin-top: 0px; color: #666; font-size: 12px;">Data de postagem: 12/12/2012</div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;"><center><?php the_title(); ?></center></strong></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;"><center>São Paulo - SP</center></strong></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Empresa: </strong><?php the_content(); ?></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Contato: </strong><br /> <?php print_custom_field('basicaemail'); ?></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Descrição: </strong><br /> Texto com informações sobre a vaga e lorem ipsum dolar si amet diwne lorem ipsum dolar si amet diwne lorem ipsum dolar si amet diwn. Texto com informações sobre a vaga e lorem ipsum dolar si amet diwne lorem ipsum dolar si amet diwne lorem ipsum dolar si amet diwn. Texto com informações sobre a vaga e lorem ipsum dolar si amet diwne lorem ipsum dolar si amet diwne lorem ipsum dolar si amet diwn.</div>
      <div style="margin-top: 10px; color: #666; text-align: right;"><a href="mailto:<?php print_custom_field('basicaemail'); ?>"><input type="submit" value="Enviar currículo" style="margin-top: 16px;"></a></div>



    </div>
  

    <?php endwhile; // end of the loop. ?>

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

<?php get_footer(); ?>