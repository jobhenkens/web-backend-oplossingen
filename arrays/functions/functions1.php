<?php

	$dieren = array( 'hond', 'kat', 'slang', 'tijger', 'leeuw', 'otter', 'spin');
	$count = count($dieren);
	$teZoekenDier = 'worm';

	$gevonden = in_array($teZoekenDier, $dieren);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>arrays functions 1</title>
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