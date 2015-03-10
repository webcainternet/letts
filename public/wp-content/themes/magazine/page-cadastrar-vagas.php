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
          'post_status'   => 'publish',
          'post_type'     => 'vagas',
          'post_author'   => 1
        );

        $post_id = wp_insert_post($my_post);
        add_post_meta($post_id, 'empresa', $_POST['empresa'], true);
        add_post_meta($post_id, 'basicaestadoatual', $_POST['estado'], true);
        add_post_meta($post_id, 'basicacidadeatual', $_POST['cidade'], true);
        add_post_meta($post_id, 'basicaemail', $_POST['email'], true);
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
             <input class="input_video_estado" type="text" name="estado" value="" placeholder="Estado">
             <input class="input_video_cidade" type="text" name="cidade" value="" placeholder="Cidade">
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
<?php get_footer(); ?>