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
				<h4 class="related-title" style="border: 0px;margin-top: 10px; margin-bottom: 5px;">Filtrar Marcas</h4>
			</div>
    <div class="post-meta" style="display: inline;">
          <div style="float: left; margin-right: 15px;">
            <form method="post" id="filtroesporte">
            <div style="float: left; margin-top: 0px;">
              <input name="nomemarca" type="text" value="" size="30" class="required" style="width: 182px; height: 30px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;  margin-top: 2px;">
            </div>
            <div style="float: left; margin-top: 0px;">
              <input type="submit" value="Buscar" style="">
            </div>
                </form>
          </div>

    </div>
</form>
			<div style="float: left; width: 100%; padding-top: 10px;">
				<div class="related-posts" style="float: left; width: 100%; margin-bottom: 30px;">



							<div style="">

<section class="module">
  <section class="wraper">


<?php
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or
    die("Could not connect: " . mysql_error());
mysql_select_db(DB_NAME);

$consultapagina = $_GET["pagina"];
if ($consultapagina == "") {
  $consultapagina = 1; $vermaisqtos = 50;
  if ($_POST["nomemarca"] == "") {
    $query1 = "select id, post_title from wp_posts where post_type = 'marca' AND post_status = 'publish' ORDER BY rand() LIMIT ".$vermaisqtos;
  } else {
    $query1 = "select id, post_title from wp_posts where post_type = 'marca' AND post_status = 'publish' AND post_title like '%".$_POST["nomemarca"]."%'  ORDER BY rand() LIMIT ".$vermaisqtos;
  }
} else {
  $consultapagina = $consultapagina+1; $vermaisqtos = 50 * $consultapagina;
  if ($_POST["nomemarca"] == "") {
    $query1 = "select id, post_title from wp_posts where post_type = 'marca' AND post_status = 'publish' ORDER BY id DESC LIMIT ".$vermaisqtos;
  } else {
    $query1 = "select id, post_title from wp_posts where post_type = 'marca' AND post_status = 'publish' AND post_title like '%".$_POST["nomemarca"]."%'  ORDER BY id DESC LIMIT ".$vermaisqtos;
  }
}



//echo "<h1>".$query1."</h1>";
$result = mysql_query($query1);

$qtositens = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $qtositens = $qtositens + 1;
	$nome = $row["post_title"];
	$idatleta = $row["id"];


    $resultlogo = mysql_query("select meta_value from wp_postmeta where meta_key = 'logo' AND post_id = ".$row["id"]);
    while ($rowlogo = mysql_fetch_array($resultlogo, MYSQL_ASSOC)) {
    	$logo = $rowlogo["meta_value"];
    }
	$resultlogourl = mysql_query("select meta_value from wp_postmeta where meta_key = '_wp_attached_file' AND post_id = ".$logo);
    while ($rowlogourl = mysql_fetch_array($resultlogourl, MYSQL_ASSOC)) {
    	$logourl = $rowlogourl["meta_value"];
        $logourl = explode("http://letts.com.br/wp-content/uploads/", $logourl);
        if ($logourl[1]) {
            $logourl = $logourl[1];
        }else{
            $logourl = $logourl[0];
        }
    }
    ?>

      <figure class='small' style="border: 0px;">

      <a href="/?p=<?php echo $idatleta; ?>">
      	<div style="width: 212.8px;
      	height: 200px;
      	background-image: url('http://letts.com.br/wp-content/uploads/<?php echo $logourl; ?>');
      	background-position: center;
        background-repeat: no-repeat;
      	<?php echo calcbackgroundsize("wp-content/uploads/".$logourl, 212, 200); ?>;
      	">
      		&nbsp;
      	</div>
        <!-- <img src="http://fakeimg.pl/250x250/" alt=""> -->
      </a>
      <figcaption class="transition-050 opacity85">
        <a href="/?p=<?php echo $idatleta; ?>">
          <strong class="text transition-050 title"><?php echo $nome; ?></strong>
          <!-- <span class="text transition-050 desc"><?php echo $esporte; ?><br><b>Mora em: </b><?php echo $basicacidadeatual; ?></span> -->
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

<?php if ($qtositens % 50 == 0) { ?>
<div>
  <div style="float: right;">
    <a href="?pagina=<?php echo $consultapagina; ?>"><input type="submit" value="Ver mais" style="margin-top: 16px;"></a>
  </div>
  &nbsp;
</div>
<?php } ?>


						</div>

				</div>

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

<?php include('banners.php') ?>

<?php get_footer(); ?>
