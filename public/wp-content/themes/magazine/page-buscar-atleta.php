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

<?php
function calcula_idade($data_nascimento) {
    $data_nasc = explode('/', $data_nascimento);
    $data = date('d/m/Y');
    $data = explode("/", $data);
    $anos = $data[2] - $data_nasc[2];

    if ($data_nasc[1] >= $data[1]){
        if ($data_nasc[0] <= $data[0]){
            return $anos; break;
        } else {
            return $anos-1;
            break;
        }
    } else {
        return $anos;
    }
}

 ?>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

	<div id="contentwrap" style="width: 100%;padding-top: 0px;">

		<div style="width: 100%; background-color: #FFFFFF; height: 130px;">
			<div class="related-posts" style="height: 125px;">
				<h4 class="related-title" style="border: 0px;margin-left: 25px;margin-top: 10px; margin-bottom: 5px;">Filtrar Atleta:</h4>

				<div class="post-meta" style="display: inline;">
					<form method="post">
					<div style="float: left; margin-right: 15px; margin-left: 25px;">
						<span class="post-category"><a href="#">Nome</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 190px; height: 30px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

					<div style="float: left; margin-right: 15px;">
						<span class="post-category"><a href="#">Esporte</a></span><br>
						<select  class="selectitens" name="esporte">
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
						<span class="post-category"><a href="#">País</a></span><br>
						<select class="selectitens" name="pais">
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


					<div style="float: left; margin-right: 15px;">
						<span class="post-category"><a href="#">Idade</a></span><br>
						<select class="selectitens" name="idade">
						<option>-- Selecione --</option>
						<option value="1">de 15 a 20</option>
						<option value="2">de 21 a 25</option>
						<option value="3">de 26 a 30</option>
						<option value="4">Maior que 31</option>
						</select>
					</div>

					<div style="float: left; margin-right: 15px;">
						<span class="post-category"><a href="#">Sexo</a></span><br>
						<select class="selectitens" name="sexo">
						<option>-- Selecione --</option>
						<option value="Masculino">Masculino</option>
						<option value="Feminino">Feminino</option>
						</select>
					</div>


					<div style="float: left; margin-right: 15px;">
						<input type="submit" value="Buscar" style="margin-top: 16px;">
					</div>
					</form>
			</div>
		</div>



			<div style="float: left; width: 100%; padding-top: 10px;">
				<div class="related-posts" style="float: left; width: 100%; margin-bottom: 30px;">



							<div style="">

<section class="module">
  <section class="wraper">


<?php
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);


$consultapagina = $_GET["pagina"];
if ($consultapagina == "") {
	$consultapagina = 1; $vermaisqtos = 50;
	$result = mysql_query("select id, post_title from wp_posts where post_type = 'atleta' AND post_status = 'publish' ORDER BY rand() LIMIT ".$vermaisqtos);
} else {
	$consultapagina = $consultapagina+1; $vermaisqtos = 50 * $consultapagina;
	$result = mysql_query("select id, post_title from wp_posts where post_type = 'atleta' AND post_status = 'publish' ORDER BY id DESC LIMIT ".$vermaisqtos);
}



$qtositens = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$qtositens = $qtositens + 1;
	$mostra = "";
	$nome = $row["post_title"];
	$idatleta = $row["id"];

	//filtro nome
	if ($_POST["nome"] != "") {
		$mystring = strtoupper($nome);
		$findme   = strtoupper($_POST["nome"]);
		$pos = strpos($mystring, $findme);

		if ($pos === false) {
			$mostra = " style=\"display: none;\" ";
		}
	}

$resultesporte = mysql_query("select meta_value from wp_postmeta where meta_key = 'atletaesporte' AND post_id = ".$row["id"]);
    while ($rowesporte = mysql_fetch_array($resultesporte, MYSQL_ASSOC)) {
    	$esporte = $rowesporte["meta_value"];
    }

   //filtro esporte
	if ($_POST["esporte"] != "-- Selecione --") {
		if ($_POST["esporte"] != "") {
			$mystring = strtoupper($esporte);
			$findme   = strtoupper($_POST["esporte"]);
			$pos = strpos($mystring, $findme);

			if ($pos === false) {
				$mostra = " style=\"display: none;\" ";
			}
		}
	}



	$resultbasicapaisnascimento = mysql_query("select c.name as meta_value from wp_postmeta pm INNER JOIN countries c ON pm.`meta_value` = c.`id` where meta_key = 'basicapaisatual' AND post_id =".$row["id"]);
    while ($rowbasicapaisnascimento = mysql_fetch_array($resultbasicapaisnascimento, MYSQL_ASSOC)) {
    	$basicapaisnascimento = $rowbasicapaisnascimento["meta_value"];
    }
    //filtro pais
	if ($_POST["pais"] != "-- Selecione --") {
		if ($_POST["pais"] != "") {
			$mystring = strtoupper($basicapaisnascimento);
			$findme   = strtoupper($_POST["pais"]);
			$pos = strpos($mystring, $findme);

			if ($pos === false) {
				$mostra = " style=\"display: none;\" ";
			}
		}
	}

	$resultbasicanascimento = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicanascimento' AND post_id = ".$row["id"]);
    while ($rowbasicanascimento = mysql_fetch_array($resultbasicanascimento, MYSQL_ASSOC)) {
    	$data_nasc = $rowbasicanascimento["meta_value"];
    	$anos = calcula_idade($data_nasc);
	}

	$select_idade = $_POST["idade"];
	if ($_POST["idade"]) {
		if ($select_idade == 1) {
			if ($anos < '15' || $anos > '20') {
				$mostra = " style=\"display: none;\" ";
			}
		} else if ($select_idade == 2) {
			if ($anos < 21 || $anos > 25) {
				$mostra = " style=\"display: none;\" ";
			}
		} else if ($select_idade == 3) {
			if ($anos < 26 || $anos > 30) {
				$mostra = " style=\"display: none;\" ";
			}
		} else if ($select_idade == 4) {
			if ($anos < 30) {
				$mostra = " style=\"display: none;\" ";
			}
		}
	}

    $resultbasicagenero = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicagenero' AND post_id = ".$row["id"]);
    while ($rowbasicagenero = mysql_fetch_array($resultbasicagenero, MYSQL_ASSOC)) {
    	$basicagenero = $rowbasicagenero["meta_value"];
    }

    //filtro genero/sexo
	if ($_POST["sexo"] != "-- Selecione --") {
		if ($_POST["sexo"] != "") {
			$mystring = strtoupper($basicagenero);
			$findme   = strtoupper($_POST["sexo"]);
			$pos = strpos($mystring, $findme);

			if ($pos === false) {
				$mostra = " style=\"display: none;\" ";
			}
		}
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

    <figure class='small' <?php echo $mostra; ?> style="border: 0px;">
      <a href="/?p=<?php echo $idatleta; ?>">
      	<div style="width: width: 100%;
      	height: 200px;
      	background-image: url('http://letts.com.br/wp-content/uploads/<?php echo $basicaimagemurl; ?>');
      	background-position: center;
      	<?php echo calcbackgroundsize("wp-content/uploads/".$basicaimagemurl, 300, 200); ?>;
      	">
      		&nbsp;
      	</div>
        <!-- <img src="http://fakeimg.pl/250x250/" alt=""> -->
      </a>
	<style type="text/css">
		.text transition-050 title {
			font-size: 5px;
		}
	</style>
      <figcaption class="transition-050 opacity85">
        <a href="/?p=<?php echo $idatleta; ?>">
	  <strong class="text transition-050 title"><?php echo $nome; $nome = ''; ?>  </strong>
	  <span class="text transition-050 desc"><?php echo $esporte; $esporte = ''; ?><br>
	  <?php if ($anos != "") { ?>
	  <b>Idade: </b><?php echo $anos; $anos = ''; ?><br>
	  <?php } ?>
	  <?php if ($basicapaisnascimento != "") { ?>
	  <b>País: </b><?php echo $basicapaisnascimento; $basicapaisnascimento = ''; ?><br>
	  <?php } ?>
	  <?php if ($basicagenero != "") { ?>
	  <b>Sexo: </b><?php echo $basicagenero; $basicagenero = ''; ?><br>
          <?php } ?>
          </span>
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

<?php if ($qtositens % 50 == 0) { ?>
<div>
	<div style="float: right;">
		<a href="?pagina=<?php echo $consultapagina; ?>"><input type="submit" value="Ver mais" style="margin-top: 16px;"></a>
	</div>
	&nbsp;
</div>
<?php } ?>


						</div>

				</div>


<div style="width: 100%; background-color: #FFFFFF; height: 130px;">

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
