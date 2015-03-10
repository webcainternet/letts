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
          'post_status'   => 'publish',
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


    add_post_meta($cur_post_id, 'fotoacessorio', $attach_id, true);
    add_post_meta($cur_post_id, 'post_image', $filename, true);
    add_post_meta($cur_post_id, 'fotoanuncio1', $attach_id1, true);
    add_post_meta($cur_post_id, 'fotoanuncio2', $attach_id2, true);
    add_post_meta($cur_post_id, 'fotoanuncio3', $attach_id3, true);
    add_post_meta($cur_post_id, 'basicaemail', $_POST['email'], true);
    add_post_meta($cur_post_id, 'acessoriovalor', $_POST['valor'], true);
    add_post_meta($cur_post_id, 'acessorioestado', $_POST['tipo_acessorio'], true);
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
             <select name="tipo_acessorio" id="tipo_acessorio">
              <option value="">Tipo do acessório</option>
              <option value="Novo">Novo</option>
              <option value="Usado">Usado</option>
             </select>

              <div class="foto_principal">
                <p>Foto principal</p>
                <input type="file" class="custom-file-input input_file" name="img_destacada">
              </div>

              <div class="fotos_adicionais">
                <p>Fotos adicionais</p>
                <input type="file" class="custom-file-input input_file" name="img_acessorio1">
                <input type="file" class="custom-file-input input_file" name="img_acessorio2">
                <input type="file" class="custom-file-input input_file" name="img_acessorio3">
              </div>  

             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">
             <input type="submit" value="Enviar Acessório">
            </form> 
          </div>
        </div>  


  <div id="contentwrap">
  
    <!-- /content -->
    <?php themify_content_after(); // hook ?>

  <?php endwhile ?>
<?php get_footer(); ?>