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