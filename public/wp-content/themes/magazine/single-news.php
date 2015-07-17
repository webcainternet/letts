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

<style type="text/css">
  .redes_sociais{
    width: 40%;
  }
</style>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

  <div id="contentwrap" style="padding-top: 0px;">

    
  <?php 

  if( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="content" class="list-post">

      <div style="float: left; width: 674px; padding-top: 10px; min-height: 1000px;">
      <h1 class="post-title" itemprop="name" style="text-align: center; margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;">
        <span style="font-weight: bold;"><a href="#"><?php echo the_title(); ?></a></span></h1>

<div class="redes_sociais">
<a id="share-button" href="#" title="Facebook Share Button">
  <img src="/wp-content/themes/magazine/images/compartilhar.jpg" alt="Facebook Share Button" title="Facebook Share Button" />
</a>

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-share="false" data-send="true" data-layout="button" data-width="350" data-show-faces="false" data-colorscheme="dark" data-action="like"></div>
</div>

<?php 
  $imagem_fb = get_custom_field('imgnews:to_image_src');
  $texto_fb = strip_tags(get_the_excerpt(120));
?>

<script type="text/javascript">

$('#share-button').click(function (e){
  e.preventDefault();
  FB.ui({
    method: 'feed',
    name: '<?php the_title(); ?>',
    link: '<?php the_permalink(); ?>',
    picture: '<?php echo $imagem_fb; ?>',
    caption: '',
    description: '<?php echo $texto_fb; ?>',
  });
});
</script>

        <div style="text-align: right;">
          <span style="background-color: #FFF; color: #7A8B8B; width: 100px; font-size: 16px;font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;"><?php echo the_date() ; ?></span>
        </div>

        <div class="related-posts" style="float: left; width: 674px; margin-bottom: 10px;">
        

          

          <?php

            mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
                die("Could not connect: " . mysql_error());
            mysql_select_db(DB_NAME);

            $idpost = get_the_ID();  


            $resultbasicaemail = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicaemail' AND post_id = ".$idpost);
            while ($rowbasicaemail = mysql_fetch_array($resultbasicaemail, MYSQL_ASSOC)) {
              $basicaemail = $rowbasicaemail["meta_value"];
            }
            
            
            $squery = "select id, post_title from wp_posts where id = (select m.post_id from wp_postmeta m inner join wp_posts p on m.post_id = p.id where m.meta_value = '".$basicaemail."' AND m.meta_key = 'basicaemail' AND p.post_status = 'publish' AND post_type = 'atleta')";
            $resultemailname = mysql_query($squery);
            while ($rowemailname = mysql_fetch_array($resultemailname, MYSQL_ASSOC)) {
              $emailname = $rowemailname["post_title"];
              $idatleta = $rowemailname["id"];
            }
            ?>

            <div style="text-align: right;">
              <span style="background-color: #FFF; color: #7A8B8B; width: 100px; font-size: 16px;font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;">Por: <a href="http://letts.com.br/?p=<?php echo $idatleta; ?>"> <?php echo $emailname; ?></a></span>
            </div>

            <?php

            $resultbasicaimagemurl = mysql_query("select meta_value from wp_postmeta where meta_key = '_wp_attached_file' AND post_id = (select meta_value from wp_postmeta where meta_key = 'imgnews' AND post_id = ".$idpost.")");
            while ($rowbasicaimagemurl = mysql_fetch_array($resultbasicaimagemurl, MYSQL_ASSOC)) {
              $basicaimagemurl = $rowbasicaimagemurl["meta_value"];
              if ($basicaimagemurl) {
                  $basicaimagemurl = explode("http://letts.com.br/wp-content/uploads/users/", $basicaimagemurl);
                 if ($basicaimagemurl[1]) {
                   $basicaimagemurl = 'http://letts.com.br/wp-content/uploads/users/'.$basicaimagemurl[1];
                 }else{
                    $basicaimagemurl = 'http://letts.com.br/wp-content/uploads/'.$basicaimagemurl[0];
                 }
              ?>
              <img class="imgnoticias" src="<?php echo $basicaimagemurl; ?>" width="674" style="width: 674px; border-radius: 5px;">
              <?php
              }
            }

          ?>


          <?php 
            $resultslvideo = mysql_query("select meta_value from wp_postmeta where meta_key = 'slvideo' AND post_id = ".$idpost);
            while ($rowslvideo = mysql_fetch_array($resultslvideo, MYSQL_ASSOC)) {
              $slvideo = $rowslvideo["meta_value"];
            }

            $resultvideourl = mysql_query("select meta_value from wp_postmeta where meta_key = 'videourl' AND post_id = ".$idpost);
            while ($rowvideourl = mysql_fetch_array($resultvideourl, MYSQL_ASSOC)) {
              $videourl = $rowvideourl["meta_value"];
            }
          ?>

          <?php if ($slvideo == "youtube") { ?>
            <div style="width: 674px; border-radius: 5px; height: 390px; background-size: 312px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/<?php echo utf8_encode($basicaimagemurl); ?>');">
          <?php 
            $url_video = explode("=", $videourl);            
          ?>
          <iframe width="674" height="390" src="//www.youtube.com/embed/<?php echo $url_video[1]; ?>" frameborder="0" allowfullscreen></iframe>
        
            </div>
            <article class="post type-post clearfix">
              <div class="post-content">
                <p class="post-meta">
                  <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
                    <a href="<?php echo "$guid"; ?>"><?php echo utf8_encode($nome); ?></a></span>
                </p>
              </div>
            </article>
          <?php } ?>

          <?php if ($slvideo == "vimeo") { 
            $videourl = str_replace("vimeo.com/", "player.vimeo.com/video/", $videourl)

            ?>
            <div style="width: 674px; border-radius: 5px; height: 390px; background-size: 312px; background-position: center; background-image: url('http://letts.com.br/wp-content/uploads/<?php echo utf8_encode($basicaimagemurl); ?>');">
              <iframe width="674" height="390" src="<?php echo $videourl; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <article class="post type-post clearfix">
              <div class="post-content">
                <p class="post-meta">
                  <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
                    <a href="<?php echo "$guid"; ?>"><?php echo utf8_encode($nome); ?></a></span>
                </p>
              </div>
            </article>
          <?php } ?>

          <article class="post type-post clearfix">
            <div class="post-content">
              <p class="post-meta">
                <span class="post-category">
                  <?php the_content(); ?>
                </span>
              </p>
            </div>

            <div style="height: 192px;">
              <div class="fb-comments" data-href="http://letts.com.br/<?php echo $_SERVER["REQUEST_URI"]; ?>" data-width="674" data-numposts="5" data-colorscheme="light"></div>
            </div>
          </article>
<?php /* if ($_SESSION["lettslogin"]) { ?>

    <?php if ($_POST){ ?>
      <p>Comenário adicionado com sucesso.</p>
    <?php } ?>

   <form action="" method="post" id="commentform">
      <fieldset>
      <h3><span>Deixe seu comentário</span></h3>
      <ul>
        <li>
          <label for="author">Nome: <span>(Obrigatório)</span></label>
          <input type="text" aria-required="true" tabindex="1" size="22" id="author" name="author" value="" maxlength="100">
        </li>                           
        <li>
          <label for="email">E-mail: <span>(Obrigatório)</span></label>
          <input type="text" aria-required="true" tabindex="2" size="22" id="email" name="email" value="">
        </li>                           
        <li>
          <label for="url">Website: </label>
          <input type="text" tabindex="3" size="22" value="" id="url" name="url">
        </li>
        <li>
        <label for="comment">Comentário: </label>
        <textarea tabindex="4" rows="10" cols="58" id="comment" name="comment"></textarea>
        <div class="clear"></div>
        <span>&nbsp;</span>
        <input type="submit" value="Enviar" tabindex="5" id="submit" class="bt-enviar-comentarios" name="submit">
        <input type="hidden" name="comment_post_ID" value="<?php the_ID(); ?>" id="comment_post_ID">
        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
        </li>                                                        
      </ul>
            </fieldset>
    </form>
<?php } */ ?>


        </div>

        <div style="margin: 0px; padding: 0px;">


          <div style="width: 100%; height: 30px; float: left;">&nbsp;</div>

          <div style="width: 100%; height: 30px; float: left;">&nbsp;</div>

        </div>


      </div>

      <!-- Login -->
      <div id="divLogin">
        <?php include("includes/side-ads.php"); ?>
      </div>



    </div>





  </div>









  <?php endwhile; ?>

<?php get_sidebar("sidebar-alt"); ?>

  </div>
  <!-- /#contentwrap -->

</div>
<!-- /layout-container -->
  
<?php get_footer(); ?>