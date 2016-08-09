<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<script src="http://alfabetoauto.webca.com.br/country/js/location.js"></script>

<script type="text/javascript">
   $(document).ready(function(){
     $("#salvaacessorio").click(function(){
       if ($( "#acessorio" ).val() == "") {
         alert( "Você deve preencher o nome do acessório!" );
         $( "#acessorio" ).focus();
         } else {
           if ($("#moeda").val() == "") {
             alert("Você deve preencher a moeda do acessório" );
             $( "#moeda" ).focus();
           } else {
             if ($("#valor").val() == "") {
               alert("Você deve preencher o valor do acessório" );
               $( "#valor" ).focus();
             } else {
               if ($("#countryId").val() == "" && $("#txtcountry").text() == "" ) {
                 alert("Você deve preencher o pais do acessório" );
                 $( "#countryId" ).focus();
               } else {
                 if ($("#stateId").val() == "" && $("#txtstate").text() == "" ) {
                   alert("Você deve preencher o estado do acessório" );
                   $( "#stateId" ).focus();
                 } else {
                   if ($("#frmcidade").val() == "") {
                     alert("Você deve preencher a cidade do acessório" );
                     $( "#frmcidade" ).focus();
                   } else {
                     if ($( "#catacessorio" ).val() == "" ) {
                       alert( "Você deve selecionar a categoria do acessorio" );
                       $( "#catacessorio" ).focus();
                     } else {
                       if ($( "#acessorioestado" ).val() == "" ) {
                         alert( "Você deve selecionar o estado do acessorio" );
                         $( "#acessorioestado" ).focus();
                       } else {
                         var varcheck0 = 0;
                         if ($("#fotoadd0").val() == '') { varcheck0 = 1;}
                         if ($( "#idimgdestacada" ).val() != '') { varcheck0 = 1;}
                         if (varcheck0 == 0) {
                           alert( "Você deve selecionar a imagem!" );
                         } else {
                           var varcheck1 = 0;
                           if ($("#fotoadd1").val() == '') { varcheck1 = 1;}
                           if ($("#fotoadd2").val() == '') { varcheck1 = 1;}
                           if ($("#fotoadd3").val() == '') { varcheck1 = 1;}
                           if ($("#fotoadd4").val() == '') { varcheck1 = 1;}
                           if ($("#fotoadd5").val() == '') { varcheck1 = 1;}
                           if ($("#fotoadd6").val() == '') { varcheck1 = 1;}
                           if ($( "#img_anuncio1" ).val() != '') { varcheck1 = 1;}
                           if ($( "#img_anuncio2" ).val() != '') { varcheck1 = 1;}
                           if ($( "#img_anuncio3" ).val() != '') { varcheck1 = 1;}
                           if ($( "#img_anuncio4" ).val() != '') { varcheck1 = 1;}
                           if ($( "#img_anuncio5" ).val() != '') { varcheck1 = 1;}
                           if ($( "#img_anuncio6" ).val() != '') { varcheck1 = 1;}
                           if (varcheck1 == 0) {
                             alert( "Você deve selecionar pelo menos uma foto adicional" );
                           } else {
                             if ($( "#descricao_acessorio" ).val() == "") {
                               alert( "Você deve preencher a descrição do acessório!" );
                               $( "#descricao_acessorio" ).focus();
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
       });

      $("#removerfoto0").click(function(){ excluircustomf(<?php echo $_GET['idacessoriog']; ?>,'fotoacessorio'); });
      $("#removerfoto1").click(function(){ excluircustomf(<?php echo $_GET['idacessoriog']; ?>,'fotoanuncio1'); });
      $("#removerfoto2").click(function(){ excluircustomf(<?php echo $_GET['idacessoriog']; ?>,'fotoanuncio2'); });
      $("#removerfoto3").click(function(){ excluircustomf(<?php echo $_GET['idacessoriog']; ?>,'fotoanuncio3'); });
      $("#removerfoto4").click(function(){ excluircustomf(<?php echo $_GET['idacessoriog']; ?>,'fotoanuncio4'); });
      $("#removerfoto5").click(function(){ excluircustomf(<?php echo $_GET['idacessoriog']; ?>,'fotoanuncio5'); });
      $("#removerfoto6").click(function(){ excluircustomf(<?php echo $_GET['idacessoriog']; ?>,'fotoanuncio6'); });
   });

   function excluircustomf(idpost, customname) {
 		var txt;
 		var r = confirm("Tem certeza que deseja remover a foto?");
 		if (r == true) {
 					$.ajax({
 					method: "POST",
 					url: "/wp-content/themes/magazine/excluircustomf.php",
 					data: { idpost: idpost, customname: customname }
 					})
 					.done(function( msg ) {
 						var n = msg.indexOf("statusok");
 						if (n == -1) {
 							alert('Erro ao excluir a foto do acessório');
 						} else {
 							//alert('Acessório excluido com sucesso!');
 							//window.location.href = window.location.pathname;
              if (customname == 'fotoanuncio1') { $('#fotoadd1').remove(); $('#removerimg1').remove(); }
              if (customname == 'fotoanuncio2') { $('#fotoadd2').remove(); $('#removerimg2').remove(); }
              if (customname == 'fotoanuncio3') { $('#fotoadd3').remove(); $('#removerimg3').remove(); }
              if (customname == 'fotoanuncio4') { $('#fotoadd4').remove(); $('#removerimg4').remove(); }
              if (customname == 'fotoanuncio5') { $('#fotoadd5').remove(); $('#removerimg5').remove(); }
              if (customname == 'fotoanuncio6') { $('#fotoadd6').remove(); $('#removerimg6').remove(); }
              if (customname == 'fotoacessorio') { $('#fotoadd0').remove(); $('#removerimg0').remove(); }
 						}
 					});
     		}
     	}
 </script>

<?php
/** Themify Default Variables
 *  @var object */
global $themify; ?>

<?php
if ($_GET['idacessoriog'] == "") {
  echo "<h3 style='text-align: center; padding: 15px;'>Erro: Não foi selecionado o acessório para edição!</h3>"; exit;
}
?>

<?php
function selectedopt($value, $selected){
    return $value==$selected ? ' selected="selected"' : '';
}
?>

  <?php if ($_POST){


    $my_post = array(
          'ID' => $_GET['idacessoriog'],
          'post_title'    => $_POST['acessorio'],
          'post_content'    => $_POST['descricao_acessorio'],
        );

    $cur_post_id = wp_update_post($my_post);

    update_post_meta($_GET['idacessoriog'], 'acessoriovalor', $_POST['valor']);
    update_post_meta($_GET['idacessoriog'], 'acessorioestado', $_POST['acessorioestado']);
    update_post_meta($_GET['idacessoriog'], 'catacessorio', $_POST['catacessorio']);
    update_post_meta($_GET['idacessoriog'], 'moeda', $_POST['moeda']);
    update_post_meta($_GET['idacessoriog'], 'basicapaisatual', $_POST['pais']);
    update_post_meta($_GET['idacessoriog'], 'basicaestadoatual', $_POST['estado']);
    update_post_meta($_GET['idacessoriog'], 'basicacidadeatual', $_POST['cidade']);


    /* *** UPLOADS *** */
    $path = "wp-content/uploads/acessorios/";
    $valid_formats = array("jpg", "gif", "png", "tif", "jpeg", "JPG", "GIF", "PNG", "TIF", "JPEG");
    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
    {


      //Arquivo fotoacessorio
      $name = $_FILES['idimgdestacada']['name'];
      $size = $_FILES['idimgdestacada']['size'];
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
            $tmp = $_FILES['idimgdestacada']['tmp_name'];
            if(move_uploaded_file($tmp, $path.$actual_name))
              { $response['response']="Arquivo OK"; }
            else { $response['response']="Falhou"; }
          }
          else { $response['response']="Arquivo tem mais de 4MB"; }
        } else { $response['response']="Formato Inválido"; }
      } else { $response['response']="Selecione um arquivo"; }

      $filename  = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name;
      if ($actual_name != "") {
        $wp_filetype = wp_check_filetype(basename($filename), null );
        $attachment = array(
          'post_mime_type' => $wp_filetype['type'],
          'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
          'post_content' => '',
          'post_status' => 'inherit'
        );
        $attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
        update_post_meta($cur_post_id, 'fotoacessorio', $attach_id);
      }

      //Arquivo img_anuncio1
      if ($_FILES['img_anuncio1']['name'] == '') { } else {
        $name = $_FILES['img_anuncio1']['name'];
        $size = $_FILES['img_anuncio1']['size'];
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
              $tmp = $_FILES['img_anuncio1']['tmp_name'];
              if(move_uploaded_file($tmp, $path.$actual_name))
                { $response['response']="Arquivo OK"; }
              else { $response['response']="Falhou"; }
            }
            else { $response['response']="Arquivo tem mais de 4MB"; }
          } else { $response['response']="Formato Inválido"; }
        } else { $response['response']="Selecione um arquivo"; }

        $filename  = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name;
        if ($actual_name != "") {
          $wp_filetype = wp_check_filetype(basename($filename), null );
          $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
          );
          $attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
          update_post_meta($cur_post_id, 'fotoanuncio1', $attach_id);
        }
      }

      //Arquivo img_anuncio2
      if ($_FILES['img_anuncio2']['name'] == '') { } else {
        $name = $_FILES['img_anuncio2']['name'];
        $size = $_FILES['img_anuncio2']['size'];
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
              $tmp = $_FILES['img_anuncio2']['tmp_name'];
              if(move_uploaded_file($tmp, $path.$actual_name))
                { $response['response']="Arquivo OK"; }
              else { $response['response']="Falhou"; }
            }
            else { $response['response']="Arquivo tem mais de 4MB"; }
          } else { $response['response']="Formato Inválido"; }
        } else { $response['response']="Selecione um arquivo"; }

        $filename  = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name;
        if ($actual_name != "") {
          $wp_filetype = wp_check_filetype(basename($filename), null );
          $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
          );
          $attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
          update_post_meta($cur_post_id, 'fotoanuncio2', $attach_id);
        }
      }

      //Arquivo img_anuncio3
      if ($_FILES['img_anuncio3']['name'] == '') { } else {
        $name = $_FILES['img_anuncio3']['name'];
        $size = $_FILES['img_anuncio3']['size'];
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
              $tmp = $_FILES['img_anuncio3']['tmp_name'];
              if(move_uploaded_file($tmp, $path.$actual_name))
                { $response['response']="Arquivo OK"; }
              else { $response['response']="Falhou"; }
            }
            else { $response['response']="Arquivo tem mais de 4MB"; }
          } else { $response['response']="Formato Inválido"; }
        } else { $response['response']="Selecione um arquivo"; }

        $filename  = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name;
        if ($actual_name != "") {
          $wp_filetype = wp_check_filetype(basename($filename), null );
          $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
          );
          $attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
          update_post_meta($cur_post_id, 'fotoanuncio3', $attach_id);
        }
      }

      //Arquivo img_anuncio4
      if ($_FILES['img_anuncio4']['name'] == '') { } else {
        $name = $_FILES['img_anuncio4']['name'];
        $size = $_FILES['img_anuncio4']['size'];
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
              $tmp = $_FILES['img_anuncio4']['tmp_name'];
              if(move_uploaded_file($tmp, $path.$actual_name))
                { $response['response']="Arquivo OK"; }
              else { $response['response']="Falhou"; }
            }
            else { $response['response']="Arquivo tem mais de 4MB"; }
          } else { $response['response']="Formato Inválido"; }
        } else { $response['response']="Selecione um arquivo"; }

        $filename  = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name;
        if ($actual_name != "") {
          $wp_filetype = wp_check_filetype(basename($filename), null );
          $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
          );
          $attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
          update_post_meta($cur_post_id, 'fotoanuncio4', $attach_id);
        }
      }

      //Arquivo img_anuncio5
      if ($_FILES['img_anuncio5']['name'] == '') { } else {
        $name = $_FILES['img_anuncio5']['name'];
        $size = $_FILES['img_anuncio5']['size'];
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
              $tmp = $_FILES['img_anuncio5']['tmp_name'];
              if(move_uploaded_file($tmp, $path.$actual_name))
                { $response['response']="Arquivo OK"; }
              else { $response['response']="Falhou"; }
            }
            else { $response['response']="Arquivo tem mais de 4MB"; }
          } else { $response['response']="Formato Inválido"; }
        } else { $response['response']="Selecione um arquivo"; }

        $filename  = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name;
        if ($actual_name != "") {
          $wp_filetype = wp_check_filetype(basename($filename), null );
          $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
          );
          $attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
          update_post_meta($cur_post_id, 'fotoanuncio5', $attach_id);
        }
      }

      //Arquivo img_anuncio6
      if ($_FILES['img_anuncio6']['name'] == '') { } else {
        $name = $_FILES['img_anuncio6']['name'];
        $size = $_FILES['img_anuncio6']['size'];
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
              $tmp = $_FILES['img_anuncio6']['tmp_name'];
              if(move_uploaded_file($tmp, $path.$actual_name))
                { $response['response']="Arquivo OK"; }
              else { $response['response']="Falhou"; }
            }
            else { $response['response']="Arquivo tem mais de 4MB"; }
          } else { $response['response']="Formato Inválido"; }
        } else { $response['response']="Selecione um arquivo"; }

        $filename  = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name;
        if ($actual_name != "") {
          $wp_filetype = wp_check_filetype(basename($filename), null );
          $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
          );
          $attach_id = wp_insert_attachment($attachment, $filename, $cur_post_id);
          update_post_meta($cur_post_id, 'fotoanuncio6', $attach_id);
        }
      }





    }





  ?>


      <script type="text/javascript">
        $(document).ready(function(){
          //$('#sucesso').show();
          window.location='/classificados/?msgsucess=2';
        })
      </script>


  <?php } else { ?>


  <?php
   query_posts( array('p' => $_GET['idacessoriog'], 'post_type'=>array('acessorios')) );
    while ( have_posts() ) : the_post();

      $conteudo1 = get_the_content();

    	$nomeevento = get_the_title();
    	$acessoriovalor = get_custom_field('acessoriovalor');
      $acessorioestado = get_custom_field('acessorioestado');
    	$eventotipo = get_custom_field('eventotipo');
    	$basicapaisatual = get_custom_field('basicapaisatual');
      $basicaestadoatual = get_custom_field('basicaestadoatual');
      $basicacidadeatual = get_custom_field('basicacidadeatual');
      $catacessoriosdb = get_custom_field('catacessorio');
      $moedaatual = get_custom_field('moeda');

    	//$custom_fields = get_post_custom(3835);
  	// $my_custom_field = $custom_fields['tipo_evento'];
?>

        <div style="width: 685px; margin: 0 auto; text-align: center; padding: 40px 0px;" >
          <p id="sucesso">Evento salvo com sucesso.</p>
          <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; font-size: 45px; font-weight: bold; margin-bottom: 10px;">Editar Acessório</h4>
          <div class="galeria_profissional">

            <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">

              <div style="float: left; width: 462px; text-align: left;">
                  Titulo:<br>
                  <input maxlength="100" id="acessorio" class="input_video" type="text" name="acessorio"  value="<?php echo $nomeevento; ?>" style="max-width: 100%;">
              </div>

              <div style="float: left;width: 60px;text-align: left;margin-left: 20px;">
                  Moeda:<br>
                  <select name="moeda" id="moeda" style="width: 60px; height: 33px;">
                    <option value="">--</option>
                    <option value="US$" <?php echo selectedopt("US$", $moedaatual); ?>>US$</option>
                    <option value="R$" <?php echo selectedopt("R$", $moedaatual); ?>>R$</option>
                    <option value="€" <?php echo selectedopt("€", $moedaatual); ?>>€</option>
                    <option value="Mex$" <?php echo selectedopt("Mex$", $moedaatual); ?>>Mex$</option>
                    <option value="$MN" <?php echo selectedopt("$MN", $moedaatual); ?>>$MN</option>
                    <option value="C$" <?php echo selectedopt("C$", $moedaatual); ?>>C$</option>
                    <option value="NZ$" <?php echo selectedopt("NZ$", $moedaatual); ?>>NZ$</option>
                    <option value="A$" <?php echo selectedopt("A$", $moedaatual); ?>>A$</option>
                    <option value="HK$" <?php echo selectedopt("HK$", $moedaatual); ?>>HK$</option>
                    <option value="Ø" <?php echo selectedopt("Ø", $moedaatual); ?>>Ø</option>
                    <option value="$" <?php echo selectedopt("$", $moedaatual); ?>>$</option>
                    <option value="¥" <?php echo selectedopt("¥", $moedaatual); ?>>¥</option>
                    <option value="£" <?php echo selectedopt("£", $moedaatual); ?>>£</option>
                    <option value="?" <?php echo selectedopt("?", $moedaatual); ?>>?</option>
                    <option value="?" <?php echo selectedopt("?", $moedaatual); ?>>?</option>
                    <option value="£" <?php echo selectedopt("£", $moedaatual); ?>>£</option>
                    <option value="Q" <?php echo selectedopt("Q", $moedaatual); ?>>Q</option>
                    <option value="L" <?php echo selectedopt("L", $moedaatual); ?>>L</option>
                    <option value="¢" <?php echo selectedopt("¢", $moedaatual); ?>>¢</option>
                    <option value="?" <?php echo selectedopt("?", $moedaatual); ?>>?</option>
                    <option value="Bs" <?php echo selectedopt("Bs", $moedaatual); ?>>Bs</option>
                    <option value="Rp" <?php echo selectedopt("Rp", $moedaatual); ?>>Rp</option>
                    <option value="CFA" <?php echo selectedopt("CFA", $moedaatual); ?>>CFA</option>
                    <option value="Fr" <?php echo selectedopt("Fr", $moedaatual); ?>>Fr</option>
                    <option value="Kz" <?php echo selectedopt("Kz", $moedaatual); ?>>Kz</option>
                    <option value="kr" <?php echo selectedopt("kr", $moedaatual); ?>>kr</option>
                    <option value="zl" <?php echo selectedopt("zl", $moedaatual); ?>>zl</option>
                    <option value="Ft" <?php echo selectedopt("Ft", $moedaatual); ?>>Ft</option>
                    <option value="COP" <?php echo selectedopt("COP", $moedaatual); ?>>COP</option>
                  </select>
              </div>

              <div style="float: left;width: 70px;text-align: left;margin-left: 5px;">
                  Valor:<br>
                  <input id="valor" onkeyup='if (isNaN(this.value)) {this.value = ""}' class="input_video" type="text" name="valor" maxlength="9" style="max-width: 100%;" value="<?php echo $acessoriovalor; ?>">
              </div>





                            <div style="float: left; width: 210px;text-align: left; height: 78px;">
                              <div style="margin-right: 5px;">
                            		<?php /* <form action="#" role="form" class="form-horizontal" id="location" method="post" accept-charset="utf-8"> */ ?>
                            		<div class="form-group">
                            		<div class="col-sm-4">
                            		<div style="margin-bottom: 5px;">País:</div>
                                <script>
                                  showCountry(<?php print_custom_field('basicapaisatual'); ?>, 'txtcountry');
                                </script>
                                <div id="spanpais" style="background-color: #FFF;
                                                          width: 197px;
                                                          padding: 3px;
                                                          border: solid 1px #888888;" >
                                  <span id="txtcountry" style="color: #999; font-size: 14px;"></span> <a><span onclick="document.getElementById('editarpais').style.display = 'block';document.getElementById('editarestado').style.display = 'block';document.getElementById('spanpais').style.display = 'none';document.getElementById('spanestado').style.display = 'none';"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                                </div>

                                <div style="display: none;" id="editarpais">
                                  <select name="pais" class="form-control countries" id="countryId" style="width: 100%;">
                               		   <option value="">Selecionar Pais</option>
                               		</select>
                                </div>
                            		</div>
                            		</div>
                              </div>
                            </div>

                            <div style="float: left; width: 210px;text-align: left; height: 78px;">
                              <div style="margin-left: 0px; margin-right: 7px;">
                            		<div class="form-group">
                            		<div class="col-sm-4">
                            		<div style="margin-bottom: 5px;">Estado:</div>
                                <script>
                                  showState(<?php print_custom_field('basicaestadoatual'); ?>, 'txtstate');
                                </script>
                                <div id="spanestado" style="background-color: #FFF;
                                                          width: 197px;
                                                          padding: 3px;
                                                          border: solid 1px #888888;" >
                                  <span id="txtstate" style="color: #999; font-size: 14px;"></span> <a><span onclick="document.getElementById('editarpais').style.display = 'block';document.getElementById('editarestado').style.display = 'block';document.getElementById('spanpais').style.display = 'none';document.getElementById('spanestado').style.display = 'none';"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                                </div>

                                <div style="display: none;" id="editarestado">
                                  <select name="estado" class="form-control states" id="stateId" style="width: 100%;">
                               		<option value="">Selecionar Estado</option>
                               		</select>
                                </div>
                            		</div>
                            		</div>
                              </div>
                            </div>

                            <div style="float: left; width: 225px;text-align: left; height: 78px;">
                              <div style="margin-left: 0px; margin-right: 7px;">
                            		<div class="form-group">
                            		<div class="col-sm-4">
                            		<div style="margin-bottom: 5px;">Cidade:</div>
                                <input class="input_video" type="text" name="cidade" id="frmcidade"  value="<?php echo $basicacidadeatual; ?>">
                            		</div>
                            		</div>
                              </div>
                            </div>





              <div class="fotos_adicionais" style="margin-top: 0px; margin-bottom: -10px;">

                <p>Categoria:</p>
                <select id="catacessorio" name="catacessorio" style="width: 629px; height: 35px; margin-bottom: 14px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; ">
                        <option value="">-- Selecione --</option>
                        <option value="Arte e Artesanato" <?php echo selectedopt("Arte e Artesanato", $catacessoriosdb); ?>>Arte e Artesanato</option>
                        <option value="Bolsas, Malas e Mochilas" <?php echo selectedopt("Bolsas, Malas e Mochilas", $catacessoriosdb); ?>>Bolsas, Malas e Mochilas</option>
                        <option value="Câmeras e Acessórios" <?php echo selectedopt("Câmeras e Acessórios", $catacessoriosdb); ?>>Câmeras e Acessórios</option>
                        <option value="Fitness" <?php echo selectedopt("Fitness", $catacessoriosdb); ?>>Fitness</option>
                        <option value="Relógios e Óculos " <?php echo selectedopt("Relógios e Óculos ", $catacessoriosdb); ?>>Relógios e Óculos </option>
                        <option value="Roupas e Calçados" <?php echo selectedopt("Roupas e Calçados", $catacessoriosdb); ?>>Roupas e Calçados</option>
                        <option value="Saúde e Beleza" <?php echo selectedopt("Saúde e Beleza", $catacessoriosdb); ?>>Saúde e Beleza</option>
                        <option value="Aeromodelismo e WingWalking" <?php echo selectedopt("Aeromodelismo e WingWalking", $catacessoriosdb); ?>>Aeromodelismo e WingWalking</option>
                        <option value="Asa Delta, Parapente e Paramotor" <?php echo selectedopt("Asa Delta, Parapente e Paramotor", $catacessoriosdb); ?>>Asa Delta, Parapente e Paramotor</option>
                        <option value="Balonismo" <?php echo selectedopt("Balonismo", $catacessoriosdb); ?>>Balonismo</option>
                        <option value="Barco e Jet Ski" <?php echo selectedopt("Barco e Jet Ski", $catacessoriosdb); ?>>Barco e Jet Ski</option>
                        <option value="Bicicleta" <?php echo selectedopt("Bicicleta", $catacessoriosdb); ?>>Bicicleta</option>
                        <option value="Bungee jumping" <?php echo selectedopt("Bungee jumping", $catacessoriosdb); ?>>Bungee jumping</option>
                        <option value="Canoagem e Rafting" <?php echo selectedopt("Canoagem e Rafting", $catacessoriosdb); ?>>Canoagem e Rafting</option>
                        <option value="Automobilismo, Quadriciclo e Off Road" <?php echo selectedopt("Automobilismo, Quadriciclo e Off Road", $catacessoriosdb); ?>>Automobilismo, Quadriciclo e Off Road</option>
                        <option value="Escalada, Montanhismo, Rapel e Alpinismo" <?php echo selectedopt("Escalada, Montanhismo, Rapel e Alpinismo", $catacessoriosdb); ?>>Escalada, Montanhismo, Rapel e Alpinismo</option>
                        <option value="Highline e Slackline" <?php echo selectedopt("Highline e Slackline", $catacessoriosdb); ?>>Highline e Slackline</option>
                        <option value="Kitesurfing e Windsurf" <?php echo selectedopt("Kitesurfing e Windsurf", $catacessoriosdb); ?>>Kitesurfing e Windsurf</option>
                        <option value="Mergulho e Caça submarina " <?php echo selectedopt("Mergulho e Caça submarina ", $catacessoriosdb); ?>>Mergulho e Caça submarina </option>
                        <option value="Moto speed e Motocross" <?php echo selectedopt("Moto speed e Motocross", $catacessoriosdb); ?>>Moto speed e Motocross</option>
                        <option value="Patins" <?php echo selectedopt("Patins", $catacessoriosdb); ?>>Patins</option>
                        <option value="Queda livre, Skydive e Wingsuit" <?php echo selectedopt("Queda livre, Skydive e Wingsuit", $catacessoriosdb); ?>>Queda livre, Skydive e Wingsuit</option>
                        <option value="Skate" <?php echo selectedopt("Skate", $catacessoriosdb); ?>>Skate</option>
                        <option value="Snowboard, Sandboard e Esqui" <?php echo selectedopt("Snowboard, Sandboard e Esqui", $catacessoriosdb); ?>>Snowboard, Sandboard e Esqui</option>
                        <option value="Surf" <?php echo selectedopt("Surf", $catacessoriosdb); ?>>Surf</option>
                        <option value="UFC (MMA)" <?php echo selectedopt("UFC (MMA)", $catacessoriosdb); ?>>UFC (MMA)</option>
                        <option value="Vela e Iatismo" <?php echo selectedopt("Vela e Iatismo", $catacessoriosdb); ?>>Vela e Iatismo</option>
                        <option value="Wakeboard " <?php echo selectedopt("Wakeboard ", $catacessoriosdb); ?>>Wakeboard </option>
                        <option value="Outros" <?php echo selectedopt("Outros", $catacessoriosdb); ?>>Outros</option>
                  </select>


                    <p>Novo / Usado: </p>
                   <select name="acessorioestado" id="acessorioestado">
                    <option value="">-- Selecione --</option>
                    <option value="Novo" <?php echo selectedopt("Novo", $acessorioestado); ?>>Novo</option>
                    <option value="Usado" <?php echo selectedopt("Usado", $acessorioestado); ?>>Usado</option>
                   </select>


                   <div style="margin-bottom: 10px;">
                     <p>Foto principal:</p>
                     <div style="float: left; margin-bottom: 10px; min-height: 65px; border-bottom: dashed 0px #666; padding: 0px;">
                       <?php if (get_custom_field('fotoacessorio:to_image_src') == '') { echo "<div style='float: left; width: 50px; margin-right: 10px;'>&nbsp;</div>";  } else { ?>
                       <div id="removerimg0" class="removerimg"><a href="#" id="removerfoto0"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>
                       <div id="dvupload0" style="float: left; margin-right: 10px; max-height: 40px; overflow: hidden;">
                         <img id="fotoadd0" src="<?php print_custom_field('fotoacessorio:to_image_src'); ?>" width="50">
                       </div>
                       <?php } ?>
                       &nbsp;
                     </div>
                     <div class="custom-upload">
                         <input id="idimgdestacada" type="file" name="idimgdestacada">
                         <div class="fake-file">
                             <input disabled="disabled">
                         </div>
                     </div>
                     &nbsp;
                   </div>

              <style type="text/css">
              .removerimg {
                position: absolute;
                margin-left: 35px;
                margin-top: -15px;
                color: #F00;
                text-align: center;
              }
              .removerimg a {
                color: #F00;
              }
              </style>

              <div class="fotos_adicionais" style="margin-top: 0px; margin-bottom: 10px;">
                <p>Fotos adicionais:</p>

                <div style="float: left; margin-bottom: 10px; min-height: 65px; border-bottom: dashed 0px #666; padding: 0px;">
                  <div style="float: left; width: 50px;">
                    <?php if (get_custom_field('fotoanuncio1:to_image_src') == '') { echo "<div style='float: left; width: 50px; margin-right: 10px;'>&nbsp;</div>";  } else { ?>
                    <div id="removerimg1" class="removerimg"><a href="#" id="removerfoto1"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>
                    <div id="dvupload1" style="float: left; margin-right: 10px; max-height: 40px; overflow: hidden;">
                      <img id="fotoadd1" src="<?php print_custom_field('fotoanuncio1:to_image_src'); ?>" width="50">
                    </div>
                    <?php } ?>
                    &nbsp;
                  </div>
                  <div class="custom-upload">
                      <input id="img_anuncio1" type="file" name="img_anuncio1">
                      <div class="fake-file">
                          <input disabled="disabled">
                      </div>
                  </div>
                  &nbsp;
                </div>

                <div style="float: left; margin-bottom: 10px; min-height: 65px; border-bottom: dashed 0px #666; padding: 0px;">
                  <div style="float: left; width: 50px;">
                    <?php if (get_custom_field('fotoanuncio2:to_image_src') == '') { echo "<div style='float: left; width: 50px; margin-right: 10px;'>&nbsp;</div>";  } else { ?>
                    <div id="removerimg2" class="removerimg"><a id="removerfoto2"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>
                    <div id="dvupload2" style="float: left; margin-right: 10px; max-height: 40px; overflow: hidden;">
                      <img id="fotoadd2" src="<?php print_custom_field('fotoanuncio2:to_image_src'); ?>" width="50">
                    </div>
                    <?php } ?>
                    &nbsp;
                  </div>
                  <div class="custom-upload">
                      <input type="file" name="img_anuncio2" id="img_anuncio2">
                      <div class="fake-file">
                          <input disabled="disabled">
                      </div>
                  </div>
                  &nbsp;
                </div>

                <div style="float: left; margin-bottom: 10px; min-height: 65px; border-bottom: dashed 0px #666; padding: 0px;">
                  <div style="float: left; width: 50px;">
                    <?php if (get_custom_field('fotoanuncio3:to_image_src') == '') { echo "<div style='float: left; width: 50px; margin-right: 10px;'>&nbsp;</div>";  } else { ?>
                    <div id="removerimg3" class="removerimg"><a id="removerfoto3"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>
                    <div id="dvupload3" style="float: left; margin-right: 10px; max-height: 40px; overflow: hidden;">
                      <img id="fotoadd3" src="<?php print_custom_field('fotoanuncio3:to_image_src'); ?>" width="50">
                    </div>
                    <?php } ?>
                    &nbsp;
                  </div>
                  <div class="custom-upload">
                      <input type="file" name="img_anuncio3" id="img_anuncio3">
                      <div class="fake-file">
                          <input disabled="disabled">
                      </div>
                  </div>
                  &nbsp;
                </div>

                <div style="float: left; margin-bottom: 10px; min-height: 65px; border-bottom: dashed 0px #666; padding: 0px;">
                  <div style="float: left; width: 50px;">
                    <?php if (get_custom_field('fotoanuncio4:to_image_src') == '') { echo "<div style='float: left; width: 50px; margin-right: 10px;'>&nbsp;</div>";  } else { ?>
                    <div id="removerimg4" class="removerimg"><a id="removerfoto4"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>
                    <div id="dvupload4" style="float: left; margin-right: 10px; max-height: 40px; overflow: hidden;">
                      <img id="fotoadd4" src="<?php print_custom_field('fotoanuncio4:to_image_src'); ?>" width="50">
                    </div>
                    <?php } ?>
                    &nbsp;
                  </div>
                  <div class="custom-upload">
                      <input type="file" name="img_anuncio4" id="img_anuncio4">
                      <div class="fake-file">
                          <input disabled="disabled">
                      </div>
                  </div>
                  &nbsp;
                </div>

                <div style="float: left; margin-bottom: 10px; min-height: 65px; border-bottom: dashed 0px #666; padding: 0px;">
                  <div style="float: left; width: 50px;">
                    <?php if (get_custom_field('fotoanuncio5:to_image_src') == '') { echo "<div style='float: left; width: 50px; margin-right: 10px;'>&nbsp;</div>";  } else { ?>
                    <div id="removerimg5" class="removerimg"><a id="removerfoto5"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>
                    <div id="dvupload5" style="float: left; margin-right: 10px; max-height: 40px; overflow: hidden;">
                      <img id="fotoadd5" src="<?php print_custom_field('fotoanuncio5:to_image_src'); ?>" width="50">
                    </div>
                    <?php } ?>
                    &nbsp;
                  </div>
                  <div class="custom-upload">
                      <input type="file" name="img_anuncio5" id="img_anuncio5">
                      <div class="fake-file">
                          <input disabled="disabled">
                      </div>
                  </div>
                  &nbsp;
                </div>

                <div style="float: left; margin-bottom: 10px; min-height: 65px; border-bottom: dashed 0px #666; padding: 0px;">
                  <div style="float: left; width: 50px;">
                    <?php if (get_custom_field('fotoanuncio6:to_image_src') == '') { echo "<div style='float: left; width: 50px; margin-right: 10px;'>&nbsp;</div>";  } else { ?>
                    <div id="removerimg6" class="removerimg"><a id="removerfoto6"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>
                    <div id="dvupload6" style="float: left; margin-right: 10px; max-height: 40px; overflow: hidden;">
                      <img id="fotoadd6" src="<?php print_custom_field('fotoanuncio6:to_image_src'); ?>" width="50">
                    </div>
                    <?php } ?>
                    &nbsp;
                  </div>
                  <div class="custom-upload">
                      <input type="file" name="img_anuncio6" id="img_anuncio6">
                      <div class="fake-file">
                          <input disabled="disabled">
                      </div>
                  </div>
                  &nbsp;
                </div>
              </div>
            </div>

            </div>

             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">

             <div style="text-align: left; float: left; width: 100%;">Descrição do acessório:</div>
             <textarea id="descricao_acessorio" class="" name="descricao_acessorio" style="width: 678px; height: 115px;"><?php echo $conteudo1; ?>
             </textarea>

             <input type="button" id="salvaacessorio" style="  background: #ff8920 !important;
                                  color: #fff;
                                  border: none;
                                  padding: 7px 20px;
                                  cursor: pointer;
                                  letter-spacing: .1em;
                                  font-size: 1.125em;
                                  font-family: Oswald, sans-serif;
                                  text-transform: uppercase;
                                  -webkit-appearance: none;
                                  -webkit-border-radius: 0;float: right; margin-top: 20px;margin-left: 300px;" value="Salvar Acessório">
                                  <br>&nbsp;<br>
            </form>
          </div>



</div>

  <div id="contentwrap">

    <!-- /content -->
    <?php themify_content_after(); // hook ?>

  <?php endwhile ?>

    <?php
      $idacessoriog = $_GET['idacessoriog'];
        if ($idacessoriog == 1) { ?>
            <div class="div_semcad">
                <h1 style="text-transform: uppercase; margin-bottom: -13px; font-weight: bold;">Área Restrita</h1>
                <p style="margin: 4px 0px 20px;">Para realizar esta ação é necessario ser cadastrado.</p>
                <a href="/wp-content/themes/magazine/logout.php" id="criar" style="background: #f57300; text-decoration: none; padding: 5px 20px; color: #FFFFFF;">Criar Nova Conta.</a>
          </div>
    <?php } ?>

<?php get_footer(); ?>

<script type="text/javascript">
$('.custom-upload input[type=file]').change(function(){
    $(this).next().find('input').val($(this).val());
});

</script>

<?php } ?>
