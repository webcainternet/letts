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
      $("#cadastrarvaga").click(function(){
          if ($( "#frmvaga" ).val() == "") {
            alert( "Você deve preencher o nome da vaga!" );
            $( "#frmvaga" ).focus();
          } else {
            if ($( "#frmempresa" ).val() == "") {
              alert( "Você deve preencher o nome da empresa!" );
              $( "#frmempresa" ).focus();
            } else {
              if ($( "#countryId" ).val() == "") {
                alert( "Você deve preencher o pais!" );
                $( "#countryId" ).focus();
              } else {
                if ($( "#stateId" ).val() == "") {
                  alert( "Você deve preencher o estado!" );
                  $( "#stateId" ).focus();
                } else {
                  if ($( "#frmcidade" ).val() == "") {
                    alert( "Você deve selecionar a cidade!" );
                    $( "#frmcidade" ).focus();
                  } else {
                    if ($( "#atletaesporte" ).val() == "" && $( "#profissao" ).val() == "" ) {
                      alert( "Você deve selecionar o esporte ou profissão!" );
                    } else {
                      if ($( "#descricao_vaga" ).val() == "" ) {
                        alert( "Você deve preencher a descrição!" );
                        $( "#nome_msg" ).focus();
                      } else {
                        $( "#new_post" ).submit();
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
          'post_title'    => $_POST['vaga'],
          'post_content'    => $_POST['descricao_vaga'],
          'post_status'   => 'pending',
          'post_type'     => 'vagas',
          'post_author'   => 1
        );

        $post_id = wp_insert_post($my_post);
        add_post_meta($post_id, 'empresa', $_POST['empresa'], true);
        add_post_meta($post_id, 'basicaestadoatual', $_POST['estado'], true);
        add_post_meta($post_id, 'basicacidadeatual', $_POST['cidade'], true);
        add_post_meta($post_id, 'basicaemail', $_POST['email'], true);
        add_post_meta($post_id, 'atletaesporte', $_POST['esporte'], true);
        add_post_meta($post_id, 'profissao', $_POST['profissao'], true);
        add_post_meta($post_id, 'basicapaisatual', $_POST['pais'], true);

        $destinatario = "renato.botani@letts.com.br";

        $headers = "From: $destinatario \r\n";
        $headers.= "Content-Type: text/html; charset=ISO-8859-1 ";
        $headers.= "MIME-Version: 1.0 ";

        $html = 'Você tem uma nova postagem de Vaga para aprovação';

        mail($destinatario,"Nova postagem pendente",$html,$headers);

    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        //$('#sucesso').show();
        window.location='/vagas/?msgsucess=1';
      })
    </script>
  <?php exit; } ?>


  <?php
    query_posts( array('p' => $_GET['id_post'], 'post_type'=>array('profissional','atleta','marca')) );
    while ( have_posts() ) : the_post();
  ?>


        <div style="width: 685px; margin: 0 auto; text-align: left; padding: 40px 0px;">
          <p id="sucesso">Vaga cadastrada com sucesso.</p>
          <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; font-size: 45px; font-weight: bold; margin-bottom: 10px; text-align: center; margin-right: 30px;">Cadastrar Vaga</h4>
          <div class="galeria_profissional">
            <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
             <div style="margin-bottom: 5px;">Titulo da vaga:</div>
             <input class="input_video" type="text" name="vaga" id="frmvaga" value="">
             <div style="margin-bottom: 5px;">Empresa:</div>
             <input class="input_video" type="text" name="empresa" id="frmempresa" value="">

              <div style="float: left; width: 210px;text-align: left; height: 78px;">
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

              <div style="margin-bottom: 5px;">Selecione apenas uma opção: Esporte ou Profissão:</div>
                <select id="atletaesporte" name="esporte" style="width: 312px; height: 35px; margin-bottom: 14px;font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
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

                 <select id="profissao" name="profissao" style="width: 313px; height: 35px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
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

             <div style="margin-bottom: 5px;">Descrição da vaga:</div>
             <textarea class="" name="descricao_vaga" id="descricao_vaga" style="width: 91%; height: 115px;"></textarea>
             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">

             <input type="button" id="cadastrarvaga" style="  background: #ff8920 !important;
                                  margin-right: 55px;
                                  color: #fff;
                                  border: none;
                                  padding: 7px 20px;
                                  cursor: pointer;
                                  letter-spacing: .1em;
                                  font-size: 1.125em;
                                  font-family: Oswald, sans-serif;
                                  text-transform: uppercase;
                                  -webkit-appearance: none;
                                  -webkit-border-radius: 0;float: right; margin-top: 0px;margin-left: 300px;" value="Enviar Vaga">

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

</script>
