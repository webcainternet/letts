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
  <?php 
    query_posts( array('p' => $_GET['id_post'], 'post_type' => 'atleta') );
    while ( have_posts() ) : the_post();
  ?>

<style type="text/css">
textarea{
  height: 180px;
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

  
     <form id="new_post" name="new_post" method="post" action="<?php the_permalink(); ?>" enctype="multipart/form-data">   
    <div style="float: left;
          margin: 0px;
          margin-left: 25px;">
          <div id="text-1017" class="widget widget_text" style="border: 0px; margin: 0px; margin-top: 13px;">
                <select id="atletaesporte" name="esporte" style="width: 312px; height: 35px; margin-bottom: 14px;font-size: 0.9em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
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
          </div>
      
    </div>
    
  </div>

  <div style="margin-top: 20px; margin-bottom: 20px; width: 100%; float: left;">
        <input type="text" name="titulo" value="<?php the_title(); ?>">
  </div>
        <p id="sucesso">Dados alterados com sucesso.</p>
  <div>
    <div style="float: left; width: 325px;">
        <div class="col3-1" style="width: 100%; margin: 0px; background: #F5E1CD; padding-left: 15px; border-top: 5px #ff8920 solid;">
          <div id="text-1016" class="widget widget_text" style="">
            <h4 class="widgettitle">Informações básicas</h4>      
            <div class="textwidget">

              <div style="margin-top: 10px;"><strong>Apelido</strong></div>
              <input type="text" name="apelido" value="<?php print_custom_field('apelido'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Data de nascimento</strong></div>
              <input type="text" name="data_nascimento" value="<?php print_custom_field('basicanascimento'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Gênero</strong></div>
              <input type="text" name="genero" value="<?php print_custom_field('basicagenero'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Telefones</strong></div>
              <input type="text" name="telefones" value="<?php print_custom_field('basicatelefones'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Nascimento</strong></div>
              <input type="text" name="cidade_nascimento" value="<?php print_custom_field('basicacidadenascimento'); ?>">
             <select name="estado_nascimento" id="estado_nascimento" style="width: 243px; height: 35px; margin-bottom: 14px; font-size: 0.9em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
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
              <br />

              <div style="margin-top: 10px;"><strong>Onde Mora</strong></div>
              <input type="text" name="cidade_atual" value="<?php print_custom_field('basicacidadeatual'); ?>">
             <select name="estado_atual" id="estado_atual" style="width: 243px; height: 35px; margin-bottom: 14px; font-size: 0.9em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
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
             <br />

              <div style="margin-top: 10px;"><strong>Escolaridade</strong></div>
              <select id="escolaridade" name="escolaridade" style="width: 240px; height: 35px; font-size: 1.00em; font-family: 'Open Sans', sans-serif; font-weight: 100; float: left; margin-top: -2px; ">
                      <option>-- Selecione a escolaridade --</option>
                      <option value="1o Grau">1o Grau</option>
                      <option value="2o Grau">2o Grau</option>
                      <option value="3o Grau">3o Grau</option>
               </select>  <br />               

            <div style="margin-top: 10px;"><br /><strong>Idiomas</strong></div>
            <div class="idiomas_edit">
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Português"'>Português<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Inglês"'>Inglês<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Espanhol"'>Espanhol<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Alemão"'>Alemão<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Italiano"'>Italiano<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Chinês"'>Chinês<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Japonês"'>Japonês<br /></span>
              <input type='hidden' id="check_idiomas" name="check_idiomas">
            </div>
            
            <br /><br />

            </div>

            <div class="textwidget icones_sociais">
              <div style="margin-top: 10px;"><strong>Outros Contatos</strong></div>
            
            <div style="margin-top: 10px;"><strong>Facebook</strong></div>
              <input type="text" name="facebook" value="<?php print_custom_field('basicafacebook'); ?>"><br />              

            <div style="margin-top: 10px;"><strong>Instagram</strong></div>
              <input type="text" name="instagram" value="<?php print_custom_field('instagram'); ?>"><br />  

            <div style="margin-top: 10px;"><strong>Twitter</strong></div>
              <input type="text" name="twitter" value="<?php print_custom_field('twitter'); ?>"><br /> 

            <div style="margin-top: 10px;"><strong>Linkedin</strong></div>
              <input type="text" name="linkedin" value="<?php print_custom_field('linkedin'); ?>"><br /> 

            <div style="margin-top: 10px;"><strong>Blog</strong></div>
              <input type="text" name="blog" value="<?php print_custom_field('blog'); ?>"><br /> 

            <div style="margin-top: 10px;"><strong>Site</strong></div>
              <input type="text" name="site" value="<?php print_custom_field('site'); ?>"><br />
              <input type="hidden" name="atualizar_perfil" value="atualizar_perfil"><br />            

              </div>
          </div>      
        </div>
    </div>

       
      <?php if ($_GET["page"] == "" || $_GET["page"] == "sobre") { ?>
        
        <div style="width: 685px; float: left; margin-left: 50px;">
        
        <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Minha história</h4>
        <?php $minhahistoria = get_the_content(); ?>

        <textarea name="content_atleta"><?php echo strip_tags($minhahistoria); ?></textarea>  

        <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Patrocínio ou apoio que esta procurando</h4>
        <textarea name="patrocinio_atleta"><?php print_custom_field('atletapatrocinio'); ?></textarea><br /><br />

        <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Meu sonho</h4>
        <textarea name="sonho_atleta"><?php print_custom_field('atletameusonho'); ?></textarea><br /><br />

        <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Campeonatos que já participei</h4>
        <textarea name="campeonatospart"><?php print_custom_field('campeonatospart'); ?></textarea><br /><br />

        <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Países que já viajei</h4>
         <textarea name="paisesviagem"><?php print_custom_field('paisesviagem'); ?></textarea><br /><br />

        </div>

        <div style="float: right; margin-right: 37px;">
          <input type="submit" value="Salvar Alterações">
        </div> 
      </form>

      <?php } ?>
      
    </div>
  </div>



  <div id="contentwrap">
  
    <!-- /content -->
    <?php themify_content_after(); // hook ?>

  <?php endwhile ?>
<?php get_footer(); ?>

<script type="text/javascript">
$('.cctm_checkbox_id').change(function() {
camposMarcados = new Array();
  $("input[type=checkbox][name='cctm_idiomas[]']:checked").each(function(){
    camposMarcados.push($(this).val());
    $('#check_idiomas').val('['+camposMarcados+']');
  })
});

$('.cctm_checkbox').change(function() {
camposMarcadosPaises = new Array();
  $("input[type=checkbox][name='cctm_paises[]']:checked").each(function(){
    camposMarcadosPaises.push($(this).val());
    $('#check_paises').val('['+camposMarcadosPaises+']');
  })
});

</script>