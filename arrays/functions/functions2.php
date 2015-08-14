<?php

	$dieren = array( 'hond', 'kat', 'slang', 'tijger', 'leeuw', 'otter', 'spin');
	$count = count($dieren);
	$teZoekenDier = 'worm';

	$gevonden = in_array($teZoekenDier, $dieren);

	asort($dieren);
	foreach ($dieren as $key => $val) {
    	echo "$key = $val\n";
	}

	$zoogdieren = array('koe', 'paard', 'konijn');
	$dierenlijst = array_merge($dieren, $zoogdieren);
	var_dump($dierenlijst);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>arrays functions 2</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<p><?= $count ?></p>
		<p><?php echo ( $gevonden ) ? ($teZoekenDier . ' is gevonden') : ($teZoekenDier . ' is niet gevonden'); ?></p>

	</section>

</body>
</html>