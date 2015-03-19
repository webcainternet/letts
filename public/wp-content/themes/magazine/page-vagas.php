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
					<form method="post">
					<div style="float: left; margin-right: 15px; margin-left: 25px;">
						<span class="post-category"><a href="#">Titulo</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 190px; height: 30px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

					<div style="float: left; margin-right: 15px; margin-left: 25px;">
						<span class="post-category"><a href="#">Estado</a></span><br>
						<select  class="selectitens" name="esporte">
										<option>-- Selecione --</option>
										<option value="">Acre</option>
						                <option value="">Alagoas</option>
						                <option value="">Amapá</option>
						                <option value="">Amazonas</option>
						                <option value="">Bahia</option>
						                <option value="">Ceará</option>
						                <option value="">Distrito Federal</option>
						                <option value="">Espírito Santo</option>
						                <option value="">Goiás</option>
						                <option value="">Maranhão</option>
						                <option value="">Mato Grosso</option>
						                <option value="">Mato Grosso do Sul</option>
						                <option value="">Minas Gerais</option>
						                <option value="">Pará</option>
						                <option value="">Paraíba</option>
						                <option value="">Paraná</option>
						                <option value="">Pernambuco</option>
						                <option value="">Piauí</option>
						                <option value="">Rio de Janeiro</option>
						                <option value="">Rio Grande do Norte</option>
						                <option value="">Rio Grande do Sul</option>
						                <option value="">Rondônia</option>
						                <option value="">Roraima</option>
						                <option value="">Santa Catarina</option>
						                <option value="">São Paulo</option>
						                <option value="">Sergipe</option>
						                <option value="">Tocantins</option>
									</select>
					</div>

				    <div style="float: left; margin-right: 15px; margin-top: 8px; margin-left: 25px;">
				      <span class="post-category"><a href="#">Pais</a></span><br>
				      <select class="selectitens">
				        <option>-- Selecione --</option>
				        <option value="AF">Afghanistan</option>
				        <option value="AL">Albania</option>
				        <option value="DZ">Algeria</option>
				        <option value="AD">Andorra</option>
				        <option value="AO">Angola</option>
				        <option value="AQ">Antarctica</option>
				        <option value="AG">Antigua and Barbuda</option>
				        <option value="AR">Argentina</option>
				        <option value="AM">Armenia</option>
				        <option value="AW">Aruba</option>
				        <option value="AC">Ascension Island</option>
				        <option value="AU">Australia</option>
				        <option value="AT">Austria</option>
				        <option value="AZ">Azerbaijan</option>
				        <option value="BS">Bahamas</option>
				        <option value="BH">Bahrain</option>
				        <option value="BD">Bangladesh</option>
				        <option value="BB">Barbados</option>
				        <option value="BY">Belarus</option>
				        <option value="BE">Belgium</option>
				        <option value="BZ">Belize</option>
				        <option value="BJ">Benin</option>
				        <option value="BM">Bermuda</option>
				        <option value="BT">Bhutan</option>
				        <option value="BO">Bolivia</option>
				        <option value="BA">Bosnia and Herzegovina</option>
				        <option value="BW">Botswana</option>
				        <option value="BV">Bouvet Island</option>
				        <option value="BR">Brazil</option>
				        <option value="IO">British Indian Ocean Territory</option>
				        <option value="BN">Brunei</option>
				        <option value="BG">Bulgaria</option>
				        <option value="BF">Burkina Faso</option>
				        <option value="BI">Burundi</option>
				        <option value="CV">Cabo Verde</option>
				        <option value="KH">Cambodia</option>
				        <option value="CM">Cameroon</option>
				        <option value="CA">Canada</option>
				        <option value="KY">Cayman Islands</option>
				        <option value="CF">Central African Republic</option>
				        <option value="TD">Chad</option>
				        <option value="CL">Chile</option>
				        <option value="CN">China</option>
				        <option value="CX">Christmas Island</option>
				        <option value="CC">Cocos (Keeling) Islands</option>
				        <option value="CO">Colombia</option>
				        <option value="KM">Comoros</option>
				        <option value="CG">Congo</option>
				        <option value="CD">Congo (DRC)</option>
				        <option value="CK">Cook Islands</option>
				        <option value="CR">Costa Rica</option>
				        <option value="HR">Croatia</option>
				        <option value="CU">Cuba</option>
				        <option value="CY">Cyprus</option>
				        <option value="CZ">Czech Republic</option>
				        <option value="DK">Denmark</option>
				        <option value="DJ">Djibouti</option>
				        <option value="DM">Dominica</option>
				        <option value="DO">Dominican Republic</option>
				        <option value="EC">Ecuador</option>
				        <option value="EG">Egypt</option>
				        <option value="SV">El Salvador</option>
				        <option value="GQ">Equatorial Guinea</option>
				        <option value="ER">Eritrea</option>
				        <option value="EE">Estonia</option>
				        <option value="ET">Ethiopia</option>
				        <option value="FK">Falkland Islands</option>
				        <option value="FO">Faroe Islands</option>
				        <option value="FJ">Fiji Islands</option>
				        <option value="FI">Finland</option>
				        <option value="FR">France</option>
				        <option value="GF">French Guiana</option>
				        <option value="PF">French Polynesia</option>
				        <option value="GA">Gabon</option>
				        <option value="GM">Gambia, The</option>
				        <option value="GE">Georgia</option>
				        <option value="DE">Germany</option>
				        <option value="GH">Ghana</option>
				        <option value="GI">Gibraltar</option>
				        <option value="GR">Greece</option>
				        <option value="GL">Greenland</option>
				        <option value="GD">Grenada</option>
				        <option value="GP">Guadeloupe</option>
				        <option value="GU">Guam</option>
				        <option value="GT">Guatemala</option>
				        <option value="GG">Guernsey</option>
				        <option value="GN">Guinea</option>
				        <option value="GW">Guinea-Bissau</option>
				        <option value="GY">Guyana</option>
				        <option value="HT">Haiti</option>
				        <option value="VA">Holy See (Vatican City)</option>
				        <option value="HN">Honduras</option>
				        <option value="HK">Hong Kong SAR</option>
				        <option value="HU">Hungary</option>
				        <option value="IS">Iceland</option>
				        <option value="IN">India</option>
				        <option value="ID">Indonesia</option>
				        <option value="IR">Iran</option>
				        <option value="IQ">Iraq</option>
				        <option value="IE">Ireland</option>
				        <option value="IM">Isle of Man</option>
				        <option value="IL">Israel</option>
				        <option value="IT">Italy</option>
				        <option value="JM">Jamaica</option>
				        <option value="SJ">Jan Mayen</option>
				        <option value="JP">Japan</option>
				        <option value="JE">Jersey</option>
				        <option value="JO">Jordan</option>
				        <option value="KZ">Kazakhstan</option>
				        <option value="KE">Kenya</option>
				        <option value="KI">Kiribati</option>
				        <option value="KR">Korea</option>
				        <option value="KW">Kuwait</option>
				        <option value="KG">Kyrgyzstan</option>
				        <option value="LA">Laos</option>
				        <option value="LV">Latvia</option>
				        <option value="LB">Lebanon</option>
				        <option value="LS">Lesotho</option>
				        <option value="LR">Liberia</option>
				        <option value="LY">Libya</option>
				        <option value="LI">Liechtenstein</option>
				        <option value="LT">Lithuania</option>
				        <option value="LU">Luxembourg</option>
				        <option value="MO">Macao SAR</option>
				        <option value="MK">Macedonia, Former Yugoslav Republic of</option>
				        <option value="MG">Madagascar</option>
				        <option value="MW">Malawi</option>
				        <option value="MY">Malaysia</option>
				        <option value="MV">Maldives</option>
				        <option value="ML">Mali</option>
				        <option value="MT">Malta</option>
				        <option value="MH">Marshall Islands</option>
				        <option value="MQ">Martinique</option>
				        <option value="MR">Mauritania</option>
				        <option value="MU">Mauritius</option>
				        <option value="YT">Mayotte</option>
				        <option value="MX">Mexico</option>
				        <option value="FM">Micronesia</option>
				        <option value="MD">Moldova</option>
				        <option value="MC">Monaco</option>
				        <option value="MN">Mongolia</option>
				        <option value="ME">Montenegro</option>
				        <option value="MS">Montserrat</option>
				        <option value="MA">Morocco</option>
				        <option value="MZ">Mozambique</option>
				        <option value="MM">Myanmar</option>
				        <option value="NA">Namibia</option>
				        <option value="NR">Nauru</option>
				        <option value="NP">Nepal</option>
				        <option value="NL">Netherlands</option>
				        <option value="AN">Netherlands Antilles (Former)</option>
				        <option value="NC">New Caledonia</option>
				        <option value="NZ">New Zealand</option>
				        <option value="NI">Nicaragua</option>
				        <option value="NE">Niger</option>
				        <option value="NG">Nigeria</option>
				        <option value="NU">Niue</option>
				        <option value="KP">North Korea</option>
				        <option value="MP">Northern Mariana Islands</option>
				        <option value="NO">Norway</option>
				        <option value="OM">Oman</option>
				        <option value="PK">Pakistan</option>
				        <option value="PW">Palau</option>
				        <option value="PS_0">Palestinian Authority</option>
				        <option value="PS">Palestinian Authority</option>
				        <option value="PA">Panama</option>
				        <option value="PG">Papua New Guinea</option>
				        <option value="PY">Paraguay</option>
				        <option value="PE">Peru</option>
				        <option value="PH">Philippines</option>
				        <option value="PL">Poland</option>
				        <option value="PT">Portugal</option>
				        <option value="QA">Qatar</option>
				        <option value="CI">Republic of Côte d'Ivoire</option>
				        <option value="RE">Reunion</option>
				        <option value="RO">Romania</option>
				        <option value="RU">Russia</option>
				        <option value="RW">Rwanda</option>
				        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
				        <option value="WS">Samoa</option>
				        <option value="SM">San Marino</option>
				        <option value="ST">São Tomé and Príncipe</option>
				        <option value="SA">Saudi Arabia</option>
				        <option value="SN">Senegal</option>
				        <option value="RS">Serbia</option>
				        <option value="SC">Seychelles</option>
				        <option value="SL">Sierra Leone</option>
				        <option value="SG">Singapore</option>
				        <option value="SK">Slovakia</option>
				        <option value="SI">Slovenia</option>
				        <option value="SB">Solomon Islands</option>
				        <option value="SO">Somalia</option>
				        <option value="ZA">South Africa</option>
				        <option value="ES">Spain</option>
				        <option value="LK">Sri Lanka</option>
				        <option value="KN">St. Kitts and Nevis</option>
				        <option value="LC">St. Lucia</option>
				        <option value="PM">St. Pierre and Miquelon</option>
				        <option value="VC">St. Vincent and the Grenadines</option>
				        <option value="SD">Sudan</option>
				        <option value="SR">Suriname</option>
				        <option value="SZ">Swaziland</option>
				        <option value="SE">Sweden</option>
				        <option value="CH">Switzerland</option>
				        <option value="SY">Syria</option>
				        <option value="TW">Taiwan</option>
				        <option value="TJ">Tajikistan</option>
				        <option value="TZ">Tanzania</option>
				        <option value="TH">Thailand</option>
				        <option value="TL">Timor-Leste</option>
				        <option value="TG">Togo</option>
				        <option value="TK">Tokelau</option>
				        <option value="TO">Tonga</option>
				        <option value="TT">Trinidad and Tobago</option>
				        <option value="TA">Tristan da Cunha</option>
				        <option value="TN">Tunisia</option>
				        <option value="TR">Turkey</option>
				        <option value="TM">Turkmenistan</option>
				        <option value="TC">Turks and Caicos Islands</option>
				        <option value="TV">Tuvalu</option>
				        <option value="UG">Uganda</option>
				        <option value="UA">Ukraine</option>
				        <option value="AE">United Arab Emirates</option>
				        <option value="UK">United Kingdom</option>
				        <option value="US">United States</option>
				        <option value="UM">United States Minor Outlying Islands</option>
				        <option value="UY">Uruguay</option>
				        <option value="UZ">Uzbekistan</option>
				        <option value="VU">Vanuatu</option>
				        <option value="VE">Venezuela</option>
				        <option value="VN">Vietnam</option>
				        <option value="VG">Virgin Islands, British</option>
				        <option value="VI">Virgin Islands, U.S.</option>
				        <option value="WF">Wallis and Futuna</option>
				        <option value="YE">Yemen</option>
				        <option value="ZM">Zambia</option>
				        <option value="ZW">Zimbabwe</option>
				        </select>
				    </div>  

					<div style="float: left; margin-right: 15px; margin-left: 25px; margin-top: 10px;">
						<span class="post-category"><a href="#">Esporte</a></span><br>
						<select class="selectitens" name="sexo">
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
			<?php if ($_SESSION["lettslogin"]) { ?>	
				<div class="bt_vagas">
					<a class="button" href="/cadastrar-vagas/?id_post=<?php echo $_SESSION["lettslogin"]; ?>">Cadastrar Vaga</a>
				</div>
			<?php } ?>	

		</div>



<div id="vagas" style="float: left; width: 705px; margin-left: 20px;">

    <?php query_posts('post_type=vagas');
    while (have_posts()): the_post(); ?>


    <div class="vaga">
      <div style="margin-top: 0px; color: #666; font-size: 12px;">Data de postagem: <?php echo mysql2date('j/m/Y', $post->post_date); ?></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;"><center><?php the_title(); ?></center></strong></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;"><center><?php print_custom_field('basicacidadeatual'); ?> - <?php print_custom_field('basicaestadoatual'); ?></center></strong></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Empresa: </strong><br /><?php print_custom_field('empresa'); ?></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Contato: </strong><br /> <?php print_custom_field('basicaemail'); ?></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Descrição: </strong><br /> <?php the_content(); ?></div>
      <div style="margin-top: 10px; color: #666; text-align: right;"><a href="mailto:<?php print_custom_field('basicaemail'); ?>?subject=<?php the_title(); ?>"><input type="submit" value="Enviar currículo" style="margin-top: 16px;"></a></div>

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