<style type="text/css">
	.classificados {
		float: left;
		width: 232px;
		margin-left: 0px;
		margin-bottom: 20px;
		border: solid 1px #FFFFFF;
		padding: 15px;
	}
	.classificados:hover {
		border: solid 1px #BBBBBB;
	}
	.selectitens{
	  width: 132px !important;
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

			<?php if ($_SESSION["lettslogin"]) { ?>	
				<div class="bt_acessorios">
					<a class="button" href="/cadastrar-acessorios/?id_post=<?php echo $_SESSION["lettslogin"]; ?>">Cadastrar Acessório</a>
				</div>
			<?php } ?>			

				<div class="post-meta" style="display: inline;">
					<form method="post">
					<div style="float: left; margin-right: -5px; margin-left: 25px;">
						<span class="post-category"><a href="#">Titulo</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 160px; height: 32px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

					<div style="float: left; margin-right: 10px;">
						<span class="post-category"><a href="#">Estado</a></span><br>
						<select  class="selectitens" name="esporte">
										<option>-- Selecione --</option>
										<option>Novo</option>
										<option>Usado</option>
									</select>
					</div>


					<div style="float: left; margin-right: 0px;">
						<span class="post-category"><a href="#">De: R$</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 100px; height: 32px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>


					<div style="float: left; margin-right: 0px;">
						<span class="post-category"><a href="#">Até: R$</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 100px; height: 32px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

					<div style="float: left; margin-right: 10px;">
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

          <div style="float: left; margin-right: 10px;">
            <span class="post-category"><a href="#">Profissão</a></span><br>
            <select  class="selectitens" name="profissao">
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

		<div style="float: left; margin-right: 10px;">
			<span class="post-category"><a href="#">Pais</a></span><br>
			<select class="selectitens">
				<option>-- Selecione --</option>
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

					<div style="float: left; margin-right: 15px; margin-top: -3px;">
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
		) AS ttelefone ON `ttelefone`.`post_id` = `login`.`post_id` 
			WHERE `p`.`post_status` = 'publish'
			ORDER BY `p`.`post_date` DESC");
	?>

  	<?php while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
  		<?php 
   			$data_acessorio = explode(" ", $row["post_data"]);
  			$data_acessorio = explode("-", $data_acessorio[0]);
  			$data_acessorio = $data_acessorio[2]."-".$data_acessorio[1]."-".$data_acessorio[0];
  		?>

  	<div class="related-posts classificados">


	        <div style="text-align: left;">
	          <span style="background-color: #FFF; color: #7A8B8B; width: 100px; font-size: 14px;
	          font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;">Anunciado: <?php echo $data_acessorio; ?></span>
	        </div>
	        <a href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox scroll">

			<?php 
				$attachment_id = $row["idfoto"];

				$image_attributes = wp_get_attachment_image_src($attachment_id); ?>
					 
	        	<figure class="small" style="border: 0px; width: 100%;">
	        	<?php if($image_attributes) { ?>	
			      <a href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox scroll">
			      	<div style="width: width: 100%; 
			      	height: 200px; 
			      	background-image: url('<?php echo $image_attributes[0]; ?>');
			      	background-position: center;
			      	background-size: 234px;
			      	background-repeat: no-repeat;
			      	"></div>
			      </a>
			      <?php }else{ ?>
			      <a href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox scroll">
			      	<div style="width: 100%;
							  height: 100px;
							  padding-top: 100px;
							  text-align: center;
			      	">Produto sem imagem</div>
			      </a>
			      <?php } ?>

			      <figcaption class="transition-050 opacity85">
			        <a href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox scroll">
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
	                <a style="color: #444;" href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox scroll"><?php echo $row["title"]; ?></a></span>
	            </p>
	          </div>
	        </article>

	        <div style="float: right; margin-right: 0px;margin-top: 0px; margin-bottom: 0px;">
				<a href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox button">R$ <?php echo $row["valor"]; ?></a>
			</div>

  	</div>

  	<?php } ?>
	  </section>
	</section>
			</div>


						</div>

				</div>

		</div>

			<?php include('banners.php') ?>

	</div>
</div>
	<!-- /#contentwrap -->

	

</div>
<!-- /layout-container -->

<?php get_footer(); ?>

<script type="text/javascript">
$(".scroll").click(function() {
    $('html, body').animate({
        scrollTop: $("#pagewrap").offset().top
    }, 300);
});


</script>