<meta charset="UTF-8">
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
		<img src="/wp-content/themes/magazine/images/rocknroll.png" style="height: 22px; -webkit-filter: grayscale(100%); filter: grayscale(100%); float: left;">
		<div style="float: left; margin: 5px; margin-top: 0px;"><?php echo $totallike1; ?> Irado!!!</div>
	<?php } else {
		if ($totallike == 1) { ?>
			<img src="/wp-content/themes/magazine/images/rocknroll.png" style="height: 22px; float: left;">
			<div style="float: left; margin: 5px; margin-top: 0px;"><?php echo $totallike1; ?> Irado!!!</div>
		<?php } else { ?>
			<a href="like.php?idpagina=<?php echo $idpagina; ?>&addlike=1"><img src="/wp-content/themes/magazine/images/rocknroll.png" style="height: 22px; -webkit-filter: grayscale(100%); filter: grayscale(100%); float: left;"></a>
			<div style="float: left; margin: 5px; margin-top: 0px;"><?php echo $totallike1; ?> <a href="like.php?idpagina=<?php echo $idpagina; ?>&addlike=1" style="color: #888;">Irado!!!</a></div>
		<?php }
	}
	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
?>

</body>