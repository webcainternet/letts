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

<?php $idpost = $_GET['id_post']; ?>

  <?php if ($_POST){ ?>
    <?php 
      // Create post object
        $my_post = array(
          'post_title'    => $_POST['titulo_video'],
          'post_status'   => 'publish',
          'post_type'     => 'video',
          'post_author'   => 1
        );

        $post_id = wp_insert_post($my_post);
        add_post_meta($post_id, 'link_video', $_POST['link_video'], true);
        add_post_meta($post_id, 'basicaemail', $_POST['email'], true);
        add_post_meta($post_id, 'atletaesporte', $_POST['esporte'], true);
        add_post_meta($post_id, 'profissao', $_POST['profissao'], true);        
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sucesso').show();
      }) 
    </script>
  <?php } ?>


  <?php 
    query_posts( array('p' => $_GET['id_post'], 'post_type' => 'atleta') );
    while ( have_posts() ) : the_post();
  ?>

<style type="text/css">
textarea{
  height: 180px;
}

.editar_perfil{
  font-size: 12px;
  margin-top: -25px;
  float: left;
}
</style>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">
  <div style="border-top: 5px #ff8920 solid; 
        background-image: url('<?php print_custom_field('atletaimagembackground'); ?>'); 
        background-size: 1064px; 
        background-position:center; 
        height: 400px;">

    <div style="float: left;
          margin-left: 30px; 
          border: 1px #ff8920 solid; 
          width: 180px; 
          height: 180px; 
          margin-top: 280px;
          background-image: url('<?php print_custom_field('basicaimagem:to_image_src'); ?>'); 
          background-size: 1800px; 
          background-position:center; " id="imgbackground">
      &nbsp;
    </div>

  </div>


<script type="text/javascript">
  var img = new Image();
  img.onload = function() {
    if (this.width > this.height) {
      var sizeimg = 180 * (this.width / this.height);
    document.getElementById("imgbackground").style.backgroundSize = sizeimg+"px 180px";
    } else {
      var sizeimg = 180 * (this.height / this.width);
      document.getElementById("imgbackground").style.backgroundSize = "180px "+sizeimg+"px";
    }  
    
  }
  img.src = "<?php print_custom_field('basicaimagem:to_image_src'); ?>";  
</script>
  <div style="background-size: 1064px; 
        background-position:center; 
        height: 62px;background-color: #EEE;">
    <?php if ($_SESSION["lettslogin"] != $idpost) { ?> 
    <div style="float: right; 
          margin-top: 25px;
          /* border-bottom: 2px #ff8920 solid; */
          font-weight: bold;
          text-align: center;
          padding-left: 2px;
          padding-right: 2px;
          text-transform: uppercase;
          margin-left: 5px;
          margin-right: 15px;
          font-size: 12px;">
      <a style="text-decoration: none;" href="<?php the_permalink(); ?>?page=mensagem">Mensagem</a>
    </div>
    <?php } ?>

    <div style="float: right; 
          margin-top: 25px;
          /* border-bottom: 2px #ff8920 solid; */
          font-weight: bold;
          text-align: center;
          padding-left: 2px;
          padding-right: 2px;
          text-transform: uppercase;
          margin-left: 5px;
          margin-right: 5px;
          font-size: 12px;">
      <a style="text-decoration: none;" href="<?php the_permalink(); ?>?page=videos">Vídeos</a>
    </div>

    <div style="float: right; 
          margin-top: 25px;
          /* border-bottom: 2px #ff8920 solid; */
          font-weight: bold;
          text-align: center;
          padding-left: 2px;
          padding-right: 2px;
          text-transform: uppercase;
          margin-left: 5px;
          margin-right: 5px;
          font-size: 12px;">
      <a style="text-decoration: none;" href="<?php the_permalink(); ?>?page=fotos">Fotos</a>
    </div>

    <div style="float: right; 
          margin-top: 25px;
          /* border-bottom: 2px #ff8920 solid; */
          font-weight: bold;
          text-align: center;
          padding-left: 2px;
          padding-right: 2px;
          text-transform: uppercase;
          margin-left: 5px;
          margin-right: 5px;
          font-size: 12px;">
      <a style="text-decoration: none;" href="<?php the_permalink(); ?>?page=sobre">Sobre</a>
    </div>

    <div style="float: right; 
          margin-top: 25px;
          /* border-bottom: 2px #ff8920 solid; */
          font-weight: bold;
          text-align: center;
          padding-left: 2px;
          padding-right: 2px;
          text-transform: uppercase;
          margin-left: 5px;
          margin-right: 5px;
          font-size: 12px;">
      <a style="text-decoration: none;" href="<?php the_permalink(); ?>?page=news">News</a>
    </div>

    <div style="float: left;
          margin: 0px;
          margin-left: 25px;">
          <div id="text-1017" class="widget widget_text" style="border: 0px; margin: 0px;">
            <h4 class="widgettitle" style="border: 0px;"><?php print_custom_field('atletaesporte'); ?></h4>
            <?php if ($_SESSION["lettslogin"] == $idpost) { ?>
              <a class="editar_perfil" href="/edicao-atleta/?id_post=<?php echo $idpost; ?>">Editar Perfil</a>  
            <?php } ?>
          </div>
      
    </div>
    
  </div>

  <div style="margin-top: 20px; margin-bottom: 20px; width: 100%; float: left;">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; text-align: center; padding: 0; font-size: 1.5em; font-family: Oswald, sans-serif; 
      text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;">
        <a href="<?php the_permalink(); ?>" style="font-weight: bold; font-size: 50px;"><?php the_title(); ?></a>
      </h1>
    </a>
  </div>

  <div>
    <div style="float: left; width: 325px;">
        <div class="col3-1" style="width: 100%; margin: 0px; background: #F5E1CD; padding-left: 15px; border-top: 5px #ff8920 solid;">
          <div id="text-1016" class="widget widget_text" style="">
            <h4 class="widgettitle">Informações básicas</h4>      
            <div class="textwidget">
              <div style="margin-top: 10px;"><strong>Apelido</strong></div>
              <?php print_custom_field('apelido'); ?><br />

              <div style="margin-top: 10px;"><strong>Data de nascimento</strong></div>
              <?php print_custom_field('basicanascimento'); ?><br />

              <div style="margin-top: 10px;"><strong>Gênero</strong></div>
              <?php print_custom_field('basicagenero'); ?><br />

              <div style="margin-top: 10px;"><strong>Telefones</strong></div>
              <?php print_custom_field('basicatelefones'); ?><br />

              <div style="margin-top: 10px;"><strong>Nascimento</strong></div>
              <?php print_custom_field('basicacidadenascimento'); ?>, <?php print_custom_field('basicaestadonascimento'); ?><br />

              <div style="margin-top: 10px;"><strong>Atual</strong></div>
              <?php print_custom_field('basicacidadeatual'); ?>, <?php print_custom_field('basicaestadoatual'); ?><br />

              <div style="margin-top: 10px;"><strong>Escolaridade</strong></div>
              <?php print_custom_field('escolaridade'); ?><br />

              <div style="margin-top: 10px;"><strong>Idiomas</strong></div>
              <?php 
                $my_array = get_custom_field('idiomas:to_array');
                foreach ($my_array as $item) {
                  print $item.'<br />'; 
                }
              ?>

              <div style="margin-top: 10px;"><strong>Paises que já viajou</strong></div>
              <?php 
                $my_array = get_custom_field('paisesviagem:to_array');
                foreach ($my_array as $item) {
                  print $item.'<br />'; 
                }
              ?>

              <div style="margin-top: 10px;"><strong>E-mail</strong></div>
                  <?php print_custom_field('basicaemail'); ?><br />
            </div>
      
            <div class="textwidget icones_sociais">
              <div style="margin-top: 10px;"><strong>Outros Contatos</strong></div>
                <?php if (get_custom_field('basicafacebook')) { ?>
                  <a href="<?php print_custom_field('basicafacebook'); ?>" target="_blank">
                    <img src="/wp-content/themes/magazine/images/facebook.png">
                  </a>
                <?php } ?>

                <?php if (get_custom_field('instagram')) { ?>
                  <a href="<?php print_custom_field('instagram'); ?>" target="_blank">
                    <img src="/wp-content/themes/magazine/images/instagram.png">
                  </a>
                <?php } ?>

                <?php if (get_custom_field('twitter')) { ?>
                  <a href="<?php print_custom_field('twitter'); ?>" target="_blank">
                    <img src="/wp-content/themes/magazine/images/twitter.png">
                  </a>
                <?php } ?>

                <?php if (get_custom_field('linkedin')) { ?>
                  <a href="<?php print_custom_field('linkedin'); ?>" target="_blank">
                    <img src="/wp-content/themes/magazine/images/linkedin.png">
                  </a>
                <?php } ?>

                <?php if (get_custom_field('blog')) { ?>
                  <a href="<?php print_custom_field('blog'); ?>" target="_blank">
                    <img src="/wp-content/themes/magazine/images/rss.png">
                  </a>
                <?php } ?>                

                <?php if (get_custom_field('site')) { ?>
                  <a href="<?php print_custom_field('site'); ?>" target="_blank">
                    <img src="/wp-content/themes/magazine/images/domain.png">
                  </a>
                <?php } ?>
              </div>
              <?php if ($_SESSION["lettslogin"] == $idpost) { ?>
                <a href="/print?post_id=<?php echo get_the_ID(); ?>" target="_blank">Imprimir Currículo</a>
              <?php } ?>  
          </div>      
        </div>
    </div>



        <div style="width: 685px; float: left; margin-left: 50px;">
          <p id="sucesso">Vídeo cadastrado com sucesso.</p>
          <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Publicar Vídeo</h4>
          <div class="galeria_profissional">
            <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
             <input class="input_video" type="text" name="link_video" value="" placeholder="Link do Video do Youtube ou Vímeo">
             <input class="input_video" type="text" name="titulo_video" value="" placeholder="Título do Vídeo">
              <p style="margin: 2px 0px 1px;padding-left: 130px;">Selecione apenas uma opção: Esporte ou Profissão</p>
              <select id="atletaesporte" name="esporte" style="width: 300px; height: 35px; margin-bottom: 14px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; margin-top: 0px; margin-left: 0px;">
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

                <select id="profissao" name="profissao" style="width: 300px; margin-bottom: 15px; height: 35px; font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100; float: right; margin-top: 0px; margin-right: 55px;">
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
             <input type="hidden" value="<?php print_custom_field('basicaemail'); ?>" name="email">
             <input type="submit" value="Enviar Vídeo">
            </form> 
          </div>
        </div>  
    </div>
  </div>




  <div id="contentwrap">
  
    <!-- /content -->
    <?php themify_content_after(); // hook ?>

  <?php endwhile ?>
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