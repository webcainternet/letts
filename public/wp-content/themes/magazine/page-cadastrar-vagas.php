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

        $destinatario = "renato.botani@letts.com.br";  

        $headers = "From: $destinatario \r\n";
        $headers.= "Content-Type: text/html; charset=ISO-8859-1 ";
        $headers.= "MIME-Version: 1.0 ";    

        $html = 'Você tem uma nova postagem de Vaga para aprovação';

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
          <p id="sucesso">Vaga cadastrada com sucesso.</p>
          <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; font-size: 45px; font-weight: bold; margin-bottom: 10px;">Cadastrar Vaga</h4>
          <div class="galeria_profissional">
            <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
             <input class="input_video" type="text" name="vaga" value="" placeholder="Vaga Disponível">
             <input class="input_video" type="text" name="empresa" value="" placeholder="Empresa">
             <select name="estado" id="estado" style="width: 312px; height: 35px; margin-bottom: 14px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
              <option>-- Selecione o estado --</option> 
              <option value="Acre">Acre</option> 
              <option value="Alagoas">Alagoas</option> 
              <option value="Amazonas">Amazonas</option> 
              <option value="Amapá">Amapá</option> 
              <option value="Bahia">Bahia</option> 
              <option value="Ceará">Ceará</option> 
              <option value="Distrito Federal">Distrito Federal</option> 
              <option value="Espírito Santo">Espírito Santo</option> 
              <option value="Goiás">Goiás</option> 
              <option value="Maranhão">Maranhão</option> 
              <option value="Mato Grosso">Mato Grosso</option> 
              <option value="Mato Grosso do Sul">Mato Grosso do Sul</option> 
              <option value="Minas Gerais">Minas Gerais</option> 
              <option value="Pará">Pará</option> 
              <option value="Paraíba">Paraíba</option> 
              <option value="Paraná">Paraná</option> 
              <option value="Pernambuco">Pernambuco</option> 
              <option value="Piauí">Piauí</option> 
              <option value="Rio de Janeiro">Rio de Janeiro</option> 
              <option value="Rio Grande do Norte">Rio Grande do Norte</option> 
              <option value="Rondônia">Rondônia</option> 
              <option value="Rio Grande do Sul">Rio Grande do Sul</option> 
              <option value="Roraima">Roraima</option> 
              <option value="Santa Catarina">Santa Catarina</option> 
              <option value="Sergipe">Sergipe</option> 
              <option value="São Paulo">São Paulo</option> 
              <option value="Tocantins">Tocantins</option> 
             </select>
             <input class="input_video_cidade" type="text" style=" width: 308px; margin-top: 0px; float: right; margin-left: -24px; margin-right: 28px; padding-left: 3px; height: 32px;" name="cidade" value="" placeholder="Cidade">

              <p style="margin: -4px 0px 3px;">Selecione apenas uma opção: Esporte ou Profissão</p>
                <select id="atletaesporte" name="esporte" style="width: 312px; height: 35px; margin-bottom: 14px;font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
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

                 <select id="profissao" name="profissao" style="width: 313px; height: 35px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
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


             <textarea class="" name="descricao_vaga" placeholder="Descrição" style="width: 91%; height: 115px;"></textarea>
             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">
             <input type="submit" value="Enviar Vaga">
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