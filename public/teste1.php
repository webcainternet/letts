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
		echo "1<br>";
		echo "$origw=".$origw."<br>";
		echo "$imgheight=".$imgheight."<br>";
		echo "$imgwidth=".$imgwidth."<br>";
		$widthcalc = "background-size: ".$origw."px ".$imgheight*$origw/$imgwidth."px ";
	} else {
		echo "2<br>";
		$widthcalc = "background-size: ".$imgwidth*$origh/$imgheight."px ".$origh."px ";
	}

	return $widthcalc;
}



?>




<?php echo calcbackgroundsize($urlimg, 344, 212); ?>;