<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<script type="text/javascript">
   $(document).ready(function(){
      $("#postar").click(function(){
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
                if ($("#countryId").val() == "") {
                  alert("Você deve preencher o pais do acessório" );
                  $( "#countryId" ).focus();
                } else {
                  if ($("#stateId").val() == "") {
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
                          if ($( "#idimgdestacada" ).val() == "") {
                            alert( "Você deve selecionar a imagem!" );
                          } else {
                            if ($( "#idimgacessorio1" ).val() == "" && $( "#idimgacessorio2" ).val() == "" && $( "#idimgacessorio3" ).val() == "" && $( "#idimgacessorio4" ).val() == "" && $( "#idimgacessorio5" ).val() == "" && $( "#idimgacessorio6" ).val() == "" ) {
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
          'post_title'    => $_POST['acessorio'],
          'post_content'  => $_POST['descricao_acessorio'],
          'post_status'   => 'pending',
          'post_type'     => 'acessorios',
          'post_author'   => 1
        );

$path = "wp-content/uploads/acessorios/";

$valid_formats = array("jpg", "gif", "png", "tif", "jpeg", "JPG", "GIF", "PNG", "TIF", "JPEG");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  //Arquivo Catálogo
  $name = $_FILES['img_destacada']['name'];
  $size = $_FILES['img_destacada']['size'];
  $file_info = pathinfo($name);
  $name = md5($name) .'.'. $file_info['extension'];
  if(strlen($name)) {
    list($txt, $ext) = explode(".", $name);
    if(in_array($ext,$valid_formats)) {
      if($size<(10240*10240)) {
        $actual_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
        $tmp = $_FILES['img_destacada']['tmp_name'];
        if(move_uploaded_file($tmp, $path.$actual_name)) {
          $response['response']="Arquivo OK";
        } else {
          $response['response']="Falhou";
        }
      } else {
          $response['response']="Arquivo tem mais de 4MB";
      }
    } else {
      $response['response']="Formato Inválido";
    }
  } else {
    $response['response']="Selecione um arquivo";
  }


  //Arquivo Acessório 1
  $name1 = $_FILES['img_acessorio1']['name'];
  $size1 = $_FILES['img_acessorio1']['size'];
  $file_info = pathinfo($name1);
  $name1 = md5($name1) .'.'. $file_info['extension'];
  if(strlen($name1)) {
    list($txt, $ext) = explode(".", $name1);
    if(in_array($ext,$valid_formats)) {
      if($size1<(10240*10240)) {
        $actual_name1 = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
        $tmp = $_FILES['img_acessorio1']['tmp_name'];
        if(move_uploaded_file($tmp, $path.$actual_name1)) {
          $response['response']="Arquivo OK";
        } else {
          $response['response']="Falhou";
        }
      } else {
          $response['response']="Arquivo tem mais de 4MB";
      }
    } else {
      $response['response']="Formato Inválido";
    }
  } else {
    $response['response']="Selecione um arquivo";
  }

  //Arquivo Acessório 2
  $name2 = $_FILES['img_acessorio2']['name'];
  $size2 = $_FILES['img_acessorio2']['size'];
  $file_info = pathinfo($name2);
  $name2 = md5($name2) .'.'. $file_info['extension'];
  if(strlen($name2)) {
    list($txt, $ext) = explode(".", $name2);
    if(in_array($ext,$valid_formats)) {
      if($size2<(20240*20240)) {
        $actual_name2 = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
        $tmp = $_FILES['img_acessorio2']['tmp_name'];
        if(move_uploaded_file($tmp, $path.$actual_name2)) {
          $response['response']="Arquivo OK";
        } else {
          $response['response']="Falhou";
        }
      } else {
          $response['response']="Arquivo tem mais de 4MB";
      }
    } else {
      $response['response']="Formato Inválido";
    }
  } else {
    $response['response']="Selecione um arquivo";
  }

  //Arquivo Acessório 3
  $name3 = $_FILES['img_acessorio3']['name'];
  $size3 = $_FILES['img_acessorio3']['size'];
  $file_info = pathinfo($name3);
  $name3 = md5($name3) .'.'. $file_info['extension'];
  if(strlen($name3)) {
    list($txt, $ext) = explode(".", $name3);
    if(in_array($ext,$valid_formats)) {
      if($size3<(30240*30240)) {
        $actual_name3 = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
        $tmp = $_FILES['img_acessorio3']['tmp_name'];
        if(move_uploaded_file($tmp, $path.$actual_name3)) {
          $response['response']="Arquivo OK";
        } else {
          $response['response']="Falhou";
        }
      } else {
          $response['response']="Arquivo tem mais de 4MB";
      }
    } else {
      $response['response']="Formato Inválido";
    }
  } else {
    $response['response']="Selecione um arquivo";
  }

  //Arquivo Acessório 4
  $name4 = $_FILES['img_acessorio4']['name'];
  $size4 = $_FILES['img_acessorio4']['size'];
  $file_info = pathinfo($name4);
  $name4 = md5($name4) .'.'. $file_info['extension'];
  if(strlen($name4)) {
    list($txt, $ext) = explode(".", $name4);
    if(in_array($ext,$valid_formats)) {
      if($size4<(40240*40240)) {
        $actual_name4 = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
        $tmp = $_FILES['img_acessorio4']['tmp_name'];
        if(move_uploaded_file($tmp, $path.$actual_name4)) {
          $response['response']="Arquivo OK";
        } else {
          $response['response']="Falhou";
        }
      } else {
          $response['response']="Arquivo tem mais de 4MB";
      }
    } else {
      $response['response']="Formato Inválido";
    }
  } else {
    $response['response']="Selecione um arquivo";
  }

  //Arquivo Acessório 5
  $name5 = $_FILES['img_acessorio5']['name'];
  $size5 = $_FILES['img_acessorio5']['size'];
  $file_info = pathinfo($name5);
  $name5 = md5($name5) .'.'. $file_info['extension'];
  if(strlen($name5)) {
    list($txt, $ext) = explode(".", $name5);
    if(in_array($ext,$valid_formats)) {
      if($size5<(50240*50240)) {
        $actual_name5 = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
        $tmp = $_FILES['img_acessorio5']['tmp_name'];
        if(move_uploaded_file($tmp, $path.$actual_name5)) {
          $response['response']="Arquivo OK";
        } else {
          $response['response']="Falhou";
        }
      } else {
          $response['response']="Arquivo tem mais de 4MB";
      }
    } else {
      $response['response']="Formato Inválido";
    }
  } else {
    $response['response']="Selecione um arquivo";
  }

  //Arquivo Acessório 6
  $name6 = $_FILES['img_acessorio6']['name'];
  $size6 = $_FILES['img_acessorio6']['size'];
  $file_info = pathinfo($name6);
  $name6 = md5($name6) .'.'. $file_info['extension'];
  if(strlen($name6)) {
    list($txt, $ext) = explode(".", $name6);
    if(in_array($ext,$valid_formats)) {
      if($size6<(60240*60240)) {
        $actual_name6 = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
        $tmp = $_FILES['img_acessorio6']['tmp_name'];
        if(move_uploaded_file($tmp, $path.$actual_name6)) {
          $response['response']="Arquivo OK";
        } else {
          $response['response']="Falhou";
        }
      } else {
          $response['response']="Arquivo tem mais de 4MB";
      }
    } else {
      $response['response']="Formato Inválido";
    }
  } else {
    $response['response']="Selecione um arquivo";
  }

}

    $cur_post_id = wp_insert_post($my_post);

    $filename  = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name;
    $filename1 = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name1;
    $filename2 = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name2;
    $filename3 = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name3;
    $filename4 = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name4;
    $filename5 = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name5;
    $filename6 = 'http://letts.com.br/wp-content/uploads/acessorios/'.$actual_name6;

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

    //Img Acessório 4
    $wp_filetype4 = wp_check_filetype(basename($filename4), null );
    $attachment4 = array(
      'post_mime_type' => $wp_filetype4['type'],
      'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename4)),
      'post_content' => '',
      'post_status' => 'inherit'
    );
    $attach_id4 = wp_insert_attachment($attachment4, $filename4, $cur_post_id);

    //Img Acessório 5
    $wp_filetype5 = wp_check_filetype(basename($filename5), null );
    $attachment5 = array(
      'post_mime_type' => $wp_filetype5['type'],
      'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename5)),
      'post_content' => '',
      'post_status' => 'inherit'
    );
    $attach_id5 = wp_insert_attachment($attachment5, $filename5, $cur_post_id);

    //Img Acessório 6
    $wp_filetype6 = wp_check_filetype(basename($filename6), null );
    $attachment6 = array(
      'post_mime_type' => $wp_filetype6['type'],
      'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename6)),
      'post_content'  => $_POST['descricao_acessorio'],
      'post_status' => 'inherit'
    );
    $attach_id6 = wp_insert_attachment($attachment6, $filename6, $cur_post_id);

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
    if ($actual_name4) {
      add_post_meta($cur_post_id, 'fotoanuncio4', $attach_id4, true);
    }
    if ($actual_name5) {
      add_post_meta($cur_post_id, 'fotoanuncio5', $attach_id5, true);
    }
    if ($actual_name6) {
      add_post_meta($cur_post_id, 'fotoanuncio6', $attach_id6, true);
    }

    add_post_meta($cur_post_id, 'post_image', $filename, true);
    add_post_meta($cur_post_id, 'basicaemail', $_POST['email'], true);
    add_post_meta($cur_post_id, 'moeda', $_POST['moeda'], true);
    add_post_meta($cur_post_id, 'basicapaisatual', $_POST['pais'], true);
    add_post_meta($cur_post_id, 'basicacidadeatual', $_POST['cidade'], true);
    add_post_meta($cur_post_id, 'basicaestadoatual', $_POST['estado'], true);
    add_post_meta($cur_post_id, 'acessoriovalor', $_POST['valor'], true);
    add_post_meta($cur_post_id, 'acessorioestado', $_POST['acessorioestado'], true);
    add_post_meta($cur_post_id, 'catacessorio', $_POST['catacessorio'], true);


    $destinatario = "renato.botani@letts.com.br";

    $headers = "From: $destinatario \r\n";
    $headers.= "Content-Type: text/html; charset=ISO-8859-1 ";
    $headers.= "MIME-Version: 1.0 ";

    $html = 'Você tem uma nova postagem de Acessório para aprovação';

    mail($destinatario,"Nova postagem pendente",$html,$headers);

    ?>

    <script type="text/javascript">
      $(document).ready(function(){
        window.location='/classificados/?msgsucess=1';
      })
    </script>
  <?php exit; } ?>


  <?php
    query_posts( array('p' => $_GET['id_post'], 'post_type'=>array('profissional','atleta','marca')) );
    while ( have_posts() ) : the_post();
  ?>


        <div style="width: 685px; margin: 0 auto; text-align: center; padding: 40px 0px;">
          <p id="sucesso">Seu cadastro foi enviado para aprovação.</p>
          <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; font-size: 45px; font-weight: bold; margin-bottom: 10px;">Cadastrar Acessório</h4>
          <div class="galeria_profissional">
            <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">

              <div style="float: left; width: 462px; text-align: left; margin-left: 27px;">
                  Titulo:<br>
                  <input maxlength="100" id="acessorio" class="input_video" type="text" name="acessorio" value="" style="max-width: 100%;">
              </div>

              <div style="float: left;width: 60px;text-align: left;margin-left: 20px;">
                  Moeda:<br>
                  <select name="moeda" id="moeda" style="width: 60px; height: 33px;">
                    <option value="">--</option>
                    <option value="US$">US$</option>
                    <option value="R$">R$</option>
                    <option value="€">€</option>
                    <option value="Mex$">Mex$</option>
                    <option value="$MN">$MN</option>
                    <option value="C$">C$</option>
                    <option value="NZ$">NZ$</option>
                    <option value="A$">A$</option>
                    <option value="HK$">HK$</option>
                    <option value="Ø">Ø</option>
                    <option value="$">$</option>
                    <option value="¥">¥</option>
                    <option value="£">£</option>
                    <option value="?">?</option>
                    <option value="?">?</option>
                    <option value="£">£</option>
                    <option value="Q">Q</option>
                    <option value="L">L</option>
                    <option value="¢">¢</option>
                    <option value="?">?</option>
                    <option value="Bs">Bs</option>
                    <option value="Rp">Rp</option>
                    <option value="CFA">CFA</option>
                    <option value="Fr">Fr</option>
                    <option value="Kz">Kz</option>
                    <option value="kr">kr</option>
                    <option value="zl">zl</option>
                    <option value="Ft">Ft</option>
                    <option value="COP">COP</option>
                  </select>
              </div>

              <div style="float: left;width: 70px;text-align: left;margin-left: 5px;">
                  Valor:<br>
                  <input id="valor" onkeyup='if (isNaN(this.value)) {this.value = ""}' class="input_video" type="text" name="valor" maxlength="9" style="max-width: 100%;">
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

              <div style="text-align: left; margin-left: 25px; min-width: 400px; float: left;">Categoria:</div>
              <select name="catacessorio" id="catacessorio" style="width: 629px;">
                <option value="">-- Selecione --</option>
                <option value="Arte e Artesanato">Arte e Artesanato</option>
                <option value="Bolsas, Malas e Mochilas">Bolsas, Malas e Mochilas</option>
                <option value="Câmeras e Acessórios">Câmeras e Acessórios</option>
                <option value="Fitness">Fitness</option>
                <option value="Relógios e Óculos ">Relógios e Óculos </option>
                <option value="Roupas e Calçados">Roupas e Calçados</option>
                <option value="Saúde e Beleza">Saúde e Beleza</option>
                <option value="Aeromodelismo e WingWalking">Aeromodelismo e WingWalking</option>
                <option value="Asa Delta, Parapente e Paramotor">Asa Delta, Parapente e Paramotor</option>
                <option value="Balonismo">Balonismo</option>
                <option value="Barco e Jet Ski">Barco e Jet Ski</option>
                <option value="Bicicleta">Bicicleta</option>
                <option value="Bungee jumping">Bungee jumping</option>
                <option value="Canoagem e Rafting">Canoagem e Rafting</option>
                <option value="Automobilismo, Quadriciclo e Off Road">Automobilismo, Quadriciclo e Off Road</option>
                <option value="Escalada, Montanhismo, Rapel e Alpinismo">Escalada, Montanhismo, Rapel e Alpinismo</option>
                <option value="Highline e Slackline">Highline e Slackline</option>
                <option value="Kitesurfing e Windsurf">Kitesurfing e Windsurf</option>
                <option value="Mergulho e Caça submarina ">Mergulho e Caça submarina </option>
                <option value="Moto speed e Motocross">Moto speed e Motocross</option>
                <option value="Patins">Patins</option>
                <option value="Queda livre, Skydive e Wingsuit">Queda livre, Skydive e Wingsuit</option>
                <option value="Skate">Skate</option>
                <option value="Snowboard, Sandboard e Esqui">Snowboard, Sandboard e Esqui</option>
                <option value="Surf">Surf</option>
                <option value="UFC (MMA)">UFC (MMA)</option>
                <option value="Vela e Iatismo">Vela e Iatismo</option>
                <option value="Wakeboard ">Wakeboard </option>
                <option value="Outros">Outros</option>
              </select>

              <div style="text-align: left; margin-left: 25px; min-width: 400px;">Novo / Usado:</div>
              <select name="acessorioestado" id="acessorioestado" style="width: 629px;">
               <option value="">-- Selecione --</option>
               <option value="Novo">Novo</option>
               <option value="Usado">Usado</option>
              </select>

              <div class="foto_principal" style=" margin-left: 25px;">
                <p>Foto principal</p>
                <div class="custom-upload">
                    <input id="idimgdestacada" type="file" name="img_destacada">
                    <div class="fake-file">
                        <input disabled="disabled">
                    </div>
                </div>
              </div>

              <div class="fotos_adicionais" style="margin-top: 40px; margin-bottom: 10px; margin-left: 25px;">
                <p>Fotos adicionais</p>

                <div class="custom-upload">
                    <input id="idimgacessorio1" type="file" name="img_acessorio1">
                    <div class="fake-file">
                        <input disabled="disabled">
                    </div>
                </div>

                <div class="custom-upload">
                    <input id="idimgacessorio2" type="file" name="img_acessorio2">
                    <div class="fake-file">
                        <input disabled="disabled">
                    </div>
                </div>

                <div class="custom-upload">
                    <input id="idimgacessorio3" type="file" name="img_acessorio3">
                    <div class="fake-file">
                        <input disabled="disabled">
                    </div>
                </div>

                <div style="margin-top: 50px;">
                  &nbsp;
                  <div class="custom-upload">
                      <input id="idimgacessorio4" type="file" name="img_acessorio4">
                      <div class="fake-file">
                          <input disabled="disabled">
                      </div>
                  </div>

                  <div class="custom-upload">
                      <input id="idimgacessorio5" type="file" name="img_acessorio5">
                      <div class="fake-file">
                          <input disabled="disabled">
                      </div>
                  </div>

                  <div class="custom-upload">
                      <input id="idimgacessorio6" type="file" name="img_acessorio6">
                      <div class="fake-file">
                          <input disabled="disabled">
                      </div>
                  </div>
                </div>
              </div>

             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">

             <div style="margin-left: 25px; text-align: left; float: left; width: 100%;">Descrição do acessório:</div>
             <textarea id="descricao_acessorio" class="" name="descricao_acessorio" style="margin-left: 6px; width: 636px; height: 115px;"></textarea>

             <div style="float: right;width: 100%;text-align: right;margin-right: 25px;margin-top: 10px;margin-bottom: 10px;">
               <input type="button" id="postar" value="Enviar Acessório" />
             </div>

             <div style="width: 100%;">&nbsp;</div>
            </form>

          </div>

        </div>




<?php include('banners.php') ?>


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
$('.custom-upload input[type=file]').change(function(){
    $(this).next().find('input').val($(this).val());
});

</script>
