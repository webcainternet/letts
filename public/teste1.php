<?php

$urlimg = 'http://letts.com.br/wp-content/uploads/2015/05/maxresdefault.jpg';

function calcbackgroundsize($imagem, $origw, $origh) {
	$imgsize = getimagesize($imagem);
	$imgsize = explode("=\"", $imgsize["3"]);

	$imgwidth = explode("\"", $imgsize["1"]);
	$imgwidth = $imgwidth["0"];	

	$imgheight = explode("\"", $imgsize["2"]);
	$imgheight = $imgheight["0"];

	if($imgwidth/$imgheight < $origw/$origh) {
		$widthcalc = "background-size: ".$origw."px ".$imgheight*$origw/$imgwidth."px ";
	} else {
		$widthcalc = "background-size: ".$imgwidth*$origh/$imgheight."px ".$origh."px ";
	}

	return $widthcalc;
}



?>




<?php echo calcbackgroundsize($urlimg, 344, 212); ?>;