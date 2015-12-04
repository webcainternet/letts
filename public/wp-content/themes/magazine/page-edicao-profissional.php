<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<?php
function selectedopt($value, $selected){
    return $value==$selected ? ' selected="selected"' : '';
}
?>

<script src="/wp-content/themes/magazine/js/jquery-1.5.2.min.js"></script>
<script type='text/javascript' src='/wp-content/themes/magazine/js/jquery.maskedinput-1.3.min.js'></script>

<script>
  $(function($){
    $("#data_nascimento").mask("99/99/9999");
  });
</script>

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

          <?php $vprofissao = get_custom_field('profissao'); ?>
          <div id="text-1017" class="widget widget_text" style="border: 0px; margin: 0px; margin-top: 13px;">
                 <select id="profissao" name="profissao" style="width: 313px; height: 35px; font-size: 0.9em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
                      <option>-- Selecione a profissão --</option>
<option value="Assessor de imprensa" <?php echo selected("Assessor de imprensa", $vprofissao); ?>>Assessor de imprensa</option>
<option value="Coordenador de eventos" <?php echo selected("Coordenador de ", $vprofissao); ?>>Coordenador de eventos</option>
<option value="Desenhista" <?php echo selected("Desenhista", $vprofissao); ?>>Desenhista</option>
<option value="Empresário" <?php echo selected("Empresário", $vprofissao); ?>>Empresário</option>
<option value="Estatístico" <?php echo selected("Estatístico", $vprofissao); ?>>Estatístico</option>
<option value="Estilista" <?php echo selected("Estilista", $vprofissao); ?>>Estilista</option>
<option value="Executivo de contas publicitárias" <?php echo selected("Exec", $vprofissao); ?>>Executivo de contas publicitárias</option>
<option value="Fisioterapeuta" <?php echo selected("Fisioterapeuta", $vprofissao); ?>>Fisioterapeuta</option>
<option value="Fotografo" <?php echo selected("Fotografo", $vprofissao); ?>>Fotografo</option>
<option value="Fotojornalista" <?php echo selected("Fotojornalista", $vprofissao); ?>>Fotojornalista</option>
<option value="Gerente de relações públicas" <?php echo selected("Gerente de ", $vprofissao); ?>>Gerente de relações públicas</option>
<option value="Gestor desportivo" <?php echo selected("Gestor desportivo", $vprofissao); ?>>Gestor desportivo</option>
<option value="Jornalista" <?php echo selected("Jornalista", $vprofissao); ?>>Jornalista</option>
<option value="Nutricionista" <?php echo selected("Nutricionista", $vprofissao); ?>>Nutricionista</option>
<option value="Personal Crossfit" <?php echo selected("Personal Crossfit", $vprofissao); ?>>Personal Crossfit</option>
<option value="Personal academia" <?php echo selected("Personal academia", $vprofissao); ?>>Personal academia</option>
<option value="Professor de idomas" <?php echo selected("Professor de idomas", $vprofissao); ?>>Professor de idomas</option>
<option value="Psicologo" <?php echo selected("Psicologo", $vprofissao); ?>>Psicologo</option>
<option value="Psicólogo esportivo" <?php echo selected("Psicólogo esportivo", $vprofissao); ?>>Psicólogo esportivo</option>
<option value="Técnico" <?php echo selected("Técnico", $vprofissao); ?>>Técnico</option>
<option value="Videomaker" <?php echo selected("Videomaker", $vprofissao); ?>>Videomaker</option>
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
              <input type="text" name="data_nascimento" id="data_nascimento" value="<?php print_custom_field('basicanascimento'); ?>"><br />
<?php 
  $sexo = get_custom_field('basicagenero');
  if ($sexo == "Feminino") {
     $feminino = 'checked="checked"';
   } else if ($sexo == "Masculino") {
      $masculino = 'checked="checked"';
   }
?>

             <div style="margin-top: 10px;"><strong>Sexo</strong></div>
              <input type="radio" name="genero" id="masculino" value="Masculino" <?php echo $masculino; ?>>Masculino 
              <input type="radio" name="genero" id="feminino" value="Feminino" <?php echo $feminino; ?>>Feminino<br />


              <div style="margin-top: 10px;"><strong>Telefones</strong></div>
              <input type="text" name="telefones" value="<?php print_custom_field('basicatelefones'); ?>"><br />

              <?php $vbasicaestadonascimento = get_custom_field('basicaestadonascimento'); ?>
              <div style="margin-top: 10px;"><strong>Nascimento</strong></div>
              <div style="margin-top: 5px;">Estado</div>
             <select name="estado_nascimento" id="estado_nascimento" style="width: 243px; height: 35px; margin-bottom: 14px; font-size: 0.9em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
              <option>-- Selecione o estado --</option> 
<option value="Acre" <?php echo selected("Acre", $vbasicaestadonascimento); ?>>Acre</option> 
<option value="Alagoas" <?php echo selected("Alagoas", $vbasicaestadonascimento); ?>>Alagoas</option> 
<option value="Amazonas" <?php echo selected("Amazonas", $vbasicaestadonascimento); ?>>Amazonas</option> 
<option value="Amapá" <?php echo selected("Amapá", $vbasicaestadonascimento); ?>>Amapá</option> 
<option value="Bahia" <?php echo selected("Bahia", $vbasicaestadonascimento); ?>>Bahia</option> 
<option value="Ceará" <?php echo selected("Ceará", $vbasicaestadonascimento); ?>>Ceará</option> 
<option value="Distrito Federal" <?php echo selected("Distrito Federal", $vbasicaestadonascimento); ?>>Distrito Federal</option> 
<option value="Espírito Santo" <?php echo selected("Espírito Santo", $vbasicaestadonascimento); ?>>Espírito Santo</option> 
<option value="Goiás" <?php echo selected("Goiás", $vbasicaestadonascimento); ?>>Goiás</option> 
<option value="Maranhão" <?php echo selected("Maranhão", $vbasicaestadonascimento); ?>>Maranhão</option> 
<option value="Mato Grosso" <?php echo selected("Mato Grosso", $vbasicaestadonascimento); ?>>Mato Grosso</option> 
<option value="Mato Grosso do Sul" <?php echo selected("Mato Grosso do Sul", $vbasicaestadonascimento); ?>>Mato Grosso do Sul</option> 
<option value="Minas Gerais" <?php echo selected("Minas Gerais", $vbasicaestadonascimento); ?>>Minas Gerais</option> 
<option value="Pará" <?php echo selected("Pará", $vbasicaestadonascimento); ?>>Pará</option> 
<option value="Paraíba" <?php echo selected("Paraíba", $vbasicaestadonascimento); ?>>Paraíba</option> 
<option value="Paraná" <?php echo selected("Paraná", $vbasicaestadonascimento); ?>>Paraná</option> 
<option value="Pernambuco" <?php echo selected("Pernambuco", $vbasicaestadonascimento); ?>>Pernambuco</option> 
<option value="Piauí" <?php echo selected("Piauí", $vbasicaestadonascimento); ?>>Piauí</option> 
<option value="Rio de Janeiro" <?php echo selected("Rio de Janeiro", $vbasicaestadonascimento); ?>>Rio de Janeiro</option> 
<option value="Rio Grande do Norte" <?php echo selected("Rio Grande do Norte", $vbasicaestadonascimento); ?>>Rio Grande do Norte</option> 
<option value="Rondônia" <?php echo selected("Rondônia", $vbasicaestadonascimento); ?>>Rondônia</option> 
<option value="Rio Grande do Sul" <?php echo selected("Rio Grande do Sul", $vbasicaestadonascimento); ?>>Rio Grande do Sul</option> 
<option value="Roraima" <?php echo selected("Roraima", $vbasicaestadonascimento); ?>>Roraima</option> 
<option value="Santa Catarina" <?php echo selected("Santa Catarina", $vbasicaestadonascimento); ?>>Santa Catarina</option> 
<option value="Sergipe" <?php echo selected("Sergipe", $vbasicaestadonascimento); ?>>Sergipe</option> 
<option value="São Paulo" <?php echo selected("São Paulo", $vbasicaestadonascimento); ?>>São Paulo</option> 
<option value="Tocantins" <?php echo selected("Tocantins", $vbasicaestadonascimento); ?>>Tocantins</option> 
             </select>              
              <div style="margin-top: -10px;">Cidade</div>
              <input type="text" name="cidade_nascimento" value="<?php print_custom_field('basicacidadenascimento'); ?>">
              <br /><br />

              <?php $vbasicaestadoatual = get_custom_field('basicaestadoatual'); ?>
              <div style="margin-top: 10px;"><strong>Onde Mora</strong></div>
             <div style="margin-top: 5px;">Estado</div>
             <select name="estado_atual" id="estado_atual" style="width: 243px; height: 35px; margin-bottom: 14px; font-size: 0.9em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
              <option>-- Selecione o estado --</option> 
<option value="Acre" <?php echo selected("Acre", $vbasicaestadoatual); ?>>Acre</option> 
<option value="Alagoas" <?php echo selected("Alagoas", $vbasicaestadoatual); ?>>Alagoas</option> 
<option value="Amazonas" <?php echo selected("Amazonas", $vbasicaestadoatual); ?>>Amazonas</option> 
<option value="Amapá" <?php echo selected("Amapá", $vbasicaestadoatual); ?>>Amapá</option> 
<option value="Bahia" <?php echo selected("Bahia", $vbasicaestadoatual); ?>>Bahia</option> 
<option value="Ceará" <?php echo selected("Ceará", $vbasicaestadoatual); ?>>Ceará</option> 
<option value="Distrito Federal" <?php echo selected("Distrito Federal", $vbasicaestadoatual); ?>>Distrito Federal</option> 
<option value="Espírito Santo" <?php echo selected("Espírito Santo", $vbasicaestadoatual); ?>>Espírito Santo</option> 
<option value="Goiás" <?php echo selected("Goiás", $vbasicaestadoatual); ?>>Goiás</option> 
<option value="Maranhão" <?php echo selected("Maranhão", $vbasicaestadoatual); ?>>Maranhão</option> 
<option value="Mato Grosso" <?php echo selected("Mato Grosso", $vbasicaestadoatual); ?>>Mato Grosso</option> 
<option value="Mato Grosso do Sul" <?php echo selected("Mato Grosso do Sul", $vbasicaestadoatual); ?>>Mato Grosso do Sul</option> 
<option value="Minas Gerais" <?php echo selected("Minas Gerais", $vbasicaestadoatual); ?>>Minas Gerais</option> 
<option value="Pará" <?php echo selected("Pará", $vbasicaestadoatual); ?>>Pará</option> 
<option value="Paraíba" <?php echo selected("Paraíba", $vbasicaestadoatual); ?>>Paraíba</option> 
<option value="Paraná" <?php echo selected("Paraná", $vbasicaestadoatual); ?>>Paraná</option> 
<option value="Pernambuco" <?php echo selected("Pernambuco", $vbasicaestadoatual); ?>>Pernambuco</option> 
<option value="Piauí" <?php echo selected("Piauí", $vbasicaestadoatual); ?>>Piauí</option> 
<option value="Rio de Janeiro" <?php echo selected("Rio de Janeiro", $vbasicaestadoatual); ?>>Rio de Janeiro</option> 
<option value="Rio Grande do Norte" <?php echo selected("Rio Grande do Norte", $vbasicaestadoatual); ?>>Rio Grande do Norte</option> 
<option value="Rondônia" <?php echo selected("Rondônia", $vbasicaestadoatual); ?>>Rondônia</option> 
<option value="Rio Grande do Sul" <?php echo selected("Rio Grande do Sul", $vbasicaestadoatual); ?>>Rio Grande do Sul</option> 
<option value="Roraima" <?php echo selected("Roraima", $vbasicaestadoatual); ?>>Roraima</option> 
<option value="Santa Catarina" <?php echo selected("Santa Catarina", $vbasicaestadoatual); ?>>Santa Catarina</option> 
<option value="Sergipe" <?php echo selected("Sergipe", $vbasicaestadoatual); ?>>Sergipe</option> 
<option value="São Paulo" <?php echo selected("São Paulo", $vbasicaestadoatual); ?>>São Paulo</option> 
<option value="Tocantins" <?php echo selected("Tocantins", $vbasicaestadoatual); ?>>Tocantins</option> 
             </select>
              <div style="margin-top: -10px;">Cidade</div>
              <input type="text" name="cidade_atual" value="<?php print_custom_field('basicacidadeatual'); ?>">
              <br><br>

              <?php $vescolaridade = get_custom_field('escolaridade'); ?>
              <div style="margin-top: 10px;"><strong>Escolaridade</strong></div>
              <select id="escolaridade" name="escolaridade" style="width: 240px; height: 35px; font-size: 1.00em; font-family: 'Open Sans', sans-serif; font-weight: 100; float: left; margin-top: -2px; ">
                      <option>-- Selecione a escolaridade --</option>
<option value="Primeiro Grau" <?php echo selected("Primeiro Grau", $vescolaridade); ?>>Primeiro Grau</option>
<option value="Segundo Grau" <?php echo selected("Segundo Grau", $vescolaridade); ?>>Segundo Grau</option>
<option value="Terceiro Grau" <?php echo selected("Terceiro Grau", $vescolaridade); ?>>Terceiro Grau</option>
<option value="Pós-Graduação" <?php echo selected("Pós-Graduação", $vescolaridade); ?>>Pós-Graduação</option>
<option value="Doutorado" <?php echo selected("Doutorado", $vescolaridade); ?>>Doutorado</option>
               </select>  <br />                

<?php
function no_array($valor) {
  $Array = get_custom_field('idiomas:to_array');
    if(in_array($valor, $Array)) {
    return 'checked="checked"';
  }
}
?>
           <div style="margin-top: 10px;"><br /><strong>Idiomas</strong></div>
            <div class="idiomas_edit">
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Português"' <?php echo no_array('Português'); ?>>Português<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Inglês"' <?php echo no_array('Inglês'); ?>>Inglês<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Espanhol"' <?php echo no_array('Espanhol'); ?>>Espanhol<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Alemão"' <?php echo no_array('Alemão'); ?>>Alemão<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Italiano"' <?php echo no_array('Italiano'); ?>>Italiano<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Chinês"' <?php echo no_array('Chinês'); ?>>Chinês<br /></span>
              <span><input type="checkbox" name="cctm_idiomas[]" class="cctm_checkbox_id" value='"Japonês"' <?php echo no_array('Japonês'); ?>>Japonês<br /></span>
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