<script type="text/javascript">
	
$.ajax({
  url: "/wp-content/themes/magazine/comentarios.php",
  data: {
      idpagina: '<?php echo $idpagina; ?>'
   },
  cache: false
})
  .done(function( html ) {
    $( "#results" ).empty();
    $( "#results" ).append( html );
  });



$(document).ready(function(){
    $("#postmsg1").click(function(){
		$.ajax({
		  url: "/wp-content/themes/magazine/comentarios.php",
		  data: {
		      idpagina: '<?php echo $idpagina; ?>',
		      mensagem: $("#mensagem").val()
		   },
		  cache: false
		})
		  .done(function( html ) {
		    $( "#results" ).empty();
		    $( "#results" ).append( html );
		    $("#mensagem").val('');
		  });        

    });
});

function removecomentario(idcomentario) {
	$.ajax({
	  url: "/wp-content/themes/magazine/comentarios.php",
	  data: {
	      idpagina: '<?php echo $idpagina; ?>',
	      rmcomentario: idcomentario
	   },
	  cache: false
	  })
	  .done(function( html ) {
	    $( "#results" ).empty();
	    $( "#results" ).append( html );
	});
}
</script>


<?php
/// OBTEM QUANTIDADE ///
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query1 = "SELECT count(*) as qtd FROM letts_comentarios lc  inner join wp_posts p on lc.idlogin = p.id WHERE lc.idpagina = '".$idpagina."' ORDER BY lc.data DESC";
$result=mysqli_query($con,$query1);

while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
	$qtd = $row["qtd"];
}

// Free result set
mysqli_free_result($result);
mysqli_close($con);
/// FIM - OBTEM QUANTIDADE ///
?>


<div class="comentario-content">

	<div class="comentario-header"><iframe frameborder="0" width="100%" height="30" scrolling="no" noresize src="http://letts.com.br/wp-content/themes/magazine/like.php?idpagina=<?php echo $_SERVER['REQUEST_URI']; ?>"></iframe></div>
	<div class="comentario-header"><?php echo $qtd; ?> Comentário<?php if ($qtd != 1) { echo "s"; } ?></div>
	<?php /* <div class="comentario-header"><a id="share-button" href="#" title="Facebook Share Button" style="margin-top: 0px;"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Compartilhar</a></div> */ ?>
	<div class="comentario-header">
		<?php do_action( 'addthis_widget' ); ?>
	</div>


	<div class="comentario-body">
		<?php if ($_SESSION["lettslogin"] != 1) { ?> 
			<div class="comentario-foto">
				<a href="#" target="_blank">

					<?php 
					$post_usuario = $_SESSION["lettslogin"];
						if ($post_usuario != 0) { ?>

					<?php query_posts( array('post_type'=>array('profissional','atleta','marca'),'p' => $post_usuario ) ); ?>

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php $imgsize_top = get_custom_field('basicaimagem:to_image_src'); ?>
						<?php
							$imgsize_top = str_replace("letts.com.br/", "", $imgsize_top);
							$imgsize_top = str_replace("http://", "", $imgsize_top);
							$imgsize_top = str_replace("https://", "", $imgsize_top);
						?>
							
							<div style="margin-top: -5px; width: 40px; height: 40px; 
							background-image: url(<?php print_custom_field('basicaimagem:to_image_src'); ?>); 
							background-size: 40px 40px;" id="imgbackgroundtopo">&nbsp;</div>
							
						<?php endwhile; endif; ?>
						<?php wp_reset_query(); ?>
					<?php } ?>	
				</a>
			</div>


			<div class="comentario-texto">
				<div class="areatexta"><textarea name="mensagem" id="mensagem" class="coment-texta" placeholder="Digite seu comentário"></textarea></div>
				<div class="areabotao">
					<input type="hidden" name="idpagina" value="<?php echo $idpagina; ?>">
					<input type="button" id="postmsg1" name="postmsg1" style="background: #ff8920 !important;
												  color: #fff;
												  border: none;
												  padding: 7px 20px;
												  cursor: pointer;
												  letter-spacing: .1em;
												  font-size: 1.125em;
												  font-family: Oswald, sans-serif;
												  text-transform: uppercase;
												  -webkit-appearance: none;
												  -webkit-border-radius: 0;float: right; margin-top: 0px;margin-left: 300px;" value="Publicar">
				
				</div>
			</div>
		<?php } ?>
	</div>


<div id="results"></div>

</div>

<?php $abrirunico = 1; ?>