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

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

  <div id="contentwrap" style="width: 100%;padding-top: 0px;">

  <?php if( have_posts() ) while ( have_posts() ) : the_post(); ?>



<div id="content" class="list-post">

      <div style="float: left; width: 674px; padding-top: 10px; min-height: 1000px;">
      <h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;"><a href="http://letts.com.br/morre-skatista-jay-adams-um-dos-mais-influentes-da-historia/"  style="font-weight: bold;"><?php echo the_title(); ?></a></h1>
        
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
              <span style="background-color: #FFF; color: #7A8B8B; width: 100px; font-size: 16px;font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;">Por: <a href="http://letts.com.br/?p=<?php echo $idatleta; ?>"> <?php echo $emailname; ?></span>
            </div>

            <?php

            $resultbasicaimagemurl = mysql_query("select meta_value from wp_postmeta where meta_key = '_wp_attached_file' AND post_id = (select meta_value from wp_postmeta where meta_key = 'imgnews' AND post_id = ".$idpost.")");
            while ($rowbasicaimagemurl = mysql_fetch_array($resultbasicaimagemurl, MYSQL_ASSOC)) {
              $basicaimagemurl = $rowbasicaimagemurl["meta_value"];
              ?>
              <a href="#"><img class="imgnoticias" src="http://letts.com.br/wp-content/uploads/<?php echo $basicaimagemurl; ?>" width="674" style="width: 674px; border-radius: 5px;"></a>
              <?php
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
              <iframe width="674" height="390" src="<?php echo $videourl; ?>" frameborder="0" allowfullscreen></iframe>
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
          </article>
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

  </div>
  <!-- /#contentwrap -->

</div>
<!-- /layout-container -->
  
<?php get_footer(); ?>