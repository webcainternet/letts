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

#input_estado{
  width: 180px;
  border-radius: 4px;
}

#select_estado{
	display: none;
}

#share-button{
	margin-top: 0px !important;
}

</style>
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

		<div style="width: 100%; background-color: #FFFFFF; height: 130px;">
			<div class="related-posts" style="width: 305px; float: left; ">
				<h4 class="related-title" style="border: 0px;margin-left: 25px;margin-top: 10px; margin-bottom: 5px;">Vagas e oportunidades:</h4>

				<div class="post-meta" style="display: inline;">
					<form method="post" action="">
					<div style="float: left; margin-right: 15px; margin-left: 25px;">
						<span class="post-category"><a href="#">Titulo</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 190px; height: 30px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

				    <div style="float: left; margin-right: 15px; margin-top: -1px; margin-left: 25px;">
				      <span class="post-category"><a href="#">Pais</a></span><br>
				      <select class="selectitens" name="pais" id="pais" onchange="SelectPais();">
				        <option>-- Selecione um pais --</option>
							<option value="Afeganistão">Afeganistão</option>
							<option value="África do Sul">África do Sul</option>
							<option value="Albânia">Albânia</option>
							<option value="Alemanha">Alemanha</option>
							<option value="Andorra">Andorra</option>
							<option value="Angola">Angola</option>
							<option value="Antigua e Barbuda">Antigua e Barbuda</option>
							<option value="Arábia Saudita">Arábia Saudita</option>
							<option value="Argélia">Argélia</option>
							<option value="Argentina">Argentina</option>
							<option value="Armênia">Armênia</option>
							<option value="Austrália">Austrália</option>
							<option value="Áustria">Áustria</option>
							<option value="Azerbaijão">Azerbaijão</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Bangladesh">Bangladesh</option>
							<option value="Barbados">Barbados</option>
							<option value="Bahrein">Bahrein</option>
							<option value="Bélgica">Bélgica</option>
							<option value="Belize">Belize</option>
							<option value="Benin">Benin</option>
							<option value="Bielorrússia )">Bielorrússia</option>
							<option value="Bolívia">Bolívia</option>
							<option value="Bósnia Herzegóvina">Bósnia Herzegóvina</option>
							<option value="Botsuana">Botsuana</option>
							<option value="Brasil">Brasil</option>
							<option value="Brunei">Brunei</option>
							<option value="Bulgária">Bulgária</option>
							<option value="Burkina-Fasso">Burkina-Fasso</option>
							<option value="Burundi">Burundi</option>
							<option value="Butão">Butão</option>
							<option value="Cabo Verde">Cabo Verde</option>
							<option value="Camarões">Camarões</option>
							<option value="Camboja">Camboja</option>
							<option value="Canadá">Canadá</option>
							<option value="Catar">Catar</option>
							<option value="Cazaquistão">Cazaquistão</option>
							<option value="Chade">Chade</option>
							<option value="Chile">Chile</option>
							<option value="China">China</option>
							<option value="Chipre">Chipre</option>
							<option value="Cingapura">Cingapura</option>
							<option value="Colômbia">Colômbia</option>
							<option value="Congo">Congo</option>
							<option value="Comores">Comores</option>
							<option value="Coréia do Norte">Coréia do Norte</option>
							<option value="Coréia do Sul">Coréia do Sul</option>
							<option value="Costa do Marfim">Costa do Marfim</option>
							<option value="Costa Rica">Costa Rica</option>
							<option value="Croácia">Croácia</option>
							<option value="Cuba">Cuba</option>
							<option value="Dinamarca">Dinamarca</option>
							<option value="Djibuti">Djibuti</option>
							<option value="Dominica">Dominica</option>
							<option value="Egito">Egito</option>
							<option value="El Salvador">El Salvador</option>
							<option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
							<option value="Equador">Equador</option>
							<option value="Eritréia">Eritréia</option>
							<option value="Escócia">Escócia</option>
							<option value="Eslováquia">Eslováquia</option>
							<option value="Eslovênia">Eslovênia</option>
							<option value="Espanha">Espanha</option>
							<option value="Estados Unidos">Estados Unidos</option>
							<option value="Estônia">Estônia</option>
							<option value="Etiópia">Etiópia</option>
							<option value="Federação Russa">Federação Russa</option>
							<option value="Fiji">Fiji</option>
							<option value="Filipinas">Filipinas</option>
							<option value="Finlândia">Finlândia</option>
							<option value="Formosa )">Formosa )</option>
							<option value="França">França</option>
							<option value="Gabão">Gabão</option>
							<option value="Gâmbia">Gâmbia</option>
							<option value="Gana">Gana</option>
							<option value="Geórgia">Geórgia</option>
							<option value="Grã-Bretanha ">Grã-Bretanha </option>
							<option value="Granada">Granada</option>
							<option value="Grécia">Grécia</option>
							<option value="Groenlândia ">Groenlândia </option>
							<option value="Guatemala">Guatemala</option>
							<option value="Guiana">Guiana</option>
							<option value="Guiana Francesa ">Guiana Francesa </option>
							<option value="Guiné">Guiné</option>
							<option value="Guiné Bissau">Guiné Bissau</option>
							<option value="Guiné Equatorial">Guiné Equatorial</option>
							<option value="Haiti">Haiti</option>
							<option value="Holanda">Holanda</option>
							<option value="Honduras">Honduras</option>
							<option value="Hungria">Hungria</option>
							<option value="Iêmen">Iêmen</option>
							<option value="Ilhas Marshall">Ilhas Marshall</option>
							<option value="Ilhas Salomão">Ilhas Salomão</option>
							<option value="Índia">Índia</option>
							<option value="Indonésia">Indonésia</option>
							<option value="Irã">Irã</option>
							<option value="Iraque">Iraque</option>
							<option value="Irlanda">Irlanda</option>
							<option value="Irlanda do Norte ">Irlanda do Norte </option>
							<option value="Islândia">Islândia</option>
							<option value="Israel">Israel</option>
							<option value="Itália">Itália</option>
							<option value="Jamaica">Jamaica</option>
							<option value="Japão">Japão</option>
							<option value="Jordânia">Jordânia</option>
							<option value="Kiribati">Kiribati</option>
							<option value="Kuweit">Kuweit</option>
							<option value="Laos">Laos</option>
							<option value="Lesoto">Lesoto</option>
							<option value="Letônia">Letônia</option>
							<option value="Líbano">Líbano</option>
							<option value="Libéria">Libéria</option>
							<option value="Líbia">Líbia</option>
							<option value="Liechtenstein">Liechtenstein</option>
							<option value="Lituânia">Lituânia</option>
							<option value="Luxemburgo">Luxemburgo</option>
							<option value="Macedônia">Macedônia</option>
							<option value="Madagascar">Madagascar</option>
							<option value="Malásia">Malásia</option>
							<option value="Malauí">Malauí</option>
							<option value="Maldivas">Maldivas</option>
							<option value="Mali">Mali</option>
							<option value="Malta">Malta</option>
							<option value="Marrocos">Marrocos</option>
							<option value="Maurício">Maurício</option>
							<option value="Mauritânia">Mauritânia</option>
							<option value="México">México</option>
							<option value="Mianmar">Mianmar</option>
							<option value="Micronésia">Micronésia</option>
							<option value="Moçambique">Moçambique</option>
							<option value="Moldávia">Moldávia</option>
							<option value="Mônaco">Mônaco</option>
							<option value="Mongólia">Mongólia</option>
							<option value="Namíbia">Namíbia</option>
							<option value="Nauru">Nauru</option>
							<option value="Nepal">Nepal</option>
							<option value="Nicarágua">Nicarágua</option>
							<option value="Niger">Niger</option>
							<option value="Nigéria">Nigéria</option>
							<option value="Noruega">Noruega</option>
							<option value="Nova Zelândia">Nova Zelândia</option>
							<option value="Omã">Omã</option>
							<option value="Panamá">Panamá</option>
							<option value="Palau">Palau</option>
							<option value="Papua Nova Guiné">Papua Nova Guiné</option>
							<option value="Paquistão">Paquistão</option>
							<option value="Paraguai">Paraguai</option>
							<option value="Peru">Peru</option>
							<option value="Polônia">Polônia</option>
							<option value="Porto Rico ">Porto Rico </option>
							<option value="Portugal">Portugal</option>
							<option value="Quênia">Quênia</option>
							<option value="Quirguistão">Quirguistão</option>
							<option value="Reino Unido">Reino Unido</option>
							<option value="Rep. Centro-Africana">Rep. Centro-Africana</option>
							<option value="Rep. Dominicana">Rep. Dominicana</option>
							<option value="República Tcheca">República Tcheca</option>
							<option value="Romênia">Romênia</option>
							<option value="Ruanda">Ruanda</option>
							<option value="Samoa">Samoa</option>
							<option value="San Marino">San Marino</option>
							<option value="Santa Lúcia">Santa Lúcia</option>
							<option value="São Cristóvão e Névis">São Cristóvão e Névis</option>
							<option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
							<option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
							<option value="Seicheles">Seicheles</option>
							<option value="Senegal">Senegal</option>
							<option value="Serra Leoa">Serra Leoa</option>
							<option value="Sérvia e Montenegro">Sérvia e Montenegro</option>
							<option value="Síria">Síria</option>
							<option value="Somália">Somália</option>
							<option value="Sri Lanka">Sri Lanka</option>
							<option value="Suazilândia">Suazilândia</option>
							<option value="Sudão">Sudão</option>
							<option value="Suécia">Suécia</option>
							<option value="Suíça">Suíça</option>
							<option value="Suriname">Suriname</option>
							<option value="Tadjiquistão">Tadjiquistão</option>
							<option value="Tailândia">Tailândia</option>
							<option value="Tanzânia">Tanzânia</option>
							<option value="Togo">Togo</option>
							<option value="Tonga">Tonga</option>
							<option value="Trinidad e Tobago">Trinidad e Tobago</option>
							<option value="Tunísia">Tunísia</option>
							<option value="Turcomenistão">Turcomenistão</option>
							<option value="Turquia">Turquia</option>
							<option value="Tuvalu">Tuvalu</option>
							<option value="Ucrânia">Ucrânia</option>
							<option value="Uganda">Uganda</option>
							<option value="Uruguai">Uruguai</option>
							<option value="Uzbequistão">Uzbequistão</option>
							<option value="Vanuatu">Vanuatu</option>
							<option value="Vaticano">Vaticano</option>
							<option value="Venezuela">Venezuela</option>
							<option value="Vietnã">Vietnã</option>
							<option value="Zaire ">Zaire </option>
							<option value="Zâmbia">Zâmbia</option>
							<option value="Zimbábue">Zimbábue</option>

			          </select>
				    </div>  

					<div style="float: left; margin-right: 15px; margin-left: 25px; margin-top: 10px;">
						<span class="post-category"><a href="#">Esporte</a></span><br>
						<select class="selectitens" name="esporte">
							<option>-- Selecione --</option>
	                        <option value="Aeromodelismo">Aeromodelismo</option>
	                        <option value="Alpinismo">Alpinismo</option>
	                        <option value="Asa Delta">Asa Delta</option>
	                        <option value="BMX">BMX</option>
	                        <option value="BMX – Free style">BMX – Free style</option>
	                        <option value="Balonismo">Balonismo</option>
	                        <option value="Base Jumping">Base Jumping</option>
	                        <option value="Bodyboard">Bodyboard</option>
	                        <option value="Bouldering">Bouldering</option>
	                        <option value="Bungee Jumping">Bungee Jumping</option>
	                        <option value="Canoagem">Canoagem</option>
	                        <option value="Carveboard">Carveboard</option>
	                        <option value="Caça submarina">Caça submarina</option>
	                        <option value="Ciclismo">Ciclismo</option>
	                        <option value="Cliff Diving">Cliff Diving</option>
	                        <option value="Corrida aventura">Corrida aventura</option>
	                        <option value="Drift">Drift</option>
	                        <option value="Escalada">Escalada</option>
	                        <option value="Esqui">Esqui</option>
	                        <option value="Football Freestyle">Football Freestyle</option>
	                        <option value="Free Style Motocross">Free Style Motocross</option>
	                        <option value="FreeBoard">FreeBoard</option>
	                        <option value="Heli-Skiing">Heli-Skiing</option>
	                        <option value="Highline">Highline</option>
	                        <option value="Jet Ski">Jet Ski</option>
	                        <option value="Kart">Kart</option>
	                        <option value="Kitesurfing">Kitesurfing</option>
	                        <option value="Liquid Mountaineering">Liquid Mountaineering</option>
	                        <option value="Longboard skate">Longboard skate</option>
	                        <option value="Longboard surf">Longboard surf</option>
	                        <option value="Mega ramp">Mega ramp</option>
	                        <option value="Mergulho">Mergulho</option>
	                        <option value="Moto Trial">Moto Trial</option>
	                        <option value="Moto Wheeling">Moto Wheeling</option>
	                        <option value="Motocross">Motocross</option>
	                        <option value="Mountain Bike">Mountain Bike</option>
	                        <option value="Mountain biking">Mountain biking</option>
	                        <option value="Mountain boarding">Mountain boarding</option>
	                        <option value="Off Road/Rally">Off Road/Rally</option>
	                        <option value="Paintball">Paintball</option>
	                        <option value="Paragliding">Paragliding</option>
	                        <option value="Paragliding">Paragliding</option>
	                        <option value="Parapente">Parapente</option>
	                        <option value="Parkour">Parkour</option>
	                        <option value="Patins in Line">Patins in Line</option>
	                        <option value="Psicobloc">Psicobloc</option>
	                        <option value="Rafting">Rafting</option>
	                        <option value="Rally">Rally</option>
	                        <option value="Rapel">Rapel</option>
	                        <option value="Sandboard">Sandboard</option>
	                        <option value="Skate - Street">Skate - Street</option>
	                        <option value="Skate – Free style">Skate – Free style</option>
	                        <option value="Skate – Mini ramp">Skate – Mini ramp</option>
	                        <option value="Sky Surfing">Sky Surfing</option>
	                        <option value="Skydive">Skydive</option>
	                        <option value="Slackline">Slackline</option>
	                        <option value="Snowboard">Snowboard</option>
	                        <option value="Stand Up Paddle">Stand Up Paddle</option>
	                        <option value="Street Luge">Street Luge</option>
	                        <option value="Surf">Surf</option>
	                        <option value="Surf - Freesurf">Surf - Freesurf</option>
	                        <option value="Tow-in">Tow-in</option>
	                        <option value="Trekking">Trekking</option>
	                        <option value="Triathlon">Triathlon</option>
	                        <option value="UFC (MMA">UFC (MMA)</option>
	                        <option value="Vela/Iatismo">Vela/Iatismo</option>
	                        <option value="Velocidade">Velocidade</option>
	                        <option value="Wakeboard">Wakeboard</option>
	                        <option value="Wakeboard Free style">Wakeboard Free style</option>
	                        <option value="Windsurf">Windsurf</option>
	                        <option value="WingWalking">WingWalking</option>
						</select>
					</div>

					<div style="float: left; margin-right: 15px; margin-left: 25px; margin-top: 10px;">
						<span class="post-category"><a href="#">Profissão</a></span><br>
						<select class="selectitens" name="profissao">
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
					</div>

					<div style="float: right; margin-right: 105px;">
						<input type="submit" value="Buscar" style="margin-top: 16px;">
					</div>
					</form>
			</div>
			<?php if ($_SESSION["lettslogin"]) { ?>	
				<div class="bt_vagas">
					<a class="button" href="/cadastrar-vagas/?id_post=<?php echo $_SESSION["lettslogin"]; ?>">Cadastrar Vaga</a>
				</div>

				<?php
					$sql_permalink = mysql_query("SELECT * FROM wp_posts WHERE ID = ".$_SESSION["lettslogin"]);
					while ($row = mysql_fetch_array($sql_permalink, MYSQL_ASSOC)) {
						$body_email = 'http://letts.com.br/'.$row['post_name'];
					}

				 ?>


			<?php } ?>	

<?php include('banner_lateral.php') ?>  


		</div>

<div id="vagas" style="float: left; width: 705px; margin-left: 20px;">

    <?php 
		$args = array(
			'post_type' => 'vagas',
			'post_title_like' => $_POST['nome'],
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'atletaesporte',
					'value' => $_POST['esporte'],
					'compare' => 'LIKE'
				),
				array(
					'key' => 'basicapaisatual',
					'value' => $_POST['pais'],
					'compare' => 'LIKE'
				),
				array(
					'key' => 'basicaestadoatual',
					'value' => $_POST['estado'],
					'compare' => '='
				),				
				array(
					'key' => 'profissao',
					'value' => $_POST['profissao'],
					'compare' => 'LIKE'
				)
			)
		); ?>

	<?php query_posts($args);
    while (have_posts()): the_post(); ?>

    <div class="vaga">
      <div style="margin-top: 0px; color: #666; font-size: 12px;">Data de postagem: <?php echo mysql2date('j/m/Y', $post->post_date); ?></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;"><center><?php the_title(); ?></center></strong></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;"><center><?php print_custom_field('basicacidadeatual'); ?> - <?php print_custom_field('basicaestadoatual'); ?> - <?php print_custom_field('basicapaisatual'); ?>	</center></strong></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Empresa: </strong><br /><?php print_custom_field('empresa'); ?></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Contato: </strong><br /> <?php print_custom_field('basicaemail'); ?></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Descrição: </strong><br /> <?php the_content(); ?></div>
      <div style="margin-top: 10px; color: #666; text-align: right;"><a target="_blank" href="mailto:<?php print_custom_field('basicaemail'); ?>?subject=<?php the_title(); ?>&body=Link do perfil: <?php echo $body_email; ?>"><input type="submit" value="Enviar currículo" style="margin-top: 16px;"></a></div>


<div class="redes_sociais">
<a id="share-button" href="#" title="Facebook Share Button">
	<img src="/wp-content/themes/magazine/images/compartilhar.jpg" alt="Facebook Share Button" title="Facebook Share Button" />
</a>

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-share="false" data-send="true" data-layout="button" data-width="350" data-show-faces="false" data-colorscheme="dark" data-action="like"></div>
</div>

<?php 
	$imagem_fb = 'http://letts.com.br/wp-content/uploads/2014/09/letts-logo.png';
	$texto_fb = strip_tags(get_the_excerpt(120));
?>

<script type="text/javascript">

$('#share-button').click(function (e){
	e.preventDefault();
	FB.ui({
		method: 'feed',
		name: '<?php the_title(); ?>',
		link: '<?php the_permalink(); ?>',
		picture: '<?php echo $imagem_fb; ?>',
		caption: '',
		description: '<?php echo $texto_fb; ?>',
	});
});
</script>

<meta property="og:image" content="<?php echo $imagem_fb; ?>"/>		  


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

	
<?php include('banners.php') ?>  


</div>
<!-- /layout-container -->

<?php get_footer(); ?>

<script type="text/javascript">
function SelectPais(){
	var teste_pais = $('#pais').val();
  if (teste_pais == 'Brasil') {
  	$('#input_estado').hide();
  	$('#select_estado').show();
  }else if (teste_pais != 'Brasil') {
  	$('#input_estado').show();
  	$('#select_estado').hide();
  }
}

$('#select_estado').change(function(){
	var selectestado = $('#select_estado').val();
	$('#input_estado').val(selectestado);
})

</script>