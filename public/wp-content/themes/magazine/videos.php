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

<?php
$idvideo =  str_replace('/', '', $_SERVER['PATH_INFO']);

//Obtem link do video aberto
$resultEmail = mysql_query("SELECT * FROM wp_postmeta WHERE post_id = ".$idvideo." AND meta_key = 'link_video'");
while ($rowEmail = mysql_fetch_array($resultEmail, MYSQL_ASSOC)) {
	$VideoURL = $rowEmail["meta_value"];
}
?>

<div style="margin: auto; min-width: 1137px;">

	<div style="float: left; width: 515px; position: fixed;">

	<?php
		$video = explode("/", $VideoURL);
		$url_video = explode("=", $video[3]);
		if ($url_video[0] == 'watch?v') {
		 	$imgid = $url_video[1];
		 	$img_video = 'http://img.youtube.com/vi/'.$imgid.'/0.jpg';
		 	?> <iframe width="500" height="375" src="//www.youtube.com/embed/<?php echo $imgid; ?>?autoplay=1" frameborder="0" allowfullscreen></iframe> <?php
		 } else{
		$imgid = $url_video[0];
		$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
		$img_video = $hash[0]['thumbnail_medium'];
			?> <iframe width="500" height="375" src="//player.vimeo.com/video/<?php echo $imgid; ?>?badge=0&autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> <?php
		 }
	?>

	</div>

	<div style="    float: left;
    width: 600;
    margin-left: 525px;">
		<?php
			$idpagina = '/videos/?vid='.$idvideo;
			$idpagina = 'http://letts.com.br/wp-content/themes/magazine/videos.php/3550';
			include "comentarios_ajax.php";
		?>
		</div>
	</div>
</div>
</body>

</html>
