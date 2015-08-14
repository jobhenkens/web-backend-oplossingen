<?php

	$dieren = array( 'hond', 'slang', 'kat', 'ezel', 'muis', 'paard', 'hert', 'otter', 'vogel', 'leeuw' );
	
	$dieren2[] = 'hond';
	$dieren2[] = 'slang';
	$dieren2[] = 'kat';
	$dieren2[] = 'ezel';
	$dieren2[] = 'muis';
	$dieren2[] = 'paard';
	$dieren2[] = 'hert';
	$dieren2[] = 'otter';
	$dieren2[] = 'vogel';
	$dieren2[] = 'leeuw';

	$voertuigen = array('watervoertuigen' => array( 'sloep' ), 
						'landvoertuigen' => array( 'fiets' ), 
						'luchtvoertuigen' => array( 'helikopter' ), 
						'onderwatervoertuig' => array( 'duikboot' ), 
						'ruimtevoertuig' => array(  'shuttle' ) );

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>arrays 1</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<p><?php var_dump($dieren) ?><?php var_dump($dieren2) ?><?php var_dump($voertuigen) ?></p>

	</section>

</body>
</html>