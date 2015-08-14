<?php 
	$seconden = 221108521;
	$minuten = floor( $seconden/60 );
	$uren = floor( $minuten/60 );
	$dagen = floor( $uren/24 );
	$weken = floor( $dagen/7 );
	$maanden = floor( $dagen/31 );
	$jaren = floor( $dagen/365 ); 
?>

<!doctype <!DOCTYPE html>
<html>
<head>
	<title>statement if else 2</title>
</head>
<body>

	<p>Minuten: <?= $minuten ?></p>
	<p>Uren: <?= $uren ?></p>
	<p>Dagen: <?= $dagen ?></p>
	<p>Weken: <?= $weken ?></p>
	<p>Maanden: <?= $maanden ?></p>
	<p>Jaren: <?= $jaren ?></p>

</body>
</html>