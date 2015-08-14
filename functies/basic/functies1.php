<?php

	function berekenSom ($getal1, $getal2) {

		return $getal1 + $getal2;

	}


	function vermenigvuldig ($getal1, $getal2) {

		return $getal1*$getal2;

	}


	function isEven ($getal) {

		$result = '';

		( $getal%2 === 0 ) ? $result = $getal . ' is even' : $result = $getal . ' is niet even';

		return $result;


	}	

	function returnStringArray($string){

		$stringArr = array();

		$stringArr[ ] = strlen($string);
	#	var_dump($stringArr[0]);
		$stringArr[ ] = strtoupper($string);
	#	var_dump($stringArr[1]);

		return $stringArr;

	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>functies1</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<p><?= berekenSom(4, 5) ?></p>
		<p><?= vermenigvuldig(4, 5) ?></p>
		<p><?= isEven(7) ?></p>
		<p><?php foreach (returnStringArray('Dit is een hele gewone string.') as $value): ?> 
			<?= $value ?>
		<?php endforeach ?>
		</p>

	</section>

</body>
</html>