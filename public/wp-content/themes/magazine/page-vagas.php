<?php // var_dump($_POST); exit; ?>

<style type="text/css">
	.classificados {
		float: left;
		width: 234px;
		margin-left: 0px;
		margin-bottom: 20px;
		border: solid 1px #FFFFFF;
		padding: 15px;
	}
	.classificados:hover {
		border: solid 1px #BBBBBB;
	}

#input_estado{
  width: 180px;
  border-radius: 4px;
}

#select_estado{
	display: none;
}

#share-button{
	margin-top: 0px !important;
}

.divconteudo {
display:inline;
}
.redes_sociais{
	display: block;
}

input[type=text], input[type=search], input[type=email] {
    width: 246px !important;
    height: 32px !important;
		max-width: 100% !important;
}

</style>
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

<script type='text/javascript' src='/wp-content/themes/magazine/js/jquery.maskedinput-1.3.min.js'></script>

<style type="text/css">
	.selectitens {
	width: 170px;
}
</style>

<script type="text/javascript">

	function excluirvaga(idvaga, idlogin) {
		var txt;
		var r = confirm("Tem certeza que deseja excluir?");
		if (r == true) {

			$.ajax({
			method: "POST",
			url: "/wp-content/themes/magazine/excluirvagas.php",
			data: { idvaga: idvaga, idlogin: idlogin }
			})
			.done(function( msg ) {
				var n = msg.indexOf("statusok");
				if (n == -1) {
					alert('Erro ao excluir vaga');
				} else {
					//alert('Vaga excluida com sucesso!');
					window.location.href = window.location.pathname;
				}
			});
		}
	}
</script>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

	<div id="contentwrap" style="width: 100%;padding-top: 0px;">


		<div style="width: 100%; background-color: #FFFFFF;">
			<div class="related-posts" style="">
				<h4 class="related-title" style="border: 0px;margin-left: 25px;margin-top: 10px; margin-bottom: 5px;">Vagas e oportunidades:</h4>

			<?php if ($_SESSION["lettslogin"]) { ?>
				<div class="bt_acessorios">
					<a style="margin-right: 12px;" class="button" href="/cadastrar-vagas/?id_post=<?php echo $_SESSION["lettslogin"]; ?>">Cadastrar Vaga</a>
				</div>
			<?php } ?>



			</div>
		</div>
	</div>


		<div style="width: 100%; background-color: #FFFFFF; height: 130px;">
			<div class="related-posts" style="width: 305px; float: left; ">


				<div class="post-meta" style="display: inline;">
					<form method="post" action="">
					<div style="float: left; margin-right: 15px; margin-left: 25px; display: none;">
						<span class="post-category"><a href="#">Titulo</a></span><br>
						<input id="author" name="nome" type="text" value="" size="30" class="required" style="width: 190px; height: 30px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

				    <div style="float: left; margin-right: 15px; margin-top: 10px; margin-left: 25px;">


							<div class="form-group">
							<div class="col-sm-4">
							<div style="margin-bottom: 5px;"><span class="post-category"><a href="#">Buscar</a></span></div>
							<input type="text" name="buscar" value="">
							<br /><br />


							</div>
							</div>

							<?php /* <form action="#" role="form" class="form-horizontal" id="location" method="post" accept-charset="utf-8"> */ ?>
							<div class="form-group">
							<div class="col-sm-4">
							<div style="margin-top: -10px; margin-bottom: 5px;"><span class="post-category"><a href="#">País</a></span></div>
							<select name="pais_atual" class="form-control countries" id="countryId">
							<option value="">Selecionar Pais</option>
							</select>


							</div>
							</div>
							<div class="form-group">
							<div class="col-sm-4">
							<div style="margin-top: 5px; margin-bottom: 5px;"><span class="post-category"><a href="#">Estado</a></span></div>

							<select name="estado_atual" class="form-control states" id="stateId">
							<option value="">Selecionar Estado</option>
							</select>
							</div>
							</div>


<script src="http://letts.com.br/wp-content/themes/magazine/country/js/location.js"></script>



							<div class="form-group">
							<div class="col-sm-4">
							<div style="margin-top: 5px; margin-bottom: 5px;"><span class="post-category"><a href="#">Esporte</a></span></div>
							<select class="form-control" name="esporte">
								<option value="">-- Selecione --</option>
		                        <option value="Aeromodelismo">Aeromodelismo</option>
		                        <option value="Alpinismo">Alpinismo</option>
		                        <option value="Asa Delta">Asa Delta</option>
		                        <option value="BMX">BMX</option>
		                        <option value="BMX – Free style">BMX – Free style</option>
		                        <option value="Balonismo">Balonismo</option>
		                        <option value="Base Jumping">Base Jumping</option>
		                        <option value="Bodyboard">Bodyboard</option>
		                        <option value="Bouldering">Bouldering</option>
		                        <option value="Bungee Jumping">Bungee Jumping</option>
		                        <option value="Canoagem">Canoagem</option>
		                        <option value="Carveboard">Carveboard</option>
		                        <option value="Caça submarina">Caça submarina</option>
		                        <option value="Ciclismo">Ciclismo</option>
		                        <option value="Cliff Diving">Cliff Diving</option>
		                        <option value="Corrida aventura">Corrida aventura</option>
		                        <option value="Drift">Drift</option>
		                        <option value="Escalada">Escalada</option>
		                        <option value="Esqui">Esqui</option>
		                        <option value="Football Freestyle">Football Freestyle</option>
		                        <option value="Free Style Motocross">Free Style Motocross</option>
		                        <option value="FreeBoard">FreeBoard</option>
		                        <option value="Heli-Skiing">Heli-Skiing</option>
		                        <option value="Highline">Highline</option>
		                        <option value="Jet Ski">Jet Ski</option>
		                        <option value="Kart">Kart</option>
		                        <option value="Kitesurfing">Kitesurfing</option>
		                        <option value="Liquid Mountaineering">Liquid Mountaineering</option>
		                        <option value="Longboard skate">Longboard skate</option>
		                        <option value="Longboard surf">Longboard surf</option>
		                        <option value="Mega ramp">Mega ramp</option>
		                        <option value="Mergulho">Mergulho</option>
		                        <option value="Moto Trial">Moto Trial</option>
		                        <option value="Moto Wheeling">Moto Wheeling</option>
		                        <option value="Motocross">Motocross</option>
		                        <option value="Mountain Bike">Mountain Bike</option>
		                        <option value="Mountain biking">Mountain biking</option>
		                        <option value="Mountain boarding">Mountain boarding</option>
		                        <option value="Off Road/Rally">Off Road/Rally</option>
		                        <option value="Paintball">Paintball</option>
		                        <option value="Paragliding">Paragliding</option>
		                        <option value="Paragliding">Paragliding</option>
		                        <option value="Parapente">Parapente</option>
		                        <option value="Parkour">Parkour</option>
		                        <option value="Patins in Line">Patins in Line</option>
		                        <option value="Psicobloc">Psicobloc</option>
		                        <option value="Rafting">Rafting</option>
		                        <option value="Rally">Rally</option>
		                        <option value="Rapel">Rapel</option>
		                        <option value="Sandboard">Sandboard</option>
		                        <option value="Skate - Street">Skate - Street</option>
		                        <option value="Skate – Free style">Skate – Free style</option>
		                        <option value="Skate – Mini ramp">Skate – Mini ramp</option>
		                        <option value="Sky Surfing">Sky Surfing</option>
		                        <option value="Skydive">Skydive</option>
		                        <option value="Slackline">Slackline</option>
		                        <option value="Snowboard">Snowboard</option>
		                        <option value="Stand Up Paddle">Stand Up Paddle</option>
		                        <option value="Street Luge">Street Luge</option>
		                        <option value="Surf">Surf</option>
		                        <option value="Surf - Freesurf">Surf - Freesurf</option>
		                        <option value="Tow-in">Tow-in</option>
		                        <option value="Trekking">Trekking</option>
		                        <option value="Triathlon">Triathlon</option>
		                        <option value="UFC (MMA">UFC (MMA)</option>
		                        <option value="Vela/Iatismo">Vela/Iatismo</option>
		                        <option value="Velocidade">Velocidade</option>
		                        <option value="Wakeboard">Wakeboard</option>
		                        <option value="Wakeboard Free style">Wakeboard Free style</option>
		                        <option value="Windsurf">Windsurf</option>
		                        <option value="WingWalking">WingWalking</option>
							</select>
							<br /><br />

							</div>
							</div>


							<div class="form-group">
							<div class="col-sm-4">
							<div style="margin-top: -10px; margin-bottom: 5px;"><span class="post-category"><a href="#">Profissão</a></span></div>
							<select class="form-control" name="profissao">
					              <option value="">-- Selecione --</option>
					              <option value="Assessor de imprensa">Assessor de imprensa</option>
					              <option value="Coordenador de eventos">Coordenador de eventos</option>
					              <option value="Desenhista">Desenhista</option>
					              <option value="Empresário">Empresário</option>
					              <option value="Estatístico">Estatístico</option>
					              <option value="Estilista">Estilista</option>
					              <option value="Executivo de contas publicitárias">Executivo de contas publicitárias</option>
					              <option value="Fisioterapeuta">Fisioterapeuta</option>
					              <option value="Fotografo">Fotografo</option>
					              <option value="Fotojornalista">Fotojornalista</option>
					              <option value="Gerente de relações públicas">Gerente de relações públicas</option>
					              <option value="Gestor desportivo">Gestor desportivo</option>
					              <option value="Jornalista">Jornalista</option>
					              <option value="Nutricionista">Nutricionista</option>
					              <option value="Personal Crossfit">Personal Crossfit</option>
					              <option value="Personal academia">Personal academia</option>
					              <option value="Professor de idomas">Professor de idomas</option>
					              <option value="Psicologo">Psicologo</option>
					              <option value="Psicólogo esportivo">Psicólogo esportivo</option>
					              <option value="Técnico">Técnico</option>
					              <option value="Videomaker">Videomaker</option>
							</select>


							</div>
							</div>







				    </div>


					<div style="float: right; margin-right: 35px;">
						<input type="submit" value="Buscar" style="margin-top: 10px;margin-bottom: 30px;">
					</div>
					</form>
			</div>

<?php include('banner_lateral.php'); ?>


		</div>

<div id="vagas" style="float: left; width: 705px; margin-left: 20px;">

    <?php
function filter_where($where = '') {
//posts in the last 30 days
$where .= " AND post_date > '" . date('Y-m-d', strtotime('-120 days')) . "'";
return $where;
}
add_filter('posts_where', 'filter_where');

$arraybusca = "";
    	if ($_POST['esporte'] == "") {
    		//no
    	} else {
    		$arraybusca .= "array('key' => 'atletaesporte','value' => ".$_POST['esporte'].",'compare' => 'LIKE'),";
    	}


    	if ($_POST['pais'] == "") {
    		//no
    	} else {
			$arraybusca .= "array('key' => 'basicapaisatual','value' => ".$_POST['pais'].",'compare' => 'LIKE'),";
    	}


		if ($_POST['estado'] == "") {
    		//no
    	} else {
			$arraybusca .= "array('key' => 'basicaestadoatual','value' => ".$_POST['estado'].",'compare' => 'LIKE'),";
		}


		if ($_POST['profissao'] == "" || $_POST['profissao'] == "-- Selecione --" ) {
    		//no
    	} else {
			$arraybusca .= "array('key' => 'profissao','value' => ".$_POST['profissao'].",'compare' => 'LIKE'),";
		}


		if ($_POST['cidade'] == "" ) {
    		//no
    	} else {
			$arraybusca .= "array('key' => 'basicacidadeatual','value' => ".$_POST['cidade'].",'compare' => 'LIKE'),";
		}


		if ($_POST['estado'] == "" ) {
    		//no
    	} else {
			$arraybusca .= "array('key' => 'basicaestadoatual','value' => ".$_POST['estado'].",'compare' => 'LIKE'),";
		}

			$today = getdate();

			$args = array(
				'post_type' => 'vagas',
				's' => $_POST['buscar'],
				'date_query' => array(
                    array(
                        'day' => array( $today["day"], $today["day"] - 120 ),
                        'compare'   => 'BETWEEN',
                    )
                ),
				'meta_query' => array(
					'relation' => 'AND',
					array(
						'key' => 'atletaesporte',
						'value' => $_POST['esporte'],
						'compare' => 'LIKE'
					),
					array(
					'key' => 'basicaestadoatual',
					'value' => $_POST['estado'],
					'compare' => 'LIKE'
					),
					array(
					'key' => 'basicapaisatual',
					'value' => $_POST['pais'],
					'compare' => 'LIKE'
					),
					array(
						'key' => 'profissao',
						'value' => $_POST['profissao'],
						'compare' => 'LIKE'
					),
					array(
						'key' => 'basicacidadeatual',
						'value' => $_POST['cidade'],
						'compare' => 'LIKE'
					)
				)
			);

		?>

<?php // var_dump($arraybusca); exit; ?>

	<?php query_posts($args);
    while (have_posts()): the_post();
    	$conteudo = get_the_content();
    	$tamanhoc = strlen($conteudo);
    	$iddopost = get_the_ID(); ?>

    <div class="vaga">


    <?php
    	$emailvaga = get_custom_field('basicaemail');

     	if ($emailvaga == $_SESSION['meuemail']) { ?>
     		<div style="float: right;"><a href="#"><img src="/wp-content/themes/magazine/images/remove.png" onclick="javascript: excluirvaga('<?php echo $iddopost; ?>','<?php echo $_SESSION["lettslogin"]; ?>')" height="17" style="height: 17px;"></a></div>
    	<?php }
    ?>

		<?php $titulovaga = get_the_title(); ?>
      <div style="margin-top: 0px; color: #333; font-size: 14px; font-family: Oswald, sans-serif;"><?php echo mysql2date('d-m-Y', $post->post_date); ?></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #f57300;"><center><?php echo substr($titulovaga,0, 145); ?> (<?php print_custom_field('atletaesporte'); ?><?php print_custom_field('profissao'); ?>)</center> </strong></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;"><center><?php echo substr(get_custom_field('basicacidadeatual'),0,35); ?> - <?php print_custom_field('basicaestadoatual'); ?> - <?php print_custom_field('basicapaisatual'); ?>	</center></strong></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Empresa: </strong><br /><?php echo substr(get_custom_field('empresa'),0,70); ?></div>
      <div style="margin-top: 10px; color: #666;"><strong style="color: #333;">Contato: </strong><br /> <?php print_custom_field('basicaemail'); ?></div>
      <div style="margin-top: 10px; color: #666; max-height: 160px; overflow: scroll;"><strong style="color: #333;">Descrição: </strong><br />
      	<?php echo $conteudo; ?>
  	  </div>


<?php
$body_email = '%0D%0A%0D%0A--%0D%0ALink%20do%20perfil%3A%20http%3A%2F%2Fletts.com.br%2F%3Fp%3D'.$_SESSION["lettslogin"];

?>


      <div style="margin-top: 10px; color: #666; text-align: right;"><a target="_top" href="mailto:<?php print_custom_field('basicaemail'); ?>?subject=<?php the_title(); ?>&body=<?php echo $body_email; ?>"><input type="submit" value="Enviar currículo" style="margin-top: 16px;"></a></div>


<div class="redes_sociais" style="display: block;">
 <a id="share-button" href="#" title="Facebook Share Button">
	<?php /* <a id="share-button" href="#" title="Facebook botão Share" style="margin-top: 0px;"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Compartilhar no Facebook</a> */ ?>
	<div style="margin-top: -27px; float: left;">
		<?php do_action( 'addthis_widget' ); ?>
		<?php /*
		<?php $url = get_permalink(); $title = the_title('','', false); ?><a class="addthis_counter addthis_pill_style" addthis:url="<?php echo $url; ?>" addthis:title="<?php echo $title; ?>"></a>
		*/ ?>
	</div>
</a>

<!-- <div class="fb-like" data-href="<?php the_permalink(); ?>" data-share="false" data-send="true" data-layout="button" data-width="350" data-show-faces="false" data-colorscheme="dark" data-action="like"></div> -->
</div>

<?php
	$imagem_fb = 'http://letts.com.br/wp-content/uploads/2014/09/letts-logo.png';
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

<meta property="og:image" content="<?php echo $imagem_fb; ?>"/>


    </div>


    <?php endwhile; // end of the loop. ?>

</div>



			</div>


						</div>

				</div>

		</div>



	</div>
</div>
	<!-- /#contentwrap -->


<?php include('banners.php') ?>


</div>
<!-- /layout-container -->

<?php get_footer(); ?>
