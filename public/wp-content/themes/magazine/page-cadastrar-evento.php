<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<?php /*
<script src="/wp-content/themes/magazine/js/jquery-1.5.2.min.js"></script>
<script type='text/javascript' src='/wp-content/themes/magazine/js/jquery.maskedinput-1.3.min.js'></script>

<script>
  $(function($){
    $("#dataevento_dia").mask("99/99/9999");
  });
</script>

*/ ?>

<script type="text/javascript">


   $(document).ready(function(){
      $("#postarevento").click(function(){


        if ($( "#idinputevento" ).val() == "") {
          alert( "Você deve preencher o nome do evento!" );
          $( "#idinputevento" ).focus();
        } else {
          if ($( "#dataevento_mes" ).val() == "") {
            alert( "Você deve preencher o mês do evento!" );
            $( "#dataevento_mes" ).focus();
          } else {
            if ($( "#dataevento_dia" ).val() == "") {
              alert( "Você deve preencher o dia do evento!" );
              $( "#dataevento_dia" ).focus();
            } else {
              if ($( "#dataevento_ano" ).val() == "") {
                alert( "Você deve preencher o ano do evento!" );
                $( "#dataevento_ano" ).focus();
              } else {
                if ($( "#countryId" ).val() == "" ) {
                  alert( "Você deve selecionar o país do evento" );
                  $( "#countryId" ).focus();
                } else {
                  if ($( "#stateId" ).val() == "" ) {
                    alert( "Você deve selecionar o estado do evento" );
                    $( "#stateId" ).focus();
                  } else {
                    if ($( "#frmcidade" ).val() == "" ) {
                      alert( "Você deve selecionar a cidade do evento" );
                      $( "#frmcidade" ).focus();
                    } else {
                      if ($( "#tipo_evento" ).val() == "" ) {
                        alert( "Você deve selecionar o tipo do evento" );
                        $( "#tipo_evento" ).focus();
                      } else {
                        if ($("#atletaesporte").val() == "" && $( "#profissao" ).val() == "" ) {
                          alert( "Você deve selecionar o esporte ou profissão para este evento!" );
                        } else {
                          if ($( "#idimgdestacada" ).val() == "") {
                            alert( "Você deve selecionar a imagem!" );
                          } else {
                            if ($( "#idimgevento" ).val() == "") {
                              alert( "Você deve selecionar o flyer!" );
                            } else {
                              if ($( "#iddescricaoevento" ).val() == "") {
                                alert( "Você deve preencher a descrição do evento!" );
                                $( "#iddescricaoevento" ).focus();
                              } else {
                                $( "#new_post" ).submit();
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      });
   });
 </script>

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
    add_post_meta($cur_post_id, 'basicaemail', $_SESSION['meuemail'], true);
    add_post_meta($cur_post_id, 'link_ingresso', $_POST['link'], true);
    add_post_meta($cur_post_id, 'dataevento', $_POST['dataevento_mes'].'/'.$_POST['dataevento_dia'].'/'.$_POST['dataevento_ano'], true);
    add_post_meta($cur_post_id, 'atletaesporte', $_POST['esporte'], true);
    add_post_meta($cur_post_id, 'profissao', $_POST['profissao'], true);
    add_post_meta($cur_post_id, 'basicapaisatual', $_POST['pais'], true);
    add_post_meta($cur_post_id, 'basicaestadoatual', $_POST['estado'], true);
    add_post_meta($cur_post_id, 'basicacidadeatual', $_POST['cidade'], true);
    add_post_meta($cur_post_id, 'eventotipo', $_POST['tipo_evento'], true);

    $destinatario = "renato.botani@letts.com.br";

    $headers = "From: $destinatario \r\n";
    $headers.= "Content-Type: text/html; charset=ISO-8859-1 ";
    $headers.= "MIME-Version: 1.0 ";

    $html = 'Você tem uma nova postagem de Evento para aprovação';

    mail($destinatario,"Nova postagem pendente",$html,$headers);

    ?>

    <script type="text/javascript">
      $(document).ready(function(){
        //$('#sucesso').show();
        window.location='/eventos/?msgsucess=1';
      })
    </script>


  <?php exit; } ?>


  <?php
    query_posts( array('p' => $_GET['id_post'], 'post_type'=>array('profissional','atleta','marca')) );
    while ( have_posts() ) : the_post();
  ?>


        <div style="width: 685px; margin: 0 auto; text-align: center; padding: 40px 0px;">
          <p id="sucesso">Evento cadastrado com sucesso.</p>
          <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; font-size: 45px; font-weight: bold; margin-bottom: 10px;">Cadastrar Evento</h4>
          <div class="galeria_profissional">
            <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
              <div style="float: left; width: 418px;">
                <div style="text-align: left; padding-left: 30px;">Titulo:</div>
                <input id="idinputevento" class="input_video" type="text" name="evento" value="" style="width: 385px !important; margin-right: 10px; float: left; margin-left: 28px;">
              </div>

              <div style="float: left; width: 210px; margin-left: 30px;">
                <div style="text-align: left;">Data do evento:</div>
             <select id="dataevento_mes" name="dataevento_mes" style="width: 85px; float: left;">
                <option value="">--</option>
                <option value="01" <?php if ($datanas1d == '01') { echo 'selected="selected"'; } ?>>01-Jan</option>
                <option value="02" <?php if ($datanas1d == '02') { echo 'selected="selected"'; } ?>>02-Feb</option>
                <option value="03" <?php if ($datanas1d == '03') { echo 'selected="selected"'; } ?>>03-Mar</option>
                <option value="04" <?php if ($datanas1d == '04') { echo 'selected="selected"'; } ?>>04-Apr</option>
                <option value="05" <?php if ($datanas1d == '05') { echo 'selected="selected"'; } ?>>05-May</option>
                <option value="06" <?php if ($datanas1d == '06') { echo 'selected="selected"'; } ?>>06-Jun</option>
                <option value="07" <?php if ($datanas1d == '07') { echo 'selected="selected"'; } ?>>07-Jul</option>
                <option value="08" <?php if ($datanas1d == '08') { echo 'selected="selected"'; } ?>>08-Aug</option>
                <option value="09" <?php if ($datanas1d == '09') { echo 'selected="selected"'; } ?>>09-Sep</option>
                <option value="10" <?php if ($datanas1d == '10') { echo 'selected="selected"'; } ?>>10-Oct</option>
                <option value="11" <?php if ($datanas1d == '11') { echo 'selected="selected"'; } ?>>11-Nov</option>
                <option value="12" <?php if ($datanas1d == '12') { echo 'selected="selected"'; } ?>>12-Dec</option>
              </select>

              <select id="dataevento_dia" name="dataevento_dia" style="width: 60px; float: left; margin-left: 2px;">
                <option value="">--</option>
                <option value="01" <?php if ($datanas1m == '01') { echo 'selected="selected"'; } ?>>01</option>
                <option value="02" <?php if ($datanas1m == '02') { echo 'selected="selected"'; } ?>>02</option>
                <option value="03" <?php if ($datanas1m == '03') { echo 'selected="selected"'; } ?>>03</option>
                <option value="04" <?php if ($datanas1m == '04') { echo 'selected="selected"'; } ?>>04</option>
                <option value="05" <?php if ($datanas1m == '05') { echo 'selected="selected"'; } ?>>05</option>
                <option value="06" <?php if ($datanas1m == '06') { echo 'selected="selected"'; } ?>>06</option>
                <option value="07" <?php if ($datanas1m == '07') { echo 'selected="selected"'; } ?>>07</option>
                <option value="08" <?php if ($datanas1m == '08') { echo 'selected="selected"'; } ?>>08</option>
                <option value="09" <?php if ($datanas1m == '09') { echo 'selected="selected"'; } ?>>09</option>
                <option value="10" <?php if ($datanas1m == '10') { echo 'selected="selected"'; } ?>>10</option>
                <option value="11" <?php if ($datanas1m == '11') { echo 'selected="selected"'; } ?>>11</option>
                <option value="12" <?php if ($datanas1m == '12') { echo 'selected="selected"'; } ?>>12</option>
                <option value="13" <?php if ($datanas1m == '13') { echo 'selected="selected"'; } ?>>13</option>
                <option value="14" <?php if ($datanas1m == '14') { echo 'selected="selected"'; } ?>>14</option>
                <option value="15" <?php if ($datanas1m == '15') { echo 'selected="selected"'; } ?>>15</option>
                <option value="16" <?php if ($datanas1m == '16') { echo 'selected="selected"'; } ?>>16</option>
                <option value="17" <?php if ($datanas1m == '17') { echo 'selected="selected"'; } ?>>17</option>
                <option value="18" <?php if ($datanas1m == '18') { echo 'selected="selected"'; } ?>>18</option>
                <option value="19" <?php if ($datanas1m == '19') { echo 'selected="selected"'; } ?>>19</option>
                <option value="20" <?php if ($datanas1m == '20') { echo 'selected="selected"'; } ?>>20</option>
                <option value="21" <?php if ($datanas1m == '21') { echo 'selected="selected"'; } ?>>21</option>
                <option value="22" <?php if ($datanas1m == '22') { echo 'selected="selected"'; } ?>>22</option>
                <option value="23" <?php if ($datanas1m == '23') { echo 'selected="selected"'; } ?>>23</option>
                <option value="24" <?php if ($datanas1m == '24') { echo 'selected="selected"'; } ?>>24</option>
                <option value="25" <?php if ($datanas1m == '25') { echo 'selected="selected"'; } ?>>25</option>
                <option value="26" <?php if ($datanas1m == '26') { echo 'selected="selected"'; } ?>>26</option>
                <option value="27" <?php if ($datanas1m == '27') { echo 'selected="selected"'; } ?>>27</option>
                <option value="28" <?php if ($datanas1m == '28') { echo 'selected="selected"'; } ?>>28</option>
                <option value="29" <?php if ($datanas1m == '29') { echo 'selected="selected"'; } ?>>29</option>
                <option value="30" <?php if ($datanas1m == '30') { echo 'selected="selected"'; } ?>>30</option>
                <option value="31" <?php if ($datanas1m == '31') { echo 'selected="selected"'; } ?>>31</option>
              </select>

              <select id="dataevento_ano" name="dataevento_ano" style="width: 60px; float: left; margin-left: 2px;">
                <option value="">--</option>
                <option value="2016" <?php if ($datanas1y == '2016') { echo 'selected="selected"'; } ?>>2016</option>
                <option value="2017" <?php if ($datanas1y == '2017') { echo 'selected="selected"'; } ?>>2017</option>
                <option value="2018" <?php if ($datanas1y == '2018') { echo 'selected="selected"'; } ?>>2018</option>
                <option value="2019" <?php if ($datanas1y == '2019') { echo 'selected="selected"'; } ?>>2019</option>
                <option value="2020" <?php if ($datanas1y == '2020') { echo 'selected="selected"'; } ?>>2020</option>
                <option value="2021" <?php if ($datanas1y == '2021') { echo 'selected="selected"'; } ?>>2021</option>
                <option value="2022" <?php if ($datanas1y == '2022') { echo 'selected="selected"'; } ?>>2022</option>
              </select>
            </div>


              <div style="float: left; width: 100%; margin-bottom: 10px;">
                           <div style="margin-left: 30px; text-align: left;">Link do ingresso: </div>
                           <input class="input_video" type="text" name="link" value="">
               </div>




               <div style="float: left; width: 210px;text-align: left; height: 78px; margin-left: 28px;">
                 <div style="margin-right: 5px;">
               		<?php /* <form action="#" role="form" class="form-horizontal" id="location" method="post" accept-charset="utf-8"> */ ?>
               		<div class="form-group">
               		<div class="col-sm-4">
               		<div style="margin-bottom: 5px;">País:</div>
               		<select name="pais" class="form-control countries" id="countryId" style="width: 100%;">
               		<option value="">Selecionar Pais</option>
               		</select>
               		</div>
               		</div>
                 </div>
               </div>

               <div style="float: left; width: 210px;text-align: left; height: 78px;">
                 <div style="margin-left: 0px; margin-right: 7px;">
               		<div class="form-group">
               		<div class="col-sm-4">
               		<div style="margin-bottom: 5px;">Estado:</div>

               		<select name="estado" class="form-control states" id="stateId" style="width: 100%;">
               		<option value="">Selecionar Estado</option>
               		</select>
               		</div>
               		</div>
                 </div>
               </div>

               <div style="float: left; width: 225px;text-align: left; height: 78px;">
                 <div style="margin-left: 0px; margin-right: 7px;">
               		<div class="form-group">
               		<div class="col-sm-4">
               		<div style="margin-bottom: 5px;">Cidade:</div>
                   <input class="input_video" type="text" name="cidade" id="frmcidade" value="">
               		</div>
               		</div>
                 </div>
               </div>

               <script src="http://letts.com.br/wp-content/themes/magazine/country/js/location.js"></script>

               <p style="margin: 10px 0px 5px; text-align: left; margin-left: 30px;">Tipo do evento:</p>
               <select id="tipo_evento" name="tipo_evento" style="width: 628px; height: 35px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; float: right; margin-top: -5px; margin-right: 29px;">
                       <option value="">-- Selecione --</option>
                       <option value="Campeonato">Campeonato</option>
                       <option value="Show">Show</option>
                       <option value="Festa">Festa</option>
                       <option value="Outros">Outros</option>
                </select>

             <div class="selects_forms" style="margin-top: -10px;">
                <p style="margin: 10px 0px -10px; text-align: left; margin-left: 30px;">Selecione apenas uma opção: Esporte ou Profissão:</p>
                <select id="atletaesporte" name="esporte" style="width: 310px; height: 35px; margin-bottom: 14px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; margin-top: 10px; margin-left: 22px;">
                        <option value="">-- Selecione o esporte --</option>
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

                 <select id="profissao" name="profissao" style="width: 310px; margin-bottom: 14px; height: 35px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; float: right; margin-top: 10px; margin-right: 5px;">
                      <option value="">-- Selecione a profissão --</option>
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


              <div class="foto_principal" style="margin-left: 30px;">
                <p>Foto principal:</p>
                <div class="custom-upload">
                    <input type="file" name="img_destacada" id="idimgdestacada">
                    <div class="fake-file">
                        <input disabled="disabled">
                    </div>
                </div>
              </div>

              <div class="foto_principal" style="margin-top: 30px; margin-bottom: 20px; margin-left: 30px;">
                <p>Foto Flyer:</p>
                <div class="custom-upload">
                    <input type="file" name="img_evento1" id="idimgevento">
                    <div class="fake-file">
                        <input disabled="disabled">
                    </div>
                </div>
              </div>

              <div style="margin-left: 30px; text-align: left; float: left; width: 100%;">Descrição do evento:</div>
              <textarea id="iddescricaoevento" class="" name="descricao_evento" style="margin-left: 6px; width: 91%; height: 115px;"></textarea>

             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">

             <input type="button" id="postarevento" style="  background: #ff8920 !important;
                                  color: #fff;
                                  border: none;
                                  padding: 7px 20px;
                                  cursor: pointer;
                                  letter-spacing: .1em;
                                  font-size: 1.125em;
                                  font-family: Oswald, sans-serif;
                                  text-transform: uppercase;
                                  -webkit-appearance: none;
                                  -webkit-border-radius: 0;float: right; margin-top: 0px;margin-left: 300px;margin-right: 29px;" value="Enviar Evento">
                                  <br>&nbsp;<br>
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
                <h1 style="text-transform: uppercase; margin-bottom: -13px; font-weight: bold;">Área Restrita</h1>
                <p style="margin: 4px 0px 20px;">Para realizar esta ação é necessario ser cadastrado.</p>
                <a href="/wp-content/themes/magazine/logout.php" id="criar" style="background: #f57300; text-decoration: none; padding: 5px 20px; color: #FFFFFF;">Criar Nova Conta.</a>
          </div>
    <?php } ?>

<?php get_footer(); ?>

<script type="text/javascript">
$("#atletaesporte").change(function() {
  $("#profissao").hide();
  $("#atletaesporte").css('width','629px');
})

$("#profissao").change(function() {
  $("#atletaesporte").hide();
  $("#profissao").css('width','629px');
})

$('.custom-upload input[type=file]').change(function(){
    $(this).next().find('input').val($(this).val());
});

</script>
