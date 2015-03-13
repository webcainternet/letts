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

<script type="text/javascript">
  newsfiltraesporte() {
    document.forms["filtroesporte"].submit();
  }

  $( ".selectitens" ).change(function() {
    alert( "Handler for .change() called." );
});
</script>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

  <div id="contentwrap" style="width: 100%;padding-top: 0px;">

    <div id="content" class="list-post">

      <div style="float: left; width: 100%; padding-top: 10px; margin-bottom: 10px;">
      
      <div style="float: left; width: 49%;"> 
        <h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;" style="font-weight: bold;">Eventos</h1>
      </div>

      <div style="float: right; width: 49%; text-align: right; margin-bottom: 10px;"> 
        
        <div class="post-meta" style="display: inline;">
          <div style="float: right; margin-right: 15px;">
              <span class="post-category" style="margin-right: 108px;"><a href="#">Esporte</a></span><br>
              <form method="post" id="filtroesporte">
              <select name="slesporte" class="selectitens"  onchange="this.form.submit();">
                      <option>-- Selecione --</option>
                      <option>Aeromodelismo</option>
                      <option>Alpinismo</option>
                      <option>Asa Delta</option>
                      <option>BMX</option>
                      <option>BMX – Free style</option>
                      <option>Balonismo</option>
                      <option>Base Jumping</option>
                      <option>Bodyboard</option>
                      <option>Bouldering</option>
                      <option>Bungee Jumping</option>
                      <option>Canoagem</option>
                      <option>Carveboard</option>
                      <option>Caça submarina</option>
                      <option>Ciclismo</option>
                      <option>Cliff Diving</option>
                      <option>Corrida aventura</option>
                      <option>Drift</option>
                      <option>Escalada</option>
                      <option>Esqui</option>
                      <option>Football Freestyle</option>
                      <option>Free Style Motocross</option>
                      <option>FreeBoard</option>
                      <option>Heli-Skiing</option>
                      <option>Highline</option>
                      <option>Jet Ski</option>
                      <option>Kart</option>
                      <option>Kitesurfing</option>
                      <option>Liquid Mountaineering</option>
                      <option>Longboard skate</option>
                      <option>Longboard surf</option>
                      <option>Mega ramp</option>
                      <option>Mergulho</option>
                      <option>Moto Trial</option>
                      <option>Moto Wheeling</option>
                      <option>Motocross</option>
                      <option>Mountain Bike</option>
                      <option>Mountain biking</option>
                      <option>Mountain boarding</option>
                      <option>Off Road/Rally</option>
                      <option>Paintball</option>
                      <option>Paragliding</option>
                      <option>Paragliding</option>
                      <option>Parapente</option>
                      <option>Parkour</option>
                      <option>Patins in Line</option>
                      <option>Psicobloc</option>
                      <option>Rafting</option>
                      <option>Rally</option>
                      <option>Rapel</option>
                      <option>Sandboard</option>
                      <option>Skate</option>
                      <option>Skate - Street</option>
                      <option>Skate – Free style</option>
                      <option>Skate – Mini ramp</option>
                      <option>Skate - Vertical</option>
                      <option>Sky Surfing</option>
                      <option>Skydive</option>
                      <option>Slackline</option>
                      <option>Snowboard</option>
                      <option>Stand Up Paddle</option>
                      <option>Street Luge</option>
                      <option>Surf</option>
                      <option>Surf - Freesurf</option>
                      <option>Tow-in</option>
                      <option>Trekking</option>
                      <option>Triathlon</option>
                      <option>UFC (MMA)</option>
                      <option>Vela/Iatismo</option>
                      <option>Velocidade</option>
                      <option>Wakeboard</option>
                      <option>Wakeboard Free style</option>
                      <option>Windsurf</option>
                      <option>WingWalking</option>
                      <option>Outros</option>
                    </select>
                    </form>
            </div>
        </div>
        </div>


        <div style="margin: 0px; padding: 0px;">

          <div style="width: 100%; float: left; height: 1px;"> &nbsp;</div>

    <?php query_posts('post_type=eventos');
    while (have_posts()): the_post(); ?>

          <?php $basicaimagemurl = get_custom_field('eventofoto:to_image_src');
            $basicaimagemurl = str_replace("http://letts.com.br/wp-content/uploads/", "", $basicaimagemurl);
           ?>
         <div class="related-posts" style="float: left; width: 312px; margin-left: 20px; margin-right: 20px; margin-bottom: 0px;">
            <a href="<?php the_permalink(); ?>">
              <div class="imgnoticias" style="width: 306px; border-radius: 5px; height: 180px; background-size: 312px; 
              background-position: center;
              background-image: url('<?php print_custom_field('eventofoto:to_image_src'); ?>');
              <?php echo calcbackgroundsize("wp-content/uploads/".$basicaimagemurl, 306, 180); ?>;
              ">

              &nbsp;</div>

            </a>
            <article class="post type-post clearfix">
              <div class="post-content">
                <p class="post-meta">
                  <span class="post-category" style="font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                </p>
              </div>
            </article>
          </div>

    <?php endwhile; // end of the loop. ?>


        </div>

      </div>

        <?php if ($_SESSION["lettslogin"]) { ?> 
        <div class="bt_acessorios bt_acessorios2">
          <a class="button" href="/cadastrar-evento/?id_post=<?php echo $_SESSION["lettslogin"]; ?>">Cadastrar Evento</a>
        </div>
      <?php } ?>  




    

  </div>
</div>
  <!-- /#contentwrap -->

  

</div>
<!-- /layout-container -->
  
<?php get_footer(); ?>