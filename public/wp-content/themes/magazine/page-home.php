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

	<div id="contentwrap" style="width: 100%; padding-top: 0px;">

		<div id="content" class="list-post">

			<div style="float: left; width: 730px; padding-top: 10px;">
				<h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;" style="font-weight: bold;">News</h1>

			<?php $args = array(
			    'author'        	=>  1,
			    'orderby'       	=>  'post_date',
			    'post_type'     	=>  'news',
			    'order'        		=>  'ASC',
			    'posts_per_page'  	=>  5
			); 
			query_posts($args); ?>

			<?php while (have_posts()) : the_post(); ?>
			<?php $primeira_noticia = 0; ?>
			<?php if ($primeira_noticia == 0) { ?>
			<h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;"><a href="http://letts.com.br/morre-skatista-jay-adams-um-dos-mais-influentes-da-historia/"  style="font-weight: bold;">Morre skatista Jay Adams um dos mais influentes da história</a></h1>
				<div class="related-posts" style="float: left; width: 674px; margin-bottom: 10px;">
					<a href="http://letts.com.br/morre-skatista-jay-adams-um-dos-mais-influentes-da-historia/"><img class="imgnoticias" src="http://letts.com.br/wp-content/uploads/2014/08/JayAdams1.jpg" width="674" style="width: 674px; border-radius: 5px;"></a>
					<article class="post type-post clearfix">
						<div class="post-content">
							<p class="post-meta">
								<span class="post-category"><a href="http://letts.com.br/morre-skatista-jay-adams-um-dos-mais-influentes-da-historia/">Jay Adams, skatista mericano considerado um dos mais</a></span>
							</p>
						</div>
					</article>
				</div>
			<?php
				$primeira_noticia = 1;
				} else{ ?>

			<div class="related-posts" style="float: left; width: 335px; height: 480px; margin-right: 30px;">
				<div class="imgnoticias" style="width: 330px; border-radius: 5px; height: 212px;  margin-bottom: 15px;">
					<img src="<?php print_custom_field('imgnews:to_image_src'); ?>" style="max-height: 212px;">
				</div>
				<article class="post type-post clearfix">
					<div class="post-content">
						<p class="post-meta">
							<span class="post-category" style="font-weight: bold;font-size: 22px; font-family: Oswald, sans-serif;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
						</p>
						<h1 class="post-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_excerpt(30); ?></b></a></a>
						</h1>
					</div>
				</article>
			</div>

			<?php } ?>
			<?php endwhile; ?>
			</div>

			<!-- Login -->
			<div id="divLogin">
				<?php include("includes/side-login.php"); ?>
			</div>

			<!-- Login -->
			<div id="divNovo" style="display: none;">
				<?php include("includes/side-novoperfil.php"); ?>
			</div>
			<?php get_sidebar("sidebar-alt"); ?>

		</div>


		<div style="float: left; width: 100%; margin-top: 10px;">
			<div class="related-posts">
				<h4 class="related-title" style="margin-bottom: 15px; border: 0px;">Últimos atletas cadastrados</h4>
				<div class="related-posts" style="float: left; width: 100%;">
					<article class="post type-post clearfix">
						<div class="post-content">
							
															
<section class="module">
  <section class="wraper">    


<?php
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);

$result = mysql_query("select id, post_title from wp_posts where post_type = 'atleta' AND post_status = 'publish' limit 10");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$nome = $row["post_title"];
	$idatleta = $row["id"];

	$resultesporte = mysql_query("select meta_value from wp_postmeta where meta_key = 'atletaesporte' AND post_id = ".$row["id"]);
    while ($rowesporte = mysql_fetch_array($resultesporte, MYSQL_ASSOC)) {
    	$esporte = $rowesporte["meta_value"];
    }

    $resultbasicacidadeatual = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicacidadeatual' AND post_id = ".$row["id"]);
    while ($rowbasicacidadeatual = mysql_fetch_array($resultbasicacidadeatual, MYSQL_ASSOC)) {
    	$basicacidadeatual = $rowbasicacidadeatual["meta_value"];
    }

    $resultbasicaimagem = mysql_query("select meta_value from wp_postmeta where meta_key = 'basicaimagem' AND post_id = ".$row["id"]);
    while ($rowbasicaimagem = mysql_fetch_array($resultbasicaimagem, MYSQL_ASSOC)) {
    	$basicaimagem = $rowbasicaimagem["meta_value"];
    }
	$resultbasicaimagemurl = mysql_query("select meta_value from wp_postmeta where meta_key = '_wp_attached_file' AND post_id = ".$basicaimagem);
    while ($rowbasicaimagemurl = mysql_fetch_array($resultbasicaimagemurl, MYSQL_ASSOC)) {
    	$basicaimagemurl = $rowbasicaimagemurl["meta_value"];
    }


    ?>
    <figure class='small' style="border: 0px;">
      <a href="/?p=<?php echo $idatleta; ?>">
      	<div style="width: 250px; 
      	height: 200px; 
      	background-image: url('http://letts.com.br/wp-content/uploads/<?php echo $basicaimagemurl; ?>');
      	background-position: center;
      	background-size: 100%;
      	">
      		&nbsp;
      	</div>
        <!-- <img src="http://fakeimg.pl/250x250/" alt=""> -->
      </a>
      <figcaption class="transition-050 opacity85">
        <a href="/?p=<?php echo $idatleta; ?>">
          <strong class="text transition-050 title"><?php echo utf8_encode($nome); ?></strong>
          <span class="text transition-050 desc"><?php echo utf8_encode($esporte); ?><br>
          <?php if ($basicacidadeatual != "") { ?>
          <b>Mora em: </b><?php echo $basicacidadeatual; ?>
          <?php } ?>
          </span>
        </a>
      </figcaption>
    </figure>
    <?php
}

mysql_free_result($result);
?>



  </section>
</section>



						</div>
					</article>
				</div>
			</div>
			<p class="post-meta" style="text-align: right;">
				<span class="post-category"><a href="http://letts.com.br/buscar-atleta/">Ver mais atletas</a></span>
			</p>
		</div>



		<div style="float: left; width: 100%; margin-top: 10px;">
			<div class="related-posts">
				<h4 class="related-title" style="margin-bottom: 15px; border: 0px;">Marcas</h4>
				<div class="related-posts" style="float: left; width: 100%;">
					<article class="post type-post clearfix">
						<div class="post-content">
							
							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/09/letts-logo.png">
							</div>

							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/09/logo-1.png">
							</div>

							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/09/widextravel.png">
							</div>

							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/09/wavegreen.png">
							</div>

							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/09/vidasobreboards.png">
							</div>

							<div class="wcalogos">
								<img class="wcsimglogos" src="http://letts.com.br/wp-content/uploads/2014/09/usetrip.png">
							</div>

						</div>
					</article>
				</div>
			</div>
			<p class="post-meta" style="text-align: right;">
				<span class="post-category"><a href="http://letts.com.br/buscar-marca/m">Ver mais marcas</a></span>
			</p>
		</div>

	</div>
</div>
	<!-- /#contentwrap -->

	

</div>
<!-- /layout-container -->
	
<?php get_footer(); ?>