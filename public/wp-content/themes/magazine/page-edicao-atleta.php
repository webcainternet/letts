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

        $my_post = array(
          'ID'           => $_GET['id_post'],
          'post_content' => $_POST['content_atleta'],
          'post_title'   => $_POST['titulo']
        );

      // Update the post into the database
        wp_update_post($my_post);

        update_post_meta($_GET['id_post'], 'atletaesporte', $_POST['esporte']);
        update_post_meta($_GET['id_post'], 'basicanascimento', $_POST['data_nascimento']);
        update_post_meta($_GET['id_post'], 'basicagenero', $_POST['genero']);
        update_post_meta($_GET['id_post'], 'basicatelefones', $_POST['telefones']);
        update_post_meta($_GET['id_post'], 'basicacidadenascimento', $_POST['cidade_nascimento']);
        update_post_meta($_GET['id_post'], 'basicaestadonascimento', $_POST['estado_nascimento']);
        update_post_meta($_GET['id_post'], 'basicacidadeatual', $_POST['cidade_atual']);
        update_post_meta($_GET['id_post'], 'basicaestadoatual', $_POST['estado_atual']);
        update_post_meta($_GET['id_post'], 'basicafacebook', $_POST['facebook']);
        update_post_meta($_GET['id_post'], 'instagram', $_POST['instagram']);
        update_post_meta($_GET['id_post'], 'twitter', $_POST['twitter']);
        update_post_meta($_GET['id_post'], 'linkedin', $_POST['linkedin']);
        update_post_meta($_GET['id_post'], 'blog', $_POST['blog']);
        update_post_meta($_GET['id_post'], 'site', $_POST['site']);
        update_post_meta($_GET['id_post'], 'atletapatrocinio', $_POST['patrocinio_atleta']);
        update_post_meta($_GET['id_post'], 'atletameusonho', $_POST['sonho_atleta']);
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

  
     <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">   
    <div style="float: left;
          margin: 0px;
          margin-left: 25px;">
          <div id="text-1017" class="widget widget_text" style="border: 0px; margin: 0px; margin-top: 13px;">
            <input type="text" name="esporte" value="<?php print_custom_field('atletaesporte'); ?>">   
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
              <div style="margin-top: 10px;"><strong>Data de nascimento</strong></div>
              <input type="text" name="data_nascimento" value="<?php print_custom_field('basicanascimento'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Gênero</strong></div>
              <input type="text" name="genero" value="<?php print_custom_field('basicagenero'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Telefones</strong></div>
              <input type="text" name="telefones" value="<?php print_custom_field('basicatelefones'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Nascimento</strong></div>
              <input type="text" name="cidade_nascimento" value="<?php print_custom_field('basicacidadenascimento'); ?>">
              <input type="text" name="estado_nascimento" value="<?php print_custom_field('basicaestadonascimento'); ?>"><br />

              <div style="margin-top: 10px;"><strong>Atual</strong></div>
              <input type="text" name="cidade_atual" value="<?php print_custom_field('basicacidadeatual'); ?>">
              <input type="text" name="estado_atual" value="<?php print_custom_field('basicaestadoatual'); ?>"><br />

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

              </div>
          </div>      
        </div>
    </div>

       
      <?php if ($_GET["page"] == "" || $_GET["page"] == "sobre") { ?>
        
        <div style="width: 685px; float: left; margin-left: 50px;">
        
        <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Minha história</h4>
        <textarea name="content_atleta"><?php the_content(); ?></textarea>  

        <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Patrocínio ou apoio que esta procurando</h4>
        <textarea name="patrocinio_atleta"><?php print_custom_field('atletapatrocinio'); ?></textarea><br /><br />

        <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Meu sonho</h4>
        <textarea name="sonho_atleta"><?php print_custom_field('atletameusonho'); ?></textarea><br /><br />

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