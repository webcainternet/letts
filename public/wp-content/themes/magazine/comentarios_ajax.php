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
		  });        

    });
});

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
	<div class="comentario-header"><?php echo $qtd; ?> Comentário<?php if ($qtd != 1) { echo "s"; } ?></div>


	<div class="comentario-body">
		<div class="comentario-foto">
			<a href="#" target="_blank">
				<img class="_1ci" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xtp1/v/t1.0-1/p40x40/12141696_10206510530059921_6521226772923966991_n.jpg?oh=15602d3ab06936677ee89e1bd6ff7948&amp;oe=56D831FC&amp;__gda__=1458042672_9d06af294364e26c728f86020161239f">
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
	</div>


<div id="results"></div>
