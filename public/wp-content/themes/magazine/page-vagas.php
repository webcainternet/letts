<meta property="og:image" content="http://letts.com.br/wp-content/uploads/2014/09/letts-logo.png" />

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
					<form method="post" action="">
					<div style="float: left; margin-right: 15px; margin-left: 25px;">
						<span class="post-category"><a href="#">Titulo</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 190px; height: 30px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

					<div style="float: left; margin-right: 15px; margin-left: 25px;">
						<span class="post-category"><a href="#">Estado</a></span><br>
						<select  class="selectitens" name="estado">
										<option>-- Selecione --</option>
										<option>Acre</option>
						                <option>Alagoas</option>
						                <option>Amapá</option>
						                <option>Amazonas</option>
						                <option>Bahia</option>
						                <option>Ceará</option>
						                <option>Distrito Federal</option>
						                <option>Espírito Santo</option>
						                <option>Goiás</option>
						                <option>Maranhão</option>
						                <option>Mato Grosso</option>
						                <option>Mato Grosso do Sul</option>
						                <option>Minas Gerais</option>
						                <option>Pará</option>
						                <option>Paraíba</option>
						                <option>Paraná</option>
						                <option>Pernambuco</option>
						                <option>Piauí</option>
						                <option>Rio de Janeiro</option>
						                <option>Rio Grande do Norte</option>
						                <option>Rio Grande do Sul</option>
						                <option>Rondônia</option>
						                <option>Roraima</option>
						                <option>Santa Catarina</option>
						                <option>São Paulo</option>
						                <option>Sergipe</option>
						                <option>Tocantins</option>
									</select>
					</div>

				    <div style="float: left; margin-right: 15px; margin-top: 8px; margin-left: 25px;">
				      <span class="post-category"><a href="#">Pais</a></span><br>
				      <select class="selectitens" name="pais">
				        <option>-- Selecione um pais --</option>
			              <option value="Afeganistão">Afeganistão</option>
			              <option value="África do Sul">África do Sul</option>
			              <option value="Akrotiri">Akrotiri</option>
			              <option value="Albânia">Albânia</option>
			              <option value="Alemanha">Alemanha</option>
			              <option value="Andorra">Andorra</option>
			              <option value="Angola">Angola</option>
			              <option value="Anguila">Anguila</option>
			              <option value="Antárctida">Antárctida</option>
			              <option value="Antígua e Barbuda">Antígua e Barbuda</option>
			              <option value="Antilhas Neerlandesas">Antilhas Neerlandesas</option>
			              <option value="Arábia Saudita">Arábia Saudita</option>
			              <option value="Arctic Ocean">Arctic Ocean</option>
			              <option value="Argélia">Argélia</option>
			              <option value="Argentina">Argentina</option>
			              <option value="Arménia">Arménia</option>
			              <option value="Aruba">Aruba</option>
			              <option value="Ashmore and Cartier Islands">Ashmore and Cartier Islands</option>
			              <option value="Atlantic Ocean">Atlantic Ocean</option>
			              <option value="Austrália">Austrália</option>
			              <option value="Áustria">Áustria</option>
			              <option value="Azerbaijão">Azerbaijão</option>
			              <option value="Baamas">Baamas</option>
			              <option value="Bangladeche">Bangladeche</option>
			              <option value="Barbados">Barbados</option>
			              <option value="Barém">Barém</option>
			              <option value="Bélgica">Bélgica</option>
			              <option value="Belize">Belize</option>
			              <option value="Benim">Benim</option>
			              <option value="Bermudas">Bermudas</option>
			              <option value="Bielorrússia">Bielorrússia</option>
			              <option value="Birmânia">Birmânia</option>
			              <option value="Bolívia">Bolívia</option>
			              <option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
			              <option value="Botsuana">Botsuana</option>
			              <option value="Brasil">Brasil</option>
			              <option value="Brunei">Brunei</option>
			              <option value="Bulgária">Bulgária</option>
			              <option value="Burquina Faso">Burquina Faso</option>
			              <option value="Burúndi">Burúndi</option>
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
			              <option value="Clipperton Island">Clipperton Island</option>
			              <option value="Colômbia">Colômbia</option>
			              <option value="Comores">Comores</option>
			              <option value="Congo-Brazzaville">Congo-Brazzaville</option>
			              <option value="Congo-Kinshasa">Congo-Kinshasa</option>
			              <option value="Coral Sea Islands">Coral Sea Islands</option>
			              <option value="Coreia do Norte">Coreia do Norte</option>
			              <option value="Coreia do Sul">Coreia do Sul</option>
			              <option value="Costa do Marfim">Costa do Marfim</option>
			              <option value="Costa Rica">Costa Rica</option>
			              <option value="Croácia">Croácia</option>
			              <option value="Cuba">Cuba</option>
			              <option value="Dhekelia">Dhekelia</option>
			              <option value="Dinamarca">Dinamarca</option>
			              <option value="Domínica">Domínica</option>
			              <option value="Egipto">Egipto</option>
			              <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
			              <option value="Equador">Equador</option>
			              <option value="Eritreia">Eritreia</option>
			              <option value="Eslováquia">Eslováquia</option>
			              <option value="Eslovénia">Eslovénia</option>
			              <option value="Espanha">Espanha</option>
			              <option value="Estados Unidos">Estados Unidos</option>
			              <option value="Estónia">Estónia</option>
			              <option value="Etiópia">Etiópia</option>
			              <option value="Faroé">Faroé</option>
			              <option value="Fiji">Fiji</option>
			              <option value="Filipinas">Filipinas</option>
			              <option value="Finlândia">Finlândia</option>
			              <option value="França">França</option>
			              <option value="Gabão">Gabão</option>
			              <option value="Gâmbia">Gâmbia</option>
			              <option value="Gana">Gana</option>
			              <option value="Gaza Strip">Gaza Strip</option>
			              <option value="Geórgia">Geórgia</option>
			              <option value="Geórgia do Sul e Sandwich do Sul">Geórgia do Sul e Sandwich do Sul</option>
			              <option value="Gibraltar">Gibraltar</option>
			              <option value="Granada">Granada</option>
			              <option value="Grécia">Grécia</option>
			              <option value="Gronelândia">Gronelândia</option>
			              <option value="Guame">Guame</option>
			              <option value="Guatemala">Guatemala</option>
			              <option value="Guernsey">Guernsey</option>
			              <option value="Guiana">Guiana</option>
			              <option value="Guiné">Guiné</option>
			              <option value="Guiné Equatorial">Guiné Equatorial</option>
			              <option value="Guiné-Bissau">Guiné-Bissau</option>
			              <option value="Haiti">Haiti</option>
			              <option value="Honduras">Honduras</option>
			              <option value="Hong Kong">Hong Kong</option>
			              <option value="Hungria">Hungria</option>
			              <option value="Iémen">Iémen</option>
			              <option value="Ilha Bouvet">Ilha Bouvet</option>
			              <option value="Ilha do Natal">Ilha do Natal</option>
			              <option value="Ilha Norfolk">Ilha Norfolk</option>
			              <option value="Ilhas Caimão">Ilhas Caimão</option>
			              <option value="Ilhas Cook">Ilhas Cook</option>
			              <option value="Ilhas dos Cocos">Ilhas dos Cocos</option>
			              <option value="Ilhas Falkland">Ilhas Falkland</option>
			              <option value="Ilhas Heard e McDonald">Ilhas Heard e McDonald</option>
			              <option value="Ilhas Marshall">Ilhas Marshall</option>
			              <option value="Ilhas Salomão">Ilhas Salomão</option>
			              <option value="Ilhas Turcas e Caicos">Ilhas Turcas e Caicos</option>
			              <option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
			              <option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
			              <option value="Índia">Índia</option>
			              <option value="Indian Ocean">Indian Ocean</option>
			              <option value="Indonésia">Indonésia</option>
			              <option value="Irão">Irão</option>
			              <option value="Iraque">Iraque</option>
			              <option value="Irlanda">Irlanda</option>
			              <option value="Islândia">Islândia</option>
			              <option value="Israel">Israel</option>
			              <option value="Itália">Itália</option>
			              <option value="Jamaica">Jamaica</option>
			              <option value="Jan Mayen">Jan Mayen</option>
			              <option value="Japão">Japão</option>
			              <option value="Jersey">Jersey</option>
			              <option value="Jibuti">Jibuti</option>
			              <option value="Jordânia">Jordânia</option>
			              <option value="Kuwait">Kuwait</option>
			              <option value="Laos">Laos</option>
			              <option value="Lesoto">Lesoto</option>
			              <option value="Letónia">Letónia</option>
			              <option value="Líbano">Líbano</option>
			              <option value="Libéria">Libéria</option>
			              <option value="Líbia">Líbia</option>
			              <option value="Listenstaine">Listenstaine</option>
			              <option value="Lituânia">Lituânia</option>
			              <option value="Luxemburgo">Luxemburgo</option>
			              <option value="Macau">Macau</option>
			              <option value="Macedónia">Macedónia</option>
			              <option value="Madagáscar">Madagáscar</option>
			              <option value="Malásia">Malásia</option>
			              <option value="Malávi">Malávi</option>
			              <option value="Maldivas">Maldivas</option>
			              <option value="Mali">Mali</option>
			              <option value="Malta">Malta</option>
			              <option value="Man, Isle of">Man, Isle of</option>
			              <option value="Marianas do Norte">Marianas do Norte</option>
			              <option value="Marrocos">Marrocos</option>
			              <option value="Maurícia">Maurícia</option>
			              <option value="Mauritânia">Mauritânia</option>
			              <option value="Mayotte">Mayotte</option>
			              <option value="México">México</option>
			              <option value="Micronésia">Micronésia</option>
			              <option value="Moçambique">Moçambique</option>
			              <option value="Moldávia">Moldávia</option>
			              <option value="Mónaco">Mónaco</option>
			              <option value="Mongólia">Mongólia</option>
			              <option value="Monserrate">Monserrate</option>
			              <option value="Montenegro">Montenegro</option>
			              <option value="Mundo">Mundo</option>
			              <option value="Namíbia">Namíbia</option>
			              <option value="Nauru">Nauru</option>
			              <option value="Navassa Island">Navassa Island</option>
			              <option value="Nepal">Nepal</option>
			              <option value="Nicarágua">Nicarágua</option>
			              <option value="Níger">Níger</option>
			              <option value="Nigéria">Nigéria</option>
			              <option value="Niue">Niue</option>
			              <option value="Noruega">Noruega</option>
			              <option value="Nova Caledónia">Nova Caledónia</option>
			              <option value="Nova Zelândia">Nova Zelândia</option>
			              <option value="Omã">Omã</option>
			              <option value="Pacific Ocean">Pacific Ocean</option>
			              <option value="Países Baixos">Países Baixos</option>
			              <option value="Palau">Palau</option>
			              <option value="Panamá">Panamá</option>
			              <option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
			              <option value="Paquistão">Paquistão</option>
			              <option value="Paracel Islands">Paracel Islands</option>
			              <option value="Paraguai">Paraguai</option>
			              <option value="Peru">Peru</option>
			              <option value="Pitcairn">Pitcairn</option>
			              <option value="Polinésia Francesa">Polinésia Francesa</option>
			              <option value="Polónia">Polónia</option>
			              <option value="Porto Rico">Porto Rico</option>
			              <option value="Portugal">Portugal</option>
			              <option value="Quénia">Quénia</option>
			              <option value="Quirguizistão">Quirguizistão</option>
			              <option value="Quiribáti">Quiribáti</option>
			              <option value="Reino Unido">Reino Unido</option>
			              <option value="República Centro-Africana">República Centro-Africana</option>
			              <option value="República Checa">República Checa</option>
			              <option value="República Dominicana">República Dominicana</option>
			              <option value="Roménia">Roménia</option>
			              <option value="Ruanda">Ruanda</option>
			              <option value="Rússia">Rússia</option>
			              <option value="Salvador">Salvador</option>
			              <option value="Samoa">Samoa</option>
			              <option value="Samoa Americana">Samoa Americana</option>
			              <option value="Santa Helena">Santa Helena</option>
			              <option value="Santa Lúcia">Santa Lúcia</option>
			              <option value="São Cristóvão e Neves">São Cristóvão e Neves</option>
			              <option value="São Marinho">São Marinho</option>
			              <option value="São Pedro e Miquelon">São Pedro e Miquelon</option>
			              <option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
			              <option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
			              <option value="Sara Ocidental">Sara Ocidental</option>
			              <option value="Seicheles">Seicheles</option>
			              <option value="Senegal">Senegal</option>
			              <option value="Serra Leoa">Serra Leoa</option>
			              <option value="Sérvia">Sérvia</option>
			              <option value="Singapura">Singapura</option>
			              <option value="Síria">Síria</option>
			              <option value="Somália">Somália</option>
			              <option value="Southern Ocean">Southern Ocean</option>
			              <option value="Spratly Islands">Spratly Islands</option>
			              <option value="Sri Lanca">Sri Lanca</option>
			              <option value="Suazilândia">Suazilândia</option>
			              <option value="Sudão">Sudão</option>
			              <option value="Suécia">Suécia</option>
			              <option value="Suíça">Suíça</option>
			              <option value="Suriname">Suriname</option>
			              <option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
			              <option value="Tailândia">Tailândia</option>
			              <option value="Taiwan">Taiwan</option>
			              <option value="Tajiquistão">Tajiquistão</option>
			              <option value="Tanzânia">Tanzânia</option>
			              <option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
			              <option value="Territórios Austrais Franceses">Territórios Austrais Franceses</option>
			              <option value="Timor Leste">Timor Leste</option>
			              <option value="Togo">Togo</option>
			              <option value="Tokelau">Tokelau</option>
			              <option value="Tonga">Tonga</option>
			              <option value="Trindade e Tobago">Trindade e Tobago</option>
			              <option value="Tunísia">Tunísia</option>
			              <option value="Turquemenistão">Turquemenistão</option>
			              <option value="Turquia">Turquia</option>
			              <option value="Tuvalu">Tuvalu</option>
			              <option value="Ucrânia">Ucrânia</option>
			              <option value="Uganda">Uganda</option>
			              <option value="União Europeia">União Europeia</option>
			              <option value="Uruguai">Uruguai</option>
			              <option value="Usbequistão">Usbequistão</option>
			              <option value="Vanuatu">Vanuatu</option>
			              <option value="Vaticano">Vaticano</option>
			              <option value="Venezuela">Venezuela</option>
			              <option value="Vietname">Vietname</option>
			              <option value="Wake Island">Wake Island</option>
			              <option value="Wallis e Futuna">Wallis e Futuna</option>
			              <option value="West Bank">West Bank</option>
			              <option value="Zâmbia">Zâmbia</option>
			              <option value="Zimbabué">Zimbabué</option>
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
			<?php if ($_SESSION["lettslogin"]) { ?>	
				<div class="bt_vagas">
					<a class="button" href="/cadastrar-vagas/?id_post=<?php echo $_SESSION["lettslogin"]; ?>">Cadastrar Vaga</a>
				</div>

				<?php $body_email = 'http://letts.com.br/?p='.$_SESSION["lettslogin"]; ?>

			<?php } ?>	

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
					'key' => 'basicaestadoatual',
					'value' => $_POST['estado'],
					'compare' => 'LIKE'
				),
				array(
					'key' => 'basicapaisatual',
					'value' => $_POST['pais'],
					'compare' => 'LIKE'
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
      <div style="margin-top: 10px; color: #666; text-align: right;"><a href="mailto:<?php print_custom_field('basicaemail'); ?>?subject=<?php the_title(); ?>&body=Link do perfil: <?php echo $body_email; ?>"><input type="submit" value="Enviar currículo" style="margin-top: 16px;"></a></div>

	  <div class="fb-like" style="margin-top: 30px;" data-href="<?php the_permalink(); ?>" data-width="100%" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>

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