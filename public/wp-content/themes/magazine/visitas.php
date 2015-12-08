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
.fontevisitas {
	color: #F57300;
    font-size: 14px;
    font-family: Oswald, sans-serif;
    text-transform: uppercase;
    letter-spacing: .05em;
}
</style>

<body style="margin: 0px; padding: 0px;">

<?php $idlogin = $_GET["idlogin"]; ?>
<?php $idvisitante = $_SESSION['lettslogin']; ?>

<?php
/// PUBLICA VISITAS ///
if (isset($idlogin) && isset($idvisitante)){
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query1 = "INSERT INTO `letts`.`letts_visitas` ( `idvisitante`, `data`, `idlogin`) VALUES ( '".$_SESSION["lettslogin"]."', CURRENT_TIMESTAMP, '".$idlogin."')";

	$result=mysqli_query($con,$query1);

	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
}
/// FIM - PUBLICA VISITAS ///
?>


<?php if ($idlogin == $idvisitante) { ?>

<?php
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query1 = "SELECT count(*) AS qtd FROM letts_visitas l WHERE l.idlogin = '".$idlogin."'";

	$result=mysqli_query($con,$query1);

	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
		<?php $totalvisitas1 = $row["qtd"]; ?>
	<?php }

	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
?>


<div class="fontevisitas" style="float: right; margin: 5px;"><?php echo $totalvisitas1; ?> Visita<?php if ($totalvisitas1 > 1) { echo "s"; } ?> 
<?php
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query1 = "SELECT count(DISTINCT idvisitante) AS qtd FROM letts_visitas l WHERE l.idlogin = '".$idlogin."'";

	$result=mysqli_query($con,$query1);

	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
		<?php $totalvisitas1 = $row["qtd"]; ?>
	<?php }

	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
?>


de <?php echo $totalvisitas1; ?> Usuário<?php if ($totalvisitas1 > 1) { echo "s"; } ?></div>

<img style="float: right;" src="http://letts.com.br/wp-content/themes/magazine/images/stat.png" width="32">
<?php } ?>
</body>