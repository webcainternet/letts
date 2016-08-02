<style type="text/css">
	.classificados {
	    float: left;
	    width: 232px;
	    margin-left: 0px;
	    margin-bottom: 20px;
	    border: solid 1px #ddd;
	    margin: 5px;
	    background-color: #f9f9f9;
	    padding: 10px;
	    padding-bottom: 20px;
	}
	.classificados:hover {
	    background-color: #DDD;
	}
	.selectitens{
	  width: 132px !important;
	}

</style>
<?php
	ini_set("DISPLAY_ERRORS", 1);

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

	function excluirclassificado(idclassificado, idlogin) {
		var txt;
		var r = confirm("Tem certeza que deseja excluir?");
		if (r == true) {
					$.ajax({
					method: "POST",
					url: "/wp-content/themes/magazine/excluirclassificados.php",
					data: { idclassificado: idclassificado, idlogin: idlogin }
					})
					.done(function( msg ) {
						var n = msg.indexOf("statusok");
						if (n == -1) {
							alert('Erro ao excluir acessório');
						} else {
							//alert('Acessório excluido com sucesso!');
							window.location.href = window.location.pathname;
						}
					});
		}
	}

</script>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

	<div id="contentwrap" style="width: 100%;padding-top: 0px;">

		<div style="width: 100%; background-color: #FFFFFF; height: 130px;">
			<div class="related-posts" style="height: 125px;">
				<h4 class="related-title" style="border: 0px;margin-left: 25px;margin-top: 10px; margin-bottom: 5px;">Acessórios / Classificados:</h4>

			<?php if ($_SESSION["lettslogin"]) { ?>
				<div class="bt_acessorios">
					<a class="button" href="/cadastrar-acessorios/?id_post=<?php echo $_SESSION["lettslogin"]; ?>" style="    margin-right: 15px;">Cadastrar Acessório</a>
				</div>
			<?php } ?>

				<div class="post-meta" style="display: inline;">
					<form method="post">
					<div style="float: left; margin-right: -5px; margin-left: 25px;">
						<span class="post-category"><a href="#">Buscar</a></span><br>
						<input id="author" name="titulo" type="text" value="" size="30" class="required" style="width: 160px; height: 32px; background-color: #FFFFFF; border: solid 1px; border-radius: 5px;">
					</div>

					<div style="float: left; margin-right: 10px;">
						<span class="post-category"><a href="#">Categoria</a></span><br>
						<select name="catacessorio" id="catacessorio" style="height: 32px; border: solid 1px; border-radius: 5px;">
							<option value="">-- Selecione --</option>
							<option value="Arte e Artesanato">Arte e Artesanato</option>
							<option value="Bolsas, Malas e Mochilas">Bolsas, Malas e Mochilas</option>
							<option value="Câmeras e Acessórios">Câmeras e Acessórios</option>
							<option value="Fitness">Fitness</option>
							<option value="Relógios e Óculos ">Relógios e Óculos </option>
							<option value="Roupas e Calçados">Roupas e Calçados</option>
							<option value="Saúde e Beleza">Saúde e Beleza</option>
							<option value="Aeromodelismo e WingWalking">Aeromodelismo e WingWalking</option>
							<option value="Asa Delta, Parapente e Paramotor">Asa Delta, Parapente e Paramotor</option>
							<option value="Balonismo">Balonismo</option>
							<option value="Barco e Jet Ski">Barco e Jet Ski</option>
							<option value="Bicicleta">Bicicleta</option>
							<option value="Bungee jumping">Bungee jumping</option>
							<option value="Canoagem e Rafting">Canoagem e Rafting</option>
							<option value="Automobilismo, Quadriciclo e Off Road">Automobilismo, Quadriciclo e Off Road</option>
							<option value="Escalada, Montanhismo, Rapel e Alpinismo">Escalada, Montanhismo, Rapel e Alpinismo</option>
							<option value="Highline e Slackline">Highline e Slackline</option>
							<option value="Kitesurfing e Windsurf">Kitesurfing e Windsurf</option>
							<option value="Mergulho e Caça submarina ">Mergulho e Caça submarina </option>
							<option value="Moto speed e Motocross">Moto speed e Motocross</option>
							<option value="Patins">Patins</option>
							<option value="Queda livre, Skydive e Wingsuit">Queda livre, Skydive e Wingsuit</option>
							<option value="Skate">Skate</option>
							<option value="Snowboard, Sandboard e Esqui">Snowboard, Sandboard e Esqui</option>
							<option value="Surf">Surf</option>
							<option value="UFC (MMA)">UFC (MMA)</option>
							<option value="Vela e Iatismo">Vela e Iatismo</option>
							<option value="Wakeboard ">Wakeboard </option>
							<option value="Outros">Outros</option>
						</select>
					</div>

					<div style="float: left; margin-right: 10px;">
						<span class="post-category"><a href="#">Novo / Usado</a></span><br>
						<select  class="selectitens" name="estado">
										<option value="">-- Selecione --</option>
										<option>Novo</option>
										<option>Usado</option>
									</select>
					</div>


					        <div style="float: left; margin-right: 10px;">
					          <span class="post-category"><a href="#">País</a></span><br>
					          <select name="pais" class="form-control countries" id="countryId" style="width: 132px !important; height: 32px; border-radius: 5px;">
					          <option value="">Selecionar Pais</option>
					          </select>
					        </div>

					        <div style="float: left; margin-right: 10px;">
					          <span class="post-category"><a href="#">Estado</a></span><br>
					          <select name="estado" class="form-control states" id="stateId" style="width: 132px !important; height: 32px; border-radius: 5px;">
					          <option value="">Selecionar Estado</option>
					          </select>
					        </div>
					        <script src="http://letts.com.br/wp-content/themes/magazine/country/js/location.js"></script>



					<div style="float: left; margin-right: 15px; margin-top: -3px;">
						<input type="submit" value="Buscar" style="margin-top: 16px;">
					</div>
					</form>
			</div>
		</div>

<section class="module">
  <section class="wraper">
  	<?php


  			if ($_POST['estado'] != '') {
  				$querywhere = " AND `testado`.`meta_value` = '".$_POST['estado']."' ";
  			}

  			if ($_POST['titulo'] != '') {
  				$querywhere .= " AND `p`.`post_title` LIKE '%".$_POST['titulo']."%' ";
  			}

  			if ($_POST['de'] != '') {
  				$querywhere .= " AND `tvalor`.`meta_value` >= '".$_POST['de']."' ";
  			}

				if ($_POST['ate'] != '') {
  				$querywhere .= " AND `tvalor`.`meta_value` <= '".$_POST['ate']."' ";
  			}

				if ($_POST['ate'] != '') {
  				$querywhere .= " AND `tvalor`.`meta_value` <= '".$_POST['ate']."' ";
  			}

				if ($_POST['ate'] != '') {
  				$querywhere .= " AND `tvalor`.`meta_value` <= '".$_POST['ate']."' ";
  			}

				if ($_POST['catacessorio'] != '') {
					$querywhere .= " AND `tcatacessorio`.`meta_value` = '".$_POST['catacessorio']."' ";
				}

				if ($_POST['pais'] != '') {
					$querywhere .= " AND pmpais.meta_value = '".$_POST['pais']."' ";
				}

				if ($_POST['estado'] != '') {
					$querywhere .= " AND pmestado.meta_value = '".$_POST['estado']."' ";
				}

  			$querywhere .= " AND post_date >= DATE_SUB(CURRENT_DATE, INTERVAL 5 MONTH) ";

  			$resultsql = "SELECT
		distinct `p`.`id`,
		`p`.`post_date` as post_data,
		`p`.`post_title` as title,
		`testado`.`meta_value` as estado,
		`tfoto`.`meta_value` as idfoto,
		`tvalor`.`meta_value` as valor,
		`temail`.`meta_value` as email,
		`tcatacessorio`.`meta_value` as catacessorio,
		`login`.`post_title` as nome,
		`login`.`post_id` AS loginid,
		`ttelefone`.`meta_value` AS telefone, pmpais.meta_value as pais
		, pmestado.meta_value as estado1
		, pmcidade.meta_value as cidade
		, moeda.meta_value as moeda
				FROM wp_posts p
				INNER JOIN wp_postmeta pm ON `p`.`id` = `pm`.`post_id`
				INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta estado WHERE `estado`.`meta_key` = 'acessorioestado') AS testado ON `testado`.`post_id` = `p`.`id`
				INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta foto WHERE `foto`.`meta_key` = 'fotoacessorio') AS tfoto ON `tfoto`.`post_id` = `p`.`id`
				INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta valor WHERE `valor`.`meta_key` = 'acessoriovalor') AS tvalor ON `tvalor`.`post_id` = `p`.`id`
				INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta email WHERE `email`.`meta_key` = 'basicaemail') AS temail ON `temail`.`post_id` = `p`.`id`
				INNER JOIN (SELECT meta_value, post_id FROM wp_postmeta categoria WHERE `categoria`.`meta_key` = 'catacessorio') AS tcatacessorio ON `tcatacessorio`.`post_id` = `p`.`id`
				INNER JOIN (
					SELECT `k`.`post_id`, `k`.`meta_value`, `po`.`post_title` from wp_postmeta k
					INNER JOIN wp_posts po ON `po`.`id` = `k`.`post_id`
					WHERE `k`.`meta_key` = 'basicaemail'
					) AS login ON `login`.`meta_value` = `temail`.`meta_value`
				INNER JOIN (
					select `k`.`post_id`, `k`.`meta_value` from wp_postmeta k
					INNER JOIN wp_posts po ON `po`.`id` = `k`.`post_id`
					WHERE `k`.`meta_key` = 'basicatelefones'
					) AS ttelefone ON `ttelefone`.`post_id` = `login`.`post_id`

				INNER JOIN  wp_postmeta pmpais   on p.id = pmpais.post_id
				INNER JOIN  wp_postmeta pmestado on p.id = pmestado.post_id
				INNER JOIN  wp_postmeta pmcidade on p.id = pmcidade.post_id
				INNER JOIN  wp_postmeta moeda on p.id = moeda.post_id

				WHERE `p`.`post_status` = 'publish'

		AND pmpais.`meta_key` = 'basicapaisatual'
		AND pmestado.`meta_key` = 'basicacidadeatual'
		AND pmcidade.`meta_key` = 'basicaestadoatual'
		AND moeda.`meta_key` = 'moeda'"
		.$querywhere.
		"ORDER BY `p`.`post_date` DESC";

//		var_dump($resultsql);exit;

	$result = mysql_query($resultsql);




	?>

  	<?php while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
  		<?php
   			$data_acessorio = explode(" ", $row["post_data"]);
  			$data_acessorio = explode("-", $data_acessorio[0]);
  			$data_acessorio = $data_acessorio[2]."-".$data_acessorio[1]."-".$data_acessorio[0];
  		?>

  	<div class="related-posts classificados">


	        <div style="text-align: left;">
	          <span style="color: #333; width: 100px; font-size: 14px;
	          font-family: Oswald, sans-serif; padding-left: 5px; padding-right: 5px;"><?php echo $data_acessorio; ?></span>

						<?php
				    	$emailvaga = $row["email"];
				     	if ($emailvaga == $_SESSION['meuemail']) { ?>
				     		<div style="float: right;"><a href="#"><img src="/wp-content/themes/magazine/images/remove.png" onclick="javascript: excluirclassificado('<?php echo $row["id"]; ?>','<?php echo $_SESSION["lettslogin"]; ?>')" height="17" style="height: 17px;"></a></div>
				    	<?php }
				    ?>
	        </div>
	        <a href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox scroll">

			<?php
				$attachment_id = $row["idfoto"];

				$image_attributes = wp_get_attachment_image_src($attachment_id); ?>

	        	<figure class="small" style="border: 0px; width: 100%;">
	        	<?php if($image_attributes) { ?>
			      <a href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox scroll">
			      	<div style="width: width: 100%;
			      	height: 200px;
			      	background-image: url('<?php echo $image_attributes[0]; ?>');
			      	background-position: center;
			      	background-size: cover;
			      	background-repeat: no-repeat;
			      	"></div>
			      </a>
			      <?php }else{ ?>
			      <a href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox scroll">
			      	<div style="width: 100%;
							  height: 100px;
							  padding-top: 100px;
							  text-align: center;
			      	">Produto sem imagem</div>
			      </a>
			      <?php } ?>

			      <figcaption class="transition-050 opacity85">
			        <a href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox scroll">
			       <!--   <strong class="text transition-050 title"><?php echo $row["estado"]; ?></strong>  -->
				     <strong><?php echo $row["estado"]; ?></strong>
			        <!-- <span class="text transition-050 desc"><?php echo $row["nome"]; ?><br>  -->
			        <!-- <b>Contato: </b><?php echo $row["telefone"]; ?></span> -->
			        </a>
			      </figcaption>
			    </figure>

	        </a>
	        <br/>
	        <article class="post type-post clearfix" style="margin-bottom: 0px !important;">
	          <div class="post-content">
	            <p class="post-meta">
	              <span class="post-category" style="height: 32px;font-weight: bold;font-size: 22px;font-family: Oswald, sans-serif;">
	                <a style="color: #444;" href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox scroll"><?php echo $row["title"]; ?></a></span>
	            </p>
	          </div>
	        </article>

	        <div style="float: right; margin-right: 0px;margin-top: 0px; margin-bottom: 0px;">
				<a href="/formulario-acessorios/?post_id=<?php echo $row["id"]; ?>&nome=<?php echo $row["nome"]; ?>&produto=<?php echo $row["title"]; ?>&email=<?php echo $row["email"]; ?>" class="fancybox button"><?php echo $row["moeda"]; ?> <?php echo $row["valor"]; ?></a>
			</div>

  	</div>

  	<?php } ?>
	  </section>
	</section>
			</div>


						</div>

				</div>

		</div>

		<br>
		<?php include('banners.php') ?>

	</div>
</div>
	<!-- /#contentwrap -->



</div>
<!-- /layout-container -->

<?php get_footer(); ?>

<script type="text/javascript">
$(".scroll").click(function() {
    $('html, body').animate({
        scrollTop: $("#pagewrap").offset().top
    }, 300);
});


</script>
