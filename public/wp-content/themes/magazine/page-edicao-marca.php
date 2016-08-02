<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>


<style type="text/css">
input[type=text], input[type=search], input[type=email] {
  width: 340px;
  max-width: 90%;
}
textarea {
    line-height: 150%;
    width: 100%;
}
.textwidget.icones_sociais {
    margin-top: -30px;
}
  #salvaform {
    background: #ff8920 !important;
    color: #fff;
    border: none;
    padding: 7px 20px;
    cursor: pointer;
    letter-spacing: .1em;
    font-size: 1.125em;
    font-family: Oswald, sans-serif;
    text-transform: uppercase;
    -webkit-appearance: none;
    -webkit-border-radius: 0;
    }
  }
</style>

<script>
$(document).ready(function(){
  $("#salvaform").on("click", function(){
    if ($( "#basicaddi" ).val() == "" && $( "#telefone" ).val() != "" ) {
      alert( "Você deve preencher no campo telefone o código do país!" );
      $( "#basicaddi" ).focus();
    } else {
      $( "#new_post" ).submit();
    }

  });
});
</script>

<?php
/** Themify Default Variables
 *  @var object */
global $themify; ?>
  <?php
    query_posts( array('p' => $_GET['id_post'], 'post_type' => 'marca') );
    while ( have_posts() ) : the_post();
  ?>

<div id="layout" class="pagewidth clearfix">



	<div class="img_marcas imagem_editar_capa" style="background: url('<?php print_custom_field('basicaimagem:to_image_src'); ?>') no-repeat;">
	</div>
  <div style="background-color: #EEE; height: 164px; position: absolute; width: 1064px; z-index: -1;">&nbsp;</div>

	<?php if (get_custom_field('logo:to_image_src')	) { ?>
		<div class="logo_marcas imagem_editar" style="background: url('<?php print_custom_field('logo:to_image_src'); ?>') no-repeat; margin-right: 15px; margin-top: -55px; margin-left: 10px;">
		</div>
	<?php } ?>

<form id="new_post" name="new_post" method="post" action="<?php the_permalink(); ?>" enctype="multipart/form-data">
	<p id="sucesso">Dados alterados com sucesso.</p>
	<div style="float: left; margin: 15px 0px; width: 420px;">

    <div style="margin-top: 0px;"><strong>Nome da marca</strong></div>
		<input type="text" name="titulo" value="<?php the_title(); ?>">


                                <div style="margin-top: 10px;"><strong>Telefone</strong></div>

                                <?php $dataddi = get_custom_field('basicaddi'); ?>
                                <select style="float: left; width: 120px; margin-right: 5px;" name="basicaddi" id="basicaddi">
                                <option value="">-- Selecione --</option>
                                <option value="Afeganistão (+93)" <?php if ($dataddi == 'Afeganistão (+93)') { echo 'selected="selected"'; } ?>>Afeganistão (+93)</option>
                                <option value="África do Sul (+27)" <?php if ($dataddi == 'África do Sul (+27)') { echo 'selected="selected"'; } ?>>África do Sul (+27)</option>
                                <option value="Albânia (+355)" <?php if ($dataddi == 'Albânia (+355)') { echo 'selected="selected"'; } ?>>Albânia (+355)</option>
                                <option value="Alemanha (+49)" <?php if ($dataddi == 'Alemanha (+49)') { echo 'selected="selected"'; } ?>>Alemanha (+49)</option>
                                <option value="Andorra (+376)" <?php if ($dataddi == 'Andorra (+376)') { echo 'selected="selected"'; } ?>>Andorra (+376)</option>
                                <option value="Angola (+244)" <?php if ($dataddi == 'Angola (+244)') { echo 'selected="selected"'; } ?>>Angola (+244)</option>
                                <option value="Anguila (+1)" <?php if ($dataddi == 'Anguila (+1)') { echo 'selected="selected"'; } ?>>Anguila (+1)</option>
                                <option value="Antígua e Barbuda (+1)" <?php if ($dataddi == 'Antígua e Barbuda (+1)') { echo 'selected="selected"'; } ?>>Antígua e Barbuda (+1)</option>
                                <option value="Arábia Saudita (+966)" <?php if ($dataddi == 'Arábia Saudita (+966)') { echo 'selected="selected"'; } ?>>Arábia Saudita (+966)</option>
                                <option value="Argélia (+213)" <?php if ($dataddi == 'Argélia (+213)') { echo 'selected="selected"'; } ?>>Argélia (+213)</option>
                                <option value="Argentina (+54)" <?php if ($dataddi == 'Argentina (+54)') { echo 'selected="selected"'; } ?>>Argentina (+54)</option>
                                <option value="Armênia (+374)" <?php if ($dataddi == 'Armênia (+374)') { echo 'selected="selected"'; } ?>>Armênia (+374)</option>
                                <option value="Aruba (+297)" <?php if ($dataddi == 'Aruba (+297)') { echo 'selected="selected"'; } ?>>Aruba (+297)</option>
                                <option value="Ascensão (+247)" <?php if ($dataddi == 'Ascensão (+247)') { echo 'selected="selected"'; } ?>>Ascensão (+247)</option>
                                <option value="Austrália (+61)" <?php if ($dataddi == 'Austrália (+61)') { echo 'selected="selected"'; } ?>>Austrália (+61)</option>
                                <option value="Áustria (+43)" <?php if ($dataddi == 'Áustria (+43)') { echo 'selected="selected"'; } ?>>Áustria (+43)</option>
                                <option value="Azerbaijão (+994)" <?php if ($dataddi == 'Azerbaijão (+994)') { echo 'selected="selected"'; } ?>>Azerbaijão (+994)</option>
                                <option value="Bahamas (+1)" <?php if ($dataddi == 'Bahamas (+1)') { echo 'selected="selected"'; } ?>>Bahamas (+1)</option>
                                <option value="Bahrein (+973)" <?php if ($dataddi == 'Bahrein (+973)') { echo 'selected="selected"'; } ?>>Bahrein (+973)</option>
                                <option value="Bangladesh (+880)" <?php if ($dataddi == 'Bangladesh (+880)') { echo 'selected="selected"'; } ?>>Bangladesh (+880)</option>
                                <option value="Barbados (+1)" <?php if ($dataddi == 'Barbados (+1)') { echo 'selected="selected"'; } ?>>Barbados (+1)</option>
                                <option value="Bélgica (+32)" <?php if ($dataddi == 'Bélgica (+32)') { echo 'selected="selected"'; } ?>>Bélgica (+32)</option>
                                <option value="Belize (+501)" <?php if ($dataddi == 'Belize (+501)') { echo 'selected="selected"'; } ?>>Belize (+501)</option>
                                <option value="Benim (+229)" <?php if ($dataddi == 'Benim (+229)') { echo 'selected="selected"'; } ?>>Benim (+229)</option>
                                <option value="Bermudas (+1)" <?php if ($dataddi == 'Bermudas (+1)') { echo 'selected="selected"'; } ?>>Bermudas (+1)</option>
                                <option value="Bielorrússia (+375)" <?php if ($dataddi == 'Bielorrússia (+375)') { echo 'selected="selected"'; } ?>>Bielorrússia (+375)</option>
                                <option value="Bolívia (+591)" <?php if ($dataddi == 'Bolívia (+591)') { echo 'selected="selected"'; } ?>>Bolívia (+591)</option>
                                <option value="Bósnia e Herzegovina (+387)" <?php if ($dataddi == 'Bósnia e Herzegovina (+387)') { echo 'selected="selected"'; } ?>>Bósnia e Herzegovina (+387)</option>
                                <option value="Botsuana (+267)" <?php if ($dataddi == 'Botsuana (+267)') { echo 'selected="selected"'; } ?>>Botsuana (+267)</option>
                                <option value="Brasil (+55)" <?php if ($dataddi == 'Brasil (+55)') { echo 'selected="selected"'; } ?>>Brasil (+55)</option>
                                <option value="Brunei (+673)" <?php if ($dataddi == 'Brunei (+673)') { echo 'selected="selected"'; } ?>>Brunei (+673)</option>
                                <option value="Bulgária (+359)" <?php if ($dataddi == 'Bulgária (+359)') { echo 'selected="selected"'; } ?>>Bulgária (+359)</option>
                                <option value="Burkina Faso (+226)" <?php if ($dataddi == 'Burkina Faso (+226)') { echo 'selected="selected"'; } ?>>Burkina Faso (+226)</option>
                                <option value="Burundi (+257)" <?php if ($dataddi == 'Burundi (+257)') { echo 'selected="selected"'; } ?>>Burundi (+257)</option>
                                <option value="Butão (+975)" <?php if ($dataddi == 'Butão (+975)') { echo 'selected="selected"'; } ?>>Butão (+975)</option>
                                <option value="Cabo Verde (+238)" <?php if ($dataddi == 'Cabo Verde (+238)') { echo 'selected="selected"'; } ?>>Cabo Verde (+238)</option>
                                <option value="Camarões (+237)" <?php if ($dataddi == 'Camarões (+237)') { echo 'selected="selected"'; } ?>>Camarões (+237)</option>
                                <option value="Camboja (+855)" <?php if ($dataddi == 'Camboja (+855)') { echo 'selected="selected"'; } ?>>Camboja (+855)</option>
                                <option value="Canadá (+1)" <?php if ($dataddi == 'Canadá (+1)') { echo 'selected="selected"'; } ?>>Canadá (+1)</option>
                                <option value="Casaquistão (+7)" <?php if ($dataddi == 'Casaquistão (+7)') { echo 'selected="selected"'; } ?>>Casaquistão (+7)</option>
                                <option value="Chade (+235)" <?php if ($dataddi == 'Chade (+235)') { echo 'selected="selected"'; } ?>>Chade (+235)</option>
                                <option value="Chile (+56)" <?php if ($dataddi == 'Chile (+56)') { echo 'selected="selected"'; } ?>>Chile (+56)</option>
                                <option value="China (+86)" <?php if ($dataddi == 'China (+86)') { echo 'selected="selected"'; } ?>>China (+86)</option>
                                <option value="Chipre (+357)" <?php if ($dataddi == 'Chipre (+357)') { echo 'selected="selected"'; } ?>>Chipre (+357)</option>
                                <option value="Cingapura (+65)" <?php if ($dataddi == 'Cingapura (+65)') { echo 'selected="selected"'; } ?>>Cingapura (+65)</option>
                                <option value="Colômbia (+57)" <?php if ($dataddi == 'Colômbia (+57)') { echo 'selected="selected"'; } ?>>Colômbia (+57)</option>
                                <option value="Comores (+269)" <?php if ($dataddi == 'Comores (+269)') { echo 'selected="selected"'; } ?>>Comores (+269)</option>
                                <option value="Congo-Brazzaville (+242)" <?php if ($dataddi == 'Congo-Brazzaville (+242)') { echo 'selected="selected"'; } ?>>Congo-Brazzaville (+242)</option>
                                <option value="Congo-Kinshasa (+243)" <?php if ($dataddi == 'Congo-Kinshasa (+243)') { echo 'selected="selected"'; } ?>>Congo-Kinshasa (+243)</option>
                                <option value="Coréia do Norte (+850)" <?php if ($dataddi == 'Coréia do Norte (+850)') { echo 'selected="selected"'; } ?>>Coréia do Norte (+850)</option>
                                <option value="Coréia do Sul (+82)" <?php if ($dataddi == 'Coréia do Sul (+82)') { echo 'selected="selected"'; } ?>>Coréia do Sul (+82)</option>
                                <option value="Costa do Marfim (+225)" <?php if ($dataddi == 'Costa do Marfim (+225)') { echo 'selected="selected"'; } ?>>Costa do Marfim (+225)</option>
                                <option value="Costa Rica (+506)" <?php if ($dataddi == 'Costa Rica (+506)') { echo 'selected="selected"'; } ?>>Costa Rica (+506)</option>
                                <option value="Croácia (+385)" <?php if ($dataddi == 'Croácia (+385)') { echo 'selected="selected"'; } ?>>Croácia (+385)</option>
                                <option value="Cuba (+53)" <?php if ($dataddi == 'Cuba (+53)') { echo 'selected="selected"'; } ?>>Cuba (+53)</option>
                                <option value="Dinamarca (+45)" <?php if ($dataddi == 'Dinamarca (+45)') { echo 'selected="selected"'; } ?>>Dinamarca (+45)</option>
                                <option value="Djibuti (+253)" <?php if ($dataddi == 'Djibuti (+253)') { echo 'selected="selected"'; } ?>>Djibuti (+253)</option>
                                <option value="Dominica (+1)" <?php if ($dataddi == 'Dominica (+1)') { echo 'selected="selected"'; } ?>>Dominica (+1)</option>
                                <option value="Egito (+20)" <?php if ($dataddi == 'Egito (+20)') { echo 'selected="selected"'; } ?>>Egito (+20)</option>
                                <option value="El Salvador (+503)" <?php if ($dataddi == 'El Salvador (+503)') { echo 'selected="selected"'; } ?>>El Salvador (+503)</option>
                                <option value="Emirados Árabes Unidos (+971)" <?php if ($dataddi == 'Emirados Árabes Unidos (+971)') { echo 'selected="selected"'; } ?>>Emirados Árabes Unidos (+971)</option>
                                <option value="Equador (+593)" <?php if ($dataddi == 'Equador (+593)') { echo 'selected="selected"'; } ?>>Equador (+593)</option>
                                <option value="Eritréia (+291)" <?php if ($dataddi == 'Eritréia (+291)') { echo 'selected="selected"'; } ?>>Eritréia (+291)</option>
                                <option value="Eslováquia (+421)" <?php if ($dataddi == 'Eslováquia (+421)') { echo 'selected="selected"'; } ?>>Eslováquia (+421)</option>
                                <option value="Eslovénia (+386)" <?php if ($dataddi == 'Eslovénia (+386)') { echo 'selected="selected"'; } ?>>Eslovénia (+386)</option>
                                <option value="Espanha (+34)" <?php if ($dataddi == 'Espanha (+34)') { echo 'selected="selected"'; } ?>>Espanha (+34)</option>
                                <option value="Estados Unidos (+1)" <?php if ($dataddi == 'Estados Unidos (+1)') { echo 'selected="selected"'; } ?>>Estados Unidos (+1)</option>
                                <option value="Estônia (+372)" <?php if ($dataddi == 'Estônia (+372)') { echo 'selected="selected"'; } ?>>Estônia (+372)</option>
                                <option value="Etiópia (+251)" <?php if ($dataddi == 'Etiópia (+251)') { echo 'selected="selected"'; } ?>>Etiópia (+251)</option>
                                <option value="Fiji (+679)" <?php if ($dataddi == 'Fiji (+679)') { echo 'selected="selected"'; } ?>>Fiji (+679)</option>
                                <option value="Filipinas (+63)" <?php if ($dataddi == 'Filipinas (+63)') { echo 'selected="selected"'; } ?>>Filipinas (+63)</option>
                                <option value="Finlândia (+358)" <?php if ($dataddi == 'Finlândia (+358)') { echo 'selected="selected"'; } ?>>Finlândia (+358)</option>
                                <option value="França (+33)" <?php if ($dataddi == 'França (+33)') { echo 'selected="selected"'; } ?>>França (+33)</option>
                                <option value="Gabão (+241)" <?php if ($dataddi == 'Gabão (+241)') { echo 'selected="selected"'; } ?>>Gabão (+241)</option>
                                <option value="Gâmbia (+220)" <?php if ($dataddi == 'Gâmbia (+220)') { echo 'selected="selected"'; } ?>>Gâmbia (+220)</option>
                                <option value="Gana (+233)" <?php if ($dataddi == 'Gana (+233)') { echo 'selected="selected"'; } ?>>Gana (+233)</option>
                                <option value="Geórgia (+995)" <?php if ($dataddi == 'Geórgia (+995)') { echo 'selected="selected"'; } ?>>Geórgia (+995)</option>
                                <option value="Gibraltar (+350)" <?php if ($dataddi == 'Gibraltar (+350)') { echo 'selected="selected"'; } ?>>Gibraltar (+350)</option>
                                <option value="Granada (+1)" <?php if ($dataddi == 'Granada (+1)') { echo 'selected="selected"'; } ?>>Granada (+1)</option>
                                <option value="Grécia (+30)" <?php if ($dataddi == 'Grécia (+30)') { echo 'selected="selected"'; } ?>>Grécia (+30)</option>
                                <option value="Grenada (+473)" <?php if ($dataddi == 'Grenada (+473)') { echo 'selected="selected"'; } ?>>Grenada (+473)</option>
                                <option value="Groenlândia (+299)" <?php if ($dataddi == 'Groenlândia (+299)') { echo 'selected="selected"'; } ?>>Groenlândia (+299)</option>
                                <option value="Guadalupe (+590)" <?php if ($dataddi == 'Guadalupe (+590)') { echo 'selected="selected"'; } ?>>Guadalupe (+590)</option>
                                <option value="Guam (+671)" <?php if ($dataddi == 'Guam (+671)') { echo 'selected="selected"'; } ?>>Guam (+671)</option>
                                <option value="Guatemala (+502)" <?php if ($dataddi == 'Guatemala (+502)') { echo 'selected="selected"'; } ?>>Guatemala (+502)</option>
                                <option value="Guiana (+592)" <?php if ($dataddi == 'Guiana (+592)') { echo 'selected="selected"'; } ?>>Guiana (+592)</option>
                                <option value="Guiana Francesa (+594)" <?php if ($dataddi == 'Guiana Francesa (+594)') { echo 'selected="selected"'; } ?>>Guiana Francesa (+594)</option>
                                <option value="Guiné (+224)" <?php if ($dataddi == 'Guiné (+224)') { echo 'selected="selected"'; } ?>>Guiné (+224)</option>
                                <option value="Guiné Equatorial (+240)" <?php if ($dataddi == 'Guiné Equatorial (+240)') { echo 'selected="selected"'; } ?>>Guiné Equatorial (+240)</option>
                                <option value="Guiné-Bissau (+245)" <?php if ($dataddi == 'Guiné-Bissau (+245)') { echo 'selected="selected"'; } ?>>Guiné-Bissau (+245)</option>
                                <option value="Haiti (+509)" <?php if ($dataddi == 'Haiti (+509)') { echo 'selected="selected"'; } ?>>Haiti (+509)</option>
                                <option value="Holanda (+31)" <?php if ($dataddi == 'Holanda (+31)') { echo 'selected="selected"'; } ?>>Holanda (+31)</option>
                                <option value="Honduras (+504)" <?php if ($dataddi == 'Honduras (+504)') { echo 'selected="selected"'; } ?>>Honduras (+504)</option>
                                <option value="Hong Kong (+852)" <?php if ($dataddi == 'Hong Kong (+852)') { echo 'selected="selected"'; } ?>>Hong Kong (+852)</option>
                                <option value="Hungria (+36)" <?php if ($dataddi == 'Hungria (+36)') { echo 'selected="selected"'; } ?>>Hungria (+36)</option>
                                <option value="Iêmen (+967)" <?php if ($dataddi == 'Iêmen (+967)') { echo 'selected="selected"'; } ?>>Iêmen (+967)</option>
                                <option value="Ilha Niue (+683)" <?php if ($dataddi == 'Ilha Niue (+683)') { echo 'selected="selected"'; } ?>>Ilha Niue (+683)</option>
                                <option value="Ilhas Caimão (+1)" <?php if ($dataddi == 'Ilhas Caimão (+1)') { echo 'selected="selected"'; } ?>>Ilhas Caimão (+1)</option>
                                <option value="Ilhas Cook (+682)" <?php if ($dataddi == 'Ilhas Cook (+682)') { echo 'selected="selected"'; } ?>>Ilhas Cook (+682)</option>
                                <option value="Ilhas Faroé (+298)" <?php if ($dataddi == 'Ilhas Faroé (+298)') { echo 'selected="selected"'; } ?>>Ilhas Faroé (+298)</option>
                                <option value="Ilhas Maldivas (+960)" <?php if ($dataddi == 'Ilhas Maldivas (+960)') { echo 'selected="selected"'; } ?>>Ilhas Maldivas (+960)</option>
                                <option value="Ilhas Malvinas (+500)" <?php if ($dataddi == 'Ilhas Malvinas (+500)') { echo 'selected="selected"'; } ?>>Ilhas Malvinas (+500)</option>
                                <option value="Ilhas Marianas do Norte (+1)" <?php if ($dataddi == 'Ilhas Marianas do Norte (+1)') { echo 'selected="selected"'; } ?>>Ilhas Marianas do Norte (+1)</option>
                                <option value="Ilhas Marshall (+692)" <?php if ($dataddi == 'Ilhas Marshall (+692)') { echo 'selected="selected"'; } ?>>Ilhas Marshall (+692)</option>
                                <option value="Ilhas Salomão (+677)" <?php if ($dataddi == 'Ilhas Salomão (+677)') { echo 'selected="selected"'; } ?>>Ilhas Salomão (+677)</option>
                                <option value="Ilhas Virgens Americanas (+1)" <?php if ($dataddi == 'Ilhas Virgens Americanas (+1)') { echo 'selected="selected"'; } ?>>Ilhas Virgens Americanas (+1)</option>
                                <option value="Ilhas Virgens Britânicas (+1)" <?php if ($dataddi == 'Ilhas Virgens Britânicas (+1)') { echo 'selected="selected"'; } ?>>Ilhas Virgens Britânicas (+1)</option>
                                <option value="Índia (+91)" <?php if ($dataddi == 'Índia (+91)') { echo 'selected="selected"'; } ?>>Índia (+91)</option>
                                <option value="Indonésia (+62)" <?php if ($dataddi == 'Indonésia (+62)') { echo 'selected="selected"'; } ?>>Indonésia (+62)</option>
                                <option value="Irã (+98)" <?php if ($dataddi == 'Irã (+98)') { echo 'selected="selected"'; } ?>>Irã (+98)</option>
                                <option value="Iraque (+964)" <?php if ($dataddi == 'Iraque (+964)') { echo 'selected="selected"'; } ?>>Iraque (+964)</option>
                                <option value="Irlanda (+353)" <?php if ($dataddi == 'Irlanda (+353)') { echo 'selected="selected"'; } ?>>Irlanda (+353)</option>
                                <option value="Islândia (+354)" <?php if ($dataddi == 'Islândia (+354)') { echo 'selected="selected"'; } ?>>Islândia (+354)</option>
                                <option value="Israel (+972)" <?php if ($dataddi == 'Israel (+972)') { echo 'selected="selected"'; } ?>>Israel (+972)</option>
                                <option value="Itália (+39)" <?php if ($dataddi == 'Itália (+39)') { echo 'selected="selected"'; } ?>>Itália (+39)</option>
                                <option value="Jamaica (+1)" <?php if ($dataddi == 'Jamaica (+1)') { echo 'selected="selected"'; } ?>>Jamaica (+1)</option>
                                <option value="Japão (+81)" <?php if ($dataddi == 'Japão (+81)') { echo 'selected="selected"'; } ?>>Japão (+81)</option>
                                <option value="Jordânia (+962)" <?php if ($dataddi == 'Jordânia (+962)') { echo 'selected="selected"'; } ?>>Jordânia (+962)</option>
                                <option value="Kiribati (+686)" <?php if ($dataddi == 'Kiribati (+686)') { echo 'selected="selected"'; } ?>>Kiribati (+686)</option>
                                <option value="Kuwait (+965)" <?php if ($dataddi == 'Kuwait (+965)') { echo 'selected="selected"'; } ?>>Kuwait (+965)</option>
                                <option value="Laos (+856)" <?php if ($dataddi == 'Laos (+856)') { echo 'selected="selected"'; } ?>>Laos (+856)</option>
                                <option value="Lesoto (+266)" <?php if ($dataddi == 'Lesoto (+266)') { echo 'selected="selected"'; } ?>>Lesoto (+266)</option>
                                <option value="Letônia (+371)" <?php if ($dataddi == 'Letônia (+371)') { echo 'selected="selected"'; } ?>>Letônia (+371)</option>
                                <option value="Líbano (+961)" <?php if ($dataddi == 'Líbano (+961)') { echo 'selected="selected"'; } ?>>Líbano (+961)</option>
                                <option value="Libéria (+231)" <?php if ($dataddi == 'Libéria (+231)') { echo 'selected="selected"'; } ?>>Libéria (+231)</option>
                                <option value="Líbia (+218)" <?php if ($dataddi == 'Líbia (+218)') { echo 'selected="selected"'; } ?>>Líbia (+218)</option>
                                <option value="Liechtenstein (+423)" <?php if ($dataddi == 'Liechtenstein (+423)') { echo 'selected="selected"'; } ?>>Liechtenstein (+423)</option>
                                <option value="Lituânia (+370)" <?php if ($dataddi == 'Lituânia (+370)') { echo 'selected="selected"'; } ?>>Lituânia (+370)</option>
                                <option value="Luxemburgo (+352)" <?php if ($dataddi == 'Luxemburgo (+352)') { echo 'selected="selected"'; } ?>>Luxemburgo (+352)</option>
                                <option value="Macau (+853)" <?php if ($dataddi == 'Macau (+853)') { echo 'selected="selected"'; } ?>>Macau (+853)</option>
                                <option value="Macedônia (+389)" <?php if ($dataddi == 'Macedônia (+389)') { echo 'selected="selected"'; } ?>>Macedônia (+389)</option>
                                <option value="Madagascar (+261)" <?php if ($dataddi == 'Madagascar (+261)') { echo 'selected="selected"'; } ?>>Madagascar (+261)</option>
                                <option value="Malásia (+60)" <?php if ($dataddi == 'Malásia (+60)') { echo 'selected="selected"'; } ?>>Malásia (+60)</option>
                                <option value="Malawi (+265)" <?php if ($dataddi == 'Malawi (+265)') { echo 'selected="selected"'; } ?>>Malawi (+265)</option>
                                <option value="Mali (+223)" <?php if ($dataddi == 'Mali (+223)') { echo 'selected="selected"'; } ?>>Mali (+223)</option>
                                <option value="Malta (+356)" <?php if ($dataddi == 'Malta (+356)') { echo 'selected="selected"'; } ?>>Malta (+356)</option>
                                <option value="Marrocos (+212)" <?php if ($dataddi == 'Marrocos (+212)') { echo 'selected="selected"'; } ?>>Marrocos (+212)</option>
                                <option value="Martinica (+596)" <?php if ($dataddi == 'Martinica (+596)') { echo 'selected="selected"'; } ?>>Martinica (+596)</option>
                                <option value="Maurício (+230)" <?php if ($dataddi == 'Maurício (+230)') { echo 'selected="selected"'; } ?>>Maurício (+230)</option>
                                <option value="Mauritânia (+222)" <?php if ($dataddi == 'Mauritânia (+222)') { echo 'selected="selected"'; } ?>>Mauritânia (+222)</option>
                                <option value="Mayotte (+269)" <?php if ($dataddi == 'Mayotte (+269)') { echo 'selected="selected"'; } ?>>Mayotte (+269)</option>
                                <option value="México (+52)" <?php if ($dataddi == 'México (+52)') { echo 'selected="selected"'; } ?>>México (+52)</option>
                                <option value="Micronésia (+691)" <?php if ($dataddi == 'Micronésia (+691)') { echo 'selected="selected"'; } ?>>Micronésia (+691)</option>
                                <option value="Moçambique (+258)" <?php if ($dataddi == 'Moçambique (+258)') { echo 'selected="selected"'; } ?>>Moçambique (+258)</option>
                                <option value="Moldávia (+373)" <?php if ($dataddi == 'Moldávia (+373)') { echo 'selected="selected"'; } ?>>Moldávia (+373)</option>
                                <option value="Mônaco (+377)" <?php if ($dataddi == 'Mônaco (+377)') { echo 'selected="selected"'; } ?>>Mônaco (+377)</option>
                                <option value="Mongólia (+976)" <?php if ($dataddi == 'Mongólia (+976)') { echo 'selected="selected"'; } ?>>Mongólia (+976)</option>
                                <option value="Montserrat (+1)" <?php if ($dataddi == 'Montserrat (+1)') { echo 'selected="selected"'; } ?>>Montserrat (+1)</option>
                                <option value="Myanmar (+95)" <?php if ($dataddi == 'Myanmar (+95)') { echo 'selected="selected"'; } ?>>Myanmar (+95)</option>
                                <option value="Namíbia (+264)" <?php if ($dataddi == 'Namíbia (+264)') { echo 'selected="selected"'; } ?>>Namíbia (+264)</option>
                                <option value="Nauru (+674)" <?php if ($dataddi == 'Nauru (+674)') { echo 'selected="selected"'; } ?>>Nauru (+674)</option>
                                <option value="Nepal (+977)" <?php if ($dataddi == 'Nepal (+977)') { echo 'selected="selected"'; } ?>>Nepal (+977)</option>
                                <option value="Nicarágua (+505)" <?php if ($dataddi == 'Nicarágua (+505)') { echo 'selected="selected"'; } ?>>Nicarágua (+505)</option>
                                <option value="Níger (+227)" <?php if ($dataddi == 'Níger (+227)') { echo 'selected="selected"'; } ?>>Níger (+227)</option>
                                <option value="Nigéria (+234)" <?php if ($dataddi == 'Nigéria (+234)') { echo 'selected="selected"'; } ?>>Nigéria (+234)</option>
                                <option value="Noruega (+47)" <?php if ($dataddi == 'Noruega (+47)') { echo 'selected="selected"'; } ?>>Noruega (+47)</option>
                                <option value="Nova Caledônia (+687)" <?php if ($dataddi == 'Nova Caledônia (+687)') { echo 'selected="selected"'; } ?>>Nova Caledônia (+687)</option>
                                <option value="Nova Zelândia (+64)" <?php if ($dataddi == 'Nova Zelândia (+64)') { echo 'selected="selected"'; } ?>>Nova Zelândia (+64)</option>
                                <option value="Omã (+968)" <?php if ($dataddi == 'Omã (+968)') { echo 'selected="selected"'; } ?>>Omã (+968)</option>
                                <option value="Palau (+680)" <?php if ($dataddi == 'Palau (+680)') { echo 'selected="selected"'; } ?>>Palau (+680)</option>
                                <option value="Palestina (+970)" <?php if ($dataddi == 'Palestina (+970)') { echo 'selected="selected"'; } ?>>Palestina (+970)</option>
                                <option value="Panamá (+507)" <?php if ($dataddi == 'Panamá (+507)') { echo 'selected="selected"'; } ?>>Panamá (+507)</option>
                                <option value="Papua-Nova Guiné (+675)" <?php if ($dataddi == 'Papua-Nova Guiné (+675)') { echo 'selected="selected"'; } ?>>Papua-Nova Guiné (+675)</option>
                                <option value="Paquistão (+92)" <?php if ($dataddi == 'Paquistão (+92)') { echo 'selected="selected"'; } ?>>Paquistão (+92)</option>
                                <option value="Paraguai (+595)" <?php if ($dataddi == 'Paraguai (+595)') { echo 'selected="selected"'; } ?>>Paraguai (+595)</option>
                                <option value="Peru (+51)" <?php if ($dataddi == 'Peru (+51)') { echo 'selected="selected"'; } ?>>Peru (+51)</option>
                                <option value="Polinésia Francesa (+689)" <?php if ($dataddi == 'Polinésia Francesa (+689)') { echo 'selected="selected"'; } ?>>Polinésia Francesa (+689)</option>
                                <option value="Polônia (+48)" <?php if ($dataddi == 'Polônia (+48)') { echo 'selected="selected"'; } ?>>Polônia (+48)</option>
                                <option value="Porto Rico (+1)" <?php if ($dataddi == 'Porto Rico (+1)') { echo 'selected="selected"'; } ?>>Porto Rico (+1)</option>
                                <option value="Portugal (+351)" <?php if ($dataddi == 'Portugal (+351)') { echo 'selected="selected"'; } ?>>Portugal (+351)</option>
                                <option value="Qatar (+974)" <?php if ($dataddi == 'Qatar (+974)') { echo 'selected="selected"'; } ?>>Qatar (+974)</option>
                                <option value="Quênia (+254)" <?php if ($dataddi == 'Quênia (+254)') { echo 'selected="selected"'; } ?>>Quênia (+254)</option>
                                <option value="Quirguistão (+996)" <?php if ($dataddi == 'Quirguistão (+996)') { echo 'selected="selected"'; } ?>>Quirguistão (+996)</option>
                                <option value="Reino Unido (+44)" <?php if ($dataddi == 'Reino Unido (+44)') { echo 'selected="selected"'; } ?>>Reino Unido (+44)</option>
                                <option value="República Centro-Africana (+236)" <?php if ($dataddi == 'República Centro-Africana (+236)') { echo 'selected="selected"'; } ?>>República Centro-Africana (+236)</option>
                                <option value="República Dominicana (+1)" <?php if ($dataddi == 'República Dominicana (+1)') { echo 'selected="selected"'; } ?>>República Dominicana (+1)</option>
                                <option value="República Tcheca (+420)" <?php if ($dataddi == 'República Tcheca (+420)') { echo 'selected="selected"'; } ?>>República Tcheca (+420)</option>
                                <option value="Reunião (+262)" <?php if ($dataddi == 'Reunião (+262)') { echo 'selected="selected"'; } ?>>Reunião (+262)</option>
                                <option value="Romênia (+40)" <?php if ($dataddi == 'Romênia (+40)') { echo 'selected="selected"'; } ?>>Romênia (+40)</option>
                                <option value="Ruanda (+250)" <?php if ($dataddi == 'Ruanda (+250)') { echo 'selected="selected"'; } ?>>Ruanda (+250)</option>
                                <option value="Rússia (+7)" <?php if ($dataddi == 'Rússia (+7)') { echo 'selected="selected"'; } ?>>Rússia (+7)</option>
                                <option value="Saara Ocidental (+212)" <?php if ($dataddi == 'Saara Ocidental (+212)') { echo 'selected="selected"'; } ?>>Saara Ocidental (+212)</option>
                                <option value="Saint-Martin (French West Indies) (+590)" <?php if ($dataddi == 'Saint-Martin (French West Indies) (+590)') { echo 'selected="selected"'; } ?>>Saint-Martin (French West Indies) (+590)</option>
                                <option value="Samoa (+685)" <?php if ($dataddi == 'Samoa (+685)') { echo 'selected="selected"'; } ?>>Samoa (+685)</option>
                                <option value="Samoa Americana (+1)" <?php if ($dataddi == 'Samoa Americana (+1)') { echo 'selected="selected"'; } ?>>Samoa Americana (+1)</option>
                                <option value="Santa Helena (+290)" <?php if ($dataddi == 'Santa Helena (+290)') { echo 'selected="selected"'; } ?>>Santa Helena (+290)</option>
                                <option value="Santa Lúcia (+1)" <?php if ($dataddi == 'Santa Lúcia (+1)') { echo 'selected="selected"'; } ?>>Santa Lúcia (+1)</option>
                                <option value="São Cristóvão e Neves (+1)" <?php if ($dataddi == 'São Cristóvão e Neves (+1)') { echo 'selected="selected"'; } ?>>São Cristóvão e Neves (+1)</option>
                                <option value="São Marinho (+378)" <?php if ($dataddi == 'São Marinho (+378)') { echo 'selected="selected"'; } ?>>São Marinho (+378)</option>
                                <option value="São Pedro e Miquelon (+508)" <?php if ($dataddi == 'São Pedro e Miquelon (+508)') { echo 'selected="selected"'; } ?>>São Pedro e Miquelon (+508)</option>
                                <option value="São Tomé e Príncipe (+239)" <?php if ($dataddi == 'São Tomé e Príncipe (+239)') { echo 'selected="selected"'; } ?>>São Tomé e Príncipe (+239)</option>
                                <option value="São Vicente e Granadinas (+1)" <?php if ($dataddi == 'São Vicente e Granadinas (+1)') { echo 'selected="selected"'; } ?>>São Vicente e Granadinas (+1)</option>
                                <option value="Seicheles (+248)" <?php if ($dataddi == 'Seicheles (+248)') { echo 'selected="selected"'; } ?>>Seicheles (+248)</option>
                                <option value="Senegal (+221)" <?php if ($dataddi == 'Senegal (+221)') { echo 'selected="selected"'; } ?>>Senegal (+221)</option>
                                <option value="Serra Leoa (+232)" <?php if ($dataddi == 'Serra Leoa (+232)') { echo 'selected="selected"'; } ?>>Serra Leoa (+232)</option>
                                <option value="Sérvia e Montenegro (+381)" <?php if ($dataddi == 'Sérvia e Montenegro (+381)') { echo 'selected="selected"'; } ?>>Sérvia e Montenegro (+381)</option>
                                <option value="Sint Maarten (Antilhas Holandesas) (+599)" <?php if ($dataddi == 'Sint Maarten (Antilhas Holandesas) (+599)') { echo 'selected="selected"'; } ?>>Sint Maarten (Antilhas Holandesas) (+599)</option>
                                <option value="Síria (+963)" <?php if ($dataddi == 'Síria (+963)') { echo 'selected="selected"'; } ?>>Síria (+963)</option>
                                <option value="Somália (+252)" <?php if ($dataddi == 'Somália (+252)') { echo 'selected="selected"'; } ?>>Somália (+252)</option>
                                <option value="Sri Lanka (+94)" <?php if ($dataddi == 'Sri Lanka (+94)') { echo 'selected="selected"'; } ?>>Sri Lanka (+94)</option>
                                <option value="Suazilândia (+268)" <?php if ($dataddi == 'Suazilândia (+268)') { echo 'selected="selected"'; } ?>>Suazilândia (+268)</option>
                                <option value="Sudão (+249)" <?php if ($dataddi == 'Sudão (+249)') { echo 'selected="selected"'; } ?>>Sudão (+249)</option>
                                <option value="Suécia (+46)" <?php if ($dataddi == 'Suécia (+46)') { echo 'selected="selected"'; } ?>>Suécia (+46)</option>
                                <option value="Suíça (+41)" <?php if ($dataddi == 'Suíça (+41)') { echo 'selected="selected"'; } ?>>Suíça (+41)</option>
                                <option value="Suriname (+597)" <?php if ($dataddi == 'Suriname (+597)') { echo 'selected="selected"'; } ?>>Suriname (+597)</option>
                                <option value="Tadjiquistão (+992)" <?php if ($dataddi == 'Tadjiquistão (+992)') { echo 'selected="selected"'; } ?>>Tadjiquistão (+992)</option>
                                <option value="Tailândia (+66)" <?php if ($dataddi == 'Tailândia (+66)') { echo 'selected="selected"'; } ?>>Tailândia (+66)</option>
                                <option value="Taiwan (+886)" <?php if ($dataddi == 'Taiwan (+886)') { echo 'selected="selected"'; } ?>>Taiwan (+886)</option>
                                <option value="Tanzânia (+255)" <?php if ($dataddi == 'Tanzânia (+255)') { echo 'selected="selected"'; } ?>>Tanzânia (+255)</option>
                                <option value="Território Britânico do Oceano Índico (+246)" <?php if ($dataddi == 'Território Britânico do Oceano Índico (+246)') { echo 'selected="selected"'; } ?>>Território Britânico do Oceano Índico (+246)</option>
                                <option value="Territórios Externos Australianos (+672)" <?php if ($dataddi == 'Territórios Externos Australianos (+672)') { echo 'selected="selected"'; } ?>>Territórios Externos Australianos (+672)</option>
                                <option value="Timor-Leste (+670)" <?php if ($dataddi == 'Timor-Leste (+670)') { echo 'selected="selected"'; } ?>>Timor-Leste (+670)</option>
                                <option value="Togo (+228)" <?php if ($dataddi == 'Togo (+228)') { echo 'selected="selected"'; } ?>>Togo (+228)</option>
                                <option value="Tokelau (+690)" <?php if ($dataddi == 'Tokelau (+690)') { echo 'selected="selected"'; } ?>>Tokelau (+690)</option>
                                <option value="Tonga (+676)" <?php if ($dataddi == 'Tonga (+676)') { echo 'selected="selected"'; } ?>>Tonga (+676)</option>
                                <option value="Trinidad e Tobago (+1)" <?php if ($dataddi == 'Trinidad e Tobago (+1)') { echo 'selected="selected"'; } ?>>Trinidad e Tobago (+1)</option>
                                <option value="Tunísia (+216)" <?php if ($dataddi == 'Tunísia (+216)') { echo 'selected="selected"'; } ?>>Tunísia (+216)</option>
                                <option value="Turcas e Caicos (+1)" <?php if ($dataddi == 'Turcas e Caicos (+1)') { echo 'selected="selected"'; } ?>>Turcas e Caicos (+1)</option>
                                <option value="Turquemenistão (+993)" <?php if ($dataddi == 'Turquemenistão (+993)') { echo 'selected="selected"'; } ?>>Turquemenistão (+993)</option>
                                <option value="Turquia (+90)" <?php if ($dataddi == 'Turquia (+90)') { echo 'selected="selected"'; } ?>>Turquia (+90)</option>
                                <option value="Tuvalu (+688)" <?php if ($dataddi == 'Tuvalu (+688)') { echo 'selected="selected"'; } ?>>Tuvalu (+688)</option>
                                <option value="Ucrânia (+380)" <?php if ($dataddi == 'Ucrânia (+380)') { echo 'selected="selected"'; } ?>>Ucrânia (+380)</option>
                                <option value="Uganda (+256)" <?php if ($dataddi == 'Uganda (+256)') { echo 'selected="selected"'; } ?>>Uganda (+256)</option>
                                <option value="Uruguai (+598)" <?php if ($dataddi == 'Uruguai (+598)') { echo 'selected="selected"'; } ?>>Uruguai (+598)</option>
                                <option value="Uzbequistão (+998)" <?php if ($dataddi == 'Uzbequistão (+998)') { echo 'selected="selected"'; } ?>>Uzbequistão (+998)</option>
                                <option value="Vanuatu (+678)" <?php if ($dataddi == 'Vanuatu (+678)') { echo 'selected="selected"'; } ?>>Vanuatu (+678)</option>
                                <option value="Vaticano (+379)" <?php if ($dataddi == 'Vaticano (+379)') { echo 'selected="selected"'; } ?>>Vaticano (+379)</option>
                                <option value="Venezuela (+58)" <?php if ($dataddi == 'Venezuela (+58)') { echo 'selected="selected"'; } ?>>Venezuela (+58)</option>
                                <option value="Vietnã (+84)" <?php if ($dataddi == 'Vietnã (+84)') { echo 'selected="selected"'; } ?>>Vietnã (+84)</option>
                                <option value="Wallis e Futuna (+681)" <?php if ($dataddi == 'Wallis e Futuna (+681)') { echo 'selected="selected"'; } ?>>Wallis e Futuna (+681)</option>
                                <option value="Zâmbia (+260)" <?php if ($dataddi == 'Zâmbia (+260)') { echo 'selected="selected"'; } ?>>Zâmbia (+260)</option>
                                <option value="Zimbábue (+263)" <?php if ($dataddi == 'Zimbábue (+263)') { echo 'selected="selected"'; } ?>>Zimbábue (+263)</option>
                                </select>


                                <input type="text" id="telefone" name="telefones" value="<?php print_custom_field('basicatelefones'); ?>" style="height: 32px; border-radius: 5px; width: 115px; padding-left: 5px;"><br />

    <br />
	</div>

  <div style="float: left; width: 360px;">

    <div id="newsajax" style="float: left; width: 100%;"></div>

    <script type="text/javascript">
      function trocasenha(senha) {
        $.ajax({method: "post",url: "/wp-content/themes/magazine/alterarsenha.php", data: { senha: senha }, success: function(result){
          document.getElementById('divContaSenha').style.display = 'none'
          $( "#novasenha" ).val('');
          $( "#novasenha2" ).val('');
          alert(result);
          //$("#newsajax").append(result);
          //alert(result);
        }});
      }
      function desativaconta(contaid) {
        $.ajax({method: "post",url: "/wp-content/themes/magazine/desativarconta.php",data: { contaid: contaid }, success: function(result){
          document.getElementById('divContaDesativar').style.display = 'none'
          alert(result);
          window.location="/wp-content/themes/magazine/logout.php";
          //$("#newsajax").append(result);
          //alert(result);
        }});
      }
    </script>

    <script>
    $(document).ready(function(){
      $("#desativar").on("click", function(){
        if ($( "#novasenha" ).val() == "") {
          alert('Não é permitido senha em branco!');
          $( "#novasenha" ).focus();
        } else {
          if ($( "#novasenha2" ).val() == "") {
            alert('Preencha a confirmação de senha!');
            $( "#novasenha2" ).focus();
          } else {
            if ($( "#novasenha" ).val() != $( "#novasenha2" ).val()) {
              alert('A senha deve ser digitada duas vezes iguais!');
              $( "#novasenha2" ).focus();
            } else {
              trocasenha($( "#novasenha" ).val());
              //alert($( "#novasenha" ).val());
            }
          }
        }
      });

      $("#desativar2").on("click", function(){
        desativaconta(<?php echo $_GET['id_post']; ?>);

      });
    });
    </script>

    				<div class="col3-1" style="margin: 0px; background: #F5E1CD; padding-left: 15px; border-top: 5px #ff8920 solid; margin-top: 10px; margin-bottom: 30px; position: absolute; width: 360px;">
              <div style="position: absolute; right: 10px; top: 5px; color: #f57300;">
                <a style="cursor: pointer;" onclick="javascript:document.getElementById('divContaSenha').style.display = 'none'; document.getElementById('divContaDesativar').style.display = 'none';"><i class="fa fa-times" aria-hidden="true"></i></a>
              </div>
    					<div id="text-1016" class="widget widget_text" style="">
    						<h4 class="widgettitle">Minha conta</h4>
    						<div class="textwidget" style="margin-bottom: 10px;">
    							<div style="margin-top: 10px; cursor: pointer;"><a onclick="javascript:document.getElementById('divContaSenha').style.display = 'block'; document.getElementById('divContaDesativar').style.display = 'none';"><i class="fa fa-key" aria-hidden="true"></i> Alterar senha</a></div>
    							<div style="margin-top: 10px; font-size: 10px; display: none;" id="divContaSenha">
    								Nova Senha:<br>
    								<input class="input_noticia" type="password" id="novasenha" name="novasenha" value="" style="width: 290px !important;"><br>
    								Confirmar nova senha<br>
    								<input class="input_noticia" type="password" id="novasenha2" name="novasenha2" value="" style="width: 290px !important;"><br>
    								<a id="desativar" style="padding: 10px 25px; background: #f57300; text-decoration: none; display: inline-block; margin-top: 20px; color: #FFFFFF; font-size: 12px; cursor: pointer;">Alterar</a>


    							</div>
    							<div style="margin-top: 10px; cursor: pointer;"><a onclick="javascript:document.getElementById('divContaDesativar').style.display = 'block'; document.getElementById('divContaSenha').style.display = 'none';"><i class="fa fa-minus-circle" aria-hidden="true"></i> Desativar conta</a></div>
    							<div style="margin-top: 10px; font-size: 10px; display: none;" id="divContaDesativar">
    								Ao desativar sua conta seu perfil não ficará mais disponível para os usuários de nosso site. Tem certeza que deseja desativar sua conta?

    								<a id="desativar2" style="padding: 10px 25px; background: #f57300; text-decoration: none; display: inline-block; margin-top: 20px; color: #FFFFFF; font-size: 12px; cursor: pointer;">Sim</a>
    							</div>
    						</div>
    					</div>
    				</div>
  </div>

  <div style="float: left; width: 1064px; margin-top: -20px;">&nbsp;</div>


  <div style="float: left; width: 300px; margin-top: -20px;">
    <div style="float: left; width: 100%;"><strong>Facebook</strong><br />
      <input style="width: 360px; max-width: 85%;" type="text" name="facebook" value="<?php print_custom_field('basicafacebook'); ?>"></div>
    <div style="float: left; width: 100%;"><strong>Instagram</strong><br />
      <input style="width: 360px; max-width: 85%;" type="text" name="instagram" value="<?php print_custom_field('instagram'); ?>"></div>
    <div style="float: left; width: 100%;"><strong>Twitter</strong><br />
      <input style="width: 360px; max-width: 85%;" type="text" name="twitter" value="<?php print_custom_field('twitter'); ?>"></div>
    <div style="float: left; width: 100%;"><strong>Linkedin</strong><br />
      <input style="width: 360px; max-width: 85%;" type="text" name="linkedin" value="<?php print_custom_field('linkedin'); ?>"></div>
    <div style="float: left; width: 100%;"><strong>Blog</strong><br />
      <input style="width: 360px; max-width: 85%;" type="text" name="blog" value="<?php print_custom_field('blog'); ?>"></div>
    <div style="float: left; width: 100%;"><strong>Site</strong><br />
      <input style="width: 360px; max-width: 85%;" type="text" name="site" value="<?php print_custom_field('site'); ?>"></div>
  </div>


	<div class="description_marcas">
		 <div style="display: inline-block;"><strong>Descrição</strong><br /></div>

     <?php $minhahistoria = get_the_content(); ?>
		<textarea style="width: 750px;" name="content_marca" class="marca_textarea"><?php echo strip_tags($minhahistoria); ?></textarea>
	</div>

	<div style="float: right; margin-right: 37px;">
        <input type="button" value="Salvar Alterações" id="salvaform">
    </div>
    <input type="hidden" name="atualizar_perfil" value="atualizar_perfil">
</form>

<?php endwhile; ?>

</div>
<!-- /layout-container -->

<?php get_footer(); ?>

<script type="text/javascript">
	$(document).ready(function() {
    	$('.imagem_editar').hover(function(){
    		$('#link_editar').toggle();
    	})

    	$('.imagem_editar_capa').hover(function(){
    		$('#link_editar_capa').toggle();
    	})
	});
</script>
