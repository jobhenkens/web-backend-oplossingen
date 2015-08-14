<?php

	$getallen = array( 8, 7, 8, 7, 3, 2, 1, 2, 4 );

	$getallenUniek = array_unique ( $getallen );
	var_dump($getallenUniek);

	rsort($getallenUniek);
	foreach ($getallenUniek as $key => $val) {
    	echo "$key = $val\n";
	}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>arrays functions 3</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	</section>

</body>
</html>