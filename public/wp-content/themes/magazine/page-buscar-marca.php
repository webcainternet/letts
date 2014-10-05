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

		<div style="width: 100%;">
			<div class="related-posts">
				<h4 class="related-title" style="border: 0px;margin-top: 10px; margin-bottom: 5px;">Marcas</h4>
			</div>

		


			<div style="float: left; width: 100%; padding-top: 10px;">
				<div class="related-posts" style="float: left; width: 100%; margin-bottom: 30px;">



							<div style="">
								
<section class="module">
  <section class="wraper">    


<?php
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);

$result = mysql_query("select id, post_title from wp_posts where post_type = 'marca' AND post_status = 'publish'");

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
        background-repeat: no-repeat;
      	background-size: 250px;
      	">
      		&nbsp;
      	</div>
        <!-- <img src="http://fakeimg.pl/250x250/" alt=""> -->
      </a>
      <figcaption class="transition-050 opacity85">
        <a href="/?p=<?php echo $idatleta; ?>">
          <strong class="text transition-050 title"><?php echo utf8_encode($nome); ?></strong>
          <!-- <span class="text transition-050 desc"><?php echo utf8_encode($esporte); ?><br><b>Mora em: </b><?php echo utf8_encode($basicacidadeatual); ?></span> -->
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


						</div>

				</div>

			</div>

		</div>



	</div>
</div>
	<!-- /#contentwrap -->

	

</div>
<!-- /layout-container -->

<?php get_footer(); ?>