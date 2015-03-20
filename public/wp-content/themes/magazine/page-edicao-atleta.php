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
        <div id="paises_hd" style="width: 635px;">
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Afeganistão"'>Afeganistão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"África do Sul"'>África do Sul</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Akrotiri"'>Akrotiri</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Albânia"'>Albânia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Alemanha"'>Alemanha</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Andorra"'>Andorra</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Angola"'>Angola</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Anguila"'>Anguila</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Antárctida"'>Antárctida</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Antígua e Barbuda"'>Antígua e Barbuda</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Antilhas Neerlandesas"'>Antilhas Neerlandesas</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Arábia Saudita"'>Arábia Saudita</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Arctic Ocean"'>Arctic Ocean</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Argélia"'>Argélia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Argentina"'>Argentina</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Arménia"'>Arménia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Aruba"'>Aruba</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ashmore and Cartier Islands"'>Ashmore and Cartier Islands</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Atlantic Ocean"'>Atlantic Ocean</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Austrália"'>Austrália</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Áustria"'>Áustria</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Azerbaijão"'>Azerbaijão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Baamas"'>Baamas</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Bangladeche"'>Bangladeche</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Barbados"'>Barbados</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Barém"'>Barém</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Bélgica"'>Bélgica</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Belize"'>Belize</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Benim"'>Benim</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Bermudas"'>Bermudas</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Bielorrússia"'>Bielorrússia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Birmânia"'>Birmânia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Bolívia"'>Bolívia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Bósnia e Herzegovina"'>Bósnia e Herzegovina</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Botsuana"'>Botsuana</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Brasil"'>Brasil</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Brunei"'>Brunei</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Bulgária"'>Bulgária</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Burquina Faso"'>Burquina Faso</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Burúndi"'>Burúndi</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Butão"'>Butão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Cabo Verde"'>Cabo Verde</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Camarões"'>Camarões</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Camboja"'>Camboja</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Canadá"'>Canadá</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Catar"'>Catar</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Cazaquistão"'>Cazaquistão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Chade"'>Chade</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Chile"'>Chile</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"China"'>China</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Chipre"'>Chipre</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Clipperton Island"'>Clipperton Island</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Colômbia"'>Colômbia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Comores"'>Comores</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Congo-Brazzaville"'>Congo-Brazzaville</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Congo-Kinshasa"'>Congo-Kinshasa</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Coral Sea Islands"'>Coral Sea Islands</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Coreia do Norte"'>Coreia do Norte</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Coreia do Sul"'>Coreia do Sul</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Costa do Marfim"'>Costa do Marfim</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Costa Rica"'>Costa Rica</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Croácia"'>Croácia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Cuba"'>Cuba</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Dhekelia"'>Dhekelia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Dinamarca"'>Dinamarca</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Domínica"'>Domínica</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Egipto"'>Egipto</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Emiratos Árabes Unidos"'>Emiratos Árabes Unidos</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Equador"'>Equador</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Eritreia"'>Eritreia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Eslováquia"'>Eslováquia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Eslovénia"'>Eslovénia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Espanha"'>Espanha</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Estados Unidos"'>Estados Unidos</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Estónia"'>Estónia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Etiópia"'>Etiópia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Faroé"'>Faroé</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Fiji"'>Fiji</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Filipinas"'>Filipinas</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Finlândia"'>Finlândia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"França"'>França</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Gabão"'>Gabão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Gâmbia"'>Gâmbia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Gana"'>Gana</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Gaza Strip"'>Gaza Strip</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Geórgia"'>Geórgia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Geórgia do Sul e Sandwich do Sul"'>Geórgia do Sul e Sandwich do Sul</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Gibraltar"'>Gibraltar</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Granada"'>Granada</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Grécia"'>Grécia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Gronelândia"'>Gronelândia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Guame"'>Guame</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Guatemala"'>Guatemala</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Guernsey"'>Guernsey</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Guiana"'>Guiana</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Guiné"'>Guiné</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Guiné Equatorial"'>Guiné Equatorial</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Guiné-Bissau"'>Guiné-Bissau</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Haiti"'>Haiti</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Honduras"'>Honduras</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Hong Kong"'>Hong Kong</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Hungria"'>Hungria</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Iémen"'>Iémen</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilha Bouvet"'>Ilha Bouvet</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilha do Natal"'>Ilha do Natal</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilha Norfolk"'>Ilha Norfolk</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilhas Caimão"'>Ilhas Caimão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilhas Cook"'>Ilhas Cook</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilhas dos Cocos"'>Ilhas dos Cocos</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilhas Falkland"'>Ilhas Falkland</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilhas Heard e McDonald"'>Ilhas Heard e McDonald</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilhas Marshall"'>Ilhas Marshall</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilhas Salomão"'>Ilhas Salomão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilhas Turcas e Caicos"'>Ilhas Turcas e Caicos</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilhas Virgens Americanas"'>Ilhas Virgens Americanas</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ilhas Virgens Britânicas"'>Ilhas Virgens Britânicas</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Índia"'>Índia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Indian Ocean"'>Indian Ocean</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Indonésia"'>Indonésia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Irão"'>Irão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Iraque"'>Iraque</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Irlanda"'>Irlanda</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Islândia"'>Islândia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Israel"'>Israel</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Itália"'>Itália</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Jamaica"'>Jamaica</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Jan Mayen"'>Jan Mayen</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Japão"'>Japão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Jersey"'>Jersey</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Jibuti"'>Jibuti</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Jordânia"'>Jordânia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Kuwait"'>Kuwait</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Laos"'>Laos</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Lesoto"'>Lesoto</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Letónia"'>Letónia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Líbano"'>Líbano</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Libéria"'>Libéria</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Líbia"'>Líbia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Listenstaine"'>Listenstaine</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Lituânia"'>Lituânia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Luxemburgo"'>Luxemburgo</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Macau"'>Macau</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Macedónia"'>Macedónia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Madagáscar"'>Madagáscar</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Malásia"'>Malásia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Malávi"'>Malávi</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Maldivas"'>Maldivas</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Mali"'>Mali</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Malta"'>Malta</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Man, Isle of"'>Man, Isle of</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Marianas do Norte"'>Marianas do Norte</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Marrocos"'>Marrocos</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Maurícia"'>Maurícia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Mauritânia"'>Mauritânia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Mayotte"'>Mayotte</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"México"'>México</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Micronésia"'>Micronésia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Moçambique"'>Moçambique</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Moldávia"'>Moldávia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Mónaco"'>Mónaco</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Mongólia"'>Mongólia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Monserrate"'>Monserrate</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Montenegro"'>Montenegro</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Mundo"'>Mundo</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Namíbia"'>Namíbia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Nauru"'>Nauru</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Navassa Island"'>Navassa Island</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Nepal"'>Nepal</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Nicarágua"'>Nicarágua</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Níger"'>Níger</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Nigéria"'>Nigéria</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Niue"'>Niue</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Noruega"'>Noruega</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Nova Caledónia"'>Nova Caledónia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Nova Zelândia"'>Nova Zelândia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Omã"'>Omã</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Pacific Ocean"'>Pacific Ocean</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Países Baixos"'>Países Baixos</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Palau"'>Palau</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Panamá"'>Panamá</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Papua-Nova Guiné"'>Papua-Nova Guiné</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Paquistão"'>Paquistão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Paracel Islands"'>Paracel Islands</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Paraguai"'>Paraguai</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Peru"'>Peru</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Pitcairn"'>Pitcairn</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Polinésia Francesa"'>Polinésia Francesa</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Polónia"'>Polónia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Porto Rico"'>Porto Rico</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Portugal"'>Portugal</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Quénia"'>Quénia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Quirguizistão"'>Quirguizistão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Quiribáti"'>Quiribáti</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Reino Unido"'>Reino Unido</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"República Centro-Africana"'>República Centro-Africana</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"República Checa"'>República Checa</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"República Dominicana"'>República Dominicana</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Roménia"'>Roménia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ruanda"'>Ruanda</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Rússia"'>Rússia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Salvador"'>Salvador</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Samoa"'>Samoa</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Samoa Americana"'>Samoa Americana</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Santa Helena"'>Santa Helena</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Santa Lúcia"'>Santa Lúcia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"São Cristóvão e Neves"'>São Cristóvão e Neves</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"São Marinho"'>São Marinho</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"São Pedro e Miquelon"'>São Pedro e Miquelon</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"São Tomé e Príncipe"'>São Tomé e Príncipe</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"São Vicente e Granadinas"'>São Vicente e Granadinas</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Sara Ocidental"'>Sara Ocidental</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Seicheles"'>Seicheles</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Senegal"'>Senegal</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Serra Leoa"'>Serra Leoa</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Sérvia"'>Sérvia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Singapura"'>Singapura</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Síria"'>Síria</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Somália"'>Somália</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Southern Ocean"'>Southern Ocean</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Spratly Islands"'>Spratly Islands</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Sri Lanca"'>Sri Lanca</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Suazilândia"'>Suazilândia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Sudão"'>Sudão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Suécia"'>Suécia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Suíça"'>Suíça</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Suriname"'>Suriname</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Svalbard e Jan Mayen"'>Svalbard e Jan Mayen</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Tailândia"'>Tailândia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Taiwan"'>Taiwan</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Tajiquistão"'>Tajiquistão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Tanzânia"'>Tanzânia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Território Britânico do Oceano Índico"'>Território Britânico do Oceano Índico</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Territórios Austrais Franceses"'>Territórios Austrais Franceses</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Timor Leste"'>Timor Leste</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Togo"'>Togo</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Tokelau"'>Tokelau</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Tonga"'>Tonga</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Trindade e Tobago"'>Trindade e Tobago</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Tunísia"'>Tunísia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Turquemenistão"'>Turquemenistão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Turquia"'>Turquia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Tuvalu"'>Tuvalu</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Ucrânia"'>Ucrânia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Uganda"'>Uganda</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"União Europeia"'>União Europeia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Uruguai"'>Uruguai</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Usbequistão"'>Usbequistão</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Vanuatu"'>Vanuatu</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Vaticano"'>Vaticano</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Venezuela"'>Venezuela</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Vietname"'>Vietname</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Wake Island"'>Wake Island</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Wallis e Futuna"'>Wallis e Futuna</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"West Bank"'>West Bank</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Zâmbia"'>Zâmbia</span>
           <span><input type="checkbox" name="cctm_paises[]" class="cctm_checkbox" value='"Zimbabué"'>Zimbabué</span>
           <input type='hidden' id="check_paises" name="check_paises">
        </div>
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