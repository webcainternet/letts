<?php
/**
 * Template for single post view
 * @package themify
 * @since 1.0.0
 */
?>
 
<?php get_header(); ?>


	
<style type="text/css">
	
	.sliderleft {
		float: left; background-color: #E6E6E6; padding-top: 230px; text-align: center; font-size: 12px; width: 20px; margin-right: 5px; height: 244px; margin-top: 3px; color: #303030;
	}
	.sliderleft:hover {
		background-color: #ff8920; color: #FFFFFF;
	}


	.sliderright {
		float: left; background-color: #E6E6E6; padding-top: 230px; text-align: center; font-size: 12px; width: 20px; margin-left: 5px; height: 244px; margin-top: 3px; color: #303030;
	}

	.sliderright:hover {
		background-color: #ff8920; color: #FFFFFF;
	} 

	.slideritemselect {
		float: left;
		width: 14px;
		height: 14px;
		border-radius: 8px;
		background-color: #DDDDDD;
		margin-right: 5px;
	}
	.slideritemselect:hover {
		background-color: #ff8920;
	}
</style>


<?php 
/** Themify Default Variables
 *  @var object */
global $themify; ?>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

	<div id="contentwrap" style="width: 100%; padding-top: 0px;">

		<div id="content" class="list-post" style="padding-top: 10px;">

			<div style="float: left; width: 730px;">
			<?php $args = array(
			    'author'        	=>  1,
			    'orderby'       	=>  'post_date',
			    'post_type'     	=>  'news',
			    'order'        		=>  'ASC',
			    'posts_per_page'  	=>  5
			); 
			query_posts($args); ?>
			<?php $primeira_noticia = 0; ?>

			<?php while (have_posts()) : the_post(); ?>
			<?php $urlimg = get_custom_field('imgnews:to_image_src');
			if ($primeira_noticia == 0) { ?>

			
			<h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%; display: none;">
				<a href="<?php the_permalink(); ?>"  style="font-weight: bold;"><?php the_title(); ?></a>
			</h1>
				<?php echo do_shortcode('[carousel-horizontal-posts-content-slider]'); ?>




				
				<?php /*
				<div class="sliderleft">
					<
				</div>

				<div class="related-posts related-posts-home" style="float: left; width: 664px; margin-bottom: 0px;">
					<a href="<?php the_permalink(); ?>" style="text-decoration: none;">
					<div class="img_news" style="width: 658px; height: 474px; border-radius: 5px;
					background-image: url('<?php echo $urlimg; ?>');
					<?php echo calcbackgroundsize($urlimg, 658, 474); ?>;
					">
						&nbsp;
					</div>
					</a>

					<h1 class="post-title">	
						<a href="<?php the_permalink(); ?>"><?php the_excerpt(80); ?></a>
					</h1>	

					<h1 class="post-title" style="text-align: center; margin: auto; width: 95px; font-size: 1px; margin-bottom: 10px;">	
						<div class="slideritemselect" style="background-color: #ff8920;"></div>
						<div class="slideritemselect"></div>
						<div class="slideritemselect"></div>
						<div class="slideritemselect"></div>
						<div class="slideritemselect"></div>
						&nbsp;
					</h1>
				</div>

				<div class="sliderright">
				>
				</div>

				*/ ?>

			<?php
				$primeira_noticia++; ?>
				<h1 class="post-title" itemprop="name" style="margin: 10px 0 10px 0; padding: 0; font-size: 2em; font-family: Oswald, sans-serif; text-transform: uppercase; letter-spacing: .05em; color: #000; line-height: 110%;" style="font-weight: bold;">News</h1>
				
				<?php } else{ ?>

			<div class="related-posts related-posts-home" style="float: left; width: 350px; height: 480px;">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<div class="imgnoticias" style="border-radius: 5px; height: 212px; margin-bottom: 15px;">
						<div style="height: 212px; width: 344px;
						background-image: url('<?php echo $urlimg; ?>');
						<?php echo calcbackgroundsize($urlimg, 344, 212); ?>;
						">
							&nbsp;
						</div>
					</div>
				</a>
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

			<a href="/news" id="criar" style="padding: 10px 255px; background: #f57300; text-decoration: none;">
				Ver todas as Noticias
			</a>
			</div>

			<?php if ($_SESSION["lettslogin"] == "1") { ?>
			<!-- Login -->
			<div id="divLogin">
				<?php include("includes/side-login.php"); ?>
			</div>
			<?php } ?>

			<?php get_sidebar("sidebar-alt"); ?>

		</div>


		<div style="float: left; width: 100%; margin-top: 0px;">
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
      	<?php echo calcbackgroundsize("wp-content/uploads/".$basicaimagemurl, 300, 200); ?>;
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