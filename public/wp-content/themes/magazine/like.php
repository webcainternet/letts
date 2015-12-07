<head>
<meta charset="UTF-8">

<link rel='stylesheet' id='theme-style-css'  href='/wp-content/themes/magazine/style.css?ver=1.3.0' type='text/css' media='all' />
<link rel="stylesheet" id="google-fonts-css" href="//fonts.googleapis.com/css?family=Oswald%7COpen+Sans%7COpen+Sans%3A300&amp;subset=latin%2Clatin-ext&amp;ver=4.1.1" type="text/css" media="all">
</head>

<?php include "../../../wp-config.php"; ?>
<?php include "logincheck.php"; ?>

<style type="text/css">
body, a {
    line-height: 25px;
    margin-bottom: 24px;
    padding: 8px 0;
    font-weight: bold;
    font-size: 12px;
    color: #888;
}
.fontelike {
	color: #F57300;
    font-size: 14px;
    font-family: Oswald, sans-serif;
    text-transform: uppercase;
    letter-spacing: .05em;
}
</style>

<body style="margin: 0px; padding: 0px;">

<?php $idpagina = $_GET["idpagina"]; ?>

<?php
/// PUBLICA LIKE ///
if (isset($_GET['addlike']) && isset($_GET['idpagina']) && isset($_SESSION['lettslogin'])){
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query1 = "INSERT INTO `letts`.`letts_like` ( `idlogin`, `data`, `idpagina`) VALUES ( '".$_SESSION["lettslogin"]."', CURRENT_TIMESTAMP, '".$_GET["idpagina"]."')";
	$result=mysqli_query($con,$query1);

	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
}
/// FIM - PUBLICA LIKE ///



/// REMOVE LIKE ///
if (isset($_GET['rmlike']) && isset($_GET['idpagina']) && isset($_SESSION['lettslogin'])){
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query1 = "DELETE FROM `letts`.`letts_like` WHERE idlogin = '".$_SESSION["lettslogin"]."' AND  idpagina = '".$_GET["idpagina"]."'";
	$result=mysqli_query($con,$query1);

	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
}
/// FIM - REMOVE LIKE ///
?>




<?php
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query1 = "SELECT count(DISTINCT idlogin) AS qtd FROM letts_like l WHERE l.idpagina = '".$idpagina."'";

	$result=mysqli_query($con,$query1);

	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
		<?php $totallike1 = $row["qtd"]; ?>
	<?php }

	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
?>



<?php
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query1 = "SELECT count(DISTINCT idlogin) AS qtd FROM letts_like l WHERE l.idpagina = '".$idpagina."' AND l.idlogin = '".$_SESSION["lettslogin"]."'";

	$result=mysqli_query($con,$query1);

	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
		<?php $totallike = $row["qtd"]; ?>
	<?php }

	if ($_SESSION["lettslogin"] == 1) { ?>
		<img src="/wp-content/themes/magazine/images/rocknroll.png" style="height: 30px; -webkit-filter: grayscale(100%); filter: grayscale(100%); float: left;">
		<div class="fontelike" style="float: left; margin: 5px; margin-top: 0px;"><?php echo $totallike1; ?> Irado!!!</div>
	<?php } else {
		if ($totallike == 1) { ?>
			<img src="/wp-content/themes/magazine/images/rocknroll.png" style="height: 30px; float: left;">
			<div class="fontelike" style="float: left; margin: 5px; margin-top: 0px;"><?php echo $totallike1; ?> Irado!!! <a href="like.php?rmlike=1&idpagina=<?php echo $idpagina; ?>&addlike=1">Remover</a></div>
		<?php } else { ?>
			<a href="like.php?idpagina=<?php echo $idpagina; ?>&addlike=1"><img src="/wp-content/themes/magazine/images/rocknroll.png" style="height: 30px; -webkit-filter: grayscale(100%); filter: grayscale(100%); float: left;"></a>
			<div class="fontelike" style="float: left; margin: 5px; margin-top: 0px;"><?php echo $totallike1; ?> <a href="like.php?idpagina=<?php echo $idpagina; ?>&addlike=1" style="color: #888;">Irado!!!</a></div>
		<?php }
	}
	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
?>

</body>