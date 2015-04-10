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

    <div id="content" class="list-post">

      <div style="float: left; width: 100%; padding-top: 10px; margin-bottom: 10px;">
      
      <div style="float: left; width: 17%;"> 
        <h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;" style="font-weight: bold;">Eventos</h1>
      </div>

      <div style="float: right; width: 83%; text-align: right; margin-bottom: 10px;"> 
        
        <div class="post-meta" style="display: inline;">
          <div style="float: left; margin-right: 5px;">
            <form id="formulario" name="form" method="POST" action="/eventos/">
              <span class="post-category" style="margin-right: 102px;"><a href="#">Esporte</a></span><br>
              <select name="esporte" class="selectitens" onchange="ChangeSelect();">
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
            </div>        

          <div style="float: left; margin-right: 5px;">
            <span class="post-category" style="margin-right: 84px;"><a href="#">Profissão</a></span><br>
            <select  class="selectitens" id="profissao" name="profissao" onchange="ChangeSelect();">
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

    <div style="float: left; margin-right: 5px;">
      <span class="post-category" style="margin-right: 125px;"><a href="#">Pais</a></span><br>
      <select class="selectitens" name="pais" onchange="ChangeSelect();">
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

          <div style="float: left; margin-right: 35px;">
            <span class="post-category" style="margin-right: 48px;"><a href="#">Tipo de Evento</a></span><br>
            <select  class="selectitens" id="tipo_evento" name="tipo_evento" onchange="ChangeSelect();">
              <option>-- Selecione --</option>
              <option value="Campeonato">Campeonato</option>
              <option value="Show">Show</option>
              <option value="Festa">Festa</option>
              <option value="Empresário">Outros</option>
                  </select>
          </div>


                       </form>


<div style="float: left; margin-right: 5px; margin-top: 25px;">
        <?php if ($_SESSION["lettslogin"]) { ?> 
        <div class="bt_acessorios bt_acessorios2">
          <a class="button" style="color: #FFF;" href="/cadastrar-evento/?id_post=<?php echo $_SESSION["lettslogin"]; ?>">Cadastrar Evento</a>
        </div>
      <?php } ?>  
 </div>
            </div>
        </div> 
        </div>


        <div style="margin: 0px; padding: 0px;">

          <div style="width: 100%; float: left; height: 1px;"> &nbsp;</div>

    <?php 
    $args = array(
      'post_type' => 'eventos',
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
          'key' => 'profissao',
          'value' => $_POST['profissao'],
          'compare' => 'LIKE'
        ),
        array(
          'key' => 'eventotipo',
          'value' => $_POST['tipo_evento'],
          'compare' => 'LIKE'
        )        
      )
    ); ?>


  <?php query_posts($args);
    while (have_posts()): the_post(); ?>

          <?php $basicaimagemurl = get_custom_field('eventofoto:to_image_src');
            $basicaimagemurl = str_replace("http://letts.com.br/wp-content/uploads/", "", $basicaimagemurl);
           ?>
         <div class="related-posts" style="float: left; width: 312px; margin-left: 20px; margin-right: 20px; margin-bottom: 0px;">
            <a href="<?php the_permalink(); ?>">
              <div class="imgnoticias" style="width: 306px; border-radius: 5px; height: 180px; background-size: 312px; 
              background-position: center;
              background-image: url('<?php print_custom_field('eventofoto:to_image_src'); ?>');
              <?php echo calcbackgroundsize("wp-content/uploads/".$basicaimagemurl, 306, 180); ?>;
              ">

              &nbsp;</div>

            </a>
            <article class="post type-post clearfix">
              <div class="post-content">
                <p class="post-meta">
                  <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                </p>
              </div>
            </article>
          </div>

    <?php endwhile; // end of the loop. ?>


        </div>

      </div>
  </div>
</div>
  <!-- /#contentwrap -->

  

</div>
<!-- /layout-container -->
  
<?php get_footer(); ?>

<script type="text/javascript">
function ChangeSelect(){
  $('#formulario').submit();
}

</script>