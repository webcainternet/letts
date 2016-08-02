<!DOCTYPE html>
<?php
/**
 * Template Name: Print Profissional
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<link rel="stylesheet" id="theme-style-css" href="http://letts.com.br/wp-content/themes/magazine/style.css?ver=1.3.0" type="text/css" media="all">
<link rel="stylesheet" id="themify-icon-font-css" href="http://letts.com.br/wp-content/themes/magazine/themify/fontawesome/css/font-awesome.min.css?ver=1.8.9" type="text/css" media="all">

<style type="text/css">
body{
  font-family: 'Oswald', sans-serif;
}
#mainContent{
  background-image: none !important;
}

.topo_impressao{
  background: #f7f4ed;
  width: 100%;
}

.topo_impressao div{
  width: 980px;
  margin: 0 auto;
  padding: 10px 0px;
}

.topo_impressao div p{
  float: right;
  padding-top: 35px;
  font-size: 14px;
}

#content{
  width: 980px;
  margin: auto;
  padding: 5px 20px 20px 20px;
  border: 2px dotted;
  margin-top: 30px;
  margin-bottom: 30px;
}

.rodape_impressao{
  background: #f8f7f5;
  width: 100%;
  margin-top: 20px;
}

.rodape_impressao div{
  width: 980px;
  margin: 0 auto;
  padding: 10px 0px;
}

.rodape_impressao div p{
  float: right;
  padding-top: 25px;
  font-size: 14px;
}

</style>

<html>
  <head>
<script type='text/javascript' src='/wp-includes/js/jquery/jquery.js?ver=1.8.3'></script>
  </head>
  <body>
    <?php
      $postid = $_GET['post_id'];
    ?>
		<?php query_posts('p='. $postid.'&limit=1&post_type=profissional');
    while (have_posts()): the_post(); ?>
  <div id="mainContent">
    <div id="content">
<div style="float: right; width: 690px;">
    <h1 class="entry-title" style="text-transform: uppercase;"><?php the_title(); ?></h1>
      <div class="entry-content">
        <h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0px; margin-bottom: 10px;">Minha história</h4>
        <?php the_content(); ?>
      </div>
          <div style="margin-top: 10px;"><strong>Link dos vídeos:</strong></div>
          <?php the_permalink(); ?>?page=videos

          <div style="padding-top: 40px;">
          <?php if (get_custom_field('basicafacebook')) { ?>
            <div style="padding: 10px; float: right;"><i class="fa fa-facebook" aria-hidden="true"></i> <?php print_custom_field('basicafacebook'); ?></div>
          <?php } ?>

          <?php if (get_custom_field('instagram')) { ?>
            <div style="padding: 10px; float: right;"><i class="fa fa-instagram" aria-hidden="true"></i> <?php print_custom_field('instagram'); ?></div>
          <?php } ?>

          <?php if (get_custom_field('twitter')) { ?>
            <div style="padding: 10px; float: right;"><i class="fa fa-twitter" aria-hidden="true"></i> <?php print_custom_field('twitter'); ?></div>
          <?php } ?>

          <?php if (get_custom_field('linkedin')) { ?>
            <div style="padding: 10px; float: right;"><i class="fa fa-linkedin" aria-hidden="true"></i> <?php print_custom_field('linkedin'); ?></div>
          <?php } ?>

          <?php if (get_custom_field('blog')) { ?>
            <div style="padding: 10px; float: right;"><i class="fa fa-rss" aria-hidden="true"></i> <?php print_custom_field('blog'); ?></div>
          <?php } ?>

          <?php if (get_custom_field('site')) { ?>
            <div style="padding: 10px; float: right;"><i class="fa fa-link" aria-hidden="true"></i> <?php print_custom_field('site'); ?></div>
          <?php } ?>
          </div>
</div>

<div style="float: left; width: 210px;">
          <div style="float: left;
          border: 1px #ff8920 solid;
          width: 180px;
          height: 180px;
          margin-top: 30px;
          background-image: url('<?php print_custom_field('basicaimagem:to_image_src'); ?>');
          background-size: 1800px;
          background-position:center;margin-right: 30px;" id="imgbackground">
      &nbsp;
    </div>
      <div style="margin-top: 10px;"><strong>Data de nascimento</strong></div>
      <?php print_custom_field('basicanascimento'); ?><br />

      <div style="margin-top: 10px;"><strong>Gênero</strong></div>
      <?php print_custom_field('basicagenero'); ?><br />

      <div style="margin-top: 10px;"><strong>Telefones</strong></div>
      <?php print_custom_field('basicaddi'); ?> <?php print_custom_field('basicatelefones'); ?><br />

      <div style="margin-top: 10px;"><strong>País</strong></div>
      <?php print_custom_field('basicapaisatual'); ?><br />

      <div style="margin-top: 10px;"><strong>Estado</strong></div>
      <?php print_custom_field('basicaestadoatual'); ?><br />

      <div style="margin-top: 10px;"><strong>Cidade</strong></div>
      <?php print_custom_field('basicacidadeatual'); ?><br />

      <div style="margin-top: 10px;"><strong>E-mail</strong></div>
          <?php print_custom_field('basicaemail'); ?><br />

       </div>
</div>

    </div>
  </div>
 		<?php endwhile; // end of the loop. ?>
  </body>

<script type="text/javascript">
  print();
</script>
</html>

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
