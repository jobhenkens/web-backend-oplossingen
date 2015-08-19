<?php

/* 22u 35m 25sec 21 januari 1904 */

	$uur = 22;
	$minuten = 35;
	$sec = 25;
	$dag = 18;
	$maand = 8;
	$jaar = 2015;

	$timestamp = mktime($uur,$minuten,$sec,$maand,$dag,$jaar);
	var_dump($timestamp);

	$humanTime = date('d F Y, g:i:s a', $timestamp);
	var_dump($humanTime);

	$locale =  setlocale(LC_TIME, 'NL_nl');
	var_dump($locale);
    
    echo strftime('%A %d %B %G, %H:%M:%S', $timestamp);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DATE</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	

	</section>

</body>
</html>