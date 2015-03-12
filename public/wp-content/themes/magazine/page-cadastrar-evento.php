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

  <?php if ($_POST){ ?>
    <?php 
      // Create post object
        $my_post = array(
          'post_title'    => $_POST['evento'],
          'post_content'  => $_POST['descricao_evento'],
          'post_status'   => 'pending',
          'post_type'     => 'eventos',
          'post_author'   => 1
        );

$path = "wp-content/uploads/eventos/"; 

$valid_formats = array("jpg", "gif", "png", "tif", "jpeg", "JPG", "GIF", "PNG", "TIF", "JPEG");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{

  //Arquivo Catálogo
  $name = $_FILES['img_destacada']['name'];
  $size = $_FILES['img_destacada']['size'];

  $file_info = pathinfo($name);
  $name = md5($name) .'.'. $file_info['extension'];

  if(strlen($name))
    {
      list($txt, $ext) = explode(".", $name);
      if(in_array($ext,$valid_formats))
      {
      if($size<(10240*10240))
        {
          $actual_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
          $tmp = $_FILES['img_destacada']['tmp_name'];
          if(move_uploaded_file($tmp, $path.$actual_name))
            {
              $response['response']="Arquivo OK";
            }
          else
            $response['response']="Falhou"; 
        }
        else
        $response['response']="Arquivo tem mais de 4MB"; 
        }
        else
        $response['response']="Formato Inválido"; 
    }
  else
    $response['response']="Selecione um arquivo";

  //Arquivo Evento 1
  $name1 = $_FILES['img_evento1']['name'];
  $size1 = $_FILES['img_evento1']['size'];

  $file_info = pathinfo($name1);
  $name1 = md5($name1) .'.'. $file_info['extension'];

  if(strlen($name1))
    {
      list($txt, $ext) = explode(".", $name1);
      if(in_array($ext,$valid_formats))
      {
      if($size1<(10240*10240))
        {
          $actual_name1 = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
          $tmp = $_FILES['img_evento1']['tmp_name'];
          if(move_uploaded_file($tmp, $path.$actual_name1))
            {
              $response['response']="Arquivo OK";
            }
          else
            $response['response']="Falhou"; 
        }
        else
        $response['response']="Arquivo tem mais de 4MB"; 
        }
        else
        $response['response']="Formato Inválido"; 
    }
  else
    $response['response']="Selecione um arquivo";
}

    $cur_post_id = wp_insert_post($my_post);

    $filename  = 'http://letts.com.br/wp-content/uploads/eventos/'.$actual_name;
    $filename1 = 'http://letts.com.br/wp-content/uploads/eventos/'.$actual_name1;

    //Img Destacada
    $wp_filetype = wp_check_filetype(basename($filename), null );
    $attachment = array(
      'post_mime_type' => $wp_filetype['type'],
      'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
      'post_content' => '',
      'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
    
    //Img Evento 1
    $wp_filetype1 = wp_check_filetype(basename($filename1), null );
    $attachment1 = array(
      'post_mime_type' => $wp_filetype1['type'],
      'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename1)),
      'post_content' => '',
      'post_status' => 'inherit'
    );
    $attach_id1 = wp_insert_attachment($attachment1, $filename1, $cur_post_id);

    if ($actual_name) {
      add_post_meta($cur_post_id, 'eventofoto', $attach_id, true);
    }  
    
      add_post_meta($cur_post_id, 'post_image', $filename, true);

    if ($actual_name1) {
      add_post_meta($cur_post_id, 'atletaimagembackground', $attach_id1, true);
    }
    add_post_meta($cur_post_id, 'basicaemail', $_POST['email'], true);
    add_post_meta($cur_post_id, 'link_ingresso', $_POST['link'], true);
    add_post_meta($cur_post_id, 'atletaesporte', $_POST['esporte'], true);
    add_post_meta($cur_post_id, 'profissao', $_POST['profissao'], true);
    add_post_meta($cur_post_id, 'basicapaisatual', $_POST['pais'], true);
    add_post_meta($cur_post_id, 'eventotipo', $_POST['tipo_evento'], true);

    $destinatario = "fernando.mendes@webca.com.br";  

    $headers = "From: $destinatario \r\n";
    $headers.= "Content-Type: text/html; charset=ISO-8859-1 ";
    $headers.= "MIME-Version: 1.0 ";    

    $html = 'Você tem uma nova postagem de Evento para aprovação';

    mail($destinatario,"Nova postagem pendente",$html,$headers);

    ?>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#sucesso').show();
      }) 
    </script>
  <?php } ?>


  <?php 
    query_posts( array('p' => $_GET['id_post'], 'post_type'=>array('profissional','atleta','marca')) );
    while ( have_posts() ) : the_post();
  ?>


        <div style="width: 685px; margin: 0 auto; text-align: center; padding: 40px 0px;">
          <p id="sucesso">Evento cadastrado com sucesso.</p>
          <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; font-size: 45px; font-weight: bold; margin-bottom: 10px;">Cadastrar Evento</h4>
          <div class="galeria_profissional">
            <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
             <input class="input_video" type="text" name="evento" value="" placeholder="Nome do Evento">
             <input class="input_video" type="text" name="link" value="" placeholder="Link para comprar ingresso ou para inscrição com http://">

             <div class="selects_forms" style="margin-top: -10px;">

                <select id="atletaesporte" name="esporte" style="width: 310px; height: 35px; margin-bottom: 14px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; margin-top: 10px; margin-left: 22px;">
                        <option>-- Selecione o esporte --</option>
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

                 <select id="profissao" name="profissao" style="width: 310px; height: 35px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; float: right; margin-top: 10px; margin-right: 5px;">
                      <option>-- Selecione a profissão --</option>
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
              <select id="pais" name="pais" style="width: 310px; height: 35px; margin-bottom: 14px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; margin-top: -5px; float: left;margin-left: 29px;">    
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

              <select id="tipo_evento" name="tipo_evento" style="width: 310px; height: 35px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; float: right; margin-top: -5px; margin-right: 29px;">
                      <option>-- Selecione o tipo do evento --</option>
                      <option value="Campeonato">Campeonato</option>
                      <option value="Show">Show</option>
                      <option value="Festa">Festa</option>
                      <option value="Outros">Outros</option>
               </select>         

              <div class="foto_principal">
                <p>Foto principal</p>
                <input type="file" class="custom-file-input input_file" name="img_destacada">
              </div>

              <div class="fotos_adicionais">
                <p>Flyer</p>
                <input type="file" class="custom-file-input input_file" name="img_evento1">
              </div>  

              <textarea class="" name="descricao_evento" placeholder="Descrição do evento" style="width: 91%; height: 115px;"></textarea>

             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">
             <input type="submit" value="Enviar Evento">
            </form> 
          </div>
        </div>  


  <div id="contentwrap">
  
    <!-- /content -->
    <?php themify_content_after(); // hook ?>

  <?php endwhile ?>

    <?php 
      $id_post = $_GET['id_post'];
        if ($id_post == 1) { ?>
        <div class="div_semcad">
          Para realizar esta ação é necessario criar uma conta, <a href="/wp-content/themes/magazine/logout.php" id="criar" style="background: #f57300; text-decoration: none; padding: 0px; padding-left: 10px; padding-right: 10px; color: #FFFFFF;">clique aqui.</a> 
      </div>  
    <?php } ?>
  
<?php get_footer(); ?>