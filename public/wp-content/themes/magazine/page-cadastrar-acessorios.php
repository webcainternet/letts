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
          'post_title'    => $_POST['acessorio'],
          'post_status'   => 'pending',
          'post_type'     => 'acessorios',
          'post_author'   => 1
        );

$path = "wp-content/uploads/acessorios/"; 

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

  //Arquivo Acessório 1
  $name1 = $_FILES['img_acessorio1']['name'];
  $size1 = $_FILES['img_acessorio1']['size'];

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
          $tmp = $_FILES['img_acessorio1']['tmp_name'];
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

  //Arquivo Acessório 2
  $name2 = $_FILES['img_acessorio2']['name'];
  $size2 = $_FILES['img_acessorio2']['size'];

  $file_info = pathinfo($name2);
  $name2 = md5($name2) .'.'. $file_info['extension'];

  if(strlen($name2))
    {
      list($txt, $ext) = explode(".", $name2);
      if(in_array($ext,$valid_formats))
      {
      if($size2<(10240*10240))
        {
          $actual_name2 = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
          $tmp = $_FILES['img_acessorio2']['tmp_name'];
          if(move_uploaded_file($tmp, $path.$actual_name2))
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

 //Arquivo Acessório 3
  $name3 = $_FILES['img_acessorio3']['name'];
  $size3 = $_FILES['img_acessorio3']['size'];

  $file_info = pathinfo($name3);
  $name3 = md5($name3) .'.'. $file_info['extension'];

  if(strlen($name3))
    {
      list($txt, $ext) = explode(".", $name3);
      if(in_array($ext,$valid_formats))
      {
      if($size3<(10240*10240))
        {
          $actual_name3 = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
          $tmp = $_FILES['img_acessorio3']['tmp_name'];
          if(move_uploaded_file($tmp, $path.$actual_name3))
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

    $filename  = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name;
    $filename1 = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name1;
    $filename2 = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name2;
    $filename3 = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name3;

    //Img Destacada
    $wp_filetype = wp_check_filetype(basename($filename), null );
    $attachment = array(
      'post_mime_type' => $wp_filetype['type'],
      'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
      'post_content' => '',
      'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
    
    //Img Acessório 1
    $wp_filetype1 = wp_check_filetype(basename($filename1), null );
    $attachment1 = array(
      'post_mime_type' => $wp_filetype1['type'],
      'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename1)),
      'post_content' => '',
      'post_status' => 'inherit'
    );
    $attach_id1 = wp_insert_attachment($attachment1, $filename1, $cur_post_id);
    
    //Img Acessório 2
    $wp_filetype2 = wp_check_filetype(basename($filename2), null );
    $attachment2 = array(
      'post_mime_type' => $wp_filetype2['type'],
      'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename2)),
      'post_content' => '',
      'post_status' => 'inherit'
    );
    $attach_id2 = wp_insert_attachment($attachment2, $filename2, $cur_post_id);
    
    //Img Acessório 3
    $wp_filetype3 = wp_check_filetype(basename($filename3), null );
    $attachment3 = array(
      'post_mime_type' => $wp_filetype3['type'],
      'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename3)),
      'post_content' => '',
      'post_status' => 'inherit'
    );
    $attach_id3 = wp_insert_attachment($attachment3, $filename3, $cur_post_id);        

    if ($actual_name) {
      add_post_meta($cur_post_id, 'fotoacessorio', $attach_id, true);
    }
    
    if ($actual_name1) {
      add_post_meta($cur_post_id, 'fotoanuncio1', $attach_id1, true);
    }
    if ($actual_name2) {
      add_post_meta($cur_post_id, 'fotoanuncio2', $attach_id2, true);
    }
    if ($actual_name3) {
      add_post_meta($cur_post_id, 'fotoanuncio3', $attach_id3, true);
    }
    
    add_post_meta($cur_post_id, 'post_image', $filename, true);
    add_post_meta($cur_post_id, 'basicaemail', $_POST['email'], true);
    add_post_meta($cur_post_id, 'acessoriovalor', $_POST['valor'], true);
    add_post_meta($cur_post_id, 'acessorioestado', $_POST['tipo_acessorio'], true);
    add_post_meta($cur_post_id, 'atletaesporte', $_POST['esporte'], true);
    add_post_meta($cur_post_id, 'profissao', $_POST['profissao'], true);

    $destinatario = "renato.botani@letts.com.br";  

    $headers = "From: $destinatario \r\n";
    $headers.= "Content-Type: text/html; charset=ISO-8859-1 ";
    $headers.= "MIME-Version: 1.0 ";    

    $html = 'Você tem uma nova postagem de Acessório para aprovação';

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
          <p id="sucesso">Acessório cadastrado com sucesso.</p>
          <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; font-size: 45px; font-weight: bold; margin-bottom: 10px;">Cadastrar Acessório</h4>
          <div class="galeria_profissional">
            <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
             <input class="input_video" type="text" name="acessorio" value="" placeholder="Acessório">
             <input class="input_video" type="text" name="valor" value="" placeholder="Valor">
             <div class="selects_forms" style="margin-top: -10px; width: 662px;">
              <p style="margin: 10px 0px -10px;">Selecione apenas uma opção: Esporte ou Profissão</p>
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

                 <select id="profissao" name="profissao" style="width: 310px; margin-bottom: 14px; height: 35px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; float: right; margin-top: 10px; margin-right: 5px;">
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

             <select name="tipo_acessorio" id="tipo_acessorio">
              <option value="">Tipo do acessório</option>
              <option value="Novo">Novo</option>
              <option value="Usado">Usado</option>
             </select>
                  
              <div class="foto_principal">
                <p>Foto principal</p>
                <div class="custom-upload">
                    <input type="file" name="img_destacada">
                    <div class="fake-file">
                        <input disabled="disabled" placeholder="Selecione uma Imagem">
                    </div>
                </div>
              </div>

              <div class="fotos_adicionais" style="margin-top: 40px; margin-bottom: 10px;">
                <p>Fotos adicionais</p>

                <div class="custom-upload">
                    <input type="file" name="img_acessorio1">
                    <div class="fake-file">
                        <input disabled="disabled" placeholder="Selecione uma Imagem">
                    </div>
                </div>

                <div class="custom-upload">
                    <input type="file" name="img_acessorio2">
                    <div class="fake-file">
                        <input disabled="disabled" placeholder="Selecione uma Imagem">
                    </div>
                </div>

                <div class="custom-upload">
                    <input type="file" name="img_acessorio3">
                    <div class="fake-file">
                        <input disabled="disabled" placeholder="Selecione uma Imagem">
                    </div>
                </div>
              </div>  

             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">
             <div class="botao_enviar"><input type="submit" value="Enviar Acessório"></div>
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