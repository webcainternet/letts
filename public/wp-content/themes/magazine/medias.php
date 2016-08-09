<html>

<head>
<meta charset="UTF-8">

<?php include "../../../wp-config.php"; ?>
<?php include "logincheck.php"; ?>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<link rel='stylesheet' id='google-fonts-css'  href='//fonts.googleapis.com/css?family=Oswald%7COpen+Sans%7COpen+Sans%3A300&#038;subset=latin%2Clatin-ext&#038;ver=4.1.1' type='text/css' media='all' />
<link rel='stylesheet' id='theme-style-css'  href='//letts.com.br/wp-content/themes/magazine/style.css?ver=1.3.0' type='text/css' media='all' />

<style type="text/css">
	.imgmedia {
		width: 500px;
	}
	body {
		margin: 0px;
		padding: 0px;
	}

</style>

</head>

<body>
<?php $urlimg = str_replace('.._', '.', $_SERVER['PATH_INFO']); ?>
<div style="margin: auto; min-width: 1137px;">

	<div style="float: left; width: 515px; position: fixed;">
		<img src="<?php echo $urlimg; ?>" class="imgmedia">
	</div>


	<div style="    float: left;
    width: 600;
    margin-left: 525px;">
		<?php
			$idpagina = $urlimg;
			include "comentarios_ajax.php";
		?>
		</div>
	</div>
</div>
</body>

</html>
