<?php include "../../../wp-config.php"; ?>

<meta charset="UTF-8">

<head>
	<link rel='stylesheet' id='theme-style-css'  href='http://letts.com.br/wp-content/themes/magazine/style.css?ver=1.3.0' type='text/css' media='all' />
</head>




<?php
$idpagina = $_GET["idpagina"];

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


<div class="comentario-content" style="border: 0px;">

	<div class="comentario-header" style="border: 0px;"><iframe frameborder="0" width="100%" height="17" scrolling="no" noresize src="http://letts.com.br/wp-content/themes/magazine/like.php?idpagina=<?php echo $_SERVER['REQUEST_URI']; ?>"></iframe></div>
	<div class="comentario-header" style="border: 0px;"><?php echo $qtd; ?> Comentário<?php if ($qtd != 1) { echo "s"; } ?></div>

</div>

<div style="width: 615px;">
	<?php // include "comentarios.php"; ?>
</div>