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
    query_posts( array('p' => $_GET['id_post'], 'post_type' => 'profissional') );
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
        background-image: url('<?php print_custom_field('image_profissional'); ?>'); 
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
                 <select id="profissao" name="profissao" style="width: 313px; height: 35px; font-size: 0.9em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
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
      
    </div>
    
  </div>

  <div style="margin-top: 20px; margin-bottom: 20px; width: 100%; float: left;">
        <input type="text" name="titulo" value="<?php the_title(); ?>">
  </div>
        <p id="sucesso">Dados alterados com sucesso.</p>
  <div>
    <div style="float: left; width: 325px;">
        <div class="col3-1" style="width: 100%; margin: 0px; background: #EFEFEF; padding-left: 15px; border-top: 5px #ff8920 solid;">
          <div id="text-1016" class="widget widget_text" style="">
            <h4 class="widgettitle">Informações básicas</h4>      
            <div class="textwidget">
              <div style="margin-top: 10px;"><strong>Data de nascimento</strong></div>
              <input type="text" name="data_nascimento" value="<?php print_custom_field('basicanascimento'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Sexo</strong></div>
              <input type="text" name="genero" value="<?php print_custom_field('basicagenero'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Telefones</strong></div>
              <input type="text" name="telefones" value="<?php print_custom_field('basicatelefones'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Nascimento</strong></div>
              <div style="margin-top: 5px;">Estado</div>
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
              <div style="margin-top: -10px;">Cidade</div>
              <input type="text" name="cidade_nascimento" value="<?php print_custom_field('basicacidadenascimento'); ?>">
              <br /><br />

              <div style="margin-top: 10px;"><strong>Onde Mora</strong></div>
             <div style="margin-top: 5px;">Estado</div>
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
              <div style="margin-top: -10px;">Cidade</div>
              <input type="text" name="cidade_atual" value="<?php print_custom_field('basicacidadeatual'); ?>">
              <br><br>

              <div style="margin-top: 10px;"><strong>Escolaridade</strong></div>
              <select id="escolaridade" name="escolaridade" style="width: 240px; height: 35px; font-size: 1.00em; font-family: 'Open Sans', sans-serif; font-weight: 100; float: left; margin-top: -2px; ">
                      <option>-- Selecione a escolaridade --</option>
                      <option value="1o Grau">Primeiro Grau</option>
                      <option value="2o Grau">Segundo Grau</option>
                      <option value="3o Grau">Terceiro Grau</option>
                      <option value="Pós-Graduação">Pós-Graduação</option>
                      <option value="Doutorado">Doutorado</option>
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
        <textarea name="content_profissional"><?php echo strip_tags($minhahistoria); ?></textarea>  

        <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Países que já viajei</h4>
         <textarea name="paisesviagem"><?php print_custom_field('paisesviagem'); ?></textarea><br /><br />
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