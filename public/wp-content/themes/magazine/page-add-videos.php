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
          'post_title'    => $_POST['titulo_video'],
          'post_status'   => 'publish',
          'post_type'     => 'video',
          'post_author'   => 1
        );

        $post_id = wp_insert_post($my_post);
        add_post_meta($post_id, 'link_video', $_POST['link_video'], true);
        add_post_meta($post_id, 'basicaemail', $_POST['email'], true);
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
              <a href="/print?post_id=<?php echo get_the_ID(); ?>" target="_blank">Imprimir Currículo</a>
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